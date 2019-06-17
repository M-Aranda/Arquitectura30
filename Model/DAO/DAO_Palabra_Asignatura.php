<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Palabra_Asignatura.php");

require_once("../Model/Palabra.php");
require_once("../Model/Asignatura.php");
require_once("../Model/DAO/DAO_Palabra.php");
require_once("../Model/DAO/DAO_Asignatura.php");

/**
 * Description of DAO_Asignatura_Palabra
 *
 * @author Cheloz
 */
class DAO_Palabra_Asignatura extends Conexion implements DAO {

    //put your code here

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_parvulo", "root", "");
    }

    public function create($objeto) {

        $query = "INSERT INTO Palabra_Asignatura_Usuario VALUES (NULL, " . $objeto->getPalabra()->getId() . ", " . $objeto->getAsignatura()->getId() . " );";
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    //por alguna razón el create de arriba me pasa strings en vez de los objetos palabra y asignatura, así que hice este.
    public function createAlternativo($idPal, $idAsig) {

        $query = "INSERT INTO Palabra_Asignatura_Usuario VALUES (NULL, " . $idPal . ", " . $idAsig . " );";
        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function delete($id) {
        $query = "DELETE FROM  Palabra_Asignatura_Usuario WHERE id=" . $id . ";";


        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query = "SELECT * FROM Palabra_Asignatura_Usuario;";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Palabra_Asignatura();
            $obj->setId($reg[0]);

            $dp = new DAO_Palabra();
            $da = new DAO_Asignatura();

            $obj->setPalabra($dp->findById($reg[1]));
            $obj->setAsignatura($da->findById($reg[2]));

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function update($objeto) {
        $query = "UPDATE Palabra_Asignatura_Usuario SET fk_palabra= " . $objeto->getPalabra()->getId() . ", fk_asignatura=" . $objeto->getAsignatura()->getId() . " "
                . "WHERE id=" . $objeto->getId() . " ;";
        echo $query;

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function findById($id) {
        $this->c->conectar();
        $query = "SELECT * FROM Palabra_Asignatura_Usuario WHERE id= " . $id . ";";

        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Palabra_Asignatura();
            $obj->setId($reg[0]);

            $dp = new DAO_Palabra();
            $da = new DAO_Asignatura();

            $obj->setPalabra($dp->findById($reg[1]));
            $obj->setAsignatura($da->findById($reg[2]));
        }
        $this->c->desconectar();
        return $obj;
    }

    public function findByfkPalabrayFkAsignaturaUsuario($fkPal, $fkAsig) {
        $this->c->conectar();
        $query = "SELECT Palabra_Asignatura_Usuario.id, Palabra_Asignatura_Usuario.fk_palabra, Palabra_Asignatura_Usuario.fk_asignatura_usuario  FROM Palabra,Palabra_Asignatura_Usuario , Asignatura_Usuario, Usuario, Asignatura WHERE Usuario.id=Asignatura_Usuario.fk_usuario AND
        Asignatura_Usuario.fk_asignatura=Asignatura.id AND Palabra.id=Palabra_Asignatura_Usuario.fk_palabra AND Asignatura_Usuario.id=Palabra_Asignatura_Usuario.fk_asignatura_usuario
        AND Palabra.id=" . $fkPal . " AND Asignatura.id=" . $fkAsig . ";";

        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Palabra_Asignatura();
            $obj->setId($reg[0]);

            $dp = new DAO_Palabra();
            $da = new DAO_Asignatura();

            $obj->setPalabra($dp->findById($reg[1]));
            $obj->setAsignatura($da->findById($reg[2]));
        }
        $this->c->desconectar();
        return $obj;
    }

}
