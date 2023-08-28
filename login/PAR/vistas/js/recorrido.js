/*=============================================
EDITAR Aseguradora
=============================================*/
$(".tableRecorrido").on("click", ".btnEditarRecorrido", function(){

	var idRecorrido = $(this).attr("idRecorrido");
	
   // console.log(idCliente);

	var datos = new FormData();
	datos.append("idRecorrido", idRecorrido);

	$.ajax({

		url:"ajax/recorrido.ajax.php",
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
 $(".tableRecorrido").on("click", ".btnActivarRecorrido", function(){

	var idRecorrido = $(this).attr("idRecorrido");
	var estadoRecorrido = $(this).attr("estadoRecorrido");

	var datos = new FormData();
 	datos.append("idRecorrido", idRecorrido);
  	datos.append("estadoRecorrido", estadoRecorrido);

  	$.ajax({

	  url:"ajax/recorrido.ajax.php",
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

  	if(estadoRecorrido == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoRecorrido',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoRecorrido',0);

  	}

})
 



						