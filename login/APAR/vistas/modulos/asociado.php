<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Asociados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Asociados</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAsociado">
                    Agregar Asociado
                </button>
              </div>
                <div class="card-body">
                    <table id="example1" class="table table-responsive table-bordered">
                      <thead>
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Clave</th>
                          <th>Nombre</th>
                          <th>RFC</th>
                          <th>Puesto</th>
                          <th>Calle</th>
                          <th>Numero Interior</th>
                          <th>Numero Exterior</th>
                          <th>Colonia</th>
                          <th>Municipio</th>
                          <th>Estado</th>
                          <th>CodigoPostal</th>
                          <th>Pais</th>
                          <th>Email</th>
                          <th>Email Adicional</th>
                          <th>Telefono</th>
                          <th>Celular</th>
                          <th>Contacto</th>
                          <th>Nextel</th>
                          <th>CuentaBancaria</th>
                          <th>CuentaBancaria Adicional</th>
                          <th>Giro</th>
                          <th>Activo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    <tbody>
                    <?php

                    $item = null;
                    $valor = null;

                    $asociado = ControladorPersona::ctrMostrarAsociado($item, $valor);

                    foreach ($asociado as $key => $value){

                      echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["Clave"].'</td>
                              <td>'.$value["Nombre"].'</td>
                              <td>'.$value["RFC"].'</td>
                              <td>'.$value["Puesto"].'</td>
                              <td>'.$value["Calle"].'</td>
                              <td>'.$value["Numero_Interior"].'</td>
                              <td>'.$value["Numero_Exterior"].'</td>
                              <td>'.$value["Colonia"].'</td>
                              <td>'.$value["Municipio"].'</td>
                              <td>'.$value["Estado"].'</td>
                              <td>'.$value["CodigoPostal"].'</td>
                              <td>'.$value["Pais"].'</td>
                              <td>'.$value["Email"].'</td>
                              <td>'.$value["Email_Adicional"].'</td>
                              <td>'.$value["Telefono"].'</td>
                              <td>'.$value["Celular"].'</td>
                              <td>'.$value["Contacto"].'</td>
                              <td>'.$value["Nextel"].'</td>
                              <td>'.$value["CuentaBancaria"].'</td>
                              <td>'.$value["CuentaBancaria_Adicional"].'</td>
                              <td>'.$value["Giro"].'</td>
                              ';

                              if($value["Activo"] != 0){

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
                          <th>Nombre</th>
                          <th>RFC</th>
                          <th>Puesto</th>
                          <th>Calle</th>
                          <th>Numero Interior</th>
                          <th>Numero Exterior</th>
                          <th>Colonia</th>
                          <th>Municipio</th>
                          <th>Estado</th>
                          <th>CodigoPostal</th>
                          <th>Pais</th>
                          <th>Email</th>
                          <th>Email Adicional</th>
                          <th>Telefono</th>
                          <th>Celular</th>
                          <th>Contacto</th>
                          <th>Nextel</th>
                          <th>CuentaBancaria</th>
                          <th>CuentaBancaria Adicional</th>
                          <th>Giro</th>
                          <th>Activo</th>
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
MODAL AGREGAR Asociado
======================================-->
<div class="modal fade" id="modalAgregarAsociado" role="dialog" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Asociado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoDescripcion" placeholder="Ingresar Nombre" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nombre -->
                    <div class="row">
                      <div class="col-md-6">
                           <!-- ENTRADA PARA EL nuevoEmpresa -->
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoEmpresa" placeholder="Ingresar Empresa" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoEmpresa -->
                            <!-- ENTRADA PARA EL nuevoRFC -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoRFC" placeholder="Ingresar RFC" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoRFC -->
                            <!-- ENTRADA PARA EL nuevoPuesto -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoPuesto" placeholder="Ingresar Puesto" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoPuesto -->
                            <!-- ENTRADA PARA EL nuevoCalle -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoCalle" placeholder="Ingresar Calle" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoCalle -->
                            <!-- ENTRADA PARA EL nuevoNumeroInterior -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoNumeroInterior" placeholder="Ingresar Numero Interior" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoNumeroInterior -->
                            <!-- ENTRADA PARA EL nuevoNumeroExterior -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoNumeroExterior" placeholder="Ingresar Numero Exterior" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nombre -->
                            <!-- ENTRADA PARA EL nuevoColonia -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoColonia" placeholder="Ingresar Colonia" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoColonia -->
                            <!-- ENTRADA PARA EL nuevoMunicipio -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoMunicipio" placeholder="Ingresar Municipio" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoMunicipio -->
                            <!-- ENTRADA PARA EL nuevoEstado -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoEstado" placeholder="Ingresar Estado" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoEstado -->
                            <!-- ENTRADA PARA EL nuevoCodigoPostal -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoCodigoPostal" placeholder="Ingresar C.P." >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoCodigoPostal -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <!-- ENTRADA PARA EL nuevoPais -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoPais" placeholder="Ingresar Pais" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoPais -->
                            <!-- ENTRADA PARA EL nuevoEmail -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoEmail" placeholder="Ingresar Email" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoEmail -->
                            <!-- ENTRADA PARA EL nuevoGiro -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoGiro" placeholder="Ingresar Giro" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoGiro -->
                            <!-- ENTRADA PARA EL nuevoEmail_Adicional -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoEmail_Adicional" placeholder="Ingresar Email_Adicional" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoEmail_Adicional -->
                            <!-- ENTRADA PARA EL nuevoTelefono -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingresar Telefono" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoTelefono -->
                            <!-- ENTRADA PARA EL nuevoCelular -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoCelular" placeholder="Ingresar Celular" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoCelular -->
                            <!-- ENTRADA PARA EL nuevoContacto -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoContacto" placeholder="Ingresar Contacto" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoContacto -->
                            <!-- ENTRADA PARA EL nuevoNextel -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoNextel" placeholder="Ingresar Nextel" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoNextel -->
                            <!-- ENTRADA PARA EL nuevoCuentaBancaria -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoCuentaBancaria" placeholder="Ingresar Cuenta Bancaria" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoCuentaBancaria -->
                            <!-- ENTRADA PARA EL nuevoCuentaBancaria_Adicional -->
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nuevoCuentaBancaria_Adicional" placeholder="Ingresar CuentaBancaria_Adicional" >
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <!-- /item group nuevoCuentaBancaria_Adicional -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->    
                  </div>
                  <!-- Box body -->
               </div>
               <!-- Modal body-->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Asociado</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                    $nuevoAsociado = new ControladorPersona();
                    $nuevoAsociado -> ctrCrearPersona();
                  ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

