<?php
require_once("../Model/DAO/DAO_Ejemplo.php");
require_once("../Model/Ejemplo.php");




$idDeSignificado = isset($_REQUEST['datos']) ? $_REQUEST['datos'] : "";

$de = new DAO_Ejemplo();

$ejemplos = $de->listarEjemplosDeUnSignificado($idDeSignificado);
?>
            
            <?php
            $id=1;
            foreach ($ejemplos as $e) { ?>
                
                 <?php echo "Ejemplo # ".$id.": ".$e->getFraseExplicativa()."" ; ?> 
                <br>
                 
                
                <?php
                 $id++;
            }
            ?>


