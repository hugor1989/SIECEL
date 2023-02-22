<?php

if(isset($_POST["ingUsuario"])){

    session_start();
    require_once "../modelos/conexion.php";

//if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){

    $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

    $tabla = "usuario";

    $item = "Username";
    $valor = $_POST["ingUsuario"];

    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

    if($respuesta["Username"] == $_POST["ingUsuario"] && $respuesta["Password"] == $encriptar){

        if($respuesta["Activo"] == 1){

            $_SESSION["iniciarSesion"] = "ok";
            $_SESSION["id"] = $respuesta["Id"];
            $_SESSION["nombre"] = $respuesta["Nombre"];
            $_SESSION["usuario"] = $respuesta["Username"];
            $_SESSION["foto"] = $respuesta["Foto"];
            $_SESSION["perfil"] = $respuesta["Perfil"];

            /*=============================================
            REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
            =============================================*/

            date_default_timezone_set('America/Mexico_City');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha.' '.$hora;

            $item1 = "ultimo_login";
            $valor1 = $fechaActual;

            $item2 = "Id";
            $valor2 = $respuesta["Id"];

            $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

            if($ultimoLogin == "ok"){

                echo '<script>

                    window.location = "inicio";

                </script>';

            }				
            
        }else{

            echo '<script>

        Swal.fire({

            type: "error",
            title: "¡El usuario aún no está activado",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        })
        </script>';

            //echo '<br>
            //	<div class="alert alert-danger">El usuario aún no está activado</div>';

        }		

    }else{

        echo '<script>

        Swal.fire({

            type: "error",
            title: "Error al ingresar, vuelve a intentarlo",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        })
        </script>';

        //echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

    }

//}	

}else{

echo '<script>

        Swal.fire({

            type: "error",
            title: "¡Favor de Ingresar Usuario o Contraseña",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        })
        </script>';
}

?>