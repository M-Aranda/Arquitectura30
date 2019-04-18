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
    private $fraseExplicativa;
    private $url_imagen;
    private $significado;
    
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getFraseExplicativa() {
        return $this->fraseExplicativa;
    }

    public function getUrl_imagen() {
        return $this->url_imagen;
    }

    public function getSignificado() {
        return $this->significado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFraseExplicativa($fraseExplicativa) {
        $this->fraseExplicativa = $fraseExplicativa;
    }

    public function setUrl_imagen($url_imagen) {
        $this->url_imagen = $url_imagen;
    }

    public function setSignificado($significado) {
        $this->significado = $significado;
    }



    
}
