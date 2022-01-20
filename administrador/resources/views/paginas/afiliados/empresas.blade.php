@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Empresas</h1>
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
            @if (isset($status))
              @if ($status == 200)
                @foreach ($afiliado as $key => $value)
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Ingresar empresa</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <form action="{{url('/')}}/afiliados/empresas" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <input type="hidden" name="accion" id="accion" value="agregarEmpresaAfiliado">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Número de documento</label>
                              <input type="texto" class="form-control" name="cedula" value="{{$value["cc_rprt_legal"]}}" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Afiliado</label>
                              <input type="texto" class="form-control" name="nombre" value="{{$value["primer_apellido"]." ".$value["segundo_apellido"]." ".$value["primer_nombre"]." ".$value["segundo_nombre"]}}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>NIT</label>
                              <input type="texto" class="form-control" name="nit" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Razón social</label>
                              <input type="texto" class="form-control" name="razon_social" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Número de empleados</label>
                              <input type="number" class="form-control" name="num_empleados" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Dirección</label>
                              <input type="texto" class="form-control" name="direccion" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Telefono</label>
                              <input type="number" class="form-control" name="telefono" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Fax</label>
                              <input type="texto" class="form-control" name="fax">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Celular</label>
                              <input type="texto" class="form-control" name="celular">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Correo electronico</label>
                              <input type="email" class="form-control" name="correo_electronico" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Sector empresa</label>
                              <select class="form-control select2" name="sector_empresa" id="sector_empresa" style="width: 100%;" required>
                                <option value="">Seleccionar...</option>
                                @foreach ($sectores as $key => $sector)
                                  <option value="{{$sector["id_sector"]}}">{{$sector["nombre_sector"]}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Productos empresa</label>
                              <input type="texto" class="form-control" name="productos" data-role="tagsinput">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Ciudad</label>
                              <select class="form-control select2" name="ciudad" id="ciudad" style="width: 100%;">
                                <option value="">Seleccionar...</option>
                                <option value="Valledupar">Valledupar</option>
                                <option value="La paz">La Paz</option>
                                <option value="Agustín Codazzi">Agustín Codazzi</option>
                                <option value="Aguachica">Aguachica</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Fecha afiliación</label>
                              <input type="date" class="form-control" name="fecha_afiliacion">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-success col-md-6">
                            <i class="fas fa-check"></i> Guardar nueva empresa
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                @endforeach
              @endif
            @endif
          </div>
        </div>
      </div>
    </section>
</div>

@if (isset($empresa_existe))
  @if ($empresa_existe == "si")
  <script>
    swal({
      title: "¡Este usuario ya tiene una empresa registrada!",
      text: "¿Desea registrarle una otra empresa? Si no lo desea puede cancelar esta acción.",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Sí, registrar otra empresa!"
    }).then(function(result){
      if(!result.value){
        window.history.back();
      }
    });
  </script>
  @endif
@endif

@endsection