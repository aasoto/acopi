/*=============================================
PREVISUALIZAR IMÁGENES TEMPORALES
=============================================*/
$("input[type='file']").change(function(){

	var archivo = this.files[0];
	var tipo = $(this).attr("name");

	if (tipo == "carta_bienvenida" || tipo == "acta_compromiso" || tipo == "estudio_afiliacion" || tipo == "rut" || tipo == "camara_comercio" || tipo == "fechas_birthday") {
		console.log("tipo: ", archivo["type"]);
		if(archivo["type"] != "application/pdf"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡El archivo debe estar en formato PDF .pdf!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 10000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡La archivo no debe pesar más de 10MB!",
		  		type: "error"
		  	});

		}
	} else if (tipo == "archivos") {
		if(archivo["type"] != "application/x-zip-compressed"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡La archivo debe estar comprimido en formato ZIP .zip!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 10000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡El archivo no debe pesar más de 10MB!",
		  		type: "error"
		  	});

		}
	} else {
		if(archivo["type"] != "image/jpeg" && archivo["type"] != "image/png"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡La imagen debe estar en formato JPG o PNG!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 2000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡La imagen no debe pesar más de 2MB!",
		  		type: "error"
		  	});

		}else{

			var datosImagen = new FileReader;
			datosImagen.readAsDataURL(archivo);

			$(datosImagen).on("load", function(event){

				var rutaImagen = event.target.result;

				$(".previsualizarImg_"+tipo).attr("src", rutaImagen);

			})

		}
	}

})