<?php
require_once("../Model/Asignatura.php");

session_start();
$id=$_REQUEST["opcionSele"];

$_SESSION["idAsigAVer"]=$id;

echo $_SESSION["idAsigAVer"];

 header("location: ../View/index_palabras.php");