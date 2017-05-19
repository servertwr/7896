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
        <a class="navbar-brand" href="../principal.php">TaCONNECTA</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Cambiar Dirección</a></li>
        <li><a href="../entrar.php">Iniciar Sesión / Regístrate</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="panel panel-default">
      <font size="6"><center>
      <div class="panel-body">Bienvenido a TaCONNECTA</div>
      <div class="panel-body">El registro fue exitoso. Por favor, intenta iniciar sesión</div>
      </center></font>
    </div>
  </div>


</body>
</html>
