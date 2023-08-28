<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="../dist/css/imprimir.css?v=1.0.0">
	
</head>

<body>

	<?php 

		// OBTENEMOS LOS DATOS RECIBIDOS POR GET
		$asociado = $_GET["asociado"];
		$cliente = $_GET["cliente"];
		$mercancia = $_GET["mercancia"];
		$mediotransporte = $_GET["mediotransporte"];
		$dobleremolque = $_GET["dobleremolque"];
		$amparacontenedor = $_GET["amparacontenedor"];
		$tipocontenedor1 = $_GET["tipocontenedor1"];
		$tipocontenedor2 = $_GET["tipocontenedor2"];
		$tipodebien = $_GET["tipodebien"];
		$cv = $_GET["cv"];
		$cobertura = $_GET["cobertura"];
		$primaneta = $_GET["primaneta"];
		$iva = $_GET["iva"];
		$total = $_GET["total"];
		$valorembarque = $_GET["valorembarque"];

	?>
	
	<div class="cotizacion canvas_div_pdf" id="imprimibleCt">
		<div class="header">
			<!--<div class="logo">
				<img src="../img/apar-logo.png" alt="">
			</div>
			<div class="title">
				<h2>COTIZACION</h2>
			</div>-->
			<table cellspacing="0" style="width: 100%;">
				<tr>
					<td style="width: 25%; color: #444444;">
						<img style="width: 100%;" src="../img/logo_nuevo_apar.png" alt="Logo"><br>
					</td>
					<td style="width: 75%;text-align:center; font-size: 30px">
					COTIZACION
					</td>
				</tr>
			</table>
		</div>

		<div class="asociado">
			<p><b>Asociado:</b></p>
			<p>JORGE LUNA</p>
		</div>

		<div class="fecha">
			<p>Fecha: 29-07-2021</p>
		</div>

		<div class="info">
			<table>
				<tr>
					<td>Cliente:</td>
					<td id="upp">PRUEBA</td>
				</tr>

				<tr>
					<td>Medio de Transporte:</td>
					<td id="upp">MARITIMO</td>
				</tr>

				<tr>
					<td >Doble Remolque:</td>
					<td id="upp">SI</td>
				</tr>

				<tr>
					<td >Tipo Contenedor 1:</td>
					<td id="upp"></td>
				</tr>

				<tr>
					<td>Tipo Contenedor 1:</td>
					<td id="upp">DRY CARGO/GENERAL PURPOSE 20DC</td>
				</tr>

				<tr>
					<td>Tipo de bien:</td>
					<td id="upp">Nuevos</td>
				</tr>

				<tr>
					<td>Continuacion de Viaje:</td>
					<td id="upp">No</td>
				</tr>

				<tr>
					<td >Cobertura de Mercancia:</td>
					<td id="upp">TODO RIESGO</td>
				</tr>
			</table>
		</div>

		<!-- aqui pongo el codigo del nuevo diseño -->
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 14pt; color:#034694;font-style:arial;">
		<tr>
		<td style="width:100%; "><strong>DATOS DEL CLIENTE</strong> <br></td>
		</tr>
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">
        <tr>
            <td >Cliente: </td>
            <td style="color:#212529"><strong><? echo $cliente; ?></strong></td>
        </tr>
    </table>   
    <table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">
        <tr>
            <td>Medio de Transporte: </td>
            <td style=" color:#212529"><strong><? echo $mediotransporte; ?></strong></td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">    
        <tr>
            <td>Doble Remolque: </td>
            <td style=" color:#212529"><strong><?php echo $dobleremolque;?></strong></td>
        </tr>
    </table>
	<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">    
        <tr>
            <td>Tipo Contenedor 1: </td>
            <td style=" color:#212529"><strong><?php echo $tipocontenedor1;?></strong></td>
        </tr>
    </table>
	<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">    
        <tr>
            <td>Tipo Contenedor 2: </td>
            <td style="color:#212529"><strong><?php echo $tipocontenedor2;?></strong></td>
        </tr>
    </table>
	<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">    
        <tr>
            <td >Tipo de bien: </td>
            <td style="color:#212529"><strong><?php echo $tipodebien;?></strong></td>
        </tr>
    </table>
	<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">    
        <tr>
            <td>Continuacion de Viaje: </td>
            <td style="color:#212529"><strong><?php echo $cv;?></strong></td>
        </tr>
    </table>
	<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; font-size: 11pt;padding:1mm;">    
        <tr>
            <td>Cobertura de Mercancia: </td>
            <td style="color:#212529"><strong><?php echo $cobertura;?></strong></td>
        </tr>
    </table>
    <br>
	<!-- Aqui termina los datos del clioente -->

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; color:#034694;font-style:arial;">
		<tr>
		<td style="width:100%; "><strong>DATOS DEL EMBARQUE Y TRANSPORTE:</strong> <br></td>
		</tr>
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; text-align: center; font-size: 9pt;padding:1mm;">
        <tr>
            <td style="width: 35%; text-align: right; ">No de Guía de Embarque o BL o Pedimento: </td>
            <td style="width: 65%; text-align: left; color:#212529"><strong>MXO0517693</strong></td>
        </tr>
    </table>

		<div class="mercancia">
			<h2>Mercancia</h2>
			<p>BANANA FRESCA EN CAJA</p>
		</div>

		<div class="total">
			<h2>Valor Total del Embarque</h2>
			<p id="total">300,000.00</p>


			<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
				<tr>
					<th style="width: 87%; text-align: right;">PRIMA NETA : </th>
					<th style="width: 13%; text-align: right;">&#36; <? echo number_format(0.98,2);?></th>
				</tr>
				<tr>
					<th style="width: 87%; text-align: right;">IVA : </th>
					<th style="width: 13%; text-align: right;">&#36; <? echo number_format(521,2);?></th>
				</tr>
				<tr>
					<th style="width: 87%; text-align: right;">Total : </th>
					<th style="width: 13%; text-align: right;">&#36; <? echo number_format(3781.60,2);?></th>
				</tr>
			</table>

			<div class="box-total">
				<p><strong>PRIMA NETA :</strong> $ 0.98</p>
				<p><strong>IVA :</strong> $ 521.60</p>
				<p><strong>Total  :</strong> $ 3,781.60</p>
			</div>
			<div class="box-total">
			<table cellspacing="0" style="width: 100%; border: solid 0px black; background: #E7E7E7; text-align: center; font-size: 14pt;padding:1mm;">
				<tr>
					<th style="width: 87%; text-align: right;">PRIMA NETA : </th>
					<th style="width: 13%; text-align: right;">&#36; <? echo number_format(0.98,2);?></th>
				</tr>
				<tr>
					<th style="width: 87%; text-align: right;">IVA : </th>
					<th style="width: 13%; text-align: right;">&#36; <? echo number_format(521,2);?></th>
				</tr>
				<tr>
					<th style="width: 87%; text-align: right;">Total : </th>
					<th style="width: 13%; text-align: right;">&#36; <? echo number_format(3781.60,2);?></th>
				</tr>
			</table>
			</div>
		</div>

		<div class="vigencia">
			<p>*** Esta cotizacion tiene una vigencia de 10 dias ***</p>
		</div>
	</div>


	<div class="boton-imp">
		<button id="btnImprimirCt" type="button" onclick="btnImprimirCt();">
			IMPRIMIR
		</button>

		<button id="dwpdf" onclick="getPDF();">
			DESCARGAR PDF
		</button>

		<button  type="button" >
			REGRESAR
		</button>
	</div>
<br><br>


<!-- jQuery -->
<script src="../js/jquery-v03.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bowe_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript" src="../js/print.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="../js/certificado.js"></script>
</body>

</html>