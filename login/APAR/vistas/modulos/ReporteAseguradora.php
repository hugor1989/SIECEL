
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reporte Aseguradora</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Reporte Aseguradora</li>
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
                    <table id="TB_Reporte" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Numero Poliza</th>
                          <th>№ de ID EMBARQUE</th>
                          <th>Beneficiario</th>
                          <th>ID Asociado</th>
                          <th>AGENTE ASOCIADO</th>
                          <th>ASEGURADORA</th>
                          <th>ID MCIA</th>
                          <th>DESCRIPCIÓN DE MERCANCIA (CATÁLOGO)</th>
                          <th>Gpo. MERCANCIA</th>
                          <th>Carga Full</th>
                          <th>Protocolo</th>
                          <th>Valor Seguro</th>
                          <th>Contenedor Amaparado</th>
                          <th>Continuación de Viaje</th>
                          <th>Riesgos CUBIERTOS</th>
                          <th>Medio de TRANSPORTE</th>
                          <th>Transportista</th>
                          <th>ORIGREN</th>
                          <th>DESTINO</th>
                          <th>País origen de COBERTURA</th>
                          <th>País Destino de la COBERTURA</th>
                          <th>Mes</th>
                          <th>Fecha Solicitud</th>
                          <th>Fecha Cobertura</th>
                          <th>Siniestro</th>
                          <th>№ Sin.</th>
                          <th>Fech. Sin.</th>
                          <th>S.A Contenedor 1</th>
                          <th>S.A. Contenedor 2</th>
                          <th>Valor Contenedores</th>
                          <th>P.N. Contenedores</th>
                          <th>P.N. Mercancia + Contenedores</th>
                          <th>Cuota</th>
                          <th>Prima Neta</th>
                          <th>Valor Aseguradora</th>
                        </tr>
                      </thead>
                        <tbody>
                        <?php

                            $item = null;
                            $valor = null; 

                           
                              $reporte = ControladorPersona::ctrMostrarReporteAseguradora($item, $valor);

                            foreach ($reporte as $key => $value){

                            echo ' <tr>
                                    <td>'.$value["NumeroPoliza"].'</td>
                                    <td>'.$value["IDEmbarque"].'</td>
                                    <td>'.$value["Beneficiario"].'</td>
                                    <td>'.$value["IdAsociado"].'</td>
                                    <td>'.$value["AgenteAsociad"].'</td>
                                    <td>Chubb Seguros México, S.A.</td>
                                    <td>'.$value["Mercancia"].'</td>
                                    <td>'.$value["DescripcionMercancia"].'</td>
                                    <td>'.$value["Grupo"].'</td>
                                    <td>'.$value["Gargafull"].'</td>
                                    <td>'.$value["Protocolo"].'</td>
                                    <td>'.$value["ValorSeguro"].'</td>
                                    <td>'.$value["ContenedorAmaparado"].'</td>
                                    <td>'.$value["ContinuacionViaje"].'</td>
                                    <td>'.$value["RiesgosCubiertos"].'</td>
                                    <td>'.$value["MedioTransporte"].'</td>
                                    <td>'.$value["Transportista"].'</td>
                                    <td>'.$value["Origen"].'</td>
                                    <td>'.$value["Destino"].'</td>
                                    <td>'.$value["PaisOrigenCobertura"].'</td>
                                    <td>'.$value["PaisDestinoCobertura"].'</td>
                                    <td>'.$value["Mes"].'</td>
                                    <td>'.$value["FechaSolicitud"].'</td>
                                    <td>'.$value["FechaInicioCobertura"].'</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>'.$value["SAContenedoruno"].'</td>
                                    <td>'.$value["SAContenedordos"].'</td>
                                    <td>'.$value["ValorContenedor"].'</td>
                                    <td>'.$value["PMContenedor"].'</td>
                                    <td>'.$value["PMCNPM"].'</td>
                                    <td>'.$value["Cuota"].'</td>
                                    <td>'.$value["Primeneta"].'</td>
                                    <td>'.$value["SumaAsegurada"].'</td>
                                    
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


<!-- Start Filter Box -->

<!-- End Filter Box -->

