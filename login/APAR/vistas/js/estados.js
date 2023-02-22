function selectEstados() {
	var id_estado = $("#nuevoEstado").val();
	$.ajax({
		url: "ajax/estados.ajax.php",
		method: "POST",
		data: {
			"id":id_estado
		},
		success: function(respuesta){
			$("#nuevoMunicipio").attr("disabled", false);
			$("#nuevoMunicipio").html(respuesta);
		}
	})
}