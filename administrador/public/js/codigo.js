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

/*====================================================
=            Mostrar agregar nuevo aliado            =
====================================================*/

$(document).on("click", ".botonAgregarAliado", function(){

	document.getElementById("ingresarAliado").style.visibility="";
	document.getElementById("tarjetaVerAliados").classList.add("collapsed-card");
	document.getElementById("tarjetaVerAliados").style.visibility="hidden";
	//$(this).parent().parent().parent().remove();
	document.getElementById("tarjetaIngresarAliado").classList.remove("collapsed-card");
})

/*=====  End of Mostrar agregar nuevo aliado  ======*/


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
	document.getElementById('botonAgregarAliado').disabled=true;

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
	document.getElementById('botonAgregarItemCarrusel').disabled = true;
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

/*=====================================================
=            Mostrar agregar item carrusel            =
=====================================================*/

$(document).on("click", ".botonAgregarItemCarrusel", async function(){
	var tipo_carrusel = "";
	await swal({
	  title: 'Tipo de item carrusel',
	  input: 'select',
	  inputOptions: {
	    'imagen': 'Imagen externa',
	    'hacer': 'Elaborar item'
	  },
	  inputPlaceholder: 'Seleccionar un tipo',
	  showCancelButton: true
	  
	}).then(function(result){

  		if(result.value){
  			if (result.value == "imagen") {
  				tipo_carrusel = result.value;
  			}
  			if (result.value == "hacer") {
  				tipo_carrusel = result.value;
  			}
  		}
  	})

	if (tipo_carrusel == "hacer") {
		var id_nuevo = $("#id_nuevo").val();
		document.getElementById("tarjetaEditarCarrusel").classList.add("collapsed-card");
		document.getElementById("editarCarrusel").style.visibility="hidden";
		document.getElementById("agregarItemCarrusel").style.visibility="";
		document.getElementById("tarjetaAgregarItemCarrusel").classList.remove("collapsed-card");

	}

	if (tipo_carrusel == "imagen") {
		$("#imagenExterna").val("si");
		var id_nuevo = $("#id_nuevo").val();

		document.getElementById("tarjetaEditarCarrusel").classList.add("collapsed-card");
		document.getElementById("editarCarrusel").style.visibility="hidden";
		document.getElementById("agregarItemCarrusel").style.visibility="";

		document.getElementById("tarjetaAgregarItemCarrusel").classList.remove("collapsed-card");
		document.getElementById("complementosIngresarCarrusel").style ="";
		document.getElementById("desplegableComplementos").style.display ="none";
		
	}
})

/*=====  End of Mostrar agregar item carrusel  ======*/



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

	document.getElementById("ingresarAfiliado").style.visibility="";
	$(this).parent().parent().parent().parent().parent().remove();
	document.getElementById("tarjetaIngresarAfiliado").classList.remove("collapsed-card");
})

/*=====  End of Mostrar agregar nuevo afiliado  ======*/




/*====================================
=            Ver afiliado            =
====================================*/

$(document).on("click", ".verMasAfiliado", function(){
	var estoy = $(this).attr("estoy");
	var tipo_documento_rprt = $(this).attr("tipo_documento_rprt");
	var cc_rprt_legal = $(this).attr("cc_rprt_legal");
	var primer_nombre = $(this).attr("primer_nombre");
	var segundo_nombre = $(this).attr("segundo_nombre");
	var primer_apellido = $(this).attr("primer_apellido");
	var segundo_apellido = $(this).attr("segundo_apellido");
	var fecha_nacimiento = $(this).attr("fecha_nacimiento");
	var sexo_rprt = $(this).attr("sexo_rprt");
	var email_rprt = $(this).attr("email_rprt");
	var telefono_rprt = $(this).attr("telefono_rprt");
	var foto_rprt = $(this).attr("foto_rprt");

	document.getElementById("consultaAfiliado").style.visibility="";

    var tipo_documento;
    if (tipo_documento_rprt == "cedula") {
    	tipo_documento = "Cédula de ciudadanía";
    } else {
    	if (tipo_documento_rprt == "pasaporte") {
    		tipo_documento = "Pasaporte";
    	} else {
    		if (tipo_documento_rprt == "otro") {
    			tipo_documento = "Otro";
    		} else {
    			tipo_documento = "Sin verificar";
    		}
    	}
    }

    var genero;
    if (sexo_rprt == "m") {
    	genero = "Masculino";
    } else {
    	if (sexo_rprt == "f") {
    		genero = "Femenino";
    	} else {
    		genero = "Sin especificar";
    	}
    }
    foto = ruta+"/"+foto_rprt;
    document.getElementById("foto").src = foto;
    
	$("#tipo_documento").val(tipo_documento);
	$("#num_cedula").val(cc_rprt_legal);
	$("#nombre_completo").val(primer_apellido+" "+segundo_apellido+" "+primer_nombre+" "+segundo_nombre);
	$("#genero").val(genero);
	$("#fecha_nacimiento").val(fecha_nacimiento);
	$("#email").val(email_rprt);
	$("#telefono").val(telefono_rprt);

	$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().remove();
	document.getElementById("tarjetaInformacionAfiliado").classList.remove("collapsed-card");
})

/*=====  End of Ver afiliado  ======*/

/*===================================
=            Ver empresa            =
===================================*/

$(document).on("click", ".verMasEmpresa", function(){
	var nit = $(this).attr("nit");
	var razon_social = $(this).attr("razon_social");
	var representante = $(this).attr("representante");
	var num_empleados = $(this).attr("num_empleados");
	var direccion = $(this).attr("direccion");
	var telefono = $(this).attr("telefono");
	var fax = $(this).attr("fax");
	var celular = $(this).attr("celular");
	var email = $(this).attr("email");
	var id_sector = $(this).attr("id_sector");
	var productos = JSON.parse($(this).attr("productos"));
	var ciudad = $(this).attr("ciudad");
	var estado_afiliacion = $(this).attr("estado_afiliacion");
	var numero_pagos_atrasados = $(this).attr("numero_pagos_atrasados");
	var fecha_afiliacion = $(this).attr("fecha_afiliacion");

	var sector_empresa = JSON.parse($("#sectores").val());
	
	/*console.log(sector_empresa);
	for (x of sector_empresa){
		console.log(x.nombre_sector);
	}*/

	document.getElementById("descripcionEmpresa").style.visibility="";

	var sector = "Sin especificar";
	for (value of sector_empresa) {
		if (value.id_sector == id_sector) {
			sector = value.nombre_sector;
		}
	}
	var lista_productos;
	for (value of productos) {
		lista_productos = lista_productos+", "+value;
	}
	$("#nit").val(nit);
	$("#razon_social").val(razon_social);
	$("#representante").val(representante);
	$("#numero_empleados").val(num_empleados);
	$("#direccion").val(direccion);
	$("#telefono").val(telefono);
	$("#fax").val(fax);
	$("#celular").val(celular);
	$("#correo_electronico").val(email);
	$("#sector").val(sector);
	$("#productos").val(lista_productos);
	$("#ciudad").val(ciudad);
	$("#estado").val(estado_afiliacion);
	$("#pagos_atrasados").val(numero_pagos_atrasados);
	$("#fecha_afiliacion").val(fecha_afiliacion);

	$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().remove();
	/*----------  Quitar y añadir clases  ----------*/
	document.getElementById("tarjetaDescripcion").classList.remove('collapsed-card');
	//document.getElementById("tarjetaDescripcion").classList.add('collapsed-card');
})

/*----------  Regresar  ----------*/
$(document).on("click", ".verTablaEmpresas", function(){
	window.location.reload();
	
})

/*=====  End of Ver empresa  ======*/

/*========================================
=            Eliminar empresa            =
========================================*/

$(document).on("click", ".eliminarEmpresa", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");

  	var carta_bienvenida = $(this).attr("carta_bienvenida");
  	var acta_compromiso = $(this).attr("acta_compromiso");
  	var estudio_afiliacion = $(this).attr("estudio_afiliacion");
  	var rut = $(this).attr("rut");
  	var camara_comercio = $(this).attr("camara_comercio");
  	var fechas_birthday = $(this).attr("fechas_birthday");

  	swal({
  		 title: '¿Está seguro de eliminar esta empresa?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar empresa!'
  	}).then(function(result){

  		if(result.value){

  			var datos = "carta_bienvenida="+carta_bienvenida+"&acta_compromiso="+acta_compromiso+"&estudio_afiliacion="+estudio_afiliacion+"&rut="+rut+"&camara_comercio="+camara_comercio+"&fechas_birthday="+fechas_birthday;
  			$.ajax({
				url: ruta+"/ajax/empresas.php",
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
		                    title: "¡La empresa ha sido eliminada!",
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

/*=====  End of Eliminar empresa  ======*/


/*===================================================
=            Agregar empleados afiliados            =
===================================================*/

$(document).on("click", ".agregarEmpleado", function(){
	var nit_empresa = $(this).attr("nit_empresa");
	var id_empresa = $(this).attr("id_empresa");
	var titulo_modal = $(this).attr("razon_social");
	
	document.getElementById("titulo_modal").innerHTML = " - "+titulo_modal;
	$("#id_empresa").val(id_empresa);
	$("#nit_empresa").val(nit_empresa);

})

/*=====  End of Agregar empleados afiliados  ======*/

/*============================================
=            Consultar cumpleaños            =
============================================*/

$(document).on("click", ".consultarBirthday", function(){
	var fecha_birthday = $("#fecha_birthday").val();
	var redirigir = ruta+"/afiliados/birthday/"+fecha_birthday;
	window.location = redirigir;

})

/*=====  End of Consultar cumpleaños  ======*/

/*==============================================
=            Cambiar estado de pago            =
==============================================*/

$(document).on("click", ".pagarRecibo", function(){

	var reporta = $(this).attr("reporta");
	var empresa = $(this).attr("empresa");
	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");

  	swal({
  		 title: '¿Está pago este recibo?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'question',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, está pago!'
  	}).then(function(result){

  		if(result.value){

  			var datos = new FormData();
  			datos.append("accion", "pagar");
  			datos.append("empresa", empresa);
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
		                    title: "¡Recibo pago!",
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

/*----------  Abonar a la deuda  ----------*/

$(document).on("click", ".abonarRecibo", async function(){

	var cantidad = "";
	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");

  	await swal({
		title: '¿Desea abonar a la deuda?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'question',
		input: 'number',
		inputLabel: 'Cantidad de abonar',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Abonar'
  	}).then(function(result){

  		if(result.value){

  			var datos = new FormData();
  			datos.append("accion", "abonar");
  			datos.append("cantidad", result.value);
  			datos.append("_method", method);
  			datos.append("_token", token);

  			console.log("Datos: ", result.value);
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
		                    title: "¡Abono exitoso!",
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

/*=====  End of Cambiar estado de pago  ======*/

/*=========================================
=            Reactivar empresa            =
=========================================*/

$(document).on("click", ".reactivarEmpresa", function(){

	var recibo = $(this).attr("recibo");
	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");
  	console.log("recibo: ", recibo);

  	swal({
  		 title: '¿Se encuentra esta empresa al día?',
  		 text: "Aceptar esta opción significa que la empresa afiliada saldó todas sus deudas con la agremiación y por lo tanto pasará a estar activa de nuevo.",
  		 type: 'question',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, la empresa está al día'
  	}).then(function(result){

  		if(result.value){

  			var datos = new FormData();
  			datos.append("recibo", recibo);
  			datos.append("accion", "reactivar");
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
		                    title: "¡Empresa reactivada!",
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

/*=====  End of Reactivar empresa  ======*/


/*==========================================
=            Eliminar municipio            =
==========================================*/

$(document).on("click", ".eliminarMunicipio", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar este municipio?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar municipio!'
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
		                    title: "¡El municipio ha sido eliminado!",
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

/*=====  End of Eliminar municipio  ======*/

/*=======================================
=            Eliminar sector            =
=======================================*/

$(document).on("click", ".eliminarSectorEmpresa", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar este sector?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar sector!'
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
		                    title: "¡El sector ha sido eliminado!",
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


/*=====  End of Eliminar sector  ======*/

/*=======================================
=            Eliminar evento            =
=======================================*/

$(document).on("click", ".eliminarEvento", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar este evento?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar evento!'
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
		                    title: "¡El evento ha sido eliminado!",
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

/*=====  End of Eliminar evento  ======*/

/*====================================
=            Agregar cita            =
====================================*/

$(document).on("click", ".agregarCita", async function(){
	var tipo_cita = "";
	await swal({
	  title: 'Tipo de cita',
	  text: '¿Qué tipo de cita desea agregar?',
	  type: 'question',
	  input: 'select',
	  inputOptions: {
	    'afiliado': 'Para afiliado',
	    'interesado': 'Para interesado'
	  },
	  inputPlaceholder: 'Seleccionar un tipo',
	  showCancelButton: true
	  
	}).then(function(result){

  		if(result.value){
  			if (result.value == "afiliado") {
  				tipo_carrusel = result.value;
  			}
  			if (result.value == "interesado") {
  				tipo_carrusel = result.value;
  			}
  		}
  	})

	if (tipo_carrusel == "afiliado") {	
		$("#crearCitaAfiliado").modal("show");
	}

	if (tipo_carrusel == "interesado") {
		$("#crearCitaInteresado").modal("show");
		$("#soy_interesado").val("true");
	}
})

/*=====  End of Agregar cita  ======*/

/*================================================
=            Modal agregar datos cita            =
================================================*/

$(document).on("click", ".agendarCitaSeleccionarAfiliado", function(){

	var identificacion = $(this).attr("identificacion");
  	var nombre = $(this).attr("nombre");
  	var id_empresa = $(this).attr("id");
  	var nit = $(this).attr("nit");
  	var razon = $(this).attr("razon");

  	$("#soy_afiliado").val("true");
  	$("#id_empresa").val(id_empresa);
  	$("#nit").val(nit);
  	$("#razon_social").val(razon);
  	$("#identificacion").val(identificacion);
  	$("#afiliado").val(nombre);

  	$("#crearCitaAfiliado2").modal("show");
  	$("#crearCitaAfiliado").modal("hide");

})

/*=====  End of Modal agregar datos cita  ======*/

/*=====================================
=            Eliminar cita            =
=====================================*/

$(document).on("click", ".eliminarCita", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar esta cita?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar cita!'
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
		                    title: "¡La cita ha sido eliminado!",
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

/*=====  End of Eliminar cita  ======*/

/*=======================================================
=            Ver ingresar empleado o pasante            =
=======================================================*/

$(document).on("click", ".agregarEmpleadoPasante", function(){

	document.getElementById("ingresarEmpleadoPasante").style.visibility="";
	$(this).parent().parent().parent().remove();
	document.getElementById("ingresarEmpleadoPasante").classList.remove("collapsed-card");
})

/*=====  End of Ver ingresar empleado o pasante  ======*/

/*=========================================
=            Eliminar Empleado            =
=========================================*/

$(document).on("click", ".eliminarEmpleado", function(){

	var action = $(this).attr("action");
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");

  	var foto = $(this).attr("foto");
  	var hoja_de_vida = $(this).attr("hoja_de_vida");
  	var cedula = $(this).attr("cedula");

  	swal({
  		 title: '¿Está seguro de eliminar este empleado o pasante?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Sí, eliminar empleado o pasante!'
  	}).then(function(result){

  		if(result.value){
  			var datos = "foto="+foto+"&hoja_de_vida="+hoja_de_vida+"&cedula="+cedula;
  			$.ajax({
				url: ruta+"/ajax/empleados.php",
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
		                    title: "¡El empleado o pasante ha sido eliminado!",
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

/*=====  End of Eliminar Empleado  ======*/


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


/*=====================================
=            Modo nocturno            =
=====================================*/

$(document).on("click", ".modoNocturno", function(){
	var action = $(this).attr("action");
	action = ruta+"/modoNocturno/"+action;
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	//var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");

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

			if(respuesta == "nocturno") {
		 		swal({
                    type:"success",
                    title: "¡Bienvenido al modo nocturno!",
                    text: "Para volver al modo normal pulsa en el sol.",
                    background: '#343a40',
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
	            }).then(function(result){
	             	if(result.value){
	             		window.location = pagina;
	             	}
	            })
			}

			if(respuesta == "diurno") {
		 		swal({
                    type:"success",
                    title: "¡Bienvenido al modo diurno!",
                    text: "Para volver al modo normal pulsa en la luna.",
                    background: '#fff',
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
	            }).then(function(result){
	             	if(result.value){
	             		window.location = pagina;
	             	}
	            })
			}

			if(respuesta == "vacio") {
		 		swal({
                    type:"error",
                    title: "¡Ha ocurrido un error!",
                    text: "No se puedo cambiar el modo nocturno/diurno.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
	            }).then(function(result){
	             	if(result.value){
	             		window.location = pagina;
	             	}
	            })
			}

		},
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus + " " + errorThrown);
        }

	})

  	
})

/*=====  End of Modo nocturno  ======*/

/*================================================
=            Ver información genereal            =
================================================*/

$(document).on("click", ".verInfoGral", function(){
	document.getElementById("opcionesInfoGral").style = "display: block; height: 599.562px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;";
	document.getElementById("arbolInfoGral").style.visibility = "";
})

/*=====  End of Ver información genereal  ======*/


