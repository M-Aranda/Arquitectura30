<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Significado
 *
 * @author Cheloz
 */
class Significado {
    private $id;
    private $definicion;
    private $palabra;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDefinicion() {
        return $this->definicion;
    }

    public function getPalabra() {
        return $this->palabra;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDefinicion($definicion) {
        $this->definicion = $definicion;
    }

   public  function setPalabra($palabra) {
        $this->palabra = $palabra;
    }



}
