<?php
require_once("../Model/DAO/DAO_Ejemplo.php");
require_once("../Model/Ejemplo.php");

$idEj=$_REQUEST["idEj"];
$fraseExplicativa=$_REQUEST["fraseExplicativa"];


$de= new DAO_Ejemplo();
$ejNuevo=$de->findById($idEj);
$ejNuevo->setFraseExplicativa($fraseExplicativa);

$de->update($ejNuevo);

header('Location: ../../View/index_palabras.php');