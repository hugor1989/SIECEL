<?php

require_once "../controladores/recorrido.controlador.php";
require_once "../modelos/recorrido.modelo.php";

class AjaxRecorrido{

	/*=============================================
	EDITAR RECORRIDO
	=============================================*/	

	public $idRecorrido;

	public function ajaxEditarRecorrido(){

		$item = "Id";
		$valor = $this->idRecorrido;

		$respuesta = ControladorRecorrido::mdlMostrarRecorrido($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
	ACTIVAR RECORRIDO
	=============================================*/	

	public $activarRecorrido;
	public $activarId;


	public function ajaxActivarRecorrido(){

		$tabla = "recorrido";

		$item1 = "Estatus";
		$valor1 = $this->activarRecorrido;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloRecorrido::mdlActualizarRecorrido($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR RECORRIDO
=============================================*/
if(isset($_POST["idRecorrido"])){

	$editarRecorrido = new AjaxRecorrido();
	$editarRecorrido -> idRecorrido= $_POST["idRecorrido"];
	$editarRecorrido -> ajaxEditarRecorrido();

}

/*=============================================
EDITAR RECORRIDO
=============================================*/	

if(isset($_POST["estadoRecorrido"])){

	$activarRecorrido = new AjaxRecorrido();
	$activarRecorrido -> activarRecorrido = $_POST["estadoRecorrido"];
	$activarRecorrido -> activarId = $_POST["idRecorrido"];
	$activarRecorrido -> ajaxActivarRecorrido();

}
