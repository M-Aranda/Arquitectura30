<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Ejemplo.php");
require_once("../Model/Significado.php");
require_once("../Model/DAO/DAO_Significado.php");

/**
 * Description of DAO_Ejemplo
 *
 * @author Cheloz
 */
class DAO_Ejemplo extends Conexion implements DAO{
    
    
    private $c;
    
    public function __construct() {
        $this->c = new Conexion(
        "bd_parvulo",
        "root",
        "");
    }
    
 public function create($objeto) {
      $query="INSERT INTO Ejemplo VALUES (NULL, '".$objeto->getFraseExplicativa()."', ".$objeto->getUrl_imagen().",  '".$objeto->getSignificado()."');"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

    public function delete($id) {
      $query="DELETE FROM  Ejemplo WHERE id=".$id.";";
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
             $obj= new Usuario();
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
    $query="UPDATE Ejemplo SET fraseExplicativa= '".$objeto->getFraseExplicativa()."', url_imagen= ".$objeto->getUrl_imagen().", fk_significado= ".$objeto->getSignificado()->getId()." WHERE id=".$objeto->getId()." );";
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();   
    }

    
  
  
      
    public function findById($id){
        $this->c->conectar();
        $query="SELECT * FROM Significado WHERE id=".$id." ;";
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Usuario();
             $obj->setId($reg[0]);
             $obj->setDescripcion($reg[1]);
             $obj->setDefinicionRecomendada($reg[2]);
             $obj->setPalabra_asignatura($reg[3]);

             
         }
         $this->c->desconectar();
         return $obj;
        
    }

}
