@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
	<section class="content">
      	<div class="container-fluid">
      		<div class="row">
      			<br>
      			<br>
      			<br>
      		</div>
  			<div class="row">
  				<div class="col-md-3"></div>
      			<div class="col-md-6">
					<!-- Widget: user widget style 1 -->
					<div class="card card-widget widget-user">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-info">
							<h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
							<h5 class="widget-user-desc">{{ Auth::user()->rol }}</h5>
						</div>
						<div class="widget-user-image">
							<img class="img-circle elevation-2" src="{{ url('/') }}/{{ Auth::user()->foto }}" alt="User Avatar" data-toggle="modal" data-target="#modal-ver-foto" style="cursor:pointer">
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-4 border-right">
									
								</div>
								<!-- /.col -->
								<div class="col-sm-4 border-right">
									<div class="description-block" data-toggle="modal" data-target="#modal-editar-perfil" style="cursor:pointer">
										<h5 class="description-header">Gestionar</h5>
										<span class="description-text">PERFIL</span>
									</div>
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
					</div>
					<!-- /.widget-user -->
				</div>
				<div class="col-md-3"></div>	
  			</div>
        </div>

        <div class="modal fade" id="modal-ver-foto">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                	<div class="modal-body text-center">
                		<img src="{{ url('/') }}/{{ Auth::user()->foto }}">
                	</div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-editar-perfil">
        	<div class="modal-dialog modal-lg">
        		<div class="modal-content">
        			<div class="modal-header bg-warning" style="cursor:pointer">
        				<h4 class="modal-title">Editar perfil</h4>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<div class="modal-body">
        				<div class="text-center">
        					<div class="contenedor">
        						<div class="btn btn-file" style="font-size: 100px;">
	        						<img src="{{ url('/') }}/{{ Auth::user()->foto }}" class="previsualizarImg_foto_nueva img-fluid rounded-circle" style="width: 100%; height: 100%;">
	        						<input type="file" name="foto_nueva">
	        					</div>
	        					<div class="centrado">
	        						<i class="fas fa-camera"></i>
	        						Cambiar foto
	        					</div>
        					</div>
        					<style type="text/css">
        						.contenedor{
								    position: relative;
								    display: inline-block;
								    text-align: center;
								}
								.centrado{
								    position: absolute;
								    top: 50%;
								    left: 50%;
								    transform: translate(-50%, -50%);
								    font-size: 20px;
									color: #fff;
								}
								.previsualizarImg_foto_nueva{
									filter: brightness(50%);
								}
        					</style>
        				</div>

						<div class="form-group">
                          	<label>Nombre</label>
                          	<input type="text" class="form-control" name="nombre" id="nombre" value="" required>
                        </div>
        				<div class="card collapsed-card">
        					<div class="card-header" class="btn btn-tool" data-card-widget="collapse">
        						<div class="card-title">Actualizar contraseña</div>
        						<div class="card-tools">
                  					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                  						<i class="fas fa-plus"></i>
                  					</button>
                  				</div>
        					</div>
        					<div class="card-body">
        						<div class="form-group">
		                        	<input type="password" class="form-control" name="password_actual" id="password_actual" placeholder="Contraseña actual" value="">
		                        	<br>
		                        	<input type="password" class="form-control" name="password_nueva_1" id="password_nueva_1" placeholder="Contrasena nueva" value="">
		                        	<br>
		                        	<input type="password" class="form-control" name="password_nueva_2" id="password_nueva_2" placeholder="Contraseña nueva confirmación" value="">
		                        </div>
        					</div>
        				</div>
                        
        			</div>
        			<div class="modal-footer justify-content-between">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				<button type="button" class="btn btn-primary">Save changes</button>
        			</div>
        		</div>
        		<!-- /.modal-content -->
        	</div>
        	<!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
</div>
@endsection
