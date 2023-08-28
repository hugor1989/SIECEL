<?php

class ControladorPersona{

	/*=============================================
	REGISTRO DE ASOCIADO
	=============================================*/

	static public function ctrCrearPersona(){

		if(isset($_POST["nuevoNombre"])){

			//if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){


				/* echo '<script>
					alert("entro a guardar");
					</script>';
 */
				//echo $_POST["nuevoNombre"];

				$tabla = "persona";

               //Clave	Nombre	Empresa	RFC	Puesto	Calle	Numero_Interior	Numero_Exterior	Colonia
               //	Municipio	Estado	CodigoPostal	Pais	Email	Email_Adicional	Telefono	Celular	Lada	
               //Contacto	Nextel	CuentaBancaria	CuentaBancaria_Adicional	Giro	Tipo	Activo

			   $item2 = "RFC";
			   $valor2 = $_POST["nuevoRFC"];

			   $rfc = ModeloPersona::mdlValidarRFCNuevo($tabla, $item2, $valor2);

			   $numero = $rfc; 
			   if($numero != ""){

				echo '<script>

					Swal.fire({
						type: "danger",
						title: "¡El RFC ingresado ya se encuentra registrado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crear-cliente";
						}
					});
					</script>';
			   }else{

				
				$filename = $_FILES['fotoofac']['name'];

				// Location
				$location = 'vistas/img/ofac/'.$filename;
			
				// file extension
				$file_extension = pathinfo($location, PATHINFO_EXTENSION);
				$file_extension = strtolower($file_extension);
			
				// Valid extensions
				$valid_ext = array("jpg","png","jpeg");
			
				$response = "";
				if(in_array($file_extension,$valid_ext)){
					// Upload file
					if(move_uploaded_file($_FILES['fotoofac']['tmp_name'],$location)){
						$response = $location;
					} 
				}




				$tabla2 = "persona";

				$datos = array("nombre" => $_POST["nuevoNombre"],
							   "pais" => $_POST["nuevoPais"],
                                "rfc" => $_POST["nuevoRFC"],
								"tipopersona" => $_POST["tipopersona"],
                                "calle" => $_POST["nuevoCalle"],
                                "ninterior" => $_POST["nuevoNumeroInterior"],
                                "nexterior" => $_POST["nuevoNumeroExterior"],
                                "colonia" => $_POST["nuevoColonia"],
                                "municipio" => $_POST["nuevoMunicipio"],
                                "estado" => $_POST["nuevoEstado"],
                                "cp" => $_POST["nuevoCP"],
                                "email" => $_POST["nuevoEmail"],
							    "asociado" => $_POST["idasociado"],
							    "localidad" => $_POST["nuevoLocalidad"],
								/////Se Agregan los nuevos
								"RegimenFiscal" => $_POST["nuevoRegimenFiscal"],
								"NombreConracto" => $_POST["nuevoContactoNombre"],
								"PuestoConracto" => $_POST["nuevoContactoPuesto"],
								"EmailConracto" => $_POST["nuevoContactoEmail"],
								"TelefonoConracto" => $_POST["nuevoContactoTelefono"],
								"nuevoUsoCFDI" => $_POST["nuevoUsoCFDI"],
								"FotoOfac" => $response,
								
							  );

				$respuesta = ModeloPersona::mdlIngresarAsociado($tabla2, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Cliente ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crear-cliente";

						}
					});
					</script>';
				}else{

					echo '<script>

					Swal.fire({

						type: "error",
						title: "¡El Cliente no ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crear-cliente";

						}
					});
					</script>';
				}
				   
			   }
				
			/* }
			else{

				echo '<script>

					Swal.fire({

						type: "error",
						title: "¡El Cliente no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crear-cliente";

						}

					});
				

				</script>';

			} */


		}
	}

	/*=============================================
	MOSTRAR Reporte Apar
	=============================================*/
	static public function ctrMostrarReporte($item, $valor){

		$tabla = "";

		$respuesta = ModeloPersona::mdlMostrarReporte($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Reporte Asociado
	=============================================*/
	static public function ctrMostrarReporteAsociado($item, $valor){

		$tabla = "";

		$respuesta = ModeloPersona::mdlMostrarReporteAsociado($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Reporte Aseguradora
	=============================================*/
	static public function ctrMostrarReporteAseguradora($item, $valor){

		$tabla = "";

		$respuesta = ModeloPersona::mdlMostrarReporteAseguradora($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Asociado
	=============================================*/

	static public function ctrMostrarClientesListado(){

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarClientesListado($tabla);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR Asociado
	=============================================*/

	static public function ctrMostrarAsociado($item, $valor){

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarAsociado($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarAsociadoUsuario($item, $valor){

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarAsociadoUsuario($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarAsociadoItem($item, $valor){

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarAsociadoItem($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarAsociadoItemCompleto($item, $valor){

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarAsociadoItemCompleto($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarAsociadoItemEstado($item, $valor){

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarAsociadoItemEstado($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*=============================================
	EDITAR Asociado
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["nombre"])){

			//if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])){

				$tabla = "persona";	
				
				$ruta = $_POST["rutalactualofac"];
				$hoy = $_POST["fechaofac"];

				if(isset($_FILES['file']['name'])){


					date_default_timezone_set("America/Mexico_City");
					//$clave  = md5($password);
					$hoy = date('Y-m-d H:i:s');

					$filename = $_FILES['fotoofac']['name'];

					// Location
					$location = 'vistas/img/ofac/'.$filename;
				
					// file extension
					$file_extension = pathinfo($location, PATHINFO_EXTENSION);
					$file_extension = strtolower($file_extension);
				
					// Valid extensions
					$valid_ext = array("jpg","png","jpeg");
				
					
					if(in_array($file_extension,$valid_ext)){
						// Upload file
						if(move_uploaded_file($_FILES['fotoofac']['tmp_name'],$location)){
							$ruta  = $location;
						} 
					}

				}

				if ($_POST["IdPerfil"]  == 1){

				
				$datos = array("nombre" => $_POST["nombre"],
								"email" => $_POST["editarEmail"],
								"rfc" => $_POST["editarRFC"],
								"calle" => $_POST["editarCalle"],
								"ninterior" => $_POST["editarNumeroInterior"],
								"nexterior" => $_POST["editarNumeroExterior"],
								"colonia" => $_POST["editarColonia"],
								"municipio" => $_POST["editarMunicipio"],
								"cp" => $_POST["editarCP"],
								"estado" => $_POST["editarEstado"],
								"pais" => $_POST["editarPais"],
								"localidad" => $_POST["editarLocalidad"],
								"mciaaut" => $_POST["editarMercAut"],
								"rot" => $_POST["nuevoCuota_Rot"],
								"tr" => $_POST["nuevoCuota_TR"],
								"vt" => $_POST["nuevoCuotaBasica"],
								"tipocuota" => $_POST["editarCuotas"],
							   "id" => $_POST["id"] 
							   );
				}else{


				
					
	

					$datos = array("nombre" => $_POST["nombre"],
									"email" => $_POST["editarEmail"],
									"rfc" => "NA",
									"calle" => $_POST["editarCalle"],
									"ninterior" => $_POST["editarNumeroInterior"],
									"nexterior" => $_POST["editarNumeroExterior"],
									"colonia" => $_POST["editarColonia"],
									"municipio" => $_POST["editarMunicipio"],
									"cp" => $_POST["editarCP"],
									"estado" => $_POST["editarEstado"],
									"pais" => $_POST["editarPais"],
									"localidad" => $_POST["editarLocalidad"],
									"mciaaut" => "NA",
									"rot" => $_POST["nuevoCuota_Rot"],
									"tr" => $_POST["nuevoCuota_TR"],
									"vt" => $_POST["nuevoCuotaBasica"],
									"tipocuota" => $_POST["editarCuotas"],
									"id" => $_POST["id"],
									"FotoOfac" => $ruta,
									"fechaofac" => $hoy,
							  );

				}
				$respuesta = ModeloPersona::mdlEditarCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal.fire({
						  type: "success",
						  title: "El Cliente ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}


			/* }else{

				echo'<script>

					swal.fire({
						  type: "error",
						  title: "¡EL cLIENTE no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';

			} */

		}

	}
	
}