<?php

/**
 * @author jvlee6
 */
require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Asignatura.php");

class DAO_Asignatura extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_parvulo",
                "root",
                "");
    }

    public function create($objeto) {
        $query = "INSERT INTO Asignatura VALUES(NULL, '" . $objeto->getNombre() . "', "
                . "'" . $objeto->getCodigo() . "');";
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function delete($id) {
        $query = "DELETE FROM Asignatura WHERE id=" . $id . ";";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query = "SELECT * FROM Asignatura;";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Asignatura();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setCodigo($reg[2]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function update($objeto) {
        $query="UPDATE Asignatura SET "
                . "nombre='".$objeto->getNombre()."',"
                . "codigo=".$objeto->getCodigo()
                . " WHERE id=".$objeto->getId().";";
        
        
        
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    
        public function findById($id) {
        $this->c->conectar();
        $query = "SELECT * FROM Asignatura WHERE id= ".$id.";";
        
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Asignatura();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setCodigo($reg[2]);
        }
        $this->c->desconectar();
        return $obj;
    }
    
}
