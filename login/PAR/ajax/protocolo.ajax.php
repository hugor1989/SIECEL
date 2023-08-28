<?php

require_once "../controladores/protocolo.controlador.php";
require_once "../modelos/protocolo.modelo.php";

class AjaxProtocolo{

	/*=============================================
	EDITAR protocolo
	=============================================*/	

	public $idProtocolo;

	public function ajaxEditarProtocolo(){

		$item = "Id";
		$valor = $this->idProtocolo;

		$respuesta = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

		echo json_encode($respuesta);

	}

	  /*=============================================
	ACTIVAR PROTOCOLO
	=============================================*/	

	public $activarProtocolo;
	public $activarId;


	public function ajaxActivarProtocolo(){

		$tabla = "protocolo";

		$item1 = "Estatus";
		$valor1 = $this->activarProtocolo;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloProtocolo::mdlActualizarProtocolo($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR protocolo
=============================================*/
if(isset($_POST["idProtocolo"])){

	$editarprotocolo = new AjaxProtocolo();
	$editarprotocolo -> idProtocolo= $_POST["idProtocolo"];
	$editarprotocolo -> ajaxEditarProtocolo();

}
/*=============================================
ACTIVAR PROTOCOLO
=============================================*/	

if(isset($_POST["estadoProtocolo"])){

	$activarProtocolo = new AjaxProtocolo();
	$activarProtocolo -> activarProtocolo = $_POST["estadoProtocolo"];
	$activarProtocolo -> activarId = $_POST["idProtocolo"];
	$activarProtocolo -> ajaxActivarProtocolo();

}
