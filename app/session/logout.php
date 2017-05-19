<?php
  session_start();
      include "../DatabaseAccess/DAO.php";


      session_destroy();
	header("Location: ../principal.php");


?>
