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
		    <td style="width:100%; color:#034694" ><strong>GARANT??AS DE COBERTURA:</strong></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Es condici??n indispensable para otorgar la presente cobertura que se deber?? cumplir con las siguientes medidas de prevenci??n y est?? de acuerdo en que queda sin protecci??n por parte de la Aseguradora en el momento en que el asegurado o a quien quiera que ??ste contrate falte a cualquiera de ellas:</td>
		</tr>
    </table>
    
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >???	Para el transporte terrestre, as?? como para las conexiones mar??timas, el asegurado garantiza el uso de caminos de cuota cuando est??n disponibles, utilizar veh??culos con caja met??lica cerrada. ??nicamente se permitir?? el uso de veh??culos sin caja met??lica cerrada cuando la naturaleza de los bienes haga imposible el uso de dichas cajas, sin embargo, deber?? contarse con lonas en excelente estado protegiendo la mercanc??a.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >???	Los ??nicos lugares permitidos para hacer una parada son los predios de las gasolineras y las casetas de peaje donde exista vigilancia por personal designado para ello y cuente con lugar especificado para aparcar en las carreteras.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >???	La ??nica excepci??n para lo anterior es una falla mec??nica s??bita e imprevista del medio de transporte.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >???	No obstante lo anterior, en ninguna circunstancia los veh??culos podr??n abandonarse por m??s de ocho horas naturales.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >???	Para permanencias intermedias como parte del curso ordinario de tr??nsito, deber?? realizarse en predios debidamente cerrados con barda perimetral o malla cicl??nica que cuenten con control de entradas y salidas y con personal de vigilancia las 24 horas del d??a.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
            <td style="width:5%;"></td>
		    <td style="width:95%; color:#034694" >???	Los conductores deber??n utilizar equipos de comunicaci??n y/o tel??fonos celulares funcionando, con carga completa y saldo.</td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Cuando esta mercanc??a sea transportada en un veh??culo terrestre con una edad superior a 30 a??os, solo se amparan Riesgos Ordinarios de Tr??nsito y Robo Total y aplica siempre y cuando la causa u origen del da??o no influya directamente en la realizaci??n del siniestro por las condiciones o la antig??edad del veh??culo.</td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#ff0000" >Esta cotizaci??n solo podr?? hacerse valida como Cobertura, si se confirma por escrito mediante orden de trabajo del asegurado la aceptaci??n de la propuesta y comprobante de pago por lo menos dos horas antes de iniciar el viaje, una vez confirmado lo anterior, recibir?? Constancia de Embarque correspondiente.
                                                   La propuesta tiene una validez de 5 d??as naturales, contados a partir de la fecha del presente, siempre y cuando las condiciones de aseguramiento propuestas no se modifiquen.
            </td>
		</tr>
    </table>
	<br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Para que surta efecto la cobertura a consecuencia de fallas en sistema de refrigeraci??n, se deber??n utilizar cajas refrigeradas con una antig??edad m??xima de 15 a??os.</td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >Quedan expresamente excluidos todos los embarques realizados en buques con una antig??edad mayor a 20 a??os y/o chalanes y/o barcazas, (est??s ??ltimas independientemente de la edad) a menos que exista un acuerdo previo al inicio del embarque entre ambas partes.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >1. No m??s de 15 a??os de antig??edad.</td>
		</tr>
        <tr style="font-style:arial; font-size:13px; text-align: left;">
		    <td style="width:100%; color:#034694" >2. M??s de 15 a??os de antig??edad, pero no m??s de 25 a??os de antig??edad y hayan establecido y mantenido un servicio comercial regular con un horario anunciado para cargar y descargar en puertos especificados.
                                                   Buques fletados y tambi??n buques con menos de 1000 toneladas brutas de registro con propulsi??n mec??nica propia y construidos de acero, deben estar clasificados como arriba se menciona y no deben tener m??s de 10 a??os de antig??edad.
            </td>
		</tr>
    </table>
    <br>
</page>
