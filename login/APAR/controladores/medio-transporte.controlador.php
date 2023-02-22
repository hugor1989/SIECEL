<?php

class ControladorMedioTransporte{

	

	/*=============================================
	EDITAR  Medio Transporte
	=============================================*/

	static public function ctrEditarMedioTransporte(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "medio_transporte";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloMedioTransporte::mdlEditarMedioTransporte($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El Medio de transporte ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "medio-transporte";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡El Medio de Transporte no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "medio-transporte";

							}
						})

			  	</script>';

			}

		}

	}

	
	/*=============================================
	CRAR MEDIO DE TRANSPORTE
	=============================================*/

	static public function ctrCrearMedioTransporte(){

		if(isset($_POST["nuevoDescripcion"])){
			
				$tabla = "medio_transporte";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"]);

				$respuesta = ModeloMedioTransporte::mdlIngresarMedioTransporte($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal.fire({

						type: "success",
						title: "¡El Medio de Transporte ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "medio-transporte";

						}

					});
					</script>';
				}
		}

	}

	/*=============================================
	MOSTRAR MEDIO DE TRANSPORTE
	=============================================*/

	static public function mdlMostrarMedioTransporte($item, $valor){

		$tabla = "medio_transporte";

		$respuesta = ModeloMedioTransporte::mdlMostrarMedioTransporte($tabla, $item, $valor);

		return $respuesta;
	}



}
	


