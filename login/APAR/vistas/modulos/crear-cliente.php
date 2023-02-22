
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
          <div class="col-md-12">
            <div class="card card-default">
              <form role="form" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Cliente</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <input type="text" class="form-control" onkeyup="mayus(this);" rel="txtTooltipNombre" title="Nombre" id="nuevoNombre" name="nuevoNombre" placeholder="Nombre">
                                <input type="hidden" name="tipopersona" id="tipopersona" value="2">
                                <input type="hidden" name="idasociado" id="idasociado" value=<?php echo $_SESSION["id"]?> >
                            </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mt-4">
                                        <input class="multisteps-form__input form-control" onkeyup="mayus(this);" oninput="validarInput(this.value)" rel="txtTooltipRFC" title="RFC" type="text" name="nuevoRFC" id="nuevoRFC" placeholder="RFC" />
                                        <p id="demo"></p>
                                        <div id="result-username"></div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-4">
                                        <input class="multisteps-form__input form-control" tyep="email" rel="txtTooltipEmail" title="Email" name="nuevoEmail" id="nuevoEmail" oninput="ValidateEmail(this.value)" placeholder="Email" disabled />
                                        <p id="emailOK"></p>
                                    </div>
                                </div>
                                <!-- fin Pais-->
                                <!-- Fin Empresa-->
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text" rel="txtTooltipCalle" title="Calle" name="nuevoCalle" id="nuevoCalle" placeholder="Calle" disabled/>
                                    </div>
                                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text" 
                                               rel="txtTooltipNumeroExterior" title="Numero Exterior" 
                                               name="nuevoNumeroExterior" id="nuevoNumeroExterior" placeholder="NumeroExterior" disabled />
                                    </div>
                                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                    <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text" 
                                               rel="txtTooltipNumeroInterior" title="Numero Interior"
                                               name="nuevoNumeroInterior" id="nuevoNumeroInterior" placeholder="Numero Interior" disabled />
                                    </div>
                                </div>
                                <!-- Fin calle-->
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text" 
                                               rel="txtTooltipColonia" title="Colonia" name="nuevoColonia" 
                                               id="nuevoColonia" placeholder="Colonia" disabled />
                                    </div>
                                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
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
                                            <option value="">Seleccione Municipio</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Fin Colonia-->
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6"> 
                                    <input class="multisteps-form__input form-control" rel="txtTooltipGiro" 
                                           title="Localidad" data-toggle="tooltip" type="text"
                                           onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                           name="nuevoLocalidad" id="nuevoLocalidad"  placeholder="Localidad"/>
                                    </div>
                                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                        <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text" 
                                               rel="txtTooltipCP" title="Codigo Postal" name="nuevoCP" id="nuevoCP" 
                                               placeholder="Codigo Postal" disabled/>
                                    </div>
                                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                        <input class="multisteps-form__input form-control" onkeyup="mayus(this);" type="text"
                                               rel="txtTooltipPais" title="Pais" name="nuevoPais" id="nuevoPais" 
                                              value="MEXICO" placeholder="Pais" disabled/>
                                    </div>
                                </div>
                                <!-- fin Pais-->
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="button-row d-flex mt-4">
                            <!--button class="btn btn-success ml-auto" type="button" title="Send">Send</button>-->
                            <button type="submit" id="Btn_GuardarCliente" class="btn btn-success ml-auto">Guardar Cliente</button>
                        </div>
                    </div>
                    <?php
                      $crearPersona = new ControladorPersona();
                      $crearPersona -> ctrCrearPersona();
                    ?>
                </form>    
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- fin row -->         
    </div>    
      <!-- /.container-fluid -->
  </section>

</div>


