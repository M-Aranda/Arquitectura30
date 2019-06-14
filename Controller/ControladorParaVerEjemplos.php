<?php
require_once("../Model/DAO/DAO_Ejemplo.php");
require_once("../Model/Ejemplo.php");


$idDeSignificado = isset($_REQUEST['datos']) ? $_REQUEST['datos'] : "";

$de = new DAO_Ejemplo();

$ejemplos = $de->listarEjemplosDeUnSignificado($idDeSignificado);
?>
            

<table border="default">
    <thead>
        <tr>
            <th># de ejemplo</th>
            <th>Ejemplo</th>
            <th>Imágen</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $contador=1;
            foreach ($ejemplos as $e) { ?>
                
         <tr>
            <td><?php echo $contador;?></td>
            <td><?php echo $e->getFraseExplicativa();?></td>
            <td><?php echo $e->getUrl_imagen();?></td>
        </tr>
                <?php
                 $contador++;
            }
            ?>
        
       

    </tbody>
</table>



            


