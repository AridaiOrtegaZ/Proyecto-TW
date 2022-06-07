<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

<div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h3>$usuario</h3></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='logout.php'"> <img src="img/logout.png" height="50px" width="50px"> </button>
            <figcaption>Cerrar Sesión</figcaption>
        </figure>
    </div>

    <div class="container" role="main">
        
        <div class="c1">

            <div class="menu">
                <a href="#">Acerca de nosotros</a>
                <a href="#">Registro de solicitud</a>
                <a href="#">Lista de usuarios</a>
                <a href="#">Bitácora de uso</a>
                <a href="#">Observaciones</a>
                <a href="#">Chat</a>
            </div>

            <div class="contenido">
                <hr>
                <h1>Bienvenido</h1>
                <p>El Centro de Cómputo de la Facultad de Estadística e Informática es una 
                    unidad, la cual ofrece a la comunidad de la Universidad Veracruzana 
                    la posibilidad de utilizar y pedir prestado el equipo computacional cuando sea requerido. 
                </p>
                <p>Este sistema fue elaborado con el objetivo de facilitar diversas tareas al personal del Centro de Cómputo de la Facultad
                    de Estadística e Informática, buscando automatizar y sistematizar algunas tareas, como lo son en este caso
                    el registro de solicitudes de prétamos del equipo de cómputo.
                </p>
            </div>

        </div>

        <!--<h1 class="my-5">Hola, <b><!?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido al Sitio de Administador.</h1>-->
    <p>
        <a href="reset-password.php" class="btn btn-warning">¿Olvidaste tu contraseña?</a>
        <a href="logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a>
    </p>

    </div>

    
</body>
</html>