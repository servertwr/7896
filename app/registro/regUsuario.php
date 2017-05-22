<?php
  session_start();
    include "../DatabaseAccess/DAO.php";

  if (isset($_POST["enviar"])) {
    $nombre     = $_POST["nombre"];
    $apellido   = $_POST["apellido"];
    $usuario    = $_POST["usuario"];
    $correo     = $_POST["correo"];
    $clave      = $_POST["clave"];

    $con = DAOConexion::puesto();

    $sql = "select idPuesto from Puesto where correo = '$correo' ";

    $ejecucion = $con->query($sql);
    $resEjecucion = $ejecucion -> fetch_assoc();
    $id = $resEjecucion["idPuesto"];

    if($id > 0){
      DAOConexion::cerrar($con);
      header("Location: ../registrarUsuario.php?error=1");
    }else{
      $sql = "select idUsuario from Cliente where correo = '$correo' ";

      $ejecucion = $con->query($sql);
      $resEjecucion = $ejecucion -> fetch_assoc();
      $id = $resEjecucion["idUsuario"];

      if($id > 0){
        DAOConexion::cerrar($con);
        header("Location: ../registrarUsuario.php?error=1");
      }
    }

    $sql = "insert into Cliente (nombre, apellido, usuario, correo, contrasena)
    values ('$nombre', '$apellido', '$usuario', '$correo', '$clave')";

    if ($con->query($sql) === TRUE) {
      header("Location: regExitoso.php");
    }

    DAOConexion::cerrar($con);
  }

?>
