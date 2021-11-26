/*=============================================
CAPTURANDO LA RUTA DE MI CMS
=============================================*/

var ruta = $("#ruta").val();

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