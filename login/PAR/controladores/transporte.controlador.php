<?php

class ControladorTransporte{

	
	/*=============================================
	MOSTRAR MedioTransport
	=============================================*/

	static public function ctrMostrarMedioTransporte($item, $valor){

		$tabla = "medio_transporte";

		$respuesta = ModeloTransporte::mdlMostrarMedioTransporte($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Linea Transportista
	=============================================*/

	static public function ctrMostrarLineaTransportista($item, $valor){

		$tabla = "linea_transportista";

		$respuesta = ModeloTransporte::mdlMostrarLineaTransportista($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR Linea Transportista
	=============================================*/

	static public function ctrMostrarMostrarRecorrido($item, $valor){

		$tabla = "recorrido";

		$respuesta = ModeloTransporte::mdlMostrarRecorrido($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	REGISTRO DE GIRO
	=============================================*/

	static public function ctrCrearGiro(){

		if(isset($_POST["nuevoDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcion"])){


				$tabla = "giro";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"]);

				$respuesta = ModeloMercancia::mdlIngresarGiro($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Giro ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "giro";

						}
					});
					</script>';
				}	

			}else{

				echo '<script>

					swal.fire({

						type: "error",
						title: "¡El Giro no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "giro";

						}

					});
				

				</script>';

			}


		}
	}
	/*=============================================
	REGISTRO DE MERCANCIA
	=============================================*/

	static public function ctrCrearMercancia(){

		if(isset($_POST["nuevoDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcion"])){


				$tabla = "mercancia";

				$datos = array("descripcion" => $_POST["nuevoDescripcion"],
								"giro" => $_POST["nuevoGiro"],
								"peligrosidad" => $_POST["nuevoPeligrosidad"],
								"valoar_aseguradora" => $_POST["nuevoValorA"],
								"valoar_apar" => $_POST["nuevoValorAP"]
								);

				$respuesta = ModeloMercancia::mdlIngresarMercancia($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Mercancia ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "mercancia";

						}
					});
					</script>';
				}	

			}
			else{

				echo '<script>

					swal.fire({

						type: "error",
						title: "¡La Mercancia no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "mercancia";

						}

					});
				

				</script>';

			}


		}
	}

	/*=============================================
	EDITAR GIRO
	=============================================*/

	static public function ctrEditarGiro(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "giro";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloMercancia::mdlEditarGiro($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El Giro ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "giro";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡El Giro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "giro";

							}
						})

			  	</script>';

			}

		}

	}
       /*=============================================
	EDITAR MERCANCIA
	=============================================*/

	static public function ctrEditarMercancia(){

		if(isset($_POST["EditarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])){

				$tabla = "mercancia";				

				$datos = array("descripcion" => $_POST["EditarDescripcion"],
                                               "giro" => $_POST["editarGiro"],
                                               "peligrosidad" => $_POST["editarPeligrosidad"],
                                                "valora" => $_POST["editarValorA"],
                                                "valorap" => $_POST["editarValorAP"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloMercancia::mdlEditarGiro($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "La Mercancia ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "mercancia";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡El Giro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "giro";

							}
						})

			  	</script>';

			}

		}

	}
}
	


			