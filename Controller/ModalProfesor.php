<?php

require_once ("../Model/DAO/DAO_Usuario.php");
require_once ("../Model/DAO/DAO_Palabra.php");
require_once ("../Model/DAO/DAO_Significado.php");

$id_ingreso = $_REQUEST["id_ingreso"] + 1;
$id_asignatura = $_REQUEST["id_asignatura"] + 1;

$daoAlumno = new DAO_Usuario();
$daoPalabra = new DAO_Palabra();
$daoSignificado = new DAO_Significado();

$listAlumnos = $daoAlumno->fetchUserNombreIdByAnio($id_ingreso, $id_asignatura);

foreach($listAlumnos as $alumno){
    $id_alumno = $alumno->getId();
    $listPalabras = $daoPalabra->buscarPalabrasPorFkUsuarioYFkAsignatura($id_alumno, $id_asignatura);
    
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
                        . "<table class='table' border='1'>"
                            . "<thead class='thead-dark'>"
                                . "<tr>"
                                    . "<th scope='col'>#</th>"
                                    . "<th scope='col'>Palabra</th>"
                                    . "<th scope='col'>Significados</th>"
                                . "</tr>"
                            . "</thead>"
                            . "<tbody>";
                                    foreach ($listPalabras as $palabra) {
                                        $idPalabra = $palabra->getId();
                                        $palabraActual = $palabra->getNombre();
                                        $listSignificados = $daoSignificado->buscarSignificadosAsociadoAIdDePalabra($idPalabra);
                                        
                                       echo 
                                        "<tr>"
                                            . "<th scope='row'>$idPalabra</th>"
                                            . "<td>$palabraActual</td>"
                                            . "<td>"
                                                . "<table class='table'>"
                                                   . "<thead>"
                                                    . "<tr>"
                                                        . "<th scope='col'>#</th>"
                                                        . "<th scope='col'>Descripción</th>"
                                                        . "<th scope='col'>Recomendar</th>"
                                               . "<th scope='col'>Ya recomendada?</th>"
                                                    . "</tr>"
                                                   . "</thead>"
                                                   . "<tbody>";
                                       $contador=1;
                                                        foreach ($listSignificados as $significado) {
                                                            echo 
                                                            "<tr>"
                                                                . "<td>".$contador
                                                                . "</td>"."<td>".$significado->getDescripcion()."</td>".""
                                                                    . "<td> <form name='recomendar_form' method='post' action='../Controller/RecomendarSig.php'  " 
                                                                    . "'><input type='hidden' name='idSig' value='".$significado->getId()."'><input class='btn btn-primary' type='submit' value="
                                                                    . "'Recomendar'></form>  </td>"
                                                                    . "<td>";if($significado->getDefinicionRecomendada()==1){
                                                                        echo "Sí";
                                                                    }else{
                                                                        echo "No";
                                                                    }
                                                                   "</td>"; 
                                                             "</tr>";
                                                            $contador++;
                                                        }
                                                   echo "</tbody>"
                                                . "</table>"
                                            . "</td>"
                                      . "</tr>";
                                    }
                            echo "</tbody>"
                        . "</table>"
                    . "</div>"
                    . "<div class='modal-footer'>"
                        . ""
                                    . "<button type='button' class='btn btn-outline-primary' data-dismiss='modal'>Cerrar</button>"
                    . "</div>"
                . "</div>"
                                    
            . "</div>"
        . "</div>";
                            
  
                            
                            
}