@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' ||
            Auth::user()->rol == 'Director ejecutivo' ||
            Auth::user()->rol == 'Subdirector administrativo y financiero')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Ingresar pago individual</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('pagos/general') }}">Consultar pagos</a></li>
                                    <li class="breadcrumb-item active">Ingresar pago individual</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tabla de empresas y afiliados</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tablaPagosEmpresas" class="table table-bordered table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIT</th>
                                            <th>Empresa</th>
                                            <th>Documento</th>
                                            <th>Afiliado</th>
                                            <th>Estado</th>
                                            <th>Procedimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIT</th>
                                            <th>Empresa</th>
                                            <th>Documento</th>
                                            <th>Afiliado</th>
                                            <th>Estado</th>
                                            <th>Procedimiento</th>
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
            <div class="modal" id="ingresarPago">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title">Generar recibo de pago individual</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form method="POST" action="{{ url('/') }}/pagos/ingresar">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Id empresa</label>
                                            <input type="text" class="form-control" id="id_empresa" name="id_empresa"
                                                readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>NIT</label>
                                            <input type="text" class="form-control" id="nit" name="nit" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Razon social</label>
                                            <input type="text" class="form-control" id="razon_social" name="razon_social"
                                                readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Afiliado</label>
                                            <input type="text" class="form-control" id="afiliado" name="afiliado" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Valor mes</label>
                                            <input type="number" class="form-control" id="valor_mes" name="valor_mes" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mes recibo</label>
                                            <select class="form-control select2bs4" name="mes" id="mes"
                                                style="width: 100%;" required>
                                                <option value="">Seleccionar...</option>
                                                @foreach ($meses as $key => $mes)
                                                    <option value="{{ $mes['nombre_mes_min'] }}">{{ $mes['nombre_mes'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha limite de pago</label>
                                            <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-danger col-md-5" data-dismiss="modal">
                                    <i class="fas fa-window-close"></i> Cerrar
                                </button>
                                <button type="submit" class="btn btn-success col-md-5">
                                    <i class="fas fa-save"></i>Generar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal" id="generarPagos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/') }}/pagos/general">
                            @csrf
                            <div class="modal-header bg-success">
                                <h4 class="modal-title">Generar recibos de pago del mes de @php
                                    setlocale(LC_TIME, 'spanish');
                                    echo strftime('%B');
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
                                <button type="button" class="btn btn-danger col-md-5" data-dismiss="modal"><i
                                        class="fas fa-window-close"></i> Cerrar</button>
                                <button type="submit" class="btn btn-success col-md-5"><i class="fas fa-save"></i>
                                    Generar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(function() {
                    //Initialize Select2 Elements
                    $('.select2').select2()
                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })
                    //File-input
                    bsCustomFileInput.init();
                })
            </script>
        @else
            @include('paginas/errores/401')
        @endif
    @endauth
    @if (Session::has('no-validacion'))
        <script>
            swal({
                title: "¡Error!",
                text: "Constraseña incorrecta.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('recibo-existe'))
        <script>
            swal({
                title: "¡Error!",
                text: "Recibo de pago generado en el pasado. Si desea generarlo de nuevo borre el registro anterior y realice de nuevo este proceso.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('empresa-inactiva'))
        <script>
            swal({
                title: "¡Error!",
                text: "La empresa se encuentra inactiva, no se puede generar el recibo.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('ok-crear'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Todos los pagos ha sido generados exitosamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('no-editar'))
        <script>
            swal({
                title: "¡Error!",
                text: "No se pudo reportar el pago.",
                type: "error"
            });
        </script>
    @endif
@endsection
