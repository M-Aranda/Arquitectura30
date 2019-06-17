<?php

require_once("../Model/DAO/DAO_Usuario.php");

$rut = $_REQUEST["rut"];

$du = new DAO_Usuario();

$validacion = $du->validacionLogin($rut);
$usuario = $du->readLogin($rut);

if($validacion != null){
    foreach ($usuario as $u) {
        session_start();
        $_SESSION["usuarioIniciado"] = $u;
        $_SESSION["nombre"]         = $u->getNombre();
        $_SESSION["rut"]            = $u->getRut();
        $_SESSION["contrasenia"]    = $u->getContrasenia();
        $_SESSION["correo"]         = $u->getCorreo();

    }
    header('Location: ../View/Ficha_Personal.php');
}else{
    
}



