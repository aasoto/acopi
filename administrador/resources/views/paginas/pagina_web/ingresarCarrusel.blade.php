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
						<li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
						<li class="breadcrumb-item active">Carrusel</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
		<section class="content">
			@foreach ($paginaweb as $element) @endforeach
			<form action="{{url('/')}}/pagina_web/ingresarCarrusel/{{$element->id}}" method="post" enctype="multipart/form-data">
				@method('PUT')
				@csrf
				<input type="hidden" name="listaCarrusel" id="listaCarrusel" value="{{$element->carrusel}}">
          		<input type="hidden" name="eliminar" id="eliminar" value="no">
          		<input type="hidden" name="imagenExterna" id="imagenExterna" value="no">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							

							<!--=========================================
							=            Actualizar Carrusel            =
							==========================================-->
							
							<!--========================================================================
				            =            Sección amigable del carrusel de evento y noticias            =
				            =========================================================================-->
		            
		            		<div class="editarCarrusel" id="editarCarrusel" name="editarCarrusel" style="visibility: '';">
		            			<div class="card card-primary" id="tarjetaEditarCarrusel">
				            	<div class="card-header">
									<h3 class="card-title">Editar Carrusel</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
				            		<div class="card-body">
				            			<div class="col-md-12 text-center">
						                  <button type="button" class="btn btn-success col-md-6 botonAgregarItemCarrusel" id="botonAgregarItemCarrusel">
						                    <i class="fas fa-image"></i> Agregar nuevo item
						                  </button>
						                </div>
						                <br>
				            			<div class="listadoCarrusel">
					            			<div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
					            				<div class="carousel-indicators">
					            					@php
					            					$contador = json_decode($element->carrusel, true);
					            					$active = true;
					            					$indice = 0;
					            					foreach ($contador as $key => $value){
						            					if($active){
						            						echo '
						            						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" class="active" aria-current="true" aria-label="Slide '.$value["titulo"].'"></button>';
						            						$active = false;
							            				}else{
							            					echo '
							            					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" aria-label="Slide '.$value["titulo"].'"></button>';
							            				}
					            						$indice++;
					            					}
					            					@endphp
					            				</div>
					            				<div class="carousel-inner">
					            				@php
					            					$servidor = $element->servidor;
					            					$carrousel = json_decode($element->carrusel, true);
					            					$indice = 0;
					            					$active = true;
					            					foreach ($carrousel as $key => $value){
					            						if ($active) {
					            							echo '
										            		<div class="carousel-item active">
										            			<div class="card" style="background-color:#DCDCDC" id="carruselActivo">
										            				<div class="row">
										            					<div class="col-md-1">
										            					</div>

										            					<div class="col-md-5 my-2">
										            						<div class="form-group">
										            							<label for="labelCategoria">Categoria</label>
										            							<select class="form-control select2" name="categoria-'.$indice.'" id="categoria-'.$indice.'" style="width: 100%;" required>
										            								<option selected="selected">'.$value["categoria"].'</option>
										            								<option>Noticias</option>
										            								<option>Eventos</option>
										            								<option>Otros</option>
										            							</select>
										            						</div>
										            						<div class="form-group">
										            							<label for="exampleInputEmail1">Titulo</label>
										            							<input type="text" class="form-control" name="titulo-'.$indice.'" id="titulo-'.$indice.'" value="'.$value["titulo"].'" required>
										            						</div>
										            						<div class="form-group">
										            							<label for="exampleInputPassword1">Texto</label>
										            							<textarea class="form-control" rows="8" name="texto-'.$indice.'" id="texto-'.$indice.'" required>'.$value["texto"].'</textarea>
										            						</div>
										            					</div>

										            					<div class="col-md-5">
										            						<div class="form-group my-2 text-center">
										            							<label for="exampleInputPassword1">Botón número 1</label><br>
										            							<div class="form-group">
										            								<input type="text" class="form-control" name="url-boton-1-'.$indice.'" id="url-boton-1-'.$indice.'" value="'.$value["url-boton-1"].'" placeholder="URL Botón número 1">
																				</div>
										            							<div class="btn btn-default btn-file mb-3">
										            								<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
										            								<input type="file" name="boton-1-'.$indice.'" id="boton-1-'.$indice.'" value="'.$value["boton-1"].'">
										            								<input type="hidden" name="boton-1-actual-'.$indice.'" value="'.$value["boton-1"].'">
										            							</div>
										            							<br>';
										            							if ($value["boton-1"] == "") {
					            													echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
					            												}else{
					            													echo '<img src="'.$servidor.''.$value["boton-1"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
					            												}
					            												echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
					            											</div>
												            				<div class="form-group my-2 text-center">
												            					<label for="exampleInputPassword1">Botón número 2</label><br>
												            					<div class="form-group">
																					<input type="text" class="form-control" name="url-boton-2-'.$indice.'" id="url-boton-2-'.$indice.'" value="'.$value["url-boton-2"].'" placeholder="URL Botón número 2">
																				</div>
												            					<div class="btn btn-default btn-file mb-3">
												            						<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
												            						<input type="file" name="boton-2-'.$indice.'" id="boton-2-'.$indice.'" value="'.$value["boton-2"].'">
												            						<input type="hidden" name="boton-2-actual-'.$indice.'" value="'.$value["boton-2"].'">
												            					</div>
												            					<br>';
												            					if ($value["boton-2"] == "") {
												            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
												            					}else{
												            						echo '<img src="'.$servidor.''.$value["boton-2"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
												            					}
												            					echo '
												            					<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            				</div>
												            			</div>

												            			<div class="col-md-1">
												            			</div>
												            		</div>
												            		<div class="row">
												            			<div class="col-md-1">
												            			</div>
												            			<div class="col-md-5">
												            				<div class="form-group my-2 text-center">
												            					<label for="exampleInputPassword1">Imagen delantera</label>
												            					<br>
												            					<div class="btn btn-default btn-file mb-3">
												            						<i class="fas fa-paperclip"></i> Ad. Img. delantera
												            						<input type="file" name="foto-delante-'.$indice.'" id="foto-delante-'.$indice.'" value="'.$value["foto-delante"].'">
												            						<input type="hidden" name="foto-delante-actual-'.$indice.'" value="'.$value["foto-delante"].'">
												            					</div>
												            					<br>';
												            					if ($value["foto-delante"] == "") {
												            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="72px">';
												            					}else{
												            						echo '<img src="'.$servidor.''.$value["foto-delante"].'" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="100px">';
												            					}
												            					echo '<p class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            				</div>
												            			</div>
													            		<div class="col-md-5">
													            			<div class="form-group my-2 text-center">
													            				<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
												            					<div class="btn btn-default btn-file mb-3">
												            						<i class="fas fa-paperclip"></i> Ad. Img. de fondo
												            						<input type="file" name="fondo-'.$indice.'" id="fondo-'.$indice.'" value="'.$value["fondo"].'">
												            						<input type="hidden" name="fondo-actual-'.$indice.'" value="'.$value["fondo"].'" required>
												            					</div>
												            					<br>';
												            					if ($value["fondo"] == "") {
												            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="100px" height="72px">';
												            					}else{
												            						echo '<img src="'.$servidor.''.$value["fondo"].'" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="200px" height="133px">';
												            					}
												            					echo '<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
													            				
													            			</div>
													            		</div>	
													            		<div class="col-md-1">
													            		</div>
													            	</div>
													            	<div class="row">
													            		<div class="col-md-1"></div>
													            		<div class="col-md-10">
													            			<div class="form-group text-center">
												                      			<br>
												                      			<button type="submit" class="btn btn-primary col-md-5 actualizarCarrusel" name="guardar" id="guardar">
																					<i class="fas fa-check"></i> Guardar cambios
																				</button>
												                      			<button type="button" class="btn btn-danger col-md-5 eliminarCarrusel" categoria="'.$value["categoria"].'" titulo="'.$value["titulo"].'" texto="'.$value["texto"].'" boton-1="'.$value["boton-1"].'" boton-2="'.$value["boton-2"].'" foto-delante="'.$value["foto-delante"].'" fondo="'.$value["fondo"].'">
														                  			<i class="fas fa-trash"></i> Eliminar este item del carrusel
														                		</button>
												                      		</div>
													            		</div>
													            		<div class="col-md-1"></div>

													            	</div>
													            	<br>
												            	</div>
												            </div>
												            ';

												            $active = false;
												            $indice++;
												        }else{
												           	echo '
												           		<div class="carousel-item">
												            		<div class="card" style="background-color:#DCDCDC" id="carruselSegundario">
												            			<div class="row">
												            				<div class="col-md-1">
												            				</div>

												            				<div class="col-md-5 my-2">
												            					<div class="form-group">
												            						<label for="labelCategoria">Categoria</label>
												            						<select class="form-control select2" name="categoria-'.$indice.'" id="categoria-'.$indice.'" style="width: 100%;" required>
												            							<option selected="selected">'.$value["categoria"].'</option>
												            							<option>Noticias</option>
												            							<option>Eventos</option>
												            							<option>Otros</option>
												            						</select>
												            					</div>
												            					<div class="form-group">
												            						<label for="exampleInputEmail1">Titulo</label>
												            						<input type="text" class="form-control" name="titulo-'.$indice.'" id="titulo-'.$indice.'" value="'.$value["titulo"].'" required>
												            					</div>
												            					<div class="form-group">
												            						<label for="exampleInputPassword1">Texto</label>
												            						<textarea class="form-control" rows="8" name="texto-'.$indice.'" id="texto-'.$indice.'" required>'.$value["texto"].'</textarea>
												            					</div>
												            				</div>

												            				<div class="col-md-5">
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Botón número 1</label><br>
												            						<div class="form-group">
																						<input type="text" class="form-control" name="url-boton-1-'.$indice.'" id="url-boton-1-'.$indice.'" value="'.$value["url-boton-1"].'" placeholder="URL Botón número 1">
																					</div>
												            						<div class="btn btn-default btn-file mb-3">
												            							<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
												            							<input type="file" name="boton-1-'.$indice.'" id="boton-1-'.$indice.'" value="'.$value["boton-1"].'">
												            							<input type="hidden" name="boton-1-actual-'.$indice.'" value="'.$value["boton-1"].'">
												            						</div>
												            						<br>';
													            					if ($value["boton-1"] == "") {
													            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
													            					}else{
													            						echo '<img src="'.$servidor.''.$value["boton-1"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
													            					}
												            						echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            					</div>
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Botón número 2</label><br>
												            						<div class="form-group">
																						<input type="text" class="form-control" name="url-boton-2-'.$indice.'" id="url-boton-2-'.$indice.'" value="'.$value["url-boton-2"].'" placeholder="URL Botón número 2">
																					</div>
												            						<div class="btn btn-default btn-file mb-3">
												            							<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
												            							<input type="file" name="boton-2-'.$indice.'" id="boton-2-'.$indice.'" value="'.$value["boton-2"].'">
												            							<input type="hidden" name="boton-2-actual-'.$indice.'" value="'.$value["boton-2"].'">
												            						</div>
												            						<br>';
													            					if ($value["boton-2"] == "") {
													            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
													            					}else{
													            						echo '<img src="'.$servidor.''.$value["boton-2"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
													            					}
												            						echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            					</div>
												            				</div>

												            				<div class="col-md-1">
												            				</div>
												            			</div>
												            			<div class="row">
												            				<div class="col-md-1">
												            				</div>
												            				<div class="col-md-5">
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Imagen delantera</label><br>
												            						<div class="btn btn-default btn-file mb-3">
													            						<i class="fas fa-paperclip"></i> Ad. Img. delantera
													            						<input type="file" name="foto-delante-'.$indice.'" id="foto-delante-'.$indice.'" value="'.$value["foto-delante"].'">
													            						<input type="hidden" name="foto-delante-actual-'.$indice.'" value="'.$value["foto-delante"].'">
													            					</div>
												            						<br>';
													            					if ($value["foto-delante"] == "") {
													            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="72px">';
													            					}else{
													            						echo '<img src="'.$servidor.''.$value["foto-delante"].'" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="100px">';
													            					}
												            						echo '<p class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            					</div>
												            				</div>
												            				<div class="col-md-5">
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
												            						<div class="btn btn-default btn-file mb-3">
														            					<i class="fas fa-paperclip"></i> Ad. Img. de fondo
														            					<input type="file" name="fondo-'.$indice.'" id="fondo-'.$indice.'" value="'.$value["fondo"].'">
														            					<input type="hidden" name="fondo-actual-'.$indice.'" value="'.$value["fondo"].'" required>
														            				</div>
												            						<br>';
													            					if ($value["fondo"] == "") {
													            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="100px" height="72px">';
													            					}else{
													            						echo '<img src="'.$servidor.''.$value["fondo"].'" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="200px" height="133px">';
													            					}
												            						echo '<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            					</div>
												            				</div>
												            				<div class="col-md-1">
												            				</div>
												            			</div>
												            			<div class="row">
														            		<div class="col-md-1"></div>
														            		<div class="col-md-10">
														            			<div class="form-group text-center">
													                      			<br>
													                      			<button type="submit" class="btn btn-primary col-md-5 actualizarCarrusel" name="guardar" id="guardar">
																						<i class="fas fa-check"></i> Guardar cambios
																					</button>
													                      			<button type="button" class="btn btn-danger col-md-5 eliminarCarrusel" categoria="'.$value["categoria"].'" titulo="'.$value["titulo"].'" texto="'.$value["texto"].'" boton-1="'.$value["boton-1"].'" boton-2="'.$value["boton-2"].'" foto-delante="'.$value["foto-delante"].'" fondo="'.$value["fondo"].'">
															                  			<i class="fas fa-trash"></i> Eliminar este item del carrusel
															                		</button>
													                      		</div>
														            		</div>
														            		<div class="col-md-1"></div>
														            	</div>
														            	<br>
												            		</div>
												            	</div>';
												            	$indice++;
												            }
												        }
												        $id_nuevo = $indice;
												        $indice--;
												    echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
												@endphp
												<input type="hidden" name="id_nuevo" id="id_nuevo" value="{{$id_nuevo}}">
												</div>
												<button class="carousel-control-prev col-md-1" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="visually-hidden">Previous</span>
												</button>
												<button class="carousel-control-next col-md-1" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="visually-hidden">Next</span>
												</button>
											</div>
				            			</div>
				            			
									</div>
								<div class="card-footer">
									
								</div>
							</div>
		            		</div>
				            
		            
		            		<!--====  End of Sección amigable del carrusel de evento y noticias  ====-->
							
							<!--====  End of Actualizar Carrusel  ====-->
							
							<!--==================================================
							=            Tarjeta de ingresar carrusel            =
							===================================================-->
							<div id="agregarItemCarrusel" name="agregarItemCarrusel" style="visibility: hidden;">
								<div class="card card-success collapsed-card" id="tarjetaAgregarItemCarrusel" name="tarjetaAgregarItemCarrusel">
									<div class="card-header">
										<h3 class="card-title">Nuevo Item Carrusel</h3>

										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					                    		<i class="fas fa-minus"></i>
					                  		</button>
										</div>
									</div>
									@php
										echo '<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group my-2 text-center">
													<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
													<div class="btn btn-default btn-file mb-3">
														<i class="fas fa-paperclip"></i> Ad. Img. de fondo
														<input type="file" name="fondo-'.$id_nuevo.'" id="fondo-'.$id_nuevo.'">
													</div>
													<br>
													<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$id_nuevo.'">
													<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
												</div>
											</div>
										</div>
										<ul id="desplegableComplementos" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
											<li class="nav-item">
												<a href="#" class="nav-link">
												</a>
												<ul id="complementosIngresarCarrusel" class="nav nav-treeview" style="display: block; height: 599.562px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label id="categoria-label" for="labelCategoria">Categoria</label>
																<select class="form-control select2" name="categoria-'.$id_nuevo.'" id="categoria-'.$id_nuevo.'" style="width: 100%;">
																	<option selected="selected">Seleccionar...</option>';
										                            foreach ($categorias as $key => $value) {
										                              echo '<option value="'.$value['nombre_categoria'].'">'.$value["nombre_categoria"].'</option>';
										                            }
																echo '</select>
															</div>
															<div class="form-group">
																<label id="titulo-label" for="exampleInputEmail1">Titulo</label>
																<input type="text" class="form-control" name="titulo-'.$id_nuevo.'" id="titulo-'.$id_nuevo.'">
															</div>
															<div class="form-group">
																<label id="texto-label" for="exampleInputPassword1">Texto</label>
																<textarea class="form-control" rows="8" name="texto-'.$id_nuevo.'" id="texto-'.$id_nuevo.'"></textarea>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group text-center">
																<label id="boton-1-label" for="exampleInputPassword1">Botón número 1</label><br>
																<div class="form-group">
																	<input type="text" class="form-control" name="url-boton-1-'.$id_nuevo.'" id="url-boton-1-'.$id_nuevo.'" placeholder="URL Botón Número 1">
																</div>
																<div id="div-boton-1" class="btn btn-default btn-file mb-3">
																	<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
																	<input type="file" name="boton-1-'.$id_nuevo.'" id="boton-1-'.$id_nuevo.'">
																</div>
																<br>
																<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$id_nuevo.'">
																<p id="d-1" class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
															</div>
															<div class="form-group my-2 text-center">
																<label id="boton-2-label" for="exampleInputPassword1">Botón número 2</label><br>
																<div class="form-group">
																	<input type="text" class="form-control" name="url-boton-2-'.$id_nuevo.'" id="url-boton-2-'.$id_nuevo.'" placeholder="URL Botón Número 2">
																</div>
																<div id="div-boton-2" class="btn btn-default btn-file mb-3">
																	<i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
																	<input type="file" name="boton-2-'.$id_nuevo.'" id="boton-2-'.$id_nuevo.'">
																</div>
																<br>
																<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$id_nuevo.'">
																<p id="d-2" class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
															</div>
														</div> 
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group my-2 text-center">
																<label id="img-delante-label" for="exampleInputPassword1">Imagen delantera</label><br>
																<div id="div-img-delante" class="btn btn-default btn-file mb-3">
																	<i class="fas fa-paperclip"></i> Ad. Img. delantera
																	<input type="file" name="foto-delante-'.$id_nuevo.'" id="foto-delante-'.$id_nuevo.'" value="">
																</div>
																<br>
																<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$id_nuevo.'">
																<p id="d-3" class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
															</div>
														</div>
													</div>
												</ul>
											</li>
										</ul>
										
										
						                
									</div>';
									@endphp
									
								
									<div class="card-footer">
										<div class="col-md-12 text-center">
											<button type="submit" class="btn btn-success col-md-6 actualizarCarrusel">
							                  	<i class="fas fa-check"></i> Guardar todo
							                </button>
										</div>
										
									</div>							
								</div>
							</div>
							
							<!--====  End of Tarjeta de ingresar carrusel  ====-->

							
							
						</div>
					</div>
				</div>		
			</form>	
		
	</section>
</div>

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
          text: "Información actualizada.",
          type: "success"
      });
    </script>
  @endif
  @if (Session::has("error"))
    <script>
      swal({
          title: "¡Error!",
          text: "Error al intentar actualizar.",
          type: "error"
      });
    </script>
  @endif
  @if (Session::has("no-validacion-imagen"))
    <script>
      swal({
          title: "¡Error!",
          text: "Formato incorrecto de imagen.",
          type: "error"
      });
    </script>
  @endif

@endsection

					
					
					
					