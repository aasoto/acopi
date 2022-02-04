@extends('plantilla')

@section('content')

  <div class="content-wrapper" style="min-height: 243px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Consultar Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Consultar pagos</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">

      <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Información General</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        
        <div class="card-body">
          <div class="col-md-12 text-center">
            <button class="btn btn-success col-md-6" data-toggle="modal" data-target="#generarPagos">
              <i class="fas fa-user-plus"></i> Generar pagos de este mes
            </button>
          </div>
          <br>
          <table id="tablaPagos" class="table table-bordered table-striped dt-responsive">
            <thead>
            <tr>
              <th>No.</th>
              <th>Codigo</th>
              <th>Representante</th>
              <th>Empresa</th>
              <th>Mes</th>
              <th>Estado</th>
              <th>Valor deuda</th>
              <th>Valor mes</th>
              <th>Valor recibo</th>
              <th>Fecha limite</th>
              <th>Procedimientos</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
              <th>No.</th>
              <th>Codigo</th>
              <th>Representante</th>
              <th>Empresa</th>
              <th>Mes</th>
              <th>Estado</th>
              <th>Valor deuda</th>
              <th>Valor mes</th>
              <th>Valor recibo</th>
              <th>Fecha limite</th>
              <th>Procedimientos</th>
            </tr>
            </tfoot>
          </table>
        </div>
        
        
        <div class="card-footer">
          
        </div> 
      </div>
    </div>
  </section>
</div>

<div class="modal" id="generarPagos">
 
  <div class="modal-dialog">
   
    <div class="modal-content">
      <form method="POST" action="{{url('/')}}/pagos/general">
        @csrf 

        <div class="modal-header bg-success">          
          <h4 class="modal-title">Generar recibos de pago del mes de @php
            setlocale(LC_TIME, "spanish");
            echo strftime("%B");
          @endphp</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <p>¿Desea generar los recibos del mes?</p>
          <h5>Digite su contraseña</h5>
          <div class="form-group">
            <input type="password" class="form-control" name="password" required>
          </div>
          <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        </div>
        <div class="modal-footer d-flex justify-content-between">          
          <button type="button" class="btn btn-danger col-md-5" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
          <button type="submit" class="btn btn-success col-md-5"><i class="fas fa-save"></i> Generar</button>
        </div>
      </form>
    </div> 
  </div> 
</div>
@if (Session::has("no-validacion"))
<script>
  swal({
    title: "¡Error!",
    text: "Constraseña incorrecta.",
    type: "error"
  });
</script>
@endif
@if (Session::has("pagos_generados"))
<script>
  swal({
    title: "¡Error!",
    text: "Pagos generados en el pasado.",
    type: "error"
  });
</script>
@endif
@if (Session::has("ok-crear"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "Todos los pagos ha sido generados exitosamente.",
    type: "success"
  });
</script>
@endif
@if (Session::has("no-editar"))
<script>
  swal({
    title: "¡Error!",
    text: "No es pudo reportar el pago.",
    type: "error"
  });
</script>
@endif
@endsection