<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Css/estilo_home.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo_ficha.css">
</head>

<body>
    <div class="container-fluid header">
        <header>
            <?php      
          echo $_SESSION["nombre"];
        ?>
        </header>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <!--<div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                -<li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lorem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lorem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lorem</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown show">
                        <a class="btn nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown link
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Lorem</a>
                            <a class="dropdown-item" href="#">Lorem ipsum</a>
                            <a class="dropdown-item" href="#">Lorem ipsum</a>
                        </div>
                    </div>-->
        </li>
        </ul>


        </div>
    </nav>

    <div class="container">
        <div class="row">

            <div
                class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">INFORMACION PERSONAL</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">


                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>NOMBRE:</td>
                                            <td><?php 
                                echo $_SESSION["nombre"];
                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>RUT:</td>
                                            <td>
                                                <?php 
                                                    echo $_SESSION["rut"];
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a href="mailto:info@support.com">
                                                    <?php 
                                                        echo $_SESSION["correo"];
                                                    ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <td>CONTRASEÑA:</td>
                                        <td class="hidetext"><?php echo $_SESSION["contrasenia"];?></td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    <div class="panel-heading">
                        <h3 class="panel-title">CAMBIO CONTRASEÑA</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>

                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Contraseña Actual:</td>
                                            <td class="hidetext"><input id="clave" type="password"
                                                    value="<?php echo password_hash($_SESSION["contrasenia"],PASSWORD_DEFAULT)?>"
                                                    readonly data-testid="royal_pass"></td>
                                            <?php
                                                $clave =  $_SESSION["contrasenia"];
                                                $hash = password_hash($_SESSION["contrasenia"],PASSWORD_DEFAULT);

                                                
                                            ?>

                                        </tr>
                                        <tr>
                                            <td>Nueva Contraseña:</td>
                                            <td>
                                                <form action="../Controller/Controller_Actualizar_Clave.php" method="post">
                                                    <input id="clave_nueva" name="clave_nueva" type="password" maxlength="16" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Confirmar Nueva Contraseña:</td>
                                            <td>
                                                <input id="clave_verificada" name="clave_verificada" type="password" maxlength="16" required>
                                                <br><br><input type="submit" class="btn btn-default" value="Cambiar Contraseña">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--<footer>Ingenieria en Informatica © 2019</footer>-->

    <script type="text/javascript" src="../js/eventos.js"></script>


</body>

</html>