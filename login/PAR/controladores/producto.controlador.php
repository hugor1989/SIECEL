<?php

class ControladorProducto{

	/*=============================================
	REGISTRO DE Producto
	=============================================*/

	static public function ctrCrearProducto(){

		if(isset($_POST["nuevoDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcion"])){


				$tabla = "producto";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"],
								"tipomercancia" => $_POST["nuevoTipomercancia"],
								"na" => $_POST["nuevoNo_obligatorio"],
								"gpsbasico" => $_POST["nuevoGPS_basico"],
								"activacionuno" => $_POST["nuevoGps_activacion_1"],
								"activaciondos" => $_POST["nuevoGps_activacion_2"],
								"cts" => $_POST["nuevoCts"],
								"cuelectrica" => $_POST["nuevoCustodia_electronica"],
								"cufisica" => $_POST["nuevoCustodia_fisica"],
								"custodia" => $_POST["nuevoCustodia"]
								);

				$respuesta = ModeloProducto::mdlIngresarProducto($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El producto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "producto";

						}
					});
					</script>';
				}	

			}
			else{

				echo '<script>

					swal.fire({

						type: "error",
						title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "producto";

						}

					});
				

				</script>';

			}


		}
	}

	/*=============================================
	MOSTRAR PRODUCTO
	=============================================*/

	static public function ctrMostrarProducto($item, $valor){

		$tabla = "producto";

		$respuesta = ModeloProducto::mdlMostrarProducto($tabla, $item, $valor);

		return $respuesta;
	}

	
    /*=============================================
	EDITAR Producto
	=============================================*/

	static public function ctrEditarProducto(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "protocolo";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
								"tipomercancia" => $_POST["EditarTipomercancia"],
								"na" => $_POST["EditarNo_obligatorio"],
								"gpsbasico" => $_POST["EditarGPS_basico"],
								"activacionuno" => $_POST["EditarGps_activacion_1"],
								"activaciondos" => $_POST["EditarGps_activacion_2"],
								"cts" => $_POST["EditarCts"],
								"cuelectrica" => $_POST["EditarCustodia_electronica"],
								"cufisica" => $_POST["EditarCustodia_fisica"],
								"custodia" => $_POST["EditarCustodia"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloProducto::mdlEditarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El producto ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "producto";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "producto";

							}
						})

			  	</script>';

			}

		}

	}
}
	


			