<?php
  session_start();
    include "../DatabaseAccess/DAO.php";

  if (isset($_POST["enviar"])) {
    echo "<h1>Entra a enviar</h1>";
    $InputNombre   = $_POST["nombre"];
    $InputPuesto   = $_POST["puesto"];
    $InputEmail    = $_POST["correo"];
    $InputPassword = $_POST["clave"];

    $con = DAOConexion::puesto();

    $sql = "select idPuesto from Puesto where correo = '$InputEmail' ";

    $ejecucion = $con->query($sql);
    $resEjecucion = $ejecucion -> fetch_assoc();
    $id = $resEjecucion["idPuesto"];

    if($id > 0){
      DAOConexion::cerrar($con);
      header("Location: ../registrarPuesto.php?error=1");
    }else{
      $sql = "select idUsuario from Cliente where correo = '$InputEmail' ";

      $ejecucion = $con->query($sql);
      $resEjecucion = $ejecucion -> fetch_assoc();
      $id = $resEjecucion["idUsuario"];

      if($id > 0){
        DAOConexion::cerrar($con);
        header("Location: ../registrarPuesto.php?error=1");
      }
    }

    $sql = "insert into Puesto (nResponsable, nPuesto, correo, contrasena)
    values ('$InputNombre', '$InputPuesto', '$InputEmail', '$InputPassword')";

    if ($con->query($sql) === TRUE) {
      header("Location: regExitoso.php");
    }

    DAOConexion::cerrar($con);
  }

?>
