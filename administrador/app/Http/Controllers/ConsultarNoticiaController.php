<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoticiasModel;
use App\CategoriasModel;
//Libería para hacer inner join
use Illuminate\Support\Facades\DB;

class ConsultarNoticiaController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/
	
	public function index(){

    	
    	$join = DB::table('categorias')->join('noticias','categorias.id_categoria','=','noticias.categoria')->select('categorias.*','noticias.*')->get();       

        if(request()->ajax()){
 
            return datatables()->of($join)
            ->addColumn('nombre_categoria', function($data){
            	/**
            	 *
            	 * Se coloca el nombre según se encuentra la tabla que lo tiene
            	 ejemplo: noticias solo es encuentra el id, así que aquí se retorna es el nombre que se encuentra en la tabla cateogorías, es decir nombre_categoria.
            	 *
            	 */
            	
              $nombre_categoria = $data->nombre_categoria;

              return $nombre_categoria;

            })
            ->addColumn('destacado', function($data){
            	
            	if ($data->destacado == 0) {
            		return 'No';
            	}elseif ($data->destacado == 1) {
            		return 'Sí';
            	}else{
            		return 'Error';
            	}

            })
            ->addColumn('acciones', function($data){

                $botones = '<div class="btn-group">
                            <a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
                              <i class="fas fa-pencil-alt text-white"></i>
                            </a>

                            <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id.'" method="DELETE" token="'.csrf_token().'" pagina="pagina_web/consultarNoticia"> <i class="fas fa-trash-alt"></i></button>

                          </div>';
               
                return $botones;

            })
            ->rawColumns(['nombre_categoria','acciones'])
            ->make(true);

        }

		$categorias = CategoriasModel::all();

		return view("paginas.pagina_web.consultarNoticia", array("categorias"=>$categorias));
    }
	
	/*=====  End of Mostrar todos los registros en la tabla  ======*/
}
