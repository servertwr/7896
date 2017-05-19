<?php
  session_start();
    include "../DatabaseAccess/DAO.php";

  echo "<h1>Hola mundo</h1>";

  if (isset($_POST["enviar"])) {
    echo "<h1>Entra a enviar</h1>";
    $InputNombre   = $_POST["nombre"];
    $InputPuesto   = $_POST["puesto"];
    $InputEmail    = $_POST["correo"];
    $InputPassword = $_POST["clave"];

    echo $InputNombre;
    echo $InputPuesto;
    echo $InputEmail;
    echo $InputPassword;

    $con = DAOConexion::puesto();

    $sql = "insert into Puesto (nResponsable, nPuesto, correo, contrasena)
    values ('$InputNombre', '$InputPuesto', '$InputEmail', '$InputPassword')";
    echo $sql;

    if ($con->query($sql) === TRUE) {
      header("Location: regExitoso.php");
    }
    DAOConexion::cerrar($con);
  }

?>
