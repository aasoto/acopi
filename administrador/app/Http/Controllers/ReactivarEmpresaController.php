<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\PagosModel;
use Illuminate\Support\Facades\DB;

class ReactivarEmpresaController extends Controller
{

	public function index() {
        $join = DB::table('representante_empresa')->join('empresas','representante_empresa.cc_rprt_legal','=','empresas.cc_rprt_legal')->select('representante_empresa.*','empresas.*')->where("estado_afiliacion_empresa", "inactiva")->get();
        if(request()->ajax()){

            return datatables()->of($join)

            ->addColumn('representante', function($data){

                $representante = $data->primer_apellido.' '.$data->segundo_apellido.' '.$data->primer_nombre.' '.$data->segundo_nombre;

                return $representante;

            })

            ->addColumn('telefonos', function($data){

                $telefonos = $data->telefono_empresa.' - '.$data->celular_empresa;

                return $telefonos;

            })

            ->addColumn('procedimientos', function($data){
                if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector administrativo y financiero') || (Auth::user()->rol == 'Director ejecutivo')) {
                    $procedimientos = '
                        <div class="text-center">
                            <div class="btn-group">
                                <a href="'.url()->current().'/'.$data->id_empresa.'" class="btn btn-warning btn-sm text-white">
                                    <i class="far fa-life-ring"></i> Rescatar
                                </a>
                            </div>
                        </div>
                    ';
                } else {
                    $procedimientos = '
                        <div class="text-center">
                            <div class="btn-group">

                            </div>
                        </div>
                    ';
                }


                return $procedimientos;

            })
            ->rawColumns(['representante','telefonos','procedimientos'])
            ->make(true);

        }


        return view("paginas.afiliados.empresasInactivas");

	}

	public function show($id){
		$deuda = PagosModel::where("id_empresa", $id)->get();
        if (count($deuda) != 0) {
            return view("paginas.afiliados.empresasInactivas", array("status"=>200, "deuda"=>$deuda));
        } else {
            return view("paginas.afiliados.empresasInactivas", array("status"=>404));
        }
	}

    public function update($id, Request $request) {

        if ($_POST["accion"] == "reactivar") {
            $actualizar = array(
                'estado' => 'pagado'
            );
            $pagado = PagosModel::where("id", $_POST["recibo"])->update($actualizar);

            $recibos_vencidos = PagosModel::where("id_empresa", $id)->get();
            $total_recibos = count($recibos_vencidos);
            for ($i=0; $i < $total_recibos; $i++) {
                if ($recibos_vencidos[$i]["estado"] == "vencido") {
                    $actualizar = array(
                        'estado' => 'negoceado'
                    );
                    $negoceado = PagosModel::where("id", $recibos_vencidos[$i]["id"])->update($actualizar);
                }
            }

            $actualizar = array(
                'estado_afiliacion_empresa' => "activa",
                'numero_pagos_atrasados' => 0
            );
            $activada = EmpresasModel::where("id_empresa", $id)->update($actualizar);
            return "ok";
        }
    }
}
