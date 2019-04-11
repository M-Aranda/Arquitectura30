<?php
require_once("DAO.php");
require_once("..Model/Conexion.php");

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

   
    
    
    
    
    public function create(Object $palabra) {
        
    }

    public function delete(Object $id) {
        
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

             $listado[]=$info;
         }
         $this->c->desconectar();
         return $listado;
        
    }

    public function update(Object $palabra) {
        
    }

}
