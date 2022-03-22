<?php

$archivos = $_POST["archivos"];

if ($archivos != "") {
	unlink("../".$archivos);
}