<?php

require_once "conexion.php";

class ModeloPersona{



/*=============================================
	MOSTRAR REPORTE APAR
	=============================================*/
	static public function mdlMostrarReporte($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT Date_format(CR.Fecha,'%M') AS Mes, CR.Id, '50-GP41007022' AS NumeroPoliza, DATE_FORMAT(CR.Fecha,'%d/%m/%Y') AS FechaSolicitud, 
													CR.Fecha_InicioCobertura AS FechaInicioCobertura, CR.Folio AS IDEmbarque, CL.Nombre AS Beneficiario, MCN.Descripcion as Mercancia,
													CR.Asociado, US.Nombre AS Asociado, if(CR.Doble_remolque = 'No','1','2') as Gargafull, CR.Descripcion_seguridad AS Protocolo,
													CR.Valor_Serguro AS ValorSeguro, CR.Valor_Embarque AS SumaAsegurada, CR.CuotaMercanciaApar AS Cuota,CR.PrimaNetaMercanciaApar AS Primeneta,
													CR.Ampara_contenedor AS ContenedorAmaparado, (CR.valormercanciauno + CR.valormercanciados) AS ValorContenedor,
													CR.PrimaNetaContenedorApar AS PMContenedor, (CR.PrimaNetaMercanciaApar + CR.PrimaNetaContenedorApar) AS PMCNPM,
													CR.LineaTransportista as MedioTransporte, CR.Continuacion_Viaje AS ContinuacionViaje, CR.Riesgos_cubiertos AS RiesgosCubiertos,
													concat(CR.MunicipioOrigenCobertura, ',', CR.EstadoOrigenCobertura,',',CR.PaisOrigenEmbarque) AS Origen,
													concat(CR.MunicipioDestinoEmbarque, ',', CR.EstadoDestinoEmbarque,',',CR.PaisDestinoEmbarque) AS Destino,
													CR.PaisOrigenEmbarque AS PaisOrigenCobertura, CR.PaisDestinoEmbarque AS PaisDestinoCobertura,
													CR.LineaTransportista AS Transportista, CR.Mercancia, MCN.Descripcion AS DescripcionMercancia, MCN.Giro AS Grupo,
													CR.valormercanciamaximouno AS SAContenedoruno, CR.valormercanciamaximodos AS SAContenedordos,
													CR.Asociado AS IdAsociado, US.Nombre AS AgenteAsociad,
													CR.CuotaMercanciaUsuario AS CuotaAsociado, CR.PrimaNetaTotalUsuario AS PMAsociado, CR.DerechoCertificadoUsuario AS DerechoCertificado,
													CR.PrimaNetaMercanciaApar AS PNFACTAPAR, CR.IvaApar AS IVAPAR, CR.PrimaTotalApar AS PrimatotalApar
													FROM certificado CR 
													INNER JOIN persona CL ON (CL.Id=CR.Cliente)
													INNER JOIN mercancia MCN ON (MCN.Id=CR.Mercancia)
													INNER JOIN usuario US ON (US.Id=CR.Asociado)" ) ;

			$stmt -> execute();

			return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR REPORTE APAR
	=============================================*/
	static public function mdlMostrarReporteAsociado($tabla, $item, $valor){

		if($item != null){
		

			/* if($valor == null){

				$valor = 106;
			} */

			$stmt = Conexion::conectar()->prepare("SELECT Date_format(CR.Fecha,'%M') AS Mes, CR.Id, '50-GP41007022' AS NumeroPoliza, DATE_FORMAT(CR.Fecha,'%d/%m/%Y') AS FechaSolicitud, 
												CR.Fecha_InicioCobertura AS FechaInicioCobertura, CR.Folio AS IDEmbarque, CL.Nombre AS Beneficiario, MCN.Descripcion as Mercancia,
												CR.Asociado, US.Nombre AS Asociado, if(CR.Doble_remolque = 'No','1','2') as Gargafull, CR.Descripcion_seguridad AS Protocolo,
												CR.Valor_Serguro AS ValorSeguro, CR.Valor_Embarque AS SumaAsegurada, CR.CuotaMercanciaApar AS Cuota,CR.PrimaNetaMercanciaApar AS Primeneta,
												CR.Ampara_contenedor AS ContenedorAmaparado, (CR.valormercanciauno + CR.valormercanciados) AS ValorContenedor,
												CR.PrimaNetaContenedorApar AS PMContenedor, (CR.PrimaNetaMercanciaApar + CR.PrimaNetaContenedorApar) AS PMCNPM,
												CR.LineaTransportista as MedioTransporte, CR.Continuacion_Viaje AS ContinuacionViaje, CR.Riesgos_cubiertos AS RiesgosCubiertos,
												concat(CR.MunicipioOrigenCobertura, ',', CR.EstadoOrigenCobertura,',',CR.PaisOrigenEmbarque) AS Origen,
												concat(CR.MunicipioDestinoEmbarque, ',', CR.EstadoDestinoEmbarque,',',CR.PaisDestinoEmbarque) AS Destino,
												CR.PaisOrigenEmbarque AS PaisOrigenCobertura, CR.PaisDestinoEmbarque AS PaisDestinoCobertura,
												CR.LineaTransportista AS Transportista, CR.Mercancia, MCN.Descripcion AS DescripcionMercancia, MCN.Giro AS Grupo,
												CR.valormercanciamaximouno AS SAContenedoruno, CR.valormercanciamaximodos AS SAContenedordos,
												CR.Asociado AS IdAsociado, US.Nombre AS AgenteAsociad
												FROM certificado CR 
												INNER JOIN persona CL ON (CL.Id=CR.Cliente)
												INNER JOIN mercancia MCN ON (MCN.Id=CR.Mercancia)
												INNER JOIN usuario US ON (US.Id=CR.Asociado)
												WHERE CR.Asociado = $valor ") ;

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		
	$stmt -> close();

	$stmt = null;

}
/*=============================================
	MOSTRAR REPORTE APAR
	=============================================*/
	static public function mdlMostrarReporteAseguradora($tabla, $item, $valor){

		
			$stmt = Conexion::conectar()->prepare("SELECT Date_format(CR.Fecha,'%M') AS Mes, CR.Id, '50-GP41007022' AS NumeroPoliza, DATE_FORMAT(CR.Fecha,'%d/%m/%Y') AS FechaSolicitud, 
												CR.Fecha_InicioCobertura AS FechaInicioCobertura, CR.Folio AS IDEmbarque, CL.Nombre AS Beneficiario, MCN.Descripcion as Mercancia,
												CR.Asociado, US.Nombre AS Asociado, if(CR.Doble_remolque = 'No','1','2') as Gargafull, CR.Descripcion_seguridad AS Protocolo,
												CR.Valor_Serguro AS ValorSeguro, CR.Valor_Embarque AS SumaAsegurada, CR.CuotaMercanciaApar AS Cuota,CR.PrimaNetaMercanciaApar AS Primeneta,
												CR.Ampara_contenedor AS ContenedorAmaparado, (CR.valormercanciauno + CR.valormercanciados) AS ValorContenedor,
												CR.PrimaNetaContenedorApar AS PMContenedor, (CR.PrimaNetaMercanciaApar + CR.PrimaNetaContenedorApar) AS PMCNPM,
												CR.LineaTransportista as MedioTransporte, CR.Continuacion_Viaje AS ContinuacionViaje, CR.Riesgos_cubiertos AS RiesgosCubiertos,
												concat(CR.MunicipioOrigenCobertura, ',', CR.EstadoOrigenCobertura,',',CR.PaisOrigenEmbarque) AS Origen,
												concat(CR.MunicipioDestinoEmbarque, ',', CR.EstadoDestinoEmbarque,',',CR.PaisDestinoEmbarque) AS Destino,
												CR.PaisOrigenEmbarque AS PaisOrigenCobertura, CR.PaisDestinoEmbarque AS PaisDestinoCobertura,
												CR.LineaTransportista AS Transportista, CR.Mercancia, MCN.Descripcion AS DescripcionMercancia, MCN.Giro AS Grupo,
												CR.valormercanciamaximouno AS SAContenedoruno, CR.valormercanciamaximodos AS SAContenedordos,
												CR.Asociado AS IdAsociado, US.Nombre AS AgenteAsociad
												FROM certificado CR 
												INNER JOIN persona CL ON (CL.Id=CR.Cliente)
												INNER JOIN mercancia MCN ON (MCN.Id=CR.Mercancia)
												INNER JOIN usuario US ON (US.Id=CR.Asociado) ") ;

			$stmt -> execute();

			return $stmt -> fetchAll();
		
	$stmt -> close();

	$stmt = null;

}


	/*=============================================
	MOSTRAR clientes LISTADO
	=============================================*/

	static public function mdlMostrarClientesListado($tabla){

		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Tipo=2");

			$stmt -> execute();

			return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR ASOCIADO
	=============================================*/

	static public function mdlMostrarAsociado($tabla, $item, $valor){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND Tipo= 2 ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Tipo=2");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarAsociadoItem($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND Tipo= 2 ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarAsociadoItemCompleto($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT PR.*, MN.nombre AS MunicipioDescripcion, EST.nombre AS EstadoDescripcion
													FROM persona PR
													LEFT JOIN municipios MN ON (MN.id=PR.Municipio)
													LEFT JOIN estados EST ON (EST.id=PR.Estado)
												   WHERE PR.$item = :$item AND PR.Tipo= 2 ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarAsociadoItemEstado($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND Tipo= 2 ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	VALIDAR SI RFC EXISTE usado en controlados
	=============================================*/
	static public function mdlValidarRFCNuevo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND Tipo= 2 ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetchColumn();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	VALIDAR SI RFC EXISTE
	=============================================*/
	static public function mdlValidarRFC($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND Tipo= 2 ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	
	/*=============================================
	REGISTRO DE ASOCIADO
	=============================================*/

	static public function mdlIngresarAsociado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Clave,Nombre,RFC,Calle,Numero_Interior,Numero_Exterior,Colonia,Municipio,Estado,CodigoPostal,Pais,Email,Tipo, Asociado, Localidad, MercanciaAutorizada) 
												VALUES (:Clave,:Nombre,:RFC,:Calle,:Numero_Interior,:Numero_Exterior,:Colonia,:Municipio,:Estado,:CodigoPostal,:Pais,:Email,:Tipo, :Asociado, :Localidad, :MercanciaAutorizada)");

		$clave = "1";
		$mercanciautorizada = "0,";
		
        $stmt->bindParam(":Clave", $clave);
		$stmt->bindParam(":Nombre", $datos["nombre"]);
		$stmt->bindParam(":Pais", $datos["pais"]);
		$stmt->bindParam(":RFC", $datos["rfc"]);
		$stmt->bindParam(":Calle", $datos["calle"]);
        $stmt->bindParam(":Numero_Interior", $datos["ninterior"]);
		$stmt->bindParam(":Numero_Exterior", $datos["nexterior"]);
		$stmt->bindParam(":Colonia", $datos["colonia"]);
		$stmt->bindParam(":Municipio", $datos["municipio"]);
		$stmt->bindParam(":Estado", $datos["estado"]);
		$stmt->bindParam(":CodigoPostal", $datos["cp"]);
		$stmt->bindParam(":Email", $datos["email"]);
		$stmt->bindParam(":Tipo", $datos["tipopersona"]);
		$stmt->bindParam(":Asociado", $datos["asociado"]);
		$stmt->bindParam(":Localidad", $datos["localidad"]);
		$stmt->bindParam(":MercanciaAutorizada", $mercanciautorizada);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	
	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1);
		$stmt -> bindParam(":".$item2, $valor2);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		if ($datos["rfc"] == "NA"){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, Email = :Email,
																	Calle= :Calle, Numero_Interior = :Numero_Interior, Numero_Exterior = :Numero_Exterior,
																	Colonia = :Colonia, Municipio = :Municipio, CodigoPostal = :CodigoPostal,
																	Estado = :Estado, Pais = :Pais, Localidad=:Localidad,
																	Cuota_ROT = :Cuota_ROT, Cuota_TR =:Cuota_TR, Cuota_TRVT=:Cuota_TRVT, TipoCuota=:TipoCuota
												 WHERE Id = :Id");

			$stmt -> bindParam(":Nombre", $datos["nombre"]);
			$stmt -> bindParam(":Email", $datos["email"]);
			$stmt -> bindParam(":Calle", $datos["calle"]);
			$stmt -> bindParam(":Numero_Interior", $datos["ninterior"]);
			$stmt -> bindParam(":Numero_Exterior", $datos["nexterior"]);
			$stmt -> bindParam(":Colonia", $datos["colonia"]);
			$stmt -> bindParam(":Municipio", $datos["municipio"]);
			$stmt -> bindParam(":CodigoPostal", $datos["cp"]);
			$stmt -> bindParam(":Estado", $datos["estado"]);
			$stmt -> bindParam(":Pais", $datos["pais"]);
			$stmt -> bindParam(":Localidad", $datos["localidad"]);
			$stmt -> bindParam(":Cuota_ROT", $datos["rot"]);
			$stmt -> bindParam(":Cuota_TR", $datos["tr"]);
			$stmt -> bindParam(":Cuota_TRVT", $datos["vt"]);
			$stmt -> bindParam(":TipoCuota", $datos["tipocuota"]);
			$stmt -> bindParam(":Id", $datos["id"]);

		}else {

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, RFC = :RFC, Email = :Email,
																 Calle= :Calle, Numero_Interior = :Numero_Interior, Numero_Exterior = :Numero_Exterior,
																 Colonia = :Colonia, Municipio = :Municipio, CodigoPostal = :CodigoPostal,
																 Estado = :Estado, Pais = :Pais, Localidad=:Localidad, MercanciaAutorizada=:MercanciaAutorizada,
																 Cuota_ROT = :Cuota_ROT, Cuota_TR =:Cuota_TR, Cuota_TRVT=:Cuota_TRVT, TipoCuota=:TipoCuota
																 WHERE Id = :Id");

			$stmt -> bindParam(":Nombre", $datos["nombre"]);
			$stmt -> bindParam(":RFC", $datos["rfc"]);
			$stmt -> bindParam(":Email", $datos["email"]);
			$stmt -> bindParam(":Calle", $datos["calle"]);
			$stmt -> bindParam(":Numero_Interior", $datos["ninterior"]);
			$stmt -> bindParam(":Numero_Exterior", $datos["nexterior"]);
			$stmt -> bindParam(":Colonia", $datos["colonia"]);
			$stmt -> bindParam(":Municipio", $datos["municipio"]);
			$stmt -> bindParam(":CodigoPostal", $datos["cp"]);
			$stmt -> bindParam(":Estado", $datos["estado"]);
			$stmt -> bindParam(":Pais", $datos["pais"]);
			$stmt -> bindParam(":Localidad", $datos["localidad"]);
			$stmt -> bindParam(":MercanciaAutorizada", $datos["mciaaut"]);
			$stmt -> bindParam(":Cuota_ROT", $datos["rot"]);
			$stmt -> bindParam(":Cuota_TR", $datos["tr"]);
			$stmt -> bindParam(":Cuota_TRVT", $datos["vt"]);
			$stmt -> bindParam(":TipoCuota", $datos["tipocuota"]);
			$stmt -> bindParam(":Id", $datos["id"]);

		}
		
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}