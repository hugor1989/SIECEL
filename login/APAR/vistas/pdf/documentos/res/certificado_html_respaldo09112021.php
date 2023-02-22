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
                <img style="width: 45%;float:left" src="../../img/logo_chub_320.png" alt="Logo"><br>
                
            </td>
            <td style="width: 33%; color: #444444;">
                <img style="width: 50%; vertical-align:middle;margin:0px 90px" src="../../img/logo_nuevo_apar.png" alt="Logo" class="center" ><br>
                
            </td>
            <td style="width: 30%;">
                <img style="width: 45%; float:right" src=<?php echo "../../" . $ImagenAsociado;?> ><br>
                
            </td>		
        </tr>
    </table>
    
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10pt; font-style:arial;">
		<tr>
		<td style="width:100%; "><strong>Esta Constancia se compone de [[page_nb]] páginas</strong> <br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; color:#034694;font-style:arial;">
		<tr>
		<td style="width:100%; "><strong>CONSTANCIA DE EMBARQUE</strong> <br></td>
		</tr>
    </table>
    
    <table cellspacing="0" border="0" style="width: 100%; font-size: 10pt; font-style:arial;">
        <tr style="font-style:arial; font-size:15px; text-align: rigth;">
        <th style="width:14%; text-align: right;"> N° de Poliza:</th>
        <th style="width:14%; text-align: left;">50-19637</th>
        <th style="width:8%; text-align: right;">Folio:</th>
        <th style="width:25%; text-align: left;"><?php echo $_Folio ?></th>
        <th style="width:20%; text-align: right;">Fecha y Hora: </th>
        <th style="width:19%; text-align: left;"><? echo $FechaHora?></th>
        </tr>
    </table>
    <br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; color:#ffffff; font-style:arial;">
		<tr>
		<td style="width:100%; background-color:#034694" ><strong>DATOS DEL ASEGURADO Y BENEFICIARIO</strong> <br></td>
		</tr>
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 0px black;  font-size: 9pt;padding:1mm;">
        <tr>
            <td style="width: 15%; text-align: right; ">ASEGURADO: </td>
            <td style="width: 85%; text-align: left; color:#212529"><strong>PAR PROFESSIONAL RISK S.C.</strong></td>
        </tr>
    </table>   
    <table cellspacing="0" style="width: 100%; border: solid 0px black;  font-size: 9pt;padding:1mm;">
        <tr>
            <td style="width: 15%; text-align: right;">BENEFICIARIO: </td>
            <td style="width: 60%; text-align: left; color:#212529"><strong><? echo $cliente; ?></strong></td>
            <td style="width: 25%; text-align: left; color:#212529"><strong>RFC:<? echo $rfc; ?></strong></td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border: solid 0px black;  font-size: 9pt;padding:1mm;">    
        <tr>
            <td style="width: 15%; text-align: right;">DOMICILIO: </td>
            <td style="width: 85%; text-align: left; color:#212529"><strong><?php echo $direccion;?></strong></td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; color:#ffffff; font-style:arial;">
		<tr>
		<td style="width:50%; background-color:#034694"><strong>DATOS DEL EMBARQUE Y TRANSPORTE</strong> <br></td>
        <td style="width:50%;"></td>
		</tr>
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
        <tr>
            <td style="width: 35%; text-align: right; ">No de Guía de Embarque o BL o Pedimento: </td>
            <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $NumeroGuia ?></strong></td>
        </tr>
    </table>
        <?php 
            if($idcontenedor1 != "" && $idcontenedor2 != "" ){
                echo '<table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
                    <tr>
                        <td style="width: 35%; text-align: right; ">ID CONTENEDOR 1: </td>
                        <td style="width: 15%; text-align: left; color:#212529"><strong>'.$idcontenedor1.'</strong></td>
                        <td style="width: 35%; text-align: right; ">ID CONTENEDOR 2: </td>
                        <td style="width: 15%; text-align: left; color:#212529"><strong>'.$idcontenedor2.'</strong></td>
                    </tr>
                </table> ';
            }else if ($idcontenedor1 != "" && $idcontenedor2 == "" ){
                echo '<table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
                    <tr>
                        <td style="width: 35%; text-align: right; ">ID CONTENEDOR 1: </td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>'.$idcontenedor1.'</strong></td>
                        
                    </tr>
                </table> ';
            }else if ($idcontenedor1 == "" && $idcontenedor2 != "" ){
                echo '<table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
                    <tr>
                        <td style="width: 35%; text-align: right; ">ID CONTENEDOR 2: </td>
                        <td style="width: 65%; text-align: left; color:#212529"><strong>'.$idcontenedor2.'</strong></td>
                        
                    </tr>
                </table> ';
            }
        ?>
        

        <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width: 35%; text-align: right;">COBERTURA A PARTIR DEL: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $fechacobertura;?> <?php echo $horacobertura;?></strong></td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width: 35%; text-align: right;">DESDE: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $OrigenCobertura; ?></strong></td>
            </tr>
        </table>    
        <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">    
            <tr>
                <td style="width: 35%; text-align: right;">HASTA: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $DestinoCobertura; ?></strong></td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width: 35%; text-align: right;">MEDIO DE TRANSPORTE: </td>
                <td style="width: 15%; text-align: left; color:#212529"><strong><?php echo $mediotransporte; ?></strong></td>
                <td style="width: 35%; text-align: right;">EMBARQUE: </td>
                <td style="width: 15%; text-align: left; color:#212529"><strong><?php echo $nuevoTipoEmbarque; ?></strong></td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width: 35%; text-align: right;">TIPO DE LINEA TRANSPORTISTA: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $nuevoNbLNTRP ; ?></strong></td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black; text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width: 35%; text-align: right;">Nombre de Linea Transportista: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $nuevoLNTRP ?></strong></td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
            <tr>    
                <td style="width: 35%; text-align: right;">TIPO: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $nuevoTipoVehiculo; ?></strong></td>
            </tr>
        </table>
    
        <table cellspacing="0" style="width: 100%; border: solid 0px black; text-align: center; font-size: 9pt;padding:1mm;">    
            <tr>
                <td style="width: 35%; text-align: right;">Nombre Del Chofer: </td>
                <td style="width: 65%; text-align: left; color:#212529"><strong><?php echo $nombrechofer ?></strong></td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black; text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width:35%; text-align: right;" >Marca: <br></td>
                <td style="width:15%; text-align: left; color:#212529 "><strong> <? echo $marca ?></strong> <br></td>
                <td style="width:10%; text-align: right; ">Modelo:<br></td>
                <td style="width:10%; text-align: left; color:#212529"><strong> <? echo $modelo ?></strong> <br></td>
                <td style="width:15%; text-align: right; ">N° de Placas<br></td>
                <td style="width:10%; text-align: left; color:#212529 "><strong><? echo $numeroplacas ?></strong> <br></td>   
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 0px black; text-align: center; font-size: 9pt;padding:1mm;">
            <tr>
                <td style="width:35%; text-align: right;" >N° Motor: </td>
                <td style="width:15%; text-align: left; color:#212529 "><strong> <? echo $motor ?></strong></td>
                <td style="width:10%; text-align: right; ">N° Serie:</td>
                <td style="width:10%; text-align: left; color:#212529"><strong> <? echo $serie ?></strong></td>
                <td style="width:15%; text-align: right; ">Color:</td>
                <td style="width:10%; text-align: left; color:#212529 "><strong><? echo $color ?></strong></td>   
            </tr>
        </table>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; color:#ffffff; font-style:arial;">
		<tr>
		    <td style="width:50%; background-color:#034694 "><strong>RIESGOS CUBIERTOS</strong> <br></td>
            <td style="width:50%;"></td>
		</tr>
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
        <tr>
            <td style="width: 100%; text-align: left; color:#FF0000 "><strong><?php echo $coberturamercancia?>, SOBRE EL VALOR TOTAL DEL EMBARQUE CON UN MÍNIMO DE 40 UMA AL MOMENTO DEL SINIESTRO</strong></td>
        </tr>
    </table>
        <br>
        <?php
             if($amparacontenedor == "Si"){

                echo '  <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
                            <tr>
                                <td style="width: 15%; text-align: rigth; color:#034694"><strong>Para Contenedor:</strong></td>
                                <td style="width: 85%; text-align: left; color:#FF0000"><strong>10% Sobre al valor del contenedor con mínimo de 40 UMA.</strong></td>
                            </tr>
                        </table>';
             }
        ?>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt; font-style:arial;">
		<tr>
		    <td style="width:50%; text-align: left;  color:#ffffff; background-color:#034694"><strong>DEDUCIBLES</strong> <br></td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt; font-style:arial;">
        <tr>
            <td style="width:100%; text-align: left; color: #FF0000 "><strong><?php echo $deducibles ?></strong></td>
		</tr>
    </table>
    <br>
    <?php if ($amparacontenedor == "Si") { ?>
    <table cellspacing="0" style="width: 100%; border: solid 0px black;  text-align: center; font-size: 9pt;padding:1mm;">
        <tr>
            <td style="width:15%; text-align: rigth; color:#034694 "><strong>Para Contenedor:</strong></td>
            <td style="width:85%; text-align: left; color:#FF0000 "><strong><?php echo $deduciblescontenedor ?></strong> <br></td>
		</tr>
    </table>
    <?php } ?>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt; font-style:arial;">
		<tr>
		    <td style="width:50%; text-align: left;  color:#ffffff; background-color:#034694"><strong>DESCRIPCIÓN DE MERCANCÍA</strong> <br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt; font-style:arial;">
        <tr>
            <td style="width:100%; text-align: left; "><strong> <?php echo $mercancia ?></strong> <br></td>
        </tr>
        <?php if ($amparacontenedor == "Si") { ?>
        <tr>
          <td style="width:100%; text-align: left; "><br></td>
        </tr>
        
        <tr>
            <td style="width:100%; font-size: 8pt; text-align: left; "><strong> Esta constancia de Embarque ampara adicional al Valor Total de Mercancía abajo señalado, 2 contenedores con la siguiente descripción:</strong> <br></td>
        </tr>

        <?php } ?>
    </table>
    
    <?php

        if($tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 != "Selecionar Opcion")
        {
            echo ' <table cellspacing="0" style="width: 100%; font-size: 8pt; font-style:arial;">
                    <tr>
                        <td style="width:12%; text-align: rigth; "><strong>Contenedor 1:</strong> <br></td>
                        <td style="width:88%; text-align: left;  color:#034694"><strong>'.$tipocontenedor1.' Hasta '.number_format($Sumasolicitadaprimero,2).'</strong> <br></td>
                    </tr>
                    <tr>    
                        <td style="width:12%; text-align: rigth; "><strong>Contenedor 2:</strong> <br></td>
                        <td style="width:88%; text-align: left;  color:#034694"><strong>'.$tipocontenedor2.' Hasta '.number_format($Sumasolicitadasegundo,2).'</strong> <br></td>
                    </tr>
                  </table> 
                  ';
        }else if ($tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion"){
            echo '
                  <table cellspacing="0" style="width: 100%; font-size: 8pt; font-style:arial;">
                    <tr>
                        <td style="width:15%; text-align: right;><strong>Contenedor 1:</strong> <br></td>
                        <td style="width:85%; text-align: left;  color:#034694"><strong> '.$tipocontenedor1.' Hasta '.number_format($Sumasolicitadaprimero,2).'</strong> <br></td>
                    </tr>
                  </table>
                  ';
        }else if ($tipocontenedor1 == "Selecionar Opcion" && $tipocontenedor2 != "Selecionar Opcion"){
            echo '
                  <table cellspacing="0" style="width: 100%; font-size: 8pt; font-style:arial;">
                    <tr>
                        <td style="width:15%; text-align: right;><strong>Contenedor 2:</strong> <br></td>
                        <td style="width:85%; text-align: left;  color:#034694"><strong>'.$tipocontenedor2.' Hasta '.number_format($Sumasolicitadasegundo,2).'</strong> <br></td>
                    </tr>
                  </table> 
                  ';
        }
    ?>
    <br>
    
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt; font-style:arial;">
        <tr>
            <td style="width:50%; text-align: left;  color:#ffffff; background-color:#034694"><strong>VALOR TOTAL DEL EMBARQUE</strong> <br></td>
        </tr>         
    </table>
    <?php if($valorembarque != "" && $tipocontenedor1 == "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "Si"){ ?>
        <table>        
        <tr>
                    <td style="width:35%; text-align: right;  color:#034694"><strong>Valor de Mercancia Contenedor 1:</strong> <br></td>
                    <td style="width:65%; text-align: left; "><strong>$ <?php echo number_format($valormercancia1,2) ?></strong> <br></td>
                </tr>
                <tr>
                    <td style="width:35%; text-align: right;  color:#034694"><strong>Valor de Mercancia Contenedor 2:</strong> <br></td>
                    <td style="width:65%; text-align: left; "><strong>$ <?php echo number_format($valormercancia2,2) ?></strong> <br></td>
                </tr>
                </table>
        <?php } else if ($valorembarque != "" && $valormercancia2 == "" && $valormercancia1 != "" && $amparacontenedor == "No"  && $tipocontenedor1 == "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "No") {?>

            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt; font-style:arial;">        
            <tr>
                    <td style="width:29%; text-align: right;  color:#034694"><strong>Valor de Mercancia Contenedor 1:</strong> <br></td>
                    <td style="width:22%; text-align: left; "><strong>$ <?php echo number_format($valormercancia1,2); ?> </strong> <br></td>
                    <td style="width:8%; text-align: left;  color:#034694"><strong>Moneda:</strong> <br></td>
                    <td style="width:15%; text-align: left; "><strong>Pesos Mexicanos</strong> <br></td>
                    <td style="width:25%; text-align: right;  color:#034694"><strong>N de Remolques:</strong> <br></td>   
                    <?php if ($valorembarque != "" && $tipocontenedor2 == "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "No"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>1</strong> <br></td>';
                        }else if($valorembarque != "" && $tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "No"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>1</strong> <br></td>';

                        }else if($valorembarque != "" && $tipocontenedor1 == "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "Si"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>2</strong> <br></td>';
                        }
                        else if($valorembarque != "" && $tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 != "Selecionar Opcion" && $dobleremolque == "Si"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>2</strong> <br></td>';
                        }
                    ?>
                </tr>
                <tr>
                    <td style="width:29%; text-align: right;  color:#034694"><strong></strong> <br></td>
                    <td style="width:22%; text-align: left; "><strong></strong> <br></td>
                    <td colspan="2" style=" text-align: left;  color:#ffffff; background-color:#034694 "><strong>VALOR TOTAL DE MERCANCÍA:</strong> <br></td>
                    <td colspan="2" style=" text-align: left; color:#ff0000 "><strong><? echo number_format($valorembarque,2); ?></strong> <br></td>
                </tr>
                
                
            </table>
        
        <?php }else if ($valorembarque != "" && $tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 != "Selecionar Opcion" && $dobleremolque == "Si"){ ?>
            
            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt; font-style:arial;">
                <tr>
                    <td style="width:29%; text-align: right;  color:#034694"><strong>Valor de Mercancia Contenedor 1:</strong> <br></td>
                    <td style="width:22%; text-align: left; "><strong>$ <?php echo number_format($valormercancia1,2); ?> </strong> <br></td>
                    <td style="width:8%; text-align: left;  color:#034694"><strong>Moneda:</strong> <br></td>
                    <td style="width:15%; text-align: left; "><strong>Pesos Mexicanos</strong> <br></td>
                    <td style="width:25%; text-align: right;  color:#034694"><strong>N de Remolques:</strong> <br></td>   
                    <?php if ($valorembarque != "" && $tipocontenedor2 == "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "No"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>1</strong> <br></td>';
                        }else if($valorembarque != "" && $tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "No"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>1</strong> <br></td>';

                        }else if($valorembarque != "" && $tipocontenedor1 == "Selecionar Opcion" && $tipocontenedor2 == "Selecionar Opcion" && $dobleremolque == "Si"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>2</strong> <br></td>';
                        }
                        else if($valorembarque != "" && $tipocontenedor1 != "Selecionar Opcion" && $tipocontenedor2 != "Selecionar Opcion" && $dobleremolque == "Si"){
                            
                            echo ' <td style="width:10%; text-align: left; "><strong>2</strong> <br></td>';
                        }
                    ?>
                </tr>
                <tr>
                <td>
                </td>
                </tr>
                <tr>
                    <td style="width:29%; text-align: right;  color:#034694"><strong>Valor de Mercancia Contenedor 2:</strong> <br></td>
                    <td style="width:22%; text-align: left; "><strong>$ <?php echo number_format($valormercancia2,2);?></strong> <br></td>
                    <td colspan="2" style=" text-align: left;  color:#ffffff; background-color:#034694 "><strong>VALOR TOTAL DE MERCANCÍA:</strong> <br></td>
                    <td colspan="2" style=" text-align: left; color:#ff0000 "><strong><? echo number_format($valorembarque,2); ?></strong> <br></td>
                </tr>
                <?php if ($dobleremolque == "Si" && $valormercancia1 != "" && $valormercancia2 == "") {?>
                    <tr>
                    <td>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="5" style=" text-align: center;  color:#ff0000"><strong>EL VALOR TOTAL DEL MERCANCÍA CONSIDERA LA CARGA DE LOS DOS CONTENEDORES.</strong> <br></td>
                    </tr>

                <?php } ?>
                

            </table>
            
        <?php }?>    
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt; font-style:arial;">
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td style="width:25%; text-align: righ;  color:#ffffff; background-color:#034694"><strong>VALOR PARA SEGURO:</strong> <br></td>
            <td style="width:75%; text-align: left; "><strong><?php echo $TipoSeguro ?></strong> <br></td>
        </tr>         
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
    <tr style="font-style:arial; font-size:12px;">
		    <td style="width:45%; text-align: center; ">¿Cuenta con Medidas de Seguridad?</td>
            <td style="width:10%; text-align: center; "><strong>SI</strong></td>
            <td style="width:45%; text-align: center; "><strong>GPS</strong></td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; ">
		<tr style="font-style:arial; font-size:13px;">
		    <td style="width:35%; text-align: right; ">Observaciones</td>
            <td style="width:65%; text-align: left; "><strong><?php echo $ObservacionGnral ?></strong></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: center;">
		    <td style="width:100%; " ><strong>Esta Constancia se encuentra sujeto a las Condiciones Generales y particulares del Seguro de Transportes Carga póliza 50-19637 de Chubb Seguros México, S.A.</strong></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " ><strong>Vigencia del Seguro para Transporte Terrestre y/o Aéreo o de ambas clases</strong><br></td>
		</tr>

        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >Este seguro entra en vigor desde el momento en que los bienes y/o mercancías quedan a cargo de los porteadores para su transporte, continúa durante el curso ordinario de su viaje y cesa a la llegada de los bienes al punto de destino estipulado en el conocimiento y/o talón de embarque y/o carta porte, o con su entrega al consignatario si éste ocurriere primero.<br><br></td>
		</tr>
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >Para los embarques en vehículos de carga propios y/o bajo el control del asegurado, el seguro entra en vigor desde el momento en que el medio de transporte inicia su tránsito y cesa al terminar éste en su destino final.<br><br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " ><strong>Vigencia del Seguro. Transporte Marítimo</strong><br></td>
		</tr>

        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >Este seguro entra en vigor desde el momento en que los bienes queden a cargo de los porteadores para su transporte, continúa durante el curso ordinario de su viaje y termina con la descarga de los mismos, sobre los muelles, en el puerto de destino.<br><br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " ><strong>Bienes Cubiertos.</strong><br></td>
		</tr>

        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >La póliza se destina a cubrir los embarques de las mercancías que se detallan en esta Constancia como DESCRIPCIÓN DE MERCANCÍA, por lo que en caso de que la mercancía sea distinta, las obligaciones de Chubb Seguros México, S.A.quedaran extinguidas.<br><br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " ><strong>Riesgos Cubiertos.</strong><br></td>
		</tr>

        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >Los bienes cubiertos por esta póliza quedan amparados contra toda pérdida o daños materiales causados únicamente por cualquiera de los Riesgos que se detallan en esta Constancia como RIESGOS CUBIERTOS y contratados en esta póliza.<br><br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " ><strong>Cláusula de rastreo satelital.</strong><br></td>
		</tr>

        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >El equipo del sistema de rastreo deberá estar correctamente instalado en el tracto camión y/o en la caja del vehículo donde viaja la carga asegurada y/o dentro de la carga y deberá de estar en condiciones óptimas de operación.<br><br></td>
		</tr>
        <tr style="font-style:arial; font-size:9px; text-align: rigth;">
		    <td style="width:100%; " >El embarque deberá ser monitoreado de forma ininterrumpida desde el inicio hasta el final del viaje, con reporte de eventualidades al asegurado y a las autoridades correspondientes; así como tener implementado un Plan o Protocolo de Reacción y/o de Emergencia ante cualquier anomalía relacionada con el transporte de los bienes, o en caso de robo o intento de robo.<br><br></td>
		</tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; text-align: center;">
		    <td style="width:50%; " ><strong>DUDAS ASESORÍA Y ASISTENCIA:</strong><br></td>
            <td style="width:50%; " ><strong>PARA REPORTE DE SINIESTRO</strong><br></td>
		</tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; ">
            <td style="width:50%; text-align: rigth;" >CORRESPONSAL <?php echo $asociado ?><br><br></td>
            <td style="width:50%; text-align: center;" >55 52585801 / 0181 83748053<br><br></td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; ">
            <td style="width:20%; text-align: center;" ><strong>ASESOR "APAR"</strong><br><br></td>
            <td style="width:20%; text-align: center;" ><strong>33 38 09 86 28</strong><br><br></td>
            <td style="width:20%; text-align: center;" ><strong>33 36 27 29 91</strong><br><br></td>
            <td style="width:20%; text-align: center;" ><strong>contacto@apar.com.mx</strong><br><br></td>
            <td style="width:20%; text-align: center;" ><strong>www.chubb.com/mx</strong><br><br></td>
        </tr>
    </table>

    <table cellspacing="0" style="width: 100%;">
        <tr style="font-style:arial; font-size:9px; ">
            <td style="width: 20%;">
                <img style="width: 30%; vertical-align:center;margin:0px 0px" src=<?php echo $file ?>><br>                 
            </td>
            <td style="width: 80%; text-align: rigth; color:#034694;">
            <strong>
            Esta Constancia se ha expedido por medios Electrónicos, por lo que en caso de Siniestro deberá solicitarse al Asesor el Documento Original, para validar su autenticidad.
            </strong>
            </td>
        </tr>
    </table>
    
</page>

