<?php

class ControladorEstados{

	
	/*=============================================
	MOSTRAR Estado
	=============================================*/

	static public function ctrMostrarEstados($item, $valor){

		$tabla = "estados";

		$respuesta = ModeloEstados::mdlMostrarEstados($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR REGIMEN FISCAL
	=============================================*/

	static public function ctrMostrarRegimenFiscal($item, $valor){

		$tabla = "RegimenFiscal";

		$respuesta = ModeloEstados::mdlMostrarRegimenFiscal($tabla, $item, $valor);

		return $respuesta;
	}
		/*=============================================
	MOSTRAR USO CFDI
	=============================================*/

	static public function ctrMostrarUSOCFDI($item, $valor){

		$tabla = "UsoCFDI";

		$respuesta = ModeloEstados::mdlMostrarUSOCFDI($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Municipio
	=============================================*/

	static public function ctrMostrarMunicipio($item, $valor){

		$tabla = "municipios";

		$respuesta = ModeloEstados::mdlMostrarMunicipios($tabla, $item, $valor);

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
	


			