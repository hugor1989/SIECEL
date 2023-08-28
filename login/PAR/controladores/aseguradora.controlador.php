<?php

class ControladorAseguradora{

	/*=============================================
	REGISTRO DE ASEGURADORA
	=============================================*/

	static public function ctrCrearAseguradora(){

		if(isset($_POST["nuevoDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcion"])){

				$tmp_name = $_FILES["nuevaFoto"]["tmp_name"];
				$name = "vistas/img/aseguradora/".$_FILES['nuevaFoto']['name'];
				$filename=$_FILES['nuevaFoto']['name'];

				//Codigo para archivo pdf
				$file_name = "";
				if (isset($_FILES['pdf_file']['name']))
				{
					$file_name = $_FILES['pdf_file']['name'];
					$namepdf = "vistas/pdf/aseguradoraspdf/".$_FILES['pdf_file']['name'];
					$file_tmp = $_FILES['pdf_file']['tmp_name'];
					// Move the uploaded pdf file into the pdf folder
					move_uploaded_file($file_tmp,$namepdf);
				}
				

				if(move_uploaded_file($tmp_name,$name))
				{
					$tabla = "aseguradora";
					//$ruta = $dir.$nombreArchivo;

					$datos = array("descripcion" => $_POST["nuevoDescripcion"],
								"rfc" => $_POST["nuevoRFC"],
								"vt" => $_POST["nuevoCuotaBasica"],
									"cuota_rot" => $_POST["nuevoCuota_Rot"],
									"cuota_tr" => $_POST["nuevoCuota_TR"],
									"cuota_contenedor" => $_POST["nuevoCuota_Contenedor"],
									"direccion" => $_POST["nuevoDireccion"],
									"poliza" => $_POST["nuevoPoliza"],
									"condicionesgenerales" => $namepdf,
									"telefono" => $_POST["nuevoTelefono"],
									"ruta" => $name,
									"pdf" => file_get_contents($_FILES['pdf_file']['name'])
								);

					$respuesta = ModeloAseguradora::mdlIngresarAseguradora($tabla, $datos);
				
					if($respuesta == "ok"){

						echo '<script>

						Swal.fire({

							type: "success",
							title: "¡La Aseguradora ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "aseguradora";

							}
						});
						</script>';
					}
					
				}else{

					echo '<script>

					swal.fire({

						type: "error",
						title: "¡Error al subir imagen, favor de intentar de nuevo!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "aseguradora";

						}

					});
				

				</script>';
	
					
				}	

			}
			else{

				echo '<script>

					swal.fire({

						type: "error",
						title: "¡La Descripcion no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "aseguradora";

						}

					});
				

				</script>';

			}


		}
	}
	/*=============================================
	REGISTRO DE CuotaAseguradora 
	=============================================*/

	static public function ctrCrearCuotaAseguradora(){

		if(isset($_POST["nuevoAseguradora"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAseguradora"])){


				$tabla = "cuota_aseguradora";
				//Aseguradora	Cuota_Basica	Cuota_Rot	Cuota_TR	Cuota_Contenedor

				 $datos = array("aseguradora" => $_POST["nuevoAseguradora"],
								"cuota_basica" => $_POST["nuevoCuotaBasica"],
								"cuota_rot" => $_POST["nuevoCuota_Rot"],
								"cuota_tr" => $_POST["nuevoCuota_TR"],
								"cuota_contenedor" => $_POST["nuevoCuota_Contenedor"]
								
								);

				$respuesta = ModeloAseguradora::mdlIngresarCuotaAseguradora($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Cuota de Aseguradora ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cuota-aseguradora";

						}
					});
					</script>';
				}	

			}else{

				echo '<script>

					swal.fire({

						type: "error",
						title: "¡La Cuota de Aseguradora no puede ir vacío o llevar caracteres especiales!",
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
	REGISTRO DE CuotaAseguradora 
	=============================================*/

	static public function ctrCrearCuota(){

		if(isset($_POST["nuevoAsociado"])){

				$tabla = "cuota";
				//Asociado	Comision	Prefijo	Cuota_Aseguradora

				$itemA = "Id";
                $valorA = $_POST["nuevoAsociado"];
                         
                $asociado = ControladorPersona::ctrMostrarAsociado($itemA, $valorA);
				$prefijo = substr($asociado["Nombre"],-3);

				 $datos = array("asociado" => $_POST["nuevoAsociado"],
								"comision" => $_POST["nuevoComision"],
								"prefijo" => $prefijo,
								"cuotaaseguradora" => $_POST["nuevoCuota_Aseguradora"]
								);

				$respuesta = ModeloAseguradora::mdlIngresarCuota($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Cuota ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cuota";

						}
					});
					</script>';
				}	

		}
	}

	/*=============================================
	MOSTRAR ASEGURADORA
	=============================================*/

	static public function ctrMostrarAseguradora($item, $valor){

		$tabla = "aseguradora";

		$respuesta = ModeloAseguradora::mdlMostrarAseguradora($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR CUOTA
	=============================================*/

	static public function ctrMostrarCuota($item, $valor){

		$tabla = "cuota";

		$respuesta = ModeloAseguradora::mdlMostrarCuota($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR CUOTA ASEGURADORA
	=============================================*/

	static public function ctrMostrarCuota_Aseguradora($item, $valor){

		$tabla = "cuota_aseguradora";

		$respuesta = ModeloAseguradora::mdlMostrarCuotaAseguradora($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ASEGURADORA
	=============================================*/

	static public function ctrEditarAseguradora(){

		if(isset($_POST["editarDescripcion"])){

			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tmp_name = $_FILES["editarFoto"]["tmp_name"];

				if(isset($tmp_name) && $tmp_name !="" && $tmp_name !=" "){

					

					$tmp_name = $_FILES["editarFoto"]["tmp_name"];
					$name = "vistas/img/aseguradora/".$_FILES['editarFoto']['name'];
					$filename=$_FILES['editarFoto']['name'];

					//Codigo para el pdf
					//Codigo para archivo pdf
					$file_name = "";
					if (isset($_FILES['editarpdf_file']['name']))
					{
						$file_name = $_FILES['editarpdf_file']['name'];
						$namepdf = "vistas/pdf/aseguradoraspdf/".$_FILES['editarpdf_file']['name'];
						$file_tmp = $_FILES['editarpdf_file']['tmp_name'];
						// Move the uploaded pdf file into the pdf folder
						move_uploaded_file($file_tmp,$namepdf);
					}else{
						
						$file_name = $_POST["rutaactualpdf"];
					}

					/////////
					if(move_uploaded_file($tmp_name,$name)){
						$tabla = "aseguradora";
						//$ruta = $dir.$nombreArchivo;

						$datos = array("descripcion" => $_POST["editarDescripcion"],
									"rfc" => $_POST["editarRFC"],
									"vt" => $_POST["editarCuotaBasica"],
									"cuota_rot" => $_POST["editarCuota_Rot"],
									"cuota_tr" => $_POST["editarCuota_TR"],
									"cuota_contenedor" => $_POST["editarCuota_Contenedor"],
									"direccion" => $_POST["editarDireccion"],
									"poliza" => $_POST["editarPoliza"],
									"condicionesgenerales" => $namepdf,
									"telefono" => $_POST["editarTelefono"],
									"ruta" => $name,
									"id" => $_POST["id"]);

					

						$respuesta = ModeloAseguradora::mdlEditarAseguradora($tabla, $datos);
					
						if($respuesta == "ok"){

							echo '<script>

							Swal.fire({

								type: "success",
								title: "¡La Aseguradora ha sido actualizada correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "aseguradora";

								}
							});
							</script>';
						}
						
					}

				}else{

				
					//Codigo para el pdf
					//Codigo para archivo pdf
					$namepdf = "";
					if (isset($_FILES['editarpdf_file']['name']))
					{
						$file_name = $_FILES['editarpdf_file']['name'];
						$namepdf = "vistas/pdf/aseguradoraspdf/".$_FILES['editarpdf_file']['name'];
						$file_tmp = $_FILES['editarpdf_file']['tmp_name'];

						
						// Move the uploaded pdf file into the pdf folder
						move_uploaded_file($file_tmp,$namepdf);

						//$namepdf = base64_encode(file_get_contents($file_tmp));

						///$namepdf = fopen($file_tmp, "rb")
					}else{
						
						$namepdf = $_POST["rutaactualpdf"];
					}

					$tabla = "aseguradora";

				

					$datos = array("descripcion" => $_POST["editarDescripcion"],
									"rfc" => $_POST["editarRFC"],
									"vt" => $_POST["editarCuotaBasica"],
									"cuota_rot" => $_POST["editarCuota_Rot"],
									"cuota_tr" => $_POST["editarCuota_TR"],
									"cuota_contenedor" => $_POST["editarCuota_Contenedor"],
									"direccion" => $_POST["editarDireccion"],
									"poliza" => $_POST["editarPoliza"],
									"condicionesgenerales" => $namepdf,
									"telefono" => $_POST["editarTelefono"],
									"ruta" => $_POST["rutaactual"],
									"id" => $_POST["id"]);
	
					$respuesta = ModeloAseguradora::mdlEditarAseguradora($tabla, $datos);
	
					if($respuesta == "ok"){
	
						echo'<script>
	
						Swal.fire({
							  type: "success",
							  title: "La Aseguradora ha sido actualizada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result) {
										if (result.value) {
	
										window.location = "aseguradora";
	
										}
									})
	
						</script>';
	
					}

				}

			}else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡La Descripcion no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "aseguradora";

							}
						})

			  	</script>';

			}

		}

	}
	/*=============================================
	EDITAR Cuota
	=============================================*/

	static public function ctrEditarCuota(){

		if(isset($_POST["EditarAsociado"])){

			
				$tabla = "cuota";				

				$datos = array("asociado" => $_POST["EditarAsociado"],
								"comision" => $_POST["EditarComision"],
								"prefijo" => $_POST["EditarPrefijo"],
								"cuota" => $_POST["EditarCuota"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloAseguradora::mdlEditarCuota($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "La Cuota  ha sido editado correctamente",
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
	EDITAR CUOTA ASEGURADORA
	=============================================*/

	static public function ctrEditarCuotaAseguradora(){

		if(isset($_POST["EditarCuota_Basica"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCuota_Basica"])){

				$tabla = "couto_aseguradora";				
				
				//Aseguradora	Cuota_Basica	Cuota_Rot	Cuota_TR	Cuota_Contenedor
				$datos = array("descripcion" => $_POST["EditarCuota_Basica"],
                               "cuota_rot" => $_POST["editarCuota_Rot"],
                               "cuota_tr" => $_POST["editarCuota_TR"],
                               "cuota_contenedor" => $_POST["editarCuota_Contenedor"],
							   "id" => $_POST["id"]);

				$respuesta = ModeloAseguradora::mdlEditarCuotaAseguradora($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "La Cuota ha sido editado correctamente",
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
						  title: "¡La Cuota no puede ir vacío o llevar caracteres especiales!",
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