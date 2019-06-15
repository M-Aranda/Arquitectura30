<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Cheloz
 */
class Usuario {
    private $id;
    private $nombre;
    private $esProfesor;
    private $rut;
    private $contrasenia;
    private $correo;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEsProfesor() {
        return $this->esProfesor;
    }

    public function getRut() {
        return $this->rut;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEsProfesor($esProfesor) {
        $this->esProfesor = $esProfesor;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
}
