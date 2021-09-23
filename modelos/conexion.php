<?php

/**
* 
*/
class Conexion
{
	
	static public function conectar()
	{
		$link = new PDO("mysql:host=localhost;dbname=acopi", "root","");
		$link -> exec("set names utf8");

		return $link;
	}
}

?>