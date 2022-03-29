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
    	$usuario = UsuariosModel::where("id", $id)->get();
        if (count($usuario) != 0) {
            return view("paginas.usuarios.perfil", array("status"=>200, "usuario"=>$usuario));
        } else {
            return view("paginas.usuarios.perfil", array("status"=>404));
        }
    }
}
