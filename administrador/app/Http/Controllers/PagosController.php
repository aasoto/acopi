<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagosModel;
use App\PagosGeneradosModel;
use App\PagosParametrosModel;
use App\UsuariosModel;
use App\EmpresasModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller
{
    public function index(){

    	$join = DB::table('empresas')->join('pagos','empresas.id_empresa','=','pagos.id_empresa')->join('representante_empresa','empresas.cc_rprt_legal','=','representante_empresa.cc_rprt_legal')->select('pagos.*','representante_empresa.*','empresas.razon_social')->get();  

    	if (request()->ajax()) {
            return datatables()->of($join) 
            
            ->addColumn('representante', function($data){
                    $representante = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre;
                
                return $representante;
            })

            ->addColumn('procedimientos', function($data){
            		if ($data->estado == "pagado") {
            			$procedimientos = '
		                    <div class="btn-group">
	                        	<a href="#" title="Pagado" class="btn btn-success btn-sm">
	                            	<i class="fas fa-money-bill-alt text-white"></i>
	                        	</a>
		                        <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
		                        	<i class="fas fa-trash-alt"></i>
		                        </button>
		                    </div>
		                ';
            		} 
            		if ($data->estado == "no pago") {
            			$procedimientos = '
		                    <div class="btn-group">
		                    	<button title="Abonar" class="btn btn-info btn-sm abonarRecibo"  action="'.url()->current().'/'.$data->id.'" method="PUT" pagina="pagos/general" token="'.csrf_token().'">
	                            	<i class="fas fa-coins text-white"></i>
	                        	</button>
	                        	<button title="Pagar" class="btn btn-warning btn-sm pagarRecibo" empresa="'.$data->id_empresa.'"  action="'.url()->current().'/'.$data->id.'" method="PUT" pagina="pagos/general" token="'.csrf_token().'">
	                            	<i class="fas fa-money-bill-alt text-white"></i>
	                        	</button>
		                        <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
		                        <i class="fas fa-trash-alt"></i>
		                        </button>
		                    </div>
		                ';
            		}

            		if ($data->estado == "abonado") {
            			$procedimientos = '
		                    <div class="btn-group">
		                    	<button title="Abonar" class="btn btn-success btn-sm abonarRecibo"  action="'.url()->current().'/'.$data->id.'" method="PUT" pagina="pagos/general" token="'.csrf_token().'">
	                            	<i class="fas fa-coins text-white"></i>
	                        	</button>
	                        	<button title="Pagar" class="btn btn-warning btn-sm pagarRecibo"  action="'.url()->current().'/'.$data->id.'" method="PUT" pagina="pagos/general" token="'.csrf_token().'">
	                            	<i class="fas fa-money-bill-alt text-white"></i>
	                        	</button>
		                        <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
		                        <i class="fas fa-trash-alt"></i>
		                        </button>
		                    </div>
		                ';
            		}

            		if ($data->estado == "vencido") {
            			$procedimientos = '
		                    <div class="btn-group">
	                        	<a href="#" title="Vencido" class="btn btn-danger btn-sm">
	                            	<i class="fas fa-times text-white"></i>
	                        	</a>
		                        <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
		                        	<i class="fas fa-trash-alt"></i>
		                        </button>
		                    </div>
		                ';
            		}

            		if ($data->estado == "pendiente") {
            			$procedimientos = '
		                    <div class="btn-group">
	                        	<a href="#" title="Pendiente" class="btn btn-default btn-sm">
	                            	<i class="fas fa-money-bill-alt text-white"></i>
	                        	</a>
		                        <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
		                        	<i class="fas fa-trash-alt"></i>
		                        </button>
		                    </div>
		                ';
            		} 

            		if ($data->estado == "negoceado") {
            			$procedimientos = '
		                    <div class="btn-group">
	                        	<a href="#" title="Negoceado" class="btn btn-default btn-sm">
	                            	<i class="fas fa-hands-helping"></i>
	                        	</a>
		                        <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="'.url()->current().'" method="DELETE" foto="" cedula="" pagina="afiliados/general" token="'.csrf_token().'">
		                        	<i class="fas fa-trash-alt"></i>
		                        </button>
		                    </div>
		                ';
            		}
                
                return $procedimientos;
            })

              ->rawColumns(['representante','procedimientos'])
              -> make(true);

        }

        $pagos = PagosModel::all();
        return view("paginas.pagos.general", array("pagos"=>$pagos));
    }

    public function store(Request $request){
    	$datos = array(
    		"usuario"=>$request->input("usuario"),
    		"password"=>$request->input("password")
    	);

    	$usuario = UsuariosModel::where("email", $datos["usuario"])->get();
    	
    	if (Hash::check($datos["password"], $usuario[0]["password"])) {

    		/*----------  Verificar si pagos existen  ----------*/
    		$existe = PagosGeneradosModel::all();
    		$hasta = count($existe);
    		for ($i=0; $i < $hasta; $i++) { 
    			if (($existe[$i]["month"] == date("m")) && ($existe[$i]["year"] == date("Y"))) {
    				return redirect("/pagos/general")->with("pagos_generados", "");
    			}
    		}

    		/*----------  traer empresas y parametros de los pagos  ----------*/
    		$empresas = EmpresasModel::all();
    		$limite = count($empresas);

    		$parametros = PagosParametrosModel::all();

    		for ($i=0; $i < $limite; $i++) {
    			if ($empresas[$i]["estado_afiliacion_empresa"] == "nueva") {
    				$fecha_afiliacion = strtotime($empresas[$i]["fecha_afiliacion_empresa"]."+ 3 months");
    				$fecha_hoy = strtotime(date("Y-m-d", time()));
    				if ($fecha_afiliacion <= $fecha_hoy) {
    					$actualizar = array(
							'estado_afiliacion_empresa' => "activa"
						);
	    				$empresa_estado = EmpresasModel::where("id_empresa", $empresas[$i]["id_empresa"])->update($actualizar);
    				}
    			}
    		}

    		
    		$empresas = EmpresasModel::all();

    		for ($i=0; $i < $limite; $i++) { 
    			
    			if ($empresas[$i]["estado_afiliacion_empresa"] == "activa") {
    				$activa = true;
	    			/*------------------------------------------------*/
    				$valor_deuda = 0;
	    			$deuda = PagosModel::where("id_empresa", $empresas[$i]["id_empresa"])->get();
	    			$total_recibos = count($deuda);
					$num_recibos = 0;
					for ($j=0; $j < $total_recibos; $j++) { 
						$num_recibos++;
						
	    				if (($deuda[$j]["estado"] == "no pago") || ($deuda[$j]["estado"] == "abonado")) {
	    					if ($num_recibos == $parametros[0]["periodo_activo"]) {
	    						$valor_deuda = $valor_deuda + $deuda[$j]["valor_recibo"];
		    					$actualizar = array(
									'estado' => "pendiente"
								);
			    				$pago_estado = PagosModel::where("id", $deuda[$j]["id"])->update($actualizar);
	    						
	    					} else {
	    						$valor_deuda = $valor_deuda + $deuda[$j]["valor_recibo"];
		    					$actualizar = array(
									'estado' => "vencido"
								);
			    				$pago_estado = PagosModel::where("id", $deuda[$j]["id"])->update($actualizar);
	    					}
    						
	    				}

	    			}

	    			/*****************************************************/
	    			$meses_deuda = 0;
	    			$deuda = PagosModel::where("id_empresa", $empresas[$i]["id_empresa"])->get();

	    			$total_recibos = count($deuda);
					
					for ($j=0; $j < $total_recibos; $j++) { 
	    				if (($deuda[$j]["estado"] == "vencido") || ($deuda[$j]["estado"] == "pendiente")) {
	    					$meses_deuda = $meses_deuda + 1;
	    				}
	    			}
	    			

	    			if ($meses_deuda >= $parametros[0]["periodo_activo"]) {
	    				$actualizar = array(
							'estado_afiliacion_empresa' => "inactiva",
							'numero_pagos_atrasados' => $meses_deuda
						);
	    				$empresa_periodo_activo = EmpresasModel::where("id_empresa", $empresas[$i]["id_empresa"])->update($actualizar);
	    				$activa = false;
	    			}
	    			if ($meses_deuda < $parametros[0]["periodo_activo"]) {
	    				$actualizar = array(
							'estado_afiliacion_empresa' => "activa",
							'numero_pagos_atrasados' => $meses_deuda
						);
	    				$empresa_periodo_activo = EmpresasModel::where("id_empresa", $empresas[$i]["id_empresa"])->update($actualizar);
	    			}
	    			/*****************************************************/
	    			
	    			if ($activa) {
	    				$pago = new PagosModel();

		    			$pago->id_empresa = $empresas[$i]["id_empresa"];
		    			$pago->valor_deuda = $valor_deuda;
		    			$pago->valor_mes = $parametros[0]["valor_cuota"];
		    			$pago->valor_recibo = $pago->valor_deuda + $pago->valor_mes;
		    			setlocale(LC_TIME, "spanish");
		    			$pago->mes_recibo = strftime("%B");
		    			$fecha = date('Y-m-d');
		    			$fecha_limite = date("Y-m-d", strtotime($fecha."+ 10 days"));
		    			$pago->fecha_limite = $fecha_limite;
		    			$pago->estado = "no pago";

		    			$pago->save();
	    			}

    			}
    			
    		}
    		
    		/*----------  Registro en historial pagos generados  ----------*/
    		$generado = new PagosGeneradosModel();

    		$generado->month = date('m');
    		$generado->year = date('Y');
    		
    		$generado->save();
    		return redirect("/pagos/general")->with("ok-crear", "");
    	}else{
    		return redirect("/pagos/general")->with("no-validacion", "");
    	}
    }

    public function update($id, Request $request) {

    	$validar = PagosModel::where("id", $id)->get();
    	/*echo '<pre>'; print_r($reporta); echo '</pre>';
		return;*/
		if (!empty($validar)) {

			if ($_POST["accion"] == "abonar") {
				$valor_recibo = $validar[0]["valor_recibo"] - $_POST["cantidad"];
				$actualizar = array(
					'valor_recibo' => $valor_recibo,
					'estado' => "abonado", 
					'id_reporta' => Auth::user()->id,
					'fecha_reporte' => date('Y-m-d H:i:s', time())
				);
				$pagos = PagosModel::where("id", $validar[0]["id"])->update($actualizar);
				return "ok";
			}
			if ($_POST["accion"] == "pagar") {
				$actualizar = array(
					'estado' => "pagado", 
					'id_reporta' => Auth::user()->id,
					'fecha_reporte' => date('Y-m-d H:i:s', time())
				);
				$pagos = PagosModel::where("id", $validar[0]["id"])->update($actualizar);
				$validar = PagosModel::where("id_empresa", $_POST["empresa"])->get();
				if (!empty($validar)) {
					$total_recibos = count($validar);
					for ($i=0; $i < $total_recibos; $i++) { 
						if ($validar[$i]["estado"] == "vencido") {
							$actualizar = array(
								'estado' => "negoceado", 
								'id_reporta' => Auth::user()->id,
								'fecha_reporte' => date('Y-m-d H:i:s', time())
							);
							$pagos = PagosModel::where("id", $validar[$i]["id"])->update($actualizar);
						}
					}
				}
				return "ok";
			}
		}else{
			return redirect("/pagos/general")->with("no-editar", "");
		}
    }
}
