/*=============================================
ACTIVAR PAIS
=============================================*/
 $(".TablaPais").on("click", ".btnActivarPais", function(){

	var idPais = $(this).attr("idPais");
	var estadoPais = $(this).attr("estadoPais");

	var datos = new FormData();
 	datos.append("idPais", idPais);
  	datos.append("estadoPais", estadoPais);

  	$.ajax({

	  url:"ajax/pais.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 Swal.fire({
			      title: "Pais activado y/o desactivado correctamente",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "paises";

			        }


				});

	      	}

      }

  	})

  	if(estadoPais == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoPais',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoPais',0);

  	}

})
 



						