<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;
use App\CategoriasModel;

class CarruselController extends Controller
{
    public function index(){
    	$paginaweb = PaginaWebModel::all();
    	$categorias = CategoriasModel::all();

    	return view("paginas.pagina_web.ingresarCarrusel", array("paginaweb" => $paginaweb, "categorias" => $categorias));
    }

    /*======================================================
    =            Agregar nuevo item al carrusel            =
    ======================================================*/
    
    /**
     * Como el carrusel es un dato JSON dentro de la tabla de página, agregar un nuevo dato
     * se hace por medio de una actualización en el mismo campo.
     *
     */
    
    public function update($id, Request $request){

    	$datos = array("categoria" => $request->input("categoria"),
					   	"titulo" => $request->input("titulo"),
						"texto" => $request->input("texto"),
						"boton-1" => $request->file("boton-1"),
						"boton-2" => $request->file("boton-2"),
						"foto-delante" => $request->file("foto-delante"),
						"fondo" => $request->file("fondo"));
    	/*echo '<pre>'; print_r($datos["carrusel"]); echo '</pre>';
    	return;*/

    	$carrusel_actual = array('carrusel' => $request->input("carrusel"));

    	if (!empty($datos)) {
    		/*======================================================
    		=            Sección de validación de datos            =
    		======================================================*/

    		/*----------  validación de datos alfanumericos y datos requeridos  ----------*/
    		$validar = \Validator::make($datos, [
    			"categoria" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"titulo" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"texto" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"fondo" => 'required'
			]);
    		
    		/*----------  validación de imagenes  ----------*/
    		if($datos["boton-1"] != ""){
                $validarboton_1 = \Validator::make($datos, [
                "boton-1" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarboton_1->fails()){
                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
                }
            }

            if($datos["boton-2"] != ""){
                $validarboton_2 = \Validator::make($datos, [
                "boton-2" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarboton_2->fails()){
                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
                }
            }

            if($datos["foto-delante"] != ""){
                $validarfoto_delante = \Validator::make($datos, [
                "foto-delante" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarfoto_delante->fails()){
                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
                }
            }

            if($datos["fondo"] != ""){
                $validarfondo = \Validator::make($datos, [
                "fondo" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarfondo->fails()){
                    return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion-imagen", "");
                }
            }
    		/*=====  End of Sección de validación de datos  ======*/

    		/*=========================================================
    		=            Subir imagenes nuevas al servidor            =
    		=========================================================*/
    		
    		if ($validar->fails()) {
				return redirect("/pagina_web/ingresarCarrusel")->with("no-validacion", "");
			}else{
				if($datos["boton-1"] != ""){
					$aleatorio = mt_rand(1000, 9999);
					$ruta_boton_1 = "vistas/images/pagina_web/carrusel/".$aleatorio.".".$datos["boton-1"]->guessExtension();

					/*----------  Redimensionar imagen  ----------*/
					list($ancho, $alto) = getimagesize($datos["boton-1"]);
                    $nuevoAncho = 400;
                    $nuevoAlto = 118;

                    if(($datos["boton-1"]->guessExtension() == "jpeg") || ($datos["boton-1"]->guessExtension() == "jpg")){

                        $origen = imagecreatefromjpeg($datos["boton-1"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta_boton_1);

                    }

                    if($datos["boton-1"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($datos["boton-1"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta_boton_1);
                        
                    }
				}else{
					$ruta_boton_1 = "";
				}

				if($datos["boton-2"] != ""){
					$aleatorio = mt_rand(1000, 9999);
					$ruta_boton_2 = "vistas/images/pagina_web/carrusel/".$aleatorio.".".$datos["boton-2"]->guessExtension();
					
					/*----------  Redimensionar imagen  ----------*/
					list($ancho, $alto) = getimagesize($datos["boton-2"]);
                    $nuevoAncho = 400;
                    $nuevoAlto = 118;

                    if(($datos["boton-2"]->guessExtension() == "jpeg") || ($datos["boton-2"]->guessExtension() == "jpg")){

                        $origen = imagecreatefromjpeg($datos["boton-2"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta_boton_2);

                    }

                    if($datos["boton-2"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($datos["boton-2"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta_boton_2);
                        
                    }
				}else{
					$ruta_boton_2 = "";
				}

				if($datos["foto-delante"] != ""){
					$aleatorio = mt_rand(1000, 9999);
					$ruta_foto_delante = "vistas/images/pagina_web/carrusel/".$aleatorio.".".$datos["foto-delante"]->guessExtension();
					
					/*----------  Redimensionar imagen  ----------*/
					list($ancho, $alto) = getimagesize($datos["foto-delante"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    if(($datos["foto-delante"]->guessExtension() == "jpeg") || ($datos["foto-delante"]->guessExtension() == "jpg")){

                        $origen = imagecreatefromjpeg($datos["foto-delante"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta_foto_delante);

                    }

                    if($datos["foto-delante"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($datos["foto-delante"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta_foto_delante);
                        
                    }
				}else{
					$ruta_foto_delante = "";
				}

				if($datos["fondo"] != ""){
					$aleatorio = mt_rand(1000, 9999);
					$ruta_fondo = "vistas/images/pagina_web/carrusel/".$aleatorio.".".$datos["fondo"]->guessExtension();
					
					/*----------  Redimensionar imagen  ----------*/
					list($ancho, $alto) = getimagesize($datos["fondo"]);
                    $nuevoAncho = 2000;
                    $nuevoAlto = 1333;

                    if(($datos["fondo"]->guessExtension() == "jpeg") || ($datos["fondo"]->guessExtension() == "jpg")){

                        $origen = imagecreatefromjpeg($datos["fondo"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta_fondo);

                    }

                    if($datos["fondo"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($datos["fondo"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta_fondo);
                        
                    }
				}else{
					$ruta_fondo = "";
				}
			}
    		
    		/*=====  End of Subir imagenes nuevas al servidor  ======*/

    		/*===========================================
    		=            Agregar al carrusel            =
    		===========================================*/
    		
    		$carrusel_actual["carrusel"] = substr($carrusel_actual["carrusel"], 0, -1);

    		$carrusel_actual["carrusel"] = $carrusel_actual["carrusel"].',{'."\n\t".'"categoria": "'.$datos["categoria"].'",'."\n\t".'"titulo": "'.$datos["titulo"].'",'."\n\t".'"texto": "'.$datos["texto"].'",'."\n\t".'"boton-1": "'.$ruta_boton_1.'",'."\n\t".'"boton-2": "'.$ruta_boton_2.'",'."\n\t".'"foto-delante": "'.$ruta_foto_delante.'",'."\n\t".'"fondo": "'.$ruta_fondo.'"'."\n".'}]';

    		/*=====  End of Agregar al carrusel  ======*/
    		
    		/*======================================================
    		=            Guardar actualización carrusel            =
    		======================================================*/
    		
    		$actualizar = array('carrusel' => $carrusel_actual["carrusel"]);
    		$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
    		return redirect("/pagina_web/ingresarCarrusel")->with("ok-editar","");
    		
    		/*=====  End of Guardar actualización carrusel  ======*/
    		
    		
    	}else{
    		return redirect("/pagina_web/ingresarCarrusel")->with("error", "");
    	}

    }
    
    /*=====  End of Agregar nuevo item al carrusel  ======*/
    
}
