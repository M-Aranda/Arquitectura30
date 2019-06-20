<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Asignatura_Usuario.php");

require_once("../Model/Usuario.php");
require_once("../Model/Asignatura.php");
require_once("../Model/DAO/DAO_Usuario.php");
require_once("../Model/DAO/DAO_Asignatura.php");

/**
 * Description of DAO_Asignatura_Usuario
 *
 * @author Cheloz
 */
class DAO_Asignatura_Usuario extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_parvulo", "root", "");
    }

    public function create($objeto) {
        $query = "INSERT INTO Asignatura_Usuario VALUES (NULL, '" . $objeto->getUsuario()->getId() . "', " . $objeto->getAsignatura()->getId() . " );";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function delete($id) {
        $query = "DELETE FROM  Asignatura_Usuario WHERE id=" . $id . ";";
        echo $query;
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query = "SELECT * FROM Asignatura_Usuario;";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Asignatura_Usuario();
            $obj->setId($reg[0]);

            $du = new DAO_Usuario();
            $da = new DAO_Asignatura();

            $obj->setUsuario($du->findById($reg[1]));
            $obj->setAsignatura($da->findById($reg[2]));

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function update($objeto) {
        $query = "UPDATE Asignatura_Usuario SET fk_usuario= '" . $objeto->getUsuario()->getId() . "', fk_asignatura=" . $objeto->getAsignatura()->getId() . " "
                . "WHERE id=" . $objeto->getId() . " );";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function buscarTodasLasAsignaturasDelUsuario($idUsuario) {
        $this->c->conectar();
        $query = "SELECT * FROM Asignatura_Usuario WHERE fk_usuario=" . $idUsuario . ";";

        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Asignatura_Usuario();
            $obj->setId($reg[0]);

            $du = new DAO_Usuario();
            $da = new DAO_Asignatura();

            $obj->setUsuario($du->findById($reg[1]));
            $obj->setAsignatura($da->findById($reg[2]));

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function buscarAsignaturaUsuarioPorIdUsuarioeIdAsig($idUsuario, $idAsig) {
        $this->c->conectar();
        $query = "SELECT * FROM Asignatura_Usuario WHERE fk_usuario=" . $idUsuario . " AND fk_asignatura=" . $idAsig . " ;";

       
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Asignatura_Usuario();
            $obj->setId($reg[0]);

            $du = new DAO_Usuario();
            $da = new DAO_Asignatura();

            $obj->setUsuario($du->findById($reg[1]));
            $obj->setAsignatura($da->findById($reg[2]));

            
        }
        $this->c->desconectar();
        return $obj;
    }

}
