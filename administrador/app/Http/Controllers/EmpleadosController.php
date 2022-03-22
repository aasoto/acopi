<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpleadosModel;
use App\TipoDocumentoModel;
use App\GeneroModel;
use App\RolesModel;
use App\PaginaWebModel;

class EmpleadosController extends Controller
{
    public function index(){
    	$generos = GeneroModel::all();
    	$tipos_documentos = TipoDocumentoModel::all();
    	$roles = RolesModel::all();

    	if (request()->ajax()) {
    		return datatables()->of(EmpleadosModel::all()) 

    		->addColumn('type_document', function($data){

    				$validar_type_document = TipoDocumentoModel::where("codigo_doc", $data->tipo_documento)->get();
    			
    				if(!empty($validar_type_document)){
    					$type_document = $validar_type_document[0]["nombre_doc"];
    				} else {
    					$type_document = "Sin verficar";
    				}

				return $type_document;
			})

    		->addColumn('nombre', function($data){
    			
    				$nombre = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre;

				return $nombre;
			})

    		->addColumn('sexo', function($data){

    				$validar_sexo = GeneroModel::where("codigo_genero", $data->sexo)->get();
    			
    				if(!empty($validar_sexo)){
    					$sexo = $validar_sexo[0]["nombre_genero"];
    				} else {
    					$sexo = "Sin verficar";
    				}

				return $sexo;
			})

    		->addColumn('rol', function($data){

    				$validar_rol = RolesModel::where("id", $data->id_rol)->get();
    			
    				if(!empty($validar_rol)){
    					$rol = $validar_rol[0]["rol"]." - ".$data->estado;
    				} else {
    					$rol = "Sin verficar - ".$data->estado;
    				}

				return $rol;
			})

    		->addColumn('ver_archivos', function($data){
    				$pagina_web = PaginaWebModel::all();
    				$ver_archivos = "<a href='".$pagina_web[0]["servidor"]."".$data->documentos_empleado."'>Ver documentación</a>";
    				return $ver_archivos;
			})

			->addColumn('procedimientos', function($data){
    				$procedimientos = '
    				<div class="btn-group">
						<a title="Ver más" class="btn btn-primary btn-sm verMasEmpleado">
							<i class="fas fa-eye"></i>
						</a>
						<a href="'.url()->current().'/'.$data->id.'" title="Editar" class="btn btn-warning btn-sm editarAfiliado">
							<i class="fas fa-pencil-alt text-white"></i>
						<a>
						<button class="btn btn-danger btn-sm eliminarEmpleado" title="Eliminar" action="'.url()->current().'/'.$data->id.'" method="DELETE" archivos="'.$data->documentos_empleado.'" cedula="'.$data->documentos_empleado.'" pagina="empleados/general" token="'.csrf_token().'">
						<i class="fas fa-trash-alt"></i>
						</button>

	  				</div>';
    			
				return $procedimientos;
			})

			  ->rawColumns(['type_document', 'nombre', 'sexo', 'rol', 'ver_archivos', 'procedimientos'])
			  -> make(true);

		}

    	return view("paginas.empleados.general", array("generos" => $generos, "tipos_documentos" => $tipos_documentos, "roles" => $roles));
    }

    public function store(Request $request){
    	$datos = array(
    		'tipo_documento' => $request->input("tipo_documento"),
    		'num_documento' => $request->input("num_documento"),
    		'primer_nombre' => $request->input("primer_nombre"),
    		'segundo_nombre' => $request->input("segundo_nombre"),
    		'primer_apellido' => $request->input("primer_apellido"),
    		'segundo_apellido' => $request->input("segundo_apellido"),
    		'genero' => $request->input("genero"),
    		'fecha_nacimiento' => $request->input("fecha_nacimiento"),
    		'id_rol' => $request->input("id_rol"),
    		'estado' => $request->input("estado"),
    		'archivos' => $request->file("archivos")
    	);

    	/*echo '<pre>'; print_r($datos); echo '</pre>';
		return;*/

		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"tipo_documento"=> "required|regex:/^[0-9a-zA-Z]+$/i",
    			"num_documento" => 'required|regex:/^[-\\.\\0-9a-zA-Z]+$/i',
    			"primer_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"primer_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"segundo_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"genero" => 'required|regex:/^[a-zA-Z]+$/i',
    			"fecha_nacimiento" => 'required|date',
    			"id_rol" => 'required|regex:/^[0-9]+$/i',
    			"estado" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
    		]);

    		if($validar->fails()){
    			return redirect("/empleados/general")->with("no-validacion", "");
    		}else{
    			if (!empty($datos["segundo_nombre"])) {
    				$validarSegundoNombre = \Validator::make($datos,[
    					"segundo_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
    				]);
    				if($validarSegundoNombre->fails()){
						return redirect("/empleados/general")->with("no-validacion", "");
					}
    			}
    			if (!empty($datos["archivos"])) {
    				if ($datos["archivos"]->guessExtension() == "zip") {
    					$aleatorio = mt_rand(1000000, 9999999);
						$ruta_archivos = "vistas/images/empleados/documentos/".$aleatorio.".".$datos["archivos"]->guessExtension();
						move_uploaded_file($datos["archivos"], $ruta_archivos);
    				} else {
    					return redirect("/empleados/general")->with("no-zip", "");
    				}
    			}

    			$empleado = new EmpleadosModel();

    			$empleado->tipo_documento = $datos["tipo_documento"];
    			$empleado->num_documento = $datos["num_documento"];
    			$empleado->primer_nombre = $datos["primer_nombre"];
    			$empleado->segundo_nombre = $datos["segundo_nombre"];
    			$empleado->primer_apellido = $datos["primer_apellido"];
    			$empleado->segundo_apellido = $datos["segundo_apellido"];
    			$empleado->sexo = $datos["genero"];
    			$empleado->fecha_nacimiento = $datos["fecha_nacimiento"];
    			$empleado->id_rol = $datos["id_rol"];
    			$empleado->estado = $datos["estado"];
    			$empleado->documentos_empleado = $ruta_archivos;

    			$empleado->save();

    			return redirect("/empleados/general")->with("ok-crear", "");
    		}


    	}else{

    		return redirect("/empleados/general")->with("error", "");
    	}
    }

    public function show($id){
        $empleado = EmpleadosModel::where("id", $id)->get();
        $empleados = EmpleadosModel::all();

        $generos = GeneroModel::all();
    	$tipos_documentos = TipoDocumentoModel::all();
    	$roles = RolesModel::all();
        
        if(count($empleado) != 0){

            return view("paginas.empleados.general", array("status"=>200, "empleado"=>$empleado, "empleados"=>$empleados, "generos" => $generos, "tipos_documentos" => $tipos_documentos, "roles" => $roles));
        
        }else{ 

            return view("paginas.empleados.general", array("status"=>404, "empleados"=>$empleados, "generos" => $generos, "tipos_documentos" => $tipos_documentos, "roles" => $roles));
        }
    }

    public function update($id, Request $request){
    	$datos = array(
    		'tipo_documento' => $request->input("tipo_documento"),
    		'num_documento' => $request->input("num_documento"),
    		'primer_nombre' => $request->input("primer_nombre"),
    		'segundo_nombre' => $request->input("segundo_nombre"),
    		'primer_apellido' => $request->input("primer_apellido"),
    		'segundo_apellido' => $request->input("segundo_apellido"),
    		'genero' => $request->input("genero"),
    		'fecha_nacimiento' => $request->input("fecha_nacimiento"),
    		'id_rol' => $request->input("id_rol"),
    		'estado' => $request->input("estado"),
    		'archivos_actuales' => $request->input("archivos_actuales"),
    		'archivos_nuevos' => $request->file("archivos")
    	);

    	/*echo '<pre>'; print_r($datos); echo '</pre>';
		return;*/

		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"tipo_documento"=> "required|regex:/^[0-9a-zA-Z]+$/i",
    			"num_documento" => 'required|regex:/^[-\\.\\0-9a-zA-Z]+$/i',
    			"primer_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"primer_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"segundo_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"genero" => 'required|regex:/^[a-zA-Z]+$/i',
    			"fecha_nacimiento" => 'required|date',
    			"id_rol" => 'required|regex:/^[0-9]+$/i',
    			"estado" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
    		]);

    		if($validar->fails()){
    			return redirect("/empleados/general")->with("no-validacion", "");
    		}else{
    			if (!empty($datos["segundo_nombre"])) {
    				$validarSegundoNombre = \Validator::make($datos,[
    					"segundo_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
    				]);
    				if($validarSegundoNombre->fails()){
						return redirect("/empleados/general")->with("no-validacion", "");
					}
    			}
    			if (!empty($datos["archivos_nuevos"])) {
                    if (!empty($datos["archivos_actuales"])) {
                        unlink($datos["archivos_actuales"]);
                    }
    				if ($datos["archivos_nuevos"]->guessExtension() == "zip") {
    					$aleatorio = mt_rand(1000000, 9999999);
						$ruta_archivos = "vistas/images/empleados/documentos/".$aleatorio.".".$datos["archivos_nuevos"]->guessExtension();
						move_uploaded_file($datos["archivos_nuevos"], $ruta_archivos);
    				} else {
    					return redirect("/empleados/general")->with("no-zip", "");
    				}
    			} else {
    				$ruta_archivos = $datos["archivos_actuales"];
    			}

    			$actualizar = array(
    				'tipo_documento' => $datos["tipo_documento"],
    				'num_documento' => $datos["num_documento"],
    				'primer_nombre' => $datos["primer_nombre"],
    				'segundo_nombre' => $datos["segundo_nombre"],
    				'primer_apellido' => $datos["primer_apellido"],
    				'segundo_apellido' => $datos["segundo_apellido"],
    				'sexo' => $datos["genero"],
    				'fecha_nacimiento' => $datos["fecha_nacimiento"],
    				'id_rol' => $datos["id_rol"],
    				'estado' => $datos["estado"],
    				'documentos_empleado' => $ruta_archivos 
    			);

    			$empleado = EmpleadosModel::where("id", $id)->update($actualizar);
    			return redirect("/empleados/general")->with("ok-editar", "");
    		}


    	}else{

    		return redirect("/empleados/general")->with("error", "");
    	}

    }

    public function destroy($id, Request $request){

    	$validar = EmpleadosModel::where("id", $id)->get();    	
    	if(!empty($validar)){
    		$empleados = EmpleadosModel::where("id",$validar[0]["id"])->delete();
    		return "ok";   	
    	}else{
    		return redirect("/empleados/general")->with("no-borrar", "");
    	}
    }
}
