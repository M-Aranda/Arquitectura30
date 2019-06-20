<?php

    require_once("../Model/DAO/DAO_Palabra.php");
    require_once("../Model/Palabra.php");
    require_once ("../Model/Palabra_Asignatura.php");
    require_once ("../Model/DAO/DAO_Palabra_Asignatura.php");
    require_once ("../Model/DAO/DAO_Asignatura.php");
    require_once ("../Model/Asignatura_Usuario.php");
    require_once ("../Model/DAO/DAO_Asignatura_Usuario.php");

    
    
$dau= new DAO_Asignatura_Usuario();



$nombre = $_REQUEST["txtNombre"];
$sigla=$_REQUEST["txtSigla"];
$idAsigntaura=$_REQUEST["cboAsignatura"];
$idUsuario=$_REQUEST["idUsuario"];


$daoAsig= new DAO_Asignatura();
$daoPalabra=new DAO_Palabra();
$daoPalabraAsignatura= new DAO_Palabra_Asignatura();


$palabraNueva= new Palabra();
$palabraNueva->setNombre($nombre);
$palabraNueva->setSigla($sigla);

$daoPalabra->create($palabraNueva);

$idAsigUs=$dau->buscarAsignaturaUsuarioPorIdUsuarioeIdAsig($idUsuario, $idAsigntaura);



$idPalabraMasReciente=$daoPalabra->findIDDePalabraMasReciente();

$palabraDeAsignatura= new Palabra_Asignatura();
$palabraDeAsignatura->setPalabra($daoPalabra->findById($idPalabraMasReciente));
$palabraDeAsignatura->setAsignatura($daoAsig->findById($idAsigUs->getId()));


$daoPalabraAsignatura->create($palabraDeAsignatura);
//$daoPalabraAsignatura->createAlternativo($idPalabraMasReciente, $idAsigntaura);

echo "Creando palabra ".$nombre.". Asignando palabra".$nombre." a "
        . " asignatura ".$palabraDeAsignatura->getAsignatura()->getNombre()."";


header("location: ../View/index_palabras.php");