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

        $dp= new DAO_Palabra();

        $palabras = $dp->read();
        foreach ($palabras as $p) {?>
        <h1><?php echo $p->getId(); ?></h1>
        <?php }
        
        ?>
    </body>
</html>
