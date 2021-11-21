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
        
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Información General</h3>

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
          </div>
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
        
        <!--=====  End of Sección cambio de logos  ======-->
        

        
      </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection