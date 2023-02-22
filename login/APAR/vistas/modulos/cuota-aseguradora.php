<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Cuota Aseguradora</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Cuota Aseguradora</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCuotaAseguradora">
                    Agregar Cuota Aseguradora
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="TableA" class="table table-bordered TableCA">
                      <thead>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Aseguradora</th>
                          <th>Cuota Basica</th>
                          <th>Cuota ROT</th>
                          <th>Cuota TR</th>
                          <th>Cuota Contenedor</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $item = null;
                        $valor = null;


                        $itemA = null;
                        $valorA = null;
                        //Aseguradora	Cuota_Basica	Cuota_Rot	Cuota_TR	Cuota_Contenedor

                        $aseguradora = ControladorAseguradora::ctrMostrarCuota_Aseguradora($item, $valor);


                        foreach ($aseguradora as $key => $value){

                          $itemA = "Id";
                          $valorA = $value["Aseguradora"];
                         
                          $Aseguradora = ControladorAseguradora::ctrMostrarAseguradora($itemA, $valorA);

                          echo ' <tr>
                                  <td>'.($key+1).'</td>';

                                   echo ' <td>'.$Aseguradora["Descripcion"].'</td>';
                                  
                             echo '<td>'.$value["Cuota_Basica"].'</td>
                                  <td>'.$value["Cuota_Rot"].'</td>
                                  <td>'.$value["Cuota_TR"].'</td>
                                  <td>'.$value["Cuota_Contenedor"].'</td>
                                  ';

                                  echo '
                                  <td>

                                    <div class="btn-group">
                                      
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarAseguradora" idUsuario="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarAseguradora"><i class="fa fa-edit"></i></button>

                                    </div>  

                                  </td>

                                </tr>';}
                        ?> 
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Aseguradora</th>
                          <th>Cuota Basica</th>
                          <th>Cuota ROT</th>
                          <th>Cuota TR</th>
                          <th>Cuota Contenedor</th>
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
MODAL AGREGAR CUOTA ASEGURADORA
======================================-->

<!--=====================================
MODAL AGREGAR ASEGURADORA
======================================-->

<div class="modal fade" id="modalAgregarCuotaAseguradora" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Cuota Aseguradora</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">
                     <!-- ENTRADA PARA EL ASEGURADORA -->
                     <div class="input-group mb-3">
                      <select class="form-control input-lg" id="nuevoAseguradora" name="nuevoAseguradora" required>	
                      <option value="">Selecionar Aseguradora</option>
                        <?php
                          $giro = ControladorAseguradora::ctrMostrarAseguradora($item, $valor);

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
                    <!-- ENTRADA PARA CUOTA BASICA -->
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" name="nuevoCuotaBasica" placeholder="Ingresar Cuota Basica" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- ENTRADA PARA EL Cuota_Rot -->
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" name="nuevoCuota_Rot" placeholder="Ingresar Cuota Rot" id="Cuota_Rot" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <!-- ENTRADA PARA EL Cuota_TR -->
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" name="nuevoCuota_TR" placeholder="Ingresar Cuota TR" id="nuevoCuota_TR" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <!-- ENTRADA PARA EL Cuota_Contenedor -->
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" name="nuevoCuota_Contenedor" placeholder="Ingresar Cuota Contenedor" id="nuevoCuota_Contenedor" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Box body -->
                </div>    
                <!-- Body -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar Cuota Aseguradora</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                  </div>
                <?php

                  $crearAseguradora = new ControladorAseguradora();
                   $crearAseguradora -> ctrCrearCuotaAseguradora();
                ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
