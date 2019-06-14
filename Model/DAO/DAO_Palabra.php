<?php
require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Palabra.php");


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


    private $c;
    
    public function __construct() {
        $this->c = new Conexion(
        "bd_parvulo",
        "root",
        "");
    }
 
    
    
    public function create($objeto) {
      $query="INSERT INTO Palabra VALUES (NULL, '".$objeto->getNombre()."', '".$objeto->getSigla()."' );"; 
     
 
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

    public function update($objeto) {
      $query="UPDATE Palabra SET nombre='".$objeto->getNombre()."', sigla='".$objeto->getSigla()."' WHERE id=".$objeto->getId().";"; 
     
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
    
    
    
        public function buscarPalabrasPorFkUsuarioYFkAsignatura($fk_usuario, $fk_asignatura) {
        
        $this->c->conectar();
        $query="SELECT palabra.id, palabra.nombre, palabra.sigla FROM Palabra, Asignatura_Usuario, Palabra_Asignatura_Usuario
        WHERE Asignatura_Usuario.fk_usuario = ".$fk_usuario." AND Palabra_Asignatura_Usuario.fk_asignatura_usuario=".$fk_asignatura.";";
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

}
