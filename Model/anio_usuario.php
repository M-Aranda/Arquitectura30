<?php

class anio_usuario {
    private $id;
    private $fk_anio_ingreso;
    private $fk_usuario;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getFk_anio_ingreso() {
        return $this->fk_anio_ingreso;
    }

    public function getFk_usuario() {
        return $this->fk_usuario;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFk_anio_ingreso($fk_anio_ingreso) {
        $this->fk_anio_ingreso = $fk_anio_ingreso;
    }

    public function setFk_usuario($fk_usuario) {
        $this->fk_usuario = $fk_usuario;
    }
}
