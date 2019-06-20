<?php

require_once("../Model/DAO/DAO_Usuario.php");
require_once("../Model/Usuario.php");
require_once("../Model/DAO/DAO_anio_ingreso.php");
require_once("../Model/anio_ingreso.php");
require_once("../Model/anio_usuario.php");
require_once("../Model/DAO/DAO_Anio_Usuario.php");

$nombre = $_REQUEST["nombre"];
$run = $_REQUEST["run"];
$pass = $_REQUEST["password"];
$mail = $_REQUEST["correo"];
$anioIngreso = $_REQUEST["anioIngreso"];

$dao = new DAO_Usuario();
$daoAnioIngreso = new DAO_anio_ingreso();
$daoAnioUsuario = new DAO_anio_usuario();

if ($nombre == 'admin' || $run == 'admin' || $pass == 'admin') {

    /* Validación ordinaria (no necesaria del todo) */
    echo "<script>alert('Nope.avi'); window.location = '../index.php';</script>";
} else if (!$dao->existeUser($nombre, $run)) {

    /* Por ahora todos los nuevos registros son alumnos, hay que implementar algo para detectar o ver que */
    /* hacer para diferenciarlos */

    $usuario = new Usuario();

    $usuario->setNombre($nombre);
    $usuario->setEsProfesor(0);
    $usuario->setRut($run);
    $usuario->setContrasenia($pass);
    $usuario->setCorreo($mail);

    $dao->create($usuario);

    $listUsuario = $dao->read();
    foreach ($listUsuario as $u) {
        if ($u->getRut() == $usuario->getRut()) {
            $usuario->setId($u->getId());
        }
    }

    $anioIngresoObj = $daoAnioIngreso->findAnioByAnio($anioIngreso);
    $anioUsuario = new anio_usuario();
    $anioUsuario->setFk_usuario($usuario->getId());
    $anioUsuario->setFk_anio_ingreso($anioIngresoObj->getId());
    $daoAnioUsuario->create($anioUsuario);

    /* Sleep de 1 seg ordinario que da la sensación que está "procesando" el registro. */
    sleep(1);

    header("location: ../index.php");
} else {
    echo "<script>alert('El usuario y/o run ya existe(n).'); window.location = '../view/registro.php';</script>";
}
?>