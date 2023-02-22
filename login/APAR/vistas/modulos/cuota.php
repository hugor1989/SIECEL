<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Cuota</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Cuota</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCuota">
                    Agregar Cuota
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="TableA" class="table table-bordered TableCA">
                      <thead>
                        <tr> 
                        <!--Asociado	Comision	Prefijo	Cuota_Aseguradora -->
                          <th style="width:10px">#</th>
                          <th>Asociado</th>
                          <th>Comision</th>
                          <th>Prefijo</th>
                          <th>Cuota Aseguradora</th>
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

                        $cuota = ControladorAseguradora::ctrMostrarCuota($item, $valor);


                        foreach ($cuota as $key => $value){

                          $itemA = "Id";
                          $valorA = $value["Asociado"];
                         
                          $asociado = ControladorPersona::ctrMostrarAsociado($itemA, $valorA);

                          echo ' <tr>
                                  <td>'.($key+1).'</td>';

                             echo '<td>'.$asociado["Nombre"].'</td>
                                  <td>'.$value["Comision"].'</td>
                                  <td>'.$value["Prefijo"].'</td>
                                  <td>'.$value["Cuota_Aseguradora"].'</td>
                                  ';
                             
                              //    echo ' <td>'.$Aseguradora["Cuota_Basica"].'</td>';    

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
                          <th>Asociado</th>
                          <th>Comision</th>
                          <th>Prefijo</th>
                          <th>Cuota_Aseguradora</th>
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

<div class="modal fade" id="modalAgregarCuota" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Cuota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">
                     <!-- ENTRADA PARA EL Asociado -->
                     <div class="input-group mb-3">
                      <select class="form-control input-lg" id="nuevoAsociado" name="nuevoAsociado" required>	
                      <option value="">Selecionar Asociado</option>
                      <?php
                          $asociado = ControladorPersona::ctrMostrarAsociado($item, $valor);

                            foreach ($asociado as $key => $value){

                              ?>
                              <option value="<?php echo $value["Id"] ?>"><?php echo $value["Nombre"] ?></option>
                              
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
                    <!-- ENTRADA PARA Comision -->
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" name="nuevoComision" placeholder="Ingresar Comision" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                   <!-- ENTRADA PARA EL CUOTA -->
                   <div class="input-group mb-3">
                      <select class="form-control input-lg" id="nuevoCuota_Aseguradora" name="nuevoCuota_Aseguradora" required>	
                      <option value="">Selecionar Cuota</option>
                        <?php
                          $giro = ControladorAseguradora::ctrMostrarCuota_Aseguradora($item, $valor);

                            foreach ($giro as $key => $value){

                              ?>
                              <option value="<?php echo $value["Id"] ?>"><?php echo $value["Aseguradora"] ?></option>
                              
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
                  </div>
                  <!-- Box body -->
                </div>    
                <!-- Body -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar Cuota</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                  </div>
                <?php

                  $crearAseguradora = new ControladorAseguradora();
                   $crearAseguradora -> ctrCrearCuota();
                ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
