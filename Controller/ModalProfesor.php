<?php

require_once ("../Model/DAO/DAO_Usuario.php");

$id_ingreso = $_REQUEST["id_ingreso"] + 1;
$id_asignatura = $_REQUEST["id_asignatura"] + 1;

$daoAlumno = new DAO_Usuario();
$listAlumnos = $daoAlumno->fetchUserNombreIdByAnio($id_ingreso, $id_asignatura);

foreach($listAlumnos as $alumno){
    $id_alumno = $alumno->getId();
    echo 
        "<div class='modal fade' id='modal$id_alumno' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
            . "<div class='modal-dialog' role='document'>"
                . "<div class='modal-content'>"
                    . "<div class='modal-header'>"
                        . "<h5 class='modal-title' id='exampleModalLabel'>Listado de Palabras</h5>"
                        . "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                            . "<span aria-hidden='true'>&times;</span>"
                        . "</button>"
                    . "</div>"
                    . "<div class='modal-body'>"
                        . "<table class='table table-bordered'"
                            . "<thead>"
                                . "<tr>"
                                    . "<th scope='col'>#</th>"
                                    . "<th scope='col'>Palabra</th>"
                                    . "<th scope='col'>Significados</th>"
                                . "</tr>"
                            . "</thead>"
                            . "<tbody>"
                                . "<tr>"
                                    . "<th scope='row'>1</th>"
                                    . "<td>Mark</td>"
                                    . "<td>"
                                        . "<table class='table table-bordered'>"
                                            . "<thead>"
                                                . "<tr>"
                                                    . "<th scope='col'>#</th>"
                                                    . "<th scope='col'>Descripción</th>"
                                                    . "<th scope='col'>Ver Ejemplos</th>"
                                                    . "<th scope='col'>Recomendar</th>"
                                                . "</tr>"
                                            . "</thead>"
                                        . "</table>"
                                    . "</td>"
                                . "</tr>"
                            . "</tbody>"
                        . "</table>"
                    . "</div>"
                    . "<div class='modal-footer'>"
                        . "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>"
                    . "</div>"
                . "</div>"
            . "</div>"
        . "</div>";
}