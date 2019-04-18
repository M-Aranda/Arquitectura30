<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Palabra
 *
 * @author Cheloz
 */
class Palabra {
    private $id;
    private $nombre;
    private $sigla;

        
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

   public  function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }
    
    
    
    
}
