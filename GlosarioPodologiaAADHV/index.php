<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>::: INICIAR SESION :::</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="Css/estilos.css">
        <link rel="icon" type="image/png" href="Icon/icon.png" />
    </head>

    <body>
        <div class="main">
            <div class="container">
                <div class="middle">
                    <div id="login">

                        <form action="Controller/Controller_Login.php" method="post">

                            <fieldset class="clearfix">

                                <p>
                                    <span class="fa fa-user"></span>
                                        <input name="rut" type="text" Placeholder="Rut:" required>
                                </p>


                                <div>
                                    <span class="spanSubmit">
                                        <input type="submit" value="Iniciar Sesión">
                                    </span>
                                </div>

                            </fieldset>
                            <div class="clearfix"></div>
                        </form>

                        <div class="clearfix"></div>

                    </div>
                    <div class="logo"><img src="http://www.sclance.com/pngs/login-png/login_png_812507.png">

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

        </div>

    </body>

</html>