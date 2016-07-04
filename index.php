<!DOCTYPE html>
<html>
    <?php
    ?>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PREVCRIM | Login</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">PREVCRIM</h1>

                </div>
                <h3>Bienvenido a PREVCRIM</h3>
                <p>Algo debo poner aqui 
                    <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
                </p>
                <p>Iniciar sesión</p>
                <form class="m-t" role="form" action="controlador/ControInicioSession.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="txtUser" placeholder="Usuario" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="txtPass" placeholder="Contraseña" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#"><small>Olvido su contraseña?</small></a>

                </form>
                <?php
                if (isset($_GET['e'])) {
                    $error = 1;
                    if ($error == 1) {
                    echo" <div class='alert alert-danger alert-dismissable'>";
                    echo" <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>X</button>";
                    echo" Contraseña y/o Usuario no validos";
                    echo"</div>";
                }
                }

                
                ?>
                <p class="m-t"> <small><a href="gcrinformatica.cl">GcrInformatica</a> &copy; 2016</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
