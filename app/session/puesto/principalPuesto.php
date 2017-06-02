<?php
  session_start();
    include "../../DatabaseAccess/DAO.php";
  if(!isset($_SESSION['Puesto'])){
		header("Location: ../../principal.php");
	}else{											//el else es esencial... casi parece que no fueron a clase
	   $puesto = unserialize($_SESSION['Puesto']);
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
        <a class="navbar-brand" href="../../principal.php">TaCONNECTA</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Cambiar Dirección</a></li>
        <li><a href="../logout.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>


  <div class="container">
    <div class="panel panel-default">
      <font size="6"><center>
      <div class="panel-body">TaCONNECTA </div>
      <div class="panel-body">Por esos antojos que llegan cuando
                              menos te lo esperas. </div>
      <div class="panel-body">Hola <?php
                              $nombre = $puesto->getnPuesto();
                              echo $nombre;
                            ?></div>
      </center></font>
    </div>
  </div>

  <div class="container">
    <div  class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">

          <div class="caja1"><center>
            <h4>Reseñas y comentarios</h4>
          </center></div>

          <div id="imaginary_container2"></div>
        </div>
      </div>

      <div class="col-sm-4">
      </div>

      <div class="col-sm-6">
        <div class="panel panel-default">
          <center>
            <h4>Calificación actual: 4.8</h4>
            <div id="imaginary_container"></div>
            <h4>¡Siempre puedes mejorar!</h4>
            <div id="imaginary_container"></div>
            <h4>Actualiza tu datos para que más gente te conozca</h4>
            <div id="imaginary_container"></div>
            <form method="get" action="formularioPuesto.php">
                <button type="submit">¡Actualizar mis datos!</button>
            </form>
            <!--h4><button type="button" class="btn">¡Actualizar mis datos!</button></h4-->
            <div id="imaginary_container"></div>
          </center>
        </div>
        <div id="imaginary_container2">
        <?php
              if ( isset($_GET['succes']) && $_GET['succes'] == 1 ){
                echo "<p id='div1' style='color:#9000A1'>Actualización de datos exitosa</p>";
              }
        ?>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
