<?php
session_start();
if(isset($_SESSION['NAME_USER'])){
header('Location: modules/admin/principal.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Alfa y Omega</title>
<meta charset="utf-8" />
<meta name="name" content="content">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/favicon.ico" />
<link rel="alternate" title="Pozolería RSS" type="application/rss+xml" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"    ></script>
<script type="text/javascript" src="js/posters.js"></script>
<script type="text/javascript" src="js/sweetalert-dev.js"></script>
</head>

<body>
    <!-- formulario para el inicio de sesion -->
    <div class="container">
    <h1 class="welcome text-center">Bienvenido Al Sistema De Control Escolar<br> Universidad Alfa y Omega</h1>
        <div class="card card-container"><br>
        <center><a href="http://www.tabscoob.org/alfayomega/" target="_blank"><img title="Ir ala pagina oficial" src="images/logo.png" alt="" style="width: 35%;"></a></center>
        <hr>

            <form name="login" class="form-signin" action="" method="post" id="login">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Usuario</p>
                <input type="text" name="txtUsername" id="user" class="login_box" placeholder="Usuario" required autofocus autocomplete="off">
                <p class="input_title">Password</p>
                <input type="password" name="txtPassword" id="password" class="login_box" placeholder="Contraseña" required>
                <noscript>
                    <center><span class="error" style="color:red;">Debe habilitar javascript en su navegador para que el sistema funcione correctamente</span></center><br>
                </noscript>
                <button class="btn btn-lg btn-primary" type="button" id="start">Iniciar sesion</button>
            </form><!-- /form -->
            <div id="box-alert" style="color:red;"></div>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <!-- formulario para el inicio de sesion -->
</body>
</html>