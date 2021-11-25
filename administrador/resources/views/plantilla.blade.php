<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ACOPIsoft | CMS</title>

	<!--==================================
	=            Plugins HTML            =
	===================================-->
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
  	<!-- Theme style | CSS de AdminLTE -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/css/adminlte.min.css">
	<!--====  End of Plugins HTML  ====-->
	
	<!--==========================================
	=            Plugins JavaScript            =
	==========================================-->
	<script src="{{ url('/') }}/js/plugins/jquery.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/popper.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/bootstrap.min.js"></script>
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
	<!-- Sweetalert-->
	<script src="{{ url('/') }}/js/plugins/sweetalert.min.js"></script>
	<!--=====  End of Plugins JavaScript  ======-->
	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('modulos.header')
		@include('modulos.sidebar')
		@yield('content')
		@include('modulos.footer')
	</div>
<script src="{{url('/')}}/js/codigo.js"></script>
</body>
</html>