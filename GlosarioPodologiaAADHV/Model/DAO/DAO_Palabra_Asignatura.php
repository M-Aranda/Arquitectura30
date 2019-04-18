<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Palabra_Asignatura.php");

require_once("../Model/Palabra.php");
require_once("../Model/Asignatura.php");
require_once("../Model/DAO_Palabra.php");
require_once("../Model/DAO_Asignatura.php");

/**
 * Description of DAO_Asignatura_Palabra
 *
 * @author Cheloz
 */
class DAO_Palabra_Asignatura extends Conexion implements DAO {
    //put your code here
     
    private $c;
    
    public function __construct() {
        $this->c = new Conexion(
        "bd_parvulo",
        "root",
        "");
    }
    
    public function create($objeto) {
      $query="INSERT INTO Palabra_Asignatura VALUES (NULL, '".$objeto->getPalabra()->getId()."', ".$objeto->getAsignatura()->getId()." );";
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

    public function delete($id) {
      $query="DELETE FROM  Palabra_Asignatura WHERE id=".$id.";";
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query="SELECT * FROM Palabra_Asignatura;";
        $listado= array();
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Asignatura_Usuario();
             $obj->setId($reg[0]);
             
             $dp= new DAO_Palabra();
             $da= new DAO_Asignatura();
             
             $obj->setPalabra($dp->findById($reg[1]));
             $obj->setAsignatura($da->findById($reg[2]));

             $listado[]=$obj;
         }
         $this->c->desconectar();
         return $listado;
        
        
        
        
    }

    public function update($objeto) {
      $query="UPDATE Palabra_Asignatura SET fk_palabra= '".$objeto->getPalabra()->getId()."', fk_asignatura=".$objeto->getAsignatura()->getId()." "
              . "WHERE id=".$objeto->getId()." );";
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }
    
    public function findById($id){
        $this->c->conectar();
        $query="SELECT * FROM Palabra_Asignatura WHERE id= ".$id.";";
      
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Asignatura_Usuario();
             $obj->setId($reg[0]);
             
             $dp= new DAO_Palabra();
             $da= new DAO_Asignatura();
             
             $obj->setPalabra($dp->findById($reg[1]));
             $obj->setAsignatura($da->findById($reg[2]));

             
         }
         $this->c->desconectar();
         return $obj;
        
    }
    

}
