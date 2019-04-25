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
    private $descripcion;
    private $definicionRecomendada;
    private $palabra_asignatura;
    
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDefinicionRecomendada() {
        return $this->definicionRecomendada;
    }

    public function getPalabra_asignatura() {
        return $this->palabra_asignatura;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setDefinicionRecomendada($definicionRecomendada) {
        $this->definicionRecomendada = $definicionRecomendada;
    }

    public function setPalabra_asignatura($palabra_asignatura) {
        $this->palabra_asignatura = $palabra_asignatura;
    }


   


}
