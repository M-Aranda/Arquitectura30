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
            <th>Acción</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            $contador=1;
            foreach ($ejemplos as $e) { ?>
                
         <tr>
            <td><?php echo $contador;?></td>
            <td><?php echo $e->getFraseExplicativa();?></td>
            <td> <form name="formModificarEjemplo" method="post" action="../Controller//ModificarEjemplo.php">
                    <input type="hidden" name="idEj" value="<?php echo $e->getId();?>">
                    <input type="text" name="fraseExplicativa" placeholder="Ejemplo:">
                    <input type="submit" value="Modificar">
                </form></td>
            
        </tr>
                <?php
                 $contador++;
            }
            ?>
       
    </tbody>
</table>

