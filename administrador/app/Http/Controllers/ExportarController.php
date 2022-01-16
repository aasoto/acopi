<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\PaginaWebModel;

class ExportarController extends Controller
{
    public function index() {

    	$paginaweb = PaginaWebModel::all();
    	foreach ($paginaweb as $key => $web) {}
    	if (url()->current() == ($web["servidor"]."afiliados/exportar")) {
    		$afiliados = RepresentanteEmpresaModel::all();
    		return view("paginas.afiliados.exportar", array("afiliados"=>$afiliados));
    	}
    	
    	if (url()->current() == ($web["servidor"]."afiliados/exportarEmpresas")) {
    		$empresas = EmpresasModel::all();
    		return view("paginas.afiliados.exportarEmpresas", array("empresas"=>$empresas));
    	}
    }
}
