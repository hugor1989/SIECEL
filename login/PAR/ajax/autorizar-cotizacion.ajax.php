<?php

require_once "../controladores/autotizar-cotizacion.controlador.php";
require_once "../modelos/autorizar-cotizacion.modelo.php";

class AjaxAutorizarCotizacion{

	/*=============================================
	EDITAR Cliente
	=============================================*/	

	public $idCotizacion;

	public function ajaxEditarCotizacion(){

		$item = "Id";
		$valor = $this->idCotizacion;

		$respuesta = ControladorAutorizarCotizacion::ctrMostrarCotizacionesN($item, $valor);

		echo json_encode($respuesta);

	}

	
}

/*=============================================
EDITAR cliente
=============================================*/
if(isset($_POST["idCotizacion"])){

	$editarAseguradora = new AjaxAutorizarCotizacion();
	$editarAseguradora -> idCotizacion= $_POST["idCotizacion"];
	$editarAseguradora -> ajaxEditarCotizacion();

}

