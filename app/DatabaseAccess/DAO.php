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
    static function categorias($conexion){
      $consulta = $conexion->query("select idCategoria, nombreCat  from Categoria");
			$bebida = array();
			$i=0;
			foreach($consulta as $bebidas){
                $bebida[$i] = $bebidas;
                $i++;
      }
      return $bebida;
    }

    static function subCategorias($conexion, $idCategoria){
      //echo "Entrando a subtafdsd $idCategoria";
      $consulta = $conexion->query("select idSubCategoria, nombreSub, idCat  from SubCategoria where idCat = {$idCategoria}");
			$bebida = array();
			$i=0;
			foreach($consulta as $bebidas){
                $bebida[$i] = $bebidas;
                $i++;
      }
      return $bebida;
      //return 1;
    }
  }




  class DAOTraerCliente{
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
    private $IdCli;
    private $Name;
    private $Surname;
    private $Email;
    private $User;

    public function __construct($IdCli, $Name, $Surname, $Email, $User)
    {
        echo 'Construyendo objeto';
        $this->setIdCli($IdCli);
        $this->setName($Name);
        $this->setSurname($Surname);
        $this->setEmail($Email);
        $this->setUser($User);
    }

    public function setIdCli($IdCli){$this->IdCli = $IdCli;}
    public function setName($Name){$this->Name = $Name;}
    public function setSurname($Surname){$this->Surname = $Surname;}
    public function setEmail($Email){$this->Email = $Email;}
    public function setUser($User){$this->User = $User;}

    public function getIdCli(){return $this->IdCli;}
    public function getName(){return $this->Name;}
    public function getSurname(){return $this->Surname;}
    public function getEmail(){return $this->Email;}
    public function getUser(){return $this->User;}

  }

  class DAOTraerPuesto{
    static function informacionPerfil($conexion, $id){

      $sql = "select idPuesto, nPuesto, nResponsable, horario, telContacto, descripcion, idSub, correo from Puesto where idPuesto = '$id'";
      $ejecucion = $conexion->query($sql);

      $resEjecucion = $ejecucion -> fetch_assoc();
      $nPuesto = $resEjecucion["nPuesto"];
      echo $nPuesto;

      $UserInfo = new PuestoProfile($resEjecucion["idPuesto"],
                                  $resEjecucion["nPuesto"],
                                  $resEjecucion["nResponsable"],
                                  $resEjecucion["horario"],
                                  $resEjecucion["telContacto"],
                                  $resEjecucion["descripcion"],
                                  $resEjecucion["idSub"],
                                  $resEjecucion["correo"]);

      return $UserInfo;
    }
  }

  class PuestoProfile{
    private $idPuesto;
    private $nPuesto;
    private $nResponsable;
    private $horario;
    private $telContacto;
    private $descripcion;
    private $idSub;
    private $correo;

    public function __construct($idPuesto, $nPuesto, $nResponsable, $horario, $telContacto, $descripcion, $idSub, $correo)
    {
        echo 'Construyendo objeto';
        $this->setIdPuesto($idPuesto);
        $this->setnPuesto($nPuesto);
        $this->setnResponsable($nResponsable);
        $this->sethorario($horario);
        $this->settelContacto($telContacto);
        $this->setdescripcion($descripcion);
        $this->setidSub($idSub);
        $this->setcorreo($correo);

    }

    public function setIdPuesto($idPuesto){$this->idPuesto = $idPuesto;}
    public function setnPuesto($nPuesto){$this->nPuesto = $nPuesto;}
    public function setnResponsable($nResponsable){$this->nResponsable = $nResponsable;}
    public function sethorario($horario){$this->horario = $horario;}
    public function settelContacto($telContacto){$this->telContacto = $telContacto;}
    public function setdescripcion($descripcion){$this->descripcion = $descripcion;}
    public function setidSub($idSub){$this->idSub = $idSub;}
    public function setcorreo($correo){$this->correo = $correo;}


    public function getIdPuesto(){return $this->idPuesto;}
    public function getnPuesto(){return $this->nPuesto;}
    public function getnResponsable(){return $this->nResponsable;}
    public function gethorario(){return $this->horario;}
    public function gettelContacto(){return $this->telContacto;}
    public function getdescripcion(){return $this->descripcion;}
    public function getidSub(){return $this->idSub;}
    public function getcorreo(){return $this->correo;}


  }



?>
