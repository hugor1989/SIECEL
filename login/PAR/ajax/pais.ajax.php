<?php

require_once "../controladores/pais.controlador.php";
require_once "../modelos/pais.modelo.php";

class AjaxPais{

	
	/*=============================================
	ACTIVAR Pais
	=============================================*/	

	public $activarPais;
	public $activarId;


	public function ajaxActivarPais(){

		$tabla = "pais";

		$item1 = "Estatus";
		$valor1 = $this->activarPais;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloPais::mdlActualizarPais($tabla, $item1, $valor1, $item2, $valor2);

	}

	

}

/*=============================================
ACTIVAR PAIS
=============================================*/	

if(isset($_POST["estadoPais"])){

	$activarGiro = new AjaxPais();
	$activarGiro -> activarPais = $_POST["estadoPais"];
	$activarGiro -> activarId = $_POST["idPais"];
	$activarGiro -> ajaxActivarPais();

}

