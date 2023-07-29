<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APAR | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bowe_components/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="vistas/bowe_components/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/bowe_components/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- dATEPICKER-->
  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
  
   <!-- ./sweet -->
 	<script src="vistas/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/bowe_components/jqvmap/jqvmap.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="vistas/bowe_components/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/bowe_components/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/style-steep.css">
  <!-- sttep style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!--<link rel="stylesheet" href="vistas/dist/css/alt/admin.css">-->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/bowe_components/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bowe_components/daterangepicker/daterangepicker.css">   
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/bowe_components/summernote/summernote-bs4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/bowe_components/horapicker/css/clockpicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bowe_components/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/bowe_components/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/bowe_components/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/bowe_components/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css">
  <!-- <script type="text/javascript" src="vistas/js/print.js"></script> -->
  <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  



<style type="text/css">

body{padding:5px}
.form-group.floating>label {
    bottom: 34px;
    left: 8px;
    position: relative;
    background-color: white;
    padding: 0px 5px 0px 5px;
    font-size: 1.1em;
    transition: 0.1s;
    pointer-events: none;
    font-weight: 600 !important;
    transform-origin: bottom left;
}

.form-control.floating:focus~label{
    transform: translate(1px,-85%) scale(0.80);
    opacity: .8;
    color: #005ebf;
}

.form-control.floating:valid~label{
    transform-origin: bottom left;
    transform: translate(1px,-85%) scale(0.80);
    opacity: .8;
}   

html {
    height: 100%
}

/* #grad1 {
    background-color: : #9C27B0;
    background-image: linear-gradient(20deg, #9C27B0, #81D4FA)
} */

#msform {
    text-align: center;
    position: relative;
    margin-top: 0px
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}


#msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 90%;
    box-sizing: border-box;
    font-family: Arial;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px
}


#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: skyblue;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button:hover,
#msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: skyblue
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
    width: 100%;
    object-fit: cover
}
#register_form fieldset:not(:first-of-type) {
display: none;
}
#register_form_mercanciaeditar fieldset:not(:first-of-type) {
display: none;
}

#register_form_mercancia fieldset:not(:first-of-type) {
display: none;
}

#edit_form fieldset:not(:first-of-type) {
display: none;
}

#datos_certificado fieldset:not(:first-of-type) {
display: none;
}


</style>
<!-- Optional SmartWizard themes -->
<!--<link href="vistas/bowe_components/smartwizard/css/smart_wizard_theme_arrows.min.css" rel="stylesheet">
<link href="vistas/bowe_components/smartwizard/css/smart_wizard_theme_dots.min.css" rel="stylesheet">
<link href="vistas/bowe_components/smartwizard/css/smart_wizard_dark.min.css" rel="stylesheet">
<link href="vistas/bowe_components/smartwizard/css/smart_wizard_progress.min.css" rel="stylesheet">
-->
<!-- All In One -->
<!--<link href="vistas/bowe_components/smartwizard/css/smart_wizard_all.min.css" rel="stylesheet" />-->
<!-- termina smartwizard -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!--<div class="wrapper">-->

<?php

//if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

 echo '<div class="wrapper">';

  /*=============================================
  CABEZOTE
  =============================================*/

  include "modulos/cabezote.php";

  /*=============================================
  MENU
  =============================================*/

  include "modulos/menu.php";

  /*=============================================
  CONTENIDO
  =============================================*/

  if(isset($_GET["ruta"])){

    if($_GET["ruta"] == "inicio" ||
       $_GET["ruta"] == "usuarios" ||
       $_GET["ruta"] == "crear-usuario" ||
       $_GET["ruta"] == "perfiles" ||
       $_GET["ruta"] == "clientes" ||
       $_GET["ruta"] == "crear-cliente" ||
       $_GET["ruta"] == "giro" ||
       $_GET["ruta"] == "mercancia" ||
       $_GET["ruta"] == "crear-mercancia" ||
       $_GET["ruta"] == "aseguradora" ||
       $_GET["ruta"] == "cuota" ||
       $_GET["ruta"] == "cuota-aseguradora" ||
       $_GET["ruta"] == "cotizacion_imp" ||
       $_GET["ruta"] == "asociado" ||
       $_GET["ruta"] == "certificado" ||
       $_GET["ruta"] == "cotizacion" ||
       $_GET["ruta"] == "protocolo" ||
       $_GET["ruta"] == "producto" ||
       $_GET["ruta"] == "recorrido" ||
       $_GET["ruta"] == "medio-transporte" ||
       $_GET["ruta"] == "linea-transporte" ||
       $_GET["ruta"] == "cerrarsesion" ||
       $_GET["ruta"] == "ReporteAsociado" ||
       $_GET["ruta"] == "ReporteApar" ||
       $_GET["ruta"] == "ReporteAseguradora" ||
       $_GET["ruta"] == "autorizar-cotizacion" ||
       $_GET["ruta"] == "lista-certificados" ||
       $_GET["ruta"] == "paises" ||
       $_GET["ruta"] == "salir"){

      include "modulos/".$_GET["ruta"].".php";

    }else{

      include "modulos/404.php";

    }

  }else{

    include "modulos/inicio.php";

  }

  /*=============================================
  FOOTER
  =============================================*/

  include "modulos/footer.php";

  echo '</div>';

//}else{

//include "modulos/login.php";

//}

?>

 

 
<!--</div>-->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="vistas/bowe_components/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vistas/bowe_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="vistas/js/print.js"></script>
<!-- Impresion  -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="vistas/bowe_components/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!--<script src="bowe_components/chart.js/Chart.min.js"></script>-->
<!-- Sparkline -->
<script src="vistas/bowe_components/sparklines/sparkline.js"></script>
<!-- Select2 -->
<script src="vistas/bowe_components/select2/js/select2.full.min.js"></script>
<!-- JQVMap -->
<script src="vistas/bowe_components/jqvmap/jquery.vmap.min.js"></script>
<script src="vistas/bowe_components/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="vistas/bowe_components/jquery-knob/jquery.knob.min.js"></script>
<!-- SweetAlert2 -->
<script src="vistas/bowe_components/sweetalert2/sweetalert2.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/bowe_components/moment/moment.min.js"></script>
<script src="vistas/bowe_components/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="vistas/bowe_components/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="vistas/bowe_components/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="vistas/bowe_components/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- smart wizar--->
<!--<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>-->
<!-- DATEPICKER-->
<!--<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>-->
<!-- overlayScrollbars -->
<script src="vistas/bowe_components/horapicker/js/clockpicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="vistas/bowe_components/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/bowe_components/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/bowe_components/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/bowe_components/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vistas/bowe_components/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="vistas/bowe_components/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="vistas/bowe_components/jszip/jszip.min.js"></script>
<script src="vistas/bowe_components/pdfmake/pdfmake.min.js"></script>
<script src="vistas/bowe_components/pdfmake/vfs_fonts.js"></script>
<script src="vistas/bowe_components/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="vistas/bowe_components/datatables-buttons/js/buttons.print.min.js"></script>
<script src="vistas/bowe_components/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="vistas/bowe_components/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
<!-- InputMask -->
<script src="vistas/bowe_components/moment/moment.min.js"></script>
<script src="vistas/bowe_components/inputmask/jquery.inputmask.min.js"></script>

<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="vistas/dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="vistas/dist/js/pages/dashboard.js"></script>-->

<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/aseguradora.js"></script>
<script src="vistas/js/mercancias.js"></script>
<script src="vistas/js/giro.js"></script>
<script src="vistas/js/protocolo.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/certificado.js"></script>
<script src="vistas/js/recorrido.js"></script>
<script src="vistas/js/medio-transporte.js"></script>
<script src="vistas/js/linea-transporte.js"></script>
<script src="vistas/js/funciones.js"></script>
<script src="vistas/js/estados.js"></script>
<script src="vistas/js/pais.js"></script>
<script src="vistas/js/autorizar-cotizacion.js"></script>
</body>
</html>

<script>
// Filter box
$("#show-filter-box").on("click", function(e) {
  e.preventDefault();
  console.log("entro");
  $("#filter-box").slideDown("fast");
  $("body").toggleClass("overlay");
});
</script>
<script>
$("#close-filter-box").on("click", function(e) {
  e.preventDefault();
  $("#filter-box").slideUp('fast');
  $("body").toggleClass("overlay");
});
</script>