<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Significado.php");

require_once("../Model/Palabra_Asignatura.php");
require_once("../Model/DAO/DAO_Palabra_Asignatura.php");


/**
 * Description of DAO_Significado
 *
 * @author Cheloz
 */
class DAO_Significado extends Conexion implements DAO {

     private $c;
    
    public function __construct() {
        $this->c = new Conexion(
        "bd_parvulo",
        "root",
        "");
    }
   
  
 
    public function create($objeto) {
      $query="INSERT INTO Significado VALUES (NULL, '".$objeto->getDescripcion()."', ".$objeto->getDefinicionRecomendada().",  '".$objeto->getPalabra_asignatura()->getId()."');"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

    public function delete($id) {
      $query="DELETE FROM  Significado WHERE id=".$id.";";
      echo $query;
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query="SELECT * FROM Significado ;";
        $listado= array();
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Significado();
             $obj->setId($reg[0]);
             $obj->setDescripcion($reg[1]);
             $obj->setDefinicionRecomendada($reg[2]);
             $dap= new DAO_Palabra_Asignatura();
             $obj->setPalabra_asignatura($dap->findById($reg[3]));

             $listado[]=$obj;
         }
         $this->c->desconectar();
         return $listado;  
        
    }

    public function update($objeto) {
    $query="UPDATE Significado SET descripcion= '".$objeto->getDescripcion()."', definicionRecomendada=".$objeto->getDefinicionRecomendada().", fk_palabra_asignatura= ".$objeto->getPalabra_asignatura()->getId()." WHERE id="
            . " ".$objeto->getId().";"; 

     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

    
  
  
      
    public function findById($id){
        $this->c->conectar();
        $query="SELECT * FROM Significado WHERE id=".$id." ;";
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Significado();
             $obj->setId($reg[0]);
             $obj->setDescripcion($reg[1]);
             $obj->setDefinicionRecomendada($reg[2]);
             
             $dpa= new DAO_Palabra_Asignatura();
             $obj->setPalabra_asignatura($dpa->findById($reg[3]));

             
         }
         $this->c->desconectar();
         return $obj;
        
    }

}
