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

    static public function mdlMostrarConInnerJoin($tabla1, $tabla2, $cantidad){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria ORDER BY $tabla2.id DESC LIMIT $cantidad");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarNoticiasDestacadas($tabla, $columna){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna = 1");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    /**Consulta General**/

    static public function mdlMostrar($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

}