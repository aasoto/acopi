<section class="home-slider" id="home">
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
                                    <div class="home-desc-center">
                                        <div class="bg-overlay-color"></div>
                                        <div class="container">
                                            <div class="row vertical-content">

                                                <div class="col-lg-7">
                                                    <div class="home-content mt-4">
                                                        <h4 class="home-subtitle">'.$value["categoria"].'</h4>
                                                        <h2 class="home-title mt-4">'.$value["titulo"].'</h2>
                                                        <p class="home-desc mt-4 f-17">'.$value["texto"].'</p>

                                                        <div class="mt-4">
                                                            <a href="" class="pr-3">
                                                                <img src="administrador/public/'.$value["boton-1"].'" class="mt-4" height="50" alt="">
                                                            </a>
                                                            <a href="">
                                                                <img src="administrador/public/'.$value["boton-2"].'" class="mt-4" height="50" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 offset-lg-1">
                                                    <div class="home-image text-lg-right mt-4">
                                                        <img src="administrador/public/'.$value["foto-delante"].'" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            $active = false;
                        }else{
                            echo '
                                <div class="carousel-item" style="background-image: url(administrador/public/'.$value["fondo"].');
                                background-position: center center;">
                                <div class="home-center">
                                    <div class="home-desc-center">
                                        <div class="bg-overlay-color"></div>
                                        <div class="container">
                                            <div class="row vertical-content">

                                                <div class="col-lg-7">
                                                    <div class="home-content mt-4">
                                                        <h4 class="home-subtitle">'.$value["categoria"].'</h4>
                                                        <h2 class="home-title mt-4">'.$value["titulo"].'</h2>
                                                        <p class="home-desc mt-4 f-17">'.$value["texto"].'</p>

                                                        <div class="mt-4">
                                                            <a href="" class="pr-3">
                                                                <img src="administrador/public/'.$value["boton-1"].'" class="mt-4" height="50" alt="">
                                                            </a>
                                                            <a href="">
                                                                <img src="administrador/public/'.$value["boton-2"].'" class="mt-4" height="50" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 offset-lg-1">
                                                    <div class="home-image text-lg-right mt-4">
                                                        <img src="administrador/public/'.$value["foto-delante"].'" class="img-fluid" alt="">
                                                    </div>
                                                </div>
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