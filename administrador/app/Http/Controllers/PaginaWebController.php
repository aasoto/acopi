<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;

class PaginaWebController extends Controller
{
	/*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/
	
	public function index(){
    	$paginaweb = PaginaWebModel::all();

    	return view("paginas.pagina_web.carrusel", array("paginaweb" => $paginaweb));
    }
	
	/*=====  End of Mostrar todos los registros en la tabla  ======*/
	
	/*===========================================
	=            Actualizar registro            =
	===========================================*/
	
	public function update($id, Request $request){
		/*----------  Obtener los datos del request  ----------*/
		$datos = array( "dominio" => $request->input("dominio"),
						"servidor" => $request->input("servidor"),
						"titulo_pestana" => $request->input("titulo_pestana"),
						"titulo_pagina" => $request->input("titulo_pagina"),
						"titulo_navegacion" => $request->input("titulo_navegacion"),
						"descripcion" => $request->input("descripcion"),
						"palabras_claves" => $request->input("palabras_claves"),
						"redes_sociales"=>$request->input("redes_sociales"));

		/*----------  Verificar validación  ----------*/
		if (!empty($datos)) {
			$validar = \Validator::make($datos, [
				"dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
    			"servidor" => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-z]+$/i',
    			"titulo_pestana" => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"titulo_pagina" => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"titulo_navegacion" => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"redes_sociales" => 'required'
			]);

			if ($validar->fails()) {
				return redirect("/pagina_web/carrusel")->with("no-validacion", "");
			}else{
				//$paginaweb = PaginaWebModel::all();

    			$actualizar = array("dominio"=> $datos["dominio"],
    				                "servidor"=> $datos["servidor"],
    				                "titulo_pestana" => $datos["titulo_pestana"],
    				                "titulo_pagina" => $datos["titulo_pagina"],
    				                "titulo_navegacion" => $datos["titulo_navegacion"],
    				                "descripcion" => $datos["descripcion"],
    				            	"palabras_claves" => json_encode(explode(",", $datos["palabras_claves"])),
    				            	"redes_sociales" => $datos["redes_sociales"]);

    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
    			return redirect("/pagina_web/carrusel")->with("ok-editar","");
			}
		}else{
			return redirect("/pagina_web/carrusel")->with("error","");
		}
		
	}
	
	/*=====  End of Actualizar registro  ======*/
	
    
}


