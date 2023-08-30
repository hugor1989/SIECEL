<?php
	/*-------------------------
	Autor: Hugo Rodriguez
	Web: rpdevelopers.com.mx
	Mail: info@rpdevelopers.com.mx
	---------------------------*/
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require '../../lib/vendor/autoload.php';

	//Se incluyen las librerias
	include '../../phpqrcode/qrlib.php';
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
	
	//Configuracion para la generacion del codigo qr
	$ecc = 'H';
	$pixel_size = 20;
	$frame_size = 5;

	//Se Obtiene las variables por el metodo getd del certificado
	$asociado = $_GET['asociado'];
	$AsosiadoTelefono = $_GET['AsosiadoTelefono'];
    $AsosiadoCelular = $_GET['AsosiadoCelular'];
	$AsosiadoEmail = $_GET['AsosiadoEmail'];
	$cadena_formateada = trim($AsosiadoEmail);
	$cliente = $_GET['cliente'];
	$mercancia =$_GET['mercancia'];
	$mediotransporte = $_GET['mediotransporte'];
	$dobleremolque = $_GET['dobleremolque'];
	$amparacontenedor = $_GET['amparacontenedor'];
	$tipocontenedor1 = $_GET['tipocontenedor1'];
	$TipoSeguro = $_GET['TipoSeguro'];
	$tipocontenedor2= $_GET['tipocontenedor2'];
	$tipodebien = $_GET['tipodebien'];
	$cv = $_GET['cv'];
	$cobertura = $_GET['cobertura'];
	$primaneta = $_GET['primaneta'];
	$iva = $_GET['iva'];
	$total = $_GET['total'];
	$valorembarque = $_GET['valorembarque'];
	$rfc = $_GET['rfc'];
	$direccion = $_GET['direccion'];
	$email = $_GET['email'];
	$idcontenedor1 = $_GET['idcontenedor1'];
	$idcontenedor2 = $_GET['idcontenedor2'];
	$fechacobertura = $_GET['fechacobertura'];
	$horacobertura = $_GET['horacobertura'];
	$OrigenCobertura = $_GET['OrigenCobertura'];
	$paiscobertura = $_GET['paiscobertura'];
	$DestinoCobertura = $_GET['DestinoCobertura'];
	$nuevoTipoEmbarque = $_GET['nuevoTipoEmbarque'];
	$nuevoLNTRP = $_GET['nuevoLNTRP'];
	$nuevoTipoVehiculo = $_GET['nuevoTipoVehiculo'];
	$nuevoNbLNTRP = $_GET['nuevoNbLNTRP'];
	$MayorAnios = $_GET['MayorAnios'];
	$TB_DeducibleROT = $_GET['TB_DeducibleROT'];
	$TB_DEDUCIBLE_ROBO = $_GET['TB_DEDUCIBLE_ROBO'];
	$TB_DEDUCIBLE_OTROS_R = $_GET['TB_DEDUCIBLE_OTROS_R'];
	$TB_DEDUCIBLE_SVT = $_GET['TB_DEDUCIBLE_SVT'];
	$TB_MARITIMO_AEREO_COMBINADO = $_GET['TB_MARITIMO_AEREO_COMBINADO'];
	$ObservacionGnral = $_GET['ObservacionGnral'];
	$NumeroGuia = $_GET['NumeroGuia'];
	$valormercancia2 = $_GET['valormercancia2'];
	$valormercancia1 = $_GET['valormercancia1'];
	$TipoEmpaque = $_GET['TipoEmpaque'];
	$Sumasolicitadaprimero = $_GET['Sumasolicitadaprimero'];
	$Sumasolicitadasegundo = $_GET['Sumasolicitadasegundo'];
	$ImagenAsociado = $_GET['ImagenAsociado'];
	$_Id = $_GET['_Id'];
	$_Folio = $_GET['_Folio'];
	$FechaHora = $_GET['FechaHora'];
	$deducibles = $_GET['deducibles'];
	$deduciblescontenedor = $_GET['deduciblescontenedor'];
	$coberturamercancia = $_GET['coberturamercancia'];
	$coberturacontenedor = $_GET['coberturacontenedor'];
	$foliocotizacion = $_GET['foliocotizacion'];
	$Descripcion_seguridad = $_GET['Descripcion_seguridad'];
	$certificado = $_GET['certificado'];
	
		

	//Se crear al Pat y nobre del Codigo Qr
	$file = "../../CodigosQr/".$_Id.$_Folio.".png";
	//$file = "../../CodigosQr/prueba.png";
	// Se genera el codigo qr y se guarda en PNG
	QRcode::png($_Id.$_Folio, $file, $ecc, $pixel_size, $frame_size);

	// se obtiene el HTML del formato desarrollado en html del certificado
	ob_start();
	include(dirname('__FILE__').'/res/certificado_html.php');
	$content = ob_get_clean();
	$nombrearchiv= 'certificado_'.$_Folio.'.pdf';

	
	// se obtiene el HTML del formato desarrollado en html del recibo de cobro
	ob_start();
	include(dirname('__FILE__').'/res/recibocobro_html.php');
	$contentcobro = ob_get_clean();
	$Nombre_ReciboCobro= 'recibocobro_'.$_Folio.'.pdf';


    try
    {
		//Se Inicializa el documento para la generacion del documento de pdf del certificado
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output($nombrearchiv);

		$html2pdf->Output('../../certificados/'.$nombrearchiv, 'F');

		$file = $html2pdf->Output($nombrearchiv, true);

		//////////////////////////////////
		//Se Inicializa el documento para la generacion del documento de pdf del recibocobro
       // init HTML2PDF
        $html2pdfcobro = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        //display the full page
        $html2pdfcobro->pdf->SetDisplayMode('fullpage');
        //convert
        $html2pdfcobro->writeHTML($contentcobro, isset($_GET['vuehtml']));
        //send the PDF
		$filenuevo = $html2pdfcobro->Output($Nombre_ReciboCobro, true);

		/* $ruta = "../../certificados/";

		move_uploaded_file($nombrearchiv, $ruta . $file);
 */
		$mail = new PHPMailer(true);
		try {
	
			$mail->CharSet = 'UTF-8';
			$mail->isSMTP();
			$mail->Host = 'mail.siecel-ppr.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'notificaciones@siecel-ppr.com';
			$mail->Password = '3c%}rEKnL0Qz';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
	
			$mail->setFrom('notificaciones@siecel-ppr.com');
			
			/* $mail->AddCustomHeader( "X-Confirm-Reading-To: notificaciones@siecel-ppr.com" );

			$mail->AddCustomHeader( "Return-receipt-to: notificaciones@siecel-ppr.com" ) */;
	
			$to = $cadena_formateada;
			$nome = 'PAR';
			$assunto = "Certificado ".$foliocotizacion;
			$mensagem = 'Se ha autorizado la siguiente cotizacion '. $foliocotizacion. ' y se ha generado el certificado con el folio '.$_Folio;				//An HTML or plain text message body"hola mensahe de prueba";
	
			//$reply= $data[email];
		   
		
			$mail->AddAddress('aler1989p@gmail.com', $nome);
			$mail->AddAddress('saul.castro@parprofessionalrisk.com', $nome);		//Adds a "To" address
		   // $mail->addReplyTo($reply);
			$mail->WordWrap = 50;
			$mail->IsHTML = true;
			$mail->addStringAttachment($file, $nombrearchiv);
		    $mail->AddAttachment('../../pdf/aseguradoraspdf/condiciones_chubb.pdf', 'condiciones_chubb.pdf');
			$mail->addStringAttachment($filenuevo, $Nombre_ReciboCobro);   
			$mail->Subject = $assunto;
			$mail->Body = '<br/>' . $mensagem . '<br/>';
			$mail->AltBody = "$mensagem";
	
	
	
			$mail->send();
			unset($data);
	
		   
		} catch (Exception $e) {
		  
		}










		//Se Inicializa el documento para la generacion del documento de pdf del recibocobro
        // init HTML2PDF
        //$html2pdfcobro = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        //$html2pdfcobro->pdf->SetDisplayMode('fullpage');
        // convert
        //$html2pdfcobro->writeHTML($contentcobro, isset($_GET['vuehtml']));
        // send the PDF
        //$html2pdfcobro->Output($Nombre_ReciboCobro);

		//Funcion mandar email

		
		/* require '../../class/class.phpmailer.php';
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'mail.apar.com.mx';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'notificaciones@apar.com.mx';					//Sets SMTP username
		$mail->Password = 'la{}Nx0S_pdK';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'harodrig@evans.com.mx';			//Sets the From email address for the message
		$mail->FromName = 'apar.com.mx';			//Sets the From name of the message
		//$mail->AddAddress('contacto@apar.com.mx', 'APAR');		//Adds a "To" address
		//$mail->addCC('saule.castro@apar.com.mx');
		$mail->addBCC('harodrig@evans.com.mx');
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML				
		$mail->addStringAttachment($file, $nombrearchiv);     				//Adds an attachment from a path on the filesystem
		$mail->Subject = 'Certificado ';			//Sets the Subject of the message
		$mail->Body = 'Se ha autorizado la siguiente cotizacion '. $foliocotizacion. ' y se ha generado el certificado con el folio '.$_Folio;				//An HTML or plain text message body
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$message = '<label class="text-success">A continuacion se la hace llegar la siguiente Certificado	</label>';
		}
		unlink($attachment);
 */
		
    }
    catch(HTML2PDF_exception $e) {
		
        echo $e;
        exit;
    }
