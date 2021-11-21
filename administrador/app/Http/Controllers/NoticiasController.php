<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoticiasModel;

class NoticiasController extends Controller
{

    public function index(){
    	$noticias = NoticiasModel::all();

    	return view("paginas.pagina_web.noticias", array("noticias" => $noticias));
    }
    
}
