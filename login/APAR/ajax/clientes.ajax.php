<?php

require_once "../controladores/persona.controlador.php";
require_once "../modelos/persona.modelo.php";

class AjaxCliente{

	/*=============================================
	EDITAR Cliente
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "Id";
		$valor = $this->idCliente;

		$respuesta = ControladorPersona::ctrMostrarAsociadoItem($item, $valor);

		echo json_encode($respuesta);

	}

	public $idClienteCompleto;

	public function ajaxEditarClienteCompleto(){

		$item = "Id";
		$valor = $this->idClienteCompleto;

		$respuesta = ControladorPersona::ctrMostrarAsociadoItemCompleto($item, $valor);

		echo json_encode($respuesta);

	}


	public $idClienteEstado;

	public function ajaxEditarClienteEstado(){

		$item = "Id";
		$valor = $this->idClienteEstado;

		$respuesta = ControladorPersona::ctrMostrarAsociadoItemEstado($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
	ACTIVAR CLIENTE
	=============================================*/	

	public $activarCliente;
	public $activarId;


	public function ajaxActivarCliente(){

		$tabla = "persona";

		$item1 = "Activo";
		$valor1 = $this->activarCliente;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloPersona::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALDIAR SI EL RFC YA EXISTE
	=============================================*/	

	public $RFC;
	
	public function ajaxValidarRFC(){

		$tabla = "persona";

		$item1 = "RFC";
		$valor1 = $this->RFC;

		
		$respuesta = ModeloPersona::mdlValidarRFC($tabla, $item1, $valor1);

	}
}

/*=============================================
EDITAR cliente
=============================================*/
if(isset($_POST["idCliente"])){

	$editarAseguradora = new AjaxCliente();
	$editarAseguradora -> idCliente= $_POST["idCliente"];
	$editarAseguradora -> ajaxEditarCliente();

}
/*=============================================
oBTENER Cliente con estado y municipio
=============================================*/
if(isset($_POST["idClienteCompleto"])){

	$editarAseguradora = new AjaxCliente();
	$editarAseguradora -> idClienteCompleto= $_POST["idClienteCompleto"];
	$editarAseguradora -> ajaxEditarClienteCompleto();

}
/*=============================================
EDITAR cliente con estado
=============================================*/
if(isset($_POST["idClienteEstado"])){

	$editarAseguradora = new AjaxCliente();
	$editarAseguradora -> idClienteEstado= $_POST["idClienteEstado"];
	$editarAseguradora -> ajaxEditarClienteEstado();

}

/*=============================================
ACTIVAR cliente
=============================================*/	

if(isset($_POST["estadoCliente"])){

	$activarAseguradora = new AjaxCliente();
	$activarAseguradora -> activarCliente = $_POST["estadoCliente"];
	$activarAseguradora -> activarId = $_POST["activarId"];
	$activarAseguradora -> ajaxActivarCliente();

}
/*=============================================
VALIDAR RFC SI ESTA REGISTRADO
=============================================*/	

if(isset($_POST["validarrfc"])){

	$ValidarRfc = new AjaxCliente();
	$ValidarRfc -> RFC = $_POST["validarrfc"];
	$ValidarRfc -> ajaxValidarRFC();

}
