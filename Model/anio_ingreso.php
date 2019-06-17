<?php

class anio_ingreso {
    private $id;
    private $anio;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }
}
