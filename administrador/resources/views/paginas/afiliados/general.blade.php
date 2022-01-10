@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Afiliado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="#">Afiliados</a></li>
              <li class="breadcrumb-item active">Consultar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
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
                  <div class="col-12">
                    <button type="button" class="btn btn-success crearAfiliado">
                      <i class="fas fa-plus"></i> Agregar nuevo afiliado
                    </button>
                  </div>
                </div>
                <table id="tablaAfiliados" class="table table-bordered table-hover dt-responsive">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Identificación</th>
                      <th style="width: 700px;">Nombre</th>
                      <th>Correo Electronico</th>
                      <th>Telefono</th>
                      <th>Fecha Nacimiento</th>
                      <th>Sexo</th>
                      <th>Foto</th>
                      <th>Empresa</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Identificación</th>
                      <th width="700px">Nombre</th>
                      <th>Correo Electronico</th>
                      <th>Telefono</th>
                      <th>Fecha Nacimiento</th>
                      <th>Sexo</th>
                      <th>Foto</th>
                      <th>Empresa</th>
                      <th>Acciones</th>
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
            <form action="{{url('/')}}/afiliados/general" method="post" enctype="multipart/form-data">
              @csrf
              <div class="ingresarAfiliado">
              
              </div>
            </form>
            
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
              <h4 class="modal-title">Editar Entrevista</h4>
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
                        <select class="form-control select2" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
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
                        <select class="form-control select2" name="sexo" id="sexo" style="width: 100%;" required>
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
                  <div class="row">
                    <div class="col-md-6">
                      
                      <div class="form-group my-2 text-center">
                        <label for="exampleInputPassword1">Foto afiliado</label><br>
                        <div class="btn btn-default btn-file mb-3">
                          <i class="fas fa-paperclip"></i> Adjuntar foto
                          <input type="hidden" value="{{$value["foto_rprt"]}}" name="foto_actual">
                          <input type="file" name="foto">
                        </div>
                        <br>
                        @if ($value["foto_rprt"] == "")
                          <img src="{{ url('/') }}/vistas/images/afiliados/unknown.png" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                        @else
                          <img src="{{ url('/') }}/{{$value["foto_rprt"]}}" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                        @endif
                        
                        <p class="help-block small mt-3">Dimensiones: 200px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      
                      <div class="form-group my-2 text-center">
                        <label for="exampleInputPassword1">Foto de documento de identidad</label><br>
                        <div class="btn btn-default btn-file mb-3">
                          <i class="fas fa-paperclip"></i> Adjuntar documento
                          <input type="hidden" name="archivo_documento_actual" value="{{$value["foto_cedula_rprt"]}}">
                          <input type="file" name="archivo_documento">
                        </div>
                        <br>
                        @if ($value["foto_cedula_rprt"] == "")
                          <img src="{{ url('/') }}/vistas/images/afiliados/address-card.png" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                        @else
                          <img src="{{ url('/') }}/{{$value["foto_cedula_rprt"]}}" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                        @endif
                       
                        <p class="help-block small mt-3">Peso Max. 2MB | Formato: JPG, PNG</p>
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