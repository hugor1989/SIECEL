/*=============================================
EDITAR GIRO
=============================================*/
$(".tableProtocolo").on("click", ".btnEditarProtocolo", function(){

	var idProtocolo = $(this).attr("idProtocolo");
	
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
			
			$("#EditarTitulo").val(respuesta["Titulo"]);
			$("#EditarDescripcion").val(respuesta["Descripcion"]);
			$("#id").val(respuesta["Id"]);

		}

	});

})

/*=============================================
ACTIVAR PROTOCOLO
=============================================*/
$(".tableProtocolo").on("click", ".btnActivarProtocolo", function(){

	var idProtocolo = $(this).attr("idProtocolo");
	var estadoProtocolo = $(this).attr("estadoProtocolo");

	var datos = new FormData();
 	datos.append("idProtocolo", idProtocolo);
  	datos.append("estadoProtocolo", estadoProtocolo);

  	$.ajax({

	  url:"ajax/protocolo.ajax.php",
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

  	if(estadoProtocolo == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoProtocolo',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoProtocolo',0);

  	}

})





						