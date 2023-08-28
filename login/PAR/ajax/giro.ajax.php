<?php

require_once "../controladores/mercancia.controlador.php";
require_once "../modelos/mercancia.modelo.php";

class AjaxGiro{

	/*=============================================
	EDITAR GIRO
	=============================================*/	

	public $idGiro;

	public function ajaxEditarGiro(){

		$item = "Id";
		$valor = $this->idGiro;

		$respuesta = ControladorMercancia::ctrMostrarGiro($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR GIRO
	=============================================*/	

	public $activarGiro;
	public $activarId;


	public function ajaxActivarGiro(){

		$tabla = "giro";

		$item1 = "Estado";
		$valor1 = $this->activarGiro;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloMercancia::mdlActualizarGiro($tabla, $item1, $valor1, $item2, $valor2);

	}

	

}

/*=============================================
EDITAR GIRO
=============================================*/
if(isset($_POST["idGiro"])){

	$editarGiro = new AjaxGiro();
	$editarGiro -> idGiro = $_POST["idGiro"];
	$editarGiro -> ajaxEditarGiro();

}

/*=============================================
ACTIVAR giro
=============================================*/	

if(isset($_POST["estadoGiro"])){

	$activarGiro = new AjaxGiro();
	$activarGiro -> activarGiro = $_POST["estadoGiro"];
	$activarGiro -> activarId = $_POST["activarId"];
	$activarGiro -> ajaxActivarGiro();

}

