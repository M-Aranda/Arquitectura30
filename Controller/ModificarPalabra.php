<?php

require_once("../Model/DAO/DAO_Palabra.php");
require_once("../Model/Palabra.php");


$idPalabra=$_REQUEST["idPalabra"];
$nombre=$_REQUEST["nombre"];
$sigla=$_REQUEST["sigla"];


$dap= new DAO_Palabra();

$palabraNueva=$dap->findById($idPalabra);

$palabraNueva->setNombre($nombre);
$palabraNueva->setSigla($sigla);

$dap->update($palabraNueva);



header('Location: ../View/index_palabras.php');