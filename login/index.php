<?php
  
  $alert = '';
	session_start();
	if (!empty($_SESSION['active'])) 
	{
		header('location: PAR/');
	}else
	{
		if (!empty($_POST)){

			if (empty($_POST['ingUsuario']) || empty($_POST['ingPassword'])){
				
				$alert = 'Favor de Ingresar Usuario  Y Contraseña';
			}else{

				require_once "conexion.php";

					$user = strtoupper(mysqli_real_escape_string($conection,$_POST['ingUsuario'])) ;
					$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					

					$query = mysqli_query($conection,"SELECT * FROM usuario WHERE Username = '$user' AND Activo=1 ");
					mysqli_close($conection);
					$result = mysqli_num_rows($query);

					if ($result > 0){
					    
						$data = mysqli_fetch_array($query);
						if ($data["Username"] == $user && $data["Password"] == $encriptar){

							$_SESSION['active'] = true;
							$_SESSION["id"] = $data["Id"];
							$_SESSION["nombre"] = $data["Nombre"];
							$_SESSION["usuario"] = $data["Username"];
							$_SESSION["foto"] = $data["Foto"];
							$_SESSION["email"] = $data["Email"];
							$_SESSION["perfil"] = $data["Perfil"];

							header('location: PAR/');
						}else{
							$alert = 'Usuario o Contraseña incorrectos';
							session_destroy();
						}
					}else{
						$alert = 'Usuario no Activo';
							session_destroy();
					}

			}
		}	
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PAR | Inicio de Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-34">
						Cuenta de Ingreso
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="ingUsuario" placeholder="Usuario" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="ingPassword" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
					
					<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" value="INGRESAR">
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/logo_login.png');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>