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
  <link rel="stylesheet" type="text/css" href="../stylesheets/principal.css">
  <script>
  $("#select1").change(function() {
    if ($(this).data('options') === undefined) {
      /*Taking an array of all options-2 and kind of embedding it on the select1*/
      $(this).data('options', $('#select2 option').clone());
    }
    var id = $(this).val();
    var options = $(this).data('options').filter('[value=' + id + ']');
    $('#select2').html(options);
  });
  </script>
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
    <div class="panel panel-default">
    <form action="editarPuesto.php" method="POST">
      <div id="imaginary_container2"><br></div>
      <div class="form-group col-lg-3">
        <label>Nombre del puesto:</label>
        <input type="text" class="form-control" name="nPuesto" value="<?php echo $puesto->getnPuesto(); ?>">
      </div>

      <div class="form-group col-lg-3">
        <label>Nombre del responsable:</label>
        <input type="text" class="form-control" name="nResponsable" value="<?php echo $puesto->getnResponsable();?>">
      </div>

      <div class="form-group col-lg-5">
        <label>Horario:</label>
        <input type="text" class="form-control" name="horario" value="<?php echo $puesto->gethorario();?>">
      </div>

      <div class="form-group col-lg-12">
        <label>Teléfono de contacto:</label>
        <input type="text" class="form-control" name="telContacto" value="<?php echo $puesto->gettelContacto();?>">
      </div>

          <?php

              echo  "\t<div class='form-group col-lg-12'>\n";
              echo  "\t\t<label for='sel1'>Categoria:</label>\n";
              echo  "\t\t<select name='select1' class='form-control' id='select1'>\n";
                $con = DAOConexion::usuario();
                $Dato = DAOTraer::categorias($con);

                $SubCategorias =  array();
                $i=0;
                foreach($Dato as $Datos){
                  echo "\t\t\t<option value={$Datos["idCategoria"]}>{$Datos["nombreCat"]}</option>\n";

                  $SubCategorias[$i] = DAOTraer::subCategorias($con, $Datos["idCategoria"]);
                  $i++;
                }
                DAOConexion::cerrar($con);

              echo  "\t\t</select>\n";
              echo "\t</div>\n";

              echo  "\t<div class='form-group col-lg-12'>\n";
              echo  "\t<label for='sel1'>Subcategoria:</label>\n";
              echo  "\t\t<select name='select2' class='form-control' id='select2' onchange='setTextField(this)'>\n";
              $i=0;
              echo "\t\t\t<option value=0>-</option>\n";
              foreach($Dato as $Datos){
                foreach($SubCategorias[$i] as $sub){
                  echo "\t\t\t<option value={$sub["idCat"]}>{$sub["nombreSub"]}</option>\n";
                }
                $i++;
              }
              echo  "\t\t</select>\n";
              echo "\t</div>\n";
          ?>
      <div class="form-group col-lg-12">
        <label for="comment">Descripción:</label>
        <input id="make_text" type = "hidden" name = "make_text" value = "" />
        <script type="text/javascript">
            function setTextField(ddl) {
                document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
            }
        </script>
        <textarea class="form-control" rows="5" name="descripcion" value=""><?php echo $puesto->getdescripcion();?></textarea>
      </div>

      <center>
        <input id="enviar" class="ButtonColor" type="submit" name="enviar" value="Actualizar datos"></input>
        <div id="imaginary_container2"><br></div>
      </center>

    </form>
    <div>
  </div>
</body>
</html>
