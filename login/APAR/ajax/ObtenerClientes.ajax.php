<?php

require_once "../controladores/persona.controlador.php";
require_once "../modelos/persona.modelo.php";

	$id = $_POST["id"];

	//$estadosdb = ModeloPaises::mdlTraerDependencias($id);

	$item = "Asociado";
	$valor = $id;
	$tabla = "persona";

	$respuesta = ModeloPersona::mdlMostrarAsociado($tabla,$item, $valor);

	foreach ($respuesta as $key => $value){
		echo '<option value="'.$value["Id"].'" data-city="'.$value["MercanciaAutorizada"].'" >'.$value["Nombre"].'</option>';
	}

	


