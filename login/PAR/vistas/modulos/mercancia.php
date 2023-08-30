<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Mercancias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Mercancias</li>
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
            <div class="card">
              <div class="card-header">
                <!--<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMercancia">
                    Agregar Mercancia
                </button>-->
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped TablaMercancia">
                      <thead>
                        <tr>
                          <th>Clave</th>
                          <th>Mercancia</th>
                          <th>Giro</th>
                          <th>Peligrosidad</th>
                          <th>Estatus</th>
                          <th>Automatico</th>
                          <th>Acciones</th>
                          <th>Valor Aseguradora</th>
                          <th>Valor Apar</th>
                          <th>0 a 1'000,000</th>
                          <th>1'000,001 a 2'000,000 </th>
                          <th>2'000,001 a 3'000,000</th>
                          <th>3'000,001 a 5'000,000</th>
                          <th>5'100,001 a 10'000,000</th>
                          <th>DEDUCIBLE ROT</th>
                          <th>DEDUCIBLE ROBO</th>
                          <th>DEDUCIBLE OTROS RIESGOS</th>
                          <th>DEDUCIBLE SVT</th>
                          <th>EMBARQUE CARRETERA LIBRE</th>
                          <th>MARITIMO AEREO COMBINADO</th>
                        </tr>
                      </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $mercancia = ControladorMercancia::ctrMostrarMercancia($item, $valor);

                        foreach ($mercancia as $key => $value){
                        
                          echo ' <tr>
                                  <td>'.$value["Id"].'</td>
                                  <td>'.$value["Descripcion"].'</td>';

                                $itemgiro = "Id";       
                                $giro = ControladorMercancia::ctrMostrarGiro($itemgiro, $value["Giro"]);
                                echo '<td>'.$giro["Descripcion"].'</td>
                                 
                                  <td>'.$value["Peligrosidad"].'</td>';
                                  if($value["Estatus"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarMercancia" idMercancia="'.$value["Id"].'" estadoMercancia="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivarMercancia" idMercancia="'.$value["Id"].'" estadoMercancia="1">Desactivado</button></td>';

                                  }
                                  if($value["Automatico"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarMercanciaAutomatico" idMercancia="'.$value["Id"].'" automaticoMercancia="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivarMercanciaAutomatico" idMercancia="'.$value["Id"].'" automaticoMercancia="1">Desactivado</button></td>';

                                  }
                                  echo '
                                  <td>
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarMercancia" idMercancia="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarMercancia"><i class="fa fa-edit"></i></button>
                                  </td> ';
                               echo'<td>'.$value["Valor_Aseguradora"].'</td>
                                  <td>'.$value["Valor_Apar"].'</td>';
                                 
                                  
                                echo' <td>'.$value["Valor_A"].'</td>
                                      <td>'.$value["Valor_B"].'</td>
                                      <td>'.$value["Valor_C"].'</td>
                                      <td>'.$value["Valor_D"].'</td>
                                      <td >'.$value["Valor_E"].'</td>
                                      <td  style="font-size:14px; font-family:Arial">'.$value["DEDUCIBLE_ROT"].'</td>
                                      <td  style="font-size:14px; font-family:Arial">'.$value["DEDUCIBLE_ROBO"].'</td>
                                      <td  style="font-size:14px; font-family:Arial">'.$value["DEDUCIBLE_OTROS_R"].'</td>
                                      <td  style="font-size:14px; font-family:Arial">'.$value["DEDUCIBLE_SVT"].'</td>
                                      <td  style="font-size:14px; font-family:Arial">'.$value["EMBARQUE_CARRETERA_LIBRE"].'</td>
                                      <td  style="font-size:14px; font-family:Arial">'.$value["MARITIMO_AEREO_COMBINADO"].'</td>
                                      ';

                                                
                                  echo '</tr>';
                              
                              }
                        ?> 
                    </tbody>
                    </table>
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



<!--=====================================
MODAL EDITAR mercancia
======================================-->

<div class="modal fade" id="modalEditarMercancia" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" 
                  method="post" 
                  enctype="multipart/form-data" 
                  id="register_form_mercanciaeditar" 
                  onKeypress="if(event.keyCode == 13) event.returnValue = false;">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Mercancia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                   <div class="box-body">
                   <h2>Editar Mercancia</h2>
                      <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <!--<div class="alert alert-success hide"></div>-->
                      
                      <fieldset>
                          <h2>Step 1: Datos Mercancia</h2>
                          <!-- ENTRADA PARA EL DESCRIPCION -->
                          <div class="input-group mb-3">
                              <input type="text" class="form-control" name="editarDescripcion" id="editarDescripcion" 
                                    onkeyup="mayus(this);" placeholder=" Nombre de Mercancia" >
                                    <input type="hidden" name="id" id="id">
                          </div>
                          <!-- -->
                          <!-- ENTRADA PARA EL GIRO -->
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro">	
                              <option value="">Selecionar Giro</option>

                          <?php
                              $giro = ControladorMercancia::ctrMostrarGiro($item, $valor);

                              foreach ($giro as $key => $value){

                                  ?>
                                  <option value="<?php echo $value["Id"] ?>"><?php echo $value["Descripcion"] ?></option>
                                  
                                  <?php
                              }	
                              ?>			
                              
                              </select>
                          </div>
                          <!-- -->
                          <!-- ENTRADA PARA EL GIRO -->
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarPeligrosidad"  name="editarPeligrosidad">	
                                  <option value="">Selecionar Peligrosidad</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                              </select>
                          </div>
                          <!-- -->
                          <!-- ENTRADA PARA EL Valor Aseguradora -->
                          <div class="input-group mb-3">
                              <input type="text" class="form-control" name="editarValorA" id="editarValorA" placeholder=" Valor Aseguradora">
                          </div>
                          <div class="input-group mb-3">
                              <input type="text" class="form-control" name="editarValorAP" id="editarValorAP" placeholder=" Valor APAR">
                          </div>
                          </br>
                      <input type="button" class="next-form-med btn btn-info" value="Siguiente" />
                      </fieldset>
                    
                      <fieldset>
                          <h2>Step 2: Protocolos</h2>
                          <!-- Grupo de imput -->
                          <div class="form-row mt-4">
                              <div class="col-12 col-sm-6">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 0 a 1'000,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo1" id="editarIntervalo1" placeholder="de 0 a 1'000,000" required/>
                                  </div>
                              </div>
                              <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 1'000,001 a 1'500,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo2" id="editarIntervalo2" placeholder="de 1'000,001 a 2'000,000" required/>
                                  </div>
                              </div>
                              <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 1'500,001 a 3'000,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo3" id="editarIntervalo3" placeholder="de 2'000,001 a 3'000,000" required/>
                                  </div>
                              </div>
                          </div> 
                          <!-- fin de grupo input-->
                          <div class="form-row mt-4">
                              <div class="col-12 col-sm-6">
                                  <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 3'000,001 a 5'100,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo4" id="editarIntervalo4" placeholder="de de 3'000,001 a 5'000,000" required/>
                                  </div>
                              </div>
                              <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                  <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 5'100,001 a 10'000,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo5" id="editarIntervalo5" placeholder="de 5'000,001 a 21'000,000" required/>
                                  </div>
                              </div>
                          </div> 
                          <!-- fin de grupo input-->
                          </br>
                          <input type="button" name="previous" class="previous-form-med btn btn-default" value="Atras" />
                          <input type="button" class="next-form-med btn btn-info" value="Siguiente" />
                      </fieldset>
                       <fieldset>
                          <h2>Step 3: Deducibles</h2>
                          <!-- Grupo de imput -->
                          <div class="form-row mt-4">
                              <div class="col-12">
                                    <div class="input-group mb-3">
                                      <textarea class="form-control" rows="3"  title="DEDUCIBLE ROT" data-toggle="tooltip" 
                                      id="ETB_DEDUCIBLE_ROT" name="ETB_DEDUCIBLE_ROT" placeholder="DEDUCIBLE ROT" required></textarea>
                                    </div>
                              </div>
                              <div class="col-12">
                                    <div class="input-group mb-3">
                                      <textarea class="form-control" rows="3" onkeyup="mayus(this);"  title="DEDUCIBLE ROBO" data-toggle="tooltip" 
                                      id="ETB_DEDUCIBLE_ROBO" name="ETB_DEDUCIBLE_ROBO" placeholder="DEDUCIBLE ROBO" required></textarea>
                                    </div>
                              </div>
                              <div class="col-12">
                              <div class="input-group mb-3">
                                  <textarea class="form-control" rows="3" onkeyup="mayus(this);"  title="DEDUCIBLE OTROS RIESGOS" data-toggle="tooltip" 
                                    id="ETB_DEDUCIBLE_OTROS_R" name="ETB_DEDUCIBLE_OTROS_R" placeholder="DEDUCIBLE OTROS RIESGOS" required></textarea>
                                  </div>
                              </div>
                          </div> 
                          <!-- fin de grupo input-->
                          <div class="form-row mt-4">
                              <div class="col-12">
                                  <div class="input-group mb-3">
                                    <textarea class="form-control" rows="3" onkeyup="mayus(this);"  title="DEDUCIBLE SVT" data-toggle="tooltip" 
                                      id="ETB_DEDUCIBLE_SVT" name="ETB_DEDUCIBLE_SVT" placeholder="DEDUCIBLE SVT" required></textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="input-group mb-3">
                                    <textarea class="form-control" rows="3" onkeyup="mayus(this);"  title="DEDUCIBLE DEDUCIBLE EMBARQUE CARRETERA LIBRE" data-toggle="tooltip" 
                                      id="ETb_EMBARQUE_CARRETERA_LIBRE" name="ETb_EMBARQUE_CARRETERA_LIBRE" placeholder="DEDUCIBLE EMBARQUE CARRETERA LIBRE" required></textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="input-group mb-3">
                                    <textarea class="form-control" rows="3" onkeyup="mayus(this);"   title="DEDUCIBLE MARITIMO AEREO COMBINADO" data-toggle="tooltip" 
                                      id="ETb_MARITIMO_AEREO_COMBINADO" name="ETb_MARITIMO_AEREO_COMBINADO" placeholder="DEDUCIBLE MARITIMO AEREO COMBINADO" required></textarea>
                                  </div>
                              </div>
                          </div> 
                          <!-- fin de grupo input-->
                          </br>
                          <input type="button" name="previous" class="previous-form-med btn btn-default" value="Atras" />
                          <button type="submit" class="btn btn-primary">Actualizar Mercancia</button>
                      </fieldset>
                   </div>
                </div>   
                <!-- <div class="modal-footer justify-content-between">  
                  <input type="button" name="previous" class="previous-form-med btn btn-default" value="Atras" />
                  <button type="submit" class="btn btn-primary">Guardar Mercancia</button>
                </div> -->
                  <?php

                     $nuevoDescripcion = new ControladorMercancia();
                    $nuevoDescripcion -> ctrEditarMercancia();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
				