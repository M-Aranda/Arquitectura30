<?php

require_once("../Model/DAO/DAO_Significado.php");
require_once("../Model/Significado.php");


$idSig=$_REQUEST["idSig"];


$ds= new DAO_Significado();


$s=$ds->findById($idSig);

$s->setDefinicionRecomendada(1);
$ds->update($s);

header('Location: ../View/PalabraRecomendada.php');