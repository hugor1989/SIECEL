/*=============================================
avento de se trata de deble remolque
=============================================*/
$('#nuevoRemolque').change(function() {

	//alert("ok");
	
	 //si se seleccionar si el remolque tienen que habilitar un campo del numero de contenedor y mostrar el mensaje
	if($(this).val() == "Si"){
		document.getElementById("contenedor1").disabled = false;

		document.getElementById("valormercancia2").disabled = false;
		document.getElementById("valormercancia1").disabled = false;
	//	$("#txt-contenedor1").html('№ DEL CONTENEDOR 1.');

		//$("#txt-remolque").html('Para amparar carga FULL, favor de indicar el N° de cada Contenedor y detallar por separado en el Valor del Embarque, el Valor de la Mercancía para cada Contenedor.');
		//document.getElementById("txt-remolque").style.color = "red" //cambiar colores de texto

		document.getElementById("contenedor2").disabled = false;
	//	$("#txt-contenedor2").html('№ DEL CONTENEDOR 2.');
		
	}else if($(this).val() == "No"){


		document.getElementById("valormercancia2").disabled = true;
		document.getElementById("valormercancia1").disabled = false;

		document.getElementById("contenedor1").disabled = false;
	//	$("#txt-remolque").html('');

		document.getElementById("valormercancia2").value = "";
		

		document.getElementById("contenedor2").value = "";
		document.getElementById("TB_Valor2").value = "";
		document.getElementById("contenedor2").disabled = true;

		$('#nuevoTipoContenedor2').val("No").trigger('change');
		document.getElementById("nuevoTipoContenedor2").disabled = true;
		document.getElementById("TB_SumaSolicitada2").value = "";
		document.getElementById("TB_SumaSolicitada2").disabled = true;
		
		
	}else if($(this).val() == "No" && $( "#nuevoContenedor option:selected" ).text() == "Si"){
		//Si es No, solo se deja habilitado el contendor 1 y el 2 se deshabilita

		//alert("si entro");
		
		document.getElementById("valormercancia2").disabled = true;
		document.getElementById("valormercancia1").disabled = false;
		document.getElementById("contenedor1").disabled = false;
		//$("#txt-contenedor1").html('№ DEL CONTENEDOR 1.');

		document.getElementById("valormercancia2").value = "";
		//F_SumarValorMercancia();

		///Contendedor 2
		document.getElementById("contenedor2").disabled = true;
		//$("#txt-remolque").html('');
		document.getElementById("contenedor2").value = "";
		////SE DEBE DESHABILITAR LOS CAMPOS TIPO DE CONTENEDEOR Y LIMPAR LO SELCCIONADOR Y TEXTO

		$("#TB_TipoContenedorResponsabilida2").html('');
		document.getElementById("TB_ValorContenedor2").value = "";

		$("#TB_TipoContenedorResponsabilida1").html('');
		//$("#TB_TipoContenedorTexto1").html('CONTENEDOR 1: Valor Maximo Compañia Moneda Nacional');
		document.getElementById("TB_ValorContenedor1").value = "";
		
		$("#nuevoTipoContenedor1 option[value='No'").attr("selected",true);
		$("#nuevoTipoContenedor2 option[value='No'").attr("selected",true);

		document.getElementById("nuevoTipoContenedor1").disabled = true;
		document.getElementById("nuevoTipoContenedor2").disabled = true;
	
	} 
	
 });

  $('#nuevoContenedor').change(function() {
	
	if($("#nuevoRemolque option:selected" ).text() == "Si" && $(this).val() == "Si"  ){

		document.getElementById("nuevoTipoContenedor1").disabled = false;
		
		document.getElementById("nuevoTipoContenedor2").disabled = false;
		document.getElementById("contenedor2").disabled = false;

		document.getElementById("TB_CuotaContenedor").value = "Para Contenedor, 10% Sobre al valor del contenedor por evento por contenedor";
		document.getElementById("TB_CoberturaContenedor").value = "Riesgos Ordinarios de Transito - Robo Total - Maniobras de Carga y Descarga  -  Limpieza Extraordinaria - Maniobras de Rescate.";

	}else if($("#nuevoRemolque option:selected" ).text() == "Si" && $(this).val() == "No" ){

		
			document.getElementById("TB_Valor2").value = "";
			document.getElementById("TB_Valor1").value = "";
			
			document.getElementById("TB_SumaSolicitada1").value = "";
			document.getElementById("TB_SumaSolicitada2").value = "";
			document.getElementById("TB_SumaSolicitada1").disabled = true;
			document.getElementById("TB_SumaSolicitada2").disabled = true;

			$("#nuevoTipoContenedor1 option[value=No").attr("selected",true);
			$("#nuevoTipoContenedor2 option[value=No").attr("selected",true);

			document.getElementById("nuevoTipoContenedor1").disabled = true;
			document.getElementById("nuevoTipoContenedor2").disabled = true;
			
			//Cuando se selecciona que no se ampara contenedo se lipia el 2 campo del numero de contenedor y
			// se deshabilita
			//document.getElementById("contenedor2").disabled = true;
			//document.getElementById("contenedor2").value = "";
			
			document.getElementById("TB_CoberturaContenedor").value = "";
			$("#LB_CoberContenedor").html(''); 
			document.getElementById("TB_CContenedor").value = "";

			document.getElementById("TB_CuotaContenedor").value = "";
		

	}else if($("#nuevoRemolque option:selected" ).text() == "No" && $(this).val() == "Si" ){

		//$("#element1").html('Tipo de Contenedor 1.'); //titulo
		document.getElementById("nuevoTipoContenedor1").disabled = false;
		document.getElementById("TB_CuotaContenedor").value = "10% Sobre al valor del contenedor por evento por contenedor";
		document.getElementById("TB_CoberturaContenedor").value = "Riesgos Ordinarios de Transito - Robo Total - Maniobras de Carga y Descarga  -  Limpieza Extraordinaria - Maniobras de Rescate.";
	}
	else if($("#nuevoRemolque option:selected" ).text() == "No" && $(this).val() == "No" ){

		//$("#element1").html(''); //titulo
		document.getElementById("nuevoTipoContenedor1").disabled = true;
		$('#nuevoTipoContenedor1').val("No").trigger('change');
		document.getElementById("TB_Valor1").value = "";
		document.getElementById("TB_SumaSolicitada1").disabled = true;
		document.getElementById("TB_SumaSolicitada1").value = "";

	}
  }); 
 
  $('#nuevoTipoContenedor2').change(function() {

		if($(this).val() == "DRY20DC"){
			

			//$("#TB_Responsabilidad2").html('Responsabilidad Máxima para la Compañía, Valor Maximo Compañia en Moneda Nacional');
			document.getElementById("TB_Valor2").value = "150,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
		}
		if($(this).val() == "DRY40DC"){
			
			
			//$("#TB_Responsabilidad2").html('Responsabilidad Máxima para la Compañía, Valor Maximo Compañia en Moneda Nacional');
			document.getElementById("TB_Valor2").value = "150,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;	
		}
		if($(this).val() == "HIGHDRY20"){
			
			//$("#TB_Responsabilidad2").html('Responsabilidad Máxima para la Compañía, Valor Maximo Compañia en Moneda Nacional');
			document.getElementById("TB_Valor2").value = "150,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
		}
		if($(this).val() == "HIGHDRY40"){
			
			//$("#TB_Responsabilidad2").html('Responsabilidad Máxima para la Compañía, Valor Maximo Compañia en Moneda Nacional');
			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;

		}if($(this).val() == "REEFEREQ20"){
			
			//$("#TB_Responsabilidad2").html('Responsabilidad Máxima para la Compañía, Valor Maximo Compañia en Moneda Nacional');
			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;

		}if($(this).val() == "REEFEREQ40"){
			
			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
			
		}if($(this).val() == "REEFER20FT"){

			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
			
		}if($(this).val() == "REEFERSQ40FT"){

			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
			

		}if($(this).val() == "REEFERSQ40FTHC"){

			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
			
		}if($(this).val() == "REFRIGERATED20"){
			
			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
			
		}if($(this).val() == "REFRIGERATED40"){

			document.getElementById("TB_Valor2").value = "600,000 M.N";
			document.getElementById("TB_SumaSolicitada2").disabled = false;
			
		}
  });


  $('#nuevoTipoContenedor1').change(function() {

	if($(this).val() == "DRY20DC"){

		document.getElementById("TB_Valor1").value = "150,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
	}
	if($(this).val() == "DRY40DC"){

		document.getElementById("TB_Valor1").value = "150,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
	}
	if($(this).val() == "HIGHDRY20"){

		document.getElementById("TB_Valor1").value = "150,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
	}
	if($(this).val() == "HIGHDRY40"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;

	}if($(this).val() == "REEFEREQ20"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;

	}if($(this).val() == "REEFEREQ40"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
		
	}if($(this).val() == "REEFER20FT"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
		
	}if($(this).val() == "REEFERSQ40FT"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;

	}if($(this).val() == "REEFERSQ40FTHC"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
		
	}if($(this).val() == "REFRIGERATED20"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
		
	}if($(this).val() == "REFRIGERATED40"){

		document.getElementById("TB_Valor1").value = "600,000 M.N";
		document.getElementById("TB_SumaSolicitada1").disabled = false;
		
	}
});
 
	  // ///////////////////////
	  // FUNCION PARA CONVERTIR LA HORA EL SEGUNDOS
function hora_a_segundos(time){

		let data = time.split(":");
  
		let hourstoSec = parseInt(data[0]) * 60 * 60;
		let minstoSec = parseInt(data[1]) * 60;
		let secs = parseInt(data[1]);
  
		return hourstoSec + minstoSec + secs;
  
}
// VALIDACION FECHA Y HORA
$( "#crearCertificado" ).click(function() {
		
	  //  GUARDAMOS EN VARIABLES LAS FECHAS Y HORAS DEL FORMILARIO
  
	  // Fecha y hora actual
	  let dt_actual = $("#DT_Actual").val();
	  let hora_actual = $("#hora_Actual").val();

	  // Fecha de COBERTURA
  
	  let dt_cobertura = $("#dt").val();
	//  let hora_cobertura = $("#time").val();
	let hora_cobertura = document.querySelector('.clockpicker').value;
	//  let hora_cobertura = $("#timenuevo").val();

	 // let value = document.querySelector('.clockpicker').value;

	// alert(hora_cobertura);
	  //alert(hora_cobertura);

//		alert(dt_cobertura);
//		alert(hora_cobertura);
  
	  //  VALIDACION DE LA FECHA
  
	  // AHORA FORMATEAMOS LA FECHA PARA QUE AMBAS TENGAN EL MISMO ORDEN O FORMATO
	  let dt_cobertura_reverse = dt_cobertura.split("-").reverse().join("-");
  
	  // VALIDAMOS QUE NO HAYA CAMPOS VACIOS
	  if(dt_cobertura === "" || hora_cobertura === ""){
  
		Swal.fire({
			title:'Debes llenar todos los campos.',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }); 
	  } else{
		  // validamos que la fecha de cobertura no sea menor que la actual
		  if(dt_cobertura_reverse < dt_actual){
  
			  // MOSTRAMOS MENSALE DE ALERTA
			  Swal.fire({
				title:'La fecha de cobertura debe ser mayor a la fecha actual.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				  $("#dt").addClass("is-invalid");
				  return;
			  });	
  
		  }else{
			  // SI ESTA TODO CORRECTO SEGUIMOS CON EL FLUJO
			  $("#dt").removeClass("is-invalid");
			  
			  // VALIDACION DE LA HORA
			  // FORMATEAMOS LAS HORAS PARA QUE TENGAN EL MISMO FORMATO
			  let hora_actual_slice = hora_actual.slice(0, -3);
			  let hora_actual_formateada = hora_actual_slice+":00";
			  let hora_cobertura_formateada = hora_cobertura+":00";
			  
			  // convertimos las horas formateadas a segundos
			  let hora_actual_segundos = hora_a_segundos(hora_actual_formateada);
			  let hora_cobertura_segundos = hora_a_segundos(hora_cobertura_formateada);
  
			  // VALIDAMOS QUE LA HORA COBERTURA SEA 1 HORA MAYOR QUE LA ACTUAL
			  // a la hora de cobertura le restamos la hora actual
  
			  let diferencias_hora = hora_cobertura_segundos - hora_actual_segundos
  
			  // SI EL RESULTADO ES MENOR DE 3600 MOSTRAMOS MENSAJE DE ALERTA
			  if(diferencias_hora < 3600){

				Swal.fire({
					title:'La hora de cobertura debe ser 1 hora mayor a la hora actual.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				  }).then(()=>{
					 $("#time").addClass("is-invalid");
					  return;
				  });	
  
			  }else{
			  // TODO CORRECTO ....
				 $("#time").removeClass("is-invalid");
  
				  // CONTINUAR AQUI 
			  }
		  
		  }
	  }
  

});

//Funcuion que Sirve en la parta de cuando se sale del control de reloj mande el mensaje de validacion
function blurFunction() {
	// No focus = Changes the background color of input to red
	//  GUARDAMOS EN VARIABLES LAS FECHAS Y HORAS DEL FORMILARIO
  
	  // Fecha y hora actual
	  let dt_actual = $("#DT_Actual").val();
	  let hora_actual = $("#hora_Actual").val();

	  // Fecha de COBERTURA
  
	  let dt_cobertura = $("#dt").val();
	//  let hora_cobertura = $("#time").val();
	let hora_cobertura = document.querySelector('.clockpicker').value;
	  //  VALIDACION DE LA FECHA
  
	  // AHORA FORMATEAMOS LA FECHA PARA QUE AMBAS TENGAN EL MISMO ORDEN O FORMATO
	  let dt_cobertura_reverse = dt_cobertura.split("-").reverse().join("-");
  
	  // VALIDAMOS QUE NO HAYA CAMPOS VACIOS
	  if(dt_cobertura === "" || hora_cobertura === ""){
  
		Swal.fire({
			title: 'Debes llenar todos los campos.',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  });	
  
	  } else{
		  // validamos que la fecha de cobertura no sea menor que la actual
		  if(dt_cobertura_reverse < dt_actual){
  
			  // MOSTRAMOS MENSALE DE ALERTA
  
			  Swal.fire({
				title: 'La hora de cobertura debe ser 1 hora mayor a la hora actual.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				  $("#dt").addClass("is-invalid");
				  return;
			  });	
  
		  }else{
			  // SI ESTA TODO CORRECTO SEGUIMOS CON EL FLUJO
			  $("#dt").removeClass("is-invalid");
			  
			  // VALIDACION DE LA HORA
			  // FORMATEAMOS LAS HORAS PARA QUE TENGAN EL MISMO FORMATO
			  let hora_actual_slice = hora_actual.slice(0, -3);
			  let hora_actual_formateada = hora_actual_slice+":00";
			  let hora_cobertura_formateada = hora_cobertura+":00";
			  
			  // convertimos las horas formateadas a segundos
			  let hora_actual_segundos = hora_a_segundos(hora_actual_formateada);
			  let hora_cobertura_segundos = hora_a_segundos(hora_cobertura_formateada);
  
			  // VALIDAMOS QUE LA HORA COBERTURA SEA 1 HORA MAYOR QUE LA ACTUAL
			  // a la hora de cobertura le restamos la hora actual
  
			  let diferencias_hora = hora_cobertura_segundos - hora_actual_segundos
  
			  // SI EL RESULTADO ES MENOR DE 3600 MOSTRAMOS MENSAJE DE ALERTA
			  if(diferencias_hora < 3600){
				Swal.fire({
					title: 'La hora de cobertura debe ser 1 hora mayor a la hora actual.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				  }).then(()=>{
					 $("#time").addClass("is-invalid");
					  return;
				  });	
  
			  }else{
			  // TODO CORRECTO ....
				 $("#time").removeClass("is-invalid");
  
				  // CONTINUAR AQUI 
			  }
		  
		  }
	  }
  }

function F_SumarValorMercancia2() {


	var valormercancia1 = $("#valormercancia1").val(); //Valor que tiene la mercancia (APAR)
	var valormercancia2 = $("#valormercancia2").val(); //Valor que tiene la mercancia (APAR)
	var valorembarque = $("#TB_ValorEmbarque").val(); // valor total del embarque
	

	
	if($("#nuevoRemolque").val() == "Si"){

	/* 	if(valormercancia1 == ""){

			valormercancia1 = "0";
		}
	
		if(valormercancia2 == ""){
			valormercancia2 = "0";
		}
	 */
		/* var valor1 = parseFloat(valormercancia1);
		var valor2 = parseFloat(valormercancia2); */
		
		if (valormercancia2 == 0){
			

			Swal.fire({
				title: 'El Valor total de Mercancia 2 debe de ser Mayor a 0.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			}).then(()=>{
				//$("#valormercancia1").addClass("is-invalid");
				$("#valormercancia2").addClass("is-invalid");
				//document.getElementById("valormercancia1").value = "";
				document.getElementById("valormercancia2").value = "";
				 return;
			 });

		}else{

			/* Esta es la suma. */
			//total = (parseFloat(total) + parseFloat(valor));
			var suma = (parseFloat(valormercancia1) + parseFloat(valormercancia2)); //parseFloat(valormercancia1)+parseFloat(valormercancia2);

			//alert(suma);
			if(suma > valorembarque){

				Swal.fire({
					title: 'El Valor total de Mercancia no puede ser mayor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
					$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					document.getElementById("valormercancia2").value = "";
					 return;
				 });	
		
			}else if(suma < valorembarque){
		
				Swal.fire({
					title: 'El Valor Total de Mercancia no puede ser menor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
					$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					document.getElementById("valormercancia2").value = "";
					 return;
				 });
		
			}

		}
	}
	else{
		/* if(valormercancia1 == ""){

			valormercancia1 = "0";
		} */

		var valor1=parseFloat(valormercancia1);

		if(valor1 == 0){

			Swal.fire({
				title: 'El Valor total de Mercancia debe de ser Mayor a 0.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			}).then(()=>{
				$("#valormercancia1").addClass("is-invalid");
				//$("#valormercancia2").addClass("is-invalid");
				document.getElementById("valormercancia1").value = "";
				//document.getElementById("valormercancia2").value = "";
				 return;
			 });
		}else{
			
			var suma = parseFloat(valormercancia1);
			if(suma > valorembarque){

				Swal.fire({
					title: 'El Valor total de Mercancia no puede ser mayor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
					//$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					//document.getElementById("valormercancia2").value = "";
					 return;
				 });	
		
			}else if(suma < valorembarque){
		
				Swal.fire({
					title: 'El Valor Total de Mercancia no puede ser menor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
				//	$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					//document.getElementById("valormercancia2").value = "";
					 return;
				 });
		
			}
		}

	}
}
  function F_SumarValorMercancia() {


	var valormercancia1 = $("#valormercancia1").val(); //Valor que tiene la mercancia (APAR)
	var valormercancia2 = $("#valormercancia2").val(); //Valor que tiene la mercancia (APAR)
	var valorembarque = $("#TB_ValorEmbarque").val(); // valor total del embarque
	

	//Se validad que el que el tipo de remolque si es deble o no
	
	if($("#nuevoRemolque").val() == "Si"){

	/* 	if(valormercancia1 == ""){

			valormercancia1 = "0";
		}
	
		if(valormercancia2 == ""){
			valormercancia2 = "0";
		} */
	
		var valor1 = parseFloat(valormercancia1);
		var valor2 = parseFloat(valormercancia2);

		if(valormercancia1 == 0){

			

			Swal.fire({
				title: 'El Valor total de Mercancia 1 debe de ser Mayor a 0.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			}).then(()=>{
				$("#valormercancia1").addClass("is-invalid");
				//$("#valormercancia2").addClass("is-invalid");
				document.getElementById("valormercancia1").value = "";
				//document.getElementById("valormercancia2").value = "";
				 return;
			 });
		}else{

			//Se suma el valor de la mercancia 1 y mercancia 2
			var suma = valormercancia1+valormercancia2;
			//var suma = parseFloat(valormercancia1)+parseFloat(valormercancia2);
			if(suma > valorembarque && valormercancia2 > 0){

				Swal.fire({
					title: 'El Valor total de Mercancia no puede ser mayor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
					$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					document.getElementById("valormercancia2").value = "";
					 return;
				 });	
		
			}else if(suma < valorembarque && valormercancia2 > 0){
		
				Swal.fire({
					title: 'El Valor Total de Mercancia no puede ser menor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
					$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					document.getElementById("valormercancia2").value = "";
					 return;
				 });
		
			}else{

				$("#valormercancia1").removeClass("is-invalid");
				$("#valormercancia2").removeClass("is-invalid");

			}

		}

		

	}
	else{
		/* if(valormercancia1 == ""){

			valormercancia1 = "0";
		} */

		//var valor1=parseFloat(valormercancia1);

		if(valormercancia1 == 0){

			Swal.fire({
				title: 'El Valor total de Mercancia debe de ser Mayor a 0.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			}).then(()=>{
				$("#valormercancia1").addClass("is-invalid");
				//$("#valormercancia2").addClass("is-invalid");
				document.getElementById("valormercancia1").value = "";
				//document.getElementById("valormercancia2").value = "";
				 return;
			 });
		}else{
			
			//var suma = parseFloat(valormercancia1);
			if(valormercancia1 > valorembarque){

				Swal.fire({
					title: 'El Valor total de Mercancia no puede ser mayor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
					//$("#valormercancia2").addClass("is-invalid");
					document.getElementById("valormercancia1").value = "";
					//document.getElementById("valormercancia2").value = "";
					 return;
				 });	
		
			}else if(valormercancia1 < valorembarque){
		
				Swal.fire({
					title: 'El Valor Total de Mercancia no puede ser menor al Total del embarque.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				}).then(()=>{
					$("#valormercancia1").addClass("is-invalid");
				
					document.getElementById("valormercancia1").value = "";
					//document.getElementById("valormercancia2").value = "";
					 return;
				 });
		
			}else{

				$("#valormercancia1").removeClass("is-invalid");
			}
		}

	}
}
/* 
	if (valormercancia1 != "" && valormercancia2 == ""){

		valormercancia2 = 0;

		document.getElementById("TB_ValorEmbarque").value = valormercancia1;

	}else if (valormercancia1 == "" && valormercancia2 != ""){

		valormercancia1 = 0;

		document.getElementById("TB_ValorEmbarque").value = valormercancia2;

	}else if (valormercancia1 != "" && valormercancia2 != ""){

		document.getElementById("TB_ValorEmbarque").value = suma=parseFloat(valormercancia1)+parseFloat(valormercancia2);
	}
  } */

  //funcion que sirve para validad el monto y validar con el valor apar y valor aseguradora
function F_ValidarValorEmbarque() {

	var ValorMaximoApar = $("#TB_ValorApar").val(); //Valor que tiene la mercancia (APAR)
	var ValorEmbarque = $("#TB_ValorEmbarque").val(); //Valor que ingresa el usuario
	var ComisionPorcentajeUsuario = $("#TB_ObjComision").val(); //Comision del Usario que servira para saber el porcentaje
	var valor = ValorMaximoApar * ComisionPorcentajeUsuario/100; //Se Obtiene el valor real que tiene el agente asignado calculado el valor apar * comision %

	
	if(ValorEmbarque >= 0  && ValorEmbarque <=1000000){

		//console.log($("#TB_ValorA").val());
		ObtenerProtocolo($("#TB_ValorA").val());

	}else if (ValorEmbarque >= 1000001  && ValorEmbarque <=1000500){
		ObtenerProtocolo($("#TB_ValorB").val());
		//console.log("entro");
	}else if (ValorEmbarque >= 1000501  && ValorEmbarque <=3000000){
		ObtenerProtocolo($("#TB_ValorC").val());
		//console.log("entro");
	}else if (ValorEmbarque >= 3000001  && ValorEmbarque <=5100000){
		ObtenerProtocolo($("#TB_ValorD").val());
		//console.log("entro");
	}else if (ValorEmbarque >= 5100001  && ValorEmbarque <=10000000){
		ObtenerProtocolo($("#TB_ValorE").val());
		//console.log("entro");
	}else if (ValorEmbarque >= 10000001){
		ObtenerProtocolo($("#TB_ValorF").val());
		//console.log("entro");
	}else{

	}	
	//Se valida que si el valor de embarque es myor al valor limite mande mensaje de que es necesario revisarlo con el administrador
	if(ValorEmbarque > valor){

		Swal.fire({
			title: 'La suma asegurada requiere autorización del administrador',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }).then(()=>{
			$("#TB_ValorEmbarque").addClass("is-invalid");
			DeshabilitarDatosEmbarque();
			document.getElementById("valormercancia1").disabled = false;
			document.getElementById("valormercancia2").disabled = false;
			return;
		});
	}else{
		//Se quita el Contorno de validado en caso de que el embarque no sea mayor a valor mayimo de mercancia
		$("#TB_ValorEmbarque").removeClass("is-invalid");
		HabilitarDatosEmbarque();
		//Valor de Emabarque
	} //Se termina el IF de la comparacion del valor de embarque
}


$('#nuevoCliente').change(function() {

	//alert($(this).val());
	
	var idCliente = $(this).val();
	
    //console.log(idCliente);

	var datos = new FormData();
	datos.append("idClienteCompleto", idCliente);

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
		//	console.log(respuesta["Id"]);
			
		var numero = "";
		var Direccion = "";
		if(respuesta["Numero_Interior"] != "" && respuesta["Numero_Exterior"] != ""){

			numero = "N°"+ respuesta["Numero_Exterior"] + ", " + respuesta["Numero_Interior"];

		}else if (respuesta["Numero_Interior"] != "" && respuesta["Numero_Exterior"] == ""){

			numero = "N°"+ respuesta["Numero_Interior"];

		}else if (respuesta["Numero_Interior"] == "" && respuesta["Numero_Exterior"] != ''){

			numero = "N°"+ respuesta["Numero_Exterior"];

		}
			Direccion = respuesta["Calle"] + " " + numero + ", COL. " + respuesta["Colonia"] + ", " + respuesta["MunicipioDescripcion"].toUpperCase()  + "," + respuesta["EstadoDescripcion"].toUpperCase() + ", " + respuesta["Pais"] + " C.P " + respuesta["CodigoPostal"]; 


			$("#Cuota_CL_ROT").val(respuesta["Cuota_ROT"]);
			$("#Cuota_CL_TR").val(respuesta["Cuota_TR"]);
			$("#Cuota_CL_VT").val(respuesta["Cuota_TRVT"]);

			$("#rfc").val(respuesta["RFC"]);
			$("#email").val(respuesta["Email"]);
			$("#direccion").val(Direccion);
		}

	});

	LimpiarControles();
	
	//Se borrar la mercancia
	$('#nuevoMercancia').val("na").trigger('change');

});

$('#nuevoBienesDesperdicios').change(function() {
	
	if($(this).val() == "Si"  ){

		//Contenedor 2
		
		document.getElementById("TB_CMerncacias").value = "Riesgos Ordinario de Transito";

	}else if($(this).val() == "No" ){
		
		document.getElementById("TB_CMerncacias").value = "";
	}
  }); 

//Change que sirve para obtener el giro de la mercancia seleccionada
  $('#nuevoMercancia').change(function() {
	ObtenerMercancia($(this).val());
	ObtenerGiro(($(this).find(':selected').data('city')) );

	
	LimpiarControles();
	
	//Se borrar la mercancia
	//$('#nuevoCliente').val("").trigger('change');
  }); 

//Evento Change de Selecionar alsocialdo para obtener la abreviatura
  $('#nuevoAsociado').change(function() {

	//alert();
	
//	alert($(this).val());
	
	ObtenerPrefijoAsociado($(this).val());

	var perfil = $("#PerilUsuarioLogin").val();

	//alert(perfil);
	if(perfil != 1){

		ObtenerClientes($(this).val());

	}
	
	   
  });

  //Funcion para Obtener el Prefijo del Asociado
  function ObtenerPrefijoAsociado(idasociado){
	var idUsuario = idasociado;
	
	//alert(idUsuario);

	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			var len = respuesta.length;
            for(var i=0; i<len; i++){

				
				$("#TB_Folio").val(respuesta[i].Abreviatura);
				$("#TB_ObjComision").val(respuesta[i].Comision);
				$("#TB_ObjCuotaBasica").val(respuesta[i].Cuota_VT);
				$("#TB_ObjCuotaRot").val(respuesta[i].Cuota_Rot);
				$("#TB_ObjCuotaTR").val(respuesta[i].Cuota_TR);
				$("#TB_ObjCuotaContenedor").val(respuesta[i].Cuota_Contenedor);
				$("#TB_ObjPrimaminima").val(respuesta[i].Prima_minima);
				$("#TB_ObjDerechoCertificado").val(respuesta[i].Derecho_Certificado);
				$("#TB_EmailAsociado").val(respuesta[i].Email);
				$("#TB_ImagenAsociado").val(respuesta[i].Foto);
			}
			

		/* 	var t = respuesta;

			console.log(t);

			for (var key in t) {
				if (t.hasOwnProperty(key)) {

					
					//console.log(t[key]);
					console.log(t[key]);
					if (t[key] == "Abreviatura") {

						console.log("entro");

					}

				}
			} */

			
			
		}

	});
  }
  
  //Funcion para Obtener los clientes ligados al asociado
  function ObtenerClientes(idasociado){
	var id_asociado = idasociado;
	$.ajax({
		url: "ajax/ObtenerClientes.ajax.php",
		method: "POST",
		data: {
			"id":id_asociado
		},
		success: function(respuesta){
			$("#nuevoCliente").attr("disabled", false);
			$("#nuevoCliente").html(respuesta);
			document.getElementById("nuevoCliente").selectedIndex = "-0";

			//Codigo para obtener el select del city del cliente
			//alert($("#nuevoCliente").find(':selected').data('city'));
		}
	});
}

//Funcion que sirve para obtener el giro de la mercancia seleccionada
function ObtenerGiro(idgiro){
	var idGiro = idgiro;
	
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
			
			$("#TB_Giro").val(respuesta["Descripcion"]);
			
		}

	});
  }
  //Funcion que sirve para obtener el giro de la mercancia seleccionada
function ObtenerMercancia(idmercancia){
	var idMercancia = idmercancia;
	
	var datos = new FormData();
	datos.append("idMercancia", idMercancia);

	$.ajax({

		url:"ajax/giro.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){





			//Se valida el Giro una vez pasadn las validaciones de las exclusions de mercancia para si es perecedero o carro tanque poner en el
			//capo de deducibles lo que le corresponde

			//Este If es para validar si el giro es Perecedero
			if(respuesta["Giro"] == 16){

				//Se poner el texto del deducible
				document.getElementById("TB_Deducible").value = "10% Sobre el Valor de la perdida con un minimo de $ 15,000. MXN";

			}else if (respuesta["Giro"] == 5){

				document.getElementById("TB_Deducible").value = "R.O.T 10% \n Robo 15% \n  Sobre el valor total del embarque para toda y cada perdida.";

			}else{

				document.getElementById("TB_Deducible").value = "";
			}
			//Se valida al momento de obtener la informacion de la mercancia la peligrosidad
			// si esta excluido mandar un mensaje de La Mercancia Seleccionada no se puede asegura
			// Si se select el 3 mandar un email de requiere autorizacion del administrador
			//console.log(respuesta["Peligrosidad"]);
			if(respuesta["Peligrosidad"] == 3){

			//	console.log(respuesta["Peligrosidad"]);
				//alert(respuesta["Peligrosidad"]);
				//alert($("#nuevoMercancia").val());
				//alert($("#nuevoCliente").find(':selected').data('city'));
				//Se Obtiene el Giro
				var d = $("#nuevoCliente").find(':selected').data('city');


				if(d != ''){

					var mercancia = $("#nuevoMercancia").val();
					var string = d;
					var array = string.split(",");
					var arrayDeCadenas = array;
					var s = null;
					s = arrayDeCadenas.includes(mercancia);
					//console.info(s);
					 if(s == true){

						document.getElementById("TB_ValorEmbarque").disabled = false;

						$("#TB_Peligrosidad").val(respuesta["Peligrosidad"]);
						$("#TB_ValorAseguradora").val(respuesta["Valor_Aseguradora"]);
						$("#TB_ValorApar").val(respuesta["Valor_Apar"]);
						$("#TB_ROT").val(respuesta["ROT"]);
						$("#TB_Robo").val(respuesta["TR"]);
						$("#TB_Otros").val(respuesta["Otros"]);
						$("#TB_VT").val(respuesta["Variacion_Termica"]);
						$("#TB_EspecialesA").val(respuesta["Especiales_A"]);
						$("#TB_EspecialesB").val(respuesta["Especiales_B"]);
						$("#TB_ValorA").val(respuesta["Valor_A"]);
						$("#TB_ValorB").val(respuesta["Valor_B"]);
						$("#TB_ValorC").val(respuesta["Valor_C"]);
						$("#TB_ValorD").val(respuesta["Valor_D"]);
						$("#TB_ValorE").val(respuesta["Valor_E"]);
						$("#TB_ValorF").val(respuesta["Valor_F"]);
					}else{
						document.getElementById("TB_ValorEmbarque").disabled = true;

						Swal.fire({
							title: 'La mercancia seleccionada requiere autorizacion.',
							width: 600,
							padding: '3em',
							background: '#fff',
							backdrop: `
							  rgba(0,0,123,0.4)
							  left top
							  no-repeat
							`
						  });

						/* Swal.fire({
							icon: '',
							title: '',
							text: 'La Mercancia Seleccionada requiere autorizacion.'
						});	 */

					}
				}else{

					document.getElementById("TB_ValorEmbarque").disabled = true;

					Swal.fire({
						title: 'La mercancia seleccionada requiere autorizacion.',
						width: 600,
						padding: '3em',
						background: '#fff',
						backdrop: `
						  rgba(0,0,123,0.4)
						  left top
						  no-repeat
						`
					  });
					/* Swal.fire({
						icon: '',
						title: '',
						text: 'La Mercancia Seleccionada requiere autorizacion.'
					});	 */
				}	
			}else if (respuesta["Peligrosidad"] == 4){

				Swal.fire({
					title: 'La mercancia seleccionada no se puede amparar, favor de revisar con el Administrador.',
					width: 600,
					padding: '3em',
					background: '#fff',
					backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
				  });
				
				document.getElementById("TB_ValorEmbarque").disabled = true;
			}else{

				document.getElementById("TB_ValorEmbarque").disabled = false;

				$("#TB_Peligrosidad").val(respuesta["Peligrosidad"]);
				$("#TB_ValorAseguradora").val(respuesta["Valor_Aseguradora"]);
				$("#TB_ValorApar").val(respuesta["Valor_Apar"]);
				$("#TB_ROT").val(respuesta["Rot"]);
				$("#TB_Robo").val(respuesta["Robo"]);
				$("#TB_Otros").val(respuesta["Otros"]);
				$("#TB_VT").val(respuesta["Variacion_Termica"]);
				$("#TB_EspecialesA").val(respuesta["Especiales_A"]);
				$("#TB_EspecialesB").val(respuesta["Especiales_B"]);
				$("#TB_ValorA").val(respuesta["Valor_A"]); // de 0 a 1'000,000
				$("#TB_ValorB").val(respuesta["Valor_B"]); // de 1'000,001 a 1'500,00
				$("#TB_ValorC").val(respuesta["Valor_C"]); // de 1'500,001 a 3'000,00
				$("#TB_ValorD").val(respuesta["Valor_D"]); // de 3'000,001 a 5'100,00
				$("#TB_ValorE").val(respuesta["Valor_E"]); // de 5'100,001 a 10'000,00
				$("#TB_ValorF").val(respuesta["Valor_F"]); // de 10'000,001 >
			}
			
		}

	});
  }
  //Funcion que inicializa el control del Select 2, para poder filtrar
  $(function() {
	//Initialize Select2 Elements
		$('.select2').select2()
	
		//Initialize Select2 Elements
		$('.select2bs4').select2({
		  theme: 'bootstrap4'
		})
		
	});	

//Evento que Hace funcina el input del reloj
$('.clockpicker').clockpicker();

//Funcion que se utiliza para poder bloquear los dias atrasado a la fecha actual
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    $('#dt').attr('min', maxDate);
});



//Funcion change de seleccion de continuacion de viaje
$('#nuevoCVJ').change(function() {

	//Se manda a llamar la funcion para el llenador de las coberturas segun
	//la opcion seleccionar de continuacion de viaje y del tipo de bien
	LimpiarControlesCV();
	LlenarTipoCobertura();
	/* var select = document.getElementById("nuevoCBM");
	var length = select.options.length;
	for (i = length-1; i >= 0; i--) {
	select.options[i] = null;
	}


	if($(this).val() == "No" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Nuevos"){

		var array  = ["Seleccionar","ROT Y ROBO", "TODO RIESGO", "TODO RIESGO Y VT"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}
	}else if ($(this).val() == "Si" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Nuevos"){
	

		var array = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}else if ($(this).val() == "SiCertificado" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Nuevos"){
	

		var array = ["Seleccionar","ROT Y ROBO", "TODO RIESGO", "TODO RIESGO Y VT"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}else if($(this).val() == "SiCertificado" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Bienes Usuados o Reconstruidos"){
		

		var array  = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}else if($(this).val() == "Si" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Bienes Usuados o Reconstruidos"){
		
		var array  = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}
	else if($(this).val() == "No" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Bienes Usuados o Reconstruidos"){
		
		var array = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	} */
});

//Funcion que se utiliza para procesar el campo de mercancia autorizada y poder saber que 
// mercancia si pueden cotizar
/* function ObtenerIdMercanciaAutorizada(cadenaADividir,separador) {
	var arrayDeCadenas = cadenaADividir.split(separador);

	document.getElementById("TB_MAUTO").value = "";
	document.getElementById("TB_MAUTO").value = arrayDeCadenas;

 } */

//Funcion change de seleccion de tipo de cobertura que sirve para obtener el tipo de porcentaje
$('#nuevoCBM').change(function() {

    document.getElementById("TB_CMCIA").value = "";
	document.getElementById("TB_PNTA").value = "";
	document.getElementById("TB_PMCTND").value = "";
	document.getElementById("TB_PMAGT").value = "";
	document.getElementById("TB_DCRT").value = "";
	document.getElementById("TB_IVA").value = "";
	document.getElementById("TB_IVA").value = "";

	//Se limpian los campos de la cuota del usuario
	document.getElementById("PNETA").value = "";
	document.getElementById("TB_PNTAT").value = "";
	document.getElementById("TB_PMCTNDT").value = "";
	document.getElementById("TB_PMAGTT").value = "";
	document.getElementById("TB_DCRTT").value = "";
	document.getElementById("IVA").value = "";
	document.getElementById("TOTAL").value = "";


    var DerechoCertificado = $("#TB_ObjDerechoCertificado").val();
    //Se obtiene la prima minima configurado en el usuarios
    var PrimaMinima = $("#TB_ObjPrimaminima").val();

	var ValorEmbarqueTotal = $("#TB_ValorEmbarque").val(); //Valor que ingresa el usuario
	 // Se obtiene el dato de si se ampara el contenedor
	var AmparaContenedor=document.getElementById("nuevoContenedor").value;

	var SoloContenedor = $("#customSwitch1").is(":checked");

	var GranPNC = 0;
	var GranPNCNT = 0;
	var GranIVA = 0;
	var GranTotal = 0;

	if ($(this).val() == "ROT Y ROBO" && SoloContenedor == true) {


		if ($("#nuevoTipoContenedor1").val() != "No" && $("#TB_SumaSolicitada1").val() == "") {
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
			}).then(() => {
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				//$("#TB_SumaSolicitada2").addClass("is-invalid");
				return;
			});
		} else if ($("#nuevoTipoContenedor1").val() != "No" && $("#TB_SumaSolicitada1").val() == "") {
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
					  rgba(0,0,123,0.4)
					  left top
					  no-repeat
					`
			}).then(() => {
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				return;
			});
	
		} else {
			$("#TB_SumaSolicitada1").removeClass("is-invalid");
		//	$("#TB_SumaSolicitada2").removeClass("is-invalid");
	
			
				//Se declaran las variables
				var valor1, valor2, suma, CuotaContenedor, primanetaagente, iva, tasa;
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				if (document.getElementById("TB_SumaSolicitada1").value == '') {
					valor1 = 0
				} else {
					valor1 = document.getElementById("TB_SumaSolicitada1").value
				}
				if (document.getElementById("TB_SumaSolicitada2").value == '') {
					valor2 = 0
				} else {
					valor2 = document.getElementById("TB_SumaSolicitada2").value
				}
	
				/*
				   primero se valida que a nivel cliente no tenga ua cuota, si se tiene
				  se obtiene el valor para hacer los calculo, en caso de que no tenga se pasa 
				  al siguiente nuevel
				*/
				if ($("#Cuota_CL_ROT").val() != "" && $("#Cuota_CL_ROT").val() != null) {
	
					CuotaROTGeneral = $("#Cuota_CL_ROT").val();
				}
				
				/*
				  En caso de que 
				*/
				else if ($("#TB_ObjCuotaRot").val() != "" && $("#TB_ObjCuotaRot").val() != null) {
	
					CuotaROTGeneral = $("#TB_ObjCuotaRot").val();
				} else {
	
					CuotaROTGeneral = 0;
				}
				//alert(valor1);
				//alert(valor2);
				//valor2 = document.getElementById("TB_SumaSolicitada2").value;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = $("#TB_ObjCuotaContenedor").val();
				//Se realizar la suma del valor contenedor 1 y 2
				suma = parseFloat(valor1) + parseFloat(valor2);
	
	
	
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal * CuotaROTGeneral / 100 + (CuotaContenedor / 100 * suma);
				//Se obtiene el total de la suma de prima agente + derechi de certicado
				if (primanetaagente < PrimaMinima) {
					//prima neta agente
					//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto = parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				} else {
					monto = parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
				//Se obtiene el iva del resultado de la suma anterior
				//iva = (monto * tasa)/100;
				//console.log(CuotaROTGeneral);
				//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = CuotaROTGeneral;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC = ValorEmbarqueTotal * CuotaROTGeneral / 100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
	
				//prima neta contenedeor
				GranPNCNT = (CuotaContenedor / 100 * suma);
				document.getElementById("TB_PMCTND").value = GranPNCNT.toFixed(2);
				//prima neta agente
				if (primanetaagente < PrimaMinima) {
					//prima neta agente
					document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				} else {
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa) / 100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto) + parseFloat((monto * tasa) / 100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
			
	
		}
	}else if($(this).val() == "ROT Y ROBO" && $("#EMAYOR").val() == "NO"){

		
		//Se valida el tipo de giro que sea diferente a perecedero y carrotanque para poner en los deducibles que corresponda 
		// de la mercancia que no corresponda a a esos giros
		if($("#TB_Giro").val() != "PERECEDEROS" && $("#TB_Giro").val() != "CARRO TANQUE"){
			document.getElementById("TB_Deducible").value  = "R.O.T 3% Sobre el valor total del embarque para toda y cada perdida.";
		}
	
		document.getElementById("TB_CoberturaMercancia").value  = "Riesgos Ordinarios de Transito - Robo Total.";
	
		if($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() != "No" &&  $("#TB_SumaSolicitada2").val() == ""){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				$("#TB_SumaSolicitada2").addClass("is-invalid");
				 return;
			 });
		}else if ($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() == "No" ){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				 return;
			 });
		
		}else{
			$("#TB_SumaSolicitada1").removeClass("is-invalid");
			$("#TB_SumaSolicitada2").removeClass("is-invalid");
	
			if(AmparaContenedor == "No"){
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;  
	
				//Se declara la varia para obtener la cuota rot
				var CuotaROTGeneral = 0;
	
				/*
				  Se primero se valida que a nivel cliente no tenga ua cuota, si se tiene
				  se obtiene el valor para hacer los calculo, en caso de que no tenga se pasa 
				  al siguiente nuevel
				*/
				if($("#Cuota_CL_ROT").val() != "" && $("#Cuota_CL_ROT").val() != null){
	
					CuotaROTGeneral = $("#Cuota_CL_ROT").val();
				}
				/*
				  En casp de que el cliente no tenga cuoa se busca a nivel mercancia
				*/
				else if ($("#TB_ROT").val() != "" && $("#TB_ROT").val() != null){
					
					CuotaROTGeneral = $("#TB_ROT").val();
	
				}
				/*
				  En caso de que 
				*/
				else if ($("#TB_ObjCuotaRot").val() != "" && $("#TB_ObjCuotaRot").val() != null){
	
					CuotaROTGeneral = $("#TB_ObjCuotaRot").val();
				}else{
	
					CuotaROTGeneral = 0;
				}
	
	
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				valor1 = 0;  
				valor2 = 0;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = 0;
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  CuotaROTGeneral/100 + (CuotaContenedor/100 * suma);
					//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
	
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = CuotaROTGeneral;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC = ValorEmbarqueTotal *  CuotaROTGeneral/100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
	
				if(primanetaagente<PrimaMinima){
	
					//var numb= 212421434.533423131231;
					//var rounded = Math.round((PrimaMinima + Number.EPSILON) * 100) / 100;
					//console.log(rounded);
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
	
					//var rounded = Math.round((primanetaagente + Number.EPSILON) * 100) / 100;
					//console.log(rounded);
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				
				//var roundeded = Math.round((DerechoCertificado + Number.EPSILON) * 100) / 100;
				//console.log(roundeded);
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  =  parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
	
			}else if (AmparaContenedor == "Si"){
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;  
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				if(document.getElementById("TB_SumaSolicitada1").value == ''){
					valor1 = 0
				}else{
					valor1 =  document.getElementById("TB_SumaSolicitada1").value
				}
				if(document.getElementById("TB_SumaSolicitada2").value == ''){
					valor2 = 0
				}else{
					valor2 =  document.getElementById("TB_SumaSolicitada2").value
				}
	
				/*
				   primero se valida que a nivel cliente no tenga ua cuota, si se tiene
				  se obtiene el valor para hacer los calculo, en caso de que no tenga se pasa 
				  al siguiente nuevel
				*/
				if($("#Cuota_CL_ROT").val() != "" && $("#Cuota_CL_ROT").val() != null){
	
					CuotaROTGeneral = $("#Cuota_CL_ROT").val();
				}
				/*
				  En casp de que el cliente no tenga cuoa se busca a nivel mercancia
				*/
				else if ($("#TB_ROT").val() != "" && $("#TB_ROT").val() != null){
					
					CuotaROTGeneral = $("#TB_ROT").val();
	
				}
				/*
				  En caso de que 
				*/
				else if ($("#TB_ObjCuotaRot").val() != "" && $("#TB_ObjCuotaRot").val() != null){
	
					CuotaROTGeneral = $("#TB_ObjCuotaRot").val();
				}else{
	
					CuotaROTGeneral = 0;
				}
				//alert(valor1);
				//alert(valor2);
				//valor2 = document.getElementById("TB_SumaSolicitada2").value;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = $("#TB_ObjCuotaContenedor").val();
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
	
				
	
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  CuotaROTGeneral/100 + (CuotaContenedor/100 * suma);
				//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
				//Se obtiene el iva del resultado de la suma anterior
				//iva = (monto * tasa)/100;
				//console.log(CuotaROTGeneral);
				//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = CuotaROTGeneral;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC =  ValorEmbarqueTotal *  CuotaROTGeneral/100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
				
				//prima neta contenedeor
				GranPNCNT = (CuotaContenedor/100 * suma);
				document.getElementById("TB_PMCTND").value = GranPNCNT.toFixed(2);
				//prima neta agente
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
			}
	
		}
	}
	else if($(this).val() == "ROT Y ROBO" && $("#EMAYOR").val() == "SI"){

		
		//Se valida el tipo de giro que sea diferente a perecedero y carrotanque para poner en los deducibles que corresponda 
		// de la mercancia que no corresponda a a esos giros
		if($("#TB_Giro").val() != "PERECEDEROS" && $("#TB_Giro").val() != "CARRO TANQUE"){
			document.getElementById("TB_Deducible").value  = "R.O.T 3% Sobre el valor total del embarque para toda y cada perdida."
		}

		document.getElementById("TB_CoberturaMercancia").value  = "Riesgos Ordinarios de Transito - Robo Total.";

		if($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() != "No" &&  $("#TB_SumaSolicitada2").val() == ""){

			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				$("#TB_SumaSolicitada2").addClass("is-invalid");
				 return;
			 });
		}else if ($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() == "No" ){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				 return;
			 });
		
		}else{

			$("#TB_SumaSolicitada1").removeClass("is-invalid");
			$("#TB_SumaSolicitada2").removeClass("is-invalid");


			if(AmparaContenedor == "No"){
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;  
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				valor1 = 0;  
				valor2 = 0;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = 0;
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  0.28/100 + (CuotaContenedor/100 * suma);
					//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
	
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = 0.28;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC = ValorEmbarqueTotal *  0.28/100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
	
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
	
			}else if (AmparaContenedor == "Si"){
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;  
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				if(document.getElementById("TB_SumaSolicitada1").value == ''){
					valor1 = 0
				}else{
					valor1 =  document.getElementById("TB_SumaSolicitada1").value
				}
				if(document.getElementById("TB_SumaSolicitada2").value == ''){
					valor2 = 0
				}else{
					valor2 =  document.getElementById("TB_SumaSolicitada2").value
				}
	
				//alert(valor1);
				//alert(valor2);
				//valor2 = document.getElementById("TB_SumaSolicitada2").value;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = $("#TB_ObjCuotaContenedor").val();
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
	
				
	
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  0.28/100 + (CuotaContenedor/100 * suma);
				//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
				//Se obtiene el iva del resultado de la suma anterior
				//iva = (monto * tasa)/100;
	
				//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = 0.28;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC =  ValorEmbarqueTotal *  0.28/100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
				
				//prima neta contenedeor
				GranPNCNT = (CuotaContenedor/100 * suma);
				document.getElementById("TB_PMCTND").value = GranPNCNT.toFixed(2);
				//prima neta agente
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
			}
		}
	}else if($(this).val() == "TODO RIESGO"){

		
		//Se valida el tipo de giro que sea diferente a perecedero y carrotanque para poner en los deducibles que corresponda 
		// de la mercancia que no corresponda a a esos giros
		if($("#TB_Giro").val() != "PERECEDEROS" && $("#TB_Giro").val() != "CARRO TANQUE"){
			document.getElementById("TB_Deducible").value  = "R.O.T 3% \n Robo 10% \n Otro 5% \n Sobre el valor total del embarque para toda y cada perdida."
		}
		
		//Se asigna el riesgo cubierto segun el tipo de cobertura seleccionado
		document.getElementById("TB_CoberturaMercancia").value  = "Riesgos Ordinarios de Transito - Robo Total - Robo parcial  -  Mojadura  -  Manchas  -  Oxidación  - Contaminación  -  Rotura  -  Derrame  -  Bodega a Bodega  - Maniobras de Carga y Descarga  -  Huelgas y Alborotos Populares.";
	
		if($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() != "No" &&  $("#TB_SumaSolicitada2").val() == ""){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				$("#TB_SumaSolicitada2").addClass("is-invalid");
				 return;
			 });
		}else if ($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() == "No" ){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				 return;
			 });
		
		}else{
	
			$("#TB_SumaSolicitada1").removeClass("is-invalid");
			$("#TB_SumaSolicitada2").removeClass("is-invalid");
	
			if(AmparaContenedor == "No"){
		
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa; 
				//Se declara la varia para obtener la cuota rot
				var CuotaTRGeneral = 0;
	
				/*
					Se primero se valida que a nivel cliente no tenga ua cuota, si se tiene
					se obtiene el valor para hacer los calculo, en caso de que no tenga se pasa 
					al siguiente nuevel
				*/
				/* if($("#Cuota_CL_TR").val() != "" && $("#Cuota_CL_TR").val() != null){
	
					CuotaTRGeneral = $("#Cuota_CL_TR").val();
				} */
				/*
					En casp de que el cliente no tenga cuoa se busca a nivel mercancia
				*/
				/* else if ($("#TB_Robo").val() != "" && $("#TB_Robo").val() != null){
					
					CuotaTRGeneral = $("#TB_Robo").val();
	
				} */
				/*
					En caso de que 
				*/
				//else if ($("#TB_ObjCuotaTR").val() != "" && $("#TB_ObjCuotaTR").val() != null){
	
					CuotaTRGeneral = $("#TB_ObjCuotaTR").val();
				//}else{
	
					//CuotaTRGeneral = 0;
				//} 
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				valor1 = 0;  
				valor2 = 0;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = 0;
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  CuotaTRGeneral/100 + (CuotaContenedor/100 * suma);
					//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
		
				 //en el campo de cuota mercancia  esto servira para calcular lo demas.
				 document.getElementById("TB_CMCIA").value = CuotaTRGeneral;
				 //Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				 GranPNC = ValorEmbarqueTotal *  CuotaTRGeneral/100;
				 document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
		
				//prima neta agente
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
	
			}else if (AmparaContenedor == "Si"){
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;  
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				if(document.getElementById("TB_SumaSolicitada1").value == ''){
					valor1 = 0
				}else{
					valor1 =  document.getElementById("TB_SumaSolicitada1").value
				}
				if(document.getElementById("TB_SumaSolicitada2").value == ''){
					valor2 = 0
				}else{
					valor2 =  document.getElementById("TB_SumaSolicitada2").value
				}
	
				//alert(valor1);
				//alert(valor2);
				//valor2 = document.getElementById("TB_SumaSolicitada2").value;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = $("#TB_ObjCuotaContenedor").val();
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
	
				
	
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal * CuotaTRGeneral/100 + (CuotaContenedor/100 * suma);
				//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
				//Se obtiene el iva del resultado de la suma anterior
				//iva = (monto * tasa)/100;
	
				//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = CuotaTRGeneral;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC = ValorEmbarqueTotal *  CuotaTRGeneral/100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
				
				//prima neta contenedeor
				GranPNCNT = (CuotaContenedor/100 * suma);
				document.getElementById("TB_PMCTND").value = GranPNCNT.toFixed(2);
				//prima neta agente
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
			}
		}
	
	}
	else if ($(this).val() == "TODO RIESGO Y VT"){
	
		
		//Se asigna el riesgo cubierto segun el tipo de cobertura seleccionado
		document.getElementById("TB_CoberturaMercancia").value  = "Riesgos Ordinarios de Transito - Robo Total - Robo parcial  -  Mojadura  -  Manchas  -  Oxidación  - Contaminación  -  Rotura  -  Derrame  -  Bodega a Bodega  - Maniobras de Carga y Descarga  -  Huelgas y Alborotos Populares - Cláusula de Productos Refrigerados.";
	
		//Se valida el tipo de giro que sea diferente a perecedero y carrotanque para poner en los deducibles que corresponda 
		// de la mercancia que no corresponda a a esos giros
		if($("#TB_Giro").val() != "PERECEDEROS" && $("#TB_Giro").val() != "CARRO TANQUE"){
			document.getElementById("TB_Deducible").value  = "R.O.T 3% \n Robo 10% \n Otro 5% \n Sobre el valor total del embarque para toda y cada perdida."
		}
	
		if($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() != "No" &&  $("#TB_SumaSolicitada2").val() == ""){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				$("#TB_SumaSolicitada2").addClass("is-invalid");
				 return;
			 });
		}else if ($("#nuevoTipoContenedor1").val() != "No" &&  $("#TB_SumaSolicitada1").val() == "" && $("#nuevoTipoContenedor2").val() == "No" ){
	
			Swal.fire({
				title: 'Favor de Ingresar Suma Asegurada del Contenedor',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }).then(()=>{
				$("#TB_SumaSolicitada1").addClass("is-invalid");
				 return;
			 });
		
		}else{
	
			$("#TB_SumaSolicitada1").removeClass("is-invalid");
			$("#TB_SumaSolicitada2").removeClass("is-invalid");
	
			if(AmparaContenedor == "No"){
		
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;
				//Se declara la varia para obtener la cuota rot
					var CuotaVTGeneral = 0;
		
					/*
						Se primero se valida que a nivel cliente no tenga ua cuota, si se tiene
						se obtiene el valor para hacer los calculo, en caso de que no tenga se pasa 
						al siguiente nuevel
					*/
					if($("#Cuota_CL_VT").val() != "" && $("#Cuota_CL_VT").val() != null){
		
						CuotaVTGeneral = $("#Cuota_CL_VT").val();
					}
					/*
						En casp de que el cliente no tenga cuoa se busca a nivel mercancia
					*/
					else if ($("#TB_VT").val() != "" && $("#TB_VT").val() != null){
						
						CuotaVTGeneral = $("#TB_VT").val();
		
					}
					/*
						En caso de que 
					*/
					else if ($("#TB_ObjCuotaBasica").val() != "" && $("#TB_ObjCuotaBasica").val() != null){
		
						CuotaVTGeneral = $("#TB_ObjCuotaBasica").val();
					}else{
		
						CuotaVTGeneral = 0;
					}
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				valor1 = 0;  
				valor2 = 0;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = 0;
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  CuotaVTGeneral/100 + (CuotaContenedor/100 * suma);
					//Se obtiene el total de la suma de prima agente + derechi de certicado
	
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
				
		
				 //en el campo de cuota mercancia  esto servira para calcular lo demas.
				 document.getElementById("TB_CMCIA").value = CuotaVTGeneral;
				 //Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				 GranPNC = ValorEmbarqueTotal *  CuotaVTGeneral/100;
				 document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
		
				//prima neta agente
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = parseFloat(PrimaMinima).toFixed(2);
				}else{
					document.getElementById("TB_PMAGT").value = parseFloat(primanetaagente).toFixed(2);
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = parseFloat(DerechoCertificado).toFixed(2);
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
	
			}else if (AmparaContenedor == "Si"){
				//Se declaran las variables
				var valor1,valor2,suma, CuotaContenedor, primanetaagente, iva, tasa;  
				//se poner el de iva que se usara para el calculo del iva
				tasa = 16;
				//Se obtiene el valor de contenedor 1 y contendedor 2
				if(document.getElementById("TB_SumaSolicitada1").value == ''){
					valor1 = 0
				}else{
					valor1 =  document.getElementById("TB_SumaSolicitada1").value
				}
				if(document.getElementById("TB_SumaSolicitada2").value == ''){
					valor2 = 0
				}else{
					valor2 =  document.getElementById("TB_SumaSolicitada2").value
				}
	
				//alert(valor1);
				//alert(valor2);
				//valor2 = document.getElementById("TB_SumaSolicitada2").value;
				//Se obtiene  el porcenaje de la cuota de contenedor  
				CuotaContenedor = $("#TB_ObjCuotaContenedor").val();
				//Se realizar la suma del valor contenedor 1 y 2
				suma=parseFloat(valor1)+parseFloat(valor2);
	
				
	
				//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
				primanetaagente = ValorEmbarqueTotal *  CuotaVTGeneral/100 + (CuotaContenedor/100 * suma);
				//Se obtiene el total de la suma de prima agente + derechi de certicado
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				//	document.getElementById("TB_PMAGT").value = PrimaMinima;
					monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
				}else{
					monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
				}
				//Se obtiene el iva del resultado de la suma anterior
				//iva = (monto * tasa)/100;
	
				//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
				//en el campo de cuota mercancia  esto servira para calcular lo demas.
				document.getElementById("TB_CMCIA").value = CuotaVTGeneral;
				//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
				GranPNC = ValorEmbarqueTotal *  CuotaVTGeneral/100;
				document.getElementById("TB_PNTA").value = GranPNC.toFixed(2);
				
				//prima neta contenedeor
				GranPNCNT = (CuotaContenedor/100 * suma);
				document.getElementById("TB_PMCTND").value = GranPNCNT.toFixed(2);
				//prima neta agente
				if(primanetaagente<PrimaMinima){
					//prima neta agente
				 document.getElementById("TB_PMAGT").value = PrimaMinima;
				}else{
					document.getElementById("TB_PMAGT").value = primanetaagente;
				}
				//document.getElementById("TB_PMAGT").value = primanetaagente;
				//Se ingresa el valor de derecho de certificado
				document.getElementById("TB_DCRT").value  = DerechoCertificado;
				//iva
				GranIVA = (monto * tasa)/100;
				document.getElementById("TB_IVA").value = GranIVA.toFixed(2);
				//prima total a pagar con iva
				GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
				document.getElementById("TB_IVATOTAL").value = GranTotal.toFixed(2);
			}
		}	
	}
	
});

//Funcion del control de la suma asegurada 1
$( "#TB_SumaSolicitada1" ).blur(function() {

	if($(this).val() != ''){

		if($(this).val() > $("#TB_Valor1").val().replace(/,/g, "").substring(0,6)){
			Swal.fire({
				title: 'La suma asegurada del contenedor no puede ser mayor al valor maximo.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  })
		}
	}

});
//Funcion del control de la suma asegurada2
$( "#TB_SumaSolicitada2" ).blur(function() {

	if($(this).val() != ''){

		if($(this).val() > $("#TB_Valor2").val().replace(/,/g, "").substring(0,6)){
			Swal.fire({
				title: 'La suma asegurada del contenedor no puede ser mayor al valor maximo.',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  })
		}
	}

});

//Funcion que sirve en el control de Cuota del usuario que registra manualmente y se calcula
$( "#PNETA" ).blur(function() {

	var primantaapar = $("#TB_IVATOTAL").val();
	var contenedor1,contenedor2,totalcontenedor, CuotaContenedorA, primanetaagente, iva, tasa;  

	var PNTA =  $(this).val();
	var ValorEmbarquetotal = $("#TB_ValorEmbarque").val(); //Valor que ingresa el usuario
	//se poner el de iva que se usara para el calculo del iva
	var PrimaMinima = $("#TB_ObjPrimaminima").val();
	var DerechoCertificado = $("#TB_ObjDerechoCertificado").val();
	tasa = 16;
	//Se obtiene el valor de contenedor 1 y contendedor 2
	if(document.getElementById("TB_SumaSolicitada1").value == ''){
		contenedor1 = 0
	}else{
		contenedor1 =  document.getElementById("TB_SumaSolicitada1").value
	}
	if(document.getElementById("TB_SumaSolicitada2").value == ''){
		contenedor2 = 0
	}else{
		contenedor2 =  document.getElementById("TB_SumaSolicitada2").value
	}

	//alert(valor1);
	//alert(valor2);
	//valor2 = document.getElementById("TB_SumaSolicitada2").value;
	//Se obtiene  el porcenaje de la cuota de contenedor  
	CuotaContenedorA = $("#TB_ObjCuotaContenedor").val();
	//Se realizar la suma del valor contenedor 1 y 2
	totalcontenedor=parseFloat(contenedor1)+parseFloat(contenedor2);

	

	//Se calucula la prima neta agente = varlor embaque * porcentaje de cuota rot + el porcentaje de cuotacontendor * el resulñtaod de la suma d valor 1 y 2
	primanetaagente = ValorEmbarquetotal *  PNTA/100 + (CuotaContenedorA/100 * totalcontenedor);
	//Se obtiene el total de la suma de prima agente + derechi de certicado
	if(primanetaagente<PrimaMinima){
		//prima neta agente
	//	document.getElementById("TB_PMAGT").value = PrimaMinima;
		monto= parseFloat(PrimaMinima) + parseFloat(DerechoCertificado);
	}else{
		monto= parseFloat(primanetaagente) + parseFloat(DerechoCertificado);
	}
	//Se obtiene el iva del resultado de la suma anterior
	//iva = (monto * tasa)/100;

	//En caso de que si sea continuacion de viaje se obtiene el valor de CuotaRot y se pone 
	//en el campo de cuota mercancia  esto servira para calcular lo demas.
//	document.getElementById("TB_CMCIA").value = $("#TB_ObjCuotaBasica").val();
	//Si no es mayor la primaneta se calcula el valor de embarque por el valor de cuota rot / 100
	GranPNC = ValorEmbarquetotal *  PNTA/100;
	document.getElementById("TB_PNTAT").value = GranPNC.toFixed(2);
	
	//prima neta contenedeor
	GranPNCNT = (CuotaContenedorA/100 * totalcontenedor);
	document.getElementById("TB_PMCTNDT").value = GranPNCNT.toFixed(2);
	//prima neta agente
	if(primanetaagente<PrimaMinima){
		//prima neta agente
	 document.getElementById("TB_PMAGTT").value = parseFloat(PrimaMinima).toFixed(2);
	}else{
		document.getElementById("TB_PMAGTT").value = parseFloat(primanetaagente).toFixed(2) ;
	}
	//document.getElementById("TB_PMAGT").value = primanetaagente;
	//Se ingresa el valor de derecho de certificado
	document.getElementById("TB_DCRTT").value  = parseFloat(DerechoCertificado).toFixed(2);
	//iva
	GranIVA = (monto * tasa)/100;
	document.getElementById("IVA").value = GranIVA.toFixed(2);
	//prima total a pagar con iva
	GranTotal = parseFloat(monto)+ parseFloat((monto * tasa)/100);
	document.getElementById("TOTAL").value = GranTotal.toFixed(2);
	
	 if(GranTotal < primantaapar){

		Swal.fire({
			title: 'La prima neta es menor a la prima APAR.',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }).then(()=>{
			document.getElementById("TB_DCRTT").value = "";
			document.getElementById("TB_PMAGTT").value = "";
			document.getElementById("TB_PMAGTT").value = "";
			document.getElementById("TB_PMCTNDT").value = "";
			document.getElementById("TB_PNTAT").value = "";
			document.getElementById("IVA").value = "";
			document.getElementById("TOTAL").value = "";
			return;
		});	

	}else{
		//document.getElementById("IVA").value = iva;
		//document.getElementById("TOTAL").value = TotalPrimaNeta.toFixed(2);
	} 

	
	// tu codigo ajax va dentro de esta function...
  });
/* $(document).ready(function () {
    setInterval(function () {
        $("#DV_FechaHora").load();
    }, 1000);
}); */
var form_count = 1, previous_form, next_form, total_forms;
	total_forms = $("fieldset").length;
	
	$(".next-formcertificado").click(function(){
		
	/* 	if($("#nuevoNombre").val() == '' ){
			Swal.fire("Error ", "Favor de Ingresar el Nombre", "error");
			return;
		}else if($("#txtPassword").val() == ''){
		Swal.fire("Error ", "Favor de Ingresar Password", "error");
			return;
		}else if($("#nuevoEmail").val() == ''){
			Swal.fire("Error ", "Favor de Ingresar Email", "error");
				return;
		}else if(document.getElementById("nuevoPerfil").value == ''){
			Swal.fire("Error ", "Favor de Seleccionar el Perfil de Usuario", "error");
			return;
		}else{ */
			previous_form = $(this).parent();
			next_form = $(this).parent().next();
			next_form.show();
			previous_form.hide();
			setProgressBarValue(++form_count);
		//}
	});

	$(".previous-formcertificado").click(function(){
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

	//Evento que sirve para la generacion del pdf de la cotizacion
	function impresionCotizacionPDF(){

		//alert($("#TB_Deducible").val());

		//console.log($( "#nuevoAsociado option:selected" ).text());
		var cliente = $( "#nuevoCliente option:selected" ).text();
		var mercancia = $( "#TB_DescripcionMercancia").val();
		var mediotransporte = $( "#MTPT option:selected" ).text();
		var tipodebien = $( "#nuevoBienesDesperdicios option:selected" ).text();
		var cv = $( "#nuevoCVJ option:selected" ).text();
		var cobertura = $( "#nuevoCBM option:selected" ).text();
		var deducibles = $("#TB_Deducible").val();
		var deduciblescontendor = $("#TB_CuotaContenedor").val();
		var coberturamercancia = $("#TB_CoberturaMercancia").val();
		var coberturacontenedor = $("#TB_CoberturaContenedor").val();
		var importetotal = $("#TOTAL").val();
		var FechaHora=$("#DT_FechaHora").val();
		var Valorembarque = $("#TB_ValorEmbarque").val();
		var rfc = $("#rfc").val();
		var ProtocoloDescripcion = $("#TB_DescripcionProtocolo").val();
		var origenembarque=$( "#TB_PaisOrigen option:selected" ).text();
		var desde = $("#TB_MunicipioOrigenCobertura").val() + ", " + $("#TB_EstadoOrigenCobertura").val() + ", " +  $( "#TB_PaisOrigen option:selected" ).text();
		var hasta = $("#TB_MunicipioDestinoCobertura").val() + ", " + $("#TB_EstadoDestinoCobertura").val() + ", " + $( "#TB_PaisDestinoCobertura option:selected" ).text();//$("#TB_PaisDestinoCobertura").val();
		
		//var desde = $("#TB_OrigenCobertura").val()+", " + $("#TB_MunicipioOrigenCobertura").val() + ", " + $("#TB_EstadoOrigenCobertura").val();
		//var hasta = $("#TB_MunicipioDestinoCobertura").val() + ", " + $("#TB_EstadoDestinoCobertura").val() + ", " + $("#TB_PaisDestinoCobertura").val();
		
		//Se Manda a llamar la funcion de venta para mandar los parametro y generar el pdf
		VentanaCentrada('vistas/pdf/documentos/cotizacion_pdf.php?cliente='+cliente+'&mercancia='+mercancia+'&mediotransporte='+mediotransporte+'&tipodebien='+tipodebien+'&cv='+cv+'&cobertura='+cobertura+'&valorembarque='+Valorembarque+'&rfc='+rfc+'&origenembarque='+origenembarque+'&desde='+desde+'&hasta='+hasta+'&importetotal='+importetotal+'&deducibles='+deducibles+'&FechaHora='+FechaHora+'&deduciblescontendor='+deduciblescontendor+'&coberturamercancia='+coberturamercancia+'&coberturacontenedor='+coberturacontenedor+'&ProtocoloDescripcion='+ProtocoloDescripcion, 'cotizacion','','1024','768','true');
	} 
	//Evento que sirve para la generacion del pdf de la cotizacion
	function impresionCertificadoPDF(folio, id){

		//alert($("#TB_OrigenCobertura option:selected" ).text());

		var asosiado = $( "#nuevoAsociado option:selected" ).text();
		var cliente = $( "#nuevoCliente option:selected" ).text();
		var mercancia = $( "#TB_DescripcionMercancia" ).val();
		var valormercancia1 = $("#valormercancia1").val(); 
		var valormercancia2 = $("#valormercancia2").val(); 
		var mediotransporte = $( "#MTPT option:selected" ).text();
		var dobleremolque = $( "#nuevoRemolque option:selected" ).text();
		var amparacontenedor = $( "#nuevoContenedor option:selected" ).text();
		var tipocontenedor1 = $( "#nuevoTipoContenedor1 option:selected" ).text();
		var tipocontenedor2 = $( "#nuevoTipoContenedor2 option:selected" ).text();
		var tipodebien = $( "#nuevoBienesDesperdicios option:selected" ).text();
		var TipoSeguro = $( "#Cmbx_VAPSG option:selected" ).text();
		var Sumasolicitadaprimero = $("#TB_SumaSolicitada1").val();
		var Sumasolicitadasegundo = $("#TB_SumaSolicitada2").val();
		var TipoEmpaque = $("#nuevoTipoEmpaque").val();
		var cv = $( "#nuevoCVJ option:selected" ).text();
		var cobertura = $( "#nuevoCBM option:selected" ).text()
		var primaneta = $("#PNETA").val();
		var iva = $("#IVA").val();
		var total = $("#TOTAL").val();
		var Valorembarque = $("#TB_ValorEmbarque").val();
		var rfc = $("#rfc").val();
		var direccion = $("#direccion").val();
		var email = $("#email").val();
		var idcontenedor1 = $("#contenedor1").val();
		var idcontenedor2 = $("#contenedor2").val();//idcontenedor1 ,idcontenedor1
		var fechacobertura= $("#dt").val();
		var horacobertura=$("#time").val();
		var FechaHora=$("#DT_FechaHora").val();
		var paiscobertura= $( "#TB_PaisOrigen option:selected" ).text();//$("#TB_PaisOrigen").val();
		var nuevoTipoEmbarque=$("#nuevoTipoEmbarque").val();
		var nuevoLNTRP = $("#TB_NLITPTA").val();
		var nuevoNbLNTRP = $("#nuevoNbLNTRP").val();
		var nuevoTipoVehiculo = $("#nuevoTipoVehiculo").val(); //TB_OrigenCobertura
		var OrigenCobertura = $("#TB_MunicipioOrigenCobertura").val() + ", " + $("#TB_EstadoOrigenCobertura").val() + ", " +  $( "#TB_PaisOrigen option:selected" ).text();
		var DestinoCobertura = $("#TB_MunicipioDestinoCobertura").val() + ", " + $("#TB_EstadoDestinoCobertura").val() + ", " + $( "#TB_PaisDestinoCobertura option:selected" ).text();//$("#TB_PaisDestinoCobertura").val();
		var marca = $("#TB_Marca").val();
		var motor = $("#TB_Motor").val();
		var nombrechofer = $("#TB_NombreChofer").val();
		var ProtocoloDescripcion = $("#TB_DescripcionProtocolo").val();
		var numeroplacas = $("#TB_Placas").val();
		var modelo = $("#TB_Modelo").val();
		var serie = $("#TB_Serie").val();
		var color = $("#TB_Color").val();
		var ObservacionGnral = $("#TB_ObservacionGnral").val();
		var NumeroGuia = $("#TB_NumeroGuia").val();
		var EmailAsociado = $("#TB_EmailAsociado").val();
		var deducibles = $("#TB_Deducible").val();
		var deduciblescontenedor = $("#TB_CuotaContenedor").val();
		var coberturamercancia = $("#TB_CoberturaMercancia").val();
		var coberturacontenedor = $("#TB_CoberturaContenedor").val();
		var ImagenAsociado = $("#TB_ImagenAsociado").val().substring(7);

		var _Id = id;
		var _Folio = folio;
		
		
		//Funcion que manda a llamar la ventana para generar el pdf
	 	 VentanaCentrada('vistas/pdf/documentos/certificado_pdf.php?asociado='+asosiado+'&cliente='+cliente+'&mercancia='+mercancia+'&mediotransporte='+mediotransporte+'&dobleremolque='+dobleremolque+'&amparacontenedor='+amparacontenedor+'&tipocontenedor1='+tipocontenedor1+'&tipocontenedor2='+tipocontenedor2+'&tipodebien='+tipodebien+'&cv='+cv+'&cobertura='+cobertura+'&primaneta='+primaneta+'&iva='+iva+'&total='+total+'&valorembarque='+Valorembarque+'&rfc='+rfc+'&email='+email+'&direccion='+direccion+'&idcontenedor1='+idcontenedor1+'&idcontenedor2='+idcontenedor2+'&fechacobertura='+fechacobertura+'&horacobertura='+horacobertura+'&OrigenCobertura='+OrigenCobertura+'&paiscobertura='+paiscobertura+'&DestinoCobertura='+DestinoCobertura+'&nuevoTipoEmbarque='+nuevoTipoEmbarque+'&nuevoLNTRP='+nuevoLNTRP+'&nuevoTipoVehiculo='+nuevoTipoVehiculo+'&nuevoNbLNTRP='+nuevoNbLNTRP+'&marca='+marca+'&motor='+motor+'&nombrechofer='+nombrechofer+'&ProtocoloDescripcion='+ProtocoloDescripcion+'&numeroplacas='+numeroplacas+'&modelo='+modelo+'&serie='+serie+'&color='+color+'&ObservacionGnral='+ObservacionGnral+'&NumeroGuia='+NumeroGuia+'&_Id='+_Id+'&_Folio='+_Folio+'&EmailAsociado='+EmailAsociado+'&ImagenAsociado='+ImagenAsociado+'&FechaHora='+FechaHora+'&valormercancia2='+valormercancia2+'&valormercancia1='+valormercancia1+'&TipoEmpaque='+TipoEmpaque+'&Sumasolicitadaprimero='+Sumasolicitadaprimero+'&Sumasolicitadasegundo='+Sumasolicitadasegundo+'&deduciblescontenedor='+deduciblescontenedor+'&deducibles='+deducibles+'&coberturamercancia='+coberturamercancia+'&coberturacontenedor='+coberturacontenedor+'&TipoSeguro='+TipoSeguro, 'certificado','','1024','768','true');
	}
	
	//Funcion para mandar a imprimir el recibo de cobro
	function impresionReciboCobro(){


		//console.log($( "#nuevoAsociado option:selected" ).text());
		var cliente = $( "#nuevoCliente option:selected" ).text();
		var mercancia = $( "#nuevoMercancia option:selected" ).text();
		var primaneta = $("#PNETA").val();
		var iva = $("#IVA").val();
		var total = $("#TOTAL").val();
		var Valorembarque = $("#TB_ValorEmbarque").val();
		var rfc = $("#rfc").val();
		var direccion = $("#direccion").val();
		var fechacobertura= $("#dt").val();
		var horacobertura=$("#time").val();
		
		//Se Manda a llamar la funcion de venta para mandar los parametro y generar el pdf
		VentanaCentrada('vistas/pdf/documentos/recibocobro_pdf.php?cliente='+cliente+'&mercancia='+mercancia+'&primaneta='+primaneta+'&iva='+iva+'&total='+total+'&valorembarque='+Valorembarque, 'recibocobro','','1024','768','true');
	}
 
	   //Funciona que se manda a llamar cuando se mandar a generar el pdf para 
	   function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
		if(window.screen)if(isCenter)if(isCenter=="true"){
		  var myLeft = (screen.width-myWidth)/2;
		  var myTop = (screen.height-myHeight)/2;
		  features+=(features!='')?',':'';
		  features+=',left='+myLeft+',top='+myTop;
		}
		window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
	  }

	  //Funcion que sirve para obtener el Protocolo segun el monto del valor total del embarque
	  function ObtenerProtocolo(protocolo){
		
		var idProtocolo = protocolo;
		
		var datos = new FormData();
		datos.append("idProtocolo", idProtocolo);

			$.ajax({

				url:"ajax/protocolo.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){
				//console.log(respuesta["Descripcion"]);
					
				//alert(respuesta["Descripcion"]);
				$("#TB_DescripcionProtocolo").val(respuesta["Titulo"] + " - " + respuesta["Descripcion"]);
				$("#TB_DescripcionGPS").val(respuesta["Titulo"] + " - " + respuesta["Descripcion"]);
				}
			});
	  }

	  //no se usa
	  function imprimirCotizacion(){
		// OBTENEMOS LOS VALORES DE LOS CAMPOS DEL FORM
		var asosiado = $( "#nuevoAsociado option:selected" ).text();
		var cliente = $( "#nuevoCliente option:selected" ).text();
		var mercancia = $( "#nuevoMercancia option:selected" ).text();
		var mediotransporte = $( "#MTPT option:selected" ).text();
		var dobleremolque = $( "#nuevoRemolque option:selected" ).text();
		var amparacontenedor = $( "#nuevoContenedor option:selected" ).text();
		var tipocontenedor1 = $( "#nuevoTipoContenedor1 option:selected" ).text();
		var tipocontenedor2 = $( "#nuevoTipoContenedor2 option:selected" ).text();
		var tipodebien = $( "#nuevoBienesDesperdicios option:selected" ).text();
		var cv = $( "#nuevoCVJ option:selected" ).text();
		var cobertura = $( "#nuevoCBM option:selected" ).text()
		var primaneta = $("#PNETA").val();
		var iva = $("#IVA").val();
		var total = $("#TOTAL").val();
		var Valorembarque = $("#TB_ValorEmbarque").val();
		
		window.location.href  = 'vistas/modulos/cotizacion_imp.php?asociado='+asosiado+'&cliente='+cliente+'&mercancia='+mercancia+'&mediotransporte='+mediotransporte+'&dobleremolque='+dobleremolque+'&amparacontenedor='+amparacontenedor+'&tipocontenedor1='+tipocontenedor1+'&tipocontenedor2='+tipocontenedor2+'&tipodebien='+tipodebien+'&cv='+cv+'&cobertura='+cobertura+'&primaneta='+primaneta+'&iva='+iva+'&total='+total+'&valorembarque='+Valorembarque+'';
		// luego que tenemos las variables listas
		// enviamos por medio de get a la vista cotizacion_imp
	  }

	  //no se usa
	  function btnImprimirCt(){
		//console.log("entro");
		$("div#imprimibleCt").printArea();
	  }

	  //Create PDf from HTML...Funcion que no uso
	function getPDF(){

		var HTML_Width = $(".canvas_div_pdf").width();
		var HTML_Height = $(".canvas_div_pdf").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width+(top_left_margin*2);
		var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;
		
		var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
		

		html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
			canvas.getContext('2d');
			
			//console.log(canvas.height+"  "+canvas.width);
			
			
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
		    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
			
			
			for (var i = 1; i <= totalPDFPages; i++) { 
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}
			
		    pdf.save("cotizacion.pdf");
        });
	};


	///Funcion que mandar Grabar la informacion del certificado a la base de datos y que una vez geuardado correctamene muestra el pdf
	$('#datos_certificado').submit(function(e){
		e.preventDefault();
		
	var de = $("#TB_Giro").val();
		console.log(de);
		var aso = "hola"
		if(aso.length == ''){
			Swal.fire({
				type:'warning',
				title:'Favor de Seleccionar Asociado',
			});
			return false;
		
	}else if ($("#TB_NumeroGuia").val().length == 0){

		Swal.fire({
			title:'Favor de Ingresar el Numero de Guia',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }); 
		
		return false;
	}else if($("#nuevoTipoEmbarque").val() == "No"){

		Swal.fire({
			title:'Favor de Seleccionar Embarque',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }); 
		
		return false;
	}else if($("#nuevoTipoEmpaque").val() == ""){
		Swal.fire({
			title:'Favor de Seleccionar Tipo de Empaque',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }); 
		
		return false;
	}else if($("#nuevoTLER").val() == ""){
		Swal.fire({
			title:'Favor de Seleccionar el Tipo de Traslado',
			width: 600,
			padding: '3em',
			background: '#fff',
			backdrop: `
			  rgba(0,0,123,0.4)
			  left top
			  no-repeat
			`
		  }); 
		
		return false;
	}
	else{
		Swal.fire({
				title: "Estar Seguro de Generar la Cotizacion",
				type: 'info',
				showCancelButton: true,
				confirmButtonClass: "btn-primary",
				confirmButtonText: "Guardar",
				closeOnConfirm: false,
				showLoaderOnConfirm: true
			}).then((result) =>{
				if(result.value){
					
					var _Folio = $("#TB_Folio").val();
					var _Fecha = $("#DT_Actual").val();
					var folio;

					var _Asosiado;
					if($("#nuevoIdAsociado").val() != null && $("#nuevoIdAsociado").val() != '' ){
						_Asosiado = $("#nuevoIdAsociado").val(); //$( "# option:selected" ).text();
					}else{
						_Asosiado = $("#nuevoAsociado").val(); //$( "# option:selected" ).text();
					}
					var _cliente = $("#nuevoCliente").val();
					var _Mercancia = $("#nuevoMercancia").val();
					var _Griro = $("#TB_Giro").val();//giro falta campo en la bd y grabar
					var _DescripcionMercancia = $("#TB_DescripcionMercancia").val();
					var _TipoEmpaque = $("#nuevoTipoEmpaque").val();
					var _TipoTraslado = $("#nuevoTLER").val(); // TipoTraslado falta en la bd 
					var _Valor_Embarque = $("#TB_ValorEmbarque").val();
					var _Medio_Transporte =  $("#MTPT").val();
					var _Tipodebien = $("#nuevoBienesDesperdicios").val();
					var _Continuacion_Viaje = $("#nuevoCVJ").val();
					var _Embarque =  $("#nuevoTipoEmbarque").val();	
					var _Doble_remolque = $("#nuevoRemolque").val();
					var _Ampara_contenedor = $("#nuevoContenedor").val();
					var _idcontenedor1 = $("#contenedor1").val();
					var _valormercancia1 = $("#valormercancia1").val();//ValorMercancia1 falta en bd
					var _idcontenedor2 = $("#contenedor2").val();
					var _valormercancia2 = $("#valormercancia2").val();//ValorMercancia2 falta en bd
					var _Tipocontenedorprimero = $("#nuevoTipoContenedor1").val();
					var _valormercanciamaximo1 = $("#TB_Valor1").val();//valormercanciamaximo1 falta en bd
					var _Sumasolicitadaprimero = $("#TB_SumaSolicitada1").val();
					var _Tipocontenedorsegundo = $("#nuevoTipoContenedor2").val();
					var _valormercanciamaximo2 = $("#TB_Valor2").val();//valormercanciamaximo2 falta en bd
					var _Sumasolicitadasegundo = $("#TB_SumaSolicitada2").val();
					var _NumeroGuia = $("#TB_NumeroGuia").val();
					var _fechacobertura= $("#dt").val();
					var _horacobertura=$("#time").val();
					var _PaisOrigenEmbarque = $("#TB_PaisOrigen").val();
					var _OrigenCobertura = $("#TB_OrigenCobertura").val();
					var _EstadoOrigenCobertura = $("#TB_EstadoOrigenCobertura").val();
					var _MunicipioOrigenCobertura = $("#TB_MunicipioOrigenCobertura").val();
					var _PaisDestinoEmbarque = $("#TB_PaisDestinoCobertura").val();
					var _EstadoDestinoEmbarque = $("#TB_EstadoDestinoCobertura").val();
					var _MunicipioDestinoEmbarque = $("#TB_MunicipioDestinoCobertura").val();
					var _TransporteAntiguedad = $("#EMAYOR").val(); //TransporteAntiguedad falta en bd
					var _TipoSeguro = $( "#Cmbx_VAPSG option:selected" ).text(); //$("#Cmbx_VAPSG").val();
					var _Descripcion_seguridad = $("#TB_DescripcionGPS").val();
					var _LineaTransportista = $("#TB_NLITPTA").val(); //$("#TB_NLITPTA").val();
					var _TipoLineaTransportista = $("#nuevoNbLNTRP").val();
					var _NombreChofer = $("#TB_NombreChofer").val();
					var _TipoVehiculo = $("#nuevoTipoVehiculo").val();// $("#nuevoTipoVehiculo").val();
					var _Marca = $("#TB_Marca").val();
					var _Modelo  = $("#TB_Modelo").val();
					var _NumeroPlacas  = $("#TB_Placas").val();
					var _NumeroMotor = $("#TB_Motor").val();
					var _NumeroSerie = $("#TB_Serie").val();
					var _Color = $("#TB_Color").val();
					var _Riesgos_cubiertos = $("#nuevoCBM").val();
					var _CuotaMercanciaApar = $("#TB_CMCIA").val();
					var _PrimaNetaMercanciaApar = $("#TB_PNTA").val();
					var _PrimaNetaContenedorApar = $("#TB_PMCTND").val();
					var _PrimaNetaTotalApar = $("#TB_PMAGT").val();
					var _DerechoCertificadoApar = $("#TB_DCRT").val();
					var _IvaApar = $("#TB_IVA").val();
					var _PrimaTotalApar = $("#TB_IVATOTAL").val();
					var _CuotaMercanciaUsuario = $("#PNETA").val();
					var _PrimaNetaMercanciaUsuario = $("#TB_PNTAT").val();
					var _PrimaNetaContenedorUsuario = $("#TB_PMCTNDT").val();
					var _PrimaNetaTotalUsuario = $("#TB_PMAGTT").val();
					var _DerechoCertificadoUsuario = $("#TB_DCRTT").val();
					var _IvaUsuario = $("#IVA").val();
					var _PrimaTotalUsuario = $("#TOTAL").val();
					var _DescripcionCondicionesTER = $("#TB_DescripcionCondicionesTER").val(); //Agregar a la bd
					var _ObservacionGnral = $("#TB_ObservacionGnral").val(); //Agregar a la bd
					var _Deducibles = $("#TB_Deducible").val();
					var _CuotaContenedor = $("#TB_CuotaContenedor").val(); // Agregar a la bd
					var _CoberturaMercancia = $("#TB_CoberturaMercancia").val(); // Agregar a la bd
					var _CoberturaContenedor = $("#TB_CoberturaContenedor").val(); // Agregar a la bd
					var _Moneda = "Pesos Mexicanos";
					var _Numero_remolque;
					
					if($("#nuevoTipoContenedor1").val() != "" && $("#nuevoTipoContenedor2").val() != ""){
						_Numero_remolque = 2;
					}else if($("#nuevoTipoContenedor1").val() != "" && $("#nuevoTipoContenedor2").val() == ""){
						_Numero_remolque = 1;
					}
					else if($("#nuevoTipoContenedor1").val() == "" && $("#nuevoTipoContenedor2").val() != ""){
						_Numero_remolque = 1;
					}

						
						//<!-- Variables de los controles para mandar en la funcion de insertar -->
					let ajax = {
						method: "new_registro",
						Asosiado: _Asosiado,
						Fecha: _Fecha,
						Folio: _Folio,
						Cliente: _cliente,
						Numero_guia: _NumeroGuia,
						Identificador_Contenedor1: _idcontenedor1,
						Identificador_Contenedor2: _idcontenedor2,
						Fecha_InicioCobertura: _fechacobertura,
						Hora_InicioCobertura: _horacobertura,
						PaisOrigenEmbarque: _PaisOrigenEmbarque, 
						OrigenCobertura : _OrigenCobertura,
						EstadoOrigenCobertura: _EstadoOrigenCobertura, 
						MunicipioOrigenCobertura : _MunicipioOrigenCobertura,
						PaisDestinoEmbarque: _PaisDestinoEmbarque,
						EstadoDestinoEmbarque: _EstadoDestinoEmbarque,
						MunicipioDestinoEmbarque:_MunicipioDestinoEmbarque,
						Medio_Transporte : _Medio_Transporte,
						Embarque : _Embarque,
						TipoLineaTransportista : _TipoLineaTransportista,
						TipoVehiculo : _TipoVehiculo,
						LineaTransportista : _LineaTransportista,
						TipoSeguro : _TipoSeguro,
						Marca : _Marca , 
						Modelo : _Modelo, 
						NumeroPlacas : _NumeroPlacas, 
						NumeroMotor : _NumeroMotor, 
						NumeroSerie : _NumeroSerie, 
						Color : _Color, 
						NombreChofer : _NombreChofer,
						Continuacion_Viaje : _Continuacion_Viaje,
						Riesgos_cubiertos : _Riesgos_cubiertos,
						Deducibles : _Deducibles,
						DescripcionMercancia : _DescripcionMercancia,
						Mercancia : _Mercancia,
						TipoEmpaque : _TipoEmpaque,
						Valor_Embarque : _Valor_Embarque,
						Moneda : _Moneda,
						Numero_remolque : _Numero_remolque,
						Descripcion_seguridad : _Descripcion_seguridad,
						Doble_remolque: _Doble_remolque,
						Ampara_contenedor : _Ampara_contenedor,
						Tipocontenedorprimero: _Tipocontenedorprimero, 
						Tipocontenedorsegundo: _Tipocontenedorsegundo,
						Sumasolicitadaprimero: _Sumasolicitadaprimero,
						Sumasolicitadasegundo :_Sumasolicitadasegundo, 
						Tipodebien: _Tipodebien,
						CuotaMercanciaApar : _CuotaMercanciaApar,
						PrimaNetaMercanciaApar : _PrimaNetaMercanciaApar,
						PrimaNetaContenedorApar : _PrimaNetaContenedorApar,
						PrimaNetaTotalApar : _PrimaNetaTotalApar,
						DerechoCertificadoApar : _DerechoCertificadoApar,
						IvaApar : _IvaApar,
						PrimaTotalApar : _PrimaTotalApar,
						CuotaMercanciaUsuario : _CuotaMercanciaUsuario,
						PrimaNetaMercanciaUsuario : _PrimaNetaMercanciaUsuario,
						PrimaNetaContenedorUsuario : _PrimaNetaContenedorUsuario,
						PrimaNetaTotalUsuario : _PrimaNetaTotalUsuario,
						DerechoCertificadoUsuario : _DerechoCertificadoUsuario,
						IvaUsuario : _IvaUsuario,
						PrimaTotalUsuario : _PrimaTotalUsuario,
						Griro :_Griro,
						TipoTraslado : _TipoTraslado,
						valormercancia1 : _valormercancia1,
						valormercancia2 : _valormercancia2,
						valormercanciamaximo1 : _valormercanciamaximo1,
						valormercanciamaximo2 : _valormercanciamaximo2,
						TransporteAntiguedad : _TransporteAntiguedad,
						DescripcionCondicionesTER : _DescripcionCondicionesTER,
						ObservacionGnral : _ObservacionGnral,
						CuotaContenedor : _CuotaContenedor,
						CoberturaMercancia : _CoberturaMercancia,
						CoberturaContenedor : _CoberturaContenedor
						
					}
					$.ajax({
						url: 'global/sp_registro.php',
						type: "POST",
						data: ajax,
						success: function(data, textStatus, jqXHR)
						{
							$resp = JSON.parse(data);
							if($resp['status'] == true){
								var id = $resp['lastInsertId'] ;
								folio = $resp['folio'] ;
								Swal.fire({
									title: "Cotizacion Generada Correctamente",
									html: ' <p>Folio Cotizacion: <strong>' + folio + '</strong>.</p> ',
									type: "info",
									width: 600,
									padding: '3em',
									background: '#fff',
									backdrop: `
									rgba(0,0,123,0.4)
									left top
									no-repeat`,
									showCancelButton: false,
									confirmButtonClass: "btn-primary",
									confirmButtonText: "Aceptar",
									closeOnConfirm: false,
									showLoaderOnConfirm: true
								
											}).then((result) => {
												if(result.value){
												location.reload();
												}
											})
									
							}else{
									Swal.fire("Error save customer : "+$resp['message'])
							}
						},
						error: function (request, textStatus, errorThrown) {
							Swal.fire("Error ", request.responseJSON, "error");
						}
					});
				}
			})
		}
	});

	$('#MTPT').change(function() {

		if($(this).val() == "TE"){
			$('#EMAYOR').prop('disabled', false);

		}else{
			$('#EMAYOR').prop('disabled', 'disabled');
		}

	})
	$('#EMAYOR').change(function() {

		//alert("transporte");
		if($(this).val() == "SI"){
			var select = document.getElementById("nuevoCBM");
			var length = select.options.length;
			for (i = length-1; i >= 0; i--) {
					select.options[i] = null;
				}


 			if ($("#EMAYOR").val() == "SI"){
				var array = ["Seleccionar","ROT Y ROBO"];
					for(var i in array)
					{ 
						document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 
					}
				}
			$('#EMAYOR').prop('disabled', false);

		}else{

			LlenarTipoCobertura();
		}

	})

	//Evento Change del Control de Pais Origen Cobertura
	$('#TB_PaisOrigen').change(function() {

		/* 
		Se valida que cuando se seleccione un Pais y este este en su 
		Estado 0 mande el siguiente mensaje y no deje seguir registrando

		Es un pais excluido debera de consultar con el administrador
		*/
		if( ($(this).find(':selected').data('city')) == 0 ){

			Swal.fire({
				title:'Es un pais excluido debera de consultar con el administrador',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }); 

			  DeshabilitarDatosEmbarque();

			  document.getElementById("TB_PaisOrigen").disabled = false;

			return false;

		}else{

			HabilitarDatosEmbarque();
		}
	});
	//Evento Change del Control de Pais Origen Cobertura
	$('#TB_OrigenCobertura').change(function() {

		/* 
		Se valida que cuando se seleccione un Pais y este este en su 
		Estado 0 mande el siguiente mensaje y no deje seguir registrando

		Es un pais excluido debera de consultar con el administrador
		*/
		if( ($(this).find(':selected').data('city')) == 0 ){

			Swal.fire({
				title:'Es un pais excluido debera de consultar con el administrador',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }); 

			  DeshabilitarDatosEmbarque();

			  document.getElementById("TB_OrigenCobertura").disabled = false;

			return false;

		}else{

			HabilitarDatosEmbarque();
		}
	});


	//Evento Change del Control de Pais Origen Cobertura
	$('#TB_PaisDestinoCobertura').change(function() {

		/* 
		Se valida que cuando se seleccione un Pais y este este en su 
		Estado 0 mande el siguiente mensaje y no deje seguir registrando

		Es un pais excluido debera de consultar con el administrador
		*/
		if( ($(this).find(':selected').data('city')) == 0 ){

			Swal.fire({
				title:'Es un pais excluido debera de consultar con el administrador',
				width: 600,
				padding: '3em',
				background: '#fff',
				backdrop: `
				  rgba(0,0,123,0.4)
				  left top
				  no-repeat
				`
			  }); 

			  
			  DeshabilitarDatosEmbarque();

			  document.getElementById("TB_PaisDestinoCobertura").disabled = false;

			return false;

		}else{

			HabilitarDatosEmbarque();
		}
	});

function DeshabilitarDatosEmbarque(){


	if($("#customSwitch1").is(":checked") == false){

		document.getElementById("TB_PaisOrigen").readonly;
		document.getElementById("TB_OrigenCobertura").readonly;
		document.getElementById("TB_EstadoOrigenCobertura").readonly;
		document.getElementById("TB_MunicipioOrigenCobertura").readonly;
		document.getElementById("TB_PaisDestinoCobertura").readonly;
		document.getElementById("TB_EstadoDestinoCobertura").readonly;
		document.getElementById("TB_MunicipioDestinoCobertura").readonly;
		document.getElementById("TB_DescripcionMercancia").readonly;
		document.getElementById("valormercancia1").readonly;
		document.getElementById("valormercancia2").readonly;
		document.getElementById("TB_ValorEmbarque").readonly;
	
		document.getElementById("MTPT").disabled = true;
		document.getElementById("EMAYOR").disabled = true;
		document.getElementById("nuevoRemolque").disabled = true;
		document.getElementById("nuevoContenedor").disabled = true;
		document.getElementById("nuevoBienesDesperdicios").disabled = true;
		document.getElementById("nuevoCVJ").disabled = true;
		document.getElementById("nuevoCBM").disabled = true;
		document.getElementById("PNETA").disabled = true;
	}

	
	//document.getElementById('Btn_ImprimiCotizacion').disabled=true;
	//document.getElementById('next').disabled=true;

}

function HabilitarDatosEmbarque(){


	if($("#customSwitch1").is(":checked") == false){


		document.getElementById("TB_PaisOrigen").disabled = false;
		document.getElementById("TB_OrigenCobertura").disabled = false;
		document.getElementById("TB_EstadoOrigenCobertura").disabled = false;
		document.getElementById("TB_MunicipioOrigenCobertura").disabled = false;
		document.getElementById("TB_PaisDestinoCobertura").disabled = false;
		document.getElementById("TB_EstadoDestinoCobertura").disabled = false;
		document.getElementById("TB_MunicipioDestinoCobertura").disabled = false;
		document.getElementById("TB_DescripcionMercancia").disabled = false;
		document.getElementById("valormercancia1").disabled = false;
		document.getElementById("valormercancia1").disabled = false;
		document.getElementById("TB_ValorEmbarque").disabled = false;
		document.getElementById("MTPT").disabled = false;
		document.getElementById("EMAYOR").disabled = false;
		document.getElementById("nuevoRemolque").disabled = false;
		document.getElementById("nuevoContenedor").disabled = false;
		document.getElementById("nuevoBienesDesperdicios").disabled = false;
		document.getElementById("nuevoCVJ").disabled = false;
		document.getElementById("nuevoCBM").disabled = false;
		document.getElementById("PNETA").disabled = false;
	}

	
	//document.getElementById('Btn_ImprimiCotizacion').disabled=false;
	//document.getElementById('next').disabled=false;
}
function LlenarTipoCobertura(){
	
	//Se obtiene el objeto del control de tipo de cobertura
	
	var select = document.getElementById("nuevoCBM");

	//se obtiene el valor del continuacion de viaje
	var nuevoCVJ =  $("#nuevoCVJ").val();


	var length = select.options.length;
	for (i = length-1; i >= 0; i--) {
	select.options[i] = null;
	}


	if(nuevoCVJ == "No" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Nuevos"){

		

		var array  = ["Seleccionar","ROT Y ROBO", "TODO RIESGO", "TODO RIESGO Y VT"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}
	}else if (nuevoCVJ == "Si" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Nuevos"){
	

		var array = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}else if (nuevoCVJ == "SiCertificado" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Nuevos"){
	

		var array = ["Seleccionar","ROT Y ROBO", "TODO RIESGO", "TODO RIESGO Y VT"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}else if(nuevoCVJ == "SiCertificado" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Bienes Usuados o Reconstruidos"){
		

		var array  = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}else if(nuevoCVJ == "Si" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Bienes Usuados o Reconstruidos"){
		
		var array  = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}
	else if(nuevoCVJ == "No" && $( "#nuevoBienesDesperdicios option:selected" ).text() == "Bienes Usuados o Reconstruidos"){
		
		var array = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 

		}

	}
}


$('#customSwitch1').click(function(){
    if($(this).is(':checked')){
        var select = document.getElementById("nuevoCBM");
		var length = select.options.length;
		for (i = length-1; i >= 0; i--) {
				select.options[i] = null;
			}


		var array = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 
		}
		

		document.getElementById("TB_CuotaContenedor").value = "Para Contenedor, 10% Sobre al valor del contenedor por evento por contenedor";
		document.getElementById("TB_CoberturaContenedor").value = "Riesgos Ordinarios de Transito - Robo Total - Maniobras de Carga y Descarga  -  Limpieza Extraordinaria - Maniobras de Rescate.";
		
		document.getElementById("nuevoMercancia").disabled = true;
		document.getElementById("TB_DescripcionMercancia").disabled = true;
		document.getElementById("TB_DescripcionMercancia").value = "";
		document.getElementById("nuevoTipoEmpaque").disabled = true;
		document.getElementById("nuevoTLER").disabled = true;
		document.getElementById("TB_ValorEmbarque").disabled = true;
		document.getElementById("TB_ValorEmbarque").value = "";
		document.getElementById("MTPT").disabled = true;
		document.getElementById("nuevoBienesDesperdicios").disabled = true;
		document.getElementById("nuevoCVJ").disabled = true;
		document.getElementById("nuevoTipoEmbarque").disabled = true;
		document.getElementById("nuevoRemolque").disabled = true;
		document.getElementById("nuevoContenedor").disabled = true;
		document.getElementById("valormercancia1").disabled = true;
		document.getElementById("valormercancia1").value = "";

		///Se activa el tipo de contenedor
		document.getElementById("nuevoTipoContenedor1").disabled = false;
    } else {
		document.getElementById("nuevoMercancia").disabled = false;
		document.getElementById("TB_DescripcionMercancia").disabled = false;
		document.getElementById("TB_DescripcionMercancia").value = "";
		document.getElementById("nuevoTipoEmpaque").disabled = false;
		document.getElementById("nuevoTLER").disabled = false;
		document.getElementById("TB_ValorEmbarque").disabled = false;
		document.getElementById("TB_ValorEmbarque").value = "";
		document.getElementById("MTPT").disabled = false;
		document.getElementById("nuevoBienesDesperdicios").disabled = false;
		document.getElementById("nuevoCVJ").disabled = false;
		document.getElementById("nuevoTipoEmbarque").disabled = false;
		document.getElementById("nuevoRemolque").disabled = false;


		LimpiarControles();
		LlenarTipoCobertura();
    }
});

/* const checkbox = document.getElementById('customSwitch1')

checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
    

	
		var select = document.getElementById("nuevoCBM");
		var length = select.options.length;
		for (i = length-1; i >= 0; i--) {
				select.options[i] = null;
			}


		var array = ["Seleccionar","ROT Y ROBO"];
		for(var i in array)
		{ 
			document.getElementById("nuevoCBM").innerHTML += "<option value='"+array[i]+"'>"+array[i]+"</option>"; 
		}
		

	document.getElementById("TB_CuotaContenedor").value = "Para Contenedor, 10% Sobre al valor del contenedor por evento por contenedor";
	document.getElementById("TB_CoberturaContenedor").value = "Riesgos Ordinarios de Transito - Robo Total - Maniobras de Carga y Descarga  -  Limpieza Extraordinaria - Maniobras de Rescate.";
	
	document.getElementById("nuevoMercancia").disabled = true;
	document.getElementById("TB_DescripcionMercancia").disabled = true;
	document.getElementById("TB_DescripcionMercancia").value = "";
	document.getElementById("nuevoTipoEmpaque").disabled = true;
	document.getElementById("nuevoTLER").disabled = true;
	document.getElementById("TB_ValorEmbarque").disabled = true;
	document.getElementById("TB_ValorEmbarque").value = "";
	document.getElementById("MTPT").disabled = true;
	document.getElementById("nuevoBienesDesperdicios").disabled = true;
	document.getElementById("nuevoCVJ").disabled = true;
	document.getElementById("nuevoTipoEmbarque").disabled = true;
	document.getElementById("nuevoRemolque").disabled = true;
	document.getElementById("nuevoContenedor").disabled = true;
	document.getElementById("valormercancia1").disabled = true;
	document.getElementById("valormercancia1").value = "";

	///Se activa el tipo de contenedor
	document.getElementById("nuevoTipoContenedor1").disabled = false;
	
	

  } else {
    document.getElementById("nuevoMercancia").disabled = false;
	document.getElementById("TB_DescripcionMercancia").disabled = false;
	document.getElementById("TB_DescripcionMercancia").value = "";
	document.getElementById("nuevoTipoEmpaque").disabled = false;
	document.getElementById("nuevoTLER").disabled = false;
	document.getElementById("TB_ValorEmbarque").disabled = false;
	document.getElementById("TB_ValorEmbarque").value = "";
	document.getElementById("MTPT").disabled = false;
	document.getElementById("nuevoBienesDesperdicios").disabled = false;
	document.getElementById("nuevoCVJ").disabled = false;
	document.getElementById("nuevoTipoEmbarque").disabled = false;
	document.getElementById("nuevoRemolque").disabled = false;


	LimpiarControles();
	LlenarTipoCobertura();



  }
}) */

function LimpiarControlesCV(){
	
	//Se borra los de origen y destino
	/* $('#TB_PaisOrigen').val("").trigger('change');
	$('#TB_OrigenCobertura').val("").trigger('change');
	$('#TB_EstadoOrigenCobertura').val("");
	$('#TB_MunicipioOrigenCobertura').val("");
	$('#TB_PaisDestinoCobertura').val("").trigger('change');
	$('#TB_EstadoDestinoCobertura').val("");
	$('#TB_MunicipioDestinoCobertura').val(""); */
	//Se borra los deducibles y descripciion de mercancia
	$('#TB_Deducible').val("");
	$('#TB_CuotaContenedor').val("");
	$('#TB_CoberturaMercancia').val("");
	$('#TB_CoberturaContenedor').val("");
	//Se borra valor de mercancia 1 y 2
	$('#TB_CoberturaContenedor').val("");
	$('#TB_CoberturaContenedor').val("");
	//Valor de Mercancia
	$('#valormercancia1').val("");
	$('#valormercancia2').val("");
	//$('#TB_ValorEmbarque').val("");
	//Select option
	//$('#MTPT').val("").trigger('change');
	$('#EMAYOR').val("").trigger('change');
	$('#nuevoRemolque').val("").trigger('change');
	$('#nuevoContenedor').val("").trigger('change');
	//identificado de contendeor
	$('#contenedor1').val("");
	document.getElementById("contenedor1").value = "";
	$('#contenedor2').val("");
	document.getElementById("contenedor2").value = "";
	//Tipo de contenedor
	//select option
	$('#nuevoTipoContenedor1').val("No").trigger('change');
	$('#nuevoTipoContenedor2').val("No").trigger('change');
	//valor maximo campaño
	$('#TB_Valor1').val("");
	$('#TB_SumaSolicitada1').val("");
	$('#TB_Valor2').val("");
	$('#TB_SumaSolicitada2').val("");
	//Tipo de bien
	//$('#nuevoBienesDesperdicios').val("na").trigger('change');
	//$('#nuevoCVJ').val("").trigger('change');
	//$('#nuevoCBM').val("").trigger('change');
	//Prima neta total
	
	

	$('#TB_IVATOTAL').val("");
	$('#PNETA').val("");
	$('#TB_PNTAT').val("");
	$('#TB_PNTA').val("");
	$('#TB_PMCTNDT').val("");
	$('#TB_PMCTND').val("");
	$('#TB_PMAGT').val("");
	$('#TB_DCRTT').val("");
	$('#TB_DCRT').val("");
	$('#TOTAL').val("");
	$('#TB_PMAGTT').val("");
	$('#TB_IVA').val("");
	$('#TB_CMCIA').val("");

	//Parte 2
	//Guia emabrque
	$('#TB_NumeroGuia').val("");
	//$('#TB_DescripcionGPS').val("");
	$('#TB_ObservGPS').val("");
	$('#TB_ObservacionGnral').val("");
	$('#TB_NLITPTA').val("");
	$('#TB_NombreChofer').val("");
	$('#TB_Marca').val("");
	$('#TB_Modelo').val("");
	$('#TB_Placas').val("");
	$('#TB_Color').val("");
	$('#TB_Motor').val("");
	$('#TB_Serie').val("");
	//tipo empaque
	$('#nuevoTipoVehiculo').val("").trigger('change');
	$('#nuevoNbLNTRP').val("").trigger('change');
	
	$('#nuevoTipoEmbarque').val("").trigger('change');
}

function LimpiarControles(){
	
	//Se borra los de origen y destino
	$('#TB_PaisOrigen').val("").trigger('change');
	$('#TB_OrigenCobertura').val("").trigger('change');
	$('#TB_EstadoOrigenCobertura').val("");
	$('#TB_MunicipioOrigenCobertura').val("");
	$('#TB_PaisDestinoCobertura').val("").trigger('change');
	$('#TB_EstadoDestinoCobertura').val("");
	$('#TB_MunicipioDestinoCobertura').val("");
	//Se borra los deducibles y descripciion de mercancia
	$('#TB_Deducible').val("");
	$('#TB_CuotaContenedor').val("");
	$('#TB_CoberturaMercancia').val("");
	$('#TB_CoberturaContenedor').val("");
	//Se borra valor de mercancia 1 y 2
	$('#TB_CoberturaContenedor').val("");
	$('#TB_CoberturaContenedor').val("");
	//Valor de Mercancia
	$('#valormercancia1').val("");
	$('#valormercancia2').val("");
	$('#TB_ValorEmbarque').val("");
	//Select option
	$('#MTPT').val("").trigger('change');
	$('#EMAYOR').val("").trigger('change');
	$('#nuevoRemolque').val("").trigger('change');
	$('#nuevoContenedor').val("").trigger('change');
	//identificado de contendeor
	$('#contenedor1').val("");
	$('#contenedor2').val("");
	//Tipo de contenedor
	//select option
	$('#nuevoTipoContenedor1').val("No").trigger('change');
	$('#nuevoTipoContenedor2').val("No").trigger('change');
	//valor maximo campaño
	$('#TB_Valor1').val("");
	$('#TB_SumaSolicitada1').val("");
	$('#TB_Valor2').val("");
	$('#TB_SumaSolicitada2').val("");
	//Tipo de bien
	$('#nuevoBienesDesperdicios').val("na").trigger('change');
	$('#nuevoCVJ').val("").trigger('change');
	$('#nuevoCBM').val("").trigger('change');
	//Prima neta total
	
	$('#TB_IVATOTAL').val("");
	$('#PNETA').val("");
	$('#TB_PNTAT').val("");
	$('#TB_PMCTNDT').val("");
	$('#TB_PMAGTTL').val("");
	$('#TB_DCRTT').val("");
	$('#TOTAL').val("");
	$('#TB_PMAGTT').val("");
	$('#IVA').val("");

	//Parte 2
	//Guia emabrque
	$('#TB_NumeroGuia').val("");
	$('#TB_DescripcionGPS').val("");
	$('#TB_ObservGPS').val("");
	$('#TB_ObservacionGnral').val("");
	$('#TB_NLITPTA').val("");
	$('#TB_NombreChofer').val("");
	$('#TB_Marca').val("");
	$('#TB_Modelo').val("");
	$('#TB_Placas').val("");
	$('#TB_Color').val("");
	$('#TB_Motor').val("");
	$('#TB_Serie').val("");
	//tipo empaque
	$('#nuevoTipoVehiculo').val("").trigger('change');
	$('#nuevoNbLNTRP').val("").trigger('change');
	$('#nuevoTLER').val("").trigger('change');
	$('#nuevoTipoEmbarque').val("").trigger('change');
	$('#nuevoTipoEmpaque').val("").trigger('change');
	//$('#nuevoSisSatelital').val("").trigger('change');


	}