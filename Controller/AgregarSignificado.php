<?php

require_once ("../Model/DAO/DAO_Significado.php");
require_once ("../Model/Significado.php");
require_once ("../Model/DAO/DAO_Palabra_Asignatura.php");
require_once ("../Model/Palabra_Asignatura.php");

$signficadoAAgregar = $_REQUEST["significadoAAgregar"];
$idDePalabra = $_REQUEST["idDePalabra"];
$idAsig = $_REQUEST["idAsig"];



$dao_pal_asig_us = new DAO_Palabra_Asignatura();

$s = new Significado();
$s->setDefinicionRecomendada(0);
$s->setDescripcion($signficadoAAgregar);



echo "la asig tiene un id de ".$idAsig;

$s->setPalabra_asignatura($dao_pal_asig_us->findByfkPalabrayFkAsignaturaUsuario($idDePalabra, $idAsig));




$ds = new DAO_Significado();
$ds->create($s);






header('Location: ../View/index_palabras.php');
