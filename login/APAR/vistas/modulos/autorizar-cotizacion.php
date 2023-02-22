
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Cotizaciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Lista de Cotizaciones</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content no-print">
  <div class="box  box-solid " id="accordion">
  <div class="box-header with-border" style="cursor: pointer;">
    <h3 class="box-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
         <i class="fa fa-filter" aria-hidden="true"></i>  Filtros
      </a>
    </h3>
  </div>
    <div id="collapseFilter" class="panel-collapse active collapse  in " aria-expanded="true">
    <div class="box-body">
      <div class="row">
      
      </div>
    </div>
  </div>
</div>    <div class="box box-primary" >
        <div class="box-header">
            
            <h3 class="box-title"></h3>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="">
                <i class=""></i> </a>
            </div>
        </div>
            
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view" id="sell_table">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Acción</th>
                        <th>Asociado</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        
                        <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $pais = ControladorAutorizarCotizacion::ctrMostrarCotizaciones($item, $valor);

                        foreach ($pais as $key => $value){

                          $date = new DateTime($value["Fecha"]);
                         $fecha = $date->format('d/m/Y');
                        
                          echo ' <tr>
                          
                          <td>'.$value["Folio"].'</td>
                                  <td><button type="button" class="btn btn-block btn-outline-primary btn-sm btnEditarCotizacion" idCotizacion="'.$value["ID"].'" data-toggle="modal" data-target="#extraLargeModal"><i class="fas fa-eye"> Revisar</i></button></td>
                                  <td>'.$value["AsociadoNombre"].'</td>
                                  <td>'.$value["ClienteDescripcion"].'</td>
                                  <td>'.$fecha.'</td>
                                  <td>'.$value["Estatus"].'</td>';

                                  echo '</tr>';
                              
                              }
                        ?> 
                    </tbody>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>
      <!-- /.container-fluid -->
  </section>

</div>


<div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Autorizacion de Cotizacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <i class="fas fa-edit"></i>
                  Datos Generales
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <form role="form" id="Adatos_certificado" onKeypress="if(event.keyCode == 13) event.returnValue = false;" action="" method="post">
                        <fieldset>
                          <div class="row">
                            <div class="col-md-4" id="DV_FechaHora">
                              <label>Fecha y Hora</label>
                              
                              <input type="text" class="form-control sm" id="DT_FechaHora" name="DT_FechaHora" value="" readonly >
                              <input type="hidden" id="DT_Actual" name="DT_Actual" value="<?php echo $DateAndTime; ?>" >
                              <input type="hidden" id="hora_Actual" name="hora_Actual" value="<?php echo date("H:i", Strtotime($time)); ?>" >
                            </div>
                            
                            <div class="col-md-4">
                              <label> Asociado </label>

                            
                              <input type="hidden" class="form-control"  name="nuevoIdAsociado" id="nuevoIdAsociado" disabled>
                              <input type="hidden" class="form-control"  name="Idcotizacion" id="Idcotizacion" disabled>
                              <input type="hidden" class="form-control sm" name="TB_PrefijoFolio" id="TB_PrefijoFolio"  disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjComision" id="TB_ObjComision"  disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjCuotaBasica" id="TB_ObjCuotaBasica" disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjCuotaRot" id="TB_ObjCuotaRot"  disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjCuotaTR" id="TB_ObjCuotaTR"  disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjCuotaContenedor" id="TB_ObjCuotaContenedor"  disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjPrimaminima" id="TB_ObjPrimaminima"  disabled></input>
                              <input type="hidden" class="form-control sm" name="TB_ObjDerechoCertificado" id="TB_ObjDerechoCertificado"  disabled></input>
                              <input type="hidden" name="TB_EmailAsociado" id="TB_EmailAsociado"  disabled></input>
                              <input type="hidden" name="TB_ImagenAsociado" id="TB_ImagenAsociado"  disabled></input>
                              <input type="hidden" name="TB_Telefono" id="TB_Telefono"  disabled></input>
                              <input type="hidden" name="TB_Celular" id="TB_Celular"  disabled></input>
                              <!-- ENTRADA PARA EL Asociado -->
                              <?php 
                                  
                                  $item1=null; 
                                  $valor1=null;
                                  /* class="form-control select2 input-lg" id="nuevoAsociado" name="nuevoAsociado" required */
                                  echo '<div>
                                            <select class="form-control select2 input-lg" id="EnuevoAsociado" name="EnuevoAsociado" disabled>	';
                                                $asociado = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor1);

                                                foreach ($asociado as $key => $value){

                                                    echo '<option value='.$value["Id"].'>'.$value["Nombre"].'</option>';
                                                }
                                  echo '    </select>
                                        </div>'; 
                              ?>
                            </div>
                            <div class="col-md-4">
                            <label> Folio </label>
                            <input type="text" class="form-control sm" name="ETB_Folio" id="ETB_Folio" readonly></input>
                            </div>
                          </div>
                          
                      <!-- ROW DEL CLIENTE-->
                      <div class="row">
                          <div class="col-md-12" >
                            <div class="form-group" id="cliente">

                              <label>Beneficiario</label>
                                <select class="form-control select2 input-lg"  disabled id="EnuevoCliente" name="EnuevoCliente" style="width: 100%;" >
                                    <option value="">Selecionar Beneficiario</option>
                                    <?php
                                    $item=null;
                                    $valor=null;
                                    
                                    $cliente = ControladorPersona::ctrMostrarAsociado($item, $valor);            
                                    if($cliente != null){

                                      foreach ($cliente as $key => $value){
                                        echo '<option value="'.$value["Id"].'" data-city="'.$value["MercanciaAutorizada"].'" >'.$value["Nombre"].'</option>';
                                      }
                                    } 
                                    ?>
                                </select>
                            </div>
                              <input type="text" name="Erfc" id="Erfc" disabled></input>
                              <input type="text" name="Eemail" id="Eemail" disabled></input>
                              <input type="text" name="Edireccion" id="Edireccion" disabled></input>
                          </div>
                      </div>
                        
                        <!-- Fin de Seleccionar Mercancia -->
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                             <label>Mercancia</label>
                              <select class="form-control select2 input-lg" id="EnuevoMercancia"  name="EnuevoMercancia" style="width: 100%;" disabled>	
                                <option value="na">Selecionar Mercancia</option>
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
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label>Giro</label>
                                <input type="text" class="form-control"  name="ETB_Giro" id="ETB_Giro" readonly>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">   
                          <label>Descripcion Mercancia</label> 
                        </div>
                        <div class="col-md-12">   
                        <div class="form-group">
                          <textarea class="form-control" rows="3" onkeyup="mayus(this);"  
                                    id="ETB_DescripcionMercancia" readonly name="ETB_DescripcionMercancia" placeholder="Describe Mercancia"></textarea>
                        </div>
                        </div>
                    </div>
                    <!-- fINAL DEL ROW -->
                    <div class="row" >
                        <div class="col-md-6">   
                          <label id="LB_CoberMercancias" name="LB_CoberMercancias">Tipo de Empaque</label>
                              <div class="input-group mb-3">
                                  <select class="form-control input-lg" name="EnuevoTipoEmpaque" id="EnuevoTipoEmpaque" readonly>
                                      <option value="">Selecionar Opcion</option>
                                      <option value="01 EL ADECUADO SEGÚN LA NATURALEZA PROPIA DE LA MERCANCÍA">01 EL ADECUADO SEGÚN LA NATURALEZA PROPIA DE LA MERCANCÍA</option>
                                      <option value="A GRANEL">A GRANEL</option>
                                      <option value="BOTELLAS DE CARTÓN">BOTELLAS DE CARTÓN</option>
                                      <option value="BOTELLAS DE PLÁSTICO">BOTELLAS DE PLÁSTICO</option>
                                      <option value="BOTELLAS DE VIDRIO">BOTELLAS DE VIDRIO</option>
                                      <option value="BOTES METÁLICOS">BOTES METÁLICOS</option>
                                      <option value="CAJAS DE CARTÓN">CAJAS DE CARTÓN</option>
                                      <option value="CAJAS DE MADERA">CAJAS DE MADERA</option>
                                      <option value="CAJAS DE PLÁSTICO">CAJAS DE PLÁSTICO</option>
                                      <option value="CARRO TANQUE, PIPA O CISTERNA">CARRO TANQUE, PIPA O CISTERNA</option>
                                      <option value="CUÑETES DE CARTÓN">CUÑETES DE CARTÓN</option>
                                      <option value="EMBOBINADO">EMBOBINADO</option>
                                      <option value="EN BLOQUES">EN BLOQUES</option>
                                      <option value="EN PLANCHAS">EN PLANCHAS</option>
                                      <option value="ENVASES DE CARTÓN">ENVASES DE CARTÓN</option>
                                      <option value="ENVASES DE PAPEL">ENVASES DE PAPEL</option>
                                      <option value="ENVASES DE PLÁSTICO RÍGIDO">ENVASES DE PLÁSTICO RÍGIDO</option>
                                      <option value="ENVASES DE POLIETILENO">ENVASES DE POLIETILENO</option>
                                      <option value="ENVASES METÁLICOS">ENVASES METÁLICOS</option>
                                      <option value="LAMINADOS">LAMINADOS</option>
                                      <option value="LATAS">LATAS</option>
                                      <option value="PACAS">PACAS</option>
                                      <option value="PALLETS">PALLETS</option>
                                      <option value="SACOS">SACOS</option>
                                      <option value="SACOS DE PAPEL">SACOS DE PAPEL</option>
                                      <option value="SACOS DE PLÁSTICO">SACOS DE PLÁSTICO</option>
                                      <option value="TAMBORES METÁLICOS">TAMBORES METÁLICOS</option>
                                      <option value="TROZOS">TROZOS</option>
                                  </select>
                              </div>
                        </div>
                        <div class="col-md-6">   
                        <label>EL TRASLADO SE EFECTUA RECORRIENDO:</label> 
                              <select class="form-control input-lg" name="EnuevoTLER" id="EnuevoTLER" readonly>
                                  <option value="">Selecionar Opcion</option>
                                  <option value="POR AUTOPISTA DE CUOTA">POR AUTOPISTA DE CUOTA</option>
                                  <option value="POR AUTOPISTA DONDE EXISTA">POR AUTOPISTA DONDE EXISTA</option>
                                  <option value="POR CARRETERA LIBRE">POR CARRETERA LIBRE</option>
                                  <option value="SOLO EN ÁREA METROPOLITANA DE GUADALAJARA">SOLO EN ÁREA METROPOLITANA DE GUADALAJARA</option>
                                  <option value="SOLO EN ÁREA METROPOLITANA DE MONTERREY">SOLO EN ÁREA METROPOLITANA DE MONTERREY</option>
                                  <option value="SOLO EN ÁREA METROPOLITANA DE LA CD. DE MEXICO">SOLO EN ÁREA METROPOLITANA DE LA CD. DE MEXICO</option>
                                  <option value="OTRA">OTRA</option>
                              </select>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4">   
                          <label> Valor Total del Embarque </label>
                          <input class="form-control" type="number" readonly name="ETB_ValorEmbarque" id="ETB_ValorEmbarque" />       
                        </div>
                        <div class="col-md-4">   
                          <label> Peligrosidad </label>
                          <input class="form-control" type="number" readonly name="Epeligrosidad" id="Epeligrosidad" />
                        </div>
                        <div class="col-md-4">   
                          <label> Maximo Asegurable Asociado </label>
                          <input class="form-control" type="number" readonly name="Emaximoasegurable" id="Emaximoasegurable" />
                        </div>
                    </div>
                    
                    <!-- Termina row-->
                    <div class="row">
                              <div class="col-md-4">
                                <label> Medio de Transporte </label>
                                  <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EMTPT" id="EMTPT">
                                        <option value="">Selecionar Opcion</option>
                                        <option value="TE">TERRESTRE</option>
                                        <option value="MMT">MARITIMO</option>
                                        <option value="AEREO">AEREO</option>
                                        <option value="COMAM">COMBINACION AEREO - MARITIMO</option>
                                        <option value="COMAMT">COMBINACION AEREO - MARITIMO - TERRESTRE</option>
                                        <option value="COMAT">COMBINACION AEREO - TERRESTRE</option>
                                        <option value="COMMT">COMBINACION MARITIMO - TERRESTRE</option>
                                  </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                              <label> Tipo de Bien </label>
                                  <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoBienesDesperdicios" id="EnuevoBienesDesperdicios">
                                      <option value="">Selecionar Opcion</option>
                                      <option value="Usados">Bienes Usuados o Reconstruidos</option>
                                      <option value="Nuevos">Nuevos</option>
                                  </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <label> Continuacion de Viaje? </label>
                                  <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoCVJ" id="EnuevoCVJ">
                                      <option value="">Selecionar Opcion</option>
                                      <option value="Si">Si</option>
                                      <option value="SiCertificado">Si (Cuenta con Certificado)</option>
                                      <option value="No">No</option>
                                  </select>
                                  </div>
                              </div>
                            </div>
                            <!-- tERMINA MEDIO DE TRANSPORTE-->
                            <div class="row">
                              <div class="col-md-4">
                                <label> Embarque </label>
                                  <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoTipoEmbarque" id="EnuevoTipoEmbarque">
                                      <option value="No">Selecionar Opcion</option>
                                      <option value="Nacional">Nacional</option>
                                      <option value="Internacional">Internacional</option>
                                  </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                              <label> Se trata de Doble Remolque (Carga Full)? </label>
                                  <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoRemolque" id="EnuevoRemolque">
                                      <option value="">Selecionar Opcion</option>
                                      <option value="Si">Si</option>
                                      <option value="No">No</option>
                                  </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <label> Se ampara Contenedor? </label>
                                  <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoContenedor" id="EnuevoContenedor" >
                                    <option value="">Selecionar Opcion</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                  </select>
                                  </div>
                              </div>
                            </div>
                            <!-- tERMINA EMPAQUE-->
                            <div class="row">
                              <div class="col-md-6">
                              <label id="txt-contenedor1" name="txt-contenedor1">IDENTIFICADOR DEL CONTENEDOR 1.</label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control sm" readonly id="Econtenedor1" name="Econtenedor1" disabled> </input>
                                  </div>
                              </div>
                              <div class="col-md-6">
                              <label id="txt-contenedor1" name="txt-contenedor1">Valor de Mercancia 1.</label>
                                <div class="input-group mb-3">
                                   <input type="number" class="form-control sm" readonly id="Evalormercancia1" name="Evalormercancia1" onblur="F_SumarValorMercancia();"> </input>    
                                </div>
                              </div>
                            </div>
                            <!-- termina identioficado 1 -->
                            <div class="row">
                              <div class="col-md-6">
                              <label id="txt-contenedor2" name="txt-contenedor2">IDENTIFICADOR DEL CONTENEDOR 2.</label>
                                  <div class="input-group mb-3">
                                  <input type="text" class="form-control sm"  readonly id="Econtenedor2" name="Econtenedor2" disabled ></input>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label id="txt-contenedor2" name="txt-contenedor2">Valor de Mercancia 2.</label>
                                <div class="input-group mb-3">
                                <input type="number" class="form-control sm" readonly id="Evalormercancia2" name="Evalormercancia2" onblur="F_SumarValorMercancia();"></input>
                                </div>
                              </div>
                            </div>
                            <!-- termina identioficado 2 -->
                            <div class="row">
                              <div class="col-md-4">
                              <label id="element1" name="element1">Tipo de Contenedor 1.</label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoTipoContenedor1" id="EnuevoTipoContenedor1" disabled>
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
                              <div class="col-md-4">
                              <label id="TB_Responsabilidad1" name="TB_Responsabilidad1">Valor Mercancia</label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control sm" readonly id="ETB_Valor1" name= "ETB_Valor1" disabled> </input>
                                </div>
                              </div>
                              <div class="col-md-4">
                              <label  >Suma Asegurada </label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control sm" readonly id="ETB_SumaSolicitada1" name= "ETB_SumaSolicitada1" disabled> </input>
                                </div>
                              </div>
                            </div>
                            <!-- termina tipo contenedor 1 -->
                            <div class="row">
                              <div class="col-md-4">
                              <label name="element2" id="element2">Tipo de Contenedor 2.</label>
                              <div class="input-group mb-3">
                                  <select class="form-control input-lg" readonly name="EnuevoTipoContenedor2" id="EnuevoTipoContenedor2" disabled>
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
                              <div class="col-md-4">
                              <label id="TB_Responsabilidad2" name="TB_Responsabilidad2">Valor M. compañia del contenedor 2</label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control sm" readonly id="ETB_Valor2" name= "ETB_Valor2" disabled ></input>
                                </div>
                              </div>
                              <div class="col-md-4">
                              <label  >Suma Asegurada </label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control sm" readonly id="ETB_SumaSolicitada2" name= "ETB_SumaSolicitada2"> </input>
                                </div>
                              </div>
                            </div>
                            <!-- termina tipo contenedor 1 -->
                        <!-- Registro datos Embarque -->
                        <br>
                      <h3  style="background-color:DodgerBlue;">Datos de Embarque</h3>
                      <div class="row" >
                        <div class="col-md-4">
                        <label> Numero de Guia Embarque</label>
                              <input type="text" readonly class="form-control" onkeyup="mayus(this);" id="ETB_NumeroGuia" name="ETB_NumeroGuia" placeholder="Numero de Guia">
                        </div>
                        <div class="col-md-4">
                        <label> Hora de Inicio de Cobertura (Formato 24 Hrs.)</label>
                              <!--<input type="text" id="time" placeholder="Time" class="form-control sm">-->
                              <input type="text" class="form-control clockpicker" id="etime" name="etime" readonly>
                        </div>
                        <div class="col-md-4">
                        <label> COBERTURA A PARTIR DEL (DD-MM-AA):</label>
                              <input type="text" class="form-control" id="edt" name="edt" readonly>
                        </div>
                      </div>
                      <div class="row" >
                        <div class="col-md-6">   
                        <label onkeyup="mayus(this);"  readonly id="LB_CoberMercancias" name="LB_CoberMercancias">PAIS ORIGEN DE LA COBERTURA</label> 
                        </div>
                        <div class="col-md-6">   
                        <label onkeyup="mayus(this);" readonly  id="LB_CoberMercancias" name="LB_CoberMercancias">PAIS DESTINO FINAL DE LA COBERTURA</label> 
                        </div>
                      </div>
                    <!-- fINAL DEL ROW -->
                    <div id="Di_DatosEmbarque" class="row" >
                        <div class="col-md-6">   
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Pais Origen Embarque</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <select class="form-control select2" readonly  id="ETB_PaisOrigen" name="ETB_PaisOrigen" style="width: 100%;">
                                    <option value="">Seleccione Pais</option>
                                    
                                    <?php
                                    $item = null;
                                    $valor = null;
                                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                                        foreach ($pais as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Estatus"] ?>" ><?php echo $value["Descripcion"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Origen Cobertura</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                              <select class="form-control select2"  readonly id="ETB_OrigenCobertura" name="ETB_OrigenCobertura" style="width: 100%;">
                                    <option value="">Seleccione Pais Origen Cobertura</option>
                                    
                                    <?php
                                    $item = null;
                                    $valor = null;
                                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                                        foreach ($pais as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Estatus"] ?>"><?php echo $value["Descripcion"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Estado</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" readonly onkeyup="mayus(this);"  placeholder="Estado" id="ETB_EstadoOrigenCobertura" name="ETB_EstadoOrigenCobertura">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Poblacion, Municipio o Delegacion</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" onkeyup="mayus(this);" 
                                       placeholder="Poblacion, Municipio o Delegacion" id="ETB_MunicipioOrigenCobertura" 
                                       name="ETB_MunicipioOrigenCobertura" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                        </div>
                        <div class="col-md-6">   
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Pais Destino Embarque</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                              <select class="form-control select2" readonly  id="ETB_PaisDestinoCobertura" name="ETB_PaisDestinoCobertura" style="width: 100%;">
                                    <option value="">Seleccione Pais Destino Embarque</option>
                                    
                                    <?php
                                    $item = null;
                                    $valor = null;
                                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                                        foreach ($pais as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["Id"] ?>" data-city="<?php echo $value["Estatus"] ?>"><?php echo $value["Descripcion"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>        
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Estado</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" readonly onkeyup="mayus(this);"  id="ETB_EstadoDestinoCobertura" name="ETB_EstadoDestinoCobertura" placeholder="Estado">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Poblacion, Municipio o Delegacion</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" onkeyup="mayus(this);"  readonly id="ETB_MunicipioDestinoCobertura" name="ETB_MunicipioDestinoCobertura" placeholder="Poblacion, Municipio o Delegacion">
                              </div>
                            </div>
                          </div>
                          <!-- termina row-->
                        </div>
                    </div>
                        
                            <div class="row">
                              <div class="col-md-6">
                                <label> Transporte con antigüedad </label>
                                <label> mayor a 30 años? </label>
                                  <div class="input-group mb-3">
                                    <select class="form-control input-lg" name="EEMAYOR" id="EEMAYOR" readonly >
                                        <option value="">Selecionar Opcion</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>   
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label> Valor para Seguro </label>
                                  <div class="input-group mb-3">
                                    <select class="form-control input-lg" name="ECmbx_VAPSG" id="ECmbx_VAPSG" readonly>
                                        <option value="">Selecionar Opcion</option>
                                        <option value="Embarques de compras">Embarques de compras</option>
                                        <option value="Embarques de ventas">Embarques de ventas</option>
                                        <option value="Embarques de maquila">Embarques de maquila</option>
                                        <option value="Embarques entre filiales">Embarques entre filiales</option>
                                        <option value="Bienes usados o reconstruidos">Bienes usados o reconstruidos</option>
                                        <option value="Para animales en pie">Para animales en pie</option>
                                        <option value="Contenedores">Contenedores</option>
                                    </select>   
                                  </div>
                              </div>
                            </div>
                        <!--</div>-->
                        <div class="row">
                        <label>Condiciones a Cumplir</label>
                          <textarea class="form-control" rows="3" readonly onkeyup="mayus(this);"  id="ETB_DescripcionGPS" name="ETB_DescripcionGPS" placeholder="Protocolos" readonly></textarea>
                        </div>
                        <div>
                          <h3 style="background-color:DodgerBlue;">Datos Transportista</h3>
                        </div>
                    
                    <div class="row">
                      <div class="col-md-4">
                            <label> Nombre linea transportista </label>
                            <input type="text" class="form-control" onkeyup="mayus(this);"  id="ETB_NLITPTA" name="ETB_NLITPTA" placeholder="Nombre Linea Transportista" >
                      </div>
                      <div class="col-md-4">
                          <label> Tipo de linea transportista </label>
                          <select class="form-control input-lg"  name="EnuevoNbLNTRP" id="EnuevoNbLNTRP">
                                <option value="">Selecionar Opcion</option>
                                <option value="CAMION DE SERVICIO PUBLICO FEDERAL">CAMION DE SERVICIO PÚBLICO FEDERAL</option>
                                <option value="LINEA AEREA COMERCIAL">LÍNEA AÉREA COMERCIAL</option>
                                <option value="LINEA NAVAL COMERCIAL">LÍNEA NAVAL COMERCIAL</option>
                                <option value="LINEA AEREA PRIVADA">LÍNEA AÉREA PRIVADA</option>
                                <option value="LINEA NAVAL PRIVADA">LÍNEA NAVAL PRIVADA</option>
                                <option value="LINEA DE TRANSPORTES COMERCIAL">LÍNEA DE TRANSPORTES COMERCIAL</option>
                                <option value="LINEA DE TRANSPORTES PRIVADA">LÍNEA DE TRANSPORTES PRIVADA</option>
                                <option value="VEHICULOS PROPIOS">VEHÍCULOS PROPIOS</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                      </div>
                      <div div class="col-md-4">
                          <label> Nombre del Chofer </label>
                          <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_NombreChofer" name="ETB_NombreChofer" placeholder="nombre de chofer" >
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                              <label> Tipo de Vehiculo </label>
                              <select class="form-control input-lg"  name="EnuevoTipoVehiculo" id="EnuevoTipoVehiculo">
                                  <option value="">Selecionar Opcion</option>
                                  <option value="CAJA CARGA SECA">CAJA CARGA SECA</option>
                                  <option value="CAJA REFRIGERADA">CAJA REFRIGERADA</option>
                                  <option value="CAJA CISTERNA O TANQUE">CAJA CISTERNA O TANQUE</option>
                                  <option value="CAJA ABIERTA PARA GRANEL">CAJA ABIERTA PARA GRANEL</option>
                                  <option value="CAJA CON ESTACAS">CAJA CON ESTACAS</option>
                                  <option value="CAJA GONDOLA PARA TRANSPORTE DE VEHICULOS">CAJA GÓNDOLA PARA TRANSPORTE DE VEHÍCULOS</option>
                                  <option value="PLATAFORMA PARA CARGA SOBRE DIMENSIONADA">PLATAFORMA PARA MÁQUINA PESADA</option>
                                  <option value="VEHICULOS PROPIOS">VEHÍCULOS PROPIOS</option>
                                  <option value="BUQUE DE CONTENEDORES">BUQUE DE CONTENEDORES</option>
                                  <option value="BUQUE DE CARGA REFRIGERADA">BUQUE DE CARGA REFRIGERADA</option>
                                  <option value="BUQUE DE CARGA GENERAL">BUQUE DE CARGA GENERAL</option>
                                  <option value="BUQUE DE CARGA A GRANEL">BUQUE DE CARGA A GRANEL</option>
                                  <option value="BUQUE CISTERNA O TANQUE">BUQUE CISTERNA O TANQUE</option>
                                  <option value="BUQUE DE CARGA RODANTE">BUQUE DE CARGA RODANTE</option>
                                  <option value="BUQUE DE CARGA DE VEHICULOS">BUQUE DE CARGA DE VEHÍCULOS</option>
                                  <option value="FERROCARRIL FURGON">FERROCARRIL FURGÓN</option>
                                  <option value="FERROCARRIL GONDOLA">FERROCARRIL GÓNDOLA</option>
                                  <option value="FERROCARRIL TOLVA GRANELERA (AGRICOLA)">FERROCARRIL TOLVA GRANELERA (AGRÍCOLA)</option>
                                  <option value="FERROCARRIL TOLVA CEMENTERA">FERROCARRIL TOLVA CEMENTERA</option>
                                  <option value="FERROCARRIL CARRO TANQUE">FERROCARRIL CARRO TANQUE</option>
                                  <option value="FERROCARRIL PALLET DOS NIVELES PARA AUTOS">FERROCARRIL PALLET DOS NIVELES PARA AUTOS</option>
                                  <option value="FERROCARRIL PLATAFORMA INTERMODAL">FERROCARRIL PLATAFORMA INTERMODAL</option>
                                  <option value="FERROCARRIL TRINIVEL AUTOMOTRIZ (AUTORACK)">FERROCARRIL TRINIVEL AUTOMOTRIZ (AUTORACK)</option>
                                  <option value="OTRO">OTRO</option>
                              </select>
                        </div>
                        <div class="col-md-4">
                            <label> Marca </label>
                            <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_Marca" name="ETB_Marca" placeholder="marca" >
                        </div>
                        <div div class="col-md-4">
                            <label> Modelo </label>
                            <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_Modelo" name="ETB_Modelo"  placeholder="modelo" >
                        </div>
                      </div>
                      <!--  termina row -->
                      <div class="row">
                        <div class="col-md-3">
                        <label> N° Placas </label>
                            <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_Placas" name="ETB_Placas" placeholder="placas" >
                        </div>
                        <div class="col-md-3">
                        <label> Color </label>
                            <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_Color" name="ETB_Color" placeholder="color" >
                        </div>
                        <div class="col-md-3">
                        <label> N° Motor </label>
                            <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_Motor" name="ETB_Motor" placeholder="motor" >
                        </div>
                        <div class="col-md-3">
                        <label> N° Serie </label>
                            <input type="text" class="form-control"  onkeyup="mayus(this);"  id="ETB_Serie" name="ETB_Serie" placeholder="serie" >
                        </div>
                      </div>
                      <!-- fin del row de transportista-->
                        <div class="row">
                           
                            <div div class="col-md-5">
                            <label> Cobertura de Mercacias </label>
                                <div class="input-group mb-3">
                                  <select class="form-control input-lg"  name="EnuevoCBM" id="EnuevoCBM">
                                  <option value="No">Selecionar Opcion</option>
                                      <option value="ROT Y ROBO">ROT Y ROBO</option>
                                      <option value="TODO RIESGO">TODO RIESGO</option>
                                      <option value="TODO RIESGO Y VT">TODO RIESGO Y VT</option>
                                      
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
                          <div class="col-md-6">
                                <!--<div class="col-auto p-5 text center" >
                                  <h4 class="text-center"><strong>CUOTAS</strong></h4>
                                </div>-->
                            <table cellspacing="2" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                    <th style="width: 80%; text-align: right;">CUOTA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;"><input type="text" class="form-control sm" 
                                                                                      style="text-align:right" id="ETB_CMCIA" 
                                                                                      name="ETB_CMCIA" disabled ></input></th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                          style="text-align:right" id="ETB_PNTA" name= "ETB_PNTA"  
                                          disabled  ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA CONTENEDOR  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="ETB_PMCTND" name= "ETB_PMCTND"  
                                          disabled></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA TOTAL  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="ETB_PMAGT" name= "ETB_PMAGT" 
                                          disabled   ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">DERECHO CERTIFICADO  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm"
                                          style="text-align:right" id="ETB_DCRT" name= "ETB_DCRT" 
                                          disabled ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">IVA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="ETB_IVA" name= "ETB_IVA"
                                          disabled></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA TOTAL APAR  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                            style="text-align:right" id="ETB_IVATOTAL" name= "ETB_IVATOTAL"
                                            disabled ></input>
                                      </th>
                                </tr>
                            </table>
                            
                          </div>

                          <!-- Cuotas que se cobral al clioente  -->
                          <div class="col-md-6">
                                <!--<div class="col-auto p-5 text center" >
                                  <h4 class="text-center"><strong>PRIMA NETA A COBRAR A CLIENTE</strong></h4>
                                </div>-->
                                <!-- EMPIEZA TABLAS-->
                                <table cellspacing="2" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                    <th style="width: 80%; text-align: right;">CUOTA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;"><input type="text" class="form-control sm" 
                                                                                      style="text-align:right" id="EPNETA" 
                                                                                      name="EPNETA" ></input></th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA MERCANCIA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                          style="text-align:right" id="ETB_PNTAT" name= "ETB_PNTAT"  
                                             ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA CONTENEDOR  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="ETB_PMCTNDT" name= "ETB_PMCTNDT" 
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA NETA TOTAL  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="ETB_PMAGTT" name= "ETB_PMAGTT" 
                                             ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">DERECHO CERTIFICADO  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm"
                                          style="text-align:right" id="ETB_DCRTT" name= "ETB_DCRTT" 
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">IVA  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" style="text-align:right"
                                          id="EIVA" name= "EIVA"
                                           ></input>
                                  </th>
                                    
                                </tr>
                            </table>
                            <table cellspacing="0" style="width: 100%; border: solid 0px; background: #ffffff; text-align: center; font-size: 12pt;padding:1mm;">
                                <tr>
                                  <th style="width: 80%; text-align: right;">PRIMA TOTAL  :  </th>
                                    <th style="width: 20%; text-align: right;">
                                    <input type="text" class="form-control sm" 
                                            style="text-align:right"  id="ETOTAL" name= "ETOTAL" 
                                             ></input>
                                      </th>
                                </tr>
                            </table>
                          </div>
                        </div>
                        <div class="row">
                        <label>Condiciones</label>
                        <textarea class="form-control" rows="3" id="ETB_DescripcionCondicionesTER" name="ETB_DescripcionCondicionesTER" placeholder="Describir">Es condición indispensable para la presente cobertura que se deberá cumplir con las siguientes medidas de prevención y está de acuerdo en que queda sin protección por parte de la Aseguradora en el momento en que el asegurado o a quien quiera que éste contrate falte a cualquiera de ellas: • Los únicos lugares permitidos para hacer una parada son los predios de las gasolineras y los lugares específicamente designados por la Secretaría de Comunicaciones y Transportes para aparcar en las carreteras.
                        </textarea>
                      </div>
                    
                    <div class="row">
                    <label>Obervaciones</label>
                      <textarea class="form-control" rows="3" onkeyup="mayus(this);"  id="ETB_ObservacionGnral" name="ETB_ObservacionGnral" placeholder="Observaciones"></textarea>
                    </div>
                    <div class="row" >
                        <div class="col-md-6">   
                        <label id="LB_CoberMercancias" name="LB_CoberMercancias">Deducibles Mercancia</label> 
                          <div class="form-group">
                            <textarea class="form-control" rows="3" name="ETB_Deducible" id="ETB_Deducible" placeholder="Deducible" ></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">   
                          <label id="LB_CoberMercancias" name="LB_CoberMercancias">Deducibles Contenedor</label> 
                          <div class="form-group">
                            <textarea class="form-control" rows="3" name="ETB_CuotaContenedor" id="ETB_CuotaContenedor" placeholder="Deducible Contenedor" ></textarea>
                          </div>
                        </div>
                    </div>
                      <div class="row" >
                        <div class="col-md-6">   
                          <label >Cobertura Mercancia</label> 
                          <div class="form-group">
                            <textarea class="form-control" rows="3" id="TB_CoberturaMercancia" name="TB_CoberturaMercancia" placeholder="Cobertura Mercancia"></textarea>
                        </div>
                        </div>
                        <div class="col-md-6">   
                          <label>Cobertura Contenedor</label> 
                          <div class="form-group">
                            <textarea class="form-control" rows="3"  name="TB_CoberturaContenedor" id="TB_CoberturaContenedor" placeholder="Cobertura Deducible"></textarea>
                          </div>
                        </div>
                    </div>
                        <!--<input type="button" name="previous" class="previous-form btn btn-default" value="Atras" />-->
                        <!--<input type="button" id="next" name="next" class="next-formcertificado btn btn-info" value="Siguiente" />-->
                       <!-- <button type="button" id="Btn_ImprimiCotizacion" class="btn btn-outline-primary" onclick="impresionCotizacionPDF();">
                          <i class="fa fa-print"></i> Imprimir Cotizacion
                          </button>-->
                          <!-- <button type="submit" class="btn btn-warning"  name="btnActualizarCotizacion" id="btnActualizarCotizacion">Autorizar Cotizacion</button>  -->
                          <button type="submit" class="btn btn-primary"  name="btnautorizar" id="btnautorizar">Generar Certificado</button>  
                          <button type="submit" class="btn btn-danger"  name="btncancelar" id="btncancelar">Cancelar Cotizacion</button>  
                      </fieldset>
                      <!--<fieldset>-->
                        <!-- Fin de row de descripcion de  gps -->
                   
                    
                   
                      
                     
                    <!--<input type="button" name="previous" class="previous-formcertificado btn btn-default" value="Previous" />-->
                    <!--<button type="button" class="btn btn-primary" onclick="impresionCertificadoPDF();" name="submit">Generar Certificado</button>-->
                                      
                <!--  </fieldset>-->
                  </form>  
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>




