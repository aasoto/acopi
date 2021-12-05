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