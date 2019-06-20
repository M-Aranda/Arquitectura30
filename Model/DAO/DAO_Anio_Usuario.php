<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/anio_usuario.php");

class DAO_anio_usuario extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_parvulo", "root", "");
    }

    public function create($objeto) {
        $query = "INSERT INTO anio_usuario VALUES(NULL, '" . $objeto->getFk_anio_ingreso() . "', "
                . "'" . $objeto->getFk_usuario() . "');";
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function delete($objeto) {
        
    }

    public function read() {
        
    }

    public function update($objeto) {
        
    }

}
