<?php
    require_once("../Model/DAO/DAO_Usuario.php");

    $usuario = $_REQUEST["usuario"];
    $password = $_REQUEST["password"];

    $dao = new DAO_Usuario();

    if(!$dao->checkUser($usuario,$password)){
		// WIP -- Mejor soluci�n pronto�
        echo "<script>alert('Sus credenciales son incorrectas, reintente.'); window.location = '../index.php';</script>";

    }else{

        // La sesi�n dura 30 minutos

        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $usuario;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

        sleep(1);

        header("location: ../View/inicio.php");
    }
?>