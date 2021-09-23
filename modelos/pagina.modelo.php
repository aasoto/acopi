<?php

require_once "conexion.php";

class ModeloPagina{

	static public function mdlMostrarPagina($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
}