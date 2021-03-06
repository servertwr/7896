<?php
  session_start();
    include "DatabaseAccess/DAO.php";

    if(isset($_SESSION['User'])){
      header("Location: session/cliente/principalCliente.php");
  	}
    if(isset($_SESSION['Puesto'])){
      header("Location: session/puesto/principalPuesto.php");
  	}

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
        <li><a href="#">Cambiar Dirección</a></li>
        <li><a href="entrar.php">Iniciar Sesión / Regístrate</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="panel panel-default">
      <font size="6"><center>
      <div class="panel-body">TaCONNECTA</div>
      <div class="panel-body">Por esos antojos que llegan cuando
                              menos te lo esperas</div>
      </center></font>
    </div>
  </div>

  <div class="container">
    <!--div id="imaginary_container"-->
      <div text-align="center"><h1><center>Bienvenido</center></h1></div>
    <!--/div-->
  </div>

  <div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control input-lg"  placeholder="Ingresa tu dirección" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                            <font size="4">Buscar puestos de comida</font>
                        </button>
                    </span>
                </div>
            </div>
          </div>
            <div id="imaginary_container2">
        </div>
	</div>
  </div>

  <div class="container">
    <div  class="row">
      <div class="col-sm-3">
        <h5>Acerca de nosotros</h5>
          <p><a href="#">Quiénes somos</a></p>
          <p><a href="#">Términos y condiciones</a></p>
      </div>
      <div class="col-sm-3">
        <h5>TaCONNECTA</h5>
          <p><a href="#">Cómo funciona</a></p>
          <p><a href="#">Registro</a></p>
      </div>
      <div class="col-sm-3">
        <h5>Contacto</h5>
          <p><a href="#">Contáctanos</a></p>
      </div>
    </div>
  </div>
</body>
</html>
