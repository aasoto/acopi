<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\SectorEmpresaModel;

class EmpresasController extends Controller
{
	public function index() {
		$empresas = EmpresasModel::all();

		return view("paginas.afiliados.empresas", array("empresas" => $empresas));
	}

	public function show($id){

        $afiliado = RepresentanteEmpresaModel::where("id_rprt_legal", $id)->get();
        $empresas = EmpresasModel::all();
        $sectores = SectorEmpresaModel::all();
        
        if(count($afiliado) != 0){

            return view("paginas.afiliados.empresas", array("status"=>200, "afiliado"=>$afiliado, "empresas"=>$empresas, "sectores"=>$sectores));
        
        }else{ 

            return view("paginas.pagina_web.entrevistas", array("status"=>404, "empresas"=>$empresas));
        }
    }

    public function store(Request $request) {
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
    
}
