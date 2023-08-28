<?php

class ControladorLineaTransporte{

	

	/*=============================================
	EDITAR  Linea Transporte
	=============================================*/

	static public function ctrEditarLineaTransporte(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "linea_transportista";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloLineaTransporte::mdlEditarLineaTransporte($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El Linea de transporte ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "linea-transporte";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡La Linea de Transporte no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "linea-transporte";

							}
						})

			  	</script>';

			}

		}

	}

	
	/*=============================================
	CRAR Linea DE TRANSPORTE
	=============================================*/

	static public function ctrCrearLineaTransporte(){

		if(isset($_POST["nuevoDescripcion"])){
			
				$tabla = "linea_transportista";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"]);

				$respuesta = ModeloLineaTransporte::mdlIngresarLineaTransporte($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal.fire({

						type: "success",
						title: "¡La Linea de Transporte ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "linea-transporte";

						}

					});
					</script>';
				}
		}

	}

	/*=============================================
	MOSTRAR MEDIO DE TRANSPORTE
	=============================================*/

	static public function mdlMostrarLineaTransporte($item, $valor){

		$tabla = "linea_transportista";

		$respuesta = ModeloLineaTransporte::mdlMostrarLineaTransporte($tabla, $item, $valor);

		return $respuesta;
	}



}
	


