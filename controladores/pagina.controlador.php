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
}