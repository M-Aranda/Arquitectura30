<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador de palabras</title>



        <script src="../Js/jQuery.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>

    </head>
    <body>
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


        echo "Asignaturas inscritas:";
        ?>

        <form name="cboAsignaturaAVer" method="POST" action="../Controller/CargarPalabrasDeAsignatura.php">
            <select name="opcionSele">
                <?php foreach ($asignaturasInscritas as $ai) { ?>
                    <option value="<?php echo $ai->getAsignatura()->getId(); ?> "><?php echo $ai->getAsignatura()->getNombre(); ?></option>
                <?php }
                ?>
            </select>
            <br>
            <input type="submit" value="Ver palabras">
        </form>



        <br>
        <br>

        <br>
        <br>
        <?php
        echo "Palabras registradas en esta asignatura:";
        echo "<br>";
        echo "<br>";
        ?>


        <table  border="1">
            <thead>
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
                }




                $palabras = $dp->buscarPalabrasPorFkUsuarioYFkAsignatura($u->getId(), $idDeAsigPalabras);



                foreach ($palabras as $p) {
                    ?>
                    <tr>

                        <td><?php echo $p->getId(); ?> </td>
                        <td><?php echo $p->getNombre(); ?> </td>
                        <td><button onclick="agregarSignificado(<?php echo $p->getId();?>)">Agregar significado</button> </td>
                        <td><?php $significados = $ds->buscarSignificadosAsociadoAIdDePalabra($p->getId());
                    ?>

                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>Significado #</th>
                                        <th>Descripción</th>
                                        <th>Recomendado por docente</th>
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
                                            <td>  <button onclick="mostrarEjemplos(<?php echo $s->getId(); ?>,<?php echo $p->getId(); ?>)" >Ver ejemplos</button> </td>
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




        <form name="registrar_nueva_palabra" method="POST" action="../Controller/CrearPalabra.php">
            <br>
            Palabra: <input type="text" name="txtNombre" placeholder="Palabra:" required>
            <br>
            Sigla: <input type="text" name="txtSigla" placeholder="Sigla:">
            <br>
            Asignatura de la palabra:      
            <select name="cboAsignatura">
                <?php foreach ($asignaturasInscritas as $ai) { ?>
                    <option value="<?php echo $ai->getAsignatura()->getId(); ?>"><?php echo $ai->getAsignatura()->getNombre(); ?></option>
                <?php }
                ?>
            </select>
            <br>
            <br>
            <input type="submit" value="Registrar">
        </form>
        <br>
        <br>
        <a href="Ficha_Personal.php">Atrás</a>



    </body>




    <script>


        function agregarSignificado(idPalabra) {


            Swal.fire({
                type: 'info',
                title: 'Agregando significado ',
                html: '<form name="agergarSignificado" action="../Controller/AgregarSignificado.php"> <input name="idDePalabra" type="hidden" value="'+idPalabra+'"> <input name="significadoAAgregar" type="text" placeholder="significado:"> <input type="submit" value="Guardar"> </form>',
                showCancelButton: false,
                showConfirmButton: false

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
