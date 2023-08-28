/*=============================================
EDITAR GIRO
=============================================*/
$(".tableGiro").on("click", ".btnEditarGiro", function(){

	var idGiro = $(this).attr("idGiro");
	
	var datos = new FormData();
	datos.append("idGiro", idGiro);

	$.ajax({

		url:"ajax/giro.ajax.php",
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


$(function () {

		$("#example2").DataTable({
		"responsive": false, "lengthChange": false, "autoWidth": true,
        "scrollX": true,
		"pageLength": 10,
        "scrollCollapse": true,
		fixedColumns:   {
            leftColumns: 2,
        },
		columnDefs: [
            { width: 400, targets: 1},
			{width: 140, targets: 2 }
        ],
		"buttons": ["csv", "excel","colvis"]
	  }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});


						