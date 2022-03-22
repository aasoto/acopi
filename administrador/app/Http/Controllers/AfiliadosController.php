<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\EmpleadosAfiliadosModel;
use App\SectorEmpresaModel;
use App\PaginaWebModel;
//Libería para hacer inner join
use Illuminate\Support\Facades\DB;

class AfiliadosController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros de la tabla            =
	===============================================================*/

	public function index() {
		if (request()->ajax()) {
    		return datatables()->of(RepresentanteEmpresaModel::all()) 
    		->addColumn('nombre', function($data){
    			
    			$nombre = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre.' ';

				$empresas = EmpresasModel::where("cc_rprt_legal", $data->cc_rprt_legal)->get();
				$total_empresas = count($empresas);
				for ($i=0; $i < $total_empresas; $i++) { 
					$nombre = $nombre.'<i class="fas fa-check-circle" style="color: #28A745;"></i>';
				}
				return $nombre;
			})


			->addColumn('acciones', function($data){
    				$acciones = '
    				<div class="btn-group">
						<a estoy="'.url()->current().'/" tipo_documento_rprt="'.$data->tipo_documento_rprt.'" cc_rprt_legal="'.$data->cc_rprt_legal.'" primer_nombre="'.$data->primer_nombre.'" segundo_nombre="'.$data->segundo_nombre.'" primer_apellido="'.$data->primer_apellido.'" segundo_apellido="'.$data->segundo_apellido.'" fecha_nacimiento="'.$data->fecha_nacimiento.'" sexo_rprt="'.$data->sexo_rprt.'" email_rprt="'.$data->email_rprt.'" telefono_rprt="'.$data->telefono_rprt.'" foto_rprt="'.$data->foto_rprt.'" title="Ver más" class="btn btn-primary btn-sm verMasAfiliado">
							<i class="fas fa-eye"></i>
						</a>
						<a href="http://localhost/acopi/administrador/public/afiliados/empresas/'.$data->id_rprt_legal.'" title="Agregar nueva empresa" class="btn btn-success btn-sm">
							<i class="fas fa-plus"></i>
						</a>
						<a href="'.url()->current().'/'.$data->id_rprt_legal.'" title="Editar" class="btn btn-warning btn-sm editarAfiliado">
							<i class="fas fa-pencil-alt text-white"></i>
						<a>
						<button class="btn btn-danger btn-sm eliminarAfiliado" title="Eliminar" action="'.url()->current().'/'.$data->id_rprt_legal.'" method="DELETE" foto="'.$data->foto_rprt.'" cedula="'.$data->foto_cedula_rprt.'" pagina="afiliados/general" token="'.csrf_token().'">
						<i class="fas fa-trash-alt"></i>
						</button>

	  				</div>';
    			
				return $acciones;
			})

			  ->rawColumns(['nombre', 'acciones'])
			  -> make(true);

		}

    	$afiliados = RepresentanteEmpresaModel::all();
    	$pagina_web = PaginaWebModel::all();
    	return view("paginas.afiliados.general", array("afiliados"=>$afiliados, "pagina_web"=>$pagina_web));
	}
	
	/* public function index(){

		$join = DB::table('empresas')->join('representante_empresa','empresas.cc_rprt_legal','=','representante_empresa.cc_rprt_legal')->select('empresas.razon_social','representante_empresa.*')->get();   

    	if (request()->ajax()) {
    		return datatables()->of(RepresentanteEmpresaModel::all()) 
    		->addColumn('nombre', function($data){
    			
    				$nombre = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre;

			

				return $nombre;
			})

    		->addColumn('sexo_rprt', function($data){
    			if ($data->sexo_rprt == "m") {
    				$sexo_rprt = "Masculino";
    			} elseif ($data->sexo_rprt == "f") {
    				$sexo_rprt = "Femenino";
    			} else {
    				$sexo_rprt = "sin verficar";
    			}
				return $sexo_rprt;
			})

    		->addColumn('empresas', function($data){
    			
    			$empresas = " ";
    				//$empresas = $id->razon_social;

			

				return $empresas;
			})

			->addColumn('acciones', function($data){
    				$acciones = '
    				<div class="btn-group">
								
						<a href="'.url()->current().'/'.$data->id_rprt_legal.'" class="btn btn-warning btn-sm">
							<i class="fas fa-pencil-alt text-white"></i>
						</a>

						<button class="btn btn-danger btn-sm eliminarAfiliado" action="'.url()->current().'/'.$data->id_rprt_legal.'" method="DELETE" foto="'.$data->foto_rprt.'" cedula="'.$data->foto_cedula_rprt.'" pagina="afiliados/general" token="'.csrf_token().'">
						<i class="fas fa-trash-alt"></i>
						</button>

	  				</div>';
    			
				return $acciones;
			})

			->addColumn('nueva_empresa', function($data){
    				$nueva_empresa = '
						<a href="http://localhost/acopi/administrador/public/afiliados/empresas/'.$data->id_rprt_legal.'" class="btn btn-success">
							<i class="fas fa-plus"></i> Agregar empresa
						</a>';
    			
				return $nueva_empresa;
			})
			  ->rawColumns(['nombre','sexo_rprt','empresas','acciones', 'nueva_empresa'])
			  -> make(true);

		}

    	$afiliados = RepresentanteEmpresaModel::all();
    	return view("paginas.afiliados.general");
    } */
	
	/*=====  End of Mostrar todos los registros de la tabla  ======*/

	/*===============================================
	=            Ingresar nuevo afiliado            =
	===============================================*/
	
	public function store(Request $request) {
		$datos = array(
			'tipo_documento' => $request->input("tipo_documento"),
			'numero_documento' => $request->input("numero_documento"),
			'primer_nombre' => $request->input("primer_nombre"),
			'segundo_nombre' => $request->input("segundo_nombre"),
			'primer_apellido' => $request->input("primer_apellido"),
			'segundo_apellido' => $request->input("segundo_apellido"),
			'sexo' => $request->input("sexo"),
			'fecha_nacimiento' => $request->input("fecha_nacimiento"),
			'correo_electronico' => $request->input("correo_electronico"),
			'telefono' => $request->input("telefono"),
			'foto' => $request->file("foto"),
			'archivo_documento' => $request->file("archivo_documento")
		);

		/*echo '<pre>'; print_r($datos); echo '</pre>';
		return;*/

		if (!empty($datos)) {
			$validar = \Validator::make($datos, [
				'tipo_documento' => 'required|regex:/^[a-z]+$/i',
				'numero_documento' => 'required|regex:/^[0-9]+$/i',
				'primer_nombre' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
				'primer_apellido' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
				'segundo_apellido' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
				'sexo' => 'required|regex:/^[a-z]+$/i',
				'fecha_nacimiento' => 'required|regex:/^[-\\_\\:\\.\\0-9 ]+$/i',
				'archivo_documento' => 'required|image|mimes:jpg,jpeg,png|max:2000000'
			]);

			if ($validar->fails()) {
				return redirect("/afiliados/general")->with("no-validacion", "");
			} else {

				if (!empty($datos["segundo_nombre"])) {
					$validar_Segundo_Apellido = \Validator::make($datos, ['segundo_nombre' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
					if ($validar_Segundo_Apellido->fails()) {
						return redirect("/afiliados/general")->with("no-validacion", "");
					}
				}
				if (!empty($datos["correo_electronico"])) {
					$validar_Correo_Electronico = \Validator::make($datos, ['correo_electronico' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i']);
					if ($validar_Correo_Electronico->fails()) {
						return redirect("/afiliados/general")->with("no-validacion", "");
					}
				}
				if (!empty($datos["telefono"])) {
					$validar_Telefono = \Validator::make($datos, ['telefono' => 'required|regex:/^[+\\0-9]+$/i']);
					if ($validar_Telefono->fails()) {
						return redirect("/afiliados/general")->with("no-validacion", "");
					}
				}

				if (!empty($datos["foto"])) {
					$validar_Foto = \Validator::make($datos, ['foto' => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
					if ($validar_Foto->fails()) {
						return redirect("/afiliados/general")->with("no-validacion", "");
					} else {
						$aleatorio = mt_rand(10000,99999);	

			 			$rutaFoto = "vistas/images/afiliados/fotos/".$aleatorio.".".$datos["foto"]->guessExtension();

			 			//move_uploaded_file($foto["foto"], $ruta);
			 			/*----------  Redimensionar foto de perfil  ----------*/
						list($ancho, $alto) = getimagesize($datos["foto"]);
	                    $nuevoAncho = 200;
	                    $nuevoAlto = 200;

	                    if(($datos["foto"]->guessExtension() == "jpeg") || ($datos["foto"]->guessExtension() == "jpg")){

	                        $origen = imagecreatefromjpeg($datos["foto"]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagejpeg($destino, $rutaFoto);

	                    }

	                    if($datos["foto"]->guessExtension() == "png"){

	                        $origen = imagecreatefrompng($datos["foto"]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagealphablending($destino, FALSE); 
	                        imagesavealpha($destino, TRUE);
	                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagepng($destino, $rutaFoto);
	                        
	                    }
					}
					
				} else {
					$rutaFoto =  "";
				}

				if (!empty($datos["archivo_documento"])) {
					$aleatorio = mt_rand(10000,99999);	

		 			$rutaDocumento = "vistas/images/afiliados/documentos/".$aleatorio.".".$datos["archivo_documento"]->guessExtension();

		 			if(($datos["archivo_documento"]->guessExtension() == "jpeg") || ($datos["archivo_documento"]->guessExtension() == "jpg") || ($datos["archivo_documento"]->guessExtension() == "png")) {
		 				move_uploaded_file($datos["archivo_documento"], $rutaDocumento);
		 			}

				} else {
					$rutaDocumento =  "";
				}

				$afiliado = new RepresentanteEmpresaModel();

				$afiliado->tipo_documento_rprt = $datos["tipo_documento"];
				$afiliado->cc_rprt_legal = $datos["numero_documento"];
				$afiliado->primer_nombre = $datos["primer_nombre"];
				$afiliado->segundo_nombre = $datos["segundo_nombre"];
				$afiliado->primer_apellido = $datos["primer_apellido"];
				$afiliado->segundo_apellido = $datos["segundo_apellido"];
				$afiliado->fecha_nacimiento = $datos["fecha_nacimiento"];
				$afiliado->sexo_rprt = $datos["sexo"];
				$afiliado->email_rprt = $datos["correo_electronico"];
				$afiliado->telefono_rprt = $datos["telefono"];
				$afiliado->foto_rprt = $rutaFoto;
				$afiliado->foto_cedula_rprt = $rutaDocumento;

				$afiliado->save();

				return redirect("/afiliados/general")->with("ok-crear", "");

			}
		} else {
			return redirect("/afiliados/general")->with("error", "");
		}
	}
	
	/*=====  End of Ingresar nuevo afiliado  ======*/

	/*===========================================================
    =            Mostra un solo registro de la tabla            =
    ===========================================================*/
    
    public function show($id){

        $afiliado = RepresentanteEmpresaModel::where("id_rprt_legal", $id)->get();
        $afiliados = RepresentanteEmpresaModel::all();
        $pagina_web = PaginaWebModel::all();
        
        if(count($afiliado) != 0){

            return view("paginas.afiliados.general", array("status"=>200, "afiliado"=>$afiliado, "afiliados"=>$afiliados, "pagina_web"=>$pagina_web));
        
        }else{ 

            return view("paginas.afiliados.general", array("status"=>404, "afiliados"=>$afiliados, "pagina_web"=>$pagina_web));
        }
    }
    
    /*=====  End of Mostra un solo registro de la tabla  ======*/

    /*===========================================
    =            Actualizar afiliado            =
    ===========================================*/
    
    public function update($id, Request $request) {
    	$datos = array(
			'tipo_documento' => $request->input("tipo_documento"),
			'numero_documento' => $request->input("numero_documento"),
			'primer_nombre' => $request->input("primer_nombre"),
			'segundo_nombre' => $request->input("segundo_nombre"),
			'primer_apellido' => $request->input("primer_apellido"),
			'segundo_apellido' => $request->input("segundo_apellido"),
			'sexo' => $request->input("sexo"),
			'fecha_nacimiento' => $request->input("fecha_nacimiento"),
			'correo_electronico' => $request->input("correo_electronico"),
			'telefono' => $request->input("telefono"),
			'foto' => $request->input("foto_actual"),
			'archivo_documento' => $request->input("archivo_documento_actual")
		);
		/*echo '<pre>'; print_r($datos); echo '</pre>';
						return;*/
		$archivos = array(
			'foto' => $request->file("foto"),
			'cedula' => $request->file("archivo_documento")
		);

		if (!empty($datos)) {
			
			$validar = \Validator::make($datos, [
				'tipo_documento' => 'required|regex:/^[a-z]+$/i',
				'numero_documento' => 'required|regex:/^[0-9]+$/i',
				'primer_nombre' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
				'primer_apellido' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
				'segundo_apellido' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
				'sexo' => 'required|regex:/^[a-z]+$/i',
				'fecha_nacimiento' => 'required|regex:/^[-\\_\\:\\.\\0-9 ]+$/i',
				'archivo_documento' => 'required|regex:/^[=\\/\\&\\$\\-\\_\\?\\!\\:\\.\\0-9a-zA-Z]+$/i'
			]);

			if ($validar->fails()) {
				
				return redirect("/afiliados/general")->with("no-validacion", "");
			} else {

				if (!empty($datos["segundo_nombre"])) {
					$validar_Segundo_Nombre = \Validator::make($datos, ['segundo_nombre' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
					if ($validar_Segundo_Nombre->fails()) {
						
						return redirect("/afiliados/general")->with("no-validacion", "");
					}
				}
				if (!empty($datos["correo_electronico"])) {
					$validar_Correo_Electronico = \Validator::make($datos, ['correo_electronico' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i']);
					if ($validar_Correo_Electronico->fails()) {
						
						return redirect("/afiliados/general")->with("no-validacion", "");
					}
				}
				if (!empty($datos["telefono"])) {
					$validar_Telefono = \Validator::make($datos, ['telefono' => 'required|regex:/^[+\\0-9]+$/i']);
					if ($validar_Telefono->fails()) {
						
						return redirect("/afiliados/general")->with("no-validacion", "");
					}
				}

				if (!empty($archivos["foto"])) {
					$validar_Foto = \Validator::make($archivos, ['foto' => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
					if ($validar_Foto->fails()) {
						
						return redirect("/afiliados/general")->with("no-validacion", "");
					} else {
						if (!empty($datos["foto"])) {
							unlink($datos["foto"]);
						}
						$aleatorio = mt_rand(10000,99999);	

			 			$rutaFoto = "vistas/images/afiliados/fotos/".$aleatorio.".".$archivos["foto"]->guessExtension();

			 			//move_uploaded_file($foto["foto"], $ruta);
			 			/*----------  Redimensionar foto de perfil  ----------*/
						list($ancho, $alto) = getimagesize($archivos["foto"]);
	                    $nuevoAncho = 200;
	                    $nuevoAlto = 200;

	                    if(($archivos["foto"]->guessExtension() == "jpeg") || ($archivos["foto"]->guessExtension() == "jpg")){

	                        $origen = imagecreatefromjpeg($archivos["foto"]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagejpeg($destino, $rutaFoto);

	                    }

	                    if($archivos["foto"]->guessExtension() == "png"){

	                        $origen = imagecreatefrompng($archivos["foto"]);
	                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	                        imagealphablending($destino, FALSE); 
	                        imagesavealpha($destino, TRUE);
	                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	                        imagepng($destino, $rutaFoto);
	                        
	                    }
					}
					
				} else {
					$rutaFoto =  $datos["foto"];
				}

				if (!empty($archivos["cedula"])) {
					$validar_Archivo_Documento = \Validator::make($archivos, ['cedula' => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
					if ($validar_Archivo_Documento->fails()) {
						return redirect("/afiliados/general")->with("no-validacion", "");
					} else {
						if (!empty($datos["archivo_documento"])) {
							unlink($datos["archivo_documento"]);
						}
						$aleatorio = mt_rand(10000,99999);	

			 			$rutaDocumento = "vistas/images/afiliados/documentos/".$aleatorio.".".$archivos["cedula"]->guessExtension();

			 			if(($archivos["cedula"]->guessExtension() == "jpeg") || ($archivos["cedula"]->guessExtension() == "jpg") || ($archivos["cedula"]->guessExtension() == "png")) {
			 				move_uploaded_file($archivos["cedula"], $rutaDocumento);
			 			} else {
			 				return redirect("/afiliados/general")->with("no-validacion", "");
			 			}
					}
					
				} else {
					$rutaDocumento = $datos["archivo_documento"];
				}

				$actualizar = array(
					'tipo_documento_rprt' => $datos["tipo_documento"],
					'cc_rprt_legal' => $datos["numero_documento"],
					'primer_nombre' => $datos["primer_nombre"],
					'segundo_nombre' => $datos["segundo_nombre"],
					'primer_apellido' => $datos["primer_apellido"],
					'segundo_apellido' => $datos["segundo_apellido"],
					'fecha_nacimiento' => $datos["fecha_nacimiento"],
					'sexo_rprt' => $datos["sexo"],
					'email_rprt' => $datos["correo_electronico"],
					'telefono_rprt' => $datos["telefono"],
					'foto_rprt' => $rutaFoto,
					'foto_cedula_rprt' => $rutaDocumento
				);

				$afiliado = RepresentanteEmpresaModel::where("id_rprt_legal", $id)->update($actualizar);

    			return redirect("/afiliados/general")->with("ok-editar", "");
			}

		} else {
			return redirect("/afiliados/general")->with("error", "");
		}
    }
    
    /*=====  End of Actualizar afiliado  ======*/

    /*=========================================
    =            Eliminar Afiliado            =
    =========================================*/
    
    public function destroy($id, Request $request){

    	$validar = RepresentanteEmpresaModel::where("id_rprt_legal", $id)->get();    	
    	if(!empty($validar)){
    		$afiliado = RepresentanteEmpresaModel::where("id_rprt_legal",$validar[0]["id_rprt_legal"])->delete();
    		return "ok";   	
    	}else{
    		return redirect("/afiliados/general")->with("no-borrar", "");
    	}
    }
    
    /*=====  End of Eliminar Afiliado  ======*/
    
	
}
