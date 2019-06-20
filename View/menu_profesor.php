<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menú del Profesor</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../Js/js_profesor.js"></script>
        <link rel="stylesheet" type="text/css" href="../Css/estilo_home.css">
        <link rel="stylesheet" type="text/css" href="../Css/estilo_ficha.css">

        <style>
            .modal {
                text-align: center;
            }

            .modal-dialog {
                text-align: left; /* you'll likely want this */
                max-width: 100%;
                width: auto !important;
                display: inline-block;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="form-control">
                <div class="form-group">
                    <label for="cboAnioIngreso">Año de Ingreso:</label>
                    <select class="form-control" id="cboAnioIngreso">
                        <option>test</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cboAsignatura">Asignatura</label>
                    <select class="form-control" id="cboAsignatura">
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
                        <tbody id="tbodyAlumnos"></tbody>
                    </table>
                </div>
            </div>

            <div id="divModal"></div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>