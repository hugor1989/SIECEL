<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Registrar Cliente</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
      <form role="form" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
        <div class="row">
          <div class="col-6 ">
                <div class="card card-default">
                    <div class="card-header">
                         <input type="hidden" name="tipopersona" id="tipopersona" value="2">
                         <input type="hidden" name="idasociado" id="idasociado" value=<?php echo $_SESSION["id"]?> >
                        <h3 class="card-title"><strong>Cliente</strong></h3>
                    </div>
                    <div class="card-body">
                    
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating" onkeyup="mayus(this);" 
                                  oninput="validarInput(this.value)"  name="nuevoRFC" id="nuevoRFC">
                            <label for="usr5">RFC</label>
                        </div>
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating" onkeyup="mayus(this);" 
                                  oninput="validarInput(this.value)"  name="nuevoNombre" id="nuevoNombre">
                            <label for="usr5">Razon Social</label>
                        </div>
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating"
                            name="nuevoEmail" id="nuevoEmail" >
                            <label for="usr7">Email</label>
                        </div>
                        <select class="form-control select2" id="nuevoRegimenFiscal" 
                                name="nuevoRegimenFiscal" style="width: 100%;" required>
                            <option value="">Seleccione Regimen Fiscal</option>
                            <?php
                                $perfil = ControladorEstados::ctrMostrarRegimenFiscal($item, $valor);

                                foreach ($perfil as $key => $value){
                            ?>
                                <option value="<?php echo $value["Id"] ?>"><?php echo $value["Descripcion"] ?></option>
                            <?php
                               }
                            ?>
                        </select>
                              </br>
                        <select class="form-control select2" id="nuevoUsoCFDI" 
                                name="nuevoUsoCFDI" style="width: 100%;" required>
                            <option value="">Seleccione Uso de CFDI</option>
                            <?php
                                $perfil = ControladorEstados::ctrMostrarUSOCFDI($item, $valor);

                                foreach ($perfil as $key => $value){
                            ?>
                                <option value="<?php echo $value["Id"] ?>"><?php echo $value["Descripcion"] ?></option>
                            <?php
                               }
                            ?>
                        </select>    
                          
                    </div>
                    
                    <div class="card-footer">
                    </div>
                   
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Contacto</strong></h3>
                    </div>
                    <div class="card-body">
                    
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating" onkeyup="mayus(this);" 
                                    id="nuevoContactoNombre" name="nuevoContactoNombre" >
                            <label for="usr1">Nombre Contacto</label>
                        </div>
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating" onkeyup="mayus(this);" 
                                    id="nuevoContactoPuesto" name="nuevoContactoPuesto" >
                            <label for="usr2">Puesto</label>
                        </div>
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating"
                                    name="nuevoContactoEmail" id="nuevoContactoEmail" >
                            <label for="usr3">Email</label>
                        </div>
                        <div class="form-group floating" style='padding:10px'>
                            <input type="text" class="form-control floating"
                                    name="nuevoContactoTelefono" id="nuevoContactoTelefono" >
                            <label for="usr4">Telefono</label>
                        </div> 
                        <div class="form-group floating" style='padding:10px'>
                           
                                <div class="file-drop-area">
                                    <span class="choose-file-button"><strong>SELECCIONAR IMAGEN DE REGISTRO DE CONSULTA OFAC</strong></span>
                                   </br>
                                    <input class="file-input fotoofac" type="file" id="fotoofac" name="fotoofac" multiple>
                                    
                                </div>
                                <img  class="img-thumbnail previsualizar" width="150px">
                        </div>      
                          
                    </div>
                    
                    <div class="card-footer">
                        <div class="button-row d-flex mt-4">
                            <button type="submit" id="Btn_GuardarCliente" class="btn btn-success ml-auto">Guardar Cliente</button>
                        </div>
                    </div>
                    <?php
                      $crearPersona = new ControladorPersona();
                      $crearPersona -> ctrCrearPersona();
                    ?>
                </div>
          </div>
          <div class="col-6 ">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Direccion Fiscal</strong></h3>
                    </div>
                    <div class="card-body">
                       <!--  <div class="form-group floating" style='padding:10px'> -->
                          <input type="text" 
                                 class="form-control floating" 
                                 onkeyup="mayus(this);" 
                                 name="nuevoCalle" 
                                 id="nuevoCalle"  
                                 disabled required>
                          <label for="usr">Calle</label>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                              <input type="text" class="form-control floating" 
                                     onkeyup="mayus(this);"  
                                     id="nuevoNumeroExterior" name="nuevoNumeroExterior"
                                     disabled >
                              <label for="usr">Numero Exterior</label>
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <input class="form-control floating" 
                                       tyep="text" rel="txtTooltipEmail"  onkeyup="mayus(this);"
                                       title="Email" name="nuevoNumeroInterior" id="nuevoNumeroInterior" 
                                        disabled />
                                 <label for="usr">Numero Interior</label>
                            </div>
                        </div>
                        <!-- termina row -->
                        <input type="text" 
                                 class="form-control floating" 
                                 onkeyup="mayus(this);" 
                                 name="nuevoColonia" 
                                 id="nuevoColonia"  
                                 disabled required>
                          <label for="usr">Colonia</label>
                          <input type="text" 
                                 class="form-control floating" 
                                 onkeyup="mayus(this);" 
                                 name="nuevoLocalidad" 
                                 id="nuevoLocalidad"  
                                 required>
                          <label for="usr">Localidad</label>

                          <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                 <select class="form-control select2"  id="nuevoEstado" name="nuevoEstado" onchange="selectEstados();" style="width: 100%;" required>
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
                            <div class="col-12 col-md-6 mt-4">
                                <select class="form-control select2" id="nuevoMunicipio" name="nuevoMunicipio" style="width: 100%;" required>
                                    <option value="">Seleccione Municipio</option>
                                </select>
                            </div>
                        </div>
                        </br>
                        <input type="text" 
                                 class="form-control floating" 
                                 onkeyup="mayus(this);" 
                                 name="nuevoCP" 
                                 id="nuevoCP"  
                                 required>
                          <label for="usr">Codigo Postal</label>

                          <input type="text" 
                                 class="form-control floating" 
                                 onkeyup="mayus(this);" 
                                 name="nuevoPais" 
                                 id="nuevoPais"
                                 value="MEXICO">
                          <label for="usr">Pais</label>
                          
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- fin row --> 
      </form>        
    </div>    
      <!-- /.container-fluid -->
  </section>

</div>


