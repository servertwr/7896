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
        <div class="panel panel-default"><center>
          <div class="caja1"><h4>!Quiero registrarme!</h4></div>
          <div class="caja1"><p><a href="registrarUsuario.php" class="btn btn-default">Regístrate como cliente</a></p></div>
          <div class="caja1"><p><a href="registrarPuesto.php" class="btn btn-default">Regístrate como puesto</a></p></div>
          <div id="imaginary_container2"></div>
        </center></div>
      </div>


      <div class="col-sm-4">
      </div>

      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="caja1"><center>
            <h4>¡Ya estoy registrado!</h4>
          </center></div>
          <form action="session/login.php" method="POST">
            <div class="form-group col-lg-12">
              <label for="email">Correo electrónico:</label>
              <input type="email" class="form-control" name="correo">
            </div>
            <div class="form-group col-lg-12">
              <label for="pwd">Contraseña:</label>
              <input type="password" class="form-control" name="clave">
            </div>
            <center>
              <input id="enviar" class="ButtonColor" type="submit" name="enviar" value="Iniciar sesión"></input>
              <p><a href="#">He olvidado mi contraseña</a></p>
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
