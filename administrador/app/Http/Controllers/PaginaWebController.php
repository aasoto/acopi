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
						"redes_sociales"=>$request->input("redes_sociales"),
						"direccion"=>$request->input("direccion"),
						"telefono"=>$request->input("telefono"),
						"celular"=>$request->input("celular"),
						"email"=>$request->input("email"),
						"logo_pestana_actual"=>$request->input("logo_pestana_actual"),
						"logo_navegacion_actual"=>$request->input("logo_navegacion_actual"));
		/*echo '<pre>'; print_r($datos["redes_sociales"]); echo '</pre>';
		return;*/
		/*----------  Recoge imágenes logos  ----------*/
		$logo_pestana = array("logo_pestana_temporal"=>$request->file("pestana"));
		$logo_navegacion = array("logo_navegacion_temporal"=>$request->file("nav"));

		/*----------  Recoge imágenes carrusel  ----------*/
		$indice = array('indice' => $request->input("indice"));

		/**
		 *
		 * Se hace una ciclo 'for' para la declaración y asignación de las diferentes define_syslog_variables
		 * debido a que el carrusel es una estructura dinamica.
		 *
		 */
		for ($i=0; $i <= $indice["indice"]; $i++) { 
			/*----------  Declaración e inicialización de variables de texto del carrusel  ----------*/
			${"categoria_".$i} = array('categoria-'.$i => $request->input("categoria-".$i));
			${"titulo_".$i} = array('titulo-'.$i => $request->input("titulo-".$i));
			${"texto_".$i} = array('texto-'.$i => $request->input("texto-".$i));

			/*----------  Declaración de arrays con variables de imágenes viejas   ----------*/
			${"boton1_actual_".$i} = array('boton-1-actual-'.$i => $request->input("boton-1-actual-".$i));
			${"boton2_actual_".$i} = array('boton-2-actual-'.$i => $request->input("boton-2-actual-".$i));
			${"fotoDelante_actual_".$i} = array('foto-delante-actual-'.$i => $request->input("foto-delante-actual-".$i));
			${"fondo_actual_".$i} = array('fondo-actual-'.$i => $request->input("fondo-actual-".$i));

			/*----------  Declaración de arrays con variables de imágenes nuevas   ----------*/
			${"boton1_".$i} = array('boton-1-temporal-'.$i => $request->file("boton-1-".$i));
			${"boton2_".$i} = array('boton-2-temporal-'.$i => $request->file("boton-2-".$i));
			${"fotoDelante_".$i} = array('foto-delante-temporal-'.$i => $request->file("foto-delante-".$i));
			${"fondo_".$i} = array('fondo-temporal-'.$i => $request->file("fondo-".$i));
		}

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
    			"redes_sociales" => 'required',
    			"direccion" => 'required|regex:/^[+\\#\\;\\-\\_\\*\\"\\:\\,\\.\\@\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"telefono" => 'required|regex:/^[+\\0-9 ]+$/i',
    			"celular" => 'required|regex:/^[+\\0-9 ]+$/i',
    			"email" => 'required|regex:/^[-\\_\\.\\@\\0-9a-zA-Z]+$/i',
    			"logo_pestana_actual" => 'required',
    			"logo_navegacion_actual" => 'required'
			]);

			/*==================================================================
			=            Sección de validación de imagenes de logos            =
			==================================================================*/
			
			/*----------  Validar logo navegación  ----------*/
			if($logo_navegacion["logo_navegacion_temporal"] != ""){
                $validarLogo_navegacion = \Validator::make($logo_navegacion, [
                "logo_navegacion_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarLogo_navegacion->fails()){
                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
                }
            }

            /*----------  Validar logo pestaña  ----------*/
            if($logo_pestana["logo_pestana_temporal"] != ""){
                $validarLogo_pestana = \Validator::make($logo_pestana, [
                "logo_pestana_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarLogo_pestana->fails()){
                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
                }
            }
			
			/*=====  End of Sección de validación de imagenes de logos  ======*/
			
			/*========================================================
			=            Validación imágenes del Carrusel            =
			========================================================*/

			/**
			 *
			 * Se hace una ciclo 'for' para la declaración y asignación de las diferentes define_syslog_variables
			 * debido a que el carrusel es una estructura dinamica.
			 *
			 */
			for ($i=0; $i <= $indice["indice"]; $i++) { 
				/*----------  Validación boton # 1  ----------*/
				if(${"boton1_".$i}["boton-1-temporal-".$i] != ""){
	                ${"validarBoton1_".$i} = \Validator::make(${"boton1_".$i}, [
	                "boton-1-temporal-".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

	                if(${"validarBoton1_".$i}->fails()){
	                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
	                }
	            }

	            /*----------  Validación boton # 2  ----------*/
				if(${"boton2_".$i}["boton-2-temporal-".$i] != ""){
	                ${"validarBoton2_".$i} = \Validator::make(${"boton2_".$i}, [
	                "boton-2-temporal-".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

	                if(${"validarBoton2_".$i}->fails()){
	                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
	                }
	            }

	            /*----------  Validación foto delante  ----------*/
				if(${"fotoDelante_".$i}["foto-delante-temporal-".$i] != ""){
	                ${"validarFotoDelante_".$i} = \Validator::make(${"fotoDelante_".$i}, [
	                "foto-delante-temporal-".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

	                if(${"validarFotoDelante_".$i}->fails()){
	                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
	                }
	            }

	            /*----------  Validación fondo(background)  ----------*/
				if(${"fondo_".$i}["fondo-temporal-".$i] != ""){
	                ${"validarFondo_".$i} = \Validator::make(${"fondo_".$i}, [
	                "fondo-temporal-".$i => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

	                if(${"validarFondo_".$i}->fails()){
	                    return redirect("/pagina_web/carrusel")->with("no-validacion-imagen", "");
	                }
	            }
			}
			/*=====  End of Validación imágenes del Carrusel  ======*/
			
			



			if ($validar->fails()) {
				return redirect("/pagina_web/carrusel")->with("no-validacion", "");
			}else{
				/*==================================================================
				=            Eliminar y subir logos nuevos al servidor            =
				==================================================================*/
				
				//subir al servidor las imagenes
				if($logo_pestana["logo_pestana_temporal"] != ""){
					//unlink($datos["logo_pestana_actual"]);
					$aleatorio = mt_rand(1000, 9999);
					$ruta_logo_pestana = "vistas/images/pagina_web/".$aleatorio.".".$logo_pestana["logo_pestana_temporal"]->guessExtension();
					//move_uploaded_file($logo_pestana["logo_pestana_temporal"], $ruta_logo_pestana);

					/*----------  Redimensionar imagen de logo pestaña  ----------*/
					list($ancho, $alto) = getimagesize($logo_pestana["logo_pestana_temporal"]);
                    $nuevoAncho = 50;
                    $nuevoAlto = 50;

                    if($logo_pestana["logo_pestana_temporal"]->guessExtension() == "jpeg"){

                        $origen = imagecreatefromjpeg($logo_pestana["logo_pestana_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta_logo_pestana);

                    }

                    if($logo_pestana["logo_pestana_temporal"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($logo_pestana["logo_pestana_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta_logo_pestana);
                        
                    }
				}else{

                    $ruta_logo_pestana = $datos["logo_pestana_actual"];
                }

				if($logo_navegacion["logo_navegacion_temporal"] != ""){
					//unlink($datos["logo_navegacion_actual"]);
					$aleatorio = mt_rand(1000, 9999);
					$ruta_logo_navegacion = "vistas/images/pagina_web/".$aleatorio.".".$logo_navegacion["logo_navegacion_temporal"]->guessExtension();
					//move_uploaded_file($logo_navegacion["logo_navegacion_temporal"], $ruta_logo_navegacion);

					/*----------  Redimensionar imagen de logo navegación  ----------*/
					list($ancho, $alto) = getimagesize($logo_navegacion["logo_navegacion_temporal"]);
                    $nuevoAncho = 100;
                    $nuevoAlto = 100;

                    if($logo_navegacion["logo_navegacion_temporal"]->guessExtension() == "jpeg"){

                        $origen = imagecreatefromjpeg($logo_navegacion["logo_navegacion_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta_logo_navegacion);

                    }

                    if($logo_navegacion["logo_navegacion_temporal"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($logo_navegacion["logo_pestana_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta_logo_navegacion);
                        
                    }
				}else{

                    $ruta_logo_navegacion = $datos["logo_navegacion_actual"];
                }
				
				/*=====  End of Eliminar y subir logos nuevos al servidor  ======*/
				
				

				/*===========================================================================
				=            Eliminar y subir imagenes del carrusel del servidor            =
				===========================================================================*/

				/*----------  Inicialización de nuevo dato JSON del carrusel  ----------*/
				$carrusel = "[{";
				
				for ($i=0; $i <= $indice["indice"]; $i++) {

					/*----------  Actualizar boton # 1  ----------*/
					if(${"boton1_".$i}["boton-1-temporal-".$i] != ""){
		                //unlink(${"boton1_actual_".$i}["boton-1-actual-".$i]);
						$aleatorio = mt_rand(1000, 9999);
						${"rutaBoton_1".$i} = "vistas/images/pagina_web/carrusel/".$aleatorio.".".${"boton1_".$i}["boton-1-temporal-".$i]->guessExtension();
						//move_uploaded_file(${"boton1_".$i}["boton-1-temporal-".$i], ${"rutaBoton_1".$i});
						list($ancho, $alto) = getimagesize(${"boton1_".$i}["boton-1-temporal-".$i]);
	                    $nuevoAncho = 400;
	                    $nuevoAlto = 118;

	                    /*----------  Redimensionar imagenes de boton # 1  ----------*/
	                    
	                    if((${"boton1_".$i}["boton-1-temporal-".$i]->guessExtension() == "jpeg") || ${"boton1_".$i}["boton-1-temporal-".$i]->guessExtension() == "jpg"){

	                        $origen = imagecreatefromjpeg(${"boton1_".$i}["boton-1-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagejpeg($destino, ${"rutaBoton_1".$i});

	                    }

	                    if(${"boton1_".$i}["boton-1-temporal-".$i]->guessExtension() == "png"){

	                        $origen = imagecreatefrompng(${"boton1_".$i}["boton-1-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagealphablending($destino, FALSE); 
	                        imagesavealpha($destino, TRUE);
	                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagepng($destino, ${"rutaBoton_1".$i});
	                        
	                    }
		            }else{
		            	${"rutaBoton_1".$i} = ${"boton1_actual_".$i}["boton-1-actual-".$i];
		            }

		            /*----------  Actualizar boton # 2  ----------*/
					if(${"boton2_".$i}["boton-2-temporal-".$i] != ""){
		                //unlink(${"boton2_actual_".$i}["boton-2-actual-".$i]);
						$aleatorio = mt_rand(1000, 9999);
						${"rutaBoton_2".$i} = "vistas/images/pagina_web/carrusel/".$aleatorio.".".${"boton2_".$i}["boton-2-temporal-".$i]->guessExtension();
						//move_uploaded_file(${"boton2_".$i}["boton-2-temporal-".$i], ${"rutaBoton_2".$i});

						/*----------  Redimensionar imagenes de boton # 2  ----------*/
						list($ancho, $alto) = getimagesize(${"boton2_".$i}["boton-2-temporal-".$i]);
	                    $nuevoAncho = 400;
	                    $nuevoAlto = 118;

	                    if((${"boton2_".$i}["boton-2-temporal-".$i]->guessExtension() == "jpeg") || (${"boton2_".$i}["boton-2-temporal-".$i]->guessExtension() == "jpg")){

	                        $origen = imagecreatefromjpeg(${"boton2_".$i}["boton-2-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagejpeg($destino, ${"rutaBoton_2".$i});

	                    }

	                    if(${"boton2_".$i}["boton-2-temporal-".$i]->guessExtension() == "png"){

	                        $origen = imagecreatefrompng(${"boton2_".$i}["boton-2-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagealphablending($destino, FALSE); 
	                        imagesavealpha($destino, TRUE);
	                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagepng($destino, ${"rutaBoton_2".$i});
	                        
	                    }
		            }else{
		            	${"rutaBoton_2".$i} = ${"boton2_actual_".$i}["boton-2-actual-".$i];
		            }

		            /*----------  Actualizar foto delante  ----------*/
					if(${"fotoDelante_".$i}["foto-delante-temporal-".$i] != ""){
		                //unlink(${"fotoDelente_actual_".$i}["foto-delante-actual-".$i]);
						$aleatorio = mt_rand(1000, 9999);
						${"rutaFoto_Delante".$i} = "vistas/images/pagina_web/carrusel/".$aleatorio.".".${"fotoDelante_".$i}["foto-delante-temporal-".$i]->guessExtension();
						//move_uploaded_file(${"fotoDelante_".$i}["foto-delante-temporal-".$i], ${"rutaFoto_Delante".$i});
						list($ancho, $alto) = getimagesize(${"fotoDelante_".$i}["foto-delante-temporal-".$i]);
	                    $nuevoAncho = 600;
	                    $nuevoAlto = 500;

	                    /*----------  Redimensionar imagenes de foto delante  ----------*/
	                    if((${"fotoDelante_".$i}["foto-delante-temporal-".$i]->guessExtension() == "jpeg") || ${"fotoDelante_".$i}["foto-delante-temporal-".$i]->guessExtension() == "jpg"){

	                        $origen = imagecreatefromjpeg(${"fotoDelante_".$i}["foto-delante-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagejpeg($destino, ${"rutaFoto_Delante".$i});

	                    }

	                    if(${"fotoDelante_".$i}["foto-delante-temporal-".$i]->guessExtension() == "png"){

	                        $origen = imagecreatefrompng(${"fotoDelante_".$i}["foto-delante-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagealphablending($destino, FALSE); 
	                        imagesavealpha($destino, TRUE);
	                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagepng($destino, ${"rutaFoto_Delante".$i});
	                        
	                    }
		            }else{
		            	${"rutaFoto_Delante".$i} = ${"fotoDelante_actual_".$i}["foto-delante-actual-".$i];
		            }

		            /*----------  Actualizar fondo(background)  ----------*/
					if(${"fondo_".$i}["fondo-temporal-".$i] != ""){
		                //unlink(${"fondo_actual_".$i}["fondo-actual-".$i]);
						$aleatorio = mt_rand(1000, 9999);
						${"rutaFondo".$i} = "vistas/images/pagina_web/carrusel/".$aleatorio.".".${"fondo_".$i}["fondo-temporal-".$i]->guessExtension();
						//move_uploaded_file(${"fondo_".$i}["fondo-temporal-".$i], ${"rutaFondo".$i});

						/*----------  Redimensionar imagenes de fondo(background)  ----------*/
						list($ancho, $alto) = getimagesize(${"fondo_".$i}["fondo-temporal-".$i]);
	                    $nuevoAncho = 2000;
	                    $nuevoAlto = 1333;

	                    if((${"fondo_".$i}["fondo-temporal-".$i]->guessExtension() == "jpeg") || (${"fondo_".$i}["fondo-temporal-".$i]->guessExtension() == "jpg")){

	                        $origen = imagecreatefromjpeg(${"fondo_".$i}["fondo-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagejpeg($destino, ${"rutaFondo".$i});

	                    }

	                    if(${"fondo_".$i}["fondo-temporal-".$i]->guessExtension() == "png"){

	                        $origen = imagecreatefrompng(${"fondo_".$i}["fondo-temporal-".$i]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagealphablending($destino, FALSE); 
	                        imagesavealpha($destino, TRUE);
	                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagepng($destino, ${"rutaFondo".$i});
	                        
	                    }
		            }else{
		            	${"rutaFondo".$i} = ${"fondo_actual_".$i}["fondo-actual-".$i];
		            }

		            /**
		             *
		             * Se arma el carrusel con los datos actualizados
		             *
		             */
		            
		            if($i == $indice["indice"]){
		            	$carrusel = $carrusel."\n\t".'"categoria": "'.${'categoria_'.$i}['categoria-'.$i].'",'."\n\t".'"titulo": "'.${'titulo_'.$i}['titulo-'.$i].'",'."\n\t".'"texto": "'.${'texto_'.$i}['texto-'.$i].'",'."\n\t".'"boton-1": "'.${"rutaBoton_1".$i}.'",'."\n\t".'"boton-2": "'.${"rutaBoton_2".$i}.'",'."\n\t".'"foto-delante": "'.${"rutaFoto_Delante".$i}.'",'."\n\t".'"fondo": "'.${"rutaFondo".$i}.'"'."\n".'}]';
		            }else{
		            	$carrusel = $carrusel."\n\t".'"categoria": "'.${'categoria_'.$i}['categoria-'.$i].'",'."\n\t".'"titulo": "'.${'titulo_'.$i}['titulo-'.$i].'",'."\n\t".'"texto": "'.${'texto_'.$i}['texto-'.$i].'",'."\n\t".'"boton-1": "'.${"rutaBoton_1".$i}.'",'."\n\t".'"boton-2": "'.${"rutaBoton_2".$i}.'",'."\n\t".'"foto-delante": "'.${"rutaFoto_Delante".$i}.'",'."\n\t".'"fondo": "'.${"rutaFondo".$i}.'"'."\n".'},{';
		            }
		            
				}

				
				/*=====  End of Eliminar y subir imagenes del carrusel del servidor  ======*/

				//$paginaweb = PaginaWebModel::all();
				$contacto = $datos["direccion"].'^'.$datos["telefono"].'^'.$datos["celular"].'^'.$datos["email"];
				//echo '<pre>'; print_r($contacto); echo '</pre>';

				/**
				 *
				 * En esta sección se colocan despues de la validación los datos nuevos en un array
				 * para mandarlos a la base de datos
				 *
				 */
				
    			$actualizar = array("dominio"=> $datos["dominio"],
    				                "servidor"=> $datos["servidor"],
    				                "titulo_pestana" => $datos["titulo_pestana"],
    				                "titulo_pagina" => $datos["titulo_pagina"],
    				                "titulo_navegacion" => $datos["titulo_navegacion"],
    				                "descripcion" => $datos["descripcion"],
    				            	"palabras_claves" => json_encode(explode(",", $datos["palabras_claves"])),
    				            	"redes_sociales" => $datos["redes_sociales"],
    								"contacto" => json_encode(explode("^", $contacto)),
    								"logo_navegacion" => $ruta_logo_navegacion,
    								"logo_pestana" => $ruta_logo_pestana,
    								"carrusel" => $carrusel);

    			$paginaweb = PaginaWebModel::where("id", $id)->update($actualizar);
    			return redirect("/pagina_web/carrusel")->with("ok-editar","");
			}
		}else{
			return redirect("/pagina_web/carrusel")->with("error","");
		}
		
	}
	
	/*=====  End of Actualizar registro  ======*/
	
    
}


