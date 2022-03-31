<section class="home-slider" id="home" style="margin-top: 65px; min-height: 80%">
    <div class="container-fluid">
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $carrusel = json_decode($pagina_web["carrusel"], true);
                    $active = true;
                    foreach ($carrusel as $key => $value){
                        if ($active){
                            echo '
                                <div class="carousel-item active" style="background-image: url(administrador/public/'.$value["fondo"].');
                                background-position: center center;">
                                <div class="home-center">
                                    <div class="home-desc-center">';
                                    if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined') {
                                        echo '<div class="bg-overlay-color"></div>'; }
                                        echo '<div class="container">
                                            <div class="row vertical-content">

                                                <div class="col-lg-6">
                                                    <div class="home-content mt-4 slider-principal">';
                                                        if ($value["categoria"] != 'undefined' )
                                                        {
                                                            echo '<h4 class="home-subtitle">'.$value["categoria"].'</h4>';
                                                        }
                                                        if ($value["titulo"] != 'undefined'){
                                                           echo '<h2 class="home-title my-4">'.$value["titulo"].'</h2>' ;
                                                        }
                                                        if ($value["texto"] != 'undefined'){
                                                           echo '<p class="home-desc mt-4 f-17">'.$value["texto"].'</p>';
                                                        }

                                                        echo '<div class="mt-4 ">
                                                            <a href="'.$value["url-boton-1"].'" class="pr-3 btn btn-primary btn-slider-item mb-5  '.$value["boton-1-color"].'">
                                                                ';
                                                                if (isset($value['boton-1-texto'] )and $value['boton-1-texto'] != ''){
                                                                    echo $value['boton-1-texto'];
                                                                }else
                                                                {
                                                                    echo "Ver Más";
                                                                }
                                                                echo'
                                                            </a>
                                                            <a href="'.$value["url-boton-2"].'" class="pr-3 btn btn-primary btn-slider-item mb-5  '.$value["boton-2-color"].'">
                                                                ';
                                                                if (isset($value['boton-2-texto'] )and $value['boton-2-texto'] != ''){
                                                                    echo $value['boton-2-texto'];
                                                                }else
                                                                {
                                                                    echo "Ver Más";
                                                                }
                                                                echo'
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 offset-lg-1">
                                                    <!--<div class="home-image text-lg-right mt-4">
                                                        <img src="administrador/public/'.$value["foto-delante"].'" class="img-fluid" alt="">
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            $active = false;
                        }else
                        {
                            echo '
                                <div class="carousel-item" style="background-image: url(administrador/public/'.$value["fondo"].');
                                background-position: center center;">
                                <div class="home-center">
                                    <div class="home-desc-center">';
                                        if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined') {
                                            echo '<div class="bg-overlay-color"></div>';
                                        }
                                        echo '<div class="container">
                                            <div class="row vertical-content">

                                                <div class="col-lg-7">
                                                    <div class="home-content mt-4 slider-principal">';
                                                    if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined') {
                                                        echo '
                                                        <h4 class="home-subtitle">'.$value["categoria"].'</h4>
                                                        <h2 class="home-title mt-4">'.$value["titulo"].'</h2>
                                                        <p class="home-desc mt-4 f-17">'.$value["texto"].'</p>';
                                                    }

                                                        echo '<div class="mt-4">
                                                            <a href="'.$value["url-boton-1"].'" class="pr-3 btn btn-primary btn-slider-item mb-5  '.$value["boton-1-color"].'">
                                                                ';
                                                                if (isset($value['boton-1-texto'])and $value['boton-2-texto'] != '' ){
                                                                    echo $value['boton-1-texto'];
                                                                }else
                                                                {
                                                                    echo "Ver Más";
                                                                }
                                                            echo'
                                                                
                                                            </a>
                                                            <a href="'.$value["url-boton-2"].'" class="pr-3 btn btn-primary btn-slider-item mb-5  '.$value["boton-2-color"].'">
                                                                ';
                                                                if (isset($value['boton-2-texto'] )and $value['boton-2-texto'] != ''){
                                                                    echo $value['boton-2-texto'];
                                                                }else
                                                                {
                                                                    echo "Ver Más";
                                                                }
                                                                echo'
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--<div class="col-lg-4 offset-lg-1">
                                                    <div class="home-image text-lg-right mt-4">
                                                        <img src="administrador/public/'.$value["foto-delante"].'" class="img-fluid" alt="">
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }

                        
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>