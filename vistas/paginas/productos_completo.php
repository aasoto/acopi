<!-- START FAQ -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Productos y servicios</h4>
                    <p class="title-desc text-muted mt-4">Acopi Cesar en busqueda de cumplir con su proposito y potenciar el desarrollo de los microempresarios en el departamento, les ofrece los siguiente productos y servicios.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4 vertical-content">

            <?php 
                $productos = json_decode($pagina_web["productos"], true);
                $contador = 0;
                foreach ($productos as $key => $value) {
                    $contador++;
                }
                 
                //echo '<pre>'; print_r($pagina_web["aliados"]); echo '</pre>';
                foreach ($productos as $key => $value) {

                    echo '<div class="col-lg-6">
                            <div class="faq-content mt-4">
                                <div id="accordion">';
                                if ($key <= ($contador/2)) {
                                    echo '<div class="card mt-3">
                                        <div class="card-header" id="heading'.$key.'">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">
                                                 <span class="text-custom pr-3">'.$value["num"].'</span>'.$value["nombre"].'
                                                </button>
                                          </h5>
                                        </div>

                                        <div id="collapse'.$key.'" class="collapse" aria-labelledby="heading'.$key.'" data-parent="#accordion" style="">
                                            <p class="card-body text-muted">
                                                '.$value["descripcion"].' 
                                            </p>
                                        </div>
                                    </div>';
                                } else{
                                    echo '<div class="card mt-3">
                                        <div class="card-header" id="heading'.$key.'">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">
                                                 <span class="text-custom pr-3">'.$value["num"].'</span>'.$value["nombre"].'
                                                </button>
                                          </h5>
                                        </div>

                                        <div id="collapse'.$key.'" class="collapse" aria-labelledby="heading'.$key.'" data-parent="#accordion" style="">
                                            <p class="card-body text-muted">
                                                '.$value["descripcion"].' 
                                            </p>
                                        </div>
                                    </div>';
                                    }
                                echo '</div>
                            </div>
                        </div>';
                }
                //Armoniza la estetica cuando el número total de los productos sea impar
                if ( $contador%2 != 0 ) {
                    echo '<div class="col-lg-6"></div>';
                } 
                $contador = 0;
            ?>

            <!-- Aquí empieza la primera columna de los productos y servicios-->
            <!--<div class="col-lg-6">
                <div class="faq-content mt-4">
                    <div id="accordion">
                        <div class="card mt-3">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                     <span class="text-custom pr-3">01.</span>Representación y liderazgo gremial.
                                    </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Defendemos los intereses del sector ante las entidades gubernamentales y no gubernamentales, nacionales y/o extranjeras. 
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       <span class="text-custom pr-3">02.</span>Convenios de cooperación interinstitucional.
                                    </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Sucritos con diversas entidades para desarrollar programas que contribuyan al fomentos de la pequeña y mediana empresa.
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       <span class="pr-3 text-custom">03.</span>Alianzas estrategicas.
                                    </button>
                                  </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Promovemos la asociación entre empresas afines para propocionar la transferencia de bienes y servicios buscando la ampliacion de sus mercados y la disminución de sus costos. 
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                     <span class="text-custom pr-3">04.</span>Capacitación.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                   Programamos conferencias, talleres, crusos y seminarios especializados en diversas areas administrativas y tecnicas, orientadas a resolver las necesidades de capacitación del sector industrial, con tarifas especiales para afiliados.
                                </p>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFour">
                                     <span class="text-custom pr-3">05.</span>Asesorías.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Nuestros afiliados pueden obtener asesorías en las siguientes areas:
                                    <li class="card-body text-muted">Juridica</li>
                                    <li class="card-body text-muted">Contabilidad</li>
                                    <li class="card-body text-muted">Recursos Humanos</li>
                                    <li class="card-body text-muted">Diagnostico Empresaríal</li>
                                    <li class="card-body text-muted">Gerencia</li>
                                    <li class="card-body text-muted">Marketing</li>
                                    <li class="card-body text-muted">Atención al Cliente</li>
                                    <li class="card-body text-muted">Sistemas</li>
                                </p>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                     <span class="text-custom pr-3">06.</span>Información y divulgación.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Es nuestro interes mantener una cordial y permanente comunicación con nuestro gremio que nos permite hacerle llegar información especializada del sector y conocer sus inquietudes y necesidades.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <!-- Aquí empieza la segunda columna de los productos y servicios-->
            <!--<div class="col-lg-6">
                <div class="faq-content mt-4">
                    <div id="accordion">
                        <div class="card mt-3">
                            <div class="card-header" id="headingSeven">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                     <span class="text-custom pr-3">07.</span>Eventos especiales.
                                    </button>
                              </h5>
                            </div>

                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Con el proposito de promocionar e integrar a nuestro afiliados, buscando ampliar sus horizontes, organizamos y apoyamos la realización de encuentros empresariales, muestras y ferias como Expocesar, Con la participación de entidades como PROEXPORT organizamos misiones a otros paises con la imtención de establecer contactos para importación y Exportación. 
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingEight">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                       <span class="text-custom pr-3">08.</span>Eventos institucionales.
                                    </button>
                              </h5>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Asamblea General de Afiliados, Convención Nacional, Congreso Nacional.
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingNine">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                       <span class="pr-3 text-custom">09.</span>Practicas empresariales.
                                    </button>
                                  </h5>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Mediante Convenios con las universidades, estamos en la posibilidad de facilitar a nuestros afiliados practicantes calificados que les apoyen en la implantación de procesos hacia una mayor productividad, para lo cual se ha conformado un COMITÉ INTERDISCIPLINARIO. 
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingTen">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                     <span class="text-custom pr-3">10.</span>Fortalecimiento y desarrollo Sectorial.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    A traves de los programas de desarrollo sectorial PRODES, se implementan actividades asociativas, orientadas al mejoramiento de la gestión y competividad con el objetivo final incorporar a las PYMES de la región en la corriente de los negocios internacionales.
                                </p>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header" id="headingEleven">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                                     <span class="text-custom pr-3">11.</span>Centros de conciliación y arbitraje.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseEleven" class="collapse" aria-labelledby="headingElven" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Al servicio de nuestros afiliados para disminuir conflictos por la via de la conciliación.
                                </p>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                     <span class="text-custom pr-3">04.</span>Donec hendrerit facilisis.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Maecenas viverra felis bibendum placerat euismod thay sapien curabitur pellentesque volutpat rhoncus lacinia dui  leo in tempus blandit iverra ultrices placerat quis on donec scelerisque laoreet convallis Fusce magna dui placerat imperdiet eget posuere palankg kauris nulla lacus varius lacinia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>
<!-- END FAQ -->