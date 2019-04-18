<?php
require_once("DAO.php");
require_once("..Model/Conexion.php");
require_once("..Model/Palabra.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO_Palabra
 *
 * @author Cheloz
 */
class DAO_Palabra extends Conexion implements DAO{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }

 
    
    
    public function create($palabra) {
      $query="INSERT INTO Palabra VALUES (NULL, '".$objeto->getNombre()."', ".$objeto->getSigla()." );"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();  
        
    }

    public function delete($id) {
      $query="DELETE FROM Palabra WHERE id=".$id." ;"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();  
        
    }

    public function read() {
        
        $this->c->conectar();
        $query="SELECT * FROM Palabra;";
        $listado= array();
        $rs = $this->c->ejecutar($query);
        while($reg = $rs->fetch_array()){
             $obj= new Palabra();
             $obj->setId($reg[0]);
             $obj->setNombre($reg[1]);
             $obj->setSigla($reg[2]);

             $listado[]=$obj;
         }
         $this->c->desconectar();
         return $listado;
        
    }

    public function update($palabra) {
      $query="UPDATE Palabra SET nombre='".$objeto->getNombre()."', sigla=".$objeto->getSigla()." WHERE id=".$palabra->getId().";"; 
     
      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();  
    }
    
        
        public function findById($id) {
        $this->c->conectar();
        $query = "SELECT * FROM Palabra WHERE id= ".$id.";";
        
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Palabra();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setSigla($reg[2]);
        }
        $this->c->desconectar();
        return $obj;
    }

}
