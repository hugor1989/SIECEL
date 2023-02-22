/*=============================================
EDITAR GIRO
=============================================*/
$(".TablaMercancia").on("click", ".btnEditarMercancia", function(){

	var idMercancia = $(this).attr("idMercancia");
	
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
			
			$("#editarDescripcion").val(respuesta["Descripcion"]);
		    $("#editarGiro> [value=" + respuesta["Giro"] + "]").attr("selected", "true");
			$("#editarPeligrosidad> [value=" + respuesta["Peligrosidad"] + "]").attr("selected", "true");
			$("#editarValorA").val(respuesta["Valor_Aseguradora"]);
			$("#editarValorAP").val(respuesta["Valor_Apar"]);

			$("#editarROT").val(respuesta["ROT"]);
			$("#editarRobo").val(respuesta["TR"]);
			$("#editarVT").val(respuesta["Variacion_Termica"]);
			$("#editarIntervalo1").val(respuesta["Valor_A"]);
			$("#editarIntervalo2").val(respuesta["Valor_B"]);
			$("#editarIntervalo3").val(respuesta["Valor_C"]);
			$("#editarIntervalo4").val(respuesta["Valor_D"]);
			$("#editarIntervalo5").val(respuesta["Valor_E"]);
			$("#editarIntervalo6").val(respuesta["Valor_F"]);
			
			$("#id").val(respuesta["Id"]);

		}

	});

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


						