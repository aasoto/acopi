@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Noticias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="#">Página web</a></li>
              <li class="breadcrumb-item active">Noticias</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar noticia</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Titulo</label>
                      <input type="text" class="form-control" name="titulo" value="" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Categoria</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">General</option>
                        @foreach ($categorias as $key => $value)
                          <option>{{ $value["nombre_categoria"] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group text-center">
                      <label for="exampleInputFile">Imagen de portada</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Archivo</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Subir</span>
                        </div>
                      </div>
                      <br>
                      <img src="{{url('/')}}/vistas/images/9.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_logo">
                      <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                    </div>
                  </div>
                  
                  
                  <!--Foreach para ver innerjoin de noticias-->
                  {{--@foreach ($noticias as $key => $value)
                    <h3>{{ $value["titulo"] }}</h3>
                    <h5>{{ $value->categorias["nombre_categoria"] }}</h5>
                  @endforeach--}}
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Descripción</label>
                      <textarea class="form-control" rows="6" name="descripcion" required>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Palabras claves</label>
                      <input type="text" class="form-control" name="palabras_claves" data-role="tagsinput" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Ruta</label>
                      <input type="text" class="form-control" name="ruta" value="" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nameEditor">Contenido noticia</label>
                      <textarea class="form-control summernote-sm" name="contenido_noticia" rows="10">
                      Noticia</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection