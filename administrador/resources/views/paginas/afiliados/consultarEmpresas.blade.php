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
            <li class="breadcrumb-item active">Consultar Empresas</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      @foreach ($paginaweb as $element) @endforeach
      <div class="row">
        <div class="col-12">
          
          <input type="hidden" name="sectores" id="sectores" value='{{$sector_empresa}}'>
          <div id="listadoEmpresas" name="listadoEmpresas">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Consultar Empresas</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="col-md-12 text-center">
                   <a href="{{$element["servidor"]}}afiliados/exportarEmpresas">
                    <button type="button" class="btn btn-primary col-md-5 tablaExportar" id="botonExportar" name="botonExportar" action="'.$url.'">
                      <i class="fas fa-table"></i> Exportar datos
                    </button>
                  </a>
                </div>
                <table id="tablaEmpresas" class="table table-bordered table-hover dt-responsive">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Acciones</th>
                      <th>NIT</th>
                      <th>Razón social</th>
                      <th>Representante</th>
                      <th>Telefonos</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Acciones</th>
                      <th>NIT</th>
                      <th>Razón social</th>
                      <th>Representante</th>
                      <th>Telefonos</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer">
                
              </div>
            </div>
          </div>
          
          <div id="descripcionEmpresa" name="descripcionEmpresa" style="visibility: hidden;">
            <div class="card card-primary collapsed-card" id="tarjetaDescripcion">
              <div class="card-header">
                <h3 class="card-title">Consultar Empresa</h3>
                <div class="card-tools">
                  <button type="button" title="Regresar" class="btn btn-tool verTablaEmpresas">
                    <i class="fas fa-arrow-left"></i>
                  </button>
                  <button type="button" title="Minimizar" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table  name="tablaEmpresa" id="tablaEmpresa" class="table table-bordered dt-responsive">
                  <tr>
                    <th>NIT</th>
                    <td><input class="form-control" id="nit" name="nit" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th>Razón social</th>
                    <td><input class="form-control" id="razon_social" name="razon_social" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Representante</th>
                    <td><input class="form-control" id="representante" name="representante" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th>Número empleados</th>
                    <td><input class="form-control" id="numero_empleados" name="numero_empleados" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Dirección</th>
                    <td><input class="form-control" id="direccion" name="direccion" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th>Telefono</th>
                    <td><input class="form-control" id="telefono" name="telefono" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Fax</th>
                    <td><input class="form-control" id="fax" name="fax" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th>Celular</th>
                    <td><input class="form-control" id="celular" name="celular" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Correo electronico</th>
                    <td><input class="form-control" id="correo_electronico" name="correo_electronico" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th>Sector</th>
                    <td><input class="form-control" id="sector" name="sector" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Productos</th>
                    <td><textarea class="form-control" id="productos" name="productos" style="border: none; background: #FFFFFF;" readonly></textarea></td>
                    <th>Ciudad</th>
                    <td><input class="form-control" id="ciudad" name="ciudad" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Estado</th>
                    <td><input class="form-control" id="estado" name="estado" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th>Pagos atrasados</th>
                    <td><input class="form-control" id="pagos_atrasados" name="pagos_atrasados" value="" style="border: none; background: #FFFFFF;" readonly></td>
                  </tr>
                  <tr>
                    <th>Fecha afiliación</th>
                    <td><input class="form-control" id="fecha_afiliacion" name="fecha_afiliacion" value="" style="border: none; background: #FFFFFF;" readonly></td>
                    <th></th>
                    <td></td>
                  </tr>
                </table>
              </div>
              <div class="card-footer">
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
  </section>
</div>

@if (isset($status))
  @if ($status == 200)
    @foreach ($empresa as $key => $value)
      <div class="modal" id="editarEmpresa">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Editar información empresa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form method="POST" action="{{url('/')}}/afiliados/consultarEmpresas/{{$value["id_empresa"]}}" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="modal-body">
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
                      <input type="texto" class="form-control" name="nombre" value="{{$value->nombre["primer_apellido"]." ".$value->nombre["segundo_apellido"]." ".$value->nombre["primer_nombre"]." ".$value->nombre["segundo_nombre"]}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIT</label>
                      <input type="texto" class="form-control" name="nit" value="{{$value["nit_empresa"]}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Razón social</label>
                      <input type="texto" class="form-control" name="razon_social" value="{{$value["razon_social"]}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Número de empleados</label>
                      <input type="number" class="form-control" name="num_empleados" value="{{$value["num_empleados"]}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Dirección</label>
                      <input type="texto" class="form-control" name="direccion" value="{{$value["direccion_empresa"]}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Telefono</label>
                      <input type="number" class="form-control" name="telefono" value="{{$value["telefono_empresa"]}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Fax</label>
                      <input type="texto" class="form-control" name="fax" value="{{$value["fax_empresa"]}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Celular</label>
                      <input type="texto" class="form-control" name="celular" value="{{$value["celular_empresa"]}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Correo electronico</label>
                      <input type="email" class="form-control" name="correo_electronico" value="{{$value["email_empresa"]}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sector empresa</label>
                      <select class="form-control select2" name="sector_empresa" id="sector_empresa" style="width: 100%;" required>
                        @foreach ($sector_empresa as $key => $sector)

                          @if ($sector["id_sector"] == $value["id_sector_empresa"])
                            <option selected="{{$sector["id_sector"]}}" value="{{$sector["id_sector"]}}">{{$sector["nombre_sector"]}}</option>
                          @else
                            <option value="{{$sector["id_sector"]}}">{{$sector["nombre_sector"]}}</option>
                          @endif
                          
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Productos empresa</label>
                      @php
                        $tags = json_decode($value["productos_empresa"], true);
                        $productos = "";
                        foreach ($tags as $key => $cadena) {
                          $productos .= $cadena.",";
                        }
                      @endphp
                      <input type="texto" class="form-control" name="productos" value="{{$productos}}" data-role="tagsinput">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ciudad</label>
                      <select class="form-control select2" name="ciudad" id="ciudad" style="width: 100%;">
                        <option value="{{$value["ciudad_empresa"]}}">{{$value["ciudad_empresa"]}}</option>
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
                      <input type="date" class="form-control" name="fecha_afiliacion" value="{{$value["fecha_afiliacion_empresa"]}}">
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
        </div>
      </div>
    @endforeach
    <script>  
      $("#editarEmpresa").modal();
    </script>
    

      @else
      {{$status}}
  @endif
@endif

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
    });
  </script>
  @endif
@endif

@if (Session::has("no-validacion"))
<script>
  swal({
    title: "¡Cuidado!",
    text: "Está intentando ingresar caracteres no validos.",
    type: "warning"
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