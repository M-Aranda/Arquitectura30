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

        echo "Palabras registradas en esta asignatura:";
        echo "<br>";
        echo "<br>";



        $dp = new DAO_Palabra();
        ?>


        <table  border="1">
            <thead>
                <tr>
                    <th>Número de palabra</th>
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
                                        <th>Número</th>
                                        <th>Descripción</th>
                                        <th>Recomendada por docente</th>
                                        <th>Ejemplos</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($significados as $s) { ?>
                                        <tr>
                                            <td><?php echo $s->getId(); ?></td>
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
                                    <?php }
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
