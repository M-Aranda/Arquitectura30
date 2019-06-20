<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador de palabras</title>
        <script src="../Js/jQuery.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            table{
  
            }
            .ubicacion{
                padding-left:35%;
            }
            h4{
                color: white;
            }
            .posicioncombox{
                width:77%;
            }

            .posicion2{
                position:absolute;
                left:37%;
            }
        </style>
    </head>
    <body>
    
    <nav class="navbar navbar-dark bg-dark">

        <?php
        require_once("../Model/DAO/DAO_Palabra.php");
        require_once("../Model/DAO/DAO_Significado.php");
        require_once("../Model/DAO/DAO_Ejemplo.php");
        require_once("../Model/DAO/DAO_Asignatura_Usuario.php");
        require_once("../Model/DAO/DAO_Usuario.php");
        require_once("../Model/Usuario.php");



        session_start();

        if ($_SESSION["usuarioIniciado"] != null) {
            $u = $_SESSION["usuarioIniciado"];
        }

        $dp = new DAO_Palabra();
        $daoAU = new DAO_Asignatura_Usuario();
        $asignaturasInscritas = $daoAU->buscarTodasLasAsignaturasDelUsuario($u->getId());

        if ($asignaturasInscritas == null) {
            header("location: errorSinAsignaturas.php");
        }

        echo "<h4>Asignaturas inscritas:</h4>";
        ?>
        <div class="posicioncombox">
            <form name="cboAsignaturaAVer" method="POST" action="../Controller/CargarPalabrasDeAsignatura.php">
                <select name="opcionSele">
                    <?php foreach ($asignaturasInscritas as $ai) { ?>
                        <option class="btn btn-danger" value="<?php echo $ai->getAsignatura()->getId(); ?> "><?php echo $ai->getAsignatura()->getNombre(); ?></option>
                    <?php }
                    ?>
                </select>
        </div>
                <input class="btn btn-primary posicion2" type="submit" value="Ver palabras">
            </form>
        
        </nav>
        <div class="container">

        <?php
        echo "<h3>Palabras registradas en esta asignatura:</h4>";
        ?>

<div class="table-responsive tabla">
<table class="table">
<thead class="thead-dark">
                <tr>
                    <th>Palabra #</th>
                    <th>Palabra</th>
                    <th>Agregar significado</th>
                    <th>Significados</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $ds = new DAO_Significado();


                $arrayDeIdsDeAsignaturasInscritas = array();
                foreach ($asignaturasInscritas as $ai) {
                    $arrayDeIdsDeAsignaturasInscritas[] = $ai->getAsignatura()->getId();
                }

                $idDeAsigPalabras = min($arrayDeIdsDeAsignaturasInscritas);
                if (isset($_SESSION["idAsigAVer"])) {
                    $idDeAsigPalabras = $_SESSION["idAsigAVer"];
                    unset( $_SESSION["idAsigAVer"]);
                }




                $palabras = $dp->buscarPalabrasPorFkUsuarioYFkAsignatura($u->getId(), $idDeAsigPalabras);



                foreach ($palabras as $p) {
                    ?>
                    <tr>

                        <td><?php echo $p->getId(); ?> </td>
                        <td><?php echo $p->getNombre(); ?>
            <br>
            <br>
            <form name="formEliminarPalabras" method="post" action="../Controller/EliminarPalabra.php">
                <input type="hidden" name="idPalabra" value="<?php echo $p->getId(); ?>">
                <input type="hidden" name="idAsigPalabra" value="<?php echo $p->getId();?>">
                <input type="submit" value="Eliminar palabra">
            </form>
                        
                        </td>
                        <td><button class="btn btn-info" onclick="agregarSignificado(<?php echo $p->getId(); ?>, <?php echo $idDeAsigPalabras; ?>)">Agregar significado</button> </td>
                        <td><?php $significados = $ds->buscarSignificadosAsociadoAIdDePalabra($p->getId());
                    ?>

                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>Significado #</th>
                                        <th>Descripción</th>
                                        <th>Recomendado por docente</th>
                                        <th>Agregar ejemplo</th>
                                        <th>Ejemplos</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $contador = 1;
                                    foreach ($significados as $s) {
                                        ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td> <?php echo $s->getDescripcion(); ?></td>
                                            <td> <?php
                                                if ($s->getDefinicionRecomendada() == true) {
                                                    echo "Sí";
                                                } else {
                                                    echo "No";
                                                }
                                                ?></td>
                                            <td><button class="btn btn-primary" onclick="agregarEjemplo(<?php echo $s->getId();?>)">Agregar ejemplo</button></td>
                                            <td>  <button class="btn btn-dark" onclick="mostrarEjemplos(<?php echo $s->getId(); ?>,<?php echo $p->getId(); ?>)" >Ver ejemplos</button> </td>
                                        </tr>

                                        <?php
                                        $contador++;
                                    }
                                    ?>

                                </tbody>
                            </table>


                        </td>
                    </tr>
                    <?php
                }
                ?>


            </tbody>
        </table>
            </div>
            <form name="registrar_nueva_palabra" method="POST" action="../Controller/CrearPalabra.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="txtNombre">Palabra</label>
      <input type="text" class="form-control" name="txtNombre" placeholder="Palabra:" required>
    </div>
    <div class="form-group col-md-6">
      <label for="idUsuario">Sigla</label>
      <br>
      <input type="text" name="txtSigla" placeholder="Sigla: ">
      <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $u->getId();?>">
    </div>
    </div>  
    <div class="form-group col-md-4">
        <label for="inputState">Asignatura de la palabra: </label>
        <select name="cboAsignatura" id="input" class="form-control">
            <?php foreach ($asignaturasInscritas as $ai) { ?>
                <option value="<?php echo $ai->getAsignatura()->getId(); ?>"><?php echo $ai->getAsignatura()->getNombre(); ?></option>
            <?php }
            ?>
            </select>
        </select>
    </div>
    <div class="ubicacion">
        <input type="submit" value="Registrar" class="btn btn-primary">
        </form>
        
        <a href="Ficha_Personal.php" class="btn btn-warning">Atrás</a>
        <br>
        <br>
        <a href="../Controller/CerrarSesion.php" class="btn btn-warning">Cerrar sesión</a>
        
    </div>
  </div>




       



    </body>




    <script>

        function agregarSignificado(idPalabra, idAsigUs) {


            Swal.fire({
                type: 'info',
                title: 'Agregando significado ',
                html: '<form name="agergarSignificado" action="../Controller/AgregarSignificado.php"> <input name="idAsig" type="hidden" value="' + idAsigUs + '"> <input name="idDePalabra" type="hidden" value="' + idPalabra + '"> <input name="significadoAAgregar" type="text" placeholder="significado:"> <input class="btn btn-info" type="submit" value="Guardar"> </form>',
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33'

            });
        }


        function agregarEjemplo(idSignificado) {


            Swal.fire({
                type: 'info',
                title: 'Agregando ejemplo ',
                html: '<form name="agergarEjemplo" action="../Controller/CrearEjemplo.php"> <input name="idSig" type="hidden" value="' + idSignificado + '"> <input name="txtEjemplo" type="text" placeholder="Ejemplo:"> <input class="btn btn-info" type="submit" value="Guardar"> </form>',
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33'

            });
        }





        function mostrarEjemplos(idDeSignificado) {


            $.ajax({
                url: "../Controller/ControladorParaVerEjemplos.php",
                type: "POST",
                data: {"datos": idDeSignificado}
            }).done(function (data) {
                console.log(data);

                Swal.fire({
                    type: 'info',
                    title: 'Ejemplos asociados ',
                    html: data

                });


            });



        }






    </script>




</html>
