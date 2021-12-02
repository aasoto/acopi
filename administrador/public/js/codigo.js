/*=============================================
CAPTURANDO LA RUTA DE MI CMS
=============================================*/

var ruta = $("#ruta").val();

/*===========================================
=            Actualizar carrusel            =
===========================================*/

$(document).on("click", ".actualizarCarrusel", function(){
	var indice = $("#indice").val();
	var carrusel = "[{";
	//alert(carrusel);
	/*----------  variables del carrusel  ----------*/
	var categoria;
	var titulo;
	var texto;
	var boton1;
	var boton2;
	var fotoDelante;
	var fondo;

	for (var i = 0; i <= indice ; i++) {

		/*----------  inicialización de variables  ----------*/
		categoria = $("#categoria-"+i).val();
		titulo = $("#titulo-"+i).val();
		texto = $("#texto-"+i).val();
		boton1 = $("#boton-1-"+i).attr("value");
		boton2 = $("#boton-2-"+i).attr("value");
		fotoDelante = $("#foto-delante-"+i).attr("value");
		fondo = $("#fondo-"+i).attr("value");

		/*----------  concatenación  ----------*/
		if (i < indice) {
			carrusel = carrusel+'"categoria": "'+categoria+'","titulo": "'+titulo+'","texto": "'+texto+'","boton-1": "'+boton1+'","boton-2": "'+boton2+'","foto-delante": "'+fotoDelante+'","fondo": "'+fondo+'"},{';
		}else{
			carrusel = carrusel+'"categoria": "'+categoria+'","titulo": "'+titulo+'","texto": "'+texto+'","boton-1": "'+boton1+'","boton-2": "'+boton2+'","foto-delante": "'+fotoDelante+'","fondo": "'+fondo+'"}]';

		}
		
	}
	//alert(carrusel);
	//console.log("Ruta: ", fondo);

})

/*=====  End of Actualizar carrusel  ======*/


/*=============================================
AGREGAR RED
=============================================*/

$(document).on("click", ".agregarRed", function(){

	var link = $("#url_red").val();
	var logo = $("#icono_red").val().split(",")[0];
	var nombre = $("#icono_red").val().split(",")[1];

	$(".listadoRed").append(`
		<div class="col-lg-12">      
        <div class="input-group mb-3">          
          <div class="input-group-prepend">            
            <div class="input-group-text text-white" style="background:#000000">              
                <i class="`+logo+`"></i>
            </div>
          </div>
          <input type="text" class="form-control" value="`+link+`">
          <div class="input-group-prepend">            
            <div class="input-group-text" style="cursor:pointer">              
                <span class="bg-danger px-2 rounded-circle eliminarRed" red="`+logo+`" url="`+link+`">&times;</span>
            </div>
          </div>
        </div>
      </div>
	`)

	//Actualizar el registro de la BD
	var listaRed = JSON.parse($("#listaRed").val());
	//console.log("listaRed", listaRed);
	listaRed.push({

		 "nombre": nombre,
		 "logo": logo,
		 "link": link

	})

	$("#listaRed").val(JSON.stringify(listaRed));

})

/*=============================================
ELIMINAR RED
=============================================*/
$(document).on("click", ".eliminarRed", function(){

	var listaRed = JSON.parse($("#listaRed").val());

	var red = $(this).attr("red");
	var url = $(this).attr("url");

	for(var i = 0; i < listaRed.length; i++){

		if(red == listaRed[i]["logo"] && url == listaRed[i]["link"]){			
			listaRed.splice(i, 1);			
			$(this).parent().parent().parent().parent().remove();
			$("#listaRed").val(JSON.stringify(listaRed));
		}

	}

})

/*=============================================
PREVISUALIZAR IMÁGENES TEMPORALES
=============================================*/
$("input[type='file']").change(function(){

	var imagen = this.files[0];
	//console.log("imagen", imagen);
	var tipo = $(this).attr("name");
	/*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    	$("input[type='file']").val("");

      	swal({
      		title: "¡Error!",
      		text: "¡La imagen debe estar en formato JPG o PNG!",
      		icon: "error"
      	});

    }else if(imagen["size"] > 2000000){

    	$("input[type='file']").val("");

    	swal({
      		title: "¡Error!",
      		text: "¡La imagen no debe pesar más de 2MB!",
      		icon: "error"
      	});

    }else{

    	var datosImagen = new FileReader;
    	datosImagen.readAsDataURL(imagen);

    	$(datosImagen).on("load", function(event){

    		var rutaImagen = event.target.result;

    		$(".previsualizarImg_"+tipo).attr("src", rutaImagen);

    	})

    }


})

/*=============================================
SUMMERNOTE
=============================================*/

$(".summernote-sm").summernote({

	height: 300,
	callbacks: {

		onImageUpload: function(files){

			for(var i = 0; i < files.length; i++){

				upload_sm(files[i]);

			}

		}

	}

});

$(".summernote-smc").summernote({

	height: 300,
	callbacks: {

		onImageUpload: function(files){

			for(var i = 0; i < files.length; i++){

				upload_smc(files[i]);

			}

		}

	}

});

/*=============================================
SUBIR IMAGEN AL SERVIDOR
=============================================*/

function upload_sm(file){

	var datos = new FormData();	
	datos.append('file', file, file.name);
	datos.append("ruta", ruta);
	console.log("ruta: ", ruta);

	$.ajax({
		url: ruta+"/ajax/upload.php",
		method: "POST",
		data: datos,
		contentType: false,
		cache: false,
		processData: false,
		success: function (respuesta) {

			$('.summernote-sm').summernote("insertImage", respuesta);

		},
		error: function (jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
      }

	})

}

function upload_smc(file){

	var datos = new FormData();	
	datos.append('file', file, file.name);
	datos.append("ruta", ruta);

	$.ajax({
		url: ruta+"/ajax/upload.php",
		method: "POST",
		data: datos,
		contentType: false,
		cache: false,
		processData: false,
		success: function (respuesta) {

			$('.summernote-smc').summernote("insertImage", respuesta);

		},
		error: function (jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
      }

	})

}

/*=============================================
Preguntar antes de Eliminar Registro
=============================================*/

$(document).on("click", ".eliminarRegistro", function(){

	var action = $(this).attr("action"); 
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).children("[name='_token']").attr("value");
  	//var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar este registro?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Si, eliminar registro!'
  	}).then(function(result){

  		if(result.value){

  			var datos = new FormData();
  			datos.append("_method", method);
  			datos.append("_token", token);

  			$.ajax({

  				url: action,
  				method: "POST",
  				data: datos,
  				cache: false,
  				contentType: false,
        		processData: false,
        		success:function(respuesta){

        			 if(respuesta == "ok"){

    			 		swal({
		                    type:"success",
		                    title: "¡El registro ha sido eliminado!",
		                    showConfirmButton: true,
		                    confirmButtonText: "Cerrar"
			                    
			             }).then(function(result){

			             	if(result.value){

			             		window.location = ruta+'/'+pagina; 

			             	}


			             })

        			 }

        		},
		        error: function (jqXHR, textStatus, errorThrown) {
		            console.error(textStatus + " " + errorThrown);
		        }

  			})

  		}

  	})

})

/*===============================
=            Datable            =
===============================*/

$(function () {
	$("#tablaUsuarios").DataTable({
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
			}
		}
	}).buttons().container().appendTo('#tablaUsuarios_wrapper .col-md-6:eq(0)');
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
});

/*=====  End of Datable  ======*/
