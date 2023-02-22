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
                          <th>Cuota ROT + ROBO</th>
                          <th>Cuota TR</th>
                          <th>Cuota TR + VT</th>
                          <th>0 a 1'000,000</th>
                          <th>1'000,001 a 1'500,000 </th>
                          <th>1'500,001 a 3'000,000</th>
                          <th>3'000,001 a 5'100,000</th>
                          <th>5'100,001 a 10'000,000</th>
                          <th>10'000,000 en adelante</th>
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
                                  <td>'.$value["Valor_Apar"].'</td>
                                  <td>'.$value["ROT"].'</td>
                                  <td>'.$value["TR"].'</td>';
                                 
                                  
                                echo' <td>'.$value["Variacion_Termica"].'</td>
                                      <td>'.$value["Valor_A"].'</td>
                                      <td>'.$value["Valor_B"].'</td>
                                      <td>'.$value["Valor_C"].'</td>
                                      <td>'.$value["Valor_D"].'</td>
                                      <td>'.$value["Valor_E"].'</td>
                                      <td>'.$value["Valor_F"].'</td>
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
MODAL AGREGAR Mercancia
======================================-->

<div class="modal fade" id="modalAgregarMercancia" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Mercancia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL DESCRIPCION -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoDescripcion" onkeyup="mayus(this);" placeholder=" Nombre de Mercancia" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- -->
                    <!-- ENTRADA PARA EL GIRO -->
                    <div class="input-group mb-3">
                      <select class="form-control input-lg" id="nuevoGiro"  name="nuevoGiro" required>	
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
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- -->
                    <!-- ENTRADA PARA EL GIRO -->
                    <div class="input-group mb-3">
                      <select class="form-control input-lg" id="nuevoPeligrosidad"  name="nuevoPeligrosidad" required>	
                        <option value="">Selecionar Peligrosidad</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- -->
                    <!-- ENTRADA PARA EL Valor Aseguradora -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoValorA" onkeyup="mayus(this);" placeholder=" Valor Aseguradora" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- -->
                    <!-- ENTRADA PARA EL Valor Apar -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoValorAP" onkeyup="mayus(this);" placeholder=" Valor APAR" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- -->              
                  </div>
               </div>   
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Mercancia</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $nuevoDescripcion = new ControladorMercancia();
                    $nuevoDescripcion -> ctrCrearMercancia();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR mercancia
======================================-->

<div class="modal fade" id="modalEditarMercancia" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" 
                            id="register_form_mercanciaeditar" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
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
                              <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-user"></span>
                              </div>
                              </div>
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
                              <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-user"></span>
                              </div>
                              </div>
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
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                  </div>
                              </div>
                          </div>
                          <!-- -->
                          <!-- ENTRADA PARA EL Valor Aseguradora -->
                          <div class="input-group mb-3">
                              <input type="text" class="form-control" name="editarValorA" id="editarValorA" placeholder=" Valor Aseguradora">
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                  </div>
                              </div>
                          </div>
                          <!-- -->
                          <!-- ENTRADA PARA EL Valor Apar -->
                          <div class="input-group mb-3">
                              <input type="text" class="form-control" name="editarValorAP" id="editarValorAP" placeholder=" Valor APAR">
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                  </div>
                              </div>
                          </div>
                          <!-- --> 
                          </br>
                      <input type="button" class="next-form-med btn btn-info" value="Siguiente" />
                      </fieldset>
                    <fieldset>
                      <h2> Step 2: Cuotas</h2>
                      <!-- Fin Empresa-->
                      <div class="form-row mt-4">
                          <div class="col-12 col-sm-6">
                              <div class="input-group mb-3">
                                  <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                      title="ROT" data-toggle="tooltip" type="text" 
                                      name="editarROT" id="editarROT" placeholder="ROT"/>
                                      <div class="input-group-append">
                                          <div class="input-group-text">
                                              <span class="fa fa-percent"></span>
                                          </div>
                                      </div>
                              </div> 
                          </div>
                          <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                  <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                          title="TR" data-toggle="tooltip" type="text" 
                                          name="editarRobo" id="editarRobo" placeholder="TR"/>
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <span class="fa fa-percent"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                              <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="VARIACION TERMINCA" data-toggle="tooltip" type="text" 
                                        name="editarVT" id="editarVT" placeholder="VARIACION TERMINCA"/>
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <span class="fa fa-percent"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Fin-->
                      <br>
                          <input type="button" name="previous" class="previous-form-med btn btn-default" value="Atras" />
                          <input type="button" name="next" class="next-form-medi btn btn-info" value="Siguiente" />
                      </fieldset>
                      <fieldset>
                          <h2>Step 3: Protocolos</h2>
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
                                        name="editarIntervalo2" id="editarIntervalo2" placeholder="de 1'000,001 a 1'500,000" required/>
                                  </div>
                              </div>
                              <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 1'500,001 a 3'000,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo3" id="editarIntervalo3" placeholder="de 1'500,001 a 3'000,000" required/>
                                  </div>
                              </div>
                          </div> 
                          <!-- fin de grupo input-->
                          <div class="form-row mt-4">
                              <div class="col-12 col-sm-6">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 3'000,001 a 5'100,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo4" id="editarIntervalo4" placeholder="de 3'000,001 a 5'100,000" required/>
                                  </div>
                              </div>
                              <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 5'100,001 a 10'000,000" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo5" id="editarIntervalo5" placeholder="de 5'100,001 a 10'000,000" required/>
                                  </div>
                              </div>
                              <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="de 10'000,000 en adelante" data-toggle="tooltip" type="text" 
                                        name="editarIntervalo6" id="editarIntervalo6" placeholder="de 10'000,000 en adelante" required/>
                                  </div>
                              </div>
                          </div> 
                          <!-- fin de grupo input-->
                          </br>
                   </div>
                </div>   
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Mercancia</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
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
				