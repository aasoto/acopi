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

/*========================================================
=            Agregar item carrusel a la lista            =
========================================================*/

$(document).on("click", ".agregarCarrusel", function(){

	/*var link = $("#url_red").val();
	var logo = $("#icono_red").val().split(",")[0];
	var nombre = $("#icono_red").val().split(",")[1];*/

	var categoria = $("#categoria").val();
	var titulo = $("#titulo").val();
	var texto = $("#texto").val();
	var boton_1 = $("#boton-1").val();
	var boton_2 = $("#boton-2").val();
	var foto_delante = $("#foto-delante").val();
	var fondo = $("#fondo").val();

	console.log("titulo", titulo);


	$(".listadoCarrusel").append(`
		<tr><td><i>Nuevo</i></td>
		<td>`+categoria+`</td>
		<td>`+titulo+`</td>
		<td>`+texto+`</td>
		<td>`+fondo+`</td>
		<td></td></tr>
	`)

	//Actualizar el registro de la BD
	var listaCarrusel = JSON.parse($("#listaCarrusel").val());
	//console.log("listaRed", listaRed);
	listaCarrusel.push({

		"categoria": categoria,
		"titulo": titulo,
		"texto": texto,
		"boton-1": boton_1,
		"boton-2": boton_2,
		"foto-delante": foto_delante,
		"fondo": fondo

	})

	$("#listaCarrusel").val(JSON.stringify(listaCarrusel));

	console.log("Lista carrusel:", listaCarrusel);

})

/*=====  End of Agregar item carrusel a la lista  ======*/


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
ELIMINAR PRODUCTO
=============================================*/
$(document).on("click", ".eliminarProducto", function(){

	var listaProductos = JSON.parse($("#listaProductos").val());

	var num = $(this).attr("num");
	var nombre = $(this).attr("nombre");
	var descripcion = $(this).attr("descripcion");

	for(var i = 0; i < listaProductos.length; i++){

		if(num == listaProductos[i]["num"] && nombre == listaProductos[i]["nombre"] && descripcion == listaProductos[i]["descripcion"]){
			listaProductos.splice(i, 1);
			$(this).parent().parent().parent().remove();
			$("#listaProductos").val(JSON.stringify(listaProductos));
			$("#eliminar").val("si");
		}

	}

	$(".listadoProductos").append(`
		<div class="col-md-12">
        	<button type="submit" class="btn btn-danger col-md-12">
            	<i class="fas fa-save"></i> Guardar cambios de elementos eliminados
          	</button>
      	</div>
	`)

})

/*=============================================
ELIMINAR ALIADO
=============================================*/
var logoEliminar;
$(document).on("click", ".eliminarAliado", function(){

	var listaAliados = JSON.parse($("#listaAliados").val());

	var nombre = $(this).attr("nombre");
	var link = $(this).attr("link");
	var logo = $(this).attr("logo");
	logoEliminar = logo;

	document.getElementById('guardar').disabled=true;

	for(var i = 0; i < listaAliados.length; i++){

		if(nombre == listaAliados[i]["nombre"] && link == listaAliados[i]["link"] && logo == listaAliados[i]["logo"]){
			listaAliados.splice(i, 1);
			$(this).parent().parent().parent().parent().parent().parent().parent().parent().remove();
			$("#listaAliados").val(JSON.stringify(listaAliados));
			$("#eliminar").val("si");
		}

	}

	$(".listadoAliados").append(`
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="form-group text-center" >
					<i class="fas fa-ban" style="color: #E60026; font-size: 100px;"></i>
				</div>

				<div class="form-group text-center">
					<label for="exampleInputEmail1"><h2>¿Desea eliminar este aliado?</h2></label>
				</div>

			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<button type="button" class="btn btn-lg btn-default float-left cancelarEliminarAliado">
	                Cancelar
	            </button>
	            <button type="submit" class="btn btn-lg btn-danger float-right confirmacionEliminarAliado">
	                <i class="fas fa-trash"></i> Eliminar
	            </button>
	        </div>
	        <div class="col-md-4"></div>
		</div>

	`)

})

/*================================================
=            Acciones Eliminar Aliado            =
================================================*/

$(document).on("click", ".cancelarEliminarAliado", function(){
	window.location.reload();
})

$(document).on("click", ".confirmacionEliminarAliado", function(){
	var datos = "logo="+logoEliminar;
	$.ajax({
		url: ruta+"/ajax/aliados.php",
		method: "POST",
		data: datos,

	}).done(function(respuesta){
		console.log("Hecho");
	}).fail(function(){
		console.log("Error");
	}).always(function(){
		console.log("Completado");
	});
})

/*=====  End of Acciones Eliminar Aliado  ======*/


/*==============================================
=            Eliminar item carrusel            =
==============================================*/

var boton_1_Eliminar;
var boton_2_Eliminar;
var foto_Delante_Eliminar;
var fondo_Eliminar;
$(document).on("click", ".eliminarCarrusel", function(){

	var listaCarrusel = JSON.parse($("#listaCarrusel").val());

	var categoria = $(this).attr("categoria");
	var titulo = $(this).attr("titulo");
	var texto = $(this).attr("texto");
	var boton_1 = $(this).attr("boton-1");
	var boton_2 = $(this).attr("boton-2");
	var foto_delante = $(this).attr("foto-delante");
	var fondo = $(this).attr("fondo");
	boton_1_Eliminar = boton_1;
	boton_2_Eliminar = boton_2;
	foto_Delante_Eliminar = foto_delante;
	fondo_Eliminar = fondo;

	document.getElementById('guardar').disabled = true;

	for(var i = 0; i < listaCarrusel.length; i++){

		if(categoria == listaCarrusel[i]["categoria"] && titulo == listaCarrusel[i]["titulo"] && texto == listaCarrusel[i]["texto"] && boton_1 == listaCarrusel[i]["boton-1"] && boton_2 == listaCarrusel[i]["boton-2"] && foto_delante == listaCarrusel[i]["foto-delante"] && fondo == listaCarrusel[i]["fondo"]){
			listaCarrusel.splice(i, 1);
			$(this).parent().parent().parent().parent().parent().parent().parent().remove();
			$("#listaCarrusel").val(JSON.stringify(listaCarrusel));
			$("#eliminar").val("si");
		}

	}

	$(".listadoCarrusel").append(`
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="form-group text-center" >
					<i class="fas fa-ban" style="color: #E60026; font-size: 100px;"></i>
				</div>

				<div class="form-group text-center">
					<label for="exampleInputEmail1"><h2>¿Desea eliminar este item del carrusel?</h2></label>
				</div>

			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<button type="button" class="btn btn-lg btn-default float-left cancelarEliminarItemCarrusel">
	                Cancelar
	            </button>
	            <button type="submit" class="btn btn-lg btn-danger float-right confirmacionEliminarItemCarrusel">
	                <i class="fas fa-trash"></i> Eliminar
	            </button>
	        </div>
	        <div class="col-md-4"></div>
		</div>

	`)

})

/*================================================
=            Acciones Eliminar Item Carrusel            =
================================================*/

$(document).on("click", ".cancelarEliminarItemCarrusel", function(){
	window.location.reload();
})

$(document).on("click", ".confirmacionEliminarItemCarrusel", function(){
	var datos = "boton_1="+boton_1_Eliminar+"&boton_2="+boton_2_Eliminar+"&foto_delante="+foto_Delante_Eliminar+"&fondo="+fondo_Eliminar;
	$.ajax({
		url: ruta+"/ajax/carrusel.php",
		method: "POST",
		data: datos,

	}).done(function(respuesta){
		console.log("Hecho");
	}).fail(function(){
		console.log("Error");
	}).always(function(){
		console.log("Completado");
	});
})

/*=====  End of Acciones item carrusel  ======*/

/*=====  End of Eliminar item carrusel  ======*/


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
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");


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

/*===========================================
=            Eliminar entrevista            =
===========================================*/

$(document).on("click", ".eliminarEntrevista", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar esta entrevista?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Si, eliminar entrevista!'
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
		                    title: "¡La entrevista ha sido eliminado!",
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

/*=====  End of Eliminar entrevista  ======*/


/*=================================================================
=            Preguntar antes de eliminar Item Carrusel            =
=================================================================*/

$(document).on("click", ".eliminarItem", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");

  	var titulo = $(this).attr("titulo");
	var texto = $(this).attr("texto");
	var boton_1 = $(this).attr("boton-1");
	var boton_2 = $(this).attr("boton-2");
	var foto_delante = $(this).attr("foto-delante");
	var fondo = $(this).attr("fondo");

	$(this).parent().parent().parent().remove();


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

  			var listaCarrusel = JSON.parse($("#listaCarrusel").val());
			console.log("fondo: ", titulo, foto_delante, boton_1, boton_2);
			var datos = "boton_1="+boton_1+"&boton_2="+boton_2+"&foto_delante="+foto_delante+"&fondo="+fondo;
			$.ajax({
				url: ruta+"/ajax/carrusel.php",
				method: "POST",
				data: datos,

			}).done(function(respuesta){
				console.log("Hecho");
			}).fail(function(){
				console.log("Error");
			}).always(function(){
				console.log("Completado");
			});

			for(var i = 0; i < listaCarrusel.length; i++){

				if(titulo == listaCarrusel[i]["titulo"] && texto == listaCarrusel[i]["texto"]){
					listaCarrusel.splice(i, 1);
					$("#listaCarrusel").val(JSON.stringify(listaCarrusel));
					console.log("Carrusel: ", listaCarrusel);
				}

			}

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

  		}else{
  			location.reload();
  		}

  	})




})

/*=====  End of Preguntar antes de eliminar Item Carrusel  ======*/

/*=========================================
=            Eliminar Afiliado            =
=========================================*/

$(document).on("click", ".eliminarAfiliado", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");

  	var foto = $(this).attr("foto");
  	var cedula = $(this).attr("cedula");

  	swal({
  		 title: '¿Está seguro de eliminar este afiliado?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar afiliado!'
  	}).then(function(result){

  		if(result.value){
  			var datos = "foto="+foto+"&cedula="+cedula;
  			$.ajax({
				url: ruta+"/ajax/afiliados.php",
				method: "POST",
				data: datos,

			}).done(function(respuesta){
				console.log("Hecho");
			}).fail(function(){
				console.log("Error");
			}).always(function(){
				console.log("Completado");
			});

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
		                    title: "¡El afiliado ha sido eliminado!",
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

/*=====  End of Eliminar Afiliado  ======*/

/*============================================
=            Contactar interesado            =
============================================*/

$(document).on("click", ".contactarInteresado", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");

  	swal({
  		 title: '¿Está seguro de ya haber contactado a este interesado?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, ya lo contacté!'
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
		                    title: "¡El estado de interesado cambió!",
		                    text: "Ahora aparecerá como interesado contactado.",
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

/*=====  End of Contactar interesado  ======*/

/*===========================================
=            Eliminar interesado            =
===========================================*/

$(document).on("click", ".eliminarInteresado", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar este interesado?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar interesado!'
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
		                    title: "¡El interesado ha sido eliminado!",
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

/*=====  End of Eliminar interesado  ======*/

/*======================================================
=            Mostrar agregar nuevo afiliado            =
======================================================*/

$(document).on("click", ".crearAfiliado", function(){

	$(".ingresarAfiliado").append(`
		
		<div class="card card-success">
                <div class="card-header">
                  <div class="card-title">Agregar Afiliado</div>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="form-control select2" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
                          <option selected="sin verificar"><i>Seleccionar tipo de documento...</i></option>
                          <option value="cedula">Cédula de Ciudadanía</option>
                          <option value="pasaporte">Pasaporte</option>
                          <option value="otro">Otro</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" class="form-control" name="numero_documento" placeholder="Número de documento" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="primer_nombre" placeholder="Primer nombre" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo nombre">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="primer_apellido" placeholder="Primer apellido" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo apellido" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="form-control select2" name="sexo" id="sexo" style="width: 100%;" required>
                          <option selected="sin verificar"><i>Seleccionar sexo...</i></option>
                          <option value="m">Masculino</option>
                          <option value="f">Femenino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="email" class="form-control" name="correo_electronico" placeholder="Correo electronico">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="number" class="form-control" name="telefono" placeholder="Telefono o celular">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      
                      <div class="form-group my-2 text-center">
                        <label for="exampleInputPassword1">Foto afiliado</label><br>
                        <div class="btn btn-default btn-file mb-3">
                          <i class="fas fa-paperclip"></i> Adjuntar foto
                          <input type="file" name="foto">
                        </div>
                        <br>
                        <img src="`+ruta+`/vistas/images/afiliados/unknown.png" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                        <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      
                      <div class="form-group my-2 text-center">
                        <label for="exampleInputPassword1">Foto o PDF de documento de identidad</label><br>
                        <div class="btn btn-default btn-file mb-3">
                          <i class="fas fa-paperclip"></i> Adjuntar documento
                          <input type="file" name="archivo_documento" required>
                        </div>
                        <br>
                        <img src="`+ruta+`/vistas/images/afiliados/address-card.png" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                        <p class="help-block small mt-3">Dimensiones: 700px * 200px para imagenes | Peso Max. 2MB | Formato: JPG, PNG o PDF</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success col-md-6">
                      <i class="fas fa-check"></i> Guardar nuevo afiliado
                    </button>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
              	$("input[type='file']").change(function(){

					var imagen = this.files[0];
					//console.log("imagen", imagen);
					var tipo = $(this).attr("name");
					
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
              </script>
	`)
	$(this).parent().parent().parent().parent().remove();
})

/*=====  End of Mostrar agregar nuevo afiliado  ======*/





/*=====================================
=            LIMPIAR RUTAS            =
=====================================*/

function limpiarUrl(texto){

	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/g, 'a');
	texto = texto.replace(/[é]/g, 'e');
	texto = texto.replace(/[í]/g, 'i');
	texto = texto.replace(/[ó]/g, 'o');
	texto = texto.replace(/[ú]/g, 'u');
	texto = texto.replace(/[ñ]/g, 'n');
	texto = texto.replace(/ /g, '-');

	return texto;

}

$(document).on("keyup", ".inputRuta", function(){

	$(this).val(

	 	limpiarUrl($(this).val())

	)

})

/*=====  End of LIMPIAR RUTAS  ======*/



