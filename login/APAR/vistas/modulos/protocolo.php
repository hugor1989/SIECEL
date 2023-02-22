<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Protocolos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Protocolos</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProtocolo">
                    Agregar Procolos
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-bordered tableProtocolo">
                      <thead>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Titulo</th>
                          <th>Descripcion</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $protocolo = ControladorProtocolo::ctrMostrarProtocolo($item, $valor);

                        foreach ($protocolo as $key => $value){
                        
                          echo ' <tr>
                                  <td>'.($key+1).'</td>
                                  <td>'.$value["Titulo"].'</td>
                                  <td>'.$value["Descripcion"].'</td>';
 
                                  if($value["Estatus"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarProtocolo" idProtocolo="'.$value["Id"].'" estadoProtocolo="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivarProtocolo" idProtocolo="'.$value["Id"].'" estadoProtocolo="1">Desactivado</button></td>';

                                  }              
                                  echo '
                                  <td>
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarProtocolo" idProtocolo="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarProtocolo"><i class="fa fa-edit"></i></button>
                                  </td>

                                </tr>';
                              
                              }
                        ?> 
                    </tbody>
                    <tfoot>
                    <tr>
                          <th style="width:10px">#</th>
                          <th>Titulo</th>
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
MODAL AGREGAR PROTOCOLO
======================================-->

<div class="modal fade" id="modalAgregarProtocolo" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Protocolo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL Titulo -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoTitulo"  onkeyup="mayus(this);" placeholder="Ingresar Titulo" required>
                     
                    </div>
                    <!-- -->
                    <!-- ENTRADA PARA Descripcion -->
                    <div class="input-group mb-3">
                      <!-- <textarea type="text" class="form-control" name="nuevoDescripcion" onkeyup="mayus(this);" placeholder="Ingresar Descripcion" required> -->
                      <textarea class="form-control"  name="nuevoDescripcion" id="nuevoDescripcion" placeholder="Ingresar Descripcion"></textarea>
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
                      <input type="text" class="form-control" name="EditarTitulo" id="EditarTitulo" onkeyup="mayus(this);" placeholder="Ingresar Titulo" required>
                      <input type="hidden" id="id" name="id">
                     
                    </div>  
                    <!-- ENTRADA PARA EL DESCRIPCION -->
                    <div class="input-group mb-3">
                    <textarea class="form-control"  name="EditarDescripcion" id="EditarDescripcion" onkeyup="mayus(this);" placeholder="Ingresar Descripcion"></textarea>
                      <!-- <input type="text" class="form-control" id="EditarDescripcion" name="EditarDescripcion" onkeyup="mayus(this);" placeholder="Ingresar Descripcion" required> -->
                      
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
				