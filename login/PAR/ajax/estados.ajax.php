<?php

require_once "../controladores/estados.controlador.php";
require_once "../modelos/estados.modelo.php";

	$id = $_POST["id"];

	//$estadosdb = ModeloPaises::mdlTraerDependencias($id);

	$item = "estado_id";
	$valor = $id;
	$tabla = "municipios";

	$respuesta = ModeloEstados::mdlMostrarMunicipios($tabla,$item, $valor);

	foreach ($respuesta as $key => $value) {
		echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
	}

	


