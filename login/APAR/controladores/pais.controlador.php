<?php

class ControladorPais{

	
	/*=============================================
	MOSTRAR Pais
	=============================================*/

	static public function ctrMostrarPais($item, $valor){

		$tabla = "pais";

		$respuesta = ModeloPais::mdlMostrarPais($tabla, $item, $valor);

		return $respuesta;
	}
}
	


			