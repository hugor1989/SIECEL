<?php

class ControladorProtocolo{

	/*=============================================
	REGISTRO DE Protocolo
	=============================================*/

	static public function ctrCrearProtocolo(){

		if(isset($_POST["nuevoDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcion"])){

				


				$tabla = "protocolo";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"],
								"titulo" => $_POST["nuevoTitulo"]
								);

				
				$respuesta = ModeloProtocolo::mdlIngresarProtocolo($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Protocolo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "protocolo";

						}
					});
					</script>';
				}	

			}
			else{

				echo '<script>

					swal.fire({

						type: "error",
						title: "¡El Protocolo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "protocolo";

						}

					});
				

				</script>';

			}


		}
	}

	/*=============================================
	MOSTRAR PROTOCOLO
	=============================================*/

	static public function ctrMostrarProtocolo($item, $valor){

		$tabla = "protocolo";

		$respuesta = ModeloProtocolo::mdlMostrarProtocolo($tabla, $item, $valor);

		return $respuesta;
	}

	
    /*=============================================
	EDITAR PROTOCOLO
	=============================================*/

	static public function ctrEditarProtocolo(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "protocolo";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
                               "titulo" => $_POST["EditarTitulo"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloProtocolo::mdlEditarProtocolo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El Protocolo ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "protocolo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡El Protocolo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "protocolo";

							}
						})

			  	</script>';

			}

		}

	}
}
	


			