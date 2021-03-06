@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Afiliados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
              <li class="breadcrumb-item active">Consultar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        @foreach ($pagina_web as $element) @endforeach
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div id="informacionPrimaria" name="informacionPrimaria">
              <div id="listadoAfiliado" name="listadoAfiliado">
                <div class="card card-primary consultarAfiliado">
                  <div class="card-header">
                    <h3 class="card-title">Consultar Afiliados</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-success col-md-5 crearAfiliado">
                          <i class="fas fa-plus"></i> Agregar nuevo afiliado
                        </button>
                        
                        <a href="{{$element["servidor"]}}afiliados/exportar">
                          <button type="button" class="btn btn-primary col-md-5 tablaExportar" id="botonExportar" name="botonExportar" action="'.$url.'">
                            <i class="fas fa-table"></i> Exportar datos
                          </button>
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <br>
                    </div>
                    <table id="tablaAfiliados" class="table table-bordered table-hover dt-responsive">
                      <thead>
                        <tr>
                          <th style="width: 50px;">No.</th>
                          <th style="width: 100px;">Identificación</th>
                          <th>Nombre</th>
                          <th style="width: 100px;">Telefono</th>
                          <th style="width: 100px;">Acciones</th>
                          {{--<th>Nueva empresa</th>--}}
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="width: 50px;">No.</th>
                          <th style="width: 100px;">Identificación</th>
                          <th>Nombre</th>
                          <th style="width: 100px;">Telefono</th>
                          <th style="width: 100px;">Acciones</th>
                          {{--<th>Nueva empresa</th>--}}
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
                <div id="consultaAfiliado" name="consultaAfiliado" style="visibility: hidden;">
                  <div class="card card-primary collapsed-card" id="tarjetaInformacionAfiliado">
                    <div class="card-header">
                      <h3 class="card-title">Consultar Afiliado</h3>
                      <div class="card-tools">
                        <button type="button" title="Regresar" class="btn btn-tool verTablaEmpresas">
                          <i class="fas fa-arrow-left"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <table name="tablaAfiliado" id="tablaAfiliado" class="table table-bordered dt-responsive">
                        <tr>
                          <td rowspan="4" colspan="2" class="text-center">
                            <br>
                            <img src="" id="foto" name="foto">
                          </td>
                          <th><input class="form-control" id="tipo_documento" name="tipo_documento" value="" style="border: none; font-weight: bold; background: #FFFFFF;" readonly></input></th>
                          <td><input class="form-control" id="num_cedula" name="num_cedula" value="" style="border: none; background: #FFFFFF;" readonly></input></td>
                        </tr>
                        <tr>
                          <th>Nombre completo</th>
                          <td><input class="form-control" id="nombre_completo" name="nombre_completo" value="" style="border: none; background: #FFFFFF;" readonly></input></td>
                        </tr>
                        <tr>
                          <th>Genero</th>
                          <td><input class="form-control" id="genero" name="genero" value="" style="border: none; background: #FFFFFF;" readonly></input></td>
                        </tr>
                        <tr>
                          <th>Fecha de nacimiento</th>
                          <td><input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="" style="border: none; background: #FFFFFF;" readonly></input></td>
                        </tr>
                        <tr>
                          <th>Correo electronico</th>
                          <td><input class="form-control" id="email" name="email" value="" style="border: none; background: #FFFFFF;" readonly></input></td>
                          <th>Telefono o celular</th>
                          <td><input class="form-control" id="telefono" name="telefono" value="" style="border: none; background: #FFFFFF;" readonly></input></td>
                        </tr>
                      </table>
                    </div>
                    <div class="card-footer">
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="ingresarAfiliado" id="ingresarAfiliado" name="ingresarAfiliado" style="visibility: hidden;">
                <form action="{{url('/')}}/afiliados/general" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card card-success collapsed-card" id="tarjetaIngresarAfiliado">
                    <div class="card-header">
                      <div class="card-title">Agregar Afiliado</div>
                      <div class="card-tools">
                        <button type="button" title="Regresar" class="btn btn-tool verTablaEmpresas">
                          <i class="fas fa-arrow-left"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tipo de documento</label>
                            <select class="form-control select2bs4" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
                              <option selected="sin verificar"><i>Seleccionar tipo de documento...</i></option>
                              <option value="cedula">Cédula de Ciudadanía</option>
                              <option value="pasaporte">Pasaporte</option>
                              <option value="otro">Otro</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Número de documento</label>
                            <input type="number" class="form-control" name="numero_documento" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Primer nombre</label>
                            <input type="text" class="form-control" name="primer_nombre" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Segundo nombre</label>
                            <input type="text" class="form-control" name="segundo_nombre">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Primer apellido</label>
                            <input type="text" class="form-control" name="primer_apellido" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Segundo apellido</label>
                            <input type="text" class="form-control" name="segundo_apellido" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Sexo</label>
                            <select class="form-control select2bs4" name="sexo" id="sexo" style="width: 100%;" required>
                              <option selected="sin verificar"><i>Seleccionar sexo...</i></option>
                              <option value="m">Masculino</option>
                              <option value="f">Femenino</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Correo electronico</label>
                            <input type="email" class="form-control" name="correo_electronico">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Telefono o celular</label>
                            <input type="number" class="form-control" name="telefono">
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <div class="card-title">Adjuntar archivos</div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              
                              <div class="form-group my-2">
                                <label for="exampleInputPassword1">Foto afiliado</label><br>
                                {{--<div class="btn btn-default btn-file mb-3">
                                  <i class="fas fa-paperclip"></i> Adjuntar foto
                                  <input type="file" name="foto">
                                </div>--}}
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Seleccionar foto formato JPG, JPEG o PNG</label>
                                  </div>
                                </div>
                                <br>
                                <div class="text-center">
                                  <img src="" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                                  <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              
                              <div class="form-group my-2">
                                <label for="exampleInputPassword1">Documento de identidad</label>
                                <br>
                                {{--<div class="btn btn-default btn-file mb-3">
                                  <i class="fas fa-paperclip"></i> Adjuntar documento
                                  <input type="file" name="archivo_documento" required>
                                </div>--}}
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="archivo_documento" id="archivo_documento">
                                    <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo formato JPG, JPEG, PNG o PDF</label>
                                  </div>
                                </div>
                                <br>
                                <div class="text-center">
                                  <img src="" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                  <div class="form-group text-center logoPDF"></div>
                                  <p class="help-block small mt-3">Dimensiones: 700px * 200px para imagenes | Peso Max. 2MB | Formato: JPG, PNG o PDF</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="card-footer">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success col-md-6">
                          <i class="fas fa-check"></i> Guardar nuevo afiliado
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
 
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<!--=====================================
=            Editar Afiliado            =
======================================-->

@if (isset($status))
  @if ($status == 200)
    @foreach ($afiliado as $key => $value)



      <div class="modal" id="editarAfiliado">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Editar Afiliado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{url('/')}}/afiliados/general/{{$value["id_rprt_legal"]}}" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tipo de documento</label>
                        <select class="form-control select2bs4" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
                          <option value="{{$value["tipo_documento_rprt"]}}">
                            @if ($value["tipo_documento_rprt"] == "cedula")
                              Cédula de Ciudadanía
                            @endif
                            @if ($value["tipo_documento_rprt"] == "pasaporte")
                              Pasaporte
                            @endif
                            @if ($value["tipo_documento_rprt"] == "otro")
                              Otro
                            @endif
                          </option>
                          <option value="cedula">Cédula de Ciudadanía</option>
                          <option value="pasaporte">Pasaporte</option>
                          <option value="otro">Otro</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Número de documento</label>
                        <input type="number" class="form-control" name="numero_documento" value="{{$value["cc_rprt_legal"]}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Primer nombre</label>
                        <input type="text" class="form-control" name="primer_nombre" value="{{$value["primer_nombre"]}}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Segundo nombre</label>
                        <input type="text" class="form-control" name="segundo_nombre" value="{{$value["segundo_nombre"]}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Primer apellido</label>
                        <input type="text" class="form-control" name="primer_apellido" value="{{$value["primer_apellido"]}}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Segundo apellido</label>
                        <input type="text" class="form-control" name="segundo_apellido" value="{{$value["segundo_apellido"]}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Sexo</label>
                        <select class="form-control select2bs4" name="sexo" id="sexo" style="width: 100%;" required>
                          <option value="{{$value["sexo_rprt"]}}"><i>
                            @if ($value["sexo_rprt"] == "m")
                              Masculino
                            @endif
                            @if ($value["sexo_rprt"] == "f")
                              Femenino
                            @endif
                          </i></option>
                          <option value="m">Masculino</option>
                          <option value="f">Femenino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{$value["fecha_nacimiento"]}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo electronico</label>
                        <input type="email" class="form-control" name="correo_electronico" value="{{$value["email_rprt"]}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Telefono o celular</label>
                        <input type="number" class="form-control" name="telefono" value="{{$value["telefono_rprt"]}}">
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">Adjuntar archivos</div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          
                          <div class="form-group my-2">
                            <label for="exampleInputPassword1">Foto afiliado</label><br>
                            {{--<div class="btn btn-default btn-file mb-3">
                              <i class="fas fa-paperclip"></i> Adjuntar foto
                              <input type="hidden" value="{{$value["foto_rprt"]}}" name="foto_actual">
                              <input type="file" name="foto">
                            </div>--}}
                            <input type="hidden" value="{{$value["foto_rprt"]}}" name="foto_actual">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="foto">
                                <label class="custom-file-label" for="exampleInputFile">foto_afiliado_{{$value["cc_rprt_legal"]}}</label>
                              </div>
                            </div>
                            <br>
                            <div class="text-center">
                              @if ($value["foto_rprt"] == "")
                                <img src="" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                              @else
                                <img src="{{ url('/') }}/{{$value["foto_rprt"]}}" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                              @endif
                              <p class="help-block small mt-3">Dimensiones: 200px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          
                          <div class="form-group my-2">
                            <label for="exampleInputPassword1">Foto de documento de identidad</label>
                            {{--<div class="btn btn-default btn-file mb-3">
                              <i class="fas fa-paperclip"></i> Adjuntar documento
                              <input type="hidden" name="archivo_documento_actual" value="{{$value["foto_cedula_rprt"]}}">
                              <input type="file" name="archivo_documento">
                            </div>--}}
                            <input type="hidden" name="archivo_documento_actual" value="{{$value["foto_cedula_rprt"]}}">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="archivo_documento" id="archivo_documento">
                                <label class="custom-file-label" for="exampleInputFile">documento_identidad_{{$value["cc_rprt_legal"]}}</label>
                              </div>
                            </div>
                            <br>
                            <div class="text-center">
                              @if ($tipo_cedula == "pdf")
                                <iframe src="{{ url('/') }}/{{$value["foto_cedula_rprt"]}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                              @if ($tipo_cedula == "imagen")
                                @if ($value["foto_cedula_rprt"] == "")
                                  <img src="" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                @else
                                  <img src="{{ url('/') }}/{{$value["foto_cedula_rprt"]}}" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                @endif
                              @endif
                              <p class="help-block small mt-3">Peso Max. 2MB | Formato: JPG, PNG o PDF</p>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endforeach
    <script>  
      $("#editarAfiliado").modal();
    </script>
    

      @else
      {{$status}}
  @endif
@endif

<!--====  End of Editar Afiliado  ====-->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //File-input
    bsCustomFileInput.init();
  })
</script>

  @if (Session::has("no-validacion"))
<script>
  swal({
    title: "¡Cuidado!",
    text: "Está intentando ingresar caracteres no validos.",
    type: "warning"
  });
</script>
@endif
@if (Session::has("ok-crear"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "El afiliado fue ingresado correctamente a la base de datos.",
    type: "success"
  });
</script>
@endif
@if (Session::has("ok-editar"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "Información actualizada correctamente.",
    type: "success"
  });
</script>
@endif
@if (Session::has("error"))
<script>
  swal({
    title: "¡Error!",
    text: "Los datos estan vacios.",
    type: "error"
  });
</script>
@endif


  @endsection