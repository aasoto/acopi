<!-- START SCREENSHORT -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Aliados</h4>
                    <p class="title-desc text-muted mt-4">Estos son nuestros colaboradores, con los que nuestra agremiación ha desarrollado diferente proyectos.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-12">
                <div id="owl-carousel" class="carousel-app-phone text-center">
                    <?php 
                        $aliados = json_decode($pagina_web["aliados"], true);
                        //echo '<pre>'; print_r($pagina_web["aliados"]); echo '</pre>';
                        foreach ($aliados as $key => $value) {
                            echo '<div class="item mt-4">
                                    <div class="screenshot-overlay">
                                        <a class="mfp-image" href="'.$value["link"].'" title=""></a>
                                    </div>
                                    <div class="screenshot-img">
                                        <img src="'.$value["logo"].'" class="img-fluid" alt="">
                                    </div>
                                </div>';
                        }
                    ?>

                    <!--<div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="http://www.unicesar.edu.co/" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/aliados/aliados-upc.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="images/aliados/aliados-udes.png" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/aliados/aliados-udes.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="images/aliados/aliados-areandina.png" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/aliados/aliados-areandina.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="images/aliados/aliados-sena.png" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/aliados/aliados-sena.png" class="img-fluid" alt="">
                        </div>
                    </div>-->
                    <!--<div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="images/screenshot/img-alt-5.png" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/screenshot/img-5.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="images/screenshot/img-alt-6.png" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/screenshot/img-6.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="item mt-4">
                        <div class="screenshot-overlay">
                            <a class="mfp-image" href="images/screenshot/img-alt-7.png" title=""></a>
                        </div>
                        <div class="screenshot-img">
                            <img src="images/screenshot/img-7.png" class="img-fluid" alt="">
                        </div>
                    </div>-->
                </div>
            </div>

        </div>

    </div>
</section>
<!-- END SCREENSHORT -->