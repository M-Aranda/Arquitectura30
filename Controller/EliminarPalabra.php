<?php
require_once('../Model/Palabra.php');
require_once('../Model/DAO/DAO_Palabra.php');
require_once('../Model/DAO/DAO_Palabra_Asignatura.php');
require_once('../Model/DAO/DAO_Significado.php');
require_once('../Model/DAO/DAO_Ejemplo.php');
require_once('../Model/Significado.php');
require_once('../Model/Ejemplo.php');
require_once('../Model/Palabra_Asignatura.php');


$idPal=$_REQUEST["idPalabra"];
$idAsigPal=$_REQUEST["idAsigPalabra"];


$dpa= new DAO_Palabra_Asignatura();
$ds= new DAO_Significado();
$de= new DAO_Ejemplo();

echo $idAsigPal;
$asigPalUsuario=$dpa->findById($idAsigPal);
$listadoDeSignificados=$ds->readTodosLosSignificadosDeUnaPalabraEnLaAsignaturaDeUnUsuario($asigPalUsuario->getId());


foreach ($listadoDeSignificados as $sig) {
    $de->deleteTodosLosEjemplosDeUnSignificado($sig->getId());
}

foreach ($listadoDeSignificados as $s) {
    $ds->deleteSignificadoByFKAsig($s->getPalabra_asignatura()->getId());
}


$dpa->delete($idAsigPal);




header("location: ../View/index_palabras.php");