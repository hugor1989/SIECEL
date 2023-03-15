<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			//if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuario";

				$item = "Username";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["Username"] == $_POST["ingUsuario"] && $respuesta["Password"] == $encriptar){

					if($respuesta["Activo"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["Id"];
						$_SESSION["nombre"] = $respuesta["Nombre"];
						$_SESSION["usuario"] = $respuesta["Username"];
						$_SESSION["foto"] = $respuesta["Foto"];
						$_SESSION["perfil"] = $respuesta["Perfil"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Mexico_City');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "Id";
						$valor2 = $respuesta["Id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

						}				
						
					}else{

						echo '<script>

					Swal.fire({

						type: "error",
						title: "¡El usuario aún no está activado",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					})
					</script>';

						//echo '<br>
						//	<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}else{

					echo '<script>

					Swal.fire({

						type: "error",
						title: "Error al ingresar, vuelve a intentarlo",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					})
					</script>';

					//echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			//}	

		}else{

			echo '<script>

					Swal.fire({

						type: "error",
						title: "¡Favor de Ingresar Usuario o Contraseña",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					})
					</script>';
		}

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		
		if(isset($_POST["nuevoNombre"])){


			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				try {
					
					/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				//$usuario = mt_rand(100,999);

				$tabla2="usuario";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$ultimoUsuario = ModeloUsuarios::mdlObtenerUltimoUsuario($tabla2);

				
				if($ultimoUsuario != null && $ultimoUsuario!= ''){

					$ultimoUsuario++;
				}else{

					
					$ultimoUsuario = "1";
				}

				//$prefijo="UA"; 
				//$usuriofinal=$prefijo.$ultimoUsuario;
				

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".str_pad($ultimoUsuario, 3, "0", STR_PAD_LEFT);

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".str_pad($ultimoUsuario, 3, "0", STR_PAD_LEFT)."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".str_pad($ultimoUsuario, 3, "0", STR_PAD_LEFT)."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuario";
				
				$datos = array("nombre" => $_POST["nuevoNombre"],
							   "email" => $_POST["nuevoEmail"],
							   "usuario" => $_POST["nuevoUsuario"],//str_pad($ultimoUsuario, 3, "0", STR_PAD_LEFT),
					           "password" => $encriptar,
					           "perfil" => $_POST["nuevoPerfil"],
							   "idaseguradora" => $_POST["nuevoAseguradora"],
							   "empresa" => $_POST["nuevoEmpresa"],
							   "rfc" => $_POST["nuevoRFC"],
							   "calle" => $_POST["nuevoCalle"],
							   "numerointerior" => $_POST["nuevoNumeroInterior"],
							   "numeroexterior" => $_POST["nuevoNumeroExterior"],
							   "colonia" => $_POST["nuevoColonia"],
							   "cp" => $_POST["nuevoCP"],
							   "estado" => $_POST["nuevoEstado"],
							   "municipio" => $_POST["nuevoMunicipio"],
							   "pais" => $_POST["nuevoPais"],
							   "emailadicional" => $_POST["nuevoEmailAdicional"],
							   "giro" => $_POST["nuevoGiro"],
							   "telefono" => $_POST["nuevoTelefono"],
							   "celular" => $_POST["nuevoCelular"],
							   "contacto" => $_POST["nuevoContacto"],
							  "nextel" => $_POST["nuevoNextel"],
							   "cuentabancaria" => $_POST["nuevoCuentaBancaria"],
							    "cuentabancariaad" => $_POST["nuevoCuentaBancariaAdicional"],
							   "comision" => $_POST["nuevoComision"],
							   "comisionasociado" => $_POST["nuevoComisionAsociado"],
							   "abreviatura" => $_POST["nuevoAbreviatura"],
							   "cuotabasica" => $_POST["nuevoCuotaBasica"],
							   "cuotarot" => $_POST["nuevoCuota_Rot"],
							   "cuotatr" => $_POST["nuevoCuota_TR"],
							   "cuotacontenedor" => $_POST["nuevoCuota_Contenedor"],
							   "primaminima" => $_POST["nuevoPrimaMinima"], 
							   "derechocertificado" => $_POST["nuevoDerechoCertificado"],
							   "localidad" => $_POST["nuevoLocalidad"],
					           "foto"=>$ruta
							);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}
					});
					</script>';
				}

				} catch (Exception $e) {

					$var =  $e->getMessage();
					
					echo '<script>

					Swal.fire({

						type: "error",
						title:'.$var.',
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}
					});
					</script>';

					
					die();
				}

			   		

			}
			else{

				echo '<script>

					Swal.fire({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		}
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarUsuariosItem($item, $valor){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::mdlMostrarUsuariosItem($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarUsuariosItemNuevo($item, $valor){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::mdlMostrarUsuariosItemNuevo($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR VENDEDORES
	=============================================*/

	static public function ctrMostrarVendedores($item, $valor){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::MdlMostrarVendedores($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

			

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuario";

				 if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								Swal.fire({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

						  	return;

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				} 
				
				//echo "<script>
				//		console.log('Debug Objects: " . $_POST["id"] . "' );
						
				//		</script>";

				$datos = array("Perfil" => $_POST["editarPerfil"],
								"email" => $_POST["editarEmail"],
								"Nombre" => $_POST["editarNombre"],
								"password" => $encriptar,
								"foto"=>$ruta,
								"empresa" => $_POST["editarEmpresa"],
								 "idaseguradora" => $_POST["editarAseguradora"],
								"rfc" => $_POST["editarRFC"],
								"calle" => $_POST["editarCalle"],
								"numerointerior" => $_POST["editarNumeroInterior"],
								"numeroexterior" => $_POST["editarNumeroExterior"],
								"colonia" => $_POST["editarColonia"],
								"municipio" => $_POST["editarMunicipio"],
								"estado" => $_POST["editarEstado"],
								"cp" => $_POST["editarCP"],
								"pais" => $_POST["editarPais"],
								"emailadicional" => $_POST["editarEmailAdicional"],
								"giro" => $_POST["editarGiro"],
								"telefono" => $_POST["editarTelefono"],
								"celular" => $_POST["editarCelular"],
								"contacto" => $_POST["editarContacto"],
								"nextel" => $_POST["editarNextel"],
								"cuentabancaria" => $_POST["editarCuentaBancaria"],
								"cuentabancariaad" => $_POST["editarCuentaBancariaAdicional"],
								"comision" => $_POST["editarComision"],
								"comisionasociado" => $_POST["editarComisionAsociado"],
								"abreviatura" => $_POST["editarAbreviatura"],
								"cuotabasica" => $_POST["editarCuotaBasica"],
								"cuotarot" => $_POST["editarCuota_Rot"],
								"cuotatr" => $_POST["editarCuota_TR"],
								"cuotacontenedor" => $_POST["editarCuota_Contenedor"],
								"primaminima" => $_POST["editarPrimaMinima"],
								"derechocertificado" => $_POST["editarDerechoCertificado"],
								"foto"=>$ruta,
								"localidad" => $_POST["editarLocalidad"],
							    "id" => $_POST["id"]
							);
				
							   
				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "El usuario ha sido actualizado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";
						}
					});
					</script>';

				}

			}else{

				echo'<script>

					Swal.fire({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	EDITAR  PERFIL USUARIO
	=============================================*/

	static public function ctrEditarPerfilUsuario(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "perfil";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloUsuarios::mdlEditarPerfilUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					Swal.fire({
						  type: "success",
						  title: "El Perfil ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "perfiles";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					Swal.fire({
						  type: "error",
						  title: "¡El Perfil no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	CRAR PERFIL USUARIO
	=============================================*/

	static public function ctrCrearPerfilUsuario(){

		if(isset($_POST["nuevoDescripcion"])){
			
				$tabla = "perfil";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"]);

				$respuesta = ModeloUsuarios::mdlIngresarPerfil($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
					</script>';
				}
		}

	}

	/*=============================================
	MOSTRAR PERFILES DE USUARIO
	=============================================*/

	static public function mdlMostrarPerfiles($item, $valor){

		$tabla = "perfil";

		$respuesta = ModeloUsuarios::mdlMostrarPerfiles($tabla, $item, $valor);

		return $respuesta;
	}



}
	


