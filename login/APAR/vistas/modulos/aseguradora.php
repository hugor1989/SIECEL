<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Aseguradora</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Aseguradora</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAseguradora">
                    Agregar Aseguradora
                </button>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered tablaAseguradora">
                      <thead>
                        <tr>
                          <th>Descripcion</th>
                          <th>RFC</th>
                          <th>Acciones</th>
                          <th>Cuota ROT + ROBO</th>
                          <th>Cuota TR</th>
                          <th>Cuota TR + VT</th>
                          <th>Cuota Contenedor</th>
                          <th>Condiciones Gnles.</th>
                          <th>Telefono</th>
                          <th>Logo</th>
                          <th>Numero Poliza</th>
                          <th>Activo</th>
                          
                        </tr>
                      </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $aseguradora = ControladorAseguradora::ctrMostrarAseguradora($item, $valor);

                      
                        foreach ($aseguradora as $key => $value){

                        
                          echo ' <tr>
                                  <td>'.$value["Descripcion"].'</td>
                                  <td>'.$value["RFC"].'</td> ';
                                  echo '
                                  <td>

                                    <div class="btn-group">
                                      
                                      <button class="btn btn-outline-warning btn-block btn-sm btnEditarAseguradora" idAseguradora="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarAseguradora"><i class="fa fa-edit"></i></button>

                                    </div>  

                                  </td>

                                    ';
                          echo  ' <td>'.$value["Cuota_Rot"].'</td>
                                  <td>'.$value["Cuota_TR"].'</td>
                                  <td>'.$value["VT"].'</td>
                                  <td>'.$value["Cuota_Contenedor"].'</td>
                                  <td>'.$value["CondicionesGenerales"].'</td>
                                  <td>'.$value["Telefono"].'</td>
                                  <td>'.$value["Logo"].'</td>
                                  <td>'.$value["NumeroPoliza"].'</td>
                                  ';

                                  if($value["Activo"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivAseguradora" idAseguradora="'.$value["Id"].'" estadoAseguradora="0">Activado</button></td>';

                                  }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivAseguradora" idAseguradora="'.$value["Id"].'" estadoAseguradora="1">Desactivado</button></td>';

                                  }             

                                  echo '
                                  
                                </tr>';}
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
MODAL AGREGAR ASEGURADORA
======================================-->

<div class="modal fade" id="modalAgregarAseguradora" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Agregar Aseguradora</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
               <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA DESCRIPCION -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoDescripcion" rel="txtTooltipNombre" onkeyup="mayus(this);" title="Nombre de Aseguradora" placeholder=" Nombre de Aseguradora" required>
                      
                    </div>
                    <!-- ENTRADA PARA EL RFC -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoRFC" rel="txtTooltipRFC" onkeyup="mayus(this);" title="RFC" placeholder=" RFC" id="nuevoEmail" required>
                    </div>
                    <!-- Termina RFC -->
                     <!-- ENTRADA PARA CUOTA BASICA -->
                     <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoCuotaBasica" rel="txtTooltipCuotaBasica" onkeyup="mayus(this);" title="Cuota Basica" placeholder=" Cuota Basica" required>
                   
                    </div>
                    <!-- ENTRADA PARA EL Cuota_Rot -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoCuota_Rot" rel="txtTooltipCuotaRot" onkeyup="mayus(this);" title="Cuota ROT" placeholder=" Cuota Rot" id="Cuota_Rot" required>
                    </div>
                    <!-- ENTRADA PARA EL Cuota_TR -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoCuota_TR" placeholder=" Cuota TR" rel="txtTooltipCuotaRT" onkeyup="mayus(this);" title="Cuota RT" id="nuevoCuota_TR" required>
                      
                    </div>
                    <!-- ENTRADA PARA EL Cuota_Contenedor -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="nuevoCuota_Contenedor" placeholder=" Cuota Contenedor" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Cuota contenedor" id="nuevoCuota_Contenedor" required>
                    </div>
                    <!-- termina contenedor-->
                    <div class="row">
                        <div class="col-4 input-group mb-3">
                          <input type="text" class="form-control" name="nuevoTelefono" placeholder="Telefono" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Telefono" id="nuevoTelefono" required>
                        </div>
                        <div class="col-4 input-group mb-3">
                        <input type="text" class="form-control" name="nuevoDireccion" placeholder="Direccion" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Direccion" id="nuevoDireccion" required>
                        </div>
                        <div class="col-4 input-group mb-3">
                        <input type="text" class="form-control" name="nuevoPoliza" placeholder="Poliza" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Poliza" id="nuevoPoliza" required>
                        </div>
                    </div>
                    <!-- Aqui termina row -->
                    
               
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
                    <div class="input-group mb-3">
                        <label>Subir Archivo PDF</label></br>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="pdf_file" name="pdf_file">
                    </div>
                    
                              </br>
                    
                    <!-- Aqui termina row -->
                  </div>
                </div>     
				      <!--<div>-->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Guardar Aseguradora</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                <?php

                  $crearAseguradora = new ControladorAseguradora();
                   $crearAseguradora -> ctrCrearAseguradora();
                ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR aseguradora
======================================-->
<div class="modal fade" id="modalEditarAseguradora" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="background:#3c8dbc; color:white">
                <h4 class="modal-title">Editar Aseguradora</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                  <div class="box-body">

                    <!-- ENTRADA PARA EL DESCRIPCION -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="editarDescripcion" rel="txtTooltipNombre" onkeyup="mayus(this);" title="Nombre de Aseguradora" id="editarDescripcion" placeholder="Nombre de Aseguradora" required>
                      <input type="hidden" name="id" id="id">
                      
                    </div>
                    <!-- ENTRADA PARA EL RFC -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="editarRFC" rel="txtTooltipRFC" onkeyup="mayus(this);" title="RFC" placeholder=" RFC" id="editarRFC" required>
                      
                    </div>
                    <!-- Termina RFC -->               
                     <!-- ENTRADA PARA CUOTA BASICA -->
                     <div class="input-group mb-3">
                      <input type="text" class="form-control" name="editarCuotaBasica" rel="txtTooltipCuotaBasica" onkeyup="mayus(this);" title="Cuota Basica" placeholder=" Cuota Basica" id="editarCuotaBasica" >
                     
                    </div>
                    <!-- ENTRADA PARA EL Cuota_Rot -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="editarCuota_Rot" rel="txtTooltipCuotaRot" onkeyup="mayus(this);" title="Cuota ROT" placeholder=" Cuota Rot" id="editarCuota_Rot" >
                     
                    </div>
                    <!-- ENTRADA PARA EL Cuota_TR -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="editarCuota_TR" rel="txtTooltipCuotaRT" onkeyup="mayus(this);" title="Cuota RT" placeholder=" Cuota TR" id="editarCuota_TR" >
                      
                    </div>
                    <!-- ENTRADA PARA EL Cuota_Contenedor -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="editarCuota_Contenedor" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Cuota Contenedor" placeholder=" Cuota Contenedor" id="editarCuota_Contenedor" >
                     
                    </div>
                    <!-- termina contenedor-->
                    <div class="row">
                        <div class="col-4 input-group mb-3">
                          <input type="text" class="form-control" name="editarTelefono" placeholder="Telefono" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Telefono" id="editarTelefono" required>
                        </div>
                        <div class="col-4 input-group mb-3">
                          <input type="text" class="form-control" name="editarDireccion" placeholder="Direccion" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Direccion" id="editarDireccion" required>
                        </div>
                        <div class="col-4 input-group mb-3">
                        <input type="text" class="form-control" name="editarPoliza" placeholder="Poliza" rel="txtTooltipCuotaContenedor" onkeyup="mayus(this);" title="Poliza" id="editarPoliza" required>
                        </div>
                    </div>
                    <!-- Aqui termina row -->
                    
               
                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="input-group mb-3">
                        <label>Subir Logotipo</label></br>
                        <label>Peso máximo de la foto 2MB</label></br>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="editarFoto" name="editarFoto">
                        <input type="hidden" id="rutaactual" name="rutaactual">
                    </div>
                    <img id="img_tag_id" name="img_tag_id" src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                              </br>
                            <br>
                    
                    <div class="input-group mb-3">
                        <label>Subir Archivo PDF</label></br>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="editarpdf_file" name="editarpdf_file">
                        <input type="hidden" id="rutaactualpdf" name="rutaactualpdf">
                    </div>
                    
                              </br>
                    <!-- Aqui termina row -->
					        </div>
                </div>
              
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Actualizar Aseguradora</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
                <?php

                    $editarAseguradora = new ControladorAseguradora();
                    $editarAseguradora -> ctrEditarAseguradora();
                ?>
             </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->



