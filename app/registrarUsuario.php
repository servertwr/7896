<?php
  session_start();
    include "DatabaseAccess/DAO.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>TaCONNECTA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        $("#div1").click(function(){
            $(this).hide();
        });
    });
  </script>
  <link rel="stylesheet" type="text/css" href="../stylesheets/principal.css">
</head>
<body>

  <nav class="navbar navbar-center">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="principal.php">TaCONNECTA</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Ayuda</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Idioma
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Español</a></li>
              <li><a href="#">English</a></li>
              <li><a href="#">Français</a></li>
              <li><a href="#">Deutsch</a></li>
              <li><a href="#">Italiano</a></li>
            </ul>
      </li>
        <p class="navbar-text">Contáctanos (4694-7867-5678) las 24 horas del día</p>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div  class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">

          <div class="caja1"><center>
            <h4>¿Listo para iniciar con TaCONNECTA?</h4>
            <h4>Crea tu cuenta</h4>
          </center></div>

          <form action="registro/regUsuario.php" method="POST">

            <div class="form-group col-lg-3">
              <label>Nombre:</label>
              <input type="text" class="form-control" name="nombre">
            </div>

            <div class="form-group col-lg-3">
              <label>Apellido:</label>
              <input type="text" class="form-control" name="apellido">
            </div>

            <div class="form-group col-lg-5">
              <label>Nombre de usuario:</label>
              <input type="text" class="form-control" name="usuario">
            </div>

            <div class="form-group col-lg-12">
              <label>Correo electrónico:</label>
              <input type="email" class="form-control" name="correo">
            </div>

            <div class="form-group col-lg-12">
              <label>Contraseña:</label>
              <input type="password" class="form-control" name="clave">
            </div>

            <center>
              <div class="col-sm-12">
                <div class="checkbox">
                  <label><input type="checkbox" name="remember"> Avisos de política y privacidad</label>
                </div>
              </div>
            </center>
            <center>
              <input id="enviar" class="ButtonColor" type="submit" name="enviar" value="Registrarme como cliente"></input>
            </center>
          </form>
          <div id="imaginary_container2"></div>
        </div>
      </div>

      <div class="col-sm-4">
      </div>

      <div class="col-sm-6">
        <div class="panel panel-default">
          <center>
            <h4>¡Disfruta de TaCONNECTA!</h4>
            <div id="imaginary_container"></div>
            <h4>Elige para tu vida solo aquello que te hace bien...</h4>
            <div id="imaginary_container"></div>
            <h4>...alimentos, antojos y TaCONNECTA</h4>
            <div id="imaginary_container"></div>
          </center>
        </div>
        <div id="imaginary_container2">
        <?php
              if ( isset($_GET['error']) && $_GET['error'] == 1 ){
                echo "<p id='div1' style='color:#9000A1'>El correo ya ha sido registrado.</p>";
              }
        ?>
        </div>
      </div>
    </div>
  </div>




</body>
