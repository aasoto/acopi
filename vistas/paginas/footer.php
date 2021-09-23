<!-- START FOOTER -->
<footer class="section bg-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                <form action="/action_page.php">
                    <div class="footer-content">
                        <h3 class="footer-title">Afiliate</h3>
                        <br><br>
                    </div>

                    <label class="footer-info" for="fname">Nombre completo:</label><br>
                    <input type="text" id="fname" name="fname" value=""><br>
                    <label class="footer-info" for="lname">Empresa:</label><br>
                    <input type="text" id="lname" name="lname" value=""><br>
                    <label class="footer-info" for="fname">E-mail:</label><br>
                    <input type="email" id="fname" name="fname" value=""><br>
                    <label class="footer-info" for="lname">Telefono:</label><br>
                    <input type="number" id="lname" name="lname" value=""><br><br>
                    <input type="submit" value="Submit">
                    <input type="reset">
              </form>
            </div>
            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Redes Sociales</h3>
                </div>
                <div class="mt-5">
                    <p class="footer-info">Aquí puedes contactarnos en la plataformas digistales y seguir más de cerca nuestro trabajo</p>

                    <div class="mt-4">
                        <ul class="list-inline footer-social mb-0">
                            <?php 
                                $redes_sociales = json_decode($pagina_web["redes_sociales"], true);
                                //echo '<pre>'; print_r($pagina_web["aliados"]); echo '</pre>';
                                foreach ($redes_sociales as $key => $value) {
                                    echo '<li class="list-inline-item">
                                            <a href="'.$value["link"].'" class="rounded">
                                                <i class="'.$value["logo"].'"></i>
                                            </a>
                                        </li>';
                                }
                            ?>

                        </ul>
                    </div>

                </div>
            </div>

            

            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Features</h3>
                </div>

                <ul class="list-unstyled footer-link mt-5">
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Acerca de nosotros</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Noticias</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Productos y servicios</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Entrevistas</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Clientes</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Sign Up</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Contactanos</h3>
                </div>
                <div class="mt-5">
                    <?php

                    $contacto = json_decode($pagina_web ["contacto"], true);
                    echo '<p class="footer-info"><i class="mdi mdi-home mr-2"></i>'.$contacto[0].'</p>
                    <p class="footer-info"><i class="mdi mdi-phone mr-2"></i>'.$contacto[1].'</p>
                    <p class="footer-info"><i class="mdi mdi-cellphone mr-2"></i>'.$contacto[2].'</p>
                    <p class="footer-info"><i class="mdi mdi-email mr-2"></i>'.$contacto[3].'</p>';

                    ?>
                </div>

            </div>

        </div>
        <div class="text-center mt-5">
            <p class="footer-alt mb-0 f-15">2018 © Aparax. All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- END FOOTER -->