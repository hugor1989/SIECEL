
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Medios de Transporte</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Medios de Transporte</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMedioTransporte">
                    Agregar Medio de Transporte
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-bordered tableMedioTransporte">
                      <thead>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Clave</th>
                          <th>Descripcion</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    <tbody>
                    <?php

                        $item = null;
                        $valor = null;

                        $usuarios = ControladorMedioTransporte::mdlMostrarMedioTransporte($item, $valor);

                        foreach ($usuarios as $key => $value){
                        
                          echo ' <tr>
                                  <td>'.($key+1).'</td>
                                  <td>'.$value["Clave"].'</td>
                                  <td>'.$value["Descripcion"].'</td>';

                                  if($value["Estatus"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarMedioTransporte" idMT="'.$value["Id"].'" estadodMT="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivarMedioTransporte" idMT="'.$value["Id"].'" estadodMT="1">Desactivado</button></td>';

                                  }              
                                  echo '
                                  <td>
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarMedioTransporte" idMT="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarMedioTransporte"><i class="fa fa-edit"></i></button>
                                  </td>

                                </tr>';
                              
                              }
                        ?> 
                    </tbody>
                    <tfoot>
                    <tr>
                          <th style="width:10px">#</th>
                          <th>Clave</th>
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

<div class="modal fade" id="modalAgregarMedioTransporte" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Medio Transporte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL Descripcion -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoDescripcion" rel="txtTooltipDescripcion" onkeyup="mayus(this);" title="Recorrido" placeholder="Ingresar Descripcion" required>
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
                  <button type="submit" class="btn btn-primary">Guardar Medio Transporte</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $nuevoDescripcion = new ControladorMedioTransporte();
                    $nuevoDescripcion -> ctrCrearMedioTransporte();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR Recorrido
======================================-->

<div class="modal fade" id="modalEditarMedioTransporte" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Medio Transporte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="EditarDescripcion" id="EditarDescripcion" rel="txtTooltipDescripcion" onkeyup="mayus(this);" title="Descripcion" placeholder="Descripcion" required>
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
                  <button type="submit" class="btn btn-primary">Guardar Medio Transporte</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $editarRecorrido = new ControladorMedioTransporte();
                    $editarRecorrido -> ctrEditarMedioTransporte();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
