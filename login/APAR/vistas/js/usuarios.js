$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

});

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

		  Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(".table-bordered").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
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

		
				$("#editarNombre").val(respuesta[i].Nombre);
				$("#editarUsuario").val(respuesta[i].Username);
				$("#editarEmail").val(respuesta[i].Email);
				$("#editarEmpresa").val(respuesta[i].Empresa);
				$("#editarPerfil> [value=" + respuesta[i].Perfil + "]").attr("selected", "true");
				$("#editarAseguradora> [value=" + respuesta[i].IdAseguradora + "]").attr("selected", "true");
				$("#editarRFC").val(respuesta[i].RFC);
				$("#editarPuesto").val(respuesta[i].Puesto);
				$("#editarCalle").val(respuesta[i].Calle);
				$("#editarNumeroInterior").val(respuesta[i].Numero_Interior);
				$("#editarNumeroExterior").val(respuesta[i].Numero_Exterior);
				$("#editarColonia").val(respuesta[i].Colonia);
				$("#editarMunicipio").val(respuesta[i].Municipio);
				$("#editarEstado").val(respuesta[i].Estado);
				$("#editarCP").val(respuesta[i].CodigoPostal);
				$("#editarPais").val(respuesta[i].Pais);
				$("#editarEmailAdicional").val(respuesta[i].Email_Adicional);
				$("#editarTelefono").val(respuesta[i].Telefono);
				$("#editarCelular").val(respuesta[i].Celular);
				$("#editarContacto").val(respuesta[i].Contacto);
				$("#editarNextel").val(respuesta[i].Nextel);
				$("#editarCuentaBancaria").val(respuesta[i].CuentaBancaria);
				$("#editarCuentaBancariaAdicional").val(respuesta[i].CuentaBancaria_Adicional);
				$("#editarGiro").val(respuesta[i].Giro);
				$("#editarComision").val(respuesta[i].Comision);
				$("#editarAbreviatura").val(respuesta[i].Abreviatura);
				$("#editarCuotaBasica").val(respuesta[i].Cuota_VT);
				$("#editarCuota_Rot").val(respuesta[i].Cuota_Rot);
				$("#editarCuota_TR").val(respuesta[i].Cuota_TR);
				$("#editarCuota_Contenedor").val(respuesta[i].Cuota_Contenedor);
				$("#editarLocalidad").val(respuesta[i].Localidad);
				$("#editarPrimaMinima").val(respuesta[i].Prima_minima);
				$("#editarDerechoCertificado").val(respuesta[i].Derecho_Certificado);
				$("#editarComisionAsociado").val(respuesta[i].ComisionAsociado);
				$("#fotoActual").val(respuesta[i].Foto);

				$("#passwordActual").val(respuesta[i].Password);
				$("#id").val(respuesta[i].Id);

				if(respuesta[i].Foto != ""){

					$("#imageneditar").attr('src', 'data:image/*;base64,' + respuesta[i].ImagenBase64);

					//$(".previsualizar").attr("src", "data:image/*base64," +  respuesta[i].ImagenBase64);
					//$(".previsualizar").attr("src", respuesta[i].Foto);

				}else{

					

					$(".previsualizar").attr("src", "vistas/img/usuarios/default/anonymous.png");

				}
			}

			

		}

	});

})
/*=============================================
EDITAR PERFIL
=============================================*/
$(".tableperfil").on("click", ".btnEditarPerfil", function(){

	var idPerfil = $(this).attr("idPerfil");
	
	var datos = new FormData();
	datos.append("idPerfil", idPerfil);

	$.ajax({

		url:"ajax/perfil.ajax.php",
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
ACTIVAR USUARIO
=============================================*/
$(".table-bordered").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
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

			        	window.location = "usuarios";

			        }


				});

	      	}

      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})
/*=============================================
ACTIVAR PERFIL
=============================================*/
$(".tableperfil").on("click", ".btnActivarPerfil", function(){

	var idperfil = $(this).attr("idPerfil");
	var estadoPerfil = $(this).attr("estadoPerfil");

	var datos = new FormData();
 	datos.append("activarId", idperfil);
  	datos.append("activarPerfil", estadoPerfil);

  	$.ajax({

	  url:"ajax/perfil.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal.fire({
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

  	if(estadoPerfil == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoPerfil',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoPerfil',0);

  	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

/* $("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
}) */

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})

/*=============================================
VALIDAR TIPO DE PERSONA / FISICA O MORAL
Y HABILITAR EL CAMPO APODERADO Y RAZON SOCIAL
=============================================*/
$('#select_id').change(function () {

	var valor = $(this).val();
	if (valor = 'Moral') {
		document.getElementById("nuevoApoderado").disabled = false;
	} else {
		document.getElementById("nuevoApoderado").disabled = true;
	}
	
})

/* $('#smartwizard').smartWizard({
    
     toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'right', // left, right, center
      showNextButton: false, // show/hide a Next button
      showPreviousButton: false, // show/hide a Previous button
      toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
  }
    
}); */
$(document).ready(function(){
	$('input[rel="txtTooltipNombre"]').tooltip();
	$('input[rel="txtTooltipEmail"]').tooltip();
	$('input[rel="txtTooltipUsuario"]').tooltip();
	$('input[rel="txtTooltipPerfil"]').tooltip();
	$('input[rel="txtTooltipEmpresa"]').tooltip();
	$('input[rel="txtTooltipRFC"]').tooltip();
	$('input[rel="txtTooltipCalle"]').tooltip();
	$('input[rel="txtTooltipNumeroInterior"]').tooltip();
	$('input[rel="txtTooltipNumeroExterior"]').tooltip();
	$('input[rel="txtTooltipColonia"]').tooltip();
	$('input[rel="txtTooltipMunicipio"]').tooltip();
	$('input[rel="txtTooltipCP"]').tooltip();
	$('input[rel="txtTooltipEstado"]').tooltip();
	$('input[rel="txtTooltipPais"]').tooltip();
	$('input[rel="txtTooltipGiro"]').tooltip();
	$('input[rel="txtTooltipEmailAdicional"]').tooltip();
	$('input[rel="txtTooltipTelefono"]').tooltip();
	$('input[rel="txtTooltipTelefonoCelular"]').tooltip();
	$('input[rel="txtTooltipContacto"]').tooltip();
	$('input[rel="txtTooltipNextel"]').tooltip();
	$('input[rel="txtTooltipBanco"]').tooltip();
	$('input[rel="txtTooltipClaveBancaria"]').tooltip();
	$('input[rel="txtTooltipClaveComision"]').tooltip();
	$('input[rel="txtTooltipAbreviatura"]').tooltip();
	$('input[rel="txtTooltipCuotaBasica"]').tooltip();
	$('input[rel="txtTooltipCuotaRot"]').tooltip();
	$('input[rel="txtTooltipCuotaRT"]').tooltip();
	$('input[rel="txtTooltipCuotaContenedor"]').tooltip();
	$('input[rel="txtTooltipDescripcion"]').tooltip();
});
$(function () {
	
	 $("#example1").DataTable({
								"paging": true,
								"lengthChange": false,
								"searching": false,
								"processing": true,
								"ordering": false,
								"info": false,
								"responsive": true,
								"autoWidth": false,
								"pageLength": 10,
		/* fixedColumns:   {
            leftColumns: 2,
        },
		columnDefs: [
            { width: 210, targets: 1 }, //Nombre
			{ width: 80, targets: 2 },  //Perfil
			{ width: 120, targets: 5 },  //Limite Asegurable
			{ width: 120, targets: 17 }, //Calle
			{ width: 200, targets: 20 }, //Colonia
			{ width: 130, targets: 27 }, //TELEGFONO
			{ width: 130, targets: 28 }, //CELULAR
			{ width: 150, targets: 29 }, //Contacto
			{ width: 150, targets: 33 }, //GIRO
			{ width: 130, targets: 35 }, //fecha login
        ], */
		/* fixedColumns:   {
            leftColumns: 2,
        }, */
		"buttons": ["csv", "excel","colvis"]
	  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

$(document).ready(function() {
		$("#TB_Reporte").DataTable({
			"responsive": false, "lengthChange": false, "autoWidth": true,
			"scrollX": true,
			"scrollY": "700px",
			"pageLength": 10,
			"scrollCollapse": true,
			"buttons": ["csv", "excel","colvis"]
		  }).buttons().container().appendTo('#TB_Reporte_wrapper .col-md-6:eq(0)');
} );

function checkUsername() {

	var usuario = $("#nuevoUsuario").val();

	

	var datos = new FormData();
	datos.append("validarUsuario", usuario);
	$.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

				Swal.fire({
					title: 'Este usuario ya existe en la base de datos',
					type: '',
					icon: 'error',
					showCancelButton: true,
					confirmButtonClass: "btn-primary",
					confirmButtonText: "Aceptar",
					confirmButtonColor: '#3F3F3F',
					cancelButtonColor: '#3F3F3F',
					closeOnConfirm: false,
					showLoaderOnConfirm: true
				}).then((result) => {

					if (result.value == true) {

						$("#nuevoUsuario").val("");

					} else {


						$("#nuevoUsuario").val("");
					}
				})

	    		/* $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>'); */

	    		/* $("#nuevoUsuario").val(""); */

	    	}

	    }

	});
}
function mostrarPassword(){
	var cambio = document.getElementById("txtPassword");
	if(cambio.type == "password"){
		cambio.type = "text";
		$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}else{
		cambio.type = "password";
		$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	}
}
function mostrarPasswordEditar(){
	var cambio = document.getElementById("editarPassword");
	if(cambio.type == "password"){
		cambio.type = "text";
		$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}else{
		cambio.type = "password";
		$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	}
}

var form_count = 1, previous_form, next_form, total_forms;
	total_forms = $("fieldset").length;
	
	$(".next-form").click(function(){
		
		if(form_count == 1){

			if($("#nuevoNombre").val() == '' ){
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
			}else{
				previous_form = $(this).parent();
				next_form = $(this).parent().next();
				next_form.show();
				previous_form.hide();
				setProgressBarValue(++form_count);
			}
		}else if (form_count == 2){

			var Chec_EAS = $("#Ch_EmpresaAsociada").is(":checked");

			if(Chec_EAS == false){

				if($("#nuevoEmpresa").val() == '' ){
					Swal.fire("Error ", "Favor de Ingresar el nombre de la empresa", "error");
					return;
				}else if($("#nuevoRFC").val() == ''){
				Swal.fire("Error ", "Favor de Ingresar el RFC de la empresa", "error");
					return;
				}else if($("#nuevoCalle").val() == ''){
					Swal.fire("Error ", "Favor de Ingresar la calle", "error");
						return;
				}else if($("#nuevoNumeroExterior").val() == ''){
					Swal.fire("Error ", "Favor de Ingresar el numero exterior", "error");
						return;
				}else if($("#nuevoColonia").val() == ''){
					Swal.fire("Error ", "Favor de Ingresar el Codigo Colonia", "error");
						return;
				}else if($("#nuevoNumeronuevoCPExterior").val() == ''){
					Swal.fire("Error ", "Favor de Ingresar el Codigo Postal", "error");
						return;
				}else if($("#nuevoEmailAdicional").val() == ''){
					Swal.fire("Error ", "Favor de Ingresar el email de la empresa", "error");
						return;
				}else if(document.getElementById("nuevoPais").value == ''){
					Swal.fire("Error ", "Favor de Seleccionar el pais", "error");
					return;
				}else{
					previous_form = $(this).parent();
					next_form = $(this).parent().next();
					next_form.show();
					previous_form.hide();
					setProgressBarValue(++form_count);
				}

			}else{

				document.getElementById("nuevoEmpresa").disabled = false;
				document.getElementById("nuevoRFC").disabled = false;
				document.getElementById("nuevoCalle").disabled = false;
				document.getElementById("nuevoNumeroExterior").disabled = false;
				document.getElementById("nuevoNumeroInterior").disabled = false;
				document.getElementById("nuevoColonia").disabled = false;
				document.getElementById("nuevoPais").disabled = false;
				document.getElementById("nuevoCP").disabled = false;
				document.getElementById("nuevoEstado").disabled = false;
				document.getElementById("nuevoMunicipio").disabled = false;
				document.getElementById("nuevoLocalidad").disabled = false;
				document.getElementById("nuevoGiro").disabled = false;
				document.getElementById("nuevoEmailAdicional").disabled = false;
				document.getElementById("nuevoTelefono").disabled = false;
				document.getElementById("nuevoCelular").disabled = false;
				document.getElementById("nuevoContacto").disabled = false;
				document.getElementById("nuevoNextel").disabled = false;
				document.getElementById("nuevoCuentaBancaria").disabled = false;
				document.getElementById("nuevoCuentaBancariaAdicional").disabled = false;

				previous_form = $(this).parent();
					next_form = $(this).parent().next();
					next_form.show();
					previous_form.hide();
					setProgressBarValue(++form_count);
			}

			

		}
		
	});


	$(".previous-form").click(function(){
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
	
	
	

	///Funciones que correnponde al form de editar
	var form_count = 1, previous_form, next_form, total_forms;
	total_forms = $("fieldset").length;
	
	$(".next-forma").click(function(){
			previous_form = $(this).parent();
			next_form = $(this).parent().next();
			next_form.show();
			previous_form.hide();
			setProgressBarValue(++form_count);
		
	});

	$(".previous-forma").click(function(){
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

	$("#Ch_EmpresaAsociada").change(function () {
        if (this.checked) {
			var dv_paqueteria = document.getElementById("FM_Paqueteria");
            if (dv_paqueteria.style.display === "none") {
                dv_paqueteria.style.display = "flex";
            }

			document.getElementById("nuevoEmpresa").disabled = true;
			document.getElementById("nuevoRFC").disabled = true;
			document.getElementById("nuevoCalle").disabled = true;
			document.getElementById("nuevoNumeroExterior").disabled = true;
			document.getElementById("nuevoNumeroInterior").disabled = true;
			document.getElementById("nuevoColonia").disabled = true;
			document.getElementById("nuevoPais").disabled = true;
			document.getElementById("nuevoCP").disabled = true;
			document.getElementById("nuevoEstado").disabled = true;
			document.getElementById("nuevoMunicipio").disabled = true;
			document.getElementById("nuevoLocalidad").disabled = true;
			document.getElementById("nuevoGiro").disabled = true;
			document.getElementById("nuevoEmailAdicional").disabled = true;
			document.getElementById("nuevoTelefono").disabled = true;
			document.getElementById("nuevoCelular").disabled = true;
			document.getElementById("nuevoContacto").disabled = true;
			document.getElementById("nuevoNextel").disabled = true;
			document.getElementById("nuevoCuentaBancaria").disabled = true;
			document.getElementById("nuevoCuentaBancariaAdicional").disabled = true;
			
			//Se oculta los div que no se usaran div de placas
           /*  var dv_fmplacas = document.getElementById("prueba");
            if (dv_fmplacas.style.display === "none") {
                dv_fmplacas.style.display = "flex";
            } else {
                dv_fmplacas.style.display = "none";
            } */
		}else{
			var dv_paqueteria = document.getElementById("FM_Paqueteria");
            if (dv_paqueteria.style.display === "none") {
                dv_paqueteria.style.display = "flex";
            } else if (dv_paqueteria.style.display === "flex") {
                dv_paqueteria.style.display = "none";
            }

			document.getElementById("nuevoEmpresa").disabled = false;
			document.getElementById("nuevoRFC").disabled = false;
			document.getElementById("nuevoCalle").disabled = false;
			document.getElementById("nuevoNumeroExterior").disabled = false;
			document.getElementById("nuevoNumeroInterior").disabled = false;
			document.getElementById("nuevoColonia").disabled = false;
			document.getElementById("nuevoPais").disabled = false;
			document.getElementById("nuevoCP").disabled = false;
			document.getElementById("nuevoEstado").disabled = false;
			document.getElementById("nuevoMunicipio").disabled = false;
			document.getElementById("nuevoLocalidad").disabled = false;
			document.getElementById("nuevoGiro").disabled = false;
			document.getElementById("nuevoEmailAdicional").disabled = false;
			document.getElementById("nuevoTelefono").disabled = false;
			document.getElementById("nuevoCelular").disabled = false;
			document.getElementById("nuevoContacto").disabled = false;
			document.getElementById("nuevoNextel").disabled = false;
			document.getElementById("nuevoCuentaBancaria").disabled = false;
			document.getElementById("nuevoCuentaBancariaAdicional").disabled = false;
			

			//Se oculta los div que no se usaran div de placas
            /* var dv_fmplacas = document.getElementById("prueba");
            if (dv_fmplacas.style.display === "none") {
                dv_fmplacas.style.display = "flex";
            } else {
                dv_fmplacas.style.display = "none";
            } */
		}
	})