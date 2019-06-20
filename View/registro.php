<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Css/custom_login.css">
    <link rel="shortcut icon" href="../favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="../favicon.ico">
</head>
<body>

	<br>
	<br>

    <div class="container">
        <a href="../index.php"><center><img src="../Res/s.jpg" alt="" class="img-fluid" style="width: 15%;"></center></a>
    </div>

    <br>
    <br>

    <div class="container bg-white text-dark rounded">
            <form action="../controller/CrearUsuario.php" method="post">
                <div class="form-group">
                    <br>
                    <label for="usuario">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="usuario">RUN:</label>
                    <input class="form-control" type="text" name="run" id="run" placeholder="Ingrese su RUN" autocomplete="off" required>
                </div>
				
				<div class="form-group">
                    <label for="usuario">Correo:</label>
                    <input class="form-control" type="text" name="correo" id="correo" placeholder="ejemplo@mail.com" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Año Ingreso:</label>
                    <input type="number" class="form-control" id="anioIngreso" name="anioIngreso" min="2015" max="2019" value="2015" required>
                </div>

                <medium id="emailHelp" class="form-text text-muted"> <a href="../index.php">Regresar</a> </medium>
                <br>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Aceptar" role="button">
            </form>
            <br>
        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>