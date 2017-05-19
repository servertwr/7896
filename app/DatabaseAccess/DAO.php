<?php

  class DAOConexion{
    static function crear($usuario, $clave, $host, $base)
    {
      $con = new mysqli($host, $usuario, $clave, $base) or die ("Hubo un problema al acceder a los datos :(");
      mysqli_set_charset($con, "utf8");
      return $con;
    }

    static function usuario()
    {
      $host = "localhost";
      $usuario = "taco";
      $clave = "taco";
      $base = "taconnecta";
      $con = new mysqli($host, $usuario, $clave, $base) or die ("Hubo un problema al acceder a los datos :(");
      mysqli_set_charset($con, "utf8");
            return $con;
    }

    static function puesto()
    {
      $host = "localhost";
      $usuario = "taco";
      $clave = "taco";
      $base = "taconnecta";
      $con = new mysqli($host, $usuario, $clave, $base) or die ("Hubo un problema al acceder a los datos :(");
      mysqli_set_charset($con, "utf8");
            return $con;
    }

    static function cerrar($conexion){
      $conexion->close();
    }

  }

  class DAOTraer{
    static function informacionPerfil($conexion, $id){
      $sql = "select idUsuario, nombre, apellido, correo, usuario from Cliente where idUsuario = '$id'";
      $ejecucion = $conexion->query($sql);
      //$ejecucion = $conexion($sql);

      $resEjecucion = $ejecucion -> fetch_assoc();
      $apellido = $resEjecucion["apellido"];
      echo $apellido;

      $UserInfo = new UserProfile($resEjecucion["idUsuario"],
                                  $resEjecucion["nombre"],
                                  $resEjecucion["apellido"],
                                  $resEjecucion["correo"],
                                  $resEjecucion["usuario"]);

      return $UserInfo;
    }
  }

  class UserProfile{
    private $Id;
    private $Name;
    private $Surname;
    private $Email;
    private $User;

    public function __construct($Id, $Name, $Surname, $Email, $User)
    {
        echo 'Construyendo objeto';
        $this->setId($Id);
        $this->setName($Name);
        $this->setSurname($Surname);
        $this->setEmail($Email);
        $this->setUser($User);
    }

    public function setId($Id){$this->Id = $Id;}
    public function setName($Name){$this->Name = $Name;}
    public function setSurname($Surname){$this->Surname = $Surname;}
    public function setEmail($Email){$this->Email = $Email;}
    public function setUser($User){$this->User = $User;}

    public function getId(){return $this->Id;}
    public function getName(){return $this->Name;}
    public function getSurname(){return $this->Surname;}
    public function getEmail(){return $this->Email;}
    public function getUser(){return $this->User;}

  }



?>
