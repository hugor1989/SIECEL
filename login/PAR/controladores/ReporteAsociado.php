
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reporte Asociado</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Reporte Asociado</li>
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
                          <th>Mes</th>
                          <th>Numero Poliza</th>
                          <th>Fecha Solicitud</th>
                          <th>Fecha Cobertura</th>
                          <th>№ de ID EMBARQUE</th>
                          <th>Beneficiario</th>
                          <th>Mercancias</th>
                          <th>Carga Full</th>
                          <th>Protocolo</th>
                          <th>Valor Seguro</th>
                          <th>Valor Aseguradora</th>
                          <th>Cuota</th>
                          <th>Prima Neta</th>
                          <th>Contenedor Amaparado</th>
                          <th>Valor Contenedores</th>
                          <th>P.N. Contenedores</th>
                          <th>P.N. Mercancia + Contenedores</th>
                          <th>Medio de TRANSPORTE</th>
                          <th>Continuación de Viaje</th>
                          <th>Riesgos CUBIERTOS</th>
                          <th>ORIGREN</th>
                          <th>DESTINO</th>
                          <th>Siniestro</th>
                          <th>№ Sin.</th>
                          <th>Fech. Sin.</th>
                          <th>País origen de COBERTURA</th>
                          <th>País Destino de la COBERTURA</th>
                          <th>Transportista</th>
                          <th>ID MCIA</th>
                          <th>DESCRIPCIÓN DE MERCANCIA (CATÁLOGO)</th>
                          <th>Gpo. MERCANCIA</th>
                          <th>S.A Contenedor 1</th>
                          <th>S.A. Contenedor 2</th>
                          <th>ID Asociado</th>
                          <th>AGENTE ASOCIADO</th>
                          <th>ASEGURADORA</th>
                          <th>Cuota ASOC.</th>
                          <th>PN ASOC.</th>
                          <th>Derecho de Certificado</th>
                          <th>Facturación P.N. APAR</th>
                          <th>I.V.A. APAR</th>
                          <th>PRIMA TOTAL APAR</th>
                        </tr>
                      </thead>
                        <tbody>
                       
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
                                <input class="multisteps-form__input form-control" type="text" name="editarEmail" id="editarEmail" placeholder="Email" />
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

<!-- Start Filter Box -->
<div id="filter-box" class="text-center">
    <div class="jumbotron">
        <div class="container">
            <form action="" method="get">
                <div class="row">
                                        <div class="col-md-4 col-md-offset-2 form-group-lg">
                        <input class="form-control date" type="date" name="from" value="" placeholder="From" readonly>
                    </div>
                    <div class="col-md-4 form-group-lg">
                        <input class="form-control date" type="date" name="to" value="" placeholder="To" readonly>
                    </div>
                </div>
                <div class="well r-50">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <a href="/admin/report_sell_itemwise.php?filter=yes&ftype=today&from=2021-09-15&to=2021-09-15" class="btn btn-primary btn-block r-50" >HOY</a>
                        </div>
                         <div class="col-md-2">
                            <a href="/admin/report_sell_itemwise.php?filter=yes&ftype=week&from=2021-09-08&to=2021-09-15" class="btn btn-success btn-block r-50" >ULTIMOS 7 DIAS</a>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/report_sell_itemwise.php?filter=yes&ftype=month&from=2021-08-16&to=2021-09-15" class="btn btn-warning btn-block r-50" >ULTIMOS 30 DIAS</a>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/report_sell_itemwise.php?filter=yes&ftype=year&from=2020-09-15&to=2021-09-15" class="btn btn-info btn-block r-50" >ULTIMO AÑO</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-block btn-lg btn-danger" type="submit">
                            <span class="fa fa-search"></span> FILTRAR                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="close-filter-box">
        <span class="fa fa-angle-up" title="Close"></span>
    </div>
</div>
<!-- End Filter Box -->

