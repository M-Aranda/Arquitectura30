<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once("../Model/DAO/DAO_Usuario.php");
        

        
        
        echo "Los usuarios son:";   
        $du= new DAO_Usuario();
        $usuarios=$du->read();
        foreach ($usuarios as $u) {?>
            
        <h3><?php echo $u->getNombre(); ?></h3>
       <?php }
       
        $u= new Usuario();
        $u->setNombre("PULL MY DEVIL TRIGGER");
        $du->create2($u);
       
        
       
        ?>
    </body>
</html>
