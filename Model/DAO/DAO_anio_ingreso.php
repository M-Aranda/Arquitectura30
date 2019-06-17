<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/anio_ingreso.php");

class DAO_anio_ingreso extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_parvulo",
                "root",
                "");
    }

    public function create($objeto) {
        
    }

    public function delete($objeto) {
        
    }

    public function read() {
        $this->c->conectar();
        $query = "SELECT * FROM anio_ingreso;";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new anio_ingreso();
            $obj->setId($reg[0]);
            $obj->setAnio($reg[1]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function update($objeto) {
        
    }

}
