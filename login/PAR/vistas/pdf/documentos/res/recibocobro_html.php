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

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <? echo "apar.com.mx "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>

    <table cellspacing="0" style="width: 100%;  ">
        <tr>

            <td style="width: 40%; color: #444444;">
                <img style="width: 35%;float:center" src="../../img/logo-par-modificado.png" alt="Logo" class="center"><br>
                
            </td>
            <td style="width: 30%; color: #444444;">
                
                
            </td>
            <td style="width: 30%; color: #444444;">
                
                
            </td>		
        </tr>
    </table>
    <br>
    
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14pt; background-color:#034694; font-style:arial;">
		<tr>
		<td style="width:100%; color: #ffffff; "><strong>AVISO DE COBRO</strong> <br></td>
		</tr>
    </table>

    <br>
     <table cellspacing="0"  style="width: 100%; text-align: center; font-size: 14pt;  font-style:arial;">
		<tr>
            <td style="width:60%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; text-align: center; font-size: 12pt; background-color:#034694; font-style:arial;">
                    <tr>
                        <td style="width:100%; color: #ffffff; ">
                        DATOS DEL ASEGURADO
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:40%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; text-align: center; font-size: 12pt; background-color:#034694; font-style:arial;">
                    <tr>
                        <td style="width:100%; color: #ffffff; ">
                        DATOS DE COBERTURA
                        </td>
                    </tr>
                </table>
            </td>
		</tr>
       
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 0px black;  font-size: 9pt;padding:1mm;">
		<tr>
            <td style="width:60%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; border: solid 0px black;  font-size: 9pt;padding:1mm; font-style:arial;">
                    <tr>
                        <td style="width: 15%; text-align: left; color:#212529">Nombre: </td>
                        <td style="width: 85%; text-align: left; color:#212529"><strong>><? echo $cliente; ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; color:#212529">y/o: </td>
                        <td style="width: 85%; text-align: left; color:#212529"><strong></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; color:#212529">Domicilio: </td>
                        <td style="width: 85%; text-align: left; color:#212529"><strong><?php echo $direccion;?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; color:#212529">R.F.C: </td>
                        <td style="width: 85%; text-align: left; color:#212529"><strong><?php echo $rfc;?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 15%; text-align: left; color:#212529">Correo: </td>
                        <td style="width: 85%; text-align: left; color:#212529"><strong><?php echo $email;?></strong></td>
                    </tr>
                </table>
            </td>
            <td style="width:40%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; border: solid 0px black;  font-size: 9pt;padding:1mm; font-style:arial;">
                     <tr>
                        <td style="width: 40%; text-align: left; color:#212529">No. De Poliza: </td>
                        <td style="width: 60%; text-align: left; color:#212529"><strong>ECS-123456 S.C.</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left; color:#212529">No. De Constancia: </td>
                        <td style="width: 60%; text-align: left; color:#212529"><strong><?php echo $_Folio ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left; color:#212529">Forma de Pago: </td>
                        <td style="width: 60%; text-align: left; color:#212529"><strong>CONTADO</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left; color:#212529">Moneda: </td>
                        <td style="width: 60%; text-align: left; color:#212529"><strong>M.N.(PESOS MEXICANOS)</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: left; color:#212529">Asociado: </td>
                        <td style="width: 60%; text-align: left; color:#212529"><strong><?php echo $asociado ?></strong></td>
                    </tr>
                </table>
            </td>
		</tr>
       
    </table>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14pt; background-color:#034694; font-style:arial;">
		<tr>
		<td style="width:100%; color: #ffffff; "><strong>DATOS DE COBRO</strong> <br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; font-style:arial;">
		<tr>
		<td style="width:100%; color: #020202; ">Vigencia desde:  las XX:XX horas del 03 de Noviembre de 2021<br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%; border: solid 0px black; padding:1mm;">
		<tr>
            <td style="width:33%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; border: solid 2px black; background-color:#d9d9d9; font-size: 8pt;padding:1mm; font-style:arial;">
                    <tr>
                        <td style="width: 35%; text-align: left; color:#212529">Moneda</td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>M.N.(Pesos Mexicanos)</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 35%; text-align: left; color:#212529">Banco</td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>Citibanamex</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 35%; text-align: left; color:#212529">Cuenta clabe</td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>002320904001226510</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 35%; text-align: left; color:#212529">No. de cuenta</td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>122651</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 35%; text-align: left; color:#212529">Sucursal</td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>9040</strong></td>
                    </tr>
                </table>
            </td>
            <td style="width:33%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; border: solid 2px black; background-color:#d9d9d9; font-size: 9pt;padding:0mm; font-style:arial;">
                    <tr>
                        <td style="width: 23%; text-align: left; color:#212529">Nombre</td>
                        <td style="width: 77%; text-align: left; color:#212529"><strong>Armando Varela Chavez</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 23%; text-align: left; color:#212529">R.F.C. </td>
                        <td style="width: 77%; text-align: left; color:#212529"><strong>VACA5808276QA</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 23%; text-align: left; color:#212529">Direccion</td>
                        <td style="width: 77%; text-align: left; color:#212529"><strong>Mision San Francisco 58, Residencial Plaza Guadalupe Inn, C.P. 45030, C.P. 45030</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 23%; text-align: left; color:#212529">correo</td>
                        <td style="width: 77%; text-align: left; color:#212529"><strong>contabilidad.01@apar.com.mx</strong></td>
                    </tr>
                  
                </table>
            </td>
            <td style="width:34%; color: #ffffff; ">
                <table cellspacing="0" style="width: 100%; border: solid 2px black; background-color:#d9d9d9; font-size: 9pt;padding:0mm; font-style:arial;">
                     <tr>
                        <td style="width: 60%; text-align: center; color:#212529"><strong>Descripción</strong></td>
                        <td style="width: 40%; text-align: center; color:#212529"><strong>Importe</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 60%; text-align: left; color:#212529">Prima Neta </td>
                        <td style="width: 40%; text-align: right; color:#212529"><strong><?php echo $primaneta ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 60%; text-align: left; color:#212529">Derecho de Certificado </td>
                        <td style="width: 40%; text-align: right; color:#212529"><strong><?php echo $certificado ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 60%; text-align: left; color:#212529">I.V.A. </td>
                        <td style="width: 40%; text-align: right; color:#212529"><strong><?php echo $iva ?></strong></td>
                    </tr>
                </table>
            </td>
		</tr>
       
    </table>

  
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8.5pt; font-style:arial;">
		<tr>
		    <td style="width:100%; text-align: left; >1. -Pago por transferencia electrónica a cuenta CLABE (SPEI o TEF). Se deberá indicar en el campo de concepto de pago EL NUMERO DE CONSTANCIA
      además  indicar el importe exacto del recibo, debiendo enviar copia del comprobante de trasferencia al correo contabilidad.01@apar.com.mx <br></td>
		</tr>
        <tr>
		    <td style="width:100%; text-align: left; >2.- Pago con cheque:<br>
                                                     <strong>a)</strong> Se entenderá de recibido salvo buen cobro, como lo indica el Artículo 7° de la Ley General de Títulos y Operaciones de Crédito.<br>
                                                     <strong> b)</strong> El cheque deberá ser expedido a nombre de "Armando Varela Chavez", anotando la leyenda "Para abono a cuenta del Beneficiario". </td>
        </tr>
        <tr>
		    <td style="width:100%; text-align: left; >3.- Pago en efectivo, devera realizarse deposito a nombre de "Armando Varela Chavez" a la cuenta indicada, posteriormente debera enviarse copia
        del comprobante al correo  contabilidad.01@apar.com.mx indicando el numero de constancia que correspode.<br></td>
		</tr>
        <tr>
		    <td style="width:100%; text-align: left; >4.- Este aviso de cobro no es un comprobante fiscal, exija su recibo oficial (factura) una vez liquidada la prima.<br></td>
		</tr>
        <tr>
		    <td style="width:100%; text-align: left; >5.- El pago de este documento no libera de adeudos anteriores.<br></td>
		</tr>
        <tr>
		    <td style="width:100%; text-align: left; >6.- En caso de siniestro, si asi se le requiere, debera muestrar el comprobante de pago oficial al personal autorizado. <br></td>
		</tr>
    </table>
    <br>
 
</page>

