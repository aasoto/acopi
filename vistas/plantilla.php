<?php
/**
   Se llama a la clase ControladorPagina para imprimir la información de la página web 
**/
$pagina_web = ControladorPagina::ctrMostrarPagina();

/**
    En esta parte se colocan las secciones de cabecera de la página web
 **/
include "head.html";
include "navegacion.php";

//echo '<pre>'; print_r($pagina_web); echo '</pre>';
/**
    Ahora se evalua la condición del menú de navegación.
 **/
if(isset($_GET["pagina"])){
    if($_GET["pagina"] == "noticias"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "info-directivos"){
         include "paginas/".$_GET["pagina"].".php";
     }
    if($_GET["pagina"] == "mision"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "organigrama"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "productos"){
        include "paginas/".$_GET["pagina"]."_completo.php";
    }
    if($_GET["pagina"] == "entrevistas"){
        include "paginas/videos.php";
    }
}else{
    include "paginas/carrusel-slider.php";
    include "paginas/noticias.php";
    include "paginas/productos.php";
    include "paginas/proyectos.php";
    include "paginas/aliados.php";
    include "paginas/videos.php";
    include "paginas/productos_completo.php";
}

/**
    Secciones de pie de página
 **/
include "paginas/footer.php";
include "end-head.html";