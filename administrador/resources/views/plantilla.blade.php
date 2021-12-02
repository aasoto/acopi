<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ACOPIsoft | CMS</title>

	<!--==================================
	=            Plugins HTML            =
	===================================-->
	<!-- DataTables-->
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/fontawesome-free/css/all.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  	{{-- TAGS INPUT --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tagsinput.css">
	{{-- SUMMERNOTE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/summernote.css">
	<!-- SweetAlert2 -->
  	{{--<link rel="stylesheet" href="{{ url('/') }}/css/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">--}}
  	<!-- Theme style | CSS de AdminLTE -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/css/adminlte.min.css">
	<!--====  End of Plugins HTML  ====-->
	
	<!--==========================================
	=            Plugins JavaScript            =
	==========================================-->
	<script src="{{ url('/') }}/js/plugins/jquery.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/popper.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="{{ url('/') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/jszip/jszip.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- overlayScrollbars -->
	<script src="{{ url('/') }}/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	{{-- TAGS INPUT --}}
	{{-- https://www.jqueryscript.net/form/Bootstrap-4-Tag-Input-Plugin-jQuery.html --}}
	<script src="{{ url('/') }}/js/plugins/tagsinput.js"></script>
	{{-- SUMMERNOTE --}}
	{{-- https://summernote.org/ --}}
	<script src="{{ url('/') }}/js/plugins/summernote.js"></script>
    <!-- AdminLTE App -->
	<script src="{{ url('/') }}/js/plugins/adminlte/adminlte.js"></script>
	<script src="{{ url('/') }}/js/plugins/adminlte/demo.js"></script>
	<!-- Sweetalert-->
	{{--<script src="{{ url('/') }}/js/plugins/sweetalert.min.js"></script>--}}
	<script src="{{ url('/') }}/js/plugins/sweetalert.js"></script>
	<!-- SweetAlert2 -->
	{{--<script src="{{ url('/') }}/js/plugins/sweetalert2/sweetalert2.min.js"></script>--}}
	<!--=====  End of Plugins JavaScript  ======-->
	
</head>
@if (Route::has('login'))
	@auth
		<body class="hold-transition sidebar-mini layout-fixed">
			<div class="wrapper">
				@include('modulos.header')
				@include('modulos.sidebar')
				@yield('content')
				@include('modulos.footer')
			</div>
			<input type="hidden" id="ruta" value="{{ url('/') }}">
			<script src="{{url('/')}}/js/codigo.js"></script>
		</body>
	@else
		@include('paginas.pagina_web.login')
	@endauth
@endif	
</html>