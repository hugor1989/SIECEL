<?php
 session_start();

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 require '../vistas/lib/vendor/autoload.php';

class sql_registro extends dbconn {
	public function __construct()
	{
		$this->initDBO();
	}

	public function new_registro($Fecha,$Folio,$Asosiado,$Cliente,$Numero_guia, $Identificador_Contenedor1, $Identificador_Contenedor2, 
                                 $Fecha_InicioCobertura,$Hora_InicioCobertura, $PaisOrigenEmbarque, $OrigenCobertura, $EstadoOrigenCobertura,
                                 $MunicipioOrigenCobertura, $PaisDestinoEmbarque, $EstadoDestinoEmbarque, $MunicipioDestinoEmbarque,
                                 $Medio_Transporte, $Embarque, $TipoLineaTransportista, $TipoVehiculo, $LineaTransportista,
                                 $Marca, $Modelo, $NumeroPlacas, $NumeroMotor, $NumeroSerie, $Color, $NombreChofer,
                                 $Continuacion_Viaje, $Riesgos_cubiertos, $Deducibles, $DescripcionMercancia, $Mercancia,
                                 $TipoEmpaque, $Valor_Embarque, $Moneda, $Numero_remolque, $Descripcion_seguridad,
                                 $Doble_remolque,$Ampara_contenedor,$Tipocontenedorprimero,$Tipocontenedorsegundo,$Sumasolicitadaprimero,
                                 $Sumasolicitadasegundo, $Tipodebien, $CuotaMercanciaApar, $PrimaNetaMercanciaApar, $PrimaNetaContenedorApar,
                                 $PrimaNetaTotalApar, $DerechoCertificadoApar, $IvaApar, $PrimaTotalApar,
                                 $CuotaMercanciaUsuario, $PrimaNetaMercanciaUsuario, $PrimaNetaContenedorUsuario, $PrimaNetaTotalUsuario,
                                 $DerechoCertificadoUsuario, $IvaUsuario, $PrimaTotalUsuario, $TipoSeguro,
								 $Griro, $TipoTraslado, $valormercancia1, $valormercancia2,$valormercanciamaximo1,
                                 $valormercanciamaximo2,$TransporteAntiguedad,$ObservacionGnral,
                                 $CuotaContenedor,$CoberturaMercancia, $CoberturaContenedor,$ComentariosRevision,$Status) //$LineaTransportista
	{
		$db = $this->dblocal;
		try
		{
			$Estatus=$Status;
			//Se tratan las fechas
            $originalDate = $Fecha;
            $newDate = date("Y-m-d", strtotime($originalDate));
            
            $originalFechaCobertura = $Fecha_InicioCobertura;
            $fechacobertura = date("Y-m-d", strtotime($originalFechaCobertura));

			//Se obtiene el ultimo folio del usuario
			$UltimoFolio;
			$FolioCertificado;
			$PrefijoAseguradora = "CT";//"CHUBB21";

			$stmt = $db->prepare("SELECT MAX(Folio) as Folio FROM cotizacion WHERE Asociado = :Asociado ");
			$stmt->bindParam("Asociado",$Asosiado);
			$stmt->execute();
			$last = $stmt->fetch(PDO::FETCH_ASSOC);

		    $UltimoFolio = $last['Folio'];
			
			 if($UltimoFolio != null && $UltimoFolio!= ''){

				$UltimoFolio++;

			}else{

				$UltimoFolio = "1";
				$FolioFinal =  $PrefijoAseguradora.$Folio.str_pad($UltimoFolio, 6, "0", STR_PAD_LEFT);	  
			} 

			if($FolioFinal != null && $FolioFinal != ''){

				$FolioCertificado = $FolioFinal;
			}else{

				$FolioCertificado = $UltimoFolio;
			}


			
			if($PrimaNetaContenedorApar == null || $PrimaNetaContenedorApar == ""){

				$PrimaNetaContenedorApar = 0;
			}

			if($Sumasolicitadaprimero == null || $Sumasolicitadaprimero == ""){

				$Sumasolicitadaprimero = 0;
			}

			if($Sumasolicitadasegundo == null || $Sumasolicitadasegundo == ""){

				$Sumasolicitadasegundo = 0;
			}

 
			$stmt = $db->prepare("insert into cotizacion (Fecha, Folio, Asociado, Cliente, Numero_guia, 
                                  Identificador_Contenedor1, Identificador_Contenedor2, Fecha_InicioCobertura, Hora_InicioCobertura,
                                  PaisOrigenEmbarque, OrigenCobertura, EstadoOrigenCobertura, MunicipioOrigenCobertura,
                                  PaisDestinoEmbarque, EstadoDestinoEmbarque, MunicipioDestinoEmbarque,
                                  Medio_Transporte, Embarque, TipoLineaTransportista, TipoVehiculo, LineaTransportista,
                                  Marca, Modelo, NumeroPlacas, NumeroMotor, NumeroSerie, Color, NombreChofer,
                                  Continuacion_Viaje, Riesgos_cubiertos, Deducibles, DescripcionMercancia, Mercancia,
                                  TipoEmpaque, Valor_Embarque, Moneda, Numero_remolque, Descripcion_seguridad, Estatus,
                                  Doble_remolque, Ampara_contenedor, Tipocontenedorprimero, Tipocontenedorsegundo, Sumasolicitadaprimero,
                                  Sumasolicitadasegundo, Tipodebien, CuotaMercanciaApar, PrimaNetaMercanciaApar, PrimaNetaContenedorApar,
                                  PrimaNetaTotalApar, DerechoCertificadoApar, IvaApar, PrimaTotalApar,
                                  CuotaMercanciaUsuario, PrimaNetaMercanciaUsuario, PrimaNetaContenedorUsuario, PrimaNetaTotalUsuario,
                                  DerechoCertificadoUsuario, IvaUsuario, PrimaTotalUsuario, Valor_Serguro,
								  Griro,TipoTraslado,valormercanciauno,valormercanciados,valormercanciamaximouno,valormercanciamaximodos,
								  TransporteAntiguedad,ObservacionGnral,CuotaContenedor,CoberturaMercancia,CoberturaContenedor,ComentariosRevision) 
                        values (:Fecha, :Folio, :Asociado, :Cliente, :Numero_guia, :Identificador_Contenedor1, 
                                :Identificador_Contenedor2, :Fecha_InicioCobertura, :Hora_InicioCobertura, :PaisOrigenEmbarque, 
                                :OrigenCobertura, :EstadoOrigenCobertura, :MunicipioOrigenCobertura, :PaisDestinoEmbarque, 
                                :EstadoDestinoEmbarque, :MunicipioDestinoEmbarque, :Medio_Transporte, :Embarque, :TipoLineaTransportista, 
                                :TipoVehiculo, :LineaTransportista, :Marca, :Modelo, :NumeroPlacas, :NumeroMotor, :NumeroSerie, :Color, :NombreChofer,
                                :Continuacion_Viaje, :Riesgos_cubiertos, :Deducibles, :DescripcionMercancia, :Mercancia,
                                :TipoEmpaque, :Valor_Embarque, :Moneda, :Numero_remolque, :Descripcion_seguridad, :Estatus,
                                :Doble_remolque, :Ampara_contenedor, :Tipocontenedorprimero, :Tipocontenedorsegundo, :Sumasolicitadaprimero,
                                :Sumasolicitadasegundo, :Tipodebien, :CuotaMercanciaApar, :PrimaNetaMercanciaApar, :PrimaNetaContenedorApar,
                                :PrimaNetaTotalApar, :DerechoCertificadoApar, :IvaApar, :PrimaTotalApar,
                                :CuotaMercanciaUsuario, :PrimaNetaMercanciaUsuario, :PrimaNetaContenedorUsuario, :PrimaNetaTotalUsuario,
                                :DerechoCertificadoUsuario, :IvaUsuario, :PrimaTotalUsuario, :Valor_Serguro,
								:Griro, :TipoTraslado, :valormercanciauno, :valormercanciados, :valormercanciamaximouno, :valormercanciamaximodos,
								:TransporteAntiguedad, :ObservacionGnral, :CuotaContenedor, :CoberturaMercancia, :CoberturaContenedor, :ComentariosRevision)");



			$floatvar = floatval($Sumasolicitadaprimero);
			$floatvar2 = floatval($Sumasolicitadasegundo);
			$floatvar3 = floatval($PrimaNetaTotalApar);
			$floatvar4 = floatval($CuotaMercanciaApar);
			$floatvar5 = floatval($PrimaNetaMercanciaApar);
			$floatvar6 = floatval($PrimaNetaContenedorApar);

			$stmt->bindParam("Fecha",$newDate);
            $stmt->bindParam("Folio",$FolioCertificado);
            $stmt->bindParam("Asociado",$Asosiado);
            $stmt->bindParam("Cliente",$Cliente);
            $stmt->bindParam("Numero_guia",$Numero_guia);
            $stmt->bindParam("Identificador_Contenedor1",$Identificador_Contenedor1);
            $stmt->bindParam("Identificador_Contenedor2",$Identificador_Contenedor2);
            $stmt->bindParam("Fecha_InicioCobertura",$fechacobertura);
            $stmt->bindParam("Hora_InicioCobertura",$Hora_InicioCobertura);
            $stmt->bindParam("PaisOrigenEmbarque",$PaisOrigenEmbarque);
            $stmt->bindParam("OrigenCobertura",$OrigenCobertura);
            $stmt->bindParam("EstadoOrigenCobertura",$EstadoOrigenCobertura);
            $stmt->bindParam("MunicipioOrigenCobertura",$MunicipioOrigenCobertura);
            $stmt->bindParam("PaisDestinoEmbarque",$PaisDestinoEmbarque);
            $stmt->bindParam("EstadoDestinoEmbarque",$EstadoDestinoEmbarque);
            $stmt->bindParam("MunicipioDestinoEmbarque",$MunicipioDestinoEmbarque);
            $stmt->bindParam("Medio_Transporte",$Medio_Transporte);
            $stmt->bindParam("Embarque",$Embarque);
            $stmt->bindParam("TipoLineaTransportista",$TipoLineaTransportista);
            $stmt->bindParam("TipoVehiculo",$TipoVehiculo);
            $stmt->bindParam("LineaTransportista",$LineaTransportista);
            $stmt->bindParam("Marca",$Marca);
            $stmt->bindParam("Modelo",$Modelo);
            $stmt->bindParam("NumeroPlacas",$NumeroPlacas);
            $stmt->bindParam("NumeroMotor",$NumeroMotor);
            $stmt->bindParam("NumeroSerie",$NumeroSerie);
            $stmt->bindParam("Color",$Color);
            $stmt->bindParam("NombreChofer",$NombreChofer);
            $stmt->bindParam("Continuacion_Viaje",$Continuacion_Viaje);
            $stmt->bindParam("Riesgos_cubiertos",$Riesgos_cubiertos);
            $stmt->bindParam("Deducibles",$Deducibles);
            $stmt->bindParam("DescripcionMercancia",$DescripcionMercancia);
            $stmt->bindParam("Mercancia",$Mercancia);
            $stmt->bindParam("TipoEmpaque",$TipoEmpaque);
            $stmt->bindParam("Valor_Embarque",$Valor_Embarque);
            $stmt->bindParam("Moneda",$Moneda);
            $stmt->bindParam("Numero_remolque",$Numero_remolque);
            $stmt->bindParam("Descripcion_seguridad",$Descripcion_seguridad);
			$stmt->bindParam("Estatus",$Estatus);
            $stmt->bindParam("Doble_remolque",$Doble_remolque);
            $stmt->bindParam("Ampara_contenedor",$Ampara_contenedor);
            $stmt->bindParam("Tipocontenedorprimero",$Tipocontenedorprimero);
            $stmt->bindParam("Tipocontenedorsegundo",$Tipocontenedorsegundo);
            $stmt->bindParam("Sumasolicitadaprimero",$floatvar);
            $stmt->bindParam("Sumasolicitadasegundo",$floatvar2);
            $stmt->bindParam("Tipodebien",$Tipodebien);
            $stmt->bindParam("CuotaMercanciaApar", $CuotaMercanciaApar);
            $stmt->bindParam("PrimaNetaMercanciaApar", $PrimaNetaMercanciaApar);
            $stmt->bindParam("PrimaNetaContenedorApar",$floatvar6);
            $stmt->bindParam("PrimaNetaTotalApar", $floatvar3);
            $stmt->bindParam("DerechoCertificadoApar", $DerechoCertificadoApar);
            $stmt->bindParam("IvaApar",$IvaApar);
            $stmt->bindParam("PrimaTotalApar",$PrimaTotalApar);
            $stmt->bindParam("CuotaMercanciaUsuario",$CuotaMercanciaUsuario);
            $stmt->bindParam("PrimaNetaMercanciaUsuario", $PrimaNetaMercanciaUsuario);
            $stmt->bindParam("PrimaNetaContenedorUsuario", $PrimaNetaContenedorUsuario);
            $stmt->bindParam("PrimaNetaTotalUsuario", $PrimaNetaTotalUsuario);
            $stmt->bindParam("DerechoCertificadoUsuario",$DerechoCertificadoUsuario);
            $stmt->bindParam("IvaUsuario", $IvaUsuario);
            $stmt->bindParam("PrimaTotalUsuario", $PrimaTotalUsuario);
			$stmt->bindParam("Valor_Serguro", $TipoSeguro);
			$stmt->bindParam("Griro",$Griro);
			$stmt->bindParam("TipoTraslado",$TipoTraslado);
			$stmt->bindParam("valormercanciauno", $valormercancia1);
			$stmt->bindParam("valormercanciados",$valormercancia2);
			$stmt->bindParam("valormercanciamaximouno",$valormercanciamaximo1);
			$stmt->bindParam("valormercanciamaximodos",$valormercanciamaximo2);
			$stmt->bindParam("TransporteAntiguedad",$TransporteAntiguedad);
			$stmt->bindParam("ObservacionGnral",$ObservacionGnral);
			$stmt->bindParam("CuotaContenedor",$CuotaContenedor);
			$stmt->bindParam("CoberturaMercancia",$CoberturaMercancia);
			$stmt->bindParam("CoberturaContenedor",$CoberturaContenedor);
			$stmt->bindParam("ComentariosRevision",$ComentariosRevision);
			$stmt->execute();
			$lastInsertId = $db->lastInsertId();

			//Se obtiene la libreria
			
			if($Estatus == "Revision"){

				try {
					$mail = new PHPMailer(true);
					$mail->CharSet = 'UTF-8';
					$mail->isSMTP();
					$mail->Host = 'mail.siecel-ppr.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'notificaciones@siecel-ppr.com';
					$mail->Password = '3c%}rEKnL0Qz';
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;
			
					$mail->setFrom('notificaciones@siecel-ppr.com');
			
			
			
					//$to = $cadena_formateada;
					$nome = 'APAR';
					$assunto = "Solicitud de revision ".$FolioCertificado;
					$mensagem = 'Se ha generado la siguiente cotizacion '. $FolioCertificado. ' para su revision y autorizacion ';				//An HTML or plain text message body"hola mensahe de prueba";
			
					//$reply= $data[email];
				
			
					$mail->AddAddress('aler1989p@gmail.com', $nome);
					//$mail->AddAddress('saule.castro@apar.com.mx', $nome);		//Adds a "To" address
					$mail->ConfirmReadingTo = "notificaciones@siecel-ppr.com";
					// $mail->addReplyTo($reply);
					$mail->WordWrap = 50;
					$mail->IsHTML(true);
					//$mail->addStringAttachment($file, $nombrearchiv);
					//$mail->AddAttachment('../../pdf/aseguradoraspdf/condiciones_chubb.pdf', 'condiciones_chubb.pdf');
					//$mail->addStringAttachment($filenuevo, $Nombre_ReciboCobro);   
					$mail->Subject = $assunto;
	
					$tm = '<html>
					<body>
					<h1>Detalles de la cotizacion</h1>
					<p>
					Mensaje: '.$mensagem. ' </br>
					
					Comentarios: '.$ComentariosRevision.' </p>
					</body>
					</html>';
	
					$mail->MsgHTML($tm);
					//$mail->Body = $tm;//'<br/>' . $mensagem . ' Comentarios'. $ComentariosRevision . '<br/>';
					$mail->AltBody = "$mensagem";
			
			
			
					$mail->send();
					unset($data);
			   
				}catch (Exception $e) {
			  
				}	

			}

			
		
			/* //Se inicializa la clase el para el envio del mensaje de whatsapp
			require_once('../vistas/apiwh/ultramsg.class.php');
			$ultramsg_token="hswfzc5cziwglcqx"; // Ultramsg.com token
			$instance_id="instance1776"; // Ultramsg.com instance id
			$client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);
			
			$to="+5213313252782"; 
			$body="Se ha generado una nueva cotizacion con el siguiente folio ".$FolioCertificado; 
			$api=$client->sendChatMessage($to,$body); */
			//print_r($api);
				//Funcion mandar email

				/* require '../vistas/class/class.phpmailer.php';
				$mail = new PHPMailer;
				$mail->IsSMTP();								//Sets Mailer to send message using SMTP
				$mail->Host = 'mail.apar.com.mx';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
				$mail->Port = '465';								//Sets the default SMTP server port
				$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
				$mail->Username = 'notificaciones@apar.com.mx';					//Sets SMTP username
				$mail->Password = 'la{}Nx0S_pdK';					//Sets SMTP password
				$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
				$mail->From = 'notificaciones@apar.com.mx';			//Sets the From email address for the message
				$mail->FromName = 'apar.com.mx';			//Sets the From name of the message
				$mail->AddAddress('saule.castro@apar.com.mx', 'Saul Castro');		//Adds a "To" address
				$mail->addCC('armando.varela@apar.com.mx');
				$mail->addBCC('aler1989p@gmail.com');
				$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
				$mail->IsHTML(true);							//Sets message type to HTML				
				//$mail->addStringAttachment($file, $nombrearchiv);     				//Adds an attachment from a path on the filesystem
				$mail->Subject = 'Cotizacion '.$FolioCertificado;			//Sets the Subject of the message
				$mail->Body = 'A continuacion se la hace llegar la siguiente cotizacion '.$FolioCertificado;				//An HTML or plain text message body
				if($mail->Send())								//Send an Email. Return true on success or false on error
				{
					$message = '<label class="text-success">A continuacion se la hace llegar la siguiente Cotizacion con el Folio: </label>';
				}
				unlink($attachment); */

	
			$stat[0] = true;
			$stat[1] = "Registro Exitoso";
			$stat[2] = $lastInsertId;
			$stat[3] = $FolioCertificado;
			return $stat;
		}
		catch(PDOException $ex)
		{
			$lastInsertId = 0;
			$stat[0] = false;
			$stat[1] = $ex->getMessage().$stmt;
			$stat[2] = 0;
			$stat[3] = "";
			return $stat;
		}
	}
	public function new_certificado($Idcotizacion,$PrefijoFolio,$Fecha,$Folio,$Asosiado,$Cliente,$Numero_guia, $Identificador_Contenedor1, $Identificador_Contenedor2, 
									$Fecha_InicioCobertura,$Hora_InicioCobertura, $PaisOrigenEmbarque, $OrigenCobertura, $EstadoOrigenCobertura,
									$MunicipioOrigenCobertura, $PaisDestinoEmbarque, $EstadoDestinoEmbarque, $MunicipioDestinoEmbarque,
									$Medio_Transporte, $Embarque, $TipoLineaTransportista, $TipoVehiculo, $LineaTransportista,
									$Marca, $Modelo, $NumeroPlacas, $NumeroMotor, $NumeroSerie, $Color, $NombreChofer,
									$Continuacion_Viaje, $Riesgos_cubiertos, $Deducibles, $DescripcionMercancia, $Mercancia,
									$TipoEmpaque, $Valor_Embarque, $Moneda, $Numero_remolque, $Descripcion_seguridad,
									$Doble_remolque,$Ampara_contenedor,$Tipocontenedorprimero,$Tipocontenedorsegundo,$Sumasolicitadaprimero,
									$Sumasolicitadasegundo, $Tipodebien, $CuotaMercanciaApar, $PrimaNetaMercanciaApar, $PrimaNetaContenedorApar,
									$PrimaNetaTotalApar, $DerechoCertificadoApar, $IvaApar, $PrimaTotalApar,
									$CuotaMercanciaUsuario, $PrimaNetaMercanciaUsuario, $PrimaNetaContenedorUsuario, $PrimaNetaTotalUsuario,
									$DerechoCertificadoUsuario, $IvaUsuario, $PrimaTotalUsuario, $TipoSeguro,
									$Griro, $TipoTraslado, $valormercancia1, $valormercancia2,$valormercanciamaximo1,
									$valormercanciamaximo2,$TransporteAntiguedad,$ObservacionGnral,
									$CuotaContenedor,$CoberturaMercancia, $CoberturaContenedor,$GeneraAutomatico) //$LineaTransportista
	{
		$db = $this->dblocal;
		try
		{
			$Estatus="Autorizado";
			//Se tratan las fechas
            $originalDate = $Fecha;
            $newDate = date("Y-m-d", strtotime($originalDate));
            
            $originalFechaCobertura = $Fecha_InicioCobertura;
            $fechacobertura = date("Y-m-d", strtotime($originalFechaCobertura));

			//Se obtiene el ultimo folio del usuario
			$prefijoAbreviatura = "";
			$UltimoFolio;
			$FolioCertificado;
			$PrefijoAseguradora = "CHUBB23";

			


			$stmt = $db->prepare("SELECT MAX(Folio) as Folio FROM certificado WHERE Asociado = :Asociado ");
			$stmt->bindParam("Asociado",$Asosiado);
			$stmt->execute();
			$last = $stmt->fetch(PDO::FETCH_ASSOC);

		    $UltimoFolio = $last['Folio'];
			
			 if($UltimoFolio != null && $UltimoFolio!= ''){

				$UltimoFolio++;

			}else{

				$UltimoFolio = $PrefijoFolio."0001";
				//$PREFIJOOOO = $Folio.str_pad($UltimoFolio, 6, "0", STR_PAD_LEFT);
				$FolioFinal =  $PrefijoAseguradora.$UltimoFolio;  
			} 

			if($FolioFinal != null && $FolioFinal != ''){

				$FolioCertificado = $FolioFinal;
			}else{

				$FolioCertificado = $UltimoFolio;
			}

			if($Sumasolicitadaprimero == null || $Sumasolicitadaprimero == ""){

				$Sumasolicitadaprimero = 0;
			}

			if($Sumasolicitadasegundo == null || $Sumasolicitadasegundo == ""){

				$Sumasolicitadasegundo = 0;
			}
			if($PrimaNetaContenedorApar == null || $PrimaNetaContenedorApar == ""){

				$PrimaNetaContenedorApar = 0;
			}
		
 
			$stmt = $db->prepare("INSERT INTO certificado (Fecha, Folio, Asociado, Cliente, Numero_guia, 
                                  Identificador_Contenedor1, Identificador_Contenedor2, Fecha_InicioCobertura, Hora_InicioCobertura,
                                  PaisOrigenEmbarque, OrigenCobertura, EstadoOrigenCobertura, MunicipioOrigenCobertura,
                                  PaisDestinoEmbarque, EstadoDestinoEmbarque, MunicipioDestinoEmbarque,
                                  Medio_Transporte, Embarque, TipoLineaTransportista, TipoVehiculo, LineaTransportista,
                                  Marca, Modelo, NumeroPlacas, NumeroMotor, NumeroSerie, Color, NombreChofer,
                                  Continuacion_Viaje, Riesgos_cubiertos, Deducibles, DescripcionMercancia, Mercancia,
                                  TipoEmpaque, Valor_Embarque, Moneda, Numero_remolque, Descripcion_seguridad,
                                  Doble_remolque, Ampara_contenedor, Tipocontenedorprimero, Tipocontenedorsegundo, Sumasolicitadaprimero,
                                  Sumasolicitadasegundo, Tipodebien, CuotaMercanciaApar, PrimaNetaMercanciaApar, PrimaNetaContenedorApar,
                                  PrimaNetaTotalApar, DerechoCertificadoApar, IvaApar, PrimaTotalApar,
                                  CuotaMercanciaUsuario, PrimaNetaMercanciaUsuario, PrimaNetaContenedorUsuario, PrimaNetaTotalUsuario,
                                  DerechoCertificadoUsuario, IvaUsuario, PrimaTotalUsuario, Valor_Serguro,
								  Griro,TipoTraslado,valormercanciauno,valormercanciados,valormercanciamaximouno,valormercanciamaximodos,
								  TransporteAntiguedad,ObservacionGnral,CuotaContenedor,CoberturaMercancia,CoberturaContenedor, IdCotizacion) 
                        values (:Fecha, :Folio, :Asociado, :Cliente, :Numero_guia, :Identificador_Contenedor1, 
                                :Identificador_Contenedor2, :Fecha_InicioCobertura, :Hora_InicioCobertura, :PaisOrigenEmbarque, 
                                :OrigenCobertura, :EstadoOrigenCobertura, :MunicipioOrigenCobertura, :PaisDestinoEmbarque, 
                                :EstadoDestinoEmbarque, :MunicipioDestinoEmbarque, :Medio_Transporte, :Embarque, :TipoLineaTransportista, 
                                :TipoVehiculo, :LineaTransportista, :Marca, :Modelo, :NumeroPlacas, :NumeroMotor, :NumeroSerie, :Color, :NombreChofer,
                                :Continuacion_Viaje, :Riesgos_cubiertos, :Deducibles, :DescripcionMercancia, :Mercancia,
                                :TipoEmpaque, :Valor_Embarque, :Moneda, :Numero_remolque, :Descripcion_seguridad,
                                :Doble_remolque, :Ampara_contenedor, :Tipocontenedorprimero, :Tipocontenedorsegundo, :Sumasolicitadaprimero,
                                :Sumasolicitadasegundo, :Tipodebien, :CuotaMercanciaApar, :PrimaNetaMercanciaApar, :PrimaNetaContenedorApar,
                                :PrimaNetaTotalApar, :DerechoCertificadoApar, :IvaApar, :PrimaTotalApar,
                                :CuotaMercanciaUsuario, :PrimaNetaMercanciaUsuario, :PrimaNetaContenedorUsuario, :PrimaNetaTotalUsuario,
                                :DerechoCertificadoUsuario, :IvaUsuario, :PrimaTotalUsuario, :Valor_Serguro,
								:Griro, :TipoTraslado, :valormercanciauno, :valormercanciados, :valormercanciamaximouno, :valormercanciamaximodos,
								:TransporteAntiguedad, :ObservacionGnral, :CuotaContenedor, :CoberturaMercancia, :CoberturaContenedor, :IdCotizacion)");

			$stmt->bindParam("Fecha",$newDate);
            $stmt->bindParam("Folio",$FolioCertificado);
            $stmt->bindParam("Asociado",$Asosiado);
            $stmt->bindParam("Cliente",$Cliente);
            $stmt->bindParam("Numero_guia",$Numero_guia);
            $stmt->bindParam("Identificador_Contenedor1",$Identificador_Contenedor1);
            $stmt->bindParam("Identificador_Contenedor2",$Identificador_Contenedor2);
            $stmt->bindParam("Fecha_InicioCobertura",$fechacobertura);
            $stmt->bindParam("Hora_InicioCobertura",$Hora_InicioCobertura);
            $stmt->bindParam("PaisOrigenEmbarque",$PaisOrigenEmbarque);
            $stmt->bindParam("OrigenCobertura",$OrigenCobertura);
            $stmt->bindParam("EstadoOrigenCobertura",$EstadoOrigenCobertura);
            $stmt->bindParam("MunicipioOrigenCobertura",$MunicipioOrigenCobertura);
            $stmt->bindParam("PaisDestinoEmbarque",$PaisDestinoEmbarque);
            $stmt->bindParam("EstadoDestinoEmbarque",$EstadoDestinoEmbarque);
            $stmt->bindParam("MunicipioDestinoEmbarque",$MunicipioDestinoEmbarque);
            $stmt->bindParam("Medio_Transporte",$Medio_Transporte);
            $stmt->bindParam("Embarque",$Embarque);
            $stmt->bindParam("TipoLineaTransportista",$TipoLineaTransportista);
            $stmt->bindParam("TipoVehiculo",$TipoVehiculo);
            $stmt->bindParam("LineaTransportista",$LineaTransportista);
            $stmt->bindParam("Marca",$Marca);
            $stmt->bindParam("Modelo",$Modelo);
            $stmt->bindParam("NumeroPlacas",$NumeroPlacas);
            $stmt->bindParam("NumeroMotor",$NumeroMotor);
            $stmt->bindParam("NumeroSerie",$NumeroSerie);
            $stmt->bindParam("Color",$Color);
            $stmt->bindParam("NombreChofer",$NombreChofer);
            $stmt->bindParam("Continuacion_Viaje",$Continuacion_Viaje);
            $stmt->bindParam("Riesgos_cubiertos",$Riesgos_cubiertos);
            $stmt->bindParam("Deducibles",$Deducibles);
            $stmt->bindParam("DescripcionMercancia",$DescripcionMercancia);
            $stmt->bindParam("Mercancia",$Mercancia);
            $stmt->bindParam("TipoEmpaque",$TipoEmpaque);
            $stmt->bindParam("Valor_Embarque",$Valor_Embarque);
            $stmt->bindParam("Moneda",$Moneda);
            $stmt->bindParam("Numero_remolque",$Numero_remolque);
            $stmt->bindParam("Descripcion_seguridad",$Descripcion_seguridad);
			//$stmt->bindParam("Estatus",$Estatus);
            $stmt->bindParam("Doble_remolque",$Doble_remolque);
            $stmt->bindParam("Ampara_contenedor",$Ampara_contenedor);
            $stmt->bindParam("Tipocontenedorprimero",$Tipocontenedorprimero);
            $stmt->bindParam("Tipocontenedorsegundo",$Tipocontenedorsegundo);
            $stmt->bindParam("Sumasolicitadaprimero",$Sumasolicitadaprimero);
            $stmt->bindParam("Sumasolicitadasegundo",$Sumasolicitadasegundo);
            $stmt->bindParam("Tipodebien",$Tipodebien);
            $stmt->bindParam("CuotaMercanciaApar",$CuotaMercanciaApar);
            $stmt->bindParam("PrimaNetaMercanciaApar",$PrimaNetaMercanciaApar);
            $stmt->bindParam("PrimaNetaContenedorApar",$PrimaNetaContenedorApar);
            $stmt->bindParam("PrimaNetaTotalApar",$PrimaNetaTotalApar);
            $stmt->bindParam("DerechoCertificadoApar",$DerechoCertificadoApar);
            $stmt->bindParam("IvaApar",$IvaApar);
            $stmt->bindParam("PrimaTotalApar",$PrimaTotalApar);
            $stmt->bindParam("CuotaMercanciaUsuario",$CuotaMercanciaUsuario);
            $stmt->bindParam("PrimaNetaMercanciaUsuario",$PrimaNetaMercanciaUsuario);
            $stmt->bindParam("PrimaNetaContenedorUsuario",$PrimaNetaContenedorUsuario);
            $stmt->bindParam("PrimaNetaTotalUsuario",$PrimaNetaTotalUsuario);
            $stmt->bindParam("DerechoCertificadoUsuario",$DerechoCertificadoUsuario);
            $stmt->bindParam("IvaUsuario",$IvaUsuario);
            $stmt->bindParam("PrimaTotalUsuario",$PrimaTotalUsuario);
			$stmt->bindParam("Valor_Serguro",$TipoSeguro);
			$stmt->bindParam("Griro",$Griro);
			$stmt->bindParam("TipoTraslado",$TipoTraslado);
			$stmt->bindParam("valormercanciauno",$valormercancia1);
			$stmt->bindParam("valormercanciados",$valormercancia2);
			$stmt->bindParam("valormercanciamaximouno",$valormercanciamaximo1);
			$stmt->bindParam("valormercanciamaximodos",$valormercanciamaximo2);
			$stmt->bindParam("TransporteAntiguedad",$TransporteAntiguedad);
			//$stmt->bindParam("DescripcionCondicionesTER",$DescripcionCondicionesTER);
			$stmt->bindParam("ObservacionGnral",$ObservacionGnral);
			$stmt->bindParam("CuotaContenedor",$CuotaContenedor);
			$stmt->bindParam("CoberturaMercancia",$CoberturaMercancia);
			$stmt->bindParam("CoberturaContenedor",$CoberturaContenedor);
			$stmt->bindParam("IdCotizacion",$Idcotizacion);
			$stmt->execute();
			$lastInsertId = $db->lastInsertId();

			//Si es correcto la insercion del certificado se actualiza la cotizacion en Estatus Autorizado
			$stmt1 = $db->prepare("UPDATE cotizacion set Estatus = :Estatus where Id = :Id ");
			$stmt1->bindParam("Id",$Idcotizacion);
			$stmt1->bindParam("Estatus",$Estatus);
			$stmt1->execute();
			//$stat[0] = true;
			//$stat[1] = "Success edit customer";
			//return $stat;

			/* //Se inicializa la clase el para el envio del mensaje de whatsapp
			require_once('../vistas/apiwh/ultramsg.class.php');
			$ultramsg_token="hswfzc5cziwglcqx"; // Ultramsg.com token
			$instance_id="instance1776"; // Ultramsg.com instance id
			$client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);
			
			$to="+5213313252782"; 
			$body="Se ha generado una nueva cotizacion con el siguiente folio ".$FolioCertificado; 
			$api=$client->sendChatMessage($to,$body); */
			//print_r($api);
				//Funcion mandar email

				/* require '../vistas/class/class.phpmailer.php';
				$mail = new PHPMailer;
				$mail->IsSMTP();								//Sets Mailer to send message using SMTP
				$mail->Host = 'mail.apar.com.mx';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
				$mail->Port = '465';								//Sets the default SMTP server port
				$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
				$mail->Username = 'notificaciones@apar.com.mx';					//Sets SMTP username
				$mail->Password = 'la{}Nx0S_pdK';					//Sets SMTP password
				$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
				$mail->From = 'notificaciones@apar.com.mx';			//Sets the From email address for the message
				$mail->FromName = 'apar.com.mx';			//Sets the From name of the message
				$mail->AddAddress('saule.castro@apar.com.mx', 'Saul Castro');		//Adds a "To" address
				$mail->addCC('armando.varela@apar.com.mx');
				$mail->addBCC('aler1989p@gmail.com');
				$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
				$mail->IsHTML(true);							//Sets message type to HTML				
				//$mail->addStringAttachment($file, $nombrearchiv);     				//Adds an attachment from a path on the filesystem
				$mail->Subject = 'Certificado '.$FolioCertificado;			//Sets the Subject of the message
				$mail->Body = 'Se hA autorizado la cotizacion'. $Folio. 'y se ha generado el certificado con el folio '.$FolioCertificado;				//An HTML or plain text message body
				if($mail->Send())								//Send an Email. Return true on success or false on error
				{
					$message = '<label class="text-success">A continuacion se la hace llegar la siguiente Certificado con el Folio: </label>';
				}
				unlink($attachment); */ 

	
			$stat[0] = true;
			$stat[1] = "Registro Exitoso";
			$stat[2] = $lastInsertId;
			$stat[3] = $FolioCertificado;
			$stat[4] = $Folio;
			return $stat;
		}
		catch(PDOException $ex)
		{
			$lastInsertId = 0;
			$stat[0] = false;
			$stat[1] = $ex->getMessage()."".$stmt;
			$stat[2] = 0;
			$stat[3] = "";
			return $stat;
		}
	}
	public function iniciar_sesion($email, $password)
	{
		$db = $this->dblocal;
		try{
			
			 $password = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD
			 $consulta = "SELECT US.Id as IdUsuario, US.Nombre as NombreUsuario, US.Email as EmailUsuario, 
								 RT.Id as IdRestaurante 
						  FROM Usuario US 
						  INNER JOIN Restaurante RT ON RT.IdUsuario=US.Id
						  WHERE US.Email='$email' AND US.Password='$password' ";
			 $stmt = $db->prepare($consulta);
			 $stmt->execute();
			 
			 if($stmt->rowCount() >= 1){
				 //$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				 while($row = $stmt->fetch()) {
						//$thisdir = getcwd();
						 $_SESSION['usuario'] = $row['NombreUsuario'];
						 $_SESSION['email'] = $row['EmailUsuario'];
						 $_SESSION['IdUsuario'] = $row['IdUsuario'];
						 $_SESSION['IdRestaurante'] = $row['IdRestaurante'];
						 $stat[0] = true;
						 $stat[1] = "Sesion Iniciada Correctamente";
						 $stat[2] = $row['NombreUsuario'];
						 
						 // //Codigo para abrir la carpeta y crear un subdirectorio
						 $idus = $row['IdUsuario'];
						 $idrest= $row['IdRestaurante'];
						 $path = $idus.'/';
						 
						// $dir = $path;
						 if (is_dir($path)) {
							if ($dh = opendir($path)) {
								
								if(!is_dir($path.$idrest)){
									mkdir($path.$idrest,  0777, true);
								}
								closedir($dh);
							}
						}
						 
					}
				 return $stat;
			 }else{
				//$_SESSION["s_usuario"] = null;
				 $stat[0] = false;
				 $stat[1] = "Error Inicio de Sesion";
				 $stat[2] = null;
				 
				 
				 return $stat;
			}
			
		}catch(PDOException $ex){
				 $stat[0] = false;
				 $stat[1] = $ex->getMessage();
				 $stat[2] = null;
				 
			
			return $stat;
		}
	}

	public function list_customer()
	{
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("select * from Categoria");
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = "List customer";
			$stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			$stat[2] = [];
			return $stat;
		}
	}

	public function edit_customer($id,$descripcion){
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("update Categoria set Descripcion = :Descripcion where Id = :Id ");
			$stmt->bindParam("Id",$id);
			$stmt->bindParam("Descripcion",$descripcion);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = "Success edit customer";
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}
	public function rechazar_cotizacion($IdCotizacion){
		$db = $this->dblocal;
		try
		{
			$_Estatus="Rechazado";

			$stmt = $db->prepare("UPDATE cotizacion  SET Estatus = :Estatus where Id = :Id ");
			$stmt->bindParam("Id",$IdCotizacion);
			$stmt->bindParam("Estatus",$_Estatus);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = "Success edit customer";
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}

	public function delete_customer($id)
	{
		$db = $this->dblocal;
		try
		{
			$stmt = $db->prepare("delete from Categoria where Id = :Id");
			$stmt->bindParam("Id",$id);
			$stmt->execute();
			$stat[0] = true;
			$stat[1] = "Success delete customer";
			return $stat;
		}
		catch(PDOException $ex)
		{
			$stat[0] = false;
			$stat[1] = $ex->getMessage();
			return $stat;
		}
	}

}