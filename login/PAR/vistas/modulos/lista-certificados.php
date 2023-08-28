
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Certificado</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Lista de Certificado</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content no-print">
  <div class="box  box-solid " id="accordion">
  <div class="box-header with-border" style="cursor: pointer;">
    <h3 class="box-title">
    
    </h3>
  </div>
    <div id="collapseFilter" class="panel-collapse active collapse  in " aria-expanded="true">
    <div class="box-body">
      <div class="row">
      
      </div>
    </div>
  </div>
</div>    <div class="box box-primary" >
        <div class="box-header">
            
            <h3 class="box-title"></h3>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="">
                <i class=""></i> </a>
            </div>
        </div>
            
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_viewcertificado" id="sell_tablenuevo">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Asociado</th>
                        <th>Cliente</th>
                        <th>Descargar PDF</th>
                        
                        <tbody>
                        <?php

                        $item = null;
                        $valor = null;
                        $pais = null;

                        $item = "CER.Asociado";
                        $valor = $_SESSION['perfil'];
                        
                        if($valor == 3){

                          $valor=$_SESSION['id'];

                          $pais = ControladorAutorizarCotizacion::ctrMostrarCertificado($item, $valor);
                        }else{

                          $item = null;
                          $valor = null;
                        
                          $pais = ControladorAutorizarCotizacion::ctrMostrarCertificado($item, $valor);
                        }

                        

                        foreach ($pais as $key => $value){

                          $date = new DateTime($value["Fecha"]);
                         $fecha = $date->format('d/m/Y');
                         
                    
                          echo ' <tr>
                          
                          <td>'.$value["Foliocertificado"].'</td>
                          <td>'.$fecha.'</td>
                          <td>'.$value["AsociadoDescripcion"].'</td>
                          <td>'.$value["ClienteDescripcion"].'</td>  
                          <td><a class="btn-sm" role="button" href="vistas/certificados/certificado_'.$value["Foliocertificado"].'.pdf"
                          download="'.$value["Foliocertificado"].'">
                          <i class="fas fa-file-pdf" aria-hidden="true"">
                            Download
                            </i>
                          </a></td>
                          
                          </tr>';
  
                        }
                        ?> 
                    </tbody>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>
      <!-- /.container-fluid -->
  </section>

</div>




