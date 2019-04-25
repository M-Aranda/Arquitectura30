<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   
    </head>
    <body>
        
        
        <?php
        require_once("../Model/DAO/DAO_Usuario.php");
        
        require_once("../Model/DAO/DAO_Asignatura.php");
        require_once("../Model/DAO/DAO_Asignatura_Usuario.php");
        require_once("../Model/DAO/DAO_Ejemplo.php");
        require_once("../Model/DAO/DAO_Palabra.php");
        require_once("../Model/DAO/DAO_Palabra_Asignatura.php");
        require_once("../Model/DAO/DAO_Significado.php");

       
        $du= new DAO_Usuario();
        $dao_asignatura= new DAO_Asignatura();
        $dao_ejemplo= new DAO_Ejemplo();
        $dao_palabra= new DAO_Palabra();
        $dao_significado= new DAO_Significado();
        
        $dao_palabra_asignatura= new DAO_Palabra_Asignatura();
        $dao_asignatura_usuario= new DAO_Asignatura_Usuario();
        
          
        
        /*
         
        $asignatura=new Asignatura();
        $asignatura->setId(2);
        $asignatura->setNombre("pool");
        $asignatura->setCodigo("123");
       // $dao_asignatura->update($asignatura);
       // $dao_asignatura->create($asignatura);
       // $dao_asignatura->delete(2);
        
        
       $pal= new Palabra();
        $pal->setId(2);
        $pal->setNombre("otra palabra x");
        $pal->setSigla("alguna sigla");
        
        //$dao_palabra->update($pal);
        //$dao_palabra->create($pal);
        //$dao_palabra->delete(2);
        
        $sig= new Significado();
        $sig->setId(1);
        $sig->setDefinicionRecomendada(1);
        $sig->setDescripcion("2222");
        $palabra_asi=$dao_palabra_asignatura->findById(1);    
        $sig->setPalabra_asignatura($palabra_asi);
        
        //$dao_significado->create($sig);
        //$dao_significado->update($sig);
        //$dao_significado->delete(2);

        
        
        
        $ejem=$dao_ejemplo->findById(1);
        $ejem->setFraseExplicativa("loplololol");
        //$dao_ejemplo->create($ejem);
        //$dao_ejemplo->update($ejem);
        //$dao_ejemplo->delete(1);
        
      
        
        $usua= new Asignatura_Usuario();
        $usua->setId(1);
        $usua->setAsignatura($dao_asignatura->findById(2));
        $usua->setUsuario($du->findById(1));
        //$dao_asignatura_usuario->update($usua);
        //$dao_asignatura_usuario->create($usua);
        //$dao_asignatura_usuario->delete(3);
       
        */
        
        /*
        $pAsig=new Palabra_Asignatura();
        $pAsig->setId(1);
        $pAsig->setAsignatura($dao_asignatura->findById(1));
        $pAsig->setPalabra($dao_palabra->findById(1));
        
        //$dao_palabra_asignatura->create($pAsig);
        //$dao_palabra_asignatura->update($pAsig);
          
          //El delete funciona, pero todos los registros de esta tabla que tengan un registro que dependa del id, impide el borrado
        $dao_palabra_asignatura->delete(1);
        
        
        */


  
        $usuarios=$du->read();
        $asignaturasUsuarios=$dao_asignatura_usuario->read();
        $ejemplos=$dao_ejemplo->read();
        $palabras=$dao_palabra->read();
        $palabrasAsignaturas=$dao_palabra_asignatura->read();
        $significados=$dao_significado->read(); 
        $asignaturas=$dao_asignatura->read();
        
        
        echo "Los usuarios son:";   
      
        foreach ($usuarios as $u) {?>
            
        <h3><?php echo $u->getNombre(); ?></h3>
       
       <?php }
       
       
       
   
        
        echo "Las asignaturas son:";
        foreach ($asignaturas as $a) {?>
            
        <h3><?php echo $a->getNombre(); ?></h3>
       
       <?php }
       
       
       echo "Los ejemplos son:";
              foreach ($ejemplos as $e) {?>
            
        <h3><?php echo $e->getFraseExplicativa(); ?></h3>
       
       <?php }
       
       
       echo "Las palabras son:";
              foreach ($palabras as $p) {?>
            
        <h3><?php echo $p->getNombre(); ?></h3>
       
       <?php }
       
       
       echo "Los significados son:";
              foreach ($significados as $s) {?>
            
        <h3><?php echo $s->getDescripcion(); ?></h3>
       
       <?php }
       
              
       echo "Las palabras y sus asignaturas son:";
       foreach ($palabrasAsignaturas as $pa) {?>
            
        <h3><?php echo $pa->getAsignatura()->getNombre(); ?></h3>
        <h3><?php echo $pa->getPalabra()->getNombre(); ?></h3>
       
       <?php }
       
       
       echo "Los usuarios y sus asignaturas son:";
       
              foreach ($asignaturasUsuarios as $au) {?>  
        
        <h3><?php echo $au->getAsignatura()->getNombre(); ?></h3>
        <h3><?php echo $au->getUsuario()->getNombre(); ?></h3>
        
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
        
        <h4>jQuery de prueba</h4>
        <input type="text" id="a">
        <br>
        <input type="text" id="b">
        <br>
        <input type="submit" value="clickea" onclick="sumar2numeros()">
        
        <script src="../Js/jQuery.js"></script>
        <script >
            
      
            
            function sumar2numeros(){
                var a = parseInt($('#a').val(), 10);
                var b = parseInt($('#b').val(), 10);
                alert(a+b);
            }
        
        
        </script>
    </body>
</html>
