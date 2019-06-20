<?php

require_once("../Model/DAO/DAO_Usuario.php");
require_once("../Model/Usuario.php");

$clave_nueva_1 = $_REQUEST["clave_nueva"];
$clave_verificada = $_REQUEST["clave_verificada"];
$idUsuario = $_REQUEST["idUsuario"];


echo "Clave Nueva:" . $clave_nueva_1 . "<br>";
echo "Clave Verificada:" . $clave_verificada . "<br>";

$dau= new DAO_Usuario();

$u=$dau->findById($idUsuario);

$u->setContrasenia($clave_verificada);
$dau->update($u);





header('Location: ../View/contraseniaCambiada.php');
?>