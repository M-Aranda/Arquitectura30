<?php

require_once ("../Model/anio_ingreso.php");
require_once ("../Model/DAO/DAO_anio_ingreso.php");

$dao = new DAO_anio_ingreso();
$listAnio = $dao->read();

foreach ($listAnio as $anioIngreso) {
    echo "<option>".$anioIngreso->getAnio()."</option>";
}