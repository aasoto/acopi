<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;

class ProductosController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/
	
	public function index(){
    	$paginaweb = PaginaWebModel::all();

    	return view("paginas.pagina_web.info.productos", array("paginaweb" => $paginaweb));
    }
	
	/*=====  End of Mostrar todos los registros en la tabla  ======*/

	/*========================================================
	=            Actualizar productos y servicios            =
	========================================================*/
	
	public function update($id, Request $request){
		$indice = array('indice' => $request->input("indice"));
		//echo '<pre>'; print_r($indice); echo '</pre>';
		$nuevo = array('nombre' => $request->input("nombre-".$indice['indice']));
		if (!empty($nuevo['nombre'])) {
			$indice['indice'] = $indice['indice'] + 1;
		}
		echo '<pre>'; print_r($indice['indice']); echo '</pre>';
		return;
		for ($i=0; $i <= $indice['indice']; $i++) {
			${"num_".$i} = array('num-'.$i => $request->input("numero-".$i));
			${"nombre_".$i} = array('nombre-'.$i => $request->input("nombre-".$i));
			${"descripcion_".$i} = array('descripcion-'.$i => $request->input("descripcion-".$i));
		}
		
		for ($i=0; $i <= $indice['indice']; $i++) {
			if (!empty(${"num_".$i}["num-".$i])) {
				${"validarNum_".$i} = \Validator::make(${"num_".$i}, [
					"num-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i']);
			}
			if (!empty(${"nombre_".$i}["nombre-".$i])) {
				${"validarNombre_".$i} = \Validator::make(${"nombre_".$i}, [
					"nombre-".$i => 'required|regex:/^[-\\_\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
			}
			if (!empty(${"descripcion_".$i}["descripcion-".$i])) {
				${"validarDescripcion_".$i} = \Validator::make(${"descripcion_".$i}, [
					"descripcion-".$i => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
			}
		}

		$productos = "[{";
		for ($i=0; $i <= $indice['indice']; $i++) {
			if (${"validarNum_".$i}->fails()) {
				return redirect("/pagina_web/info/productos")->with("no-validacion", "");
			}elseif (${"validarNombre_".$i}->fails()) {
				return redirect("/pagina_web/info/productos")->with("no-validacion", "");
			}elseif (${"validarDescripcion_".$i}->fails()) {
				return redirect("/pagina_web/info/productos")->with("no-validacion", "");
			}else{
				
				if($i == $indice["indice"]) {
					$productos = $productos."\n\t".'"num": "'.${"num_".$i}["num-".$i].'", '."\n\t".'"nombre": "'.${"nombre_".$i}["nombre-".$i].'", '."\n\t".'"descripcion": "'.${"descripcion_".$i}["descripcion-".$i].'"'."\n".'}]';
				} else {
					$productos = $productos."\n\t".'"num": "'.${"num_".$i}["num-".$i].'", '."\n\t".'"nombre": "'.${"nombre_".$i}["nombre-".$i].'", '."\n\t".'"descripcion": "'.${"descripcion_".$i}["descripcion-".$i].'"'."\n".'},{';
				}

			}
		}
		$actualizar = array('productos' => $productos);
		$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
		return redirect("/pagina_web/info/productos")->with("ok-editar", "");


	}
	
	/*=====  End of Actualizar productos y servicios  ======*/
	
}
