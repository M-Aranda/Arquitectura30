<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ejemplo
 *
 * @author Cheloz
 */
class Ejemplo {
    private $id;
    private $DescripcionEj;
    private $palabra;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDescripcionEj() {
        return $this->DescripcionEj;
    }

    public function getPalabra() {
        return $this->palabra;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcionEj($DescripcionEj) {
        $this->DescripcionEj = $DescripcionEj;
    }

    public function setPalabra($palabra) {
        $this->palabra = $palabra;
    }



    
}
