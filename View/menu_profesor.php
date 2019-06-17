<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../Js/js_profesor.js"></script>
        <link rel="stylesheet" type="text/css" href="../Css/estilo_home.css">
        <link rel="stylesheet" type="text/css" href="../Css/estilo_ficha.css">
    </head>

    <body>
        <div class="container">
            <div class="form-control">
                <div class="form-group">
                    <label for="anioIngreso">Año de Ingreso:</label>
                    <select class="form-control" id="anioIngreso">
                        <option>test</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="asignatura">Asignatura</label>
                    <select class="form-control" id="asignatura">
                        <option>test</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alumnos">Alumnos:</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Palabras</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    test
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-dark btn-block">
                                        Light
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>