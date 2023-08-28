
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Perfiles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Perfiles</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfilUsuario">
                    Agregar Perfil
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-bordered tableperfil">
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

                        $usuarios = ControladorUsuarios::mdlMostrarPerfiles($item, $valor);

                        foreach ($usuarios as $key => $value){
                        
                          echo ' <tr>
                                  <td>'.($key+1).'</td>
                                  <td>'.$value["Clave"].'</td>
                                  <td>'.$value["Descripcion"].'</td>';

                                  if($value["Estado"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarPerfil" idPerfil="'.$value["Id"].'" estadoPerfil="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivarPerfil" idPerfil="'.$value["Id"].'" estadoPerfil="1">Desactivado</button></td>';

                                  }              
                                  echo '
                                  <td>
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarPerfil" idPerfil="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarPerfilUsuario"><i class="fa fa-edit"></i></button>
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
MODAL AGREGAR USUARIO
======================================-->

<div class="modal fade" id="modalAgregarPerfilUsuario" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Perfil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL NOMBRE -->
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
                  <button type="submit" class="btn btn-primary">Guardar usuario</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $nuevoDescripcion = new ControladorUsuarios();
                    $nuevoDescripcion -> ctrCrearPerfilUsuario();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR Perfil
======================================-->

<div class="modal fade" id="modalEditarPerfilUsuario" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Perfil</h4>
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
                  <button type="submit" class="btn btn-primary">Guardar Perfil</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $editarPerfil = new ControladorUsuarios();
                    $editarPerfil -> ctrEditarPerfilUsuario();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
