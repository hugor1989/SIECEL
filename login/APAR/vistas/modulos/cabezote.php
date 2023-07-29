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
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="vistas/img/profile.png" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"><?php echo $_SESSION['nombre'] ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <li class="user-header bg-primary">
            <img src="vistas/img/profile.png" class="img-circle elevation-2" alt="User Image">
            <p>
            <?php echo $_SESSION['usuario'] ?>
              <small> <?php echo date('d-m-y h:i:s'); ?></small>
            </p>
          </li>

          <li class="user-body">
            <div class="row">
              <div class="col-6 text-center">
                <a href="#"><i class="fa fa-user"></i>Mi Perfil</a>
              </div>
              <div class="col-6 text-center">
                <a href="#"><i class="fa fa-edit"></i>Actualizar Contraseña</a>
              </div>
              
            </div>
          </li>

          <li class="user-footer">
              <a href="vistas/modulos/bloqueo.php" class="btn btn-default btn-flat">Bloquear Sesión</a>
              <a href="vistas/modulos/cerrarsesion.php" class="btn btn-default btn-flat float-right">Cerrar Sesión</a>
          </li>
        </ul>
      </li>
    </ul>
   <!--  <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="vistas/img/profile.png" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">HUGO ALEJANDRO</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> -->
          <!-- User image -->
        <!--   <li class="user-header bg-primary">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              HUGO ALEJANDRO              <small></small>
            </p>
          </li> -->
          <!-- Menu Body -->
   
          <!-- Menu Footer-->
        <!--   <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Perfil</a>
            <a href="cerrarsesion.php" class="btn btn-default btn-flat float-right">Cerrar Sesion</a>
          </li>
        </ul>
      </li> -->

      <!-- <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
            <li><a href="password"><i class="fa fa-edit"></i> Actualizar Contraseña </a></li>
            <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
            <li class="divider"></li>
            <li><a href="vistas/modulos/cerrarsesion.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
         </ul>
      </li> -->
    <!-- </ul> -->
  </nav>
  <!-- /.navbar -->