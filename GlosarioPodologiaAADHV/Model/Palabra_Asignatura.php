<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asignatura_Palabra
 *
 * @author Cheloz
 */
class Palabra_Asignatura {
    private $id;
    private $palabra;
    private $asignatura;
    
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getPalabra() {
        return $this->palabra;
    }

    public function getAsignatura() {
        return $this->asignatura;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPalabra($palabra) {
        $this->palabra = $palabra;
    }

    public function setAsignatura($asignatura) {
        $this->asignatura = $asignatura;
    }


    
}
