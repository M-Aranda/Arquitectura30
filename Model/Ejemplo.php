<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * La clase Ejemplo, que puede tener varios significados.
 *
 * @author Cheloz
 */
class Ejemplo {
    /**
     * @var String El id que lleva el ejmplo en la base de datos 
     */
    private $id;
    /**
     * @var String La frase que explica el ejemplo.
     */
    private $fraseExplicativa;
    /**
     *
     * @var String La url de la imágen que corresponde al ejemplo.
     */
    private $url_imagen;
    /**
     *
     * @var Significado El objeto de clase Significado que corresponde al ejemplo. 
     */
    private $significado;
    
    /**
     * El constructor vacío de la clase
     */
    public function __construct() {
        
    }
    
    /**
     *Retorna el id del ejemplo.
     * 
     * @return  int
     *
     * 
     */
    
    public function getId() {
        return $this->id;
        
    }

    
    /**
     * Retorna la frase que explica el ejemplo.
     * @return  String
     * 
     */
    public function getFraseExplicativa() {
        return $this->fraseExplicativa;
       
    }
    /**
     * Retorna la url de la imágen.
     * @return  String
     */

    public function getUrl_imagen() {
        return $this->url_imagen;
    }

    /**
     * Retorna el significado del ejemplo.
     * @return  Significado
     */
    public function getSignificado() {
        return $this->significado;
    }

    
    /**
     * Establece el id del ejemplo.
     * @param type $id El id del ejemplo como int.
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Establece la frase explicativa del ejemlpo.
     * @param type $fraseExplicativa La frase explicativa como String.
     */
    public function setFraseExplicativa($fraseExplicativa) {
        $this->fraseExplicativa = $fraseExplicativa;
    }

    /**
     * Establece la url de la imágen del ejemplo.
     * @param type $url_imagen La url de la imágen que corresponde al ejemplo
     */
    public function setUrl_imagen($url_imagen) {
        $this->url_imagen = $url_imagen;
        
    }

    /**
     * Establece el significado del ejemplo.
     * @param type $significado El signficado del ejemplo.
     */
    public function setSignificado($significado) {
        $this->significado = $significado;
     
    }



    
}
