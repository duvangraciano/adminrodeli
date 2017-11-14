<?php 
session_start();

if (isset($_SESSION['login']) && $_SESSION['loggedin'] == true) {

$cfg = $_SESSION['cfg'];
$empresa = unserialize($cfg['data']['conf_empresa']);
$app = unserialize($cfg['data']['conf_app']);
$user = $_SESSION['login'];


setlocale(LC_MONETARY, 'es_CO');
date_default_timezone_set('America/Bogota');
include_once '../class/class.miscelanea.php';
include_once '../class/class.database.php';

$db = new Database();
$con = $db->conexion();
$misc = new Miscelanea($con);
$pu = unserialize($misc->get_one('tbl_roles','rol_modulos','oid',$user['usu_rol_oid'])['data']['rol_modulos']);

  if(isset($_GET['logout']) && $_GET['logout'] == 'logout'){
    $misc->setSession($user['oid']);
    $misc->logout();
  }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $app['nombre_app'].' | '.$empresa['nombre_empresa']; ?></title>

    <!-- Bootstrap -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../plugins/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap 
    <link href="../plugins/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-wysiwyg -->
    <link href="../plugins/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 
    <link href="../plugins/sumoselect/sumoselect.min.css" rel="stylesheet">-->
    <link href="../plugins/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Switchery -->
    <link href="../plugins/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../plugins/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Formvalidation -->
    <link href="../plugins/formvalidation/formValidation.min.css" rel="stylesheet" type="text/css">
        <!-- Datatables -->
    <link href="../plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- PNotify -->
    <link href="../plugins/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Bootstrap Colorpicker -->
    <link href="../plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../plugins/build/css/custom.min.css" rel="stylesheet">
    
    <style type="text/css">
      .form-control-feedback.right {
          border-left: none;
          right: 15px;
      }
      .has-feedback label~.form-control-feedback {
          top: 22px;
      }
    </style>
  </head>

  <body id="navbar" class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-crop"></i> <span><?php echo $app['nombre_app']; ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="../images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $user['usu_id']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
              <?php include_once '../pages/menu.php'; ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
          <?php include_once '../pages/header.php'; ?>
        <!-- /top navigation -->
  <script>

    
    if(window.history.forward(1) != null){
      window.history.forward(1);
    }
  </script>
    <!-- jQuery -->
  <script src="../plugins/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../plugins/build/js/custom.min.js"></script>
        <!-- page content -->
          <?php 
          $sub = (isset($_GET['sub'])? $_GET['sub'] : '');
          switch ($sub) {
            case 'nuevaventa':
              include_once '../pages/nuevaventa.php' ;
              break;
              
            case 'nuevousuario':
              include_once '../pages/nuevousuario.php' ;
              break;
              
            case 'roles':
              include_once '../pages/roles.php' ;
              break;
            
            case 'nuevorol':
              include_once '../pages/nuevorol.php' ;
              break;
              
            case 'usuarios':
              include_once '../pages/usuarios.php' ;
              break;
              
            case 'plantilla':
              include_once '../pages/plantilla.php' ;
              break;

            case 'formulario':
              include_once '../pages/formulario.php' ;
              break;

            case 'ordenproduccion':
              include_once '../pages/ordenproduccion.php' ;
              break;

            case 'productosservicios':
              include_once '../pages/productosservicios.php' ;
              break;

            case 'compuestos':
              include_once '../pages/compuestos.php' ;
              break;

            case 'clientes':
              include_once '../pages/clientes.php' ;
              break;

            case 'conceptos':
              include_once '../pages/conceptosalmacen.php' ;
              break;

            case 'nuevoconcepto':
              include_once '../pages/nuevoconcepto.php' ;
              break;

            case 'empleados':
              include_once '../pages/empleados.php' ;
              break;

            case 'cotizador':
              include_once '../pages/cotizador.php' ;
              break;

            case 'nuevaentrada':
              include_once '../pages/nuevaentrada.php' ;
              break;

            case 'entradaalmacen':
              include_once '../pages/entradaalmacen.php' ;
              break;

            case 'salidaalmacen':
              include_once '../pages/salidaalmacen.php' ;
              break;

            case 'nuevoempleado':
              include_once '../pages/nuevoempleado.php' ;
              break;

            case 'ordenesproduccion':
              include_once '../pages/ordenesproduccion.php' ;
              break;

            case 'proveedores':
              include_once '../pages/proveedores.php' ;
              break;

            case 'tercero':
              include_once '../pages/nuevotercero.php' ;
              break;

            case 'parametrosnomina':
              include_once '../pages/parametrosnomina.php' ;
              break;

            case 'liquidador':
              include_once '../pages/liquidador.php' ;
              break;
            
            default:
              include_once '../pages/contenido.php' ;
              break;
          }





          ?>
        <!-- /page content -->

      </div>
    </div>
  </body>

  <script>
    var menu = (!localStorage.getItem("navbar")?"nav-md":localStorage.getItem("navbar"));
    window.onload = function() {      document.getElementById("navbar").setAttribute("class",menu)   }
    document.getElementById("menu_tgle").onclick = function(){ hideandshow_menu(); }
    
    function hideandshow_menu(){
      var navbar = document.getElementById("navbar");
      if (navbar.className == "nav-md") {
        navbar.setAttribute("class","nav-sm");
        localStorage.setItem("navbar", "nav-sm");
      }else{
        navbar.setAttribute("class","nav-md");
        localStorage.setItem("navbar", "nav-md");
      }
      console.log(navbar.className);
    }
    
    $(document).ready(function() {

      $("select").select2({
        allowClear: false
      });

    });
  </script>
</html>

<?php
}else{
  header('Location: ../index.php');
}
?>