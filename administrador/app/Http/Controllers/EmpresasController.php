<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\SectorEmpresaModel;
use App\PaginaWebModel;
use App\EmpleadosAfiliadosModel;
//Libería para hacer inner join
use Illuminate\Support\Facades\DB;

class EmpresasController extends Controller
{
	public function index() {

        $paginaweb = PaginaWebModel::all();

        foreach ($paginaweb as $key => $web) {}
        if (url()->current() == ($web["servidor"]."afiliados/afiliadosEmpleados")) {
            $join = DB::table('empresas')->join('empleados_afiliados','empresas.nit_empresa','=','empleados_afiliados.nit_empresa_afiliado')->select('empresas.razon_social','empleados_afiliados.*')->get(); 

            if (request()->ajax()) {
                return datatables()->of($join) 

                ->addColumn('tipo_documento', function($data){
                    
                        if($data->tipo_doc_empleado_afiliado == "cedula"){
                            $tipo_documento = "Cédula de ciudadanía";
                        }elseif ($data->tipo_doc_empleado_afiliado == "pasaporte") {
                            $tipo_documento = "Pasaporte";
                        }elseif ($data->tipo_doc_empleado_afiliado == "otro") {
                            $tipo_documento = "Otro";
                        }else{
                            $tipo_documento = "Sin especificar";
                        }

                    return $tipo_documento;
                })

                ->addColumn('nombre', function($data){
                    
                        $nombre = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre;

                

                    return $nombre;
                })


                ->addColumn('procedimientos', function($data){
                        $procedimientos = '
                        <div class="btn-group">
                            
                            <a href="'.url()->current().'" title="Editar" class="btn btn-warning btn-sm editarAfiliado">
                                <i class="fas fa-pencil-alt text-white"></i>
                            <a>
                            <button class="btn btn-danger btn-sm eliminarAfiliado" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
                            <i class="fas fa-trash-alt"></i>
                            </button>

                        </div>';
                    
                    return $procedimientos;
                })

                  ->rawColumns(['tipo_documento', 'nombre', 'procedimientos'])
                  -> make(true);

            }

            $empleados = EmpleadosAfiliadosModel::all();
            return view("paginas.afiliados.afiliadosEmpleados", array("empleados"=>$empleados));
        }

        $sector_empresa = SectorEmpresaModel::all();
        $join = DB::table('representante_empresa')->join('empresas','representante_empresa.cc_rprt_legal','=','empresas.cc_rprt_legal')->select('representante_empresa.*','empresas.*')->get(); 
        if (request()->ajax()) {
            return datatables()->of($join)
            ->addColumn('telefonos', function($data){
                    
                    $representante = $data->primer_apellido." ".$data->segundo_apellido." ".$data->primer_nombre." ".$data->segundo_nombre;
                    /*$telefonos = '<div class="btn-group">
                        <a nit="'.$data->nit_empresa.'" razon_social="'.$data->razon_social.'" representante="'.$representante.'" num_empleados="'.$data->num_empleados.'" direccion="'.$data->direccion_empresa.'" telefono="'.$data->telefono_empresa.'" fax="'.$data->fax_empresa.'" celular="'.$data->celular_empresa.'" email="'.$data->email_empresa.'" id_sector="'.$data->id_sector_empresa.'" productos="'.$data->productos_empresa.'" ciudad="'.$data->ciudad_empresa.'" estado_afiliacion="'.$data->estado_afiliacion_empresa.'" numero_pagos_atrasados="'.$data->numero_pagos_atrasados.'" fecha_afiliacion="'.$data->fecha_afiliacion_empresa.'" title="Ver más" class="btn btn-primary btn-sm verMasEmpresa">
                            <i class="fas fa-eye"></i>
                        </a>   
                        <a href="'.url()->current().'/'.$data->id_empresa.'" class="btn btn-warning btn-sm">
                            <i class="fas fa-pencil-alt text-white"></i>
                        </a>

                        <button class="btn btn-danger btn-sm eliminarEmpresa" action="'.url()->current().'/'.$data->id_empresa.'" method="DELETE" pagina="afiliados/consultarEmpresas" token="'.csrf_token().'">
                        <i class="fas fa-trash-alt"></i>
                        </button>

                    </div>';*/

                    $telefonos = "<div class='btn-group'>
                        <a nit='".$data->nit_empresa."' razon_social='".$data->razon_social."' representante='".$representante."' num_empleados='".$data->num_empleados."' direccion='".$data->direccion_empresa."' telefono='".$data->telefono_empresa."' fax='".$data->fax_empresa."' celular='".$data->celular_empresa."' email='".$data->email_empresa."' id_sector='".$data->id_sector_empresa."' productos='".$data->productos_empresa."' ciudad='".$data->ciudad_empresa."' estado_afiliacion='".$data->estado_afiliacion_empresa."' numero_pagos_atrasados='".$data->numero_pagos_atrasados."' fecha_afiliacion='".$data->fecha_afiliacion_empresa."' title='Ver más' id='verMasEmpresa' name='verMasEmpresa' class='btn btn-primary btn-sm verMasEmpresa'>
                            <i class='fas fa-eye'></i>
                        </a>
                        <button title='Agregar empleado' class='btn btn-success btn-sm agregarEmpleado' id_empresa='".$data->id_empresa."' nit_empresa='".$data->nit_empresa."' razon_social='".$data->razon_social."' data-toggle='modal' data-target='#nuevoEmpleado'>
                            <i class='fas fa-user-plus text-white'></i>
                        </button>
                        <a href='".url()->current()."/".$data->id_empresa."' title='Editar datos empresa' class='btn btn-warning btn-sm'>
                            <i class='fas fa-pencil-alt text-white'></i>
                        </a>

                        <button class='btn btn-danger btn-sm eliminarEmpresa' title='Eliminar empresa' action='".url()->current()."/".$data->id_empresa."' method='DELETE' pagina='afiliados/consultarEmpresas' token='".csrf_token()."'>
                        <i class='fas fa-trash-alt'></i>
                        </button>

                    </div>";
                
                return $telefonos;
            })
             ->addColumn('representante', function($data){
                    $representante = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre;
                
                return $representante;
            })
            ->addColumn('acciones', function($data){
                    $botones = $data->telefono_empresa.' - '.$data->celular_empresa;
                
                return $botones;
            })
            
            ->rawColumns(['telefonos'],['representante'],['acciones'])
            -> make(true);

        }
		

		return view("paginas.afiliados.consultarEmpresas", array("sector_empresa"=>$sector_empresa, "paginaweb"=>$paginaweb));
	}

	public function show($id){
        /*echo '<pre>'; print_r($id); echo '</pre>';
        return;*/
        $paginaweb = PaginaWebModel::all();
        foreach ($paginaweb as $key => $web) {}

        if (url()->current() == ($web["servidor"]."afiliados/birthday/".$id)) {
            $fecha_birthday = date("m-d", strtotime($id));

            //$sql="SELECT * FROM empleados_afiliados WHERE fecha_nacimiento LIKE '%".$fecha_birthday."%'";
            
            
            $sql = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cargo_empleado_afiliado, fecha_nacimiento, razon_social FROM empleados_afiliados a INNER JOIN empresas b ON a.nit_empresa_afiliado = b.nit_empresa WHERE a.fecha_nacimiento LIKE '%".$fecha_birthday."%'";
            $cumplimentados = DB::select($sql);

            $array = json_decode(json_encode($cumplimentados),TRUE);
            /*echo '<pre>'; print_r($array); echo '</pre>';
            return;*/

            return view("paginas.afiliados.birthday", array("cumplimentados"=>$array));
        }

        if (url()->current() == ($web["servidor"]."afiliados/empresas/".$id)) {
            $afiliado = RepresentanteEmpresaModel::where("id_rprt_legal", $id)->get();
            $afiliados = RepresentanteEmpresaModel::all();
            $sectores = SectorEmpresaModel::all();
            $empresa = EmpresasModel::where("cc_rprt_legal", $afiliado[0]["cc_rprt_legal"])->get();

            if (count($empresa) != 0) {
                
                $empresa_existe = "si";
                if (count($afiliado) != 0) {
                    return view("paginas.afiliados.empresas", array("status"=>200, "afiliado"=>$afiliado, "sectores"=>$sectores, "empresa_existe"=>$empresa_existe));
                } else {
                    return view("paginas.afiliados.general", array("status"=>404, "afiliados"=>$afiliados));
                }
                
            } else {
                if (count($afiliado) != 0) {
                    return view("paginas.afiliados.empresas", array("status"=>200, "afiliado"=>$afiliado, "sectores"=>$sectores));
                } else {
                    return view("paginas.afiliados.general", array("status"=>404, "afiliados"=>$afiliados));
                }
            }

            
        }

        if (url()->current() == ($web["servidor"]."afiliados/consultarEmpresas/".$id)) {

            $empresa = EmpresasModel::where("id_empresa", $id)->get();
            $empresas = EmpresasModel::all();
            $sector_empresa = SectorEmpresaModel::all();
            
            if(count($empresa) != 0){

                return view("paginas.afiliados.consultarEmpresas", array("status"=>200, "empresa"=>$empresa, "empresas"=>$empresas, "sector_empresa"=>$sector_empresa, "paginaweb"=> $paginaweb));
            
            }else{ 

                return view("paginas.afiliados.consultarEmpresas", array("status"=>404, "empresas"=>$empresas, "paginaweb"=>$paginaweb, "sector_empresa"=>$sector_empresa));
            }
        }
        
    }

    public function store(Request $request) {


        if ($request->input("accion") == "agregarEmpleadoAfiliado") {
            $datos = array(
                'tipo_documento' => $request->input("tipo_documento"),
                'numero_documento' => $request->input("numero_documento"),
                'primer_nombre' => $request->input("primer_nombre"),
                'segundo_nombre' => $request->input("segundo_nombre"),
                'primer_apellido' => $request->input("primer_apellido"),
                'segundo_apellido' => $request->input("segundo_apellido"),
                'cargo_empleado' => $request->input("cargo_empleado"),
                'fecha_nacimiento' => $request->input("fecha_nacimiento"),
                'id_empresa' => $request->input("id_empresa"),
                'nit_empresa' => $request->input("nit_empresa"),
                'archivo_documento' => $request->file("archivo_documento") 
            );

            if (!empty($datos)) {
                $validar = \Validator::make($datos, [
                    'tipo_documento' => 'required|regex:/^[a-z]+$/i',
                    'numero_documento' => 'required|regex:/^[0-9]+$/i',
                    'primer_nombre' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                    'primer_apellido' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                    'segundo_apellido' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                    'cargo_empleado' => 'required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                    'fecha_nacimiento' => 'required|regex:/^[-\\_\\:\\.\\0-9 ]+$/i',
                    'id_empresa' => 'required|regex:/^[0-9]+$/i',
                    'nit_empresa' => 'required|regex:/^[.\\-\\0-9 ]+$/i',
                    'archivo_documento' => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);

                if ($validar->fails()) {
                return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                } else {

                    if (!empty($datos["segundo_nombre"])) {
                        $validar_Segundo_Apellido = \Validator::make($datos, ['segundo_nombre' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                        if ($validar_Segundo_Apellido->fails()) {
                            return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                        }
                    }

                    if (!empty($datos["archivo_documento"])) {
                        $aleatorio = mt_rand(1000000,9999999);  

                        $rutaDocumento = "vistas/images/afiliados/empleados/documentos/".$aleatorio.".".$datos["archivo_documento"]->guessExtension();

                        if(($datos["archivo_documento"]->guessExtension() == "jpeg") || ($datos["archivo_documento"]->guessExtension() == "jpg") || ($datos["archivo_documento"]->guessExtension() == "png")) {
                            move_uploaded_file($datos["archivo_documento"], $rutaDocumento);
                        }

                    } else {
                        $rutaDocumento =  "";
                    }

                    $empleado = new EmpleadosAfiliadosModel();

                    $empleado->tipo_doc_empleado_afiliado = $datos["tipo_documento"];
                    $empleado->cc_empleado_afiliado = $datos["numero_documento"];
                    $empleado->primer_nombre = $datos["primer_nombre"];
                    $empleado->segundo_nombre = $datos["segundo_nombre"];
                    $empleado->primer_apellido = $datos["primer_apellido"];
                    $empleado->segundo_apellido = $datos["segundo_apellido"];
                    $empleado->cargo_empleado_afiliado = $datos["cargo_empleado"];
                    $empleado->fecha_nacimiento = $datos["fecha_nacimiento"];
                    $empleado->id_empresa_afiliado = $datos["id_empresa"];
                    $empleado->nit_empresa_afiliado = $datos["nit_empresa"];
                    $empleado->imagen_cedula = $rutaDocumento;

                    $empleado->save();

                    return redirect("/afiliados/consultarEmpresas")->with("ok-crear-empleado", "");

                }
            } else {
                return redirect("/afiliados/consultarEmpresas")->with("error", "");
            }
        }

        if ($request->input("accion") == "agregarEmpresaAfiliado") {
            $datos = array(
                'cedula' => $request->input("cedula"),
                'nit' => $request->input("nit"),
                'razon_social' => $request->input("razon_social"),
                'num_empleados' => $request->input("num_empleados"),
                'direccion' => $request->input("direccion"),
                'telefono' => $request->input("telefono"),
                'fax' => $request->input("fax"),
                'celular' => $request->input("celular"),
                'correo_electronico' => $request->input("correo_electronico"),
                'sector_empresa' => $request->input("sector_empresa"),
                'productos' => $request->input("productos"),
                'ciudad' => $request->input("ciudad"),
                'fecha_afiliacion' => $request->input("fecha_afiliacion")
            );

            /*echo '<pre>'; print_r($datos); echo '</pre>';
            return;*/

            if(!empty($datos)) {
                $validar = \Validator::make($datos,[
                    "cedula"=> "required|regex:/^[0-9]+$/i",
                    "nit"=> "required|regex:/^[.\\-\\0-9 ]+$/i",
                    "razon_social"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "num_empleados"=> "required|regex:/^[0-9]+$/i",
                    "direccion"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\°\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "telefono"=> "required|regex:/^[0-9]+$/i",
                    'correo_electronico' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i',
                    "sector_empresa"=> "required|regex:/^[0-9]+$/i",
                    "ciudad"=> 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
                    
                ]);

                if (!empty($datos["fax"])) {
                    $validar_Fax = \Validator::make($datos,["fax"=> "required|regex:/^[0-9 ]+$/i"]);
                    if($validar_Fax->fails()) {
                        return redirect("/afiliados/general")->with("no-validacion", "");
                    }
                }
                if (!empty($datos["celular"])) {
                    $validar_Celular = \Validator::make($datos,["celular"=> "required|regex:/^[0-9]+$/i"]); 
                    if($validar_Celular->fails()) {
                        return redirect("/afiliados/general")->with("no-validacion", "");
                    }
                }
                if (!empty($datos["productos"])) {
                    $validar_Productos = \Validator::make($datos,["productos" => 'required|regex:/^[=\\(\\)\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                    if($validar_Productos->fails()) {
                        return redirect("/afiliados/general")->with("no-validacion", "");
                    }
                }
                if (!empty($datos["fecha_afiliacion"])) {
                    $validar_Fecha_Afiliacion = \Validator::make($datos,["fecha_afiliacion" => 'required|regex:/^[-\\_\\:\\.\\0-9 ]+$/i']);
                    if($validar_Fecha_Afiliacion->fails()) {
                        return redirect("/afiliados/general")->with("no-validacion", "");
                    }
                }

                if($validar->fails()){

                    return redirect("/afiliados/general")->with("no-validacion", "");
                    
                } else {
                    $empresa = new EmpresasModel();
            
                    $empresa->nit_empresa = $datos["nit"];
                    $empresa->razon_social = $datos["razon_social"];
                    $empresa->cc_rprt_legal = $datos["cedula"];
                    $empresa->num_empleados = $datos["num_empleados"];
                    $empresa->direccion_empresa = $datos["direccion"];
                    $empresa->telefono_empresa = $datos["telefono"];
                    $empresa->fax_empresa = $datos["fax"];
                    $empresa->celular_empresa = $datos["celular"];
                    $empresa->email_empresa = $datos["correo_electronico"];
                    $empresa->id_sector_empresa = $datos["sector_empresa"];
                    $empresa->productos_empresa = json_encode(explode(",", $datos["productos"]));
                    $empresa->ciudad_empresa = $datos["ciudad"];
                    $empresa->fecha_afiliacion_empresa = $datos["fecha_afiliacion"];

                    $empresa->save();

                    return redirect("/afiliados/general")->with("ok-crear", "");
                }

            } else {

                return redirect("/afiliados/general")->with("error", "");

            }
        }
        return;
    	
    }

    public function update($id, Request $request) {
        $datos = array(
            'cedula' => $request->input("cedula"),
            'nit' => $request->input("nit"),
            'razon_social' => $request->input("razon_social"),
            'num_empleados' => $request->input("num_empleados"),
            'direccion' => $request->input("direccion"),
            'telefono' => $request->input("telefono"),
            'fax' => $request->input("fax"),
            'celular' => $request->input("celular"),
            'correo_electronico' => $request->input("correo_electronico"),
            'sector_empresa' => $request->input("sector_empresa"),
            'productos' => $request->input("productos"),
            'ciudad' => $request->input("ciudad"),
            'fecha_afiliacion' => $request->input("fecha_afiliacion")
        );

        if(!empty($datos)) {
            $validar = \Validator::make($datos,[
                "cedula"=> "required|regex:/^[0-9]+$/i",
                "nit"=> "required|regex:/^[.\\-\\0-9]+$/i",
                "razon_social"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "num_empleados"=> "required|regex:/^[0-9]+$/i",
                "direccion"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\°\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "telefono"=> "required|regex:/^[0-9]+$/i",
                'correo_electronico' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i',
                "sector_empresa"=> "required|regex:/^[0-9]+$/i",
                "ciudad"=> 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
                
            ]);

            if (!empty($datos["fax"])) {
                $validar_Fax = \Validator::make($datos,["fax"=> "required|regex:/^[0-9 ]+$/i"]);
                if($validar_Fax->fails()) {
                    return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                }
            }
            if (!empty($datos["celular"])) {
                $validar_Celular = \Validator::make($datos,["celular"=> "required|regex:/^[0-9]+$/i"]); 
                if($validar_Celular->fails()) {
                    return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                }
            }
            if (!empty($datos["productos"])) {
                $validar_Productos = \Validator::make($datos,["productos" => 'required|regex:/^[=\\(\\)\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i']);
                if($validar_Productos->fails()) {
                    return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                }
            }
            if (!empty($datos["fecha_afiliacion"])) {
                $validar_Fecha_Afiliacion = \Validator::make($datos,["fecha_afiliacion" => 'required|regex:/^[-\\_\\:\\.\\0-9 ]+$/i']);
                if($validar_Fecha_Afiliacion->fails()) {
                    return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                }
            }

            if($validar->fails()){

                return redirect("/afiliados/consultarEmpresas")->with("no-validacion", "");
                
            } else {
                $actualizar = array(
                    'cc_rprt_legal' => $datos["cedula"],
                    'nit_empresa' => $datos["nit"],
                    'razon_social' => $datos["razon_social"],
                    'num_empleados' => $datos["num_empleados"],
                    'direccion_empresa' => $datos["direccion"],
                    'telefono_empresa' => $datos["telefono"],
                    'fax_empresa' => $datos["fax"],
                    'celular_empresa' => $datos["celular"],
                    'email_empresa' => $datos["correo_electronico"],
                    'id_sector_empresa' => $datos["sector_empresa"],
                    'productos_empresa' => json_encode(explode(",", $datos["productos"])),
                    'ciudad_empresa' => $datos["ciudad"],
                    'fecha_afiliacion_empresa' => $datos["fecha_afiliacion"]
                );

                $empresa = EmpresasModel::where("id_empresa", $id)->update($actualizar);

                return redirect("/afiliados/consultarEmpresas")->with("ok-editar", "");
            }

        } else {

            return redirect("/afiliados/consultarEmpresas")->with("error", "");

        }
    }

    public function destroy($id, Request $request){

        $validar = EmpresasModel::where("id_empresa", $id)->get();       
        if(!empty($validar)){
            $empresa = EmpresasModel::where("id_empresa",$validar[0]["id_empresa"])->delete();
            return "ok";    
        }else{
            return redirect("/afiliados/consultarEmpresas")->with("no-borrar", "");
        }
    }
    
    public function traerEmpleados() {

        
    }
    
}
