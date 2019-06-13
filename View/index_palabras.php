<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once("../Model/DAO/DAO_Palabra.php");

        echo "Las palabras son:";

        $dp = new DAO_Palabra();
        ?>


        <table border="1">
            <thead>
                <tr>
                    <th>Palabra</th>
                    <th>Significado</th>
                    <th>Ejemplo</th>
                </tr>
            </thead>
            <tbody>

    <?php
    $palabras = $dp->read();
    foreach ($palabras as $p) {?>
                <tr>
                    <td><?php echo $p->getId();?> </td>
                    <td></td>
                    <td></td>
                </tr>
    <?php
    
    }
    ?>

                
            </tbody>
        </table>



    </body>
</html>
