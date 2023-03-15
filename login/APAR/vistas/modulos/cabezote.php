<?php
session_start();
	if (empty($_SESSION['active'])) 
	{
		header('location: ../../');
	}

?>
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        
        <a href="vistas/modulos/cerrarsesion.php" class="btn btn-default btn-flat float-right">Cerrar Sesion</a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" id="show-filter-box" href="#">
                filtrar 
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline"><?php echo $_SESSION['usuario'] ?></span>
        </a>
        <ul class="dropdown-menu">
                                        <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                                        <li><a href="password"><i class="fa fa-edit"></i> Actualizar Contraseña </a></li>
                                        <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
                                        <li class="divider"></li>
                                        <li><a href="cerrarsesion"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                                    </ul>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="user-footer">
            <a href="vistas/modulos/cerrarsesion.php" class="btn btn-default btn-flat float-right">Cerrar Sesion</a>
          </li>
        </ul>
      </li>

      <!--<li class="nav-item dropdown user-menu">
              <a id="show-filter-box" href="#">
                filtrar <svg class="svg-icon"><use href="#icon-search-green"></svg>
              </a>
      </li>-->

    </ul>
  </nav>
  <!-- /.navbar -->