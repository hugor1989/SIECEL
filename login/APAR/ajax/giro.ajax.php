<?php

require_once "../controladores/mercancia.controlador.php";
require_once "../modelos/mercancia.modelo.php";

class AjaxMercancia{

	/*=============================================
	EDITAR Mercancia
	=============================================*/	

	public $idMercancia;

	public function ajaxEditarMercancia(){

		$item = "Id";
		$valor = $this->idMercancia;

		$respuesta = ControladorMercancia::ctrMostrarMercancia($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	ACTIVAR mercancia
	=============================================*/	

	public $activarMercancia;
	public $activarId;


	public function ajaxActivarMercancia(){

		$tabla = "mercancia";

		$item1 = "Estatus";
		$valor1 = $this->activarMercancia;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloMercancia::mdlActualizarMercancia($tabla, $item1, $valor1, $item2, $valor2);

	}
	/*=============================================
	ACTIVAR mercancia
	=============================================*/	

	public $activarAutomaticoMercancia;
	public $activarautomaticoId;


	public function ajaxActivarAutomaticoMercancia(){

		$tabla = "mercancia";

		$item1 = "Automatico";
		$valor1 = $this->activarAutomaticoMercancia;

		$item2 = "Id";
		$valor2 = $this->activarautomaticoId;

		$respuesta = ModeloMercancia::mdlActualizarAutomaticoMercancia($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR Mercancia
=============================================*/
if(isset($_POST["idMercancia"])){

	$editarMercancia = new AjaxMercancia();
	$editarMercancia -> idMercancia= $_POST["idMercancia"];
	$editarMercancia -> ajaxEditarMercancia();

}

/*=============================================
ACTIVAR Mercancia
=============================================*/	

if(isset($_POST["estadoMercancia"])){

	$activarMercancia = new AjaxMercancia();
	$activarMercancia -> activarMercancia = $_POST["estadoMercancia"];
	$activarMercancia -> activarId = $_POST["idMercancia"];
	$activarMercancia -> ajaxActivarMercancia();

}
/*=============================================
ACTIVAR AUTOMATICO Mercancia
=============================================*/	

if(isset($_POST["automaticoMercancia"])){

	$activarMercancia = new AjaxMercancia();
	$activarMercancia -> activarAutomaticoMercancia = $_POST["automaticoMercancia"];
	$activarMercancia -> activarautomaticoId = $_POST["idMercancia"];
	$activarMercancia -> ajaxActivarAutomaticoMercancia();

}
