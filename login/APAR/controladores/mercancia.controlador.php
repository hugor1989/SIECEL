<?php

class ControladorMercancia{

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
								"valoar_apar" => $_POST["nuevoValorAP"],
								"rot" => $_POST["nuevoROT"],
								"tr" => $_POST["nuevoRobo"],
								"vt" => $_POST["nuevoVT"],
								"valora" => $_POST["nuevoIntervalo1"],
								"valorb" => $_POST["nuevoIntervalo2"],
								"valorc" => $_POST["nuevoIntervalo3"],
								"valord" => $_POST["nuevoIntervalo4"],
								"valore" => $_POST["nuevoIntervalo5"],
								"valorf" => $_POST["nuevoIntervalo6"]
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
	MOSTRAR GIRO
	=============================================*/

	static public function ctrMostrarGiro($item, $valor){

		$tabla = "giro";

		$respuesta = ModeloMercancia::mdlMostrarGiro($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR MERCANCIAS
	=============================================*/

	static public function ctrMostrarMercancia($item, $valor){

		$tabla = "mercancia";

		$respuesta = ModeloMercancia::mdlMostrarMercancia($tabla, $item, $valor);

		return $respuesta;
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

		if(isset($_POST["editarDescripcion"])){

		//	if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tabla = "mercancia";				

				$datos = array("descripcion" => $_POST["editarDescripcion"],
									"giro" => $_POST["editarGiro"],
									"peligrosidad" => $_POST["editarPeligrosidad"],
									"valoraseguradora" => $_POST["editarValorA"],
									"valorap" => $_POST["editarValorAP"],
									"rot" => $_POST["editarROT"],
									"tr" => $_POST["editarRobo"],
									"vt" => $_POST["editarVT"],
									"valora" => $_POST["editarIntervalo1"],
									"valorb" => $_POST["editarIntervalo2"],
									"valorc" => $_POST["editarIntervalo3"],
									"valord" => $_POST["editarIntervalo4"],
									"valore" => $_POST["editarIntervalo5"],
									"valorf" => $_POST["editarIntervalo6"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloMercancia::mdlEditarMercancia($tabla, $datos);

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


		//	}
			/* else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡La Mercancia no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "mercancia";

							}
						})

			  	</script>';

			} */

		}

	}
}
	


			