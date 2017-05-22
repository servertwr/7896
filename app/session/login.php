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
        //echo $sql;

        $ejecucion = $con->query($sql);
        $resEjecucion = $ejecucion -> fetch_assoc();
        $id = $resEjecucion["idUsuario"];
        //echo $id;

        if($id > 0){
          $User = DAOTraerCliente::informacionPerfil($con, $id);
          $_SESSION["User"] = serialize ($User);
          DAOConexion::cerrar($con);
          header("Location: cliente/principalCliente.php");
        }else{
          echo "<h1>Parace que el usuario no está registrado en la tabla Cliente</h1>";
          echo "<h1>Probando en la tabla Puesto</h1>";

          $sql = "select idPuesto from Puesto where correo = '$InputEmail' and contrasena = '$InputPassword'";
          $ejecucion = $con->query($sql);
          $resEjecucion = $ejecucion -> fetch_assoc();
          $id = $resEjecucion["idPuesto"];
          echo $id;

          if($id > 0){
            $Puesto = DAOTraerPuesto::informacionPerfil($con, $id);

            $_SESSION["Puesto"] = serialize ($Puesto);
            DAOConexion::cerrar($con);
            header("Location: puesto/principalPuesto.php");
          }else{
            echo "<h1>Parace que el usuario no está registrado en la tabla Puesto</h1>";
            DAOConexion::cerrar($con);
            header("Location: ../entrar.php?error=1");
          }
        }
      }

?>
