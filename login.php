<?php
session_start();
include_once 'class/class.miscelanea.php';
include_once 'class/class.database.php';

$db = new Database();
$con = $db->conexion();
$misc = new Miscelanea($con);



if(isset($_SESSION['login']) && $_SESSION['loggedin'] == true){
  header('Location: pages/index.php');
}else{
  $cfg = $misc->get_one('tbl_configuracion','*','oid','1');
  $conf_empresa = unserialize($cfg['data']['conf_empresa']);
  $conf_app = unserialize($cfg['data']['conf_app']);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ingreso | <?php echo $conf_empresa['nombre_empresa']; ?></title>

    <!-- Bootstrap -->
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="plugins/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
              if(isset($_POST['user']) && isset($_POST["pwd"])){
                if($_POST['user']!='' && $_POST["pwd"]!=''){
                  $result = $misc->login($_POST['user'],$_POST["pwd"]);
                  if($result['bool']){
                    $_SESSION['cfg'] = $cfg;
                    $_SESSION['loggedin'] = true;
                    header('Location: pages/index.php');
                  }else{
                    echo '<p style="color:red;">'.$result['mensaje'].'</p>';
                  }
                }else{
                  echo '<p style="color:red;">Los campos no pueden estar vacios!.</p>';
                }
              }
            ?>
            <form action="/login.php" method="post">
              <h2>Ingreso a <?php echo $conf_app['nombre_app']; ?></h2>
              </br>
              <div>
                <input type="text" class="form-control" name="user" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pwd" placeholder="Contraseña" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Autenticar</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
                -->
                <div class="clearfix"></div>
                <br />

                <div>
                  <?php echo (is_null($conf_empresa['logo_empresa'])?'<h1>{Logo}</h1>':'<img src="'.$conf_empresa['logo_empresa'].'"></img>'); ?>
                  <p>©2017 Todos los derechos reservados.</p>
                  <p>Versión <?php echo $conf_app['version_app']; ?> - <a>Terminos y Condiciones</a></p>
                  
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>

<?php
}
?>