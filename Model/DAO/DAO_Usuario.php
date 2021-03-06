<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Usuario.php");

class DAO_Usuario extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_parvulo",
                "root",
                "");
    }

    public function create($objeto) {
        $query = "INSERT INTO Usuario VALUES (NULL, '" . $objeto->getNombre() . "', " . $objeto->getEsProfesor() . ",  '" . $objeto->getRut() . "'"
                . ", '" . $objeto->getContrasenia() . "', '" . $objeto->getCorreo() . "'   );";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function delete($id) {
        $query = "DELETE FROM  Usuario WHERE id=" . $id . ";";
        echo $query;
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query = "SELECT * FROM Usuario;";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Usuario();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setEsProfesor($reg[2]);
            $obj->setRut($reg[3]);
            $obj->setContrasenia($reg[4]);
            $obj->setCorreo($reg[5]);


            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function checkUser($usuario, $password) {
        $check;

        $query = "SELECT * FROM Usuario WHERE rut = '$usuario' AND "
                . "contrasenia = '$password'";
        $usuario = null;

        $this->c->conectar();
        $rs = $this->c->ejecutar($query);
        if ($reg = $rs->fetch_array()) {
            $usuario = new Usuario($reg[0], $reg[1], $reg[2], $reg[3], $reg[4], $reg[5]);
        }
        $this->c->desconectar();

        if (!$usuario == null) {
            $check = true;
        } else {
            $check = false;
        }

        return $check;
    }

    public function fetchUser($requestedUser, $password) {
        $usuario = null;

        $query = "SELECT * FROM Usuario WHERE rut = '$requestedUser' AND "
                . "contrasenia = '$password'";

        $this->c->conectar();
        $rs = $this->c->ejecutar($query);
        if ($reg = $rs->fetch_array()) {
            $usuario = new Usuario();
            $usuario->setId($reg[0]);
            $usuario->setNombre($reg[1]);
            $usuario->setEsProfesor($reg[2]);
            $usuario->setRut($reg[3]);
            $usuario->setContrasenia($reg[4]);
            $usuario->setCorreo($reg[5]);
        }
        $this->c->desconectar();

        return $usuario;
    }

    public function update($objeto) {
        $query = " UPDATE Usuario SET  nombre='" . $objeto->getNombre() . "', esProfesor= " . $objeto->getEsProfesor() . ",  rut= '" . $objeto->getRut() . "'"
                . ", contrasenia='" . $objeto->getContrasenia() . "', correo='" . $objeto->getCorreo() . "' WHERE id=" . $objeto->getId() . "   ;";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function validacionLogin($rut) {
        $this->c->conectar();
        $query = "SELECT * FROM Usuario WHERE rut = '$rut'";
        $rs = $this->c->ejecutar($query);

        $usuario = null;

        if ($reg = $rs->fetch_array()) {
            $usuario = new Usuario($reg[0], $reg[1], $reg[2], $reg[3], $reg[4], $reg[5]);
        }

        $this->c->desconectar();
        return $usuario;
    }

    public function readLogin($rut) {
        $this->c->conectar();

        $query = "SELECT * FROM Usuario WHERE rut = '$rut'";

        $listaUsuario = array();

        $rs = $this->c->ejecutar($query);

        while ($reg = $rs->fetch_array()) {

            $usuario = new Usuario();

            $usuario->setId($reg[0]);
            $usuario->setNombre($reg[1]);
            $usuario->setEsProfesor($reg[2]);
            $usuario->setRut($reg[3]);
            $usuario->setContrasenia($reg[4]);
            $usuario->setCorreo($reg[5]);

            $listaUsuario[] = $usuario;
        }

        $this->c->desconectar();
        return $listaUsuario;
    }

    public function findById($id) {
        $this->c->conectar();
        $query = "SELECT * FROM Usuario WHERE id=" . $id . " ;";
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Usuario();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setEsProfesor($reg[2]);
            $obj->setRut($reg[3]);
            $obj->setContrasenia($reg[4]);
            $obj->setCorreo($reg[5]);
        }
        $this->c->desconectar();
        return $obj;
    }

    public function existeUser($nombre, $run) {
        $query = "SELECT COUNT(*) FROM Usuario WHERE nombre = '$nombre' AND rut = '$run'";
        $this->c->conectar();
        $rs = $this->c->ejecutar($query);

        $existe = false;

        if ($reg = $rs->fetch_array()) {
            if ($reg[0] == 1) {
                $existe = true;
            }
        }

        $this->c->desconectar();
        return $existe;
    }

    public function fetchUserNombreIdByAnio($id_anio, $id_asignatura) {
        $this->c->conectar();
        $query = "CALL return_usuario_by_ingreso_and_asignatura($id_anio, $id_asignatura);";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Usuario();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

}
