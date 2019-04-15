<?php
/**
 * @author jvlee6
 */

class Asignatura {
    private $id;
    private $nombre;
    private $codigo;
    
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
}
