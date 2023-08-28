<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Producto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Producto</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                    Agregar Producto
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-responsive tableProducto">
                      <thead>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Producto</th>
                          <th>Tipo Mercancia</th>
                          <th>No Obligatorio</th>
                          <th>GPS Basico</th>
                          <th>GPS por Activacion Alarmas 50,000 USD</th>
                          <th>GPS por activación de alarmas 75,000 USD</th>
                          <th>CTS a partir de 150,000 USD</th>
                          <th>Custodia electronica a partior de 250 K USD</th>
                          <th>CUSTODIA FISICA</th>
                          <th>CUSTODIA 500 K</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $producto = ControladorProducto::ctrMostrarProducto($item, $valor);

                        foreach ($producto as $key => $value){
                        
                          echo ' <tr>
                                  <td>'.($key+1).'</td>
                                  <td>'.$value["Descripcion"].'</td>
                                  <td>'.$value["Tipo_mercancia"].'</td>
                                  <td>'.$value["No_obligatorio"].'</td>
                                  <td>'.$value["GPS_basico"].'</td>
                                  <td>'.$value["Gps_activacion_1"].'</td>
                                  <td>'.$value["Gps_activacion_2"].'</td>
                                  <td>'.$value["Cts"].'</td>
                                  <td>'.$value["Custodia_electronica"].'</td>
                                  <td>'.$value["Custodia_fisica"].'</td>
                                  <td>'.$value["Custodia"].'</td>                                     
                                  ';
 
                                  if($value["Estatus"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarProducto" idProducto="'.$value["Id"].'" estadoidProducto="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivarProducto" idProducto="'.$value["Id"].'" estadoidProducto="1">Desactivado</button></td>';

                                  }              
                                  echo '
                                  <td>
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarProducto" idProducto="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-edit"></i></button>
                                  </td>

                                </tr>';
                              
                              }
                        ?> 
                    </tbody>
                    <tfoot>
                    <tr>
                          <th style="width:10px">#</th>
                          <th>Producto</th>
                          <th>Tipo Mercancia</th>
                          <th>No Obligatorio</th>
                          <th>GPS Basico</th>
                          <th>GPS por Activacion Alarmas 50,000 USD</th>
                          <th>GPS por activación de alarmas 75,000 USD</th>
                          <th>CTS a partir de 150,000 USD</th>
                          <th>Custodia electronica a partior de 250 K USD</th>
                          <th>CUSTODIA FISICA</th>
                          <th>CUSTODIA 500 K</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                    </tr>
                    </tfoot>
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
MODAL AGREGAR PRODUCTO
======================================-->

<div class="modal fade" id="modalAgregarProducto" role="dialog" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL Descripcion -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoDescripcion" placeholder="Ingresar Descripcion" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- -->
                    <div class="row">
                      <div class="col-md-6">
                         <!-- ENTRADA PARA EL MERCANCIA -->
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar Mercancia</option>
                                  <?php
                                    $giro = ControladorMercancia::ctrMostrarMercancia($item, $valor);

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
                          <!--Termina Select Mercancia -->
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar Si es Obligatorio</option>
                                  <?php
                                    $giro = ControladorMercancia::ctrMostrarMercancia($item, $valor);

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
                          <!--Termina Select Obligatorio -->
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar Si GPS Basico</option>
                                  <?php
                                    $giro = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                                      foreach ($giro as $key => $value){
                                        ?>
                                        <option value="<?php echo $value["Id"] ?>"><?php echo $value["Titulo"] ?></option>
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
                          <!--Termina Select GPS Basico -->   
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar GPS Activacion 50,000 USD</option>
                                  <?php
                                    $giro = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                                      foreach ($giro as $key => $value){
                                        ?>
                                        <option value="<?php echo $value["Id"] ?>"><?php echo $value["Titulo"] ?></option>
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
                          <!--Termina Select GPS Activacion 50,000 USD -->           
                      </div>
                    </div> 
                    <!-- Termina Row-->
                    <div class="row">
                      <div class="col-md-6">
                         <!-- ENTRADA PARA EL MERCANCIA -->
                            <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar Mercancia</option>
                                  <?php
                                    $giro = ControladorMercancia::ctrMostrarMercancia($item, $valor);

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
                          <!--Termina Select Mercancia -->
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar Si es Obligatorio</option>
                                  <?php
                                    $giro = ControladorMercancia::ctrMostrarMercancia($item, $valor);

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
                          <!--Termina Select Obligatorio -->
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar Si GPS Basico</option>
                                  <?php
                                    $giro = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                                      foreach ($giro as $key => $value){
                                        ?>
                                        <option value="<?php echo $value["Id"] ?>"><?php echo $value["Titulo"] ?></option>
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
                          <!--Termina Select GPS Basico -->   
                          <div class="input-group mb-3">
                              <select class="form-control input-lg" id="editarGiro" name="editarGiro" required>	
                              <option value="">Selecionar GPS Activacion 50,000 USD</option>
                                  <?php
                                    $giro = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                                      foreach ($giro as $key => $value){
                                        ?>
                                        <option value="<?php echo $value["Id"] ?>"><?php echo $value["Titulo"] ?></option>
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
                          <!--Termina Select GPS Activacion 50,000 USD -->           
                      </div>
                    </div> 
                    <!-- Termina Row-->
                  </div>
               </div>   
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Producto</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $nuevoDescripcion = new ControladorProtocolo();
                    $nuevoDescripcion -> ctrCrearProtocolo();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR PROTOCOLO
======================================-->

<div class="modal fade" id="modalEditarProtocolo" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Protocolo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL TITULO -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="EditarTitulo" id="EditarTitulo" placeholder="Ingresar Titulo" required>
                      <input type="hidden" id="id" name="id">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>  
                    <!-- ENTRADA PARA EL DESCRIPCION -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="EditarDescripcion" name="EditarDescripcion" placeholder="Ingresar Descripcion" required>
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
                  <button type="submit" class="btn btn-primary">Guardar Protocolo</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                     $nuevoDescripcion = new ControladorProtocolo();
                    $nuevoDescripcion -> ctrEditarProtocolo();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
				