var ruta = $("#ruta").val();
var url_actual = window.location;
console.log(url_actual);

if (url_actual = (ruta+"/eventos/general")) {
	console.log("rutas iguales");

	if (document.getElementById("eventos")) {

		var eventos = JSON.parse($("#eventos").val());
		console.log("Eventos: ",$("#eventos").val());
		var total_eventos = $("#totalEventos").val();
		/*console.log("Eventos: ",eventos[0]["fecha_inicio"]);
		console.log("Total eventos: ", total_eventos);
		var fecha = new Date(eventos[0]["fecha_inicio"]);
		var year = fecha.getUTCFullYear();
		var mes = fecha.getUTCMonth();
		var dia = fecha.getUTCDate();
		console.log("fecha: ",year+"-"+mes+"-"+dia);*/

		/*var hora_completa = eventos[2]["hora_inicio"];
		var hora = hora_completa.substr(0,2);
		var minutos = hora_completa.substr(3,2);
		console.log("hora: ",hora_completa);*/

		var filtro_eventos = "[{";
		var fecha_inicio, year_inicio, mes_inicio, dia_inicio, hora_completa_inicio, hora_inicio, minutos_inicio;
		var fecha_final, year_final, mes_final, dia_final, hora_completa_final, hora_final, minutos_final;

		/*for (var i = 0; i < total_eventos; i++) {
			if (i == (total_eventos-1)) {

				filtro_eventos = filtro_eventos+"title: '"+eventos[i]["nombre"]+"',";
				if (eventos[i]["hora_inicio"] == null) {
					fecha_inicio = new Date(eventos[i]["fecha_inicio"]);
					year_inicio = fecha_inicio.getUTCFullYear();
					mes_inicio = fecha_inicio.getUTCMonth();
					mes_inicio = mes_inicio + 1;
					dia_inicio = fecha_inicio.getUTCDate();
					filtro_eventos = filtro_eventos + "start: new Date("+year_inicio+", "+mes_inicio+", "+dia_inicio+"),";

				} else {
					fecha_inicio = new Date(eventos[i]["fecha_inicio"]);
					hora_completa_inicio = eventos[i]["hora_inicio"];
					year_inicio = fecha_inicio.getUTCFullYear();
					mes_inicio = fecha_inicio.getUTCMonth();
					mes_inicio = mes_inicio + 1;
					dia_inicio = fecha_inicio.getUTCDate();
					hora_inicio = hora_completa_inicio.substr(0,2);
					minutos_inicio = hora_completa_inicio.substr(3,2);
					filtro_eventos = filtro_eventos + "start: new Date("+year_inicio+", "+mes_inicio+", "+dia_inicio+", "+hora_inicio+", "+minutos_inicio+"),";
				}
				if (eventos[i]["fecha_final"] != null) {
					if (eventos[i]["hora_final"] == null) {
						fecha_final = new Date(eventos[i]["fecha_final"]);
						year_final = fecha_final.getUTCFullYear();
						mes_final = fecha_final.getUTCMonth();
						mes_final = mes_final + 1;
						dia_final = fecha_final.getUTCDate();
						filtro_eventos = filtro_eventos + "end: new Date("+year_final+", "+mes_final+", "+dia_final+"),";
					} else {
						fecha_final = new Date(eventos[i]["fecha_final"]);
						hora_completa_final = eventos[i]["hora_final"];
						year_final = fecha_final.getUTCFullYear();
						mes_final = fecha_final.getUTCMonth();
						mes_final = mes_final + 1;
						dia_final = fecha_final.getUTCDate();
						hora_final = hora_completa_final.substr(0,2);
						minutos_final = hora_completa_final.substr(3,2);
						filtro_eventos = filtro_eventos + "end: new Date("+year_final+", "+mes_final+", "+dia_final+", "+hora_final+", "+minutos_final+"),";
					}
				}
				filtro_eventos = filtro_eventos + "backgroundColor: '"+eventos[i]["backgroundColor"]+"', borderColor: '"+eventos[i]["borderColor"]+"'";
				if (eventos[i]["allDay"] == "true") {
					filtro_eventos = filtro_eventos + ", allDay: true }]";
				} else {
					filtro_eventos = filtro_eventos + ", allDay: false }]";
				}

			}else{
				filtro_eventos = filtro_eventos+"title: '"+eventos[i]["nombre"]+"',";
				if (eventos[i]["hora_inicio"] == null) {
					fecha_inicio = new Date(eventos[i]["fecha_inicio"]);
					year_inicio = fecha_inicio.getUTCFullYear();
					mes_inicio = fecha_inicio.getUTCMonth();
					mes_inicio = mes_inicio + 1;
					dia_inicio = fecha_inicio.getUTCDate();
					filtro_eventos = filtro_eventos + "start: new Date("+year_inicio+", "+mes_inicio+", "+dia_inicio+"),";

				} else {
					fecha_inicio = new Date(eventos[i]["fecha_inicio"]);
					hora_completa_inicio = eventos[i]["hora_inicio"];
					year_inicio = fecha_inicio.getUTCFullYear();
					mes_inicio = fecha_inicio.getUTCMonth();
					mes_inicio = mes_inicio + 1;
					dia_inicio = fecha_inicio.getUTCDate();
					hora_inicio = hora_completa_inicio.substr(0,2);
					minutos_inicio = hora_completa_inicio.substr(3,2);
					filtro_eventos = filtro_eventos + "start: new Date("+year_inicio+", "+mes_inicio+", "+dia_inicio+", "+hora_inicio+", "+minutos_inicio+"),";
				}
				if (eventos[i]["fecha_final"] != null) {
					if (eventos[i]["hora_final"] == null) {
						fecha_final = new Date(eventos[i]["fecha_final"]);
						year_final = fecha_final.getUTCFullYear();
						mes_final = fecha_final.getUTCMonth();
						mes_final = mes_final + 1;
						dia_final = fecha_final.getUTCDate();
						filtro_eventos = filtro_eventos + "end: new Date("+year_final+", "+mes_final+", "+dia_final+"),";
					} else {
						fecha_final = new Date(eventos[i]["fecha_final"]);
						hora_completa_final = eventos[i]["hora_final"];
						year_final = fecha_final.getUTCFullYear();
						mes_final = fecha_final.getUTCMonth();
						mes_final = mes_final + 1;
						dia_final = fecha_final.getUTCDate();
						hora_final = hora_completa_final.substr(0,2);
						minutos_final = hora_completa_final.substr(3,2);
						filtro_eventos = filtro_eventos + "end: new Date("+year_final+", "+mes_final+", "+dia_final+", "+hora_final+", "+minutos_final+"),";
					}
				}
				filtro_eventos = filtro_eventos + "backgroundColor: '"+eventos[i]["backgroundColor"]+"', borderColor: '"+eventos[i]["borderColor"]+"'";
				if (eventos[i]["allDay"] == "true") {
					filtro_eventos = filtro_eventos + ", allDay: true },{";
				} else {
					filtro_eventos = filtro_eventos + ", allDay: false },{";
				}
			}
		}*/

		for (var i = 0; i < total_eventos; i++) {
			if (i == (total_eventos-1)) {

				filtro_eventos = filtro_eventos+'"title":"'+eventos[i]["nombre"]+'",';
				if (eventos[i]["hora_inicio"] == null) {
					fecha_inicio = eventos[i]["fecha_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';

				} else {
					fecha_inicio = eventos[i]["fecha_inicio"]+" "+eventos[i]["hora_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';
				}
				if (eventos[i]["fecha_final"] != null) {
					if (eventos[i]["hora_final"] == null) {
						fecha_final = eventos[i]["fecha_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					} else {
						fecha_final = eventos[i]["fecha_final"]+" "+eventos[i]["hora_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					}
				}
				filtro_eventos = filtro_eventos + '"backgroundColor":"'+eventos[i]["backgroundColor"]+'","borderColor":"'+eventos[i]["borderColor"]+'"';
				if (eventos[i]["allDay"] == "true") {
					filtro_eventos = filtro_eventos + ',"allDay":true';
				} else {
					filtro_eventos = filtro_eventos + ',"allDay":false';
				}
				filtro_eventos = filtro_eventos + ',"url":"'+ruta+'/eventos/general/'+eventos[i]["id"]+'"}]';
			}else{
				filtro_eventos = filtro_eventos+'"title":"'+eventos[i]["nombre"]+'",';
				if (eventos[i]["hora_inicio"] == null) {
					fecha_inicio = eventos[i]["fecha_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';

				} else {
					fecha_inicio = eventos[i]["fecha_inicio"]+" "+eventos[i]["hora_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';
				}
				if (eventos[i]["fecha_final"] != null) {
					if (eventos[i]["hora_final"] == null) {
						fecha_final = eventos[i]["fecha_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					} else {
						fecha_final = eventos[i]["fecha_final"]+" "+eventos[i]["hora_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					}
				}
				filtro_eventos = filtro_eventos + '"backgroundColor":"'+eventos[i]["backgroundColor"]+'","borderColor":"'+eventos[i]["borderColor"]+'"';
				if (eventos[i]["allDay"] == "true") {
					filtro_eventos = filtro_eventos + ',"allDay":true';
				} else {
					filtro_eventos = filtro_eventos + ',"allDay":false';
				}
				filtro_eventos = filtro_eventos + ',"url":"'+ruta+'/eventos/general/'+eventos[i]["id"]+'"},{';
			}
		}

		console.log(JSON.parse(filtro_eventos));
		//console.log(filtro_eventos);
		var listado_eventos = JSON.parse(filtro_eventos);

		var calendarEl = document.getElementById("calendarioEventos");
		var calendar = new FullCalendar.Calendar(calendarEl,{
		  //initialView: 'dayGridMonth'
		  locale: 'es',
		  headerToolbar: {
		    left  : 'prev,next today',
		    center: 'title',
		    right : 'dayGridMonth,timeGridWeek,timeGridDay'
		  },
		  themeSystem: 'bootstrap',
		  //Random default events
		  events: listado_eventos,
		  editable  : true,
		  droppable : true, // this allows things to be dropped onto the calendar !!!
		  drop      : function(info) {
		    // is the "remove after drop" checkbox checked?
		    if (checkbox.checked) {
		      // if so, remove the element from the "Draggable Events" list
		      info.draggedEl.parentNode.removeChild(info.draggedEl);
		    }
		  }
		});
		calendar.render();

		
	}
	
	
}


$( '.todo-dia' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        $('#allDay').val("true");
        $('#hora-inicio').prop("disabled", true);
        $('#fecha-final').prop("disabled", true);
        $('#hora-final').prop("disabled", true);
    } else {
        $('#allDay').val("false");
        $('#hora-inicio').prop("disabled", false);
        $('#fecha-final').prop("disabled", false);
        $('#hora-final').prop("disabled", false);
    }
});


/*----------  Seleccionador de colores  ----------*/

var chequeado = "";
$(document).on("click", ".text-purple", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-purple");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-purple");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#purple-icono').removeClass();
	$('#purple-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#purple-icono";
	$('#color').val('#605ca8');
})
$(document).on("click", ".text-indigo", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-indigo");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-indigo");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#indigo-icono').removeClass();
	$('#indigo-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#indigo-icono";
	$('#color').val('#6610f2');
})
$(document).on("click", ".text-navy", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-navy");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-navy");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#navy-icono').removeClass();
	$('#navy-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#navy-icono";
	$('#color').val('#001f3f');
})
$(document).on("click", ".text-primary", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-primary");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-primary");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#primary-icono').removeClass();
	$('#primary-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#primary-icono";
	$('#color').val('#007bff');
})
$(document).on("click", ".text-lightblue", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-lightblue");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-lightblue");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#lightblue-icono').removeClass();
	$('#lightblue-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#lightblue-icono";
	$('#color').val('#3c8dbc');
})
$(document).on("click", ".text-info", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-info");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-info");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#info-icono').removeClass();
	$('#info-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#info-icono";
	$('#color').val('#17a2b8');
})
$(document).on("click", ".text-teal", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-teal");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-teal");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#teal-icono').removeClass();
	$('#teal-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#teal-icono";
	$('#color').val('#39cccc');
})
$(document).on("click", ".text-olive", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-olive");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-olive");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#olive-icono').removeClass();
	$('#olive-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#olive-icono";
	$('#color').val('#3d9970');
})
$(document).on("click", ".text-success", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-success");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-success");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#success-icono').removeClass();
	$('#success-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#success-icono";
	$('#color').val('#28a745');
})
$(document).on("click", ".text-lime", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-lime");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-lime");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#lime-icono').removeClass();
	$('#lime-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#lime-icono";
	$('#color').val('#01ff70');
})
$(document).on("click", ".text-warning", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-warning");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-warning");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#warning-icono').removeClass();
	$('#warning-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#warning-icono";
	$('#color').val('#ffc107');
})
$(document).on("click", ".text-orange", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-orange");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-orange");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#orange-icono').removeClass();
	$('#orange-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#orange-icono";
	$('#color').val('#ff851b');
})
$(document).on("click", ".text-danger", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-danger");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-danger");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#danger-icono').removeClass();
	$('#danger-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#danger-icono";
	$('#color').val('#dc3545');
})
$(document).on("click", ".text-maroon", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-maroon");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-maroon");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#maroon-icono').removeClass();
	$('#maroon-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#maroon-icono";
	$('#color').val('#d81b60');
})
$(document).on("click", ".text-pink", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-pink");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-pink");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#pink-icono').removeClass();
	$('#pink-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#pink-icono";
	$('#color').val('#e83e8c');
})
$(document).on("click", ".text-fuchsia", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-fuchsia");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-fuchsia");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#fuchsia-icono').removeClass();
	$('#fuchsia-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#fuchsia-icono";
	$('#color').val('#f012be');
})
$(document).on("click", ".text-light", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-light");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-light");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#light-icono').removeClass();
	$('#light-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#light-icono";
	$('#color').val('#1f2d3d');
})
$(document).on("click", ".text-secondary", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-secondary");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-secondary");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#secondary-icono').removeClass();
	$('#secondary-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#secondary-icono";
	$('#color').val('#6c757d');
})
$(document).on("click", ".text-gray", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-gray");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-gray");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#gray-icono').removeClass();
	$('#gray-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#gray-icono";
	$('#color').val('#adb5bd');
})
$(document).on("click", ".text-gray-dark", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-gray-dark");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-gray-dark");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#gray-dark-icono').removeClass();
	$('#gray-dark-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#gray-dark-icono";
	$('#color').val('#343a40');
})
$(document).on("click", ".text-black", function(){
	$('#cabecera').removeClass();
	$('#cabecera').addClass("modal-header").addClass("bg-black");
	$('#pie').removeClass();
	$('#pie').addClass("modal-header").addClass("bg-black");
	$('#cerrar').removeClass();
	$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#guardar').removeClass();
	$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(chequeado).removeClass();
	$(chequeado).addClass("fas").addClass("fa-square");
	$('#black-icono').removeClass();
	$('#black-icono').addClass("fas").addClass("fa-check-square");
	chequeado = "#black-icono";
	$('#color').val('#000000');
})

/*----------  Editar evento  ----------*/

$( '.editar-todo-dia' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        $('#editar-allDay').val("true");
        $('#editar-hora-inicio').prop("disabled", true);
        $('#editar-fecha-final').prop("disabled", true);
        $('#editar-hora-final').prop("disabled", true);
    } else {
        $('#editar-allDay').val("false");
        $('#editar-hora-inicio').prop("disabled", false);
        $('#editar-fecha-final').prop("disabled", false);
        $('#editar-hora-final').prop("disabled", false);
    }
});

var editar_chequeado = "";

$(document).on("click", ".editar-purple", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-purple");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-purple");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-purple-icono').removeClass();
	$('#editar-purple-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-purple-icono";
	$('#editar-color').val('#605ca8');
})
$(document).on("click", ".editar-indigo", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-indigo");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-indigo");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-indigo-icono').removeClass();
	$('#editar-indigo-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-indigo-icono";
	$('#editar-color').val('#6610f2');
})
$(document).on("click", ".editar-navy", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-navy");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-navy");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-navy-icono').removeClass();
	$('#editar-navy-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-navy-icono";
	$('#editar-color').val('#001f3f');
})
$(document).on("click", ".editar-primary", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-primary");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-primary");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-primary-icono').removeClass();
	$('#editar-primary-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-primary-icono";
	$('#editar-color').val('#007bff');
})
$(document).on("click", ".editar-lightblue", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-lightblue");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-lightblue");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-lightblue-icono').removeClass();
	$('#editar-lightblue-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-lightblue-icono";
	$('#editar-color').val('#3c8dbc');
})
$(document).on("click", ".editar-info", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-info");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-info");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-info-icono').removeClass();
	$('#editar-info-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-info-icono";
	$('#editar-color').val('#17a2b8');
})
$(document).on("click", ".editar-teal", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-teal");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-teal");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-teal-icono').removeClass();
	$('#editar-teal-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-teal-icono";
	$('#editar-color').val('#39cccc');
})
$(document).on("click", ".editar-olive", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-olive");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-olive");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-olive-icono').removeClass();
	$('#editar-olive-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-olive-icono";
	$('#editar-color').val('#3d9970');
})
$(document).on("click", ".editar-success", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-success");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-success");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-success-icono').removeClass();
	$('#editar-success-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-success-icono";
	$('#editar-color').val('#28a745');
})
$(document).on("click", ".editar-lime", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-lime");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-lime");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-lime-icono').removeClass();
	$('#editar-lime-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-lime-icono";
	$('#editar-color').val('#01ff70');
})
$(document).on("click", ".editar-warning", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-warning");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-warning");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-warning-icono').removeClass();
	$('#editar-warning-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-warning-icono";
	$('#editar-color').val('#ffc107');
})
$(document).on("click", ".editar-orange", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-orange");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-orange");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-orange-icono').removeClass();
	$('#editar-orange-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-orange-icono";
	$('#editar-color').val('#ff851b');
})
$(document).on("click", ".editar-danger", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-danger");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-danger");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-danger-icono').removeClass();
	$('#editar-danger-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-danger-icono";
	$('#editar-color').val('#dc3545');
})
$(document).on("click", ".editar-maroon", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-maroon");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-maroon");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-maroon-icono').removeClass();
	$('#editar-maroon-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-maroon-icono";
	$('#editar-color').val('#d81b60');
})
$(document).on("click", ".editar-pink", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-pink");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-pink");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-pink-icono').removeClass();
	$('#editar-pink-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-pink-icono";
	$('#editar-color').val('#e83e8c');
})
$(document).on("click", ".editar-fuchsia", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-fuchsia");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-fuchsia");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-fuchsia-icono').removeClass();
	$('#editar-fuchsia-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-fuchsia-icono";
	$('#editar-color').val('#f012be');
})
$(document).on("click", ".editar-light", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-light");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-light");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-light-icono').removeClass();
	$('#editar-light-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-light-icono";
	$('#editar-color').val('#1f2d3d');
})
$(document).on("click", ".editar-secondary", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-secondary");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-secondary");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-secondary-icono').removeClass();
	$('#editar-secondary-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-secondary-icono";
	$('#editar-color').val('#6c757d');
})
$(document).on("click", ".editar-gray", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-gray");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-gray");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-gray-icono').removeClass();
	$('#editar-gray-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-gray-icono";
	$('#editar-color').val('#adb5bd');
})
$(document).on("click", ".editar-gray-dark", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-gray-dark");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-gray-dark");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#gray-dark-icono').removeClass();
	$('#gray-dark-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-gray-dark-icono";
	$('#editar-color').val('#343a40');
})
$(document).on("click", ".editar-black", function(){
	$('#editar-cabecera').removeClass();
	$('#editar-cabecera').addClass("modal-header").addClass("bg-black");
	$('#editar-pie').removeClass();
	$('#editar-pie').addClass("modal-header").addClass("bg-black");
	$('#editar-cerrar').removeClass();
	$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$('#editar-guardar').removeClass();
	$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
	$(editar_chequeado).removeClass();
	$(editar_chequeado).addClass("fas").addClass("fa-square");
	$('#editar-black-icono').removeClass();
	$('#editar-black-icono').addClass("fas").addClass("fa-check-square");
	editar_chequeado = "#editar-black-icono";
	$('#editar-color').val('#000000');
})
/*var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

var calendarEl = document.getElementById("calendarioEventos");
var calendar = new FullCalendar.Calendar(calendarEl,{
  //initialView: 'dayGridMonth'
  locale: 'es',
  headerToolbar: {
    left  : 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek,timeGridDay'
  },
  themeSystem: 'bootstrap',
  //Random default events
  events: [
    {
      title          : 'All Day Event',
      start          : new Date(y, m, 1),
      backgroundColor: '#f56954', //red
      borderColor    : '#f56954', //red
      allDay         : true
    },
    {
      title          : 'Long Event',
      start          : new Date(y, m, d - 5),
      end            : new Date(y, m, d - 2),
      backgroundColor: '#f39c12', //yellow
      borderColor    : '#f39c12' //yellow
    },
    {
      title          : 'Meeting',
      start          : new Date(y, m, d, 10, 30),
      allDay         : false,
      backgroundColor: '#0073b7', //Blue
      borderColor    : '#0073b7' //Blue
    },
    {
      title          : 'Lunch',
      start          : new Date(y, m, d, 12, 0),
      end            : new Date(y, m, d, 14, 0),
      allDay         : false,
      backgroundColor: '#00c0ef', //Info (aqua)
      borderColor    : '#00c0ef' //Info (aqua)
    },
    {
      title          : 'Birthday Party',
      start          : new Date(y, m, d + 1, 19, 0),
      end            : new Date(y, m, d + 1, 22, 30),
      allDay         : false,
      backgroundColor: '#00a65a', //Success (green)
      borderColor    : '#00a65a' //Success (green)
    },
    {
      title          : 'Click for Google',
      start          : new Date(y, m, 28),
      end            : new Date(y, m, 29),
      url            : 'https://www.google.com/',
      backgroundColor: '#3c8dbc', //Primary (light-blue)
      borderColor    : '#3c8dbc' //Primary (light-blue)
    }
  ],
  editable  : true,
  droppable : true, // this allows things to be dropped onto the calendar !!!
  drop      : function(info) {
    // is the "remove after drop" checkbox checked?
    if (checkbox.checked) {
      // if so, remove the element from the "Draggable Events" list
      info.draggedEl.parentNode.removeChild(info.draggedEl);
    }
  }
});
calendar.render();*/