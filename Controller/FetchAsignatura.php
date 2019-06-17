<?php

require_once ("../Model/DAO/DAO_Asignatura.php");

$dao = new DAO_Asignatura();
$listAsignatura = $dao->read();

foreach($listAsignatura as $asignatura){
    echo "<option>".$asignatura->getNombre()."</option>";
}