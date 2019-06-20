
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cambio de contraseña</title>
        <script src="../Js/jQuery.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    </head>
    <body style="background-color: bisque">
        <?php

        ?>
    </body>


    <script>

        window.onload = function () {
            avisoDeAusenciaDeAsignaturasInscritas();
        };
        function avisoDeAusenciaDeAsignaturasInscritas() {
            let timerInterval
            Swal.fire({

                title: 'Aviso!',
                html: 'Acaba de cambiar su contraseña, redirigiendo en <strong></strong> milisegundos.',
                timer: 4000,

                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval);
                    window.location.href = "Ficha_Personal.php";
                }
            }).then((result) => {
                window.location.href = "Ficha_Personal.php";
                if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.timer
                        ) {
                    console.log('Cerrado por temporizador')
                }
            })
        }


    </script>
</html>



