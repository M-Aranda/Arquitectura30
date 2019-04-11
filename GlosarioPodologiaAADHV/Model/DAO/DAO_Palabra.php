<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO_Palabra
 *
 * @author Cheloz
 */
class DAO_Palabra extends Conexion implements DAO{
    //put your code here
    public function create(Palabra $palabra) {
        
    }

    public function delete($id) {
        
    }

    public function read() {
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * FROM Palabra;";
        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){
            $palabra = new Palabra();
            $palabra->setId($obj->id_tipo_vehiculo);
            $palabra->setNombre($obj->nombre_tipo_vehiculo);
            array_push($lista,$palabra);
        }
        $this->c->desconectar();
        return $lista;
        
    }

    public function update(Palabra $palabra) {
        
    }

}
