<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrar Paises</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Paises</li>
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
                <!--<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMercancia">
                    Agregar Mercancia
                </button>-->
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped TablaPais">
                      <thead>
                        <tr>
                          <th>Clave</th>
                          <th>Descripcion</th>
                          <th>Estatus</th>
                        </tr>
                      </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $pais = ControladorPais::ctrMostrarPais($item, $valor);

                        foreach ($pais as $key => $value){
                        
                          echo ' <tr>
                                  <td>'.$value["Clave"].'</td>
                                  <td>'.$value["Descripcion"].'</td>';

                                  if($value["Estatus"] != 0){
                                    echo '<td><button class="btn btn-success btn-xs btnActivarPais" idPais="'.$value["Id"].'" estadoPais="0">Activado</button></td>';
                                  }else{
                                    echo '<td><button class="btn btn-danger btn-xs btnActivarPais" idPais="'.$value["Id"].'" estadoPais="1">Desactivado</button></td>';
                                  }           
                                  echo '</tr>';
                              
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
