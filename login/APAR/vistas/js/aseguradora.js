/*=============================================
EDITAR Aseguradora
=============================================*/
$(".tablaAseguradora").on("click", ".btnEditarAseguradora", function(){

	var idAseguradora = $(this).attr("idAseguradora");
	
    console.log(idAseguradora);

	var datos = new FormData();
	datos.append("idAseguradora", idAseguradora);

	$.ajax({

		url:"ajax/aseguradora.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(respuesta["Id"]);
			$("#editarDescripcion").val(respuesta["Descripcion"]);
			$("#editarRFC").val(respuesta["RFC"]);
			$("#editarCuotaBasica").val(respuesta["VT"]);
			$("#editarCuota_Rot").val(respuesta["Cuota_Rot"]);
			$("#editarCuota_TR").val(respuesta["Cuota_TR"]);
			$("#editarCuota_Contenedor").val(respuesta["Cuota_Contenedor"]);
			$("#editarTelefono").val(respuesta["Telefono"]);
			$("#editarCondicionesGenerales").val(respuesta["CondicionesGenerales"]);
			$("#editarDireccion").val(respuesta["Direccion"]);
			$("#editarPoliza").val(respuesta["NumeroPoliza"]);
			$("#id").val(respuesta["Id"]);

			//Aqui valido la url de la imagen que no venga vacia, si viene vacia, no cambio, si viene muestro imagen
			if(respuesta["Logo"] != ""){

				$("#rutaactual").val(respuesta["Logo"]);
				$("#img_tag_id").attr("src",respuesta["Logo"])
			}
			
		}

	});

})
/*=============================================
ACTIVAR ASEGURADORA
=============================================*/
 $(".tablaAseguradora").on("click", ".btnActivAseguradora", function(){

	var idAseguradora = $(this).attr("idAseguradora");
	var estadoAseguradora = $(this).attr("estadoAseguradora");

	var datos = new FormData();
 	datos.append("activarId", idAseguradora);
  	datos.append("estadoAseguradora", estadoAseguradora);

  	$.ajax({

	  url:"ajax/aseguradora.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 Swal.fire({
			      title: "Aseguradora activada correctamente",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "aseguradora";

			        }


				});

	      	}

      }

  	})

  	if(estadoAseguradora == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoAseguradora',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoAseguradora',0);

  	}

})
 
$(function () {
	$('#example3').DataTable( {
		"pageLength": 4,
		"responsive": true, "lengthChange": true, "autoWidth": false,
		"buttons": [ "csv", "excel", "colvis"],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
		columnDefs: [
            { width: 80, targets: 0 },
			{ width: 80, targets: 1 },
			{ width: 150, targets: 2 },
			{ width: 80, targets: 3 },
			{ width: 100, targets: 4 },
        ]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)' );
});


						