<?php
  session_start();
      include "../DatabaseAccess/DAO.php";


      echo "<h1>Hola mundo</h1>";

      if (isset($_POST["enviar"])) {

        $InputEmail = $_POST["correo"];
        $InputPassword = $_POST["clave"];
        echo $InputEmail;
        echo $InputPassword;

        $con = DAOConexion::puesto();
        $sql = "select idUsuario from Cliente where correo = '$InputEmail' and contrasena = '$InputPassword'";

        $ejecucion = $con->query($sql);
        $resEjecucion = $ejecucion -> fetch_assoc();
        $id = $resEjecucion["idUsuario"];
        echo $id;


        if($id > 0){
          $User = DAOTraer::informacionPerfil($con, $id);
          $_SESSION["User"] = serialize ($User);
          header("Location: cliente/principalCliente.php");
        }else{
          echo "<h1>Parace que el usuario no está registrado</h1>";
        }



      }


?>
