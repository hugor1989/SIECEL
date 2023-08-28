<?php

require_once "../controladores/medio-transporte.controlador.php";
require_once "../modelos/medio-transporte.modelo.php";

class AjaxMedioTransporte{

	/*=============================================
	EDITAR MEDIO TRANSPORTE
	=============================================*/	

	public $idMedioTransporte;

	public function ajaxEditarMedioTransporte(){

		$item = "Id";
		$valor = $this->idMedioTransporte;

		$respuesta = ControladorMedioTransporte::mdlMostrarMedioTransporte($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
	ACTIVAR MEDIO TRANSPORTE
	=============================================*/	

	public $activarMedioTransporte;
	public $activarId;


	public function ajaxActivarMedioTransporte(){

		$tabla = "medio_transporte";

		$item1 = "Estatus";
		$valor1 = $this->activarMedioTransporte;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloMedioTransporte::mdlActualizarMedioTransporte($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR RECORRIDO
=============================================*/
if(isset($_POST["idMT"])){

	$editarMT = new AjaxMedioTransporte();
	$editarMT -> idMedioTransporte= $_POST["idMT"];
	$editarMT -> ajaxEditarMedioTransporte();

}

/*=============================================
EDITAR RECORRIDO
=============================================*/	

if(isset($_POST["estadodMT"])){

	$activarMT = new AjaxMedioTransporte();
	$activarMT -> activarMedioTransporte = $_POST["estadodMT"];
	$activarMT -> activarId = $_POST["idMT"];
	$activarMT -> ajaxActivarMedioTransporte();

}
