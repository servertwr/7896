<?php
  session_start();
    include "../../DatabaseAccess/DAO.php";
  if(!isset($_SESSION['Puesto'])){
		header("Location: ../../principal.php");
	}else{											//el else es esencial... casi parece que no fueron a clase
	   $puesto = unserialize($_SESSION['Puesto']);
  }

  if (isset($_POST["enviar"])) {
    echo "<h1>Entra a editarPuesto.php</h1>";

    $nPuesto   = $_POST["nPuesto"];
    $nResponsable   = $_POST["nResponsable"];
    $horario   = $_POST["horario"];
    $telContacto   = $_POST["telContacto"];
    $descripcion = $_POST["descripcion"];
    $SubCategoria = $_POST["make_text"];

    $con = DAOConexion::puesto();

    $sqlIdSub = "select idSubCategoria from SubCategoria where nombreSub = '$SubCategoria'";
    $ejecucion = $con->query($sqlIdSub);
    $resEjecucion = $ejecucion->fetch_assoc();

    $idSub = $resEjecucion["idSubCategoria"];
    $idPuesto = $puesto->getIdPuesto();

    $sql = "update Puesto set horario = '$horario', telContacto = '$telContacto', descripcion = '$descripcion', idSub = '$idSub' where idPuesto = '$idPuesto'";
    $ejecucion = $con->query($sql);

    $Puesto = DAOTraerPuesto::informacionPerfil($con, $idPuesto);
    $_SESSION["Puesto"] = serialize ($Puesto);

    DAOConexion::cerrar($con);

    $_SESSION['message'] = 'succes';
    header("Location: principalPuesto.php?succes=1");

  }
?>
