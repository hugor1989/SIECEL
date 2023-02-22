<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 100%; text-align: center">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 33%; color: #444444;">
                <img style="width: 50%; float:left" src="../../img/logo_nuevo_apar.png" alt="Logo"><br>    
            </td>
			<td style="width: 33%; text-align:center; font-size: 25px; color:#034694">
			    <strong>COTIZACION</strong>
			</td>
            <td style="width: 33%; text-align:center">
                <img style="width: 30%; float:right"" src="../../img/logo_nuevo_sac.png" alt="Logo"><br>
			</td>
			
        </tr>
        <tr>
            <td style="width: 33%; color: #444444;">
            </td>
			<td style="width: 33%;text-align:center; font-size: 14px; color:#034694">
                <? echo $FechaHora;?>
			</td>
            <td style="width: 33%;text-align:center; font-size: 30px"> 
			</td>
        </tr>
    </table>
    <br>
    
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 15px; font-style:arial;">
        <tr>
            <td style="width:30%; text-align: right; color:#1f225b ">Asegurado:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $cliente; ?></strong> </td>
        </tr>
        
        <tr>
            <td style="width:30%; text-align: right; color:#1f225b">R.F.C.:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $rfc; ?></strong> </td>
        </tr>
		
		<tr>    
            <td style="width:30%; text-align: right; color:#1f225b">Mercancia:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $mercancia; ?></strong></td>
			
        </tr>
        <tr>
            <td style="width:30%; text-align: right; color:#1f225b">Medio de Transporte:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $mediotransporte; ?></strong></td>
        </tr>
        <tr>
            
            <td style="width:30%; text-align: right; color:#1f225b">Origen del embarque:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $origenembarque; ?></strong></td>
        </tr>
        
		<tr>
            <td style="width:30%; text-align: right; color:#1f225b">Desde:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $desde; ?></strong></td>
        </tr>
        <tr>
            <td style="width:30%; text-align: right; color:#1f225b">Hasta:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $hasta; ?></strong></td>
        </tr>
        <tr>
            <td style="width:30%; text-align: right; color:#1f225b">Continuacion de Viaje:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $cv; ?></strong></td>
        </tr>
        
        <tr>
            <td style="width:30%; text-align: right; color:#1f225b">Se trata de bienes:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $tipodebien; ?></strong></td>
        </tr>
        
        <tr>            
            <td style="width:30%; text-align: right; color:#1f225b">Valor del embarque:</td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong>$ <? echo number_format($valorembarque,2); ?></strong></td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; color:#1f225b; background-color:#68acff"><strong>Importe total a pagar:</strong></td>
            <td style="width:70% ; text-align: left; color:#1f225b; background-color:#68acff"><strong>$  <? echo number_format($importetotal,2); ?></strong></td>
        </tr>
        </table>
        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 15px; font-style:arial;">
        <tr>            
            <td style="width:30%; text-align: right; color:#1f225b">Coberturas Mercancia: </td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $coberturamercancia ?></strong></td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; color:#1f225b">Deducibles Mercancia: </td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $deducibles ?></strong>
            </td>
        </tr>
        <?php if ($coberturacontenedor != "") { ?>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; color:#1f225b">Coberturas Contenedor: </td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $coberturacontenedor ?></strong></td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; ></td>
            <td style="width:70% ; text-align: left; ><strong></strong>
            </td>
        </tr>
        <tr>            
            <td style="width:30%; text-align: right; color:#1f225b">Deducibles Contenedor: </td>
            <td style="width:70% ; text-align: left; color:#1f225b"><strong><? echo $deduciblescontendor ?></strong>
            </td>
        </tr>
          <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" ><strong>PROTOCOLOS</strong></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" ><?php echo $ProtocoloDescripcion ?></td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" ><strong>GARANTÍAS DE COBERTURA:</strong></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Es condición indispensable para otorgar la presente cobertura que se deberá cumplir con las siguientes medidas de prevención y está de acuerdo en que queda sin protección por parte de la Aseguradora en el momento en que el asegurado o a quien quiera que éste contrate falte a cualquiera de ellas:</td>
		</tr>
    </table>
    
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >•	Para el transporte terrestre, así como para las conexiones marítimas, el asegurado garantiza el uso de caminos de cuota cuando estén disponibles, utilizar vehículos con caja metálica cerrada. Únicamente se permitirá el uso de vehículos sin caja metálica cerrada cuando la naturaleza de los bienes haga imposible el uso de dichas cajas, sin embargo, deberá contarse con lonas en excelente estado protegiendo la mercancía.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >•	Los únicos lugares permitidos para hacer una parada son los predios de las gasolineras y las casetas de peaje donde exista vigilancia por personal designado para ello y cuente con lugar especificado para aparcar en las carreteras.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >•	La única excepción para lo anterior es una falla mecánica súbita e imprevista del medio de transporte.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >•	No obstante lo anterior, en ninguna circunstancia los vehículos podrán abandonarse por más de ocho horas naturales.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >•	Para permanencias intermedias como parte del curso ordinario de tránsito, deberá realizarse en predios debidamente cerrados con barda perimetral o malla ciclónica que cuenten con control de entradas y salidas y con personal de vigilancia las 24 horas del día.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >•	Los conductores deberán utilizar equipos de comunicación y/o teléfonos celulares funcionando, con carga completa y saldo.</td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Cuando esta mercancía sea transportada en un vehículo terrestre con una edad superior a 30 años, solo se amparan Riesgos Ordinarios de Tránsito y Robo Total y aplica siempre y cuando la causa u origen del daño no influya directamente en la realización del siniestro por las condiciones o la antigüedad del vehículo.</td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#ff0000" >Esta cotización solo podrá hacerse valida como Cobertura, si se confirma por escrito mediante orden de trabajo del asegurado la aceptación de la propuesta y comprobante de pago por lo menos dos horas antes de iniciar el viaje, una vez confirmado lo anterior, recibirá Constancia de Embarque correspondiente.
                                                   La propuesta tiene una validez de 5 días naturales, contados a partir de la fecha del presente, siempre y cuando las condiciones de aseguramiento propuestas no se modifiquen.
            </td>
		</tr>
    </table>
	<br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Para que surta efecto la cobertura a consecuencia de fallas en sistema de refrigeración, se deberán utilizar cajas refrigeradas con una antigüedad máxima de 15 años.</td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Quedan expresamente excluidos todos los embarques realizados en buques con una antigüedad mayor a 20 años y/o chalanes y/o barcazas, (estás últimas independientemente de la edad) a menos que exista un acuerdo previo al inicio del embarque entre ambas partes.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >1. No más de 15 años de antigüedad.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >2. Más de 15 años de antigüedad, pero no más de 25 años de antigüedad y hayan establecido y mantenido un servicio comercial regular con un horario anunciado para cargar y descargar en puertos especificados.
                                                   Buques fletados y también buques con menos de 1000 toneladas brutas de registro con propulsión mecánica propia y construidos de acero, deben estar clasificados como arriba se menciona y no deben tener más de 10 años de antigüedad.
            </td>
		</tr>
    </table>
    <br>
</page>
