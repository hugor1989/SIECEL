
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Clientes</li>
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
                <!--<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar usuario
                </button>-->
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="TB_Clientes" class="table table-bordered table-striped tableclientes">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>RFC</th>
                          <th>Autorizacion Mercancia</th>
                          <th>Activo</th>
                          <th>Acciones</th>
                          <th>Email</th>
                          <th>Calle</th>
                          <th>N. Interior</th>
                          <th>N. Exterior</th>
                          <th>Colonia</th>
                          <th>Municipio</th>
                          <th>Estado</th>
                          <th>CodigoPostal</th>
                          <th>Localidad</th>
                          <th>Pais</th>
                          
                        </tr>
                      </thead>
                        <tbody>
                        <?php

                            $item = null;
                            $valor = null; 
                            $tipo = 2;
                            $cliente = null;

                            if($_SESSION["perfil"] == 1)
                            {

                              $cliente = ControladorPersona::ctrMostrarAsociado($item, $valor);

                            }else if ($_SESSION["perfil"] == 3){
                              
                              $item = "Asociado";
                              $valor = $_SESSION["id"];

                              $cliente = ControladorPersona::ctrMostrarAsociado($item, $valor);

                            }

                            foreach ($cliente as $key => $value){

                            echo ' <tr>
                                    <td>'.$value["Nombre"].'</td>
                                    <td>'.$value["RFC"].'</td>
                                    <td>'.$value["MercanciaAutorizada"].'</td>';
                                //Se valida el perfi del usuario, si es Asociado no se muestra el boton de Activo e Inactivo
                                if ($_SESSION["perfil"] == 1){

                                  if($value["Activo"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivarCliente" idCliente="'.$value["Id"].'" estadoCliente="0">Activado</button></td>';
  
                                    }else{
  
                                        echo '<td><button class="btn btn-danger btn-xs btnActivarCliente" idCliente="'.$value["Id"].'" estadoCliente="1">Desactivado</button></td>';
  
                                    }
                                }else{
                                  echo '<td></td>';
                                }
                                  
                          echo '<td>
                                  <button class="btn btn-outline-warning btn-block btn-sm btnEditarCliente" idCliente="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-edit"></i></button>
                                </td>
                                ';
                            echo '<td>'.$value["Email"].'</td>
                                    <td>'.$value["Calle"].'</td>
                                    <td>'.$value["Numero_Interior"].'</td>
                                    <td>'.$value["Numero_Exterior"].'</td>';
                              
                              echo'<td>'.$value["Colonia"].'</td>
                                  <td>'.$value["Municipio"].'</td>
                                  <td>'.$value["Estado"].'</td>
                                  <td>'.$value["CodigoPostal"].'</td>
                                  <td>'.$value["Localidad"].'</td>
                                  <td>'.$value["Pais"].'</td>
                                    ';     
                                    echo '
                                    </tr>';
                                
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
MODAL EDITAR CLIENTE
======================================-->
<div class="modal fade" id="modalEditarCliente" role="dialog" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">
                        <div class="form-group">
                              <input type="text" class="form-control" rel="txtTooltipNombre" title="Nombre" data-toggle="tooltip" name="nombre" id="nombre" placeholder="Nombre">
                              <input type="hidden" name="id" id="id">
                        </div>
                        <!-- termina nombre -->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                              <input type="hidden" id="IdPerfil" name="IdPerfil" value=<?php echo $_SESSION["perfil"] ?> >
                                <?php if($_SESSION["perfil"] == 1) { ?>
                                  <input class="multisteps-form__input form-control"  rel="txtTooltipRFC" title="RFC"  type="text" name="editarRFC" id="editarRFC" oninput="validarInput(this.value)"  placeholder="RFC" />
                                  <p id="demo"></p>
                                  <?php }else{ ?>
                                    <input class="multisteps-form__input form-control"  rel="txtTooltipRFC" title="RFC"  type="text" name="editarRFC" id="editarRFC" oninput="validarInput(this.value)"  placeholder="RFC" disabled />
                                    <p id="demo"></p>
                                  <?php } ?>
                                
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" type="text"  rel="txtTooltipRFC" title="Email" name="editarEmail" id="editarEmail" placeholder="Email" />
                            </div>
                        </div>
                        <!-- fin RFC EMAIL-->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" rel="txtTooltipCalle" title="Calle"  type="text" name="editarCalle" id="editarCalle" placeholder="Calle" />
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control" rel="txtTooltipNumeroExterior" title="Numero Exterior"  type="text" name="editarNumeroExterior" id="editarNumeroExterior" placeholder="NumeroExterior" /> 
                              
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control" rel="txtTooltipNumeroInterior" title="Numero Interior"  type="text" name="editarNumeroInterior" id="editarNumeroInterior" placeholder="Numero Interior" /> 
                            </div>
                        </div>
                            <!-- Fin calle-->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" rel="txtTooltipColonia" title="Colonia"  type="text" name="editarColonia" id="editarColonia" placeholder="Colonia" />
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <select class="form-control select2" rel="txtTooltipPerfil" title="Estado"  data-toggle="tooltip" name="editarEstado" id="editarEstado" >
                                    <option value="">Selecionar Estado</option>
                                    <?php
                                    $item=null;
                                    $valor=null;
                                    $perfil = ControladorEstados::ctrMostrarEstados($item, $valor);

                                    if($perfil != null){

                                      foreach ($perfil as $key => $value){
                                        echo '<option value="'. $value["id"].'">'. $value["nombre"].'</option>';
                                      }
                                    } 
                                    ?>
                                </select>
                            <!--<input class="multisteps-form__input form-control" rel="txtTooltipEstado" title="Estado"  type="text" name="editarEstado" id="editarEstado" placeholder="Estado" />-->
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <select class="form-control select2" rel="txtTooltipPerfil" title="Estado"  data-toggle="tooltip" name="editarMunicipio" id="editarMunicipio" >
                                    <option value="">Selecionar Municipio</option>
                                    <?php
                                    $item=null;
                                    $valor=null;
                                    $municipio = ControladorEstados::ctrMostrarMunicipio($item, $valor);

                                    if($municipio != null){

                                      foreach ($municipio as $key => $value){
                                        echo '<option value="'. $value["id"].'">'. $value["nombre"].'</option>';
                                      }
                                    } 
                                    ?>
                                </select>
                            <!--<input class="multisteps-form__input form-control" rel="txtTooltipMunicipio" title="Municipio"  type="text" name="editarMunicipio" id="editarMunicipio" placeholder="Municipio" />-->
                            </div>
                        </div>
                        <!-- Fin Colonia-->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                            <input class="multisteps-form__input form-control" rel="txtTooltipCP" title="Codigo Postal"  type="text" name="editarCP" id="editarCP" placeholder="Codigo Postal" />
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipPais" title="Pais"  type="text" name="editarPais" id="editarPais" placeholder="Pais" />
                            </div>
                        </div>
                        <!-- Fin pais -->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                              <input class="multisteps-form__input form-control" rel="txtTooltipPais" title="Localidad"  type="text" name="editarLocalidad" id="editarLocalidad" placeholder="Localidad" />
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                              <?php if($_SESSION["perfil"] == 1) { ?>
                              <input class="multisteps-form__input form-control" rel="txtTooltipPais" title="Mercancia Autorizadas"  type="text" name="editarMercAut" id="editarMercAut" placeholder="Mercancia Autotizada" />      
                              <?php }else { ?>
                                <input class="multisteps-form__input form-control" rel="txtTooltipPais" title="Mercancia Autorizadas"  type="text" name="editarMercAut" id="editarMercAut" placeholder="Mercancia Autotizada" disabled />      
                              <?php } ?>  
                            </div>
                        </div>
                        <!-- Fin pais -->
                        <?php if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2 ) { ?>
                        <div class="form-row mt-4">
                          <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                      <input class="multisteps-form__input form-control" rel="txtTooltipCuotaRot" 
                                      title="Cuota Rot" data-toggle="tooltip" type="text" 
                                      name="nuevoCuota_Rot" id="nuevoCuota_Rot" placeholder="Cuota ROT y Robo" required/>
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <span class="fa fa-percent"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                  <input class="multisteps-form__input form-control" rel="txtTooltipClaveBancaria" 
                                        title="Cuota TR" data-toggle="tooltip"  type="numeric" 
                                          name="nuevoCuota_TR"  id="nuevoCuota_TR" placeholder="Cuota TR" />
                                          <div class="input-group-append">
                                              <div class="input-group-text">
                                                  <span class="fa fa-percent"></span>
                                              </div>
                                          </div>
                              </div>
                          </div>
                          <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                              <input class="form-control" rel="txtTooltipCuotaBasica" 
                                      title="Cuota TR + VT" data-toggle="tooltip" type="text" 
                                      name="nuevoCuotaBasica" id="nuevoCuotaBasica" placeholder="Cuota TR + VT" />
                                      <div class="input-group-append">
                                          <div class="input-group-text">
                                              <span class="fa fa-percent"></span>
                                          </div>
                                      </div>
                              </div>
                          </div>
                          <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                              <div class="input-group mb-3">
                                <select class="form-control" rel="txtTooltipPerfil" title="Tipo de Cuota"  data-toggle="tooltip" name="editarCuotas" id="editarCuotas" >
                                  <option value="">Seleccionar Opcion</option>
                                  <option value="CuotaUsuario">Cuota Usuario</option>
                                  <option value="CuotaMercancia">Cuota Mercancia</option>
                                </select>
                              </div>
                          </div>
                      </div>
                      <?php }else{?>
                        <input type="hidden" name="nuevoCuota_Rot"  id="nuevoCuota_Rot" />
                        <input type="hidden" name="nuevoCuota_TR"  id="nuevoCuota_TR" />
                        <input type="hidden" name="nuevoCuotaBasica" id="nuevoCuotaBasica"/>
                        <input type="hidden" name="editarCuotas" id="editarCuotas"/>
                              
                      <?php } ?>
            <!-- FIN INPUT -->
                  </div>
                </div>  
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                  <?php

                     $actualizar = new ControladorPersona();
                    $actualizar -> ctrEditarCliente();
                  ?>
                
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

