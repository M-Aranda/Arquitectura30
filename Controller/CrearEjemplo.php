<?php

require_once ("../Model/DAO/DAO_Ejemplo.php");
require_once ("../Model/Ejemplo.php");
require_once ("../Model/DAO/DAO_Significado.php");
require_once ("../Model/Significado.php");

$ejemploAAgregar = $_REQUEST["txtEjemplo"];

$idSig = $_REQUEST["idSig"];


$ds= new DAO_Significado();
$de= new DAO_Ejemplo();

$ejemplo = new Ejemplo();
$ejemplo->setFraseExplicativa($ejemploAAgregar);
$ejemplo->setSignificado($ds->findById($idSig));
$ejemplo->setUrl_imagen("en progreso");

$de->create($ejemplo);



header('Location: ../View/index_palabras.php');
