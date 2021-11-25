@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Carrusel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="#">Página web</a></li>
              <li class="breadcrumb-item active">Carrusel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
      @foreach ($paginaweb as $element) @endforeach
      <div class="container-fluid">
        <!--=============================================
        =            Sección Información General            =
        =============================================-->

          <form action="{{url('/')}}/pagina_web/carrusel/{{$element->id}}" method="post">
              @method('PUT')
              @csrf

          <div class="card card-primary">
            <!--==============================================
            =            Card header - cabecera            =
            ==============================================-->

            <div class="card-header">
              <h3 class="card-title">Información General</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <!--=====  End of Card header - cabecera  ======-->



              <!--==============================================
              =            Cuerpo            =
              ==============================================-->
              <div class="card-body">

                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Dominio</label>
                          <input type="text" class="form-control" name="dominio" value="{{ $element->dominio}}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Servidor</label>
                          <input type="text" class="form-control" name="servidor" value="{{ $element->servidor}}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Titulo pestaña</label>
                          <input type="text" class="form-control" name="titulo_pestana" value="{{ $element->titulo_pestana}}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Titulo página</label>
                          <input type="text" class="form-control" name="titulo_pagina" value="{{ $element->titulo_pagina}}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Titulo navegación</label>
                          <input type="text" class="form-control" name="titulo_navegacion" value="{{ $element->titulo_navegacion}}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Descripción</label>
                          <textarea class="form-control" rows="5" name="descripcion" required>{{$element->descripcion}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Palabras claves</label>
                          @php
                            $tags = json_decode($element->palabras_claves, true);
                            $palabras_claves = "";
                            foreach ($tags as $key => $value) {
                              $palabras_claves .= $value.",";
                            }
                          @endphp
                          <input type="text" class="form-control" name="palabras_claves" value="{{$palabras_claves}}" data-role="tagsinput" required>
                        </div>
                      </div>
                    </div>
                      <!--==============================================
                      =            Boton formulario            =
                      ==============================================-->

                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">
                              <i class="fas fa-check"></i> Guardar
                          </button>
                      </div>

                      <!--=====  End of Boton formulario  ======-->

              </div>
              <!--=====  End of Cuerpo  ======-->

              <!--==============================================
              =            Footer            =
              ==============================================-->



              <!--=====  End of Footer  ======-->

          </div>
          <!--=====  End of Sección Información General  ======-->

          <!--===============================================
          =            Sección cambio de logos            =
          ===============================================-->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Logos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1">Logo pestaña</label>
                  <div class="form-group my-2 text-center">
                    <div class="btn btn-default btn-file mb-3">
                      <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                      <input type="file" name="logo">
                      <input type="hidden" name="logo_actual" value="{{url('/')}}/vistas/{{$element->logo_pestana}}" required>
                    </div>
                    <br>
                    <img src="{{url('/')}}/vistas/{{$element->logo_pestana}}" class="img-fluid py-2 bg-secondary previsualizarImg_logo">
                    <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputPassword1">Logo navegación</label>
                  <div class="form-group my-2 text-center">
                    <div class="btn btn-default btn-file mb-3">
                      <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                      <input type="file" name="logo">
                      <input type="hidden" name="logo_actual" value="{{url('/')}}/vistas/{{$element->logo_navegacion}}" required>
                    </div>
                    <br>
                    <img src="{{url('/')}}/vistas/{{$element->logo_navegacion}}" class="img-fluid py-2 bg-secondary previsualizarImg_logo">
                    <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--=====  End of Sección cambio de logos  ======-->

          <!--======================================
          =            Sección footer            =
          ======================================-->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Footer</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <!--================================================
              =            Formulario pie de página            =
              ================================================-->


                <div class="row">


                <!--==============================================
                =            Columna Redes Sociales            =
                ==============================================-->

                <div class="col-md-6">
                  <label for="footerRedesSociales">Redes Sociales</label>
                  <div class="row">
                    <div class="col-5">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <span class="input-group-text">Icono</span>
                        </div>
                        <select class="form-control" id="icono_red">
                          <option value="fab fa-facebook-f, facebook">
                            facebook
                          </option>
                          <option value="fab fa-instagram, instagram">
                            instagram
                          </option>
                          <option value="fab fa-twitter, twitter">
                            twitter
                          </option>
                          <option value="fab fa-youtube, youtube">
                            youtube
                          </option>
                          <option value="fab fa-snapchat-ghost, snapchat">
                            snapchat
                          </option>
                           <option value="fab fa-linkedin-in, linkedin">
                            linkedin
                          </option>
                          <option value="fab fa-pinterest-p, pinterest">
                            pinterest
                          </option>
                          <option value="fab fa-tiktok, tiktok">
                            tiktok
                          </option>
                        </select>
                      </div>
                    </div>
                    {{-- fin 5 col --}}
                    <div class="col-5">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <span class="input-group-text">Url</span>
                        </div>
                        <input type="text" class="form-control" id="url_red">
                      </div>
                    </div>
                    {{-- fin 5 col --}}
                    <div class="col-2">
                      <button type="button" class="btn btn-primary w-100 agregarRed">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    {{-- fin 2 col --}}
                  </div>
                  {{-- fin del row --}}
                  <div class="row listadoRed">

                    @php
                     echo "<input type='hidden' name='redes_sociales' value='".$element->redes_sociales."' id='listaRed'>";
                      $redes = json_decode($element->redes_sociales, true);
                      foreach ($redes as $key => $value) {
                        echo '<div class="col-lg-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <div class="input-group-text text-white" style="background:#000000">
                                    <i class="'.$value["logo"].'"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" value="'.$value["link"].'">
                              <div class="input-group-prepend">
                                <div class="input-group-text" style="cursor:pointer">
                                    <span class="bg-danger px-2 rounded-circle eliminarRed" red="'.$value["logo"].'" url="'.$value["link"].'">&times;</span>
                                </div>
                              </div>
                            </div>
                          </div>';
                      }
                    @endphp
                  </div>
                </div>

                <!--=====  End of Columna Redes Sociales  ======-->

                <!--=======================================================
                =            Columna Información de Contacto            =
                =======================================================-->

                <div class="col-md-6">
                  <label for="footerInfoContacto">Información de contacto</label>
                  @php
                    $valor = json_decode($element->contacto, true);

                    echo '
                    <div class="form-group">
                      <label for="footerDireccion">Dirección</label>
                      <input type="text" class="form-control" name="servidor" value="'.$valor[0].'" required>
                    </div>
                    <div class="form-group">
                      <label for="footerTelefono">Telefono</label>
                      <input type="text" class="form-control" name="servidor" value="'.$valor[1].'" required>
                    </div>
                    <div class="form-group">
                      <label for="footerCelular">Celular</label>
                      <input type="text" class="form-control" name="servidor" value="'.$valor[2].'" required>
                    </div>
                    <div class="form-group">
                      <label for="footerCorreoElectronico">Correo electronico</label>
                      <input type="text" class="form-control" name="servidor" value="'.$valor[3].'" required>
                    </div>';
                  @endphp
                </div>

                <!--=====  End of Columna Información de Contacto  ======-->

                <!--==============================================
                =            Botón del final del formulario            =
                ==============================================-->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Guardar
                  </button>
                </div>

                <!--=====  End of Botón del final del formulario  ======-->


              </div>


              <!--=====  End of Formulario pie de página  ======-->
            </div>
          </div>
          <!--=====  End of Sección footer  ======-->
          </form>
      </div>
    </section>
    <!-- /.content -->
  </div>

  @if (Session::has("no-validacion"))
    <script>
      swal({
          title: "¡Cuidado!",
          text: "Está intentando ingresar caracteres no validos.",
          icon: "warning"
      });
    </script>
  @endif
  @if (Session::has("ok-editar"))
    <script>
      swal({
          title: "¡Bien Hecho!",
          text: "Información actualizada.",
          icon: "success"
      });
    </script>
  @endif
  @if (Session::has("error"))
    <script>
      swal({
          title: "¡Error!",
          text: "Error al intentar actualizar.",
          icon: "error"
      });
    </script>
  @endif

  @endsection
