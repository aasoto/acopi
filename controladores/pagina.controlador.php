<?php

/**
* Se crea la clase ControladorPagina
*/
class ControladorPagina
{
	# code... se crear el metodo para mostrar la tabla del blog
	static public function ctrMostrarPagina()
	{
		#se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
		$tabla = "pagina_web";

		$respuesta = ModeloPagina::mdlMostrarPagina($tabla);

		return $respuesta;
	}

    static public function ctrMostrarConInnerJoin(){
        $tabla1 = "categorias";
        $tabla2 = "noticias";
        $cantidad = 5;

        $respuesta = ModeloPagina::mdlMostrarConInnerJoin($tabla1, $tabla2, $cantidad);

        return $respuesta;
    }

    static public function ctrMostrarNoticias()
	{
		#se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
		$tabla = "noticias";

		$respuesta = ModeloPagina::mdlMostrar($tabla);

		return $respuesta;
	}

    static public function ctrMostrarNoticiasDestacadas()
    {
        #se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
        $tabla = "noticias";
        $columna = "destacado";

        $respuesta = ModeloPagina::mdlMostrarNoticiasDestacadas($tabla, $columna);

        return $respuesta;
    }
}