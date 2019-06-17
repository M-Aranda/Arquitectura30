<?php

    require_once("../Model/DAO/DAO_Palabra.php");
    require_once("../Model/Palabra.php");
    require_once ("../Model/Palabra_Asignatura.php");
    require_once ("../Model/DAO/DAO_Palabra_Asignatura.php");
    



$nombre = $_REQUEST["txtNombre"];
$sigla=$_REQUEST["txtSigla"];
$idAsigntaura=$_REQUEST["cboAsignatura"];



$daoPalabra=new DAO_Palabra();
$daoPalabraAsignatura= new DAO_Palabra_Asignatura();


$palabraNueva= new Palabra();
$palabraNueva->setNombre($nombre);
$palabraNueva->setSigla($sigla);

$daoPalabra->create($palabraNueva);


$idPalabraMasReciente=$daoPalabra->findIDDePalabraMasReciente();

$palabraDeAsignatura= new Palabra_Asignatura();
$palabraDeAsignatura->setPalabra($daoPalabra->findById($idPalabraMasReciente));
$palabraDeAsignatura->setAsignatura($idAsigntaura);


//$daoPalabraAsignatura->create($palabraDeAsignatura);
$daoPalabraAsignatura->createAlternativo($idPalabraMasReciente, $idAsigntaura);


header("location: ../View/index_palabras.php");