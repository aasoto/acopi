<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;

class PaginaWebController extends Controller
{
	public function index(){
    	$paginaweb = PaginaWebModel::all();

    	return view("paginas.pagina_web.carrusel", array("paginaweb" => $paginaweb));
    }
    
}


