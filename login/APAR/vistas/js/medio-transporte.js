/*=============================================
EDITAR Aseguradora
=============================================*/
$(".tableMedioTransporte").on("click", ".btnEditarMedioTransporte", function(){

	var idMT = $(this).attr("idMT");
	
   // console.log(idCliente);

	var datos = new FormData();
	datos.append("idMT", idMT);

	$.ajax({

		url:"ajax/medio-transporte.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
		//	console.log(respuesta["Id"]);
			$("#EditarDescripcion").val(respuesta["Descripcion"]);
			$("#id").val(respuesta["Id"]);

		}

	});

})
/*=============================================
ACTIVAR CLIENTE
=============================================*/
 $(".tableMedioTransporte").on("click", ".btnActivarMedioTransporte", function(){

	var idMT = $(this).attr("idMT");
	var estadodMT = $(this).attr("estadodMT");

	var datos = new FormData();
 	datos.append("idMT", idMT);
  	datos.append("estadodMT", estadodMT);

  	$.ajax({

	  url:"ajax/medio-transporte.ajax.php",
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

  	if(estadodMT == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadodMT',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadodMT',0);

  	}

})
 



						