<?php 

include "dbconn.php";
include "sql_registro.php";
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	$method=$_POST['method'];
	$dtbs = new sql_registro();
	$retval = [];

	if($method == 'list_usarios'){
		$list = $dtbs->list_usuarios();
		$retval['status'] = $list[0];
		$retval['message'] = $list[1];
		$retval['data'] = $list[2];
		echo json_encode($retval);
	}
	
	if($method == 'iniciar_sesion'){
		$email = $_POST['Email'];
		$pass = $_POST['Password'];
		
		$list = $dtbs->iniciar_sesion($email,$pass);
		$retval['status'] = $list[0];
		$retval['message'] = $list[1];
		$retval['usuario'] = $list[2];
		//$retval['url'] = $list[3];
		echo json_encode($retval);
	}

	if($method == 'new_certificado'){
        $Idcotizacion = $_POST['Idcotizacion'];
		$Fecha = $_POST['Fecha'];
        $Folio = $_POST['Folio'];
        $Asosiado = $_POST['Asosiado'];
        $Cliente = $_POST['Cliente'];
        $Numero_guia = $_POST['Numero_guia'];
        $Identificador_Contenedor1 = $_POST['Identificador_Contenedor1'];
        $Identificador_Contenedor2 = $_POST['Identificador_Contenedor2']; 
        $Fecha_InicioCobertura = $_POST['Fecha_InicioCobertura'];
        $Hora_InicioCobertura = $_POST['Hora_InicioCobertura'];
		$PaisOrigenEmbarque  = $_POST['PaisOrigenEmbarque'];
        $OrigenCobertura  = $_POST['OrigenCobertura'];
        $EstadoOrigenCobertura  = $_POST['EstadoOrigenCobertura'];
        $MunicipioOrigenCobertura  = $_POST['MunicipioOrigenCobertura'];
        $PaisDestinoEmbarque  = $_POST['PaisDestinoEmbarque']; 
        $EstadoDestinoEmbarque  = $_POST['EstadoDestinoEmbarque'];
        $MunicipioDestinoEmbarque  = $_POST['MunicipioDestinoEmbarque'];
        $Medio_Transporte = $_POST['Medio_Transporte'];
        $Embarque = $_POST['Embarque'];
        $TipoLineaTransportista = $_POST['TipoLineaTransportista'];
        $TipoVehiculo =  $_POST['TipoVehiculo'];
        $LineaTransportista =  $_POST['LineaTransportista'];
        $Marca =  $_POST['Marca'];
        $Modelo =  $_POST['Modelo'];
        $TipoSeguro = $_POST['TipoSeguro'];
        $NumeroPlacas =  $_POST['NumeroPlacas'];
        $NumeroMotor =  $_POST['NumeroMotor'];
        $NumeroSerie =  $_POST['NumeroSerie'];
        $Color  =  $_POST['Color'];
        $NombreChofer =  $_POST['NombreChofer'];
        $Continuacion_Viaje =  $_POST['Continuacion_Viaje'];
        $Riesgos_cubiertos =  $_POST['Riesgos_cubiertos'];
        $Deducibles =  $_POST['Deducibles'];
        $DescripcionMercancia =  $_POST['DescripcionMercancia'];
        $Mercancia =  $_POST['Mercancia'];
        $TipoEmpaque =  $_POST['TipoEmpaque'];
        $Valor_Embarque =  $_POST['Valor_Embarque'];
        $Moneda =  $_POST['Moneda'];
        $Numero_remolque =  $_POST['Numero_remolque'];
        $Descripcion_seguridad =  $_POST['Descripcion_seguridad'];
        $Doble_remolque  =  $_POST['Doble_remolque'];
        $Ampara_contenedor  =  $_POST['Ampara_contenedor'];
        $Tipocontenedorprimero  =  $_POST['Tipocontenedorprimero'];
        $Tipocontenedorsegundo =  $_POST['Tipocontenedorsegundo'];
        $Sumasolicitadaprimero  =  $_POST['Sumasolicitadaprimero'];
        $Sumasolicitadasegundo  =  $_POST['Sumasolicitadasegundo'];
        $Tipodebien  =  $_POST['Tipodebien'];
        $CuotaMercanciaApar =  $_POST['CuotaMercanciaApar'];
        $PrimaNetaMercanciaApar =  $_POST['PrimaNetaMercanciaApar'];
        $PrimaNetaContenedorApar =  $_POST['PrimaNetaContenedorApar'];
        $PrimaNetaTotalApar  =  $_POST['PrimaNetaTotalApar'];
        $DerechoCertificadoApar  =  $_POST['DerechoCertificadoApar'];
        $IvaApar =  $_POST['IvaApar'];
        $PrimaTotalApar =  $_POST['PrimaTotalApar'];
        $CuotaMercanciaUsuario =  $_POST['CuotaMercanciaUsuario'];
        $PrimaNetaMercanciaUsuario =  $_POST['PrimaNetaMercanciaUsuario'];
        $PrimaNetaContenedorUsuario =  $_POST['PrimaNetaContenedorUsuario'];
        $PrimaNetaTotalUsuario  =  $_POST['PrimaNetaTotalUsuario'];
        $DerechoCertificadoUsuario  =  $_POST['DerechoCertificadoUsuario'];
        $IvaUsuario =  $_POST['IvaUsuario'];
        $PrimaTotalUsuario =  $_POST['PrimaTotalUsuario'];
        //Nuevas variables
        $Griro = $_POST['Griro'];
        $TipoTraslado = $_POST['TipoTraslado'];
        $valormercancia1  = $_POST['valormercancia1'];
        $valormercancia2 = $_POST['valormercancia2'];
        $valormercanciamaximo1 = $_POST['valormercanciamaximo1'];
        $valormercanciamaximo2 = $_POST['valormercanciamaximo2'];
        $TransporteAntiguedad = $_POST['TransporteAntiguedad'];
        $DescripcionCondicionesTER = $_POST['DescripcionCondicionesTER'];
        $ObservacionGnral = $_POST['ObservacionGnral'];
        $CuotaContenedor = $_POST['CuotaContenedor'];
        $CoberturaMercancia = $_POST['CoberturaMercancia'];
        $CoberturaContenedor = $_POST['CoberturaContenedor'];
		
		$new = $dtbs->new_certificado($Idcotizacion,$Fecha,$Folio,$Asosiado,$Cliente, $Numero_guia, $Identificador_Contenedor1, $Identificador_Contenedor2, 
                                      $Fecha_InicioCobertura,$Hora_InicioCobertura, $PaisOrigenEmbarque, $OrigenCobertura, $EstadoOrigenCobertura,
                                      $MunicipioOrigenCobertura, $PaisDestinoEmbarque, $EstadoDestinoEmbarque, $MunicipioDestinoEmbarque,
                                      $Medio_Transporte, $Embarque, $TipoLineaTransportista, $TipoVehiculo, $LineaTransportista,
                                      $Marca, $Modelo,$NumeroPlacas, $NumeroMotor, $NumeroSerie, $Color, $NombreChofer,
                                      $Continuacion_Viaje, $Riesgos_cubiertos, $Deducibles, $DescripcionMercancia, $Mercancia,
                                      $TipoEmpaque, $Valor_Embarque, $Moneda, $Numero_remolque, $Descripcion_seguridad,
                                      $Doble_remolque,$Ampara_contenedor,$Tipocontenedorprimero,$Tipocontenedorsegundo,$Sumasolicitadaprimero,
                                      $Sumasolicitadasegundo,$Tipodebien, $CuotaMercanciaApar, $PrimaNetaMercanciaApar, $PrimaNetaContenedorApar,
                                      $PrimaNetaTotalApar, $DerechoCertificadoApar, $IvaApar, $PrimaTotalApar,
                                      $CuotaMercanciaUsuario, $PrimaNetaMercanciaUsuario, $PrimaNetaContenedorUsuario, $PrimaNetaTotalUsuario,
                                      $DerechoCertificadoUsuario, $IvaUsuario, $PrimaTotalUsuario, $TipoSeguro,
                                      $Griro, $TipoTraslado, $valormercancia1, $valormercancia2,$valormercanciamaximo1,
                                      $valormercanciamaximo2,$TransporteAntiguedad,$DescripcionCondicionesTER,$ObservacionGnral,
                                      $CuotaContenedor,$CoberturaMercancia, $CoberturaContenedor); //, $Embarque, $TipoLineaTransportista, $TipoVehiculo, $LineaTransportista
		$retval['status'] = $new[0];
		$retval['message'] = $new[1];
		$retval['lastInsertId'] = $new[2];
		$retval['folio'] = $new[3];
        $retval['foliocotizacion'] = $new[4];
		echo json_encode($retval);
	}
    if($method == 'new_registro'){
		$Fecha = $_POST['Fecha'];
        $Folio = $_POST['Folio'];
        $Asosiado = $_POST['Asosiado'];
        $Cliente = $_POST['Cliente'];
        $Numero_guia = $_POST['Numero_guia'];
        $Identificador_Contenedor1 = $_POST['Identificador_Contenedor1'];
        $Identificador_Contenedor2 = $_POST['Identificador_Contenedor2']; 
        $Fecha_InicioCobertura = $_POST['Fecha_InicioCobertura'];
        $Hora_InicioCobertura = $_POST['Hora_InicioCobertura'];
		$PaisOrigenEmbarque  = $_POST['PaisOrigenEmbarque'];
        $OrigenCobertura  = $_POST['OrigenCobertura'];
        $EstadoOrigenCobertura  = $_POST['EstadoOrigenCobertura'];
        $MunicipioOrigenCobertura  = $_POST['MunicipioOrigenCobertura'];
        $PaisDestinoEmbarque  = $_POST['PaisDestinoEmbarque']; 
        $EstadoDestinoEmbarque  = $_POST['EstadoDestinoEmbarque'];
        $MunicipioDestinoEmbarque  = $_POST['MunicipioDestinoEmbarque'];
        $Medio_Transporte = $_POST['Medio_Transporte'];
        $Embarque = $_POST['Embarque'];
        $TipoLineaTransportista = $_POST['TipoLineaTransportista'];
        $TipoVehiculo =  $_POST['TipoVehiculo'];
        $LineaTransportista =  $_POST['LineaTransportista'];
        $Marca =  $_POST['Marca'];
        $Modelo =  $_POST['Modelo'];
        $TipoSeguro = $_POST['TipoSeguro'];
        $NumeroPlacas =  $_POST['NumeroPlacas'];
        $NumeroMotor =  $_POST['NumeroMotor'];
        $NumeroSerie =  $_POST['NumeroSerie'];
        $Color  =  $_POST['Color'];
        $NombreChofer =  $_POST['NombreChofer'];
        $Continuacion_Viaje =  $_POST['Continuacion_Viaje'];
        $Riesgos_cubiertos =  $_POST['Riesgos_cubiertos'];
        $Deducibles =  $_POST['Deducibles'];
        $DescripcionMercancia =  $_POST['DescripcionMercancia'];
        $Mercancia =  $_POST['Mercancia'];
        $TipoEmpaque =  $_POST['TipoEmpaque'];
        $Valor_Embarque =  $_POST['Valor_Embarque'];
        $Moneda =  $_POST['Moneda'];
        $Numero_remolque =  $_POST['Numero_remolque'];
        $Descripcion_seguridad =  $_POST['Descripcion_seguridad'];
        $Doble_remolque  =  $_POST['Doble_remolque'];
        $Ampara_contenedor  =  $_POST['Ampara_contenedor'];
        $Tipocontenedorprimero  =  $_POST['Tipocontenedorprimero'];
        $Tipocontenedorsegundo =  $_POST['Tipocontenedorsegundo'];
        $Sumasolicitadaprimero  =  $_POST['Sumasolicitadaprimero'];
        $Sumasolicitadasegundo  =  $_POST['Sumasolicitadasegundo'];
        $Tipodebien  =  $_POST['Tipodebien'];
        $CuotaMercanciaApar =  $_POST['CuotaMercanciaApar'];
        $PrimaNetaMercanciaApar =  $_POST['PrimaNetaMercanciaApar'];
        $PrimaNetaContenedorApar =  $_POST['PrimaNetaContenedorApar'];
        $PrimaNetaTotalApar  =  $_POST['PrimaNetaTotalApar'];
        $DerechoCertificadoApar  =  $_POST['DerechoCertificadoApar'];
        $IvaApar =  $_POST['IvaApar'];
        $PrimaTotalApar =  $_POST['PrimaTotalApar'];
        $CuotaMercanciaUsuario =  $_POST['CuotaMercanciaUsuario'];
        $PrimaNetaMercanciaUsuario =  $_POST['PrimaNetaMercanciaUsuario'];
        $PrimaNetaContenedorUsuario =  $_POST['PrimaNetaContenedorUsuario'];
        $PrimaNetaTotalUsuario  =  $_POST['PrimaNetaTotalUsuario'];
        $DerechoCertificadoUsuario  =  $_POST['DerechoCertificadoUsuario'];
        $IvaUsuario =  $_POST['IvaUsuario'];
        $PrimaTotalUsuario =  $_POST['PrimaTotalUsuario'];
        //Nuevas variables
        $Griro = $_POST['Griro'];
        $TipoTraslado = $_POST['TipoTraslado'];
        $valormercancia1  = $_POST['valormercancia1'];
        $valormercancia2 = $_POST['valormercancia2'];
        $valormercanciamaximo1 = $_POST['valormercanciamaximo1'];
        $valormercanciamaximo2 = $_POST['valormercanciamaximo2'];
        $TransporteAntiguedad = $_POST['TransporteAntiguedad'];
        $DescripcionCondicionesTER = $_POST['DescripcionCondicionesTER'];
        $ObservacionGnral = $_POST['ObservacionGnral'];
        $CuotaContenedor = $_POST['CuotaContenedor'];
        $CoberturaMercancia = $_POST['CoberturaMercancia'];
        $CoberturaContenedor = $_POST['CoberturaContenedor'];
		
		$new = $dtbs->new_registro($Fecha,$Folio,$Asosiado,$Cliente, $Numero_guia, $Identificador_Contenedor1, $Identificador_Contenedor2, 
                                   $Fecha_InicioCobertura,$Hora_InicioCobertura, $PaisOrigenEmbarque, $OrigenCobertura, $EstadoOrigenCobertura,
                                   $MunicipioOrigenCobertura, $PaisDestinoEmbarque, $EstadoDestinoEmbarque, $MunicipioDestinoEmbarque,
                                   $Medio_Transporte, $Embarque, $TipoLineaTransportista, $TipoVehiculo, $LineaTransportista,
                                   $Marca, $Modelo,$NumeroPlacas, $NumeroMotor, $NumeroSerie, $Color, $NombreChofer,
                                   $Continuacion_Viaje, $Riesgos_cubiertos, $Deducibles, $DescripcionMercancia, $Mercancia,
                                   $TipoEmpaque, $Valor_Embarque, $Moneda, $Numero_remolque, $Descripcion_seguridad,
                                   $Doble_remolque,$Ampara_contenedor,$Tipocontenedorprimero,$Tipocontenedorsegundo,$Sumasolicitadaprimero,
                                   $Sumasolicitadasegundo,$Tipodebien, $CuotaMercanciaApar, $PrimaNetaMercanciaApar, $PrimaNetaContenedorApar,
                                   $PrimaNetaTotalApar, $DerechoCertificadoApar, $IvaApar, $PrimaTotalApar,
                                   $CuotaMercanciaUsuario, $PrimaNetaMercanciaUsuario, $PrimaNetaContenedorUsuario, $PrimaNetaTotalUsuario,
                                   $DerechoCertificadoUsuario, $IvaUsuario, $PrimaTotalUsuario, $TipoSeguro,
                                   $Griro, $TipoTraslado, $valormercancia1, $valormercancia2,$valormercanciamaximo1,
                                   $valormercanciamaximo2,$TransporteAntiguedad,$DescripcionCondicionesTER,$ObservacionGnral,
                                   $CuotaContenedor,$CoberturaMercancia, $CoberturaContenedor); //, $Embarque, $TipoLineaTransportista, $TipoVehiculo, $LineaTransportista
		$retval['status'] = $new[0];
		$retval['message'] = $new[1];
		$retval['lastInsertId'] = $new[2];
		$retval['folio'] = $new[3];
		echo json_encode($retval);
	}

	if($method == 'rechazar_cotizacion'){
		$IdCotizacion = $_POST['IdCotizacion'];
		
		

		$edit = $dtbs->rechazar_cotizacion($IdCotizacion);
		$retval['status'] = $edit[0];
		$retval['message'] = $edit[1];
		echo json_encode($retval);
	}
    if($method == 'edit_registro'){
		$Id = $_POST['Id'];
		$Descripcion = $_POST['Descripcion'];
		

		$edit = $dtbs->edit_customer($Id,$Descripcion);
		$retval['status'] = $edit[0];
		$retval['message'] = $edit[1];
		echo json_encode($retval);
	}
}else{
	header("HTTP/1.1 401 Unauthorized");
    exit;
}