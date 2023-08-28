
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Generar Cotizacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Generar Cotizacion</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <i class="fas fa-edit"></i>
                  Datos Generales
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6" id="DV_FechaHora">
                        <label> Fecha y Hora</label>
                          <?php 
                            date_default_timezone_set('America/Mexico_City');
                            $DateAndTime = date('d-m-Y', time());
                            $hora = date('h:i:s a', time());
                            
                            ///Se usa para co
                            $time = $hora; 
                            $chunks = explode(':', $time);
                             if (strpos( $time, '') === false && $chunks[0] !== '12') {
                                 $chunks[0] = $chunks[0] + 12;
                             } else if (strpos( $time, '') === false && $chunks[0] == '12') {
                                 $chunks[0] = '00';
                             }

                             //SUMAR 60 MINUTOS DESPUES DE LA HORA Y se usa para actualizar para el input de abajo
                              $MINUTOS = strtotime('+60 minutes'); 
                              $HORA2 = date('h:i:s a', $MINUTOS);
                              $time2 = $HORA2; 
                              $chunks2 = explode(':', $time2);
                              if (strpos( $time2, 'AM') === false && $chunks2[0] !== '12') {
                                  $chunks2[0] = $chunks2[0] + 12;
                              } else if (strpos( $time2, 'PM') === false && $chunks2[0] == '12') {
                                  $chunks2[0] = '00';
                              }

                          ?>
                        <input type="text" class="form-control sm" id="DT_FechaHora" name="DT_FechaHora" value="<?php echo $DateAndTime." ".date("H:i", Strtotime($time)); ?>" disabled >
                        <input type="hidden" id="DT_Actual" name="DT_Actual" value="<?php echo $DateAndTime; ?>" >
                        <input type="hidden" id="hora_Actual" name="hora_Actual" value="<?php echo date("H:i", Strtotime($time)); ?>" >
                        <!--<label> Hora </label>-->
                       <!--<input type="text" class="form-control sm" id="hora_Actual" value="" disabled >-->
                      </div>
                      <div class="col-md-6">
                        <label> Folio </label>
                        <input type="hidden" name="TB_ObjComision" id="TB_ObjComision" disabled></input>
                        <input type="hidden" name="TB_ObjCuotaBasica" id="TB_ObjCuotaBasica" disabled></input>
                        <input type="hidden" name="TB_ObjCuotaRot" id="TB_ObjCuotaRot" disabled></input>
                        <input type="hidden" name="TB_ObjCuotaTR" id="TB_ObjCuotaTR" disabled></input>
                        <input type="hidden" name="TB_ObjCuotaContenedor" id="TB_ObjCuotaContenedor" disabled></input>
                        <input type="hidden" name="TB_ObjPrimaminima" id="TB_ObjPrimaminima" disabled></input>
                        <input type="hidden" name="TB_ObjDerechoCertificado" id="TB_ObjDerechoCertificado" disabled></input>
                          <?php 
                            $perfil = $_SESSION['perfil'];
                            $item="Id";
                            $valor=$_SESSION['id'];
                            if($perfil == 1){

                              echo ' <input type="text" class="form-control sm" name="TB_Folio" id="TB_Folio" disabled></input>';
                            }else{
                              
                              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                                foreach ($usuarios as $key => $value){

                                  echo ' <input type="hidden" class="form-control sm" name="TB_Folio" id="TB_Folio" value='.$value["Abreviatura"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjComision" id="TB_ObjComision" value='.$value["Comision"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaBasica" id="TB_ObjCuotaBasica" value='.$value["Cuota_VT"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaRot" id="TB_ObjCuotaRot" value='.$value["Cuota_Rot"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaTR" id="TB_ObjCuotaTR" value='.$value["Cuota_TR"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjCuotaContenedor" id="TB_ObjCuotaContenedor" value='.$value["Cuota_Contenedor"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjPrimaminima" id="TB_ObjPrimaminima" value='.$value["Prima_minima"].' disabled></input>';
                                  echo ' <input type="hidden" class="form-control sm" name="TB_ObjDerechoCertificado" id="TB_ObjDerechoCertificado" value='.$value["Derecho_Certificado"].' disabled></input>';
                                }
                            }
                          ?>
                       
                      </div>
                    </div>
                    </br>
                    <label> Asociado </label>
                     <!-- ENTRADA PARA EL Asociado -->
                     <?php 
                        $perfil = $_SESSION['perfil'];
                        $nombre = $_SESSION['nombre'];
                        $item1=null; 
                        $valor1=null;
                        if($perfil == 1){
                         
                          echo '<div class="input-group mb-3">
                                  <select class="form-control select2 input-lg" id="nuevoAsociado" name="nuevoAsociado" required>	
                                    <option value="">Selecionar Asociado</option>
                                      ';
                                      $asociado = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1);

                                      foreach ($asociado as $key => $value){

                                          echo '<option value='.$value["Id"].'>'.$value["Nombre"].'</option>';
                                      }
                                   echo ' </select>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                      </div>';   
                        }else{

                          echo '<input type="text" class="form-control" name="nuevoAsociado" id="nuevoAsociado" value="'.$nombre.'" disabled>';
                        }
                     ?>
                   <!-- -->
                    <div class="form-group" id="cliente">
                      <label>Cliente</label>
                      <!--<input type="hidden" name="TB_MAUTO" id="TB_MAUTO" disabled></input>-->
                      <?php 
                        $perfil = $_SESSION['perfil'];

                        if($perfil ==1){
                          echo '<select class="form-control select2"  id="nuevoCliente" name="nuevoCliente" style="width: 100%;">
                                  <option selected="selected">Seleccionar Cliente</option>
                                </select>';
                        }else{

                          $itemCliente="Asociado"; 
                          $valorCliente=$_SESSION['id'];

                          echo '<div class="input-group mb-3">
                                    <select class="form-control select2 input-lg" id="nuevoCliente" name="nuevoCliente" required>	
                                        <option value="">Selecionar Cliente</option>
                                      ';
                                      $cliente = ControladorPersona::ctrMostrarAsociado($itemCliente, $valorCliente);

                                      foreach ($cliente as $key => $value){

                                          echo '<option value='.$value["Id"].'>'.$value["Nombre"].'</option>';
                                      }
                                  echo ' </select>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                      </div>';}
                       ?>
                    </div>
                    <!-- Fin de Seleccionar Cliente -->
                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                        <label>Mercancia</label>
                          <select class="form-control select2 input-lg" id="nuevoMercancia"  name="nuevoMercancia" required>	
                            <option value="">Selecionar Mercancia</option>
                                <?php
                                    $itemMercancia = null;
                                    $valorMercancia = null; 
                                    $mercancia = ControladorMercancia::ctrMostrarMercancia($itemMercancia, $valorMercancia);

                                    foreach ($mercancia as $key => $value){
                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Giro"] ?>" ><?php echo $value["Descripcion"] ?></option>
                                        <?php
                                    }	
                                    ?>			
                          </select>
                          <input type="hidden" name="TB_Peligrosidad" id="TB_Peligrosidad"/>
                          <input type="hidden" name="TB_ValorAseguradora" id="TB_ValorAseguradora"/>
                          <input type="hidden" name="TB_ValorApar" id="TB_ValorApar"/>
                          <input type="hidden" name="TB_ROT" id="TB_ROT"/>
                          <input type="hidden" name="TB_Robo" id="TB_Robo"/>
                          <input type="hidden" name="TB_Otros" id="TB_Otros"/>
                          <input type="hidden" name="TB_VT" id="TB_VT"/>
                          <input type="hidden" name="TB_EspecialesA" id="TB_EspecialesA"/>
                          <input type="hidden" name="TB_EspecialesB" id="TB_EspecialesB"/>
                          <input type="hidden" name="TB_ValorA" id="TB_ValorA"/>
                          <input type="hidden" name="TB_ValorB" id="TB_ValorB"/>
                          <input type="hidden" name="TB_ValorC" id="TB_ValorC"/>
                          <input type="hidden" name="TB_ValorD" id="TB_ValorD"/>
                          <input type="hidden" name="TB_ValorE" id="TB_ValorE"/>
                          <input type="hidden" name="TB_ValorF" id="TB_ValorF"/>
                        </div>  
                      </div>
                      <div class="col-4">
                          <div class="form-group">
                            <label>Giro</label>
                            <input type="text" class="form-control sm" name="TB_Giro" id="TB_Giro" disabled>
                          </div>
                      </div>
                    </div>
                    <!-- Termina Row de Mercancia -->
                    <div class="row">
                        <div class="col-md-6">
                            <label> Valor de Embarque </label>
                            <input class="form-control" type="text" name="TB_ValorEmbarque" id="TB_ValorEmbarque" onblur="F_ValidarValorEmbarque()"/>
                         </div>
                         <div class="col-md-6">
                         <label> Medio de Transporte </label>
                            <div class="input-group mb-3">
                                    <select class="form-control input-lg" name="MTPT" id="MTPT">
                                        <option value="">Selecionar Opcion</option>
                                        <option value="TE">TERRESTRE</option>
                                        <option value="MMT">MARITIMO</option>
                                        <option value="AEREO">AEREO</option>
                                        <option value="COMAM">COMBINACION AEREO - MARITIMO</option>
                                        <option value="COMAMT">COMBINACION AEREO - MARITIMO - TERRESTRE</option>
                                        <option value="COMAT">COMBINACION AEREO - TERRESTRE</option>
                                        <option value="COMMT">COMBINACION MARITIMO - TERRESTRE</option>
                                    </select>   
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-users"></span>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" >
                      <label> Se trata de Doble Remolque (Carga Full)? </label>
                            <div class="input-group mb-3">
                            <select class="form-control input-lg" name="nuevoRemolque" id="nuevoRemolque">
                                <option value="">Selecionar Opcion</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fa fa-users"></span>
                                    </div>
                                </div>
                            </div>
                            <label id="txt-remolque" name="txt-remolque"></label>
                      </div>
                      <div class="col-md-6" >
                      <label> Se ampara Contenedor? </label>
                        <div class="input-group mb-3">
                            <select class="form-control input-lg" name="nuevoContenedor" id="nuevoContenedor" >
                                <option value="">Selecionar Opcion</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>

                            </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fa fa-users"></span>
                                    </div>
                                </div>
                            </div> 
                      </div>
                    </div>  
                    <!-- Termina  row -->
                      <!-- Y/O Y RFC -->  
                    <!-- Termina  row -->
                    <div class="row">
                      <div class="col-md-6">
                        
                        <label id="txt-contenedor1" name="txt-contenedor1">IDENTIFICADOR DEL CONTENEDOR 1.</label>
                        <input type="text" class="form-control sm" id="contenedor1" disabled> </input>
                        
                      </div>
                      <div class="col-md-6">
                        <!--<label> Contendedor 2 </label>-->
                        <label id="txt-contenedor2" name="txt-contenedor2">IDENTIFICADOR DEL CONTENEDOR 2.</label>
                        <input type="text" class="form-control sm" id="contenedor2" disabled ></input>
                        
                      </div>
                    </div>
                    <!-- Termina  row -->
                    <div class="row">
                        <div class="col-md-6">
                            <label id="element1" name="element1">Tipo de Contenedor 1.</label>
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" name="nuevoTipoContenedor1" id="nuevoTipoContenedor1" disabled>
                                  <option value="No">Selecionar Opcion</option>
                                  <option value="DRY20DC">DRY CARGO/GENERAL PURPOSE 20DC</option>
                                  <option value="DRY40DC">DRY CARGO/GENERAL PURPOSE 40DC</option>
                                  <option value="HIGHDRY20">HIGH CUBE DRY CARGO 20DX</option>
                                  <option value="HIGHDRY40">HIGH CUBE DRY CARGO 40DX</option>
                                  <option value="REEFEREQ20">REEFER HIGH CUBE C/ EQUIPO 20RX</option>
                                  <option value="REEFEREQ40">REEFER HIGH CUBE C/ EQUIPO 40RX</option>
                                  <option value="REEFER20FT">REEFER SIN EQUIPO 20 ft</option>
                                  <option value="REEFERSQ40FT">REEFER SIN EQUIPO 40 ft</option>
                                  <option value="REEFERSQ40FTHC">RREEFER SIN EQUIPO 40 ft HC</option>
                                  <option value="REFRIGERATED20">REFRIGERATED 20RF</option>
                                  <option value="REFRIGERATED40">REFRIGERATED 40RF</option>
                              </select>
                            </div>
                        </div>
                        <div  class="col-md-6">
                                <label name="element2" id="element2">Tipo de Contenedor 2.</label>
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" name="nuevoTipoContenedor2" id="nuevoTipoContenedor2" disabled>
                                  <option value="No">Selecionar Opcion</option>
                                  <option value="DRY20DC">DRY CARGO/GENERAL PURPOSE 20DC</option>
                                  <option value="DRY40DC">DRY CARGO/GENERAL PURPOSE 40DC</option>
                                  <option value="HIGHDRY20">HIGH CUBE DRY CARGO 20DX</option>
                                  <option value="HIGHDRY40">HIGH CUBE DRY CARGO 40DX</option>
                                  <option value="REEFEREQ20">REEFER HIGH CUBE C/ EQUIPO 20RX</option>
                                  <option value="REEFEREQ40">REEFER HIGH CUBE C/ EQUIPO 40RX</option>
                                  <option value="REEFER20FT">REEFER SIN EQUIPO 20 ft</option>
                                  <option value="REEFERSQ40FT">REEFER SIN EQUIPO 40 ft</option>
                                  <option value="REEFERSQ40FTHC">RREEFER SIN EQUIPO 40 ft HC</option>
                                  <option value="REFRIGERATED20">REFRIGERATED 20RF</option>
                                  <option value="REFRIGERATED40">REFRIGERATED 40RF</option>
                              </select>
                            </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label id="TB_Responsabilidad1" name="TB_Responsabilidad1">Valor Maximo Compañia</label>
                            <input type="text" class="form-control sm" id="TB_Valor1" name= "TB_Valor1" disabled> </input>
                          </div>
                          <div class="col-md-6">
                            <label  >Suma Asegurada Solicitada</label>
                            <input type="text" class="form-control sm" id="TB_SumaSolicitada1" name= "TB_SumaSolicitada1" disabled> </input>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="row">
                          <div class="col-md-6">
                            <label id="TB_Responsabilidad2" name="TB_Responsabilidad2">Valor Maximo Compañia</label>
                            <input type="text" class="form-control sm" id="TB_Valor2" name= "TB_Valor2" disabled ></input>
                          </div>
                          <div class="col-md-6">
                            <label  >Suma Asegurada Solicitada</label>
                            <input type="text" class="form-control sm" id="TB_SumaSolicitada2" name= "TB_SumaSolicitada2" disabled> </input>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                              <label> Tipo de Bien? </label>
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" name="nuevoBienesDesperdicios" id="nuevoBienesDesperdicios">
                                  <option value="">Selecionar Opcion</option>
                                  <option value="Usados">Bienes Usuados o Reconstruidos</option>
                                  <option value="Nuevos">Nuevos</option>
                              </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fa fa-users"></span>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <label> ¿EL Trayecto es continuación de viaje? </label>
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" name="nuevoCVJ" id="nuevoCVJ">
                                  <option value="">Selecionar Opcion</option>
                                  <option value="Si">Si (No cuenta con Certificado)</option>
                                  <option value="SiCertificado">Si (Se cuenta con Certificado)</option>
                                  <option value="No">No</option>
                              </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fa fa-users"></span>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div div class="col-md-5">
                         <label> Cobertura de Mercacias </label>
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" name="nuevoCBM" id="nuevoCBM">
                                  <!-- <option value="">Selecionar Opcion</option>
                                  <option value="ROT">ROT Y ROBO</option>
                                  <option value="TR">TODO RIESGO</option>
                                  <option value="TRVT">TODO RIESGO Y VT</option> -->
                              </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fa fa-users"></span>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <!-- Termina  row -->
                    <div class="row">
                      <div class="col-md-6">
                        <table cellspacing="2" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                                <th style="width: 80%; text-align: right;">CUOTA MERCANCIA:  </th>
                                <th style="width: 20%; text-align: right;"><input type="text" class="form-control sm" 
                                                                                  style="text-align:right" id="TB_CMCIA" 
                                                                                  name="TB_CMCIA" disabled ></input></th>
                                
                            </tr>
                        </table>
                        <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                              <th style="width: 80%; text-align: right;">PRIMA NETA MERCANCIA : </th>
                                <th style="width: 20%; text-align: right;">
                                <input type="text" class="form-control sm" 
                                       style="text-align:right" id="TB_PNTA" name= "TB_PNTA" 
                                        disabled ></input>
                              </th>
                                
                            </tr>
                        </table>
                        <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                              <th style="width: 80%; text-align: right;">PRIMA NETA CONTENEDOR :</th>
                                <th style="width: 20%; text-align: right;">
                                <input type="text" class="form-control sm" style="text-align:right"
                                       id="TB_PMCTND" name= "TB_PMCTND" 
                                       disabled ></input>
                              </th>
                                
                            </tr>
                        </table>
                        <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                              <th style="width: 80%; text-align: right;">PRIMA NETA TOTAL : </th>
                                <th style="width: 20%; text-align: right;">
                                <input type="text" class="form-control sm" style="text-align:right"
                                       id="TB_PMAGT" name= "TB_PMAGT" 
                                        disabled ></input>
                              </th>
                                
                            </tr>
                        </table>
                        <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                              <th style="width: 80%; text-align: right;">DERECHO CERTIFICADO : </th>
                                <th style="width: 20%; text-align: right;">
                                <input type="text" class="form-control sm"
                                       style="text-align:right" id="TB_DCRT" name= "TB_DCRT" 
                                       disabled ></input>
                              </th>
                                
                            </tr>
                        </table>
                        <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                              <th style="width: 80%; text-align: right;">IVA : </th>
                                <th style="width: 20%; text-align: right;">
                                <input type="text" class="form-control sm" style="text-align:right"
                                       id="TB_IVA" name= "TB_IVA"
                                       disabled ></input>
                              </th>
                                
                            </tr>
                        </table>
                        <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                            <tr>
                              <th style="width: 80%; text-align: right;">PRIMA TOTAL APAR :</th>
                                <th style="width: 20%; text-align: right;">
                                <input type="text" class="form-control sm" 
                                        style="text-align:right" id="TB_IVATOTAL" name= "TB_IVATOTAL" 
                                        disabled ></input>
                                  </th>
                            </tr>
                        </table>
                        
                      </div>
                      <div class="col-md-6">
                            <div class="col-auto p-5 text center" >
                              <h4 class="text-center"><strong>PRIMA NETA A COBRAR A CLIENTE</strong></h4>
                            </div>
                            <!-- EMPIEZA TABLAS-->
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                              <tr>
                                <th style="width: 70%; text-align: right;">PRIMA NETA COBRADA:</th>
                                  <th style="width: 30%; text-align: right;">
                                  <input type="text" class="form-control sm" style="text-align:right" id="PNETA" name= "PNETA"></input>
                                </th>
                              </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                              <tr>
                                <th style="width: 70%; text-align: right;">IVA: </th>
                                  <th style="width: 30%; text-align: right;">
                                  <input type="text" class="form-control sm" 
                                         style="text-align:right" id="IVA" name= "IVA" 
                                          disabled></input>
                                  <!--&#36; -->
                                </th>
                              </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                              <tr>
                                <th style="width: 70%; text-align: right;">TOTAL: </th>
                                  <th style="width: 30%; text-align: right;">
                                  <input type="text" class="form-control sm" 
                                          style="text-align:right" id="TOTAL"
                                          name= "TOTAL" disabled ></input>
                                </th>
                              </tr>
                            </table>
                       </div>
                    </div>
                
                    <button type="submit" class="btn btn-outline-primary">
                    <i class="fa fa-print"></i> Imprimir Cotizacion
                    </button>
                    <!-- Termina  row -->
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

</div>