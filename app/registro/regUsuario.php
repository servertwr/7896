<?php
  session_start();
    include "../DatabaseAccess/DAO.php";

  echo "<h1>Hola mundo</h1>";

  if (isset($_POST["enviar"])) {
    echo "<h1>Entra a enviar</h1>";
    $nombre     = $_POST["nombre"];
    $apellido   = $_POST["apellido"];
    $usuario    = $_POST["usuario"];
    $correo     = $_POST["correo"];
    $clave      = $_POST["clave"];

    $con = DAOConexion::puesto();

    $sql = "insert into Cliente (nombre, apellido, usuario, correo, contrasena)
    values ('$nombre', '$apellido', '$usuario', '$correo', '$clave')";
    echo $sql;

    if ($con->query($sql) === TRUE) {
      header("Location: regExitoso.php");
    }

    DAOConexion::cerrar($con);
  }

?>
