/*=============================================
EDITAR Aseguradora
=============================================*/
$(".tableclientes").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
    //console.log(idCliente);

	var datos = new FormData();
	datos.append("idCliente", idCliente);

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
			$("#nombre").val(respuesta["Nombre"]);
			$("#editarRFC").val(respuesta["RFC"]);
			$("#editarEmail").val(respuesta["Email"]);
			$("#editarCalle").val(respuesta["Calle"]);
			$("#editarNumeroInterior").val(respuesta["Numero_Interior"]);
			$("#editarNumeroExterior").val(respuesta["Numero_Exterior"]);
			$("#editarColonia").val(respuesta["Colonia"]);
			$('#editarEstado').val(respuesta["Estado"]); // Select the option with a value of '1'
			$('#editarEstado').trigger('change'); // Notify any JS components that the value changed
			$('#editarMunicipio').val(respuesta["Municipio"]); // Select the option with a value of '1'
			$('#editarMunicipio').trigger('change'); // Notify any JS components that the value changed
			$("#editarCP").val(respuesta["CodigoPostal"]);
			$("#editarPais").val(respuesta["Pais"]);
			$("#editarLocalidad").val(respuesta["Localidad"]);
			$("#editarMercAut").val(respuesta["MercanciaAutorizada"]);
			$("#nuevoCuota_Rot").val(respuesta["Cuota_ROT"]);
			$("#nuevoCuota_TR").val(respuesta["Cuota_TR"]);
			$("#nuevoCuotaBasica").val(respuesta["Cuota_TRVT"]);
			$('#editarCuotas').val(respuesta["TipoCuota"]); // Select the option with a value of '1'
			$('#editarCuotas').trigger('change'); // Notify any JS components that the value changed
			
			$("#id").val(respuesta["Id"]);

		}

	});

})
/*=============================================
ACTIVAR CLIENTE
=============================================*/
 $(".tableclientes").on("click", ".btnActivarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	var estadoCliente = $(this).attr("estadoCliente");

	var datos = new FormData();
 	datos.append("activarId", idCliente);
  	datos.append("estadoCliente", estadoCliente);

  	$.ajax({

	  url:"ajax/clientes.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 Swal.fire({
			      title: "Cliente activada correctamente",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "clientes";

			        }


				});

	      	}

      }

  	})

  	if(estadoCliente == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoCliente',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoCliente',0);

  	}

})

/*=============================================
REVISAR SI EL RFC YA EXISTE EN LA BD SI EXISTE NO DEJAR GRABAR
=============================================*/
/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

/* $("#nuevoUsuario").change(function(){

	
}) */

/* function comprobarUsuario() {
	//$("#loaderIcon").show();
	//$(".alert").remove();

	var rfc = $("#nuevoRFC").val();

	alert($("#nuevoRFC").val());

	var datos = new FormData();
	datos.append("validarrfc", rfc);

	 $.ajax({
	    url:"ajax/clientes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	alert(respuesta);
	    	//if(respuesta){

	    	//	$("#nuevoRFC").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		//$("#nuevoUsuario").val("");

	    	//}

	    }

	})
} */


/* $('#nuevoRFC').on('blur', function(){
       // $('#result-username').html('<img src="vistas/img/loader.gif" />').fadeOut(2000);
		alert("entro")
        var validarrfc = $(this).val();
		
		var datos = new FormData();
		datos.append("validarrfc", validarrfc);


        $.ajax({
            type: "POST",
            url: "ajax/clientes.ajax.php",
            data: datos,
            success: function(data) {

				Swal.fire({
					title: "El rfc ya se encuentra registrado, favor de contactar con el administrador",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				  }).then(function(result) {
					  if (result.value) {
  
						  window.location = "clientes";
  
					  }
  
  
				  });
                //$('#result-username').fadeIn(2000).html(data);
            }
        }); 
});  */            
 
 /* function validarEntero(){ 
	var validarrfc = $("#nuevoRFC").val();

	var datos = new FormData();
	datos.append("validarrfc", validarrfc);

	$.ajax({
		url: "ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		success: function(respuesta){
			Swal.fire({
				title: "El rfc ya se encuentra registrado, favor de contactar con el administrador",
				type: "success",
				confirmButtonText: "¡Cerrar!"
			  }).then(function(result) {
				  if (result.value) {

					  window.location = "clientes";

				  }


			  });
		}
	})

	
} */ 

/* $.ajax({
		type: "POST",
		cache: false,
		url: "ajax/clientes.ajax.php",
		data: datos,
		success: function(data) {

			Swal.fire({
				title: "El rfc ya se encuentra registrado, favor de contactar con el administrador",
				type: "success",
				confirmButtonText: "¡Cerrar!"
			  }).then(function(result) {
				  if (result.value) {

					  window.location = "clientes";

				  }


			  });
			//$('#result-username').fadeIn(2000).html(data);
		}
	}); */ 


function validarrfc() { 
		var rfc = $("#nuevoRFC").val();


		var dataString  = "validarrfc="+rfc;
	/* var datos = new FormData();
	datos.append("validarrfc", validarrfc);
 */
	$.ajax({
		url: "ajax/clientes.ajax.php",
		method: "POST",
		data: dataString,
		success: function(respuesta){
			Swal.fire({
				title: "El rfc ya se encuentra registrado, favor de contactar con el administrador",
				type: "success",
				confirmButtonText: "¡Cerrar!"
			  }).then(function(result) {
				  if (result.value) {

					  window.location = "clientes";

				  }


			  });
		}
	});
		/* var amountToPay = $('#amountToBePaid').val();
		var dataString = "amountToPay="+amountToPay;
			$.ajax({
				type: "POST",
				 url:'http://192.168.0.10/skylite/test',
				data: dataString,
				success: function(response) {
				  $("#remaining").empty();
							$(response).find('.resultRemaining').each(function(){
						$('#remaining').append($(this).html()); });                   
				},      
			}); */
}

$(function () {
	
	$("#TB_Clientes").DataTable({"paging": true,
								"lengthChange": false,
								"searching": false,
								"processing": true,
								"ordering": false,
								"info": false,
								"responsive": true,
								"autoWidth": false,
								"pageLength": 5,
							fixedColumns:   {
								leftColumns: 2,
							},
							columnDefs: [
							{ width: 50, targets: 0 }, //Nombre
							],
							"buttons": ["csv", "excel","colvis"]
							}).buttons().container().appendTo('#TB_Clientes_wrapper .col-md-6:eq(0)');

	/*  $("#example1").DataTable({"paging": true,
							   "lengthChange": false,
							   "searching": false,
								"processing": true,
								"ordering": false,
								"info": false,
								"responsive": true,
								"autoWidth": false,
								"pageLength": 5,
								"dom": '<"top"f>rtip',
								"fnDrawCallback": function( oSettings ) {},
								"ajax": {"url": "global/sp_categorias.php",
										"type": "POST",
										"data" : {method : "list_categoria"},
										error: function (request, textStatus, errorThrown) {
										swal(request.responseJSON.message);
								}},
							columns: [
								{ "data": null,render :  function ( data, type, full, meta ) {
									return  meta.row + 1;
								}},
							{"data": "Id" },
							{"data": "Descripcion" },
							{ "data": null, render : function(data,type,row){
							return "<button title='Edit' class='btn btn-edit btn-warning btn-xs'><i class='fa fa-pencil'></i> Editar</button>  <button title='Delete' class='btn btn-hapus  btn-danger btn-xs'><i class='fa fa-remove'></i> Eliminar</button> ";
							}},]
							}); */
   });