<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asignatura_Usuario
 *
 * @author Cheloz
 */
class Asignatura_Usuario {
    
    private $id;
    private $usuario;
    private $asignatura;
    
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getAsignatura() {
        return $this->asignatura;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setAsignatura($asignatura) {
        $this->asignatura = $asignatura;
    }


    
    
}
