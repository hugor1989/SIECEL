<?php

require_once "../controladores/aseguradora.controlador.php";
require_once "../modelos/aseguradora.modelo.php";

class AjaxAseguradora{

	/*=============================================
	EDITAR ASEGURADORA
	=============================================*/	

	public $idAseguradora;

	public function ajaxEditarAseguradora(){

		$item = "Id";
		$valor = $this->idAseguradora;

		$respuesta = ControladorAseguradora::ctrMostrarAseguradora($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
	ACTIVAR ASEGURADORA
	=============================================*/	

	public $activarAseguradora;
	public $activarId;


	public function ajaxActivarAseguradora(){

		$tabla = "aseguradora";

		$item1 = "Activo";
		$valor1 = $this->activarAseguradora;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloAseguradora::mdlActualizarAseguradora($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR ASEGURADORA
=============================================*/
if(isset($_POST["idAseguradora"])){

	$editarAseguradora = new AjaxAseguradora();
	$editarAseguradora -> idAseguradora= $_POST["idAseguradora"];
	$editarAseguradora -> ajaxEditarAseguradora();

}

/*=============================================
ACTIVAR ASEGURADORA
=============================================*/	

if(isset($_POST["estadoAseguradora"])){

	$activarAseguradora = new AjaxAseguradora();
	$activarAseguradora -> activarAseguradora = $_POST["estadoAseguradora"];
	$activarAseguradora -> activarId = $_POST["activarId"];
	$activarAseguradora -> ajaxActivarAseguradora();

}
