/*=============================================
EDITAR MERCANCIA
=============================================*/
$(".TablaMercancia").on("click", ".btnEditarMercancia", function(){

	var idMercancia = $(this).attr("idMercancia");
	
	var datos = new FormData();
	datos.append("idMercancia", idMercancia);

	$.ajax({

		url:"ajax/mercancia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarDescripcion").val(respuesta["Descripcion"]);
		    $("#editarGiro> [value=" + respuesta["Giro"] + "]").attr("selected", "true");
			$("#editarPeligrosidad> [value=" + respuesta["Peligrosidad"] + "]").attr("selected", "true");
			$("#editarValorA").val(respuesta["Valor_Aseguradora"]);
			$("#editarValorAP").val(respuesta["Valor_Apar"]);
			$("#editarIntervalo1").val(respuesta["Valor_A"]);
			$("#editarIntervalo2").val(respuesta["Valor_B"]);
			$("#editarIntervalo3").val(respuesta["Valor_C"]);
			$("#editarIntervalo4").val(respuesta["Valor_D"]);
			$("#editarIntervalo5").val(respuesta["Valor_E"]);
			$("#id").val(respuesta["Id"]);

		}

	});

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

	  url:"ajax/mercancia.ajax.php",
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




