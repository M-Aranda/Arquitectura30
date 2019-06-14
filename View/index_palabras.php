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


        $dp = new DAO_Palabra();
        $daoAU = new DAO_Asignatura_Usuario();
        $asignaturasInscritas = $daoAU->buscarTodasLasAsignaturasDelUsuario(1);

        echo "Asignaturas inscritas:";
        ?>

        <select>
            <?php foreach ($asignaturasInscritas as $ai) { ?>
                <option><?php echo $ai->getAsignatura()->getNombre(); ?></option>
            <?php }
            ?>
        </select>
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
                    <th>Significados</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $ds = new DAO_Significado();
                $palabras = $dp->buscarPalabrasPorFkUsuarioYFkAsignatura(1, 1);
                foreach ($palabras as $p) {
                    ?>
                    <tr>

                        <td><?php echo $p->getId(); ?> </td>
                        <td><?php echo $p->getNombre(); ?> </td>
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
                <option value="<?php echo $ai->getAsignatura()->getId();?>"><?php echo $ai->getAsignatura()->getNombre(); ?></option>
                <?php }
                ?>
            </select>
            <br>
            <br>
            <input type="submit" value="Registrar">
        </form>



    </body>




    <script>

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
