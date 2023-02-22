<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxPerfil{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idPerfil;

	public function ajaxEditarPerfil(){

		$item = "Id";
		$valor = $this->idPerfil;

		$respuesta = ControladorUsuarios::mdlMostrarPerfiles($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarPerfil(){

		$tabla = "perfil";

		$item1 = "Estado";
		$valor1 = $this->activarUsuario;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	ACTIVAR PERFIL
	=============================================*/	

	/* public $activarPerfil;
	public $activarId;


	public function ajaxActivarPerfil(){

		$tabla = "perfil";

		$item1 = "Estado";
		$valor1 = $this->activarPerfil;

		$item2 = "Id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2);

	} */

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPerfil"])){

	$editar = new AjaxPerfil();
	$editar -> idPerfil = $_POST["idPerfil"];
	$editar -> ajaxEditarPerfil();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarPerfil"])){

	$activarUsuario = new AjaxPerfil();
	$activarUsuario -> activarUsuario = $_POST["activarPerfil"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarPerfil();

}
/*=============================================
ACTIVAR PERFIL
=============================================*/	

/* if(isset($_POST["activarPerfil"])){

	$activarPerfil = new AjaxUsuarios();
	$activarPerfil -> activarPerfil = $_POST["activarPerfil"];
	$activarPerfil -> activarId = $_POST["activarId"];
	$activarPerfil -> ajaxActivarPerfil();

} */

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

/* if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

} */