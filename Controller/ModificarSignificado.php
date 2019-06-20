
<?php

require_once("../Model/DAO/DAO_Significado.php");
require_once("../Model/Significado.php");


$idSig=$_REQUEST["idSig"];
$desc=$_REQUEST["descripcion"];



$ds= new DAO_Significado();

$sigNuevo=$ds->findById($idSig);

$sigNuevo->setDescripcion($desc);


$ds->update($sigNuevo);



header('Location: ../View/index_palabras.php');
