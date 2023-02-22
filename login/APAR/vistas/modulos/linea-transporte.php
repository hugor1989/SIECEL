
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Linea de Transporte</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Linea de Transporte</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLineaTransporte">
                    Agregar Linea de Transporte
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-bordered tableLinea">
                      <thead>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Descripcion</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    <tbody>
                    <?php

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorLineaTransporte::mdlMostrarLineaTransporte($item, $valor);

                    foreach ($usuarios as $key => $value){

                      echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["Descripcion"].'</td>';

                              if($value["Estatus"] != 0){

                                echo '<td><button class="btn btn-success btn-xs btnActivarLineaTransporte" idLT="'.$value["Id"].'" estadodLT="0">Activado</button></td>';

                              }else{

                                echo '<td><button class="btn btn-danger btn-xs btnActivarLineaTransporte" idLT="'.$value["Id"].'" estadodLT="1">Desactivado</button></td>';

                              }              
                              echo '
                              <td>
                                  <button class="btn btn-outline-warning btn-block btn-sm btnEditarLineaTransporte" idLT="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarLineaTransporte"><i class="fa fa-edit"></i></button>
                              </td>

                            </tr>';
                          
                          }
                    ?> 
                    </tbody>
                    <tfoot>
                    <tr>
                          <th style="width:10px">#</th>
                          <th>Descripcion</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                    </tr>
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
MODAL AGREGAR MEDIO TRANSPORTE
======================================-->

<div class="modal fade" id="modalAgregarLineaTransporte" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Linea Transporte</h4>
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
                  </div>
               </div>   
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Linea Transporte</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $nuevoDescripcion = new ControladorLineaTransporte();
                    $nuevoDescripcion -> ctrCrearLineaTransporte();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR Linea
======================================-->

<div class="modal fade" id="modalEditarLineaTransporte" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Linea Transporte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="EditarDescripcion" id="EditarDescripcion" placeholder="Ingresar Descripcion" required>
                      <input type="hidden" id="id" name="id">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>                 
                  </div>
                </div>   
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Linea Transporte</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $editarRecorrido = new ControladorLineaTransporte();
                    $editarRecorrido -> ctrEditarLineaTransporte();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
