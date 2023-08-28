<?php
	/*-------------------------
	Autor: Hugo Rodriguez
	Web: rpdevelopers.com.mx
	Mail: info@rpdevelopers.com.mx
	---------------------------*/
	session_start();
	
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
	
		$cliente = $_GET['cliente'];
		$rfc = $_GET['rfc'];
		$mercancia =$_GET['mercancia'];
		$mediotransporte = $_GET['mediotransporte'];
		$origenembarque = $_GET['origenembarque'];
		$desde = $_GET['desde'];
		$hasta = $_GET['hasta'];
		$cv = $_GET['cv'];
		$tipodebien = $_GET['tipodebien'];
		$valorembarque = $_GET['valorembarque'];
		$importetotal = $_GET['importetotal'];
		$cobertura = $_GET['cobertura'];
		$deducibles = $_GET['deducibles'];
		$deduciblescontendor = $_GET['deduciblescontendor'];
		$coberturamercancia = $_GET['coberturamercancia'];
		$coberturacontenedor = $_GET['coberturacontenedor'];
		$FechaHora = $_GET['FechaHora'];
		$ProtocoloDescripcion = $_GET['ProtocoloDescripcion'];
		
	   ob_start();
	   include(dirname('__FILE__').'/res/cotizacion_html.php');
	   $content = ob_get_clean();
	   $nombrearchiv= 'Cotizacion_'.$cliente.'_.pdf';
	   $nombrearchiv2= 'Cotizacion_'.$cliente.'_.pdf';
	
	try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        //Se crea el pdf para mostrarlo en pantalla
		$html2pdf->Output($nombrearchiv);
		// send the PDF por email
        $file =  $html2pdf->Output($nombrearchiv,true);

		//file_put_contents($nombrearchiv2, $file);

		require '../../class/class.phpmailer.php';
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
		$mail->AddAddress('aler1989p@gmail.com', 'Name');		//Adds a "To" address
		$mail->addCC('hugorodriguezper@hotmail.com');
		$mail->addBCC('hugo_playertigrillo@hotmail.com');
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML				
		$mail->addStringAttachment($file, $nombrearchiv);     				//Adds an attachment from a path on the filesystem
		$mail->Subject = 'Cotizacion ';			//Sets the Subject of the message
		$mail->Body = 'A continuacion se la hace llegar la siguiente cotizacion';				//An HTML or plain text message body
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$message = '<label class="text-success">A continuacion se la hace llegar la siguiente cotizacion</label>';
		}
		unlink($attachment);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
