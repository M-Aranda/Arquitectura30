<?php

require_once ("../Model/DAO/DAO_Usuario.php");

$id_ingreso = $_REQUEST["id_ingreso"] + 1;
$id_asignatura = $_REQUEST["id_asignatura"] + 1;

$dao = new DAO_Usuario();
$listAlumnos = $dao->fetchUserNombreIdByAnio($id_ingreso, $id_asignatura);

foreach($listAlumnos as $alumno){
    echo "<tr>"
            . "<td>"
                . $alumno->getNombre()
            . "</td>"
            . "<td>"
                . "<button type='button' class='btn btn-outline-dark btn-block'>"
                . "Evaluar"
                . "</button>"
            . "</td>"
       . "</tr>";
}