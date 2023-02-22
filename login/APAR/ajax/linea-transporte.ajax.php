<?php

require_once "../controladores/linea-transporte.controlador.php";
require_once "../modelos/linea-transporte.modelo.php";

class AjaxLineaTransporte{

	/*=============================================
	EDITAR LINEA TRANSPORTE
	=============================================*/	

	public $idLineaTransporte;

	public function ajaxEditarLineaTransporte(){

		$item = "Id";
		$valor = $this->idLineaTransporte;

		$respuesta = ControladorLineaTransporte::mdlMostrarLineaTransporte($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
	ACTIVAR LINEA TRANSPORTE
	=============================================*/	

	public $activarLineaTransporte;
	public $activarId;


	public function ajaxActivarLineaTransporte(){

		$tabla = "linea_transportista";

		$item1 = "Estatus";
		$valor1 = $this->activarLineaTransporte;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloLineaTransporte::mdlActualizarLineaTransporte($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR LINEA TRANSPORTE
=============================================*/
if(isset($_POST["idLT"])){

	$editarLT = new AjaxLineaTransporte();
	$editarLT -> idLineaTransporte= $_POST["idLT"];
	$editarLT -> ajaxEditarLineaTransporte();

}

/*=============================================
EDITAR  LINEA TRANSPORTE
=============================================*/	

if(isset($_POST["estadoLT"])){

	$activarLT = new AjaxMedioTransporte();
	$activarLT -> activarLineaTransporte = $_POST["estadoLT"];
	$activarLT -> activarId = $_POST["idLT"];
	$activarLT -> ajaxActivarLineaTransporte();

}
