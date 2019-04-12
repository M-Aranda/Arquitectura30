<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Usuario.php");

class DAO_Usuario extends Conexion implements DAO {
    
    private $c;
    
    public function __construct() {
        $this->c = new Conexion(
        "bd_parvulo",
        "root",
        "");
    }
   
  
 
    public function create($objeto) {
      $query="INSERT INTO Usuario VALUES (NULL, '".$objeto->getNombre()."', ".$objeto->getEsProfesor().",  '".$objeto->getRut()."'"
              . ", '".$objeto->getContrasenia()."', '".$objeto->getCorreo()."'   );"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

    public function delete($id) {
      $query="DELETE FROM  Usuario WHERE id=".$id.";";
      echo $query;
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query="SELECT * FROM Usuario;";
        $listado= array();
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Usuario();
             $obj->setId($reg[0]);
             $obj->setNombre($reg[1]);
             $obj->setEsProfesor($reg[2]);
             $obj->setRut($reg[3]);
             $obj->setContrasenia($reg[4]);
             $obj->setCorreo($reg[5]);
             

             $listado[]=$obj;
         }
         $this->c->desconectar();
         return $listado;
        
        
        
        
    }

    public function update($objeto) {
              $query=" UPDATE Usuario SET  nombre='".$objeto->getNombre()."', esProfesor= ".$objeto->getEsProfesor().",  rut= '".$objeto->getRut()."'"
              . ", contrasenia='".$objeto->getContrasenia()."', correo='".$objeto->getCorreo()."' WHERE id=".$objeto->getId()."   ;"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

}
