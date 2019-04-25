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
        <h3><?php echo $u->getRut(); ?></h3>
       
       <?php }
       
       /*
        $u= new Usuario();
        $u->setId(16);
        $u->setNombre("ahaahhahahah");
        $u->setEsProfesor(TRUE);
        $u->setContrasenia("YOURTOOLATE");
        $u->setCorreo("AHHAHAHA");
        $u->setRut("lolol");
        //$du->create($u);
       
       $du->update($u);
         */
        
       
        ?>
    </body>
</html>
