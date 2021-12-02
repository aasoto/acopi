<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;
use App\RolesModel;

class UsuariosController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/
	
	public function index(){
    	$usuarios = UsuariosModel::all();

    	return view("paginas.usuarios.consultarUser", array("usuarios" => $usuarios));
    }
	
	/*=====  End of Mostrar todos los registros en la tabla  ======*/

	/*===========================================================
	=            Mostra un solo registro de la tabla            =
	===========================================================*/
	
	public function show($id){

		$usuario = UsuariosModel::where("id", $id)->get();
		$roles = RolesModel::all();
		$usuarios = UsuariosModel::all();
		
		if(count($usuario) != 0){

			return view("paginas.usuarios.consultarUser", array("status"=>200, "usuario"=>$usuario, "roles"=>$roles, "usuarios"=>$usuarios));
		
		}else{ 

			return view("paginas.usuarios.consultarUser", array("status"=>404, "usuarios"=>$usuarios));
		}
	}
	
	/*=====  End of Mostra un solo registro de la tabla  ======*/

	/*======================================
	=            Editar usuario            =
	======================================*/
	
	public function update($id, Request $request){

		/*----------  Se recogen los datos  ----------*/
		
		$datos = array("name"=>$request->input("name"),
					   "email"=>$request->input("email"),
					   "password_actual"=>$request->input("password_actual"),
					   "rol"=>$request->input("rol"),
					   "imagen_actual"=>$request->input("imagen_actual"));

		$password = array("password"=>$request->input("password"));
		$foto = array("foto"=>$request->file("foto"));

		/*=============================================================
		=            Si el formulario o modal tienen datos            =
		=============================================================*/
		
		if(!empty($datos)){

        	$validar = \Validator::make($datos,[
        	 	'name' => "required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
        	 	'email' => 'required|regex:/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i'
        	]); 	 

	        if($password["password"] != ""){
	        	$validarPassword = \Validator::make($password,[
	                "password" => "required|regex:/^[-\\_\\0-9a-zA-Z]+$/i"
	            ]);

	            if($validarPassword->fails()){
	            	return redirect("/usuarios/consultarUser")->with("no-validacion", "");
	            }else{
	            	$nuevaPassword = Hash::make($password['password']);
	            }
	        	 	
		 	}else{
		 		$nuevaPassword = $datos["password_actual"];
		 	}

		 	if($foto["foto"] != ""){
	 		  	$validarFoto = \Validator::make($foto,[
	                "foto" => "required|image|mimes:jpg,jpeg,png|max:2000000"
	            ]);

	            if($validarFoto->fails()){
	            	return redirect("/usuarios/consultarUser")->with("no-validacion", "");
	            }
		 	}

		 	if($validar->fails()){
		 		return redirect("/usuarios/consultarUser")->with("no-validacion", "");
		 	}else{

		 		if($foto["foto"] != ""){
		 			if(!empty($datos["imagen_actual"])){
		 				if($datos["imagen_actual"] != "/vistas/images/usuarios/admin.png"){	
		 					unlink($datos["imagen_actual"]);
		 				} 			

		 			} 
		 			
		 			$aleatorio = mt_rand(100,999);	

		 			$ruta = "vistas/images/usuarios/".$aleatorio.".".$foto["foto"]->guessExtension();

		 			//move_uploaded_file($foto["foto"], $ruta);
		 			/*----------  Redimensionar foto de perfil  ----------*/
					list($ancho, $alto) = getimagesize($foto["foto"]);
                    $nuevoAncho = 200;
                    $nuevoAlto = 200;

                    if(($foto["foto"]->guessExtension() == "jpeg") || ($foto["foto"]->guessExtension() == "jpg")){

                        $origen = imagecreatefromjpeg($foto["foto"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);

                    }

                    if($foto["foto"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($foto["foto"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                        
                    }

		 		}else{
		 			$ruta =  $datos["imagen_actual"];
		 		}


		 		$datos = array("name" => $datos["name"],
	                           "email" => $datos["email"],      
	                            "password" => $nuevaPassword,
	                            "rol" => $datos["rol"],
	                            "foto" => $ruta);

		 		$administrador = UsuariosModel::where('id', $id)->update($datos);
		 		return redirect("/usuarios/consultarUser")->with("ok-editar", "");
		 	}

		}else{
			return redirect("/usuarios/consultarUser")->with("data-empty", "");
		}
		
		/*=====  End of Si el formulario o modal tienen datos  ======*/
	}
	
	/*=====  End of Editar usuario  ======*/
	
	/*========================================
	=            Eliminar usuario            =
	========================================*/
	
	public function destroy($id, Request $request){

    	$validar = UsuariosModel::where("id", $id)->get();    	
    	if(!empty($validar) && $id != 1){
    		if(!empty($validar[0]["foto"])){
    			unlink($validar[0]["foto"]);    		
    		}
    		$administrador = UsuariosModel::where("id",$validar[0]["id"])->delete();
    		//return redirect("/usuarios/consultarUser")->with("ok-eliminar", ""); 
    		return "ok";   	
    	}else{
    		return redirect("/usuarios/consultarUser")->with("no-borrar", "");
    	}
    }
	
	/*=====  End of Eliminar usuario  ======*/
	
	
}
