@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Gestionar Carrusel</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="#">Página web</a></li>
						<li class="breadcrumb-item"><a href="#">Noticias</a></li>
						<li class="breadcrumb-item active">Consultar</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
		<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!--==================================================
					=            Tarjeta de ingresar carrusel            =
					===================================================-->
					
					<div class="card card-primary">
						@foreach ($paginaweb as $element) @endforeach
						<div class="card-header">
							<h3 class="card-title">Nuevo Item Carrusel</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<!--===============================================
						=            Formulario ingresar datos            =
						================================================-->
						
						<form action="{{url('/')}}/pagina_web/ingresarCarrusel/{{$element->id}}" method="post" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelCategoria">Categoria</label>
											<select class="form-control select2" name="categoria" id="categoria" style="width: 100%;" required>
												<option selected="selected">Seleccionar...</option>
					                            @foreach ($categorias as $key => $value)
					                              <option value="{{ $value['nombre_categoria']}}">{{ $value["nombre_categoria"] }}</option>
					                            @endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Titulo</label>
											<input type="text" class="form-control" name="titulo" id="titulo" required>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Texto</label>
											<textarea class="form-control" rows="8" name="texto" id="texto" required></textarea>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group my-2 text-center">
											<label for="exampleInputPassword1">Botón número 1</label><br>
											<div class="btn btn-default btn-file mb-3">
												<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
												<input type="file" name="boton-1" id="boton-1">
											</div>
											<br>
											<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1">
											<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
										</div>
										<div class="form-group my-2 text-center">
											<label for="exampleInputPassword1">Botón número 2</label><br>
											<div class="btn btn-default btn-file mb-3">
												<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
												<input type="file" name="boton-2" id="boton-2">
											</div>
											<br>
											<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2">
											<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
										</div>
									</div> 
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group my-2 text-center">
											<label for="exampleInputPassword1">Imagen delantera</label><br>
											<div class="btn btn-default btn-file mb-3">
												<i class="fas fa-paperclip"></i> Ad. Img. delantera
												<input type="file" name="foto-delante" id="foto-delante" value="'.$value["foto-delante"].'">
											</div>
											<br>
											<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante">
											<p class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group my-2 text-center">
											<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
											<div class="btn btn-default btn-file mb-3">
												<i class="fas fa-paperclip"></i> Ad. Img. de fondo
												<input type="file" name="fondo" id="fondo">
											</div>
											<br>
											<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_fondo">
											<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
										</div>
									</div>
								</div>
								<a href="{{ url('/') }}/pagina_web/eliminarCarrusel">
									<button type="button" class="btn btn-danger">
										<i class="fas fa-plus"></i> Eliminar Item
				                    </button>
			                	</a>
				                
							</div>
						
							<div class="card-footer">
								<button type="submit" class="btn btn-primary actualizarCarrusel">
				                  	<i class="fas fa-check"></i> Guardar todo
				                </button>
							</div>
						</form>						
						<!--====  End of Formulario ingresar datos  ====-->							
					</div>
					<!--====  End of Tarjeta de ingresar carrusel  ====-->
					
				</div>
			</div>
		</div>
	</section>
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
  @if (Session::has("no-validacion-imagen"))
    <script>
      swal({
          title: "¡Error!",
          text: "Formato incorrecto de imagen.",
          icon: "error"
      });
    </script>
  @endif

@endsection

					
					
					
					