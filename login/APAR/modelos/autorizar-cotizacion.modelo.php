<?php

require_once "conexion.php";

class ModeloAutorizarCotizacion{

	
	/*=============================================
	MOSTRAR mdlMostrarPais
	=============================================*/

	static public function mdlMostrarCotizaciones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT CT.ID, CT.Folio, CT.Fecha, CT.Cliente, CT.Asociado, CT.Estatus, 
                                                          US.Nombre as AsociadoNombre, CL.Nombre as ClienteDescripcion
                                                    FROM cotizacion CT
                                                    INNER JOIN usuario US ON (US.Id=CT.Asociado)
                                                    INNER JOIN persona CL ON (CL.Id=CT.Cliente) WHERE CT.Estatus='Pendiente' ");

            $stmt -> execute();

            return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT CT.ID, CT.Folio, CT.Fecha, CT.Cliente, CT.Asociado, CT.Estatus, 
                                                            US.Nombre as AsociadoNombre, CL.Nombre as ClienteDescripcion
                                                    FROM cotizacion CT
                                                    INNER JOIN usuario US ON (US.Id=CT.Asociado)
                                                    INNER JOIN persona CL ON (CL.Id=CT.Cliente) WHERE CT.Estatus='Pendiente'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	MOSTRAR COtizaciones
	=============================================*/

	static public function mdlMostrarCotizacionesN($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM cotizacion where $item = :$item AND Estatus='Pendiente' ");

			$stmt -> bindParam(":".$item, $valor);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR Certificados
	=============================================*/

	static public function mdlMostrarCertificado($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT CER.Id, CER.Fecha, CER.Folio as Foliocertificado, US.Nombre AS AsociadoDescripcion, CER.Asociado, 
														  CL.Nombre as ClienteDescripcion, CER.Cliente, CT.Folio
													FROM certificado CER
													INNER JOIN usuario US ON (US.Id=CER.Asociado)
													INNER JOIN persona CL ON (CL.Id=CER.Cliente)
													INNER JOIN cotizacion CT ON (CT.Id=CER.IdCotizacion)
													where CER.Asociado = $valor  ");
			
            $stmt -> execute();

            return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT CER.Id, CER.Fecha, CER.Folio as Foliocertificado, US.Nombre AS AsociadoDescripcion, CER.Asociado, 
															CL.Nombre as ClienteDescripcion, CER.Cliente, CT.Folio
													FROM certificado CER
													INNER JOIN usuario US ON (US.Id=CER.Asociado)
													INNER JOIN persona CL ON (CL.Id=CER.Cliente)
													INNER JOIN cotizacion CT ON (CT.Id=CER.IdCotizacion) ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

}	