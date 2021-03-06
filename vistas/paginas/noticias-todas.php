<!--=====================================
CONTENIDO REPOSITORIO DE NOTICIAS
======================================-->
<?php 
    $noticias_por_pagina = 5;
    $total_noticias = ControladorPagina::ctrContarNoticias();
    $total_paginas =$total_noticias/$noticias_por_pagina;
    $total_paginas = ceil($total_paginas);
    $pagina_web = ControladorPagina::ctrMostrarPagina();

    if (!$_GET['pestana']) {
        header('Location:index.php?pagina=noticias&pestana=1');
    }

    $noticias_todas = ControladorPagina::ctrMostrarNoticiasConPaginacion($_GET['pestana'], $noticias_por_pagina)

?>
<section class="section" id="features">
<div class="container-fluid bg-white contenidoInicio pb-4">
    
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Noticias</h4>
                    <p class="title-desc text-muted mt-4">Este es nuestro repositorio general de noticias, aparecen de la más reciente a la más antigua.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <?php //echo $total_paginas;  ?>
        <div class="row">
            <!-- COLUMNA IZQUIERDA -->
            <div class="col-12 col-md-8 col-lg-12 p-0 pr-lg-5">
                <?php foreach ($noticias_todas as $key => $value) { ?>
                <!-- Inicio Noticia -->
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>"><h5 class="d-block d-lg-none py-3"><?php echo $value["titulo"]; ?></h5></a>
                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>"><img src="<?php echo $pagina_web["servidor"]; echo $value["portada_noticia"]; ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid" width="100%"></a>
                    </div>
                    <div class="col-12 col-lg-7 introArticulo">
                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>"><h4 class="title-heading"><?php echo $value["titulo"]; ?></h4></a>
                        <p class="title-desc text-muted mt-4"><?php echo $value["descripcion_noticia"]; ?></p>
                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>" class="float-right">Leer Más</a>
                        <div class="fecha"><?php echo $value["fecha_noticia"]; ?></div>
                    </div>
                </div>
                <!-- Fin noticia -->
                <hr class="mb-4 mb-lg-5" style="border: 1px solid #152452">
                <?php } ?>

                <!--Aquí empieza la paginación-->
                <div class="justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pestana']<=1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?pagina=noticias&pestana=<?php echo $_GET['pestana']-1; ?>">Anterior</a></li>
                            <?php for ($i=0; $i < $total_paginas; $i++): ?>
                            <li class="page-item <?php echo $_GET['pestana']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="index.php?pagina=noticias&pestana=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
                            <?php endfor ?>
                            <li class="page-item <?php echo $_GET['pestana']>=$total_paginas? 'disabled' : '' ?>"><a class="page-link" href="index.php?pagina=noticias&pestana=<?php echo $_GET['pestana']+1; ?>">Siguiente</a></li>
                        </ul>
                    </nav>
                </div>
                <!--Fin paginación-->
            </div>

            
        </div>
    </div>
</div>
</section>





