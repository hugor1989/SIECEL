/*=============================================
EDITAR GIRO
=============================================*/
$(".tableGiro").on("click", ".btnEditarGiro", function(){

	var idGiro = $(this).attr("idGiro");
	
	var datos = new FormData();
	datos.append("idGiro", idGiro);

	$.ajax({

		url:"ajax/mercancia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#EditarDescripcion").val(respuesta["Descripcion"]);
			$("#id").val(respuesta["Id"]);

		}

	});

})

/*=============================================
ACTIVAR Giro
=============================================*/
$(".tableGiro").on("click", ".btnActivarGiro", function(){

	var idGiro = $(this).attr("idGiro");
	var estadoGiro = $(this).attr("estadoGiro");

	var datos = new FormData();
 	datos.append("activarId", idGiro);
  	datos.append("estadoGiro", estadoGiro);

  	$.ajax({

	  url:"ajax/mercancia.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "usuarios";

			        }


				});

	      	}

      }

  	})

  	if(estadoGiro == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoGiro',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoGiro',0);

  	}

})

/*=============================================
ACTIVAR Mercancia
=============================================*/
$(".TablaMercancia").on("click", ".btnActivarMercancia", function(){

	var idMercancia = $(this).attr("idMercancia");
	var estadoMercancia = $(this).attr("estadoMercancia");

	var datos = new FormData();
 	datos.append("idMercancia", idMercancia);
  	datos.append("estadoMercancia", estadoMercancia);

  	$.ajax({

	  url:"ajax/giro.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "mercancia";

			        }


				});

	      	}

      }

  	})

  	if(estadoMercancia == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoMercancia',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoMercancia',0);

  	}

})
/*=============================================
AUTOMATICO Mercancia
=============================================*/
$(".TablaMercancia").on("click", ".btnActivarMercanciaAutomatico", function(){

	var idMercancia = $(this).attr("idMercancia");
	var automaticoMercancia = $(this).attr("automaticoMercancia");

	var datos = new FormData();
 	datos.append("idMercancia", idMercancia);
  	datos.append("automaticoMercancia", automaticoMercancia);

  	$.ajax({

	  url:"ajax/giro.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 Swal.fire({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "mercancia";

			        }


				});

	      	}

      }

  	})

  	if(automaticoMercancia == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('automaticoMercancia',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('automaticoMercancia',0);

  	}

})

var form_count = 1, previous_form, next_form, total_forms;
	total_forms = $("fieldset").length;
	
	$(".next-form-m").click(function(){
		
		if($("#nuevoDescripcion").val() == '' ){
			Swal.fire("Error ", "Favor de Ingresar Descripcion", "error");
			return;
		}else if($("#nuevoValorA").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor Aseguradora", "error");
				return;
		}else if($("#nuevoValorAP").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor APAR", "error");
				return;
		}else if(document.getElementById("nuevoPeligrosidad").value == ''){
			Swal.fire("Error ", "Favor de Seleccionar 'Peligrosidad'", "error");
			return;
		}else if(document.getElementById("nuevoGiro").value == ''){
			Swal.fire("Error ", "Favor de Seleccionar el Giro", "error");
			return;
		}else{
			previous_form = $(this).parent();
			next_form = $(this).parent().next();
			next_form.show();
			previous_form.hide();
			setProgressBarValue(++form_count);
		}
	});
/* 
	$(".next-form-me").click(function(){
		if($("#nuevoROT").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor ROT", "error");
				return;
		}else if($("#nuevoRobo").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor RPBO", "error");
				return;
		}else if($("#nuevoOtros").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor OTROS", "error");
				return;
		}else{
			previous_form = $(this).parent();
			next_form = $(this).parent().next();
			next_form.show();
			previous_form.hide();
			setProgressBarValue(++form_count);
		}
	}); */

	$(".previous-form-m").click(function(){
		previous_form = $(this).parent();
		next_form = $(this).parent().prev();
		next_form.show();
		previous_form.hide();
		setProgressBarValue(--form_count);
	});
	setProgressBarValue(form_count);
	function setProgressBarValue(value){
		var percent = parseFloat(100 / total_forms) * value;
		percent = percent.toFixed();
		$(".progress-bar")
		.css("width",percent+"%")
		.html(percent+"%");
	}


	///editar mercancia
	var form_count = 1, previous_form, next_form, total_forms;
	total_forms = $("fieldset").length;
	
	$(".next-form-med").click(function(){
		
		if($("#editarDescripcion").val() == '' ){
			Swal.fire("Error ", "Favor de Ingresar Descripcion", "error");
			return;
		}else if($("#editarValorA").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor Aseguradora", "error");
				return;
		}else if($("#editarValorAP").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Valor APAR", "error");
				return;
		}else if(document.getElementById("editarPeligrosidad").value == ''){
			Swal.fire("Error ", "Favor de Seleccionar 'Peligrosidad'", "error");
			return;
		}else if(document.getElementById("editarGiro").value == ''){
			Swal.fire("Error ", "Favor de Seleccionar el Giro", "error");
			return;
		}else{
			previous_form = $(this).parent();
			next_form = $(this).parent().next();
			next_form.show();
			previous_form.hide();
			setProgressBarValue(++form_count);
		}
	});

	$(".previous-form-med").click(function(){
		previous_form = $(this).parent();
		next_form = $(this).parent().prev();
		next_form.show();
		previous_form.hide();
		setProgressBarValue(--form_count);
	});
	setProgressBarValue(form_count);
	function setProgressBarValue(value){
		var percent = parseFloat(100 / total_forms) * value;
		percent = percent.toFixed();
		$(".progress-bar")
		.css("width",percent+"%")
		.html(percent+"%");
	}




