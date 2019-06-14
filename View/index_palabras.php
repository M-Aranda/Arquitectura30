<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once("../Model/DAO/DAO_Palabra.php");
        require_once("../Model/DAO/DAO_Significado.php");

        echo "Palabras registradas en esta asignatura:";
        echo "<br>";

        $dp = new DAO_Palabra();
        ?>


        <table  border="1">
            <thead>
                <tr>
                    <th>Número de palabra</th>
                    <th>Palabra</th>
                    <th>Significados</th>
                    <th>Ejemplos</th>
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
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($significados as $s) { ?>
                                        <tr>
                                            <td><?php echo $s->getId(); ?></td>
                                            <td> <?php echo $s->getDescripcion(); ?></td>
                                            <td> <?php if($s->getDefinicionRecomendada()==true){
                                                echo "Sí";
                                            }else {
                                                echo "No";
                                            }?></td>
                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
                            </table>


                        </td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>


            </tbody>
        </table>



    </body>
</html>
