<?php

class ControladorAutorizarCotizacion{

	
	/*=============================================
	MOSTRAR Cotizaciones
	=============================================*/

	static public function ctrMostrarCotizaciones($item, $valor){

		$tabla = "cotizacion";

		$respuesta = ModeloAutorizarCotizacion::mdlMostrarCotizaciones($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Cotizaciones
	=============================================*/

	static public function ctrMostrarCotizacionesN($item, $valor){

		$tabla = "cotizacion";

		$respuesta = ModeloAutorizarCotizacion::mdlMostrarCotizacionesN($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Certificado Autorizados
	=============================================*/

	static public function ctrMostrarCertificado($item, $valor){

		$tabla = "certificado";

		$respuesta = ModeloAutorizarCotizacion::mdlMostrarCertificado($tabla, $item, $valor);

		return $respuesta;
	}
}
	