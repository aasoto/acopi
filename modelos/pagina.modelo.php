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

    /**Mostrar Articulos con Inner Join**/

    static public function mdlMostrarConInnerJoin($tabla1, $tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria ORDER BY $tabla2.id DESC");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }
}