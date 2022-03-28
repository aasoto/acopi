<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;

class PerfilController extends Controller
{
    public function index(){
    	return view("paginas.usuarios.perfil", array());
    }

    public function show($id){
    	
    }
}
