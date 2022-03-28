@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a><li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          {{--<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <h3>Página web</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-globe"></i>
              </div>
              <a href="{{ url('pagina_web/inicio') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>--}}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Afiliados</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-address-card"></i>
              </div>
              <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Usuarios</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ url('usuarios/consultarUser') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color: white;">Pagos</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-alt"></i>
              </div>
              <a href="{{ url('pagos/general') }}" class="small-box-footer"><h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right" style="color: white;"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3 style="color: white;">Citas</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-business-time"></i>
              </div>
              <a href="{{url('citas/general')}}" class="small-box-footer"><h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right" style="color: white;"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Empleados</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href="{{url('empleados/general')}}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3>Eventos</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-glass-cheers"></i>
              </div>
              <a href="{{ url('eventos/general') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3>Documentos</h3>
                <br>
                <br>
              </div>
              <div class="icon">
                <i class="fas fa-file-pdf"></i>
              </div>
              <a href="{{ url('documentos/inicio') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@if (Session::has("no-editar"))

<script>
  swal({
    title: "¡Error!",
    text: "No se pudo cambiar el modo.",
    type: "error"
  });
</script>

@endif
  @endsection