<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxIniciarSesion{

	/*=============================================
	Iniciar Sesion
	=============================================*/	

	public $usuario;
	public $password;
	//public $encriptar;


	public function ajaxIniciarSesionUsuario(){

		$Password = $this->$password;
		$Username = $this->$usuario;

		$encriptar = crypt($Password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		$tabla = "usuario";

		$item = "Username";
		$valor = $this->$usuario;

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		if($respuesta["Username"] == $Username && $respuesta["Password"] == $encriptar){

			if($respuesta["Activo"] == 1){

				$_SESSION["iniciarSesion"] = "ok";
				$_SESSION["id"] = $respuesta["Id"];
				$_SESSION["nombre"] = $respuesta["Nombre"];
				$_SESSION["usuario"] = $respuesta["Username"];
				$_SESSION["foto"] = $respuesta["Foto"];
				$_SESSION["perfil"] = $respuesta["Perfil"];

				
				$status['status'] = "ok";
				//$status=;
				echo json_encode($status);
				/*=============================================
				REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
				=============================================*/

				/* date_default_timezone_set('America/Mexico_City');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');

				$fechaActual = $fecha.' '.$hora;

				$item1 = "ultimo_login";
				$valor1 = $fechaActual;

				$item2 = "Id";
				$valor2 = $respuesta["Id"];

				$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

				if($ultimoLogin == "ok"){


					$retval['status'] = true;
					$retval['message'] = "Bienvenido al Sistema APAR";
					$retval['usuario'] = $_SESSION["nombre"];
					//$retval['url'] = $list[3];
					echo json_encode($retval);

					 echo '<script>

						window.location = "inicio";

					</script>'; 

				}	 */			
				
			}else{

				
				$status['status'] = "false";
				echo json_encode($status);

			/* 	echo '<script>

			Swal.fire({

				type: "error",
				title: "¡El usuario aún no está activado",
				showConfirmButton: true,
				confirmButtonText: "Cerrar"

			})
			</script>'; */

				//echo '<br>
				//	<div class="alert alert-danger">El usuario aún no está activado</div>';

			}		

		}else{


			$status['status'] = "false";
				echo json_encode($status);
			//$retval['url'] = $list[3];
			

			/* echo '<script>

			Swal.fire({

				type: "error",
				title: "Error al ingresar, vuelve a intentarlo",
				showConfirmButton: true,
				confirmButtonText: "Cerrar"

			})
			</script>'; */

		}

	}
}

/*=============================================
ACTIVAR ASEGURADORA
=============================================*/	

if(isset($_POST["usuarioi"])){

	$sesion = new AjaxIniciarSesion();
	$sesion -> usuario = $_POST["usuarioi"];
	$sesion -> password = $_POST["passwordi"];
	$sesion -> ajaxIniciarSesionUsuario();

}
