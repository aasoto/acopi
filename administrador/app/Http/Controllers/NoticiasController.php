<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoticiasModel;
use App\CategoriasModel;

class NoticiasController extends Controller
{

    public function index(){
    	$noticias = NoticiasModel::all();
    	$categorias = CategoriasModel::all();

    	return view("paginas.pagina_web.noticias", array("noticias" => $noticias, "categorias" => $categorias));
    }
    
}
