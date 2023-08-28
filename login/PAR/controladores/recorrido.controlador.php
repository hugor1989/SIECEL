<?php

class ControladorRecorrido{

	

	/*=============================================
	EDITAR  PERFIL Recorrido
	=============================================*/

	static public function ctrEditarRecorrido(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "recorrido";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloRecorrido::mdlEditarRecorrido($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El Recorrido ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "recorrido";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡El Recorrido no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "recorrido";

							}
						})

			  	</script>';

			}

		}

	}

	
	/*=============================================
	CRAR Recorrido
	=============================================*/

	static public function ctrCrearRecorrido(){

		if(isset($_POST["nuevoDescripcion"])){
			
				$tabla = "recorrido";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"]);

				$respuesta = ModeloRecorrido::mdlIngresarRecorrido($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal.fire({

						type: "success",
						title: "¡El Recorrido ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "recorrido";

						}

					});
					</script>';
				}
		}

	}

	/*=============================================
	MOSTRAR PERFILES DE Recorrido
	=============================================*/

	static public function mdlMostrarRecorrido($item, $valor){

		$tabla = "recorrido";

		$respuesta = ModeloRecorrido::mdlMostrarRecorrido($tabla, $item, $valor);

		return $respuesta;
	}



}
	


