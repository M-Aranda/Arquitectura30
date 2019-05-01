<?php
    require_once("../Model/DAO/DAO_Usuario.php");
	require_once("../Model/Usuario.php");

    $nombre = $_REQUEST["nombre"];
    $run = $_REQUEST["run"];
    $pass = $_REQUEST["password"];
	$mail = $_REQUEST["correo"];

    $dao = new DAO_Usuario();

    if($nombre == 'admin' || $run == 'admin' || $pass == 'admin'){
		
		/* Validación ordinaria (no necesaria del todo) */
        echo "<script>alert('Nope.avi'); window.location = '../index.php';</script>";
		
    }else if(!$dao->existeUser($nombre,$run)){

		/* Por ahora todos los nuevos registros son alumnos, hay que implementar algo para detectar o ver que */
		/* hacer para diferenciarlos */ 
		
		$usuario = new Usuario();
		
		$usuario->nombre = $nombre;
		$usuario->esProfesor = false;
		$usuario->rut = $run;
		$usuario->contrasenia = $pass;
		$usuario->correo = $mail;
		
        $dao->create($usuario);

		/* Sleep de 1 seg ordinario que da la sensación que está "procesando" el registro. */
        sleep(1);

        header("location: ../index.php");

    }else{
        echo "<script>alert('El usuario y/o run ya existe(n).'); window.location = '../view/registro.php';</script>";
    }

?>