

<!--=====================================
CONTENIDO NOTICIAS
======================================-->

<section class="section" id="features">
<div class="container-fluid bg-white contenidoInicio pb-4">
    
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Noticias</h4>
                    <p class="title-desc text-muted mt-4">En esta sesión encontraras las  noticias más recientes de nuestra agremiación, solo cliquea 
                    sobre el recuadro para ver más.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <div class="row">
            <!-- COLUMNA IZQUIERDA -->
            <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
                <?php foreach ($noticias as $key => $value) { ?>
                <!-- ARTÍCULO 01 -->
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <a href="articulos.html"><h4 class="d-block d-lg-none py-3"><?php echo $value["titulo"]; ?></h4></a>
                        <a href="articulos.html"><img src="<?php echo $pagina_web["servidor"]; echo $value["portada_noticia"]; ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid" width="100%"></a>
                    </div>
                    <div class="col-12 col-lg-7 introArticulo">
<!--                        <a href="articulos.html"><h4 class="title-heading">--><?php //echo $value["titulo"]; ?><!--</h4></a>-->
                        <p class="title-desc text-muted mt-4"><?php echo $value["descripcion_noticia"]; ?></p>
                        <a href="articulos.html" class="float-right">Leer Más</a>
                        <div class="fecha"><?php echo str_replace ( "." , "/" ,  $value["fecha_noticia"]); ?></div>
                    </div>
                </div>
                <hr class="mb-4 mb-lg-5" style="border: 1px solid #152452">
                <?php } ?>

                
            </div>

            <!-- COLUMNA DERECHA -->

            <div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">
                <!-- SOBRE MI -->
                <div class="sobreMi">
                    <h4>Sobre Mi</h4>
                    <img src="img/sobreMi.jpg" alt="Lorem ipsum dolor sit amet" class="img-fluid my-1">
                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>
                </div>

                <!-- Artículos destacados -->
                <div class="my-4">
                    <h4>Noticias Destacadas</h4>
                    <?php foreach ($noticias_destacadas as $key => $value) { ?>
                    <div class="d-flex my-3">
                        <div class="w-100 w-xl-50 pr-3 pt-2">
                            <a href="articulos.html">
                                <img src="<?php echo $pagina_web["servidor"]; echo $value["portada_noticia"]; ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="articulos.html" class="text-secondary">
                                <p class="small"><?php echo $value["descripcion_noticia"]; ?></p>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="text-center">
                <a href="index.php?pagina=noticias&pestana=1"><h4> Ver todas las noticias... </h4></a>
            </div>
            
        </div>
    </div>
</div>
</section>





