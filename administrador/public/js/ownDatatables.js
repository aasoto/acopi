/*===============================
=            Datable Usuarios            =
===============================*/

var tablaUsuarios = $("#tablaUsuarios").DataTable({
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/usuarios/consultarUser"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	columns: [
	  	{
	    	data: 'id',
	    	name: 'id'
	  	},
	  	{
	  		data: 'name',
	    	name: 'name'
	  	},
	  	{
	  		data: 'email',
	    	name: 'email'
	  	},
	  	{
	  		data: 'foto',
	    	name: 'foto',
	    	render: function(data, type, full, meta){

	    		if(data == null){

	    			return '<img src="'+ruta+'/vistas/images/usuarios/unknown.png" class="img-fluid rounded-circle" width="25px" height="25px">'

	    		}else{

	    			return '<img src="'+ruta+'/'+data+'" class="img-fluid rounded-circle" width="25px" height="25px">'
	    		}

	    	},

	    	orderable: false
	  	},
	  	{
	  		data: 'rol',
	    	name: 'rol',
	    	render: function(data, type, full, meta){

	    		if(data == null){

	    			return '<i> Sin verificar </i>'

	    		}else{

	    			return data
	    		}

	    	},

	    	orderable: true

	  	},
	  	{
	  		data: 'acciones',
	    	name: 'acciones'
	  	}

	],
	"responsive": true, "lengthChange": false, "autoWidth": false,
	"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
	    "oAria": {
	      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	}
});

tablaUsuarios.on('order.dt search.dt', function(){

	tablaUsuarios.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();

/*=====  End of Datable Usuarios  ======*/

/*===============================
=            Datable Noticias            =
===============================*/

var tablaNoticias = $("#tablaNoticias").DataTable({
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/pagina_web/consultarNoticia"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	columns: [
	  	{
	    	data: 'id',
	    	name: 'id'
	  	},
	  	{
	  		data: 'titulo',
	    	name: 'titulo'
	  	},
	  	{
	  		data: 'nombre_categoria',
	    	name: 'nombre_categoria'
	  	},{
	  		data: 'descripcion_noticia',
	    	name: 'descripcion_noticia'
	  	},{
	  		data: 'destacado',
	    	name: 'destacado'
	  	},{
	  		data: 'acciones',
	    	name: 'acciones'
	  	}

	],
	"responsive": true, "lengthChange": false, "autoWidth": false,
	"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
	    "oAria": {
	      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	}
});

tablaNoticias.on('order.dt search.dt', function(){

	tablaNoticias.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();

/*=====  End of Datable Noticias  ======*/

/*==========================================
=            Datatable Carrusel            =
==========================================*/
/*
$("#tablaCarrusel").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#tablaCarrusel').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });*/

/*=====  End of Datatable Carrusel  ======*/


/*=============================================
=            Datatable Entrevistas            =
=============================================*/

var tablaEntrevistas = $("#tablaEntrevistas").DataTable({
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/pagina_web/entrevistas"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	columns: [
	  	{
	    	data: 'id',
	    	name: 'id'
	  	},
	  	{
	  		data: 'titulo_entrevista',
	    	name: 'titulo_entrevista'
	  	},
	  	{
	  		data: 'descripcion_entrevista',
	    	name: 'descripcion_entrevista'
	  	},
	  	{
	  		data: 'acciones',
	    	name: 'acciones'
	  	},
	  	{
	  		data: 'video_entrevista',
	    	name: 'video_entrevista',
	    	render: function(data, type, full, meta){

	    		if(data == null){

	    			return '<iframe width="560" height="315" src="https://www.youtube.com/embed/qJ7Kpfm6DXM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'

	    		}else{

	    			return '<iframe width="560" height="315" src="'+data+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
	    		}

	    	},

	    	orderable: false
	  	}

	],
	"responsive": true, "lengthChange": false, "autoWidth": false,
	"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
	    "oAria": {
	      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	}
});

tablaEntrevistas.on('order.dt search.dt', function(){

	tablaEntrevistas.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();

/*=====  End of Datatable Entrevistas  ======*/

/*=============================================
=            Datatable Interesados            =
=============================================*/

var tablaInteresados = $("#tablaInteresados").DataTable({
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/pagina_web/interesados"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	columns: [
	  	{
	    	data: 'id',
	    	name: 'id'
	  	},
	  	{
	  		data: 'nombre_interesado',
	    	name: 'nombre_interesado'
	  	},
	  	{
	  		data: 'empresa_interesado',
	    	name: 'empresa_interesado'
	  	},{
	  		data: 'email_interesado',
	    	name: 'email_interesado'
	  	},{
	  		data: 'telefono_interesado',
	    	name: 'telefono_interesado'
	  	},{
	  		data: 'estado',
	    	name: 'estado'
	  	},{
	  		data: 'acciones',
	    	name: 'acciones'
	  	}

	],
	"responsive": true, "lengthChange": false, "autoWidth": false,
	"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
	    "oAria": {
	      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	}
});

tablaInteresados.on('order.dt search.dt', function(){

	tablaInteresados.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();

/*=====  End of Datatable Interesados  ======*/