
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar usuarios</li>
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
                <div class="card-body"> <!--table table-bordered table-striped-->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Usuario</th>
                          <th>Nombre</th>
                          <th>Perfil</th>
                          <th>Aseguradora</th>
                          <th>Acciones</th>
                          <th>Estatus</th>
                          <th>Limite Asegurable %</th>
                          <th>Comision</th>
                          <th>Cuota ROT Y ROBO</th>
                          <th>Cuota TR</th>
                          <th>Cuota TR + VT</th>
                          <th>Cuota Contenedor</th>
                          <th>Prima Minima</th>
                          <th>Derecho Certificado</th>
                          <th>Abreviatura</th>
                          <th>Email</th>
                          <th>RFC</th>
                          <th>Puesto</th>
                          <th>Calle</th>
                          <th>Numero Interior</th>
                          <th>Numero Exterior</th>
                          <th>Colonia</th>
                          <th>Municipio</th>
                          <th>Estado</th>
                          <th>CodigoPostal</th>
                          <th>Localidad</th>
                          <th>Pais</th>
                          <th>Email Adicional</th>
                          <th>Telefono</th>
                          <th>Celular</th>
                          <th>Contacto</th>
                          <th>Nextel</th>
                          <th>CuentaBancaria</th>
                          <th>CuentaBancaria Adicional</th>
                          <th>Giro</th>
                          <th>Foto</th>
                          <th>Último login</th>
                        </tr>
                      </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                      
                        foreach ($usuarios as $key => $value){

                          //Variables para mandar a llamar las aseguradora
                          $ValorAseguradora = $value["IdAseguradora"];
                          $itemAseguradora = "Id";

                          //Variables para mandar a llamar los perfiles
                          $valorPerfil = $value["Perfil"];
                          $itemPerfil = "Id";
                          $Prefijo = "UA";
  

                          $aseguradora = ControladorAseguradora::ctrMostrarAseguradora($itemAseguradora, $ValorAseguradora);
                          $perfil = ControladorUsuarios::mdlMostrarPerfiles($itemPerfil, $valorPerfil);
  
                        
                          echo ' <tr>
                                  <td>'.$value["Username"].'</td>
                                  <td>'.$value["Nombre"].'</td>
                                  <td>'.$perfil["Descripcion"].'</td>
                                  <td>'.$aseguradora["Descripcion"].'</td>
                                  <td>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-warning btn-block btn-sm btnEditarUsuario" idUsuario="'.$value["Id"].'" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                                    </div>  
                                  </td>';
                                if($value["Activo"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["Id"].'" estadoUsuario="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["Id"].'" estadoUsuario="1">Desactivado</button></td>';

                                  }    
                            echo '<td>'.$value["Comision"].'</td>
                                  <td>'.$value["ComisionAsociado"].'</td>
                                  <td>'.$value["Cuota_Rot"].'</td>
                                  <td>'.$value["Cuota_TR"].'</td>
                                  <td>'.$value["Cuota_VT"].'</td>
                                  <td>'.$value["Cuota_Contenedor"].'</td>
                                  <td>'.$value["Prima_minima"].'</td>
                                  <td>'.$value["Derecho_Certificado"].'</td>
                                  ';
                            echo '<td>'.$value["Abreviatura"].'</td>      
                                  <td>'.$value["Email"].'</td>
                                  <td>'.$value["RFC"].'</td>
                                  <td>'.$value["Puesto"].'</td>
                                  <td>'.$value["Calle"].'</td>
                                  <td>'.$value["Numero_Interior"].'</td>
                                  <td>'.$value["Numero_Exterior"].'</td>
                                  <td>'.$value["Colonia"].'</td>
                                  <td>'.$value["Municipio"].'</td>
                                  <td>'.$value["Estado"].'</td>
                                  <td>'.$value["CodigoPostal"].'</td>
                                  <td>'.$value["Localidad"].'</td>
                                  <td>'.$value["Pais"].'</td>
                                  <td>'.$value["Email_Adicional"].'</td>
                                  <td>'.$value["Telefono"].'</td>
                                  <td>'.$value["Celular"].'</td>
                                  <td>'.$value["Contacto"].'</td>
                                  <td>'.$value["Nextel"].'</td>
                                  <td>'.$value["CuentaBancaria"].'</td>
                                  <td>'.$value["CuentaBancaria_Adicional"].'</td>
                                  <td>'.$value["Giro"].'</td>
                                  ';


                                  if($value["Foto"] != ""){

                                    echo '<td><img src="'.$value["Foto"].'" class="img-thumbnail" width="100px"></td>';

                                  }else{

                                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px"></td>';

                                  }
                                               

                                  echo '
                                  <td>'.$value["ultimo_login"].'</td>
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
MODAL AGREGAR USUARIO
======================================-->

<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <form role="form" method="post" 
                enctype="multipart/form-data" id="edit_form"
                onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Datos Usuario</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <h2>Registro de Usuarios</h2>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!--<div class="alert alert-success hide"></div>-->
                        <!--<form role="form" method="post" enctype="multipart/form-data" id="register_form">-->
                        <fieldset>
                        <h2>Step 1: Datos Inicio Sesion</h2>
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" rel="txtTooltipNombre" title="Nombre Usuario" onkeyup="mayus(this);" data-toggle="tooltip" name="editarNombre" id="editarNombre" placeholder="Nombre">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                            <!--<input type="hidden" name="editarUsuario" id="editarUsuario">-->
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Email -->
                        <div class="input-group mb-3"> 
                            <input type="text" class="form-control" rel="txtTooltipEmail" title="Email *" onkeyup="mayus(this);" data-toggle="tooltip" name="editarEmail"  id="editarEmail" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Email -->
                        <div class="input-group mb-3"> 
                            <input type="text" class="form-control" rel="txtTooltipEmail" title="Usuario Sistema" onkeyup="mayus(this);" data-toggle="tooltip" name="editarUsuario"  id="editarUsuario" placeholder="Usuario Sistema">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA CONTRASEÑA -->
                        <div class="input-group mb-3"> 
                        <input type="password" class="form-control input-lg" name="editarPassword" id="editarPassword" placeholder="Escriba la nueva contraseña">
                            <input type="hidden" id="passwordActual" name="passwordActual">
                            <div class="input-group-append">
                                <button id="show_password" class="btn btn-primary" 
                                        type="button" onclick="mostrarPasswordEditar();"> 
                                        <span class="fa fa-eye-slash icon"></span> 
                                </button>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL PERFIL -->
                        <div class="row">
                            <div class="input-group mb-3">
                                <select class="form-control" rel="txtTooltipPerfil" title="Pefil de Usuario"  data-toggle="tooltip" name="editarPerfil" id="editarPerfil" >
                                    <option value="">Selecionar Perfil</option>

                                    <?php
                                    $perfil = ControladorUsuarios::mdlMostrarPerfiles($item, $valor);

                                    foreach ($perfil as $key => $value){

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
                        </div>
                        <!-- -->
                         <!-- ENTRADA PARA EL PERFIL -->
                         <div class="row">
                            <div class="input-group mb-3">
                                <select class="form-control" rel="txtTooltipPerfil" title="Aseguradora"  data-toggle="tooltip" name="editarAseguradora" id="editarAseguradora" >
                                    <option value="">Selecionar Aseguradora</option>

                                    <?php
                                    $aseguradora = ControladorAseguradora::ctrMostrarAseguradora($item, $valor);

                                    foreach ($aseguradora as $key => $value){

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
                        </div>
                        <!-- -->
                        </br>
                            <input type="button" class="next-forma btn btn-info" value="Next" />
                            </fieldset>
                        <fieldset>
                            <h2> Step 2: Datos Empresa</h2>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipEmpresa" onkeyup="mayus(this);" title="Empresa*" data-toggle="tooltip" type="text" name="editarEmpresa" id="editarEmpresa" placeholder="Empresa" />
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipRFC" onkeyup="mayus(this);" title="Empresa*" data-toggle="tooltip" type="text" name="editarRFC" id="editarRFC" placeholder="RFC" />
                                </div>
                            </div>
                            <!-- Fin Empresa-->
                            <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipCalle"  onkeyup="mayus(this);" title="Cale" data-toggle="tooltip" type="text" name="editarCalle" id="editarCalle" placeholder="Calle" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipNumeroInterior"  onkeyup="mayus(this);" title="Numero Interior" data-toggle="tooltip" type="text" name="editarNumeroInterior" id="editarNumeroInterior" placeholder="Numero Interior" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipNumeroExterior" onkeyup="mayus(this);" title="Numero Exterior" data-toggle="tooltip" type="text" name="editarNumeroExterior" id="editarNumeroExterior" placeholder="NumeroExterior" />
                                </div>
                            </div>
                            <!-- Fin calle-->
                            <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipColonia" onkeyup="mayus(this);" title="Colonia" data-toggle="tooltip" type="text" name="editarColonia" id="editarColonia" placeholder="Colonia" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipMunicipio" onkeyup="mayus(this);" title="Municipio" data-toggle="tooltip" type="text" name="editarMunicipio" id="editarMunicipio"  placeholder="Municipio" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipCP" onkeyup="mayus(this);" title="Codigo Postal*" data-toggle="tooltip" type="text" name="editarCP"  id="editarCP" placeholder="Codigo Postal" />
                                </div>
                            </div>
                            <!-- Fin Colonia-->
                            <div class="row">
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipEstado" onkeyup="mayus(this);" title="Estado" data-toggle="tooltip" type="text" name="editarEstado" id="editarEstado" placeholder="Estado" />
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipPais" onkeyup="mayus(this);" title="Pais" data-toggle="tooltip" type="text" name="editarPais" id="editarPais" placeholder="Pais" />
                                </div>
                            </div>
                            <!-- fin Pais-->
                            <div class="row">
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipGiro" onkeyup="mayus(this);" title="Giro" data-toggle="tooltip" type="text" name="editarGiro" id="editarGiro"  placeholder="Giro" />
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipEmailAdicional" onkeyup="mayus(this);" title="Email Adicional*" data-toggle="tooltip" type="text" name="editarEmailAdicional" id="editarEmailAdicional" placeholder="Email Adicional" />
                                </div>
                            </div>
                            <!-- fin Giro-->
                            <div class="row">
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipTelefono" onkeyup="mayus(this);" title="Telefono" data-toggle="tooltip" type="text" name="editarTelefono" id="editarTelefono" placeholder="Telefono" />
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipTelefonoCelular" onkeyup="mayus(this);" title="Telefono Celulñar" data-toggle="tooltip" type="text" name="editarCelular" id="editarCelular" placeholder="Celular" />
                                </div>
                            </div>
                            <!-- fin Telefono-->
                            <div class="row">
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipContacto" onkeyup="mayus(this);" title="Contacto" data-toggle="tooltip" type="text" name="editarContacto" id="editarContacto" placeholder="Contacto" />
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipNextel" onkeyup="mayus(this);" title="Nextel" data-toggle="tooltip" type="text" name="editarNextel" id="editarNextel" placeholder="Nextel" />
                                </div>
                            </div>
                            <!-- fin Nextel-->
                            <div class="row">
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipBanco" onkeyup="mayus(this);" title="Banco" data-toggle="tooltip" type="text" name="editarCuentaBancaria" id="editarCuentaBancaria" placeholder="Banco" />
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text" rel="txtTooltipClaveBancaria" title="Clave Interbancaria" data-toggle="tooltip" name="editarCuentaBancariaAdicional" id="editarCuentaBancariaAdicional" placeholder="Clave Bancaria" />
                                </div>
                            </div>
                            <!-- fin Cuenta-->
                            <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="input-group mb-3">
                                <!--<div class="panel">SUBIR FOTO</div>-->
                                <label>Peso máximo de la foto 2MB</label></br>
                                    
                                    <!--<p class="help-block">Peso máximo de la foto 2MB</p>-->
                            </div>
                            <div class="input-group mb-3">
                            <input type="file" class="nuevaFoto" name="editarFoto" id="editarFoto">
                            </div>
                                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            </br>
                        <!--</div>-->
                            <br>
                                <input type="button" name="previous" class="previous-forma btn btn-default" value="Previous" />
                                <input type="button" name="next" class="next-forma btn btn-info" value="Next" />
                            </fieldset>
                            <fieldset>
                            <h2>Step 3: Cuotas Usuario</h2>
                            <!-- Grupo de imput -->
                            <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipClaveComision" title="Limite Asegurable" data-toggle="tooltip" type="text" name="editarComision" id="editarComision" placeholder="Limite Asegurable" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipClaveComision" title="Comision" data-toggle="tooltip" type="text" name="editarComisionAsociado" id="editarComisionAsociado" placeholder="Comision %" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipAbreviatura" onkeyup="mayus(this);" title="Abreviatura" data-toggle="tooltip" type="text" name="editarAbreviatura"  id="editarAbreviatura" placeholder="Abreviatura" />
                                </div>
                            </div>
                            <!-- fin de grupo input-->
                            <!-- Grupo de imput -->
                            <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipCuotaRot" title="Cuota Rot" data-toggle="tooltip" type="text" name="editarCuota_Rot" id="editarCuota_Rot" placeholder="Cuota ROT y Robo" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipClaveBancaria" title="Cuota TR" data-toggle="tooltip" type="text" name="editarCuota_TR"  id="editarCuota_TR" placeholder="Cuota TR" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipCuotaBasica" title="Cuota TR + VT" data-toggle="tooltip" type="text" name="editarCuotaBasica" id="editarCuotaBasica" placeholder="Cuota TR + VT" />
                                </div>
                            </div>
                            <!-- fin de grupo input-->
                              <!-- Grupo de imput -->
                              <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" title="Cuota Contenedor" data-toggle="tooltip" type="text" name="editarCuota_Contenedor" id="editarCuota_Contenedor" placeholder="Cuota Contenedor" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" title="Prima Minima" data-toggle="tooltip" type="text" name="editarPrimaMinima" id="editarPrimaMinima" placeholder="Prima Minima" />
                                </div>
                                <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor"  title="Derecho Certificado" data-toggle="tooltip" type="text" name="editarDerechoCertificado" id="editarDerechoCertificado" placeholder="Derecho Certificado" />    
                                </div>
                            </div>
                            <!-- fin de grupo input-->
                            </br>
                            <input type="button" name="previous" class="previous-forma btn btn-default" value="Previous" />
                            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                            </fieldset>
                    </div>                
                    <?php

                    $editarNombre = new ControladorUsuarios();
                    $editarNombre -> ctrEditarUsuario();
                    ?>
                </div>
                <!-- termina el modal body -->
          </form>
      </div>
      <!-- termina modal content -->
   </div>
</div>  
   <!-- fin modal dialog -- >


