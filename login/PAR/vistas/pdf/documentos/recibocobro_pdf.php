<?php
	/*-------------------------
	Autor: Hugo Rodriguez
	Web: rpdevelopers.com.mx
	Mail: info@rpdevelopers.com.mx
	---------------------------*/
	session_start();
	/* Connect To Database*/
	/* include("../../config/db.php");
	include("../../config/conexion.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp_cotizacion where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados a la cotizacion')</script>";
	echo "<script>window.close();</script>";
	exit;
	} */

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	/* 	$asociado = $_GET['asociado'];
		$cliente = $_GET['cliente'];
		$mercancia =$_GET['mercancia'];
		$mediotransporte = $_GET['mediotransporte'];
		$dobleremolque = $_GET['dobleremolque'];
		$amparacontenedor = $_GET['amparacontenedor'];
		$tipocontenedor1 = $_GET['tipocontenedor1'];
		$tipocontenedor2= $_GET['tipocontenedor2'];
		$tipodebien = $_GET['tipodebien'];
		$cv = $_GET['cv'];
		$cobertura = $_GET['cobertura'];
		$primaneta = $_GET['primaneta'];
		$iva = $_GET['iva'];
		$total = $_GET['total'];
		$valorembarque = $_GET['valorembarque'];
		 */

		
    /* // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/cotizacion_html.php');
    $content = ob_get_clean();
	$nombrearchiv= 'Cotizacion_'.$cliente.'_.pdf'; */
	//if($paiscobertura == ""){

		// get the HTML
		ob_start();
		include(dirname('__FILE__').'/res/recibocobro_html.php');
	   $content = ob_get_clean();
	   $nombrearchiv= 'ReciboCobro'.'_.pdf';
	/* }else{

		// get the HTML
		ob_start();
		include(dirname('__FILE__').'/res/certificado_html.php');
	   $content = ob_get_clean();
	   $nombrearchiv= 'certificado_'.$cliente.'_.pdf';
	} */


    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output($nombrearchiv);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
