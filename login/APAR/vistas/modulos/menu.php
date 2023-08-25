
<?php
session_start();
?>
<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="vistas/img/logo-par-modificado.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> -</span>
    </a>

    <!-- Sidebar Usuario-->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre"] ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php

              if($_SESSION["perfil"] == 1){

                echo '
                
              <li class="nav-item">
                <a href="inicio" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
              </li>
              <!-- Inicia Usuarios-->
             <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Administrar Usuarios
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="usuarios" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado de Usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="crear-usuario" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Administrar Clientes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="clientes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Clientes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="crear-cliente" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Cliente</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- Termina Clientes -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                    Mercancia
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="mercancia" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista Mercancias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="giro" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista de Giros</p>
                  </a>
                </li>
                  <li class="nav-item">
                    <a href="crear-mercancia" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Mercancia</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- Protocolos-->
              <li class="nav-item">
                  <a href="protocolo" class="nav-link">
                      <i class="fas fa-hand-sparkles nav-icon"></i>
                      <p>Protocolo</p>
                  </a>
              </li>
              <!--Cuotas y Aseguradora -->
              <li class="nav-item">
                  <a href="aseguradora" class="nav-link">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>Aseguradora y Cuotas</p>
                  </a>
              </li>
              <!-- Administrar Paises -->
              <li class="nav-item">
                  <a href="paises" class="nav-link">
                    <i class="fas fa-globe nav-icon"></i>
                    <p>Paises</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="certificado" class="nav-link">
                <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                  <p>Generar Cotizacion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="autorizar-cotizacion" class="nav-link">
                <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                  <p>Autorizar Certificados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lista-certificados" class="nav-link">
                <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                  <p>Listado de Certificados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p>
                    Reportes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="ReporteAseguradora" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Aseguradora</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="ReporteApar" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Apar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="ReporteAsociado" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Asociado</p>
                    </a>
                  </li>
                </ul>
              </li>';
            }
            else if ($_SESSION["perfil"] == 2){
              echo '
                
              <li class="nav-item menu-open">
              <a href="inicio" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
  
              </a>
            </li>
            <!-- Inicia Usuarios-->
           <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Administrar Usuarios
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="usuarios" class="nav-link">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Listado de Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="crear-usuario" class="nav-link">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Crear Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
           <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Administrar Clientes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="clientes" class="nav-link">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="crear-cliente" class="nav-link">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Crear Cliente</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Termina Clientes -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Mercancia y Giro
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="mercancia" class="nav-link">
                    <i class="fas fa-boxes nav-icon"></i>
                    <p>Lista Mercancias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="giro" class="nav-link">
                    <i class="fas fa-boxes nav-icon"></i>
                    <p>Lista de Giros</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="crear-mercancia" class="nav-link">
                    <i class="fas fa-people-carry nav-icon"></i>
                    <p>Crear Mercancia</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Mercancia y Giro -->
            <li class="nav-item">
                <a href="protocolo" class="nav-link">
                    <i class="fas fa-hand-sparkles nav-icon"></i>
                    <p>Protocolo</p>
                </a>
            </li>
            <!--Cuotas y Aseguradora -->
            <li class="nav-item">
                <a href="aseguradora" class="nav-link">
                  <i class="fas fa-user-shield nav-icon"></i>
                  <p>Aseguradora y Cuotas</p>
                </a>
            </li>
           
            <!-- Administrar Paises -->
            <li class="nav-item">
                <a href="paises" class="nav-link">
                  <i class="fas fa-globe nav-icon"></i>
                  <p>Paises</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="certificado" class="nav-link">
              <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                <p>Generar Cotizacion</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="autorizar-cotizacion" class="nav-link">
              <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                <p>Autorizar Certificados</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="lista-certificados" class="nav-link">
              <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                <p>Listado de Certificados</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p>
                    Reportes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="usuarios" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Aseguradora</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="ReporteApar" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Apar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="ReporteAsociado" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Asociado</p>
                    </a>
                  </li>
                </ul>
              </li>';
            }else if ($_SESSION["perfil"] == 3){
              
                echo '
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Administrar Clientes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="clientes" class="nav-link">
                      <i class="fa fa-user nav-icon"></i>
                      <p>Clientes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="crear-cliente" class="nav-link">
                      <i class="fa fa-user nav-icon"></i>
                      <p>Crear Cliente</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="certificado" class="nav-link">
                  <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                  <p>Generar Cotizacion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p>
                    Reportes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="ReporteAsociado" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Asociado</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
              <a href="lista-certificados" class="nav-link">
              <i class="fas fa-file-signature nav-icon"></i> <!-- <i class="fa fa-user nav-icon"></i> -->
                <p>Listado de Certificados</p>
              </a>
            </li>';
            }else if ($_SESSION["perfil"] == 4){
              echo '
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Reporte
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="usuarios" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Aseguradora</p>
                    </a>
                  </li>
                </ul>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p>
                    Reportes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="ReporteAseguradora" class="nav-link">
                      <i class="far fa-copy nav-icon"></i>
                      <p>Reporte Aseguradora</p>
                    </a>
                  </li>
                </ul>
              </li>';
            }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>