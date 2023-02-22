
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
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
            <div class="col-md-12">
                <div class="card card-default">
                    <form role="form" method="post" enctype="multipart/form-data" 
                        id="register_form" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                        <div class="card-header">
                            <h3 class="card-title">Registro de Usuarios</h3>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    <fieldset>
                        <h2>Step 1: Datos Inicio Sesion</h2>
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <input type="text" 
                                class="form-control" 
                                rel="txtTooltipNombre" 
                                title="Nombre Usuario" 
                                data-toggle="tooltip" 
                                name="nuevoNombre" 
                                id="nuevoNombre" 
                                placeholder="Nombre"
                                onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Email -->
                        <div class="input-group mb-3"> 
                            <input type="email" class="form-control" 
                                rel="txtTooltipEmail" title="Email" 
                                oninput="ValidateEmail(this.value);" 
                                onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                data-toggle="tooltip" 
                                name="nuevoEmail" 
                                id="nuevoEmail" 
                                placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                            <p id="emailOK"></p>
                        </div>
                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="input-group mb-3">
                            <input type="text"
                                    class="form-control" 
                                    rel="txtTooltipNombre" 
                                    title="Usuario Sistema" 
                                    data-toggle="tooltip" 
                                    name="nuevoUsuario" 
                                    id="nuevoUsuario" 
                                    placeholder="Usuario" 
                                    autocomplete="off"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <!--  FIN EMAIL -->
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input ID="txtPassword" name="nuevoPassword"  type="Password" Class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary" 
                                            type="button" onclick="mostrarPassword();"> 
                                            <span class="fa fa-eye-slash icon"></span> 
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- fin de password -->
                        <!-- ENTRADA PARA EL PERFIL -->
                        
                            <div class="input-group mb-3">
                                <select class="form-control" rel="txtTooltipPerfil" title="Pefil de Usuario"  
                                        data-toggle="tooltip" name="nuevoPerfil" id="nuevoPerfil" >
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
                                
                            </div>
                        
                        <!-- -->
                                <!-- ENTRADA PARA ASEGURADORA -->
                                
                            <div class="input-group mb-3">
                                <select class="form-control" rel="txtTooltipPerfil" title="Aseguradora"  
                                        data-toggle="tooltip" name="nuevoAseguradora" id="nuevoAseguradora" >
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
                            </div>
                        
                        <!-- -->
                        </br>
                        <input type="button" class="next-form btn btn-info" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2> Step 2: Datos Empresa</h2>
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" 
                                    rel="txtTooltipEmpresa"  
                                    title="Empresa" 
                                    data-toggle="tooltip" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    type="text" 
                                    name="nuevoEmpresa" 
                                    id="nuevoEmpresa" 
                                    placeholder="Empresa" />
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control"
                                    rel="txtTooltipRFC" 
                                    title="RFC" 
                                    data-toggle="tooltip" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    oninput="validarInput(this.value);" 
                                    type="text" 
                                    name="nuevoRFC" 
                                    id="nuevoRFC" 
                                    placeholder="RFC" />
                                <p id="demo"></p>        
                            </div>
                        </div>
                        <!-- Fin Empresa-->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" rel="txtTooltipCalle" 
                                    title="Calle" data-toggle="tooltip"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    type="text" name="nuevoCalle" id="nuevoCalle" placeholder="Calle" />
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control" rel="txtTooltipNumeroExterior" 
                                    title="Numero Exterior" data-toggle="tooltip"
                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                        type="text" name="nuevoNumeroExterior" id="nuevoNumeroExterior" placeholder="NumeroExterior" />
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control" rel="txtTooltipNumeroInterior" 
                                        title="Numero Interior" data-toggle="tooltip" 
                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                        type="text" name="nuevoNumeroInterior" id="nuevoNumeroInterior" placeholder="Numero Interior" />
                            </div>
                        </div>
                        <!-- Fin calle-->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" rel="txtTooltipColonia" 
                                    title="Colonia" data-toggle="tooltip" type="text" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    name="nuevoColonia" id="nuevoColonia" placeholder="Colonia" />
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" rel="txtTooltipPais" 
                                    title="Pais" data-toggle="tooltip" type="text" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    name="nuevoPais" id="nuevoPais" placeholder="Pais" value="MEXICO" />
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" rel="txtTooltipCP" 
                                    title="Codigo Postal" data-toggle="tooltip" type="text" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    name="nuevoCP"  id="nuevoCP" placeholder="Codigo Postal" />
                            </div>
                        </div>
                        <!-- Fin Colonia-->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <select class="form-control select2"  id="nuevoEstado" name="nuevoEstado" onchange="selectEstados();" style="width: 100%;">
                                    <option value="">Seleccione Estado</option>
                                    <?php
                                        $perfil = ControladorEstados::ctrMostrarEstados($item, $valor);

                                        foreach ($perfil as $key => $value){

                                        ?>
                                        <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>

                                        <?php
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <select class="form-control select2" id="nuevoMunicipio" name="nuevoMunicipio" style="width: 100%;">
                                        <option value="">Seleccione Estado</option>
                                </select>
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" rel="txtTooltipGiro" 
                                    title="Localidad" data-toggle="tooltip" type="text"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    name="nuevoLocalidad" id="nuevoLocalidad"  placeholder="Localidad" />
                            </div>
                        </div>
                        <!-- fin Pais-->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipGiro" 
                                    title="Giro" data-toggle="tooltip" type="text"
                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                        name="nuevoGiro" id="nuevoGiro"  placeholder="Giro" />
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipEmailAdicional" 
                                    title="Email Empresa" data-toggle="tooltip"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    type="text" name="nuevoEmailAdicional" id="nuevoEmailAdicional" placeholder="Email Empresa" />
                            </div>
                        </div>
                        <!-- fin Giro-->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <!--<input class="multisteps-form__input form-control" rel="txtTooltipTelefono" title="Telefono" data-toggle="tooltip" onkeyup="mayus(this);" type="text" name="nuevoTelefono" id="nuevoTelefono" placeholder="Telefono" />-->
                                <input type="text" class="multisteps-form__input form-control" rel="txtTooltipTelefono"
                                    title="Telefono" data-toggle="tooltip" name="nuevoTelefono"
                                    id="nuevoTelefono" data-inputmask='"mask": "99 999-99999"' data-mask>
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input type="text" class="multisteps-form__input form-control" rel="txtTooltipTelefonoCelular" 
                                    title="Celular" data-toggle="tooltip" name="nuevoCelular" 
                                    id="nuevoCelular" data-inputmask='"mask": "99 999-99999"' data-mask>
                            </div>
                        </div>
                        <!-- fin Telefono-->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipContacto" 
                                    title="Contacto" data-toggle="tooltip" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                        type="text" name="nuevoContacto" id="nuevoContacto" placeholder="Nombre Contacto" />
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipNextel" 
                                    title="Nextel" data-toggle="tooltip" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    type="text" name="nuevoNextel" id="nuevoNextel" placeholder="Nextel" />
                            </div>
                        </div>
                        <!-- fin Nextel-->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" rel="txtTooltipBanco" 
                                    title="Banco" data-toggle="tooltip" type="text" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    name="nuevoCuentaBancaria" id="nuevoCuentaBancaria" placeholder="Banco" />
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="multisteps-form__input form-control" type="text" rel="txtTooltipClaveBancaria" 
                                    title="Clave Interbancaria" 
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    data-toggle="tooltip" name="nuevoCuentaBancariaAdicional" id="nuevoCuentaBancariaAdicional" placeholder="Clave Bancaria" />
                            </div>
                        </div>
                        </br>
                        <!-- fin Cuenta-->
                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="input-group mb-3">
                            <label>Subir Logotipo</label></br>
                            <label>Peso máximo de la foto 2MB</label></br>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                        </div>
                        <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                </br>
                                <br>
                            <input type="button" name="previous" class="previous-form btn btn-default" value="Atras" />
                            <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                    </fieldset>
                    <fieldset>
                        <h2>Step 3: Cuotas Usuario</h2>
                        <!-- Grupo de imput -->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipClaveComision" 
                                    title="Limite Asegurable" data-toggle="tooltip" type="text" 
                                    name="nuevoComision" id="nuevoComision" placeholder="Limite Asegurable %"  required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-percent"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <div class="input-group mb-3">
                                        <input class="multisteps-form__input form-control" rel="txtTooltipClaveComision" 
                                        title="Comision" data-toggle="tooltip" type="text" 
                                        name="nuevoComisionAsociado" id="nuevoComisionAsociado" placeholder="Comision %"  required/>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-percent"></span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" rel="txtTooltipAbreviatura" 
                                    maxlength="4"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" 
                                    title="Abreviatura de 4 Caracteres" data-toggle="tooltip" type="text" 
                                    name="nuevoAbreviatura"  id="nuevoAbreviatura" placeholder="Abreviatura" required />
                            </div>
                        </div>
                        <!-- fin de grupo input-->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
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
                                            name="nuevoCuota_TR"  id="nuevoCuota_TR" placeholder="Cuota TR" required/>
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
                                        name="nuevoCuotaBasica" id="nuevoCuotaBasica" placeholder="Cuota TR + VT" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-percent"></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN INPUT -->
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                        <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="Cuota Contenedor" data-toggle="tooltip"  type="numeric" 
                                        name="nuevoCuota_Contenedor" id="nuevoCuota_Contenedor" placeholder="Cuota Contenedor" required/>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-percent"></span>
                                            </div>
                                        </div> 
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <div class="input-group mb-3">
                                        <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                            title="Prima Minima" data-toggle="tooltip" type="text" 
                                            name="nuevoPrimaMinima" id="nuevoPrimaMinima" placeholder="Prima Minima" required/>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-percent"></span>
                                            </div>
                                        </div> 
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                <div class="input-group mb-3">
                                    <input class="multisteps-form__input form-control" rel="txtTooltipCuotaContenedor" 
                                        title="Derecho Certificado" data-toggle="tooltip" type="text" 
                                        name="nuevoDerechoCertificado" id="nuevoDerechoCertificado" placeholder="Derecho Certificado" required/>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fa fa-percent"></span>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
                        <button type="submit" class="btn btn-primary" name="submit">Guardar Usuario</button>
                    </fieldset>
                    <?php

                        $nuevoNombre = new ControladorUsuarios();
                        $nuevoNombre -> ctrCrearUsuario();
                    ?>
                </form>
                </div>
            </div>
        </div>
        
            
            <!--<div class="alert alert-success hide"></div>-->
            
    </div>    
      <!-- /.container-fluid -->
  </section>

</div>


