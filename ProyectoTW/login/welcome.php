<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h4>$usuario</h4></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='logout.php'"> <img src="img/logout.png" height="51px" width="50px"> </button>
            <figcaption>Cerrar Sesión</figcaption>
        </figure>
    </div>

    <div class="container" role="main">

        <div class="c1">
            <div class="menu">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="../login/welcome.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../solicitudes/index.php">Registro de solicitud</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../admin/listaUsuarios/alumno.php">Lista de usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../admin/roles/roles.php">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../solicitudes/tabla.php">Bitácora de uso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../observaciones/listaObservaciones.php">Observaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../admin/equipos/equipos.php">Equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat/paginaChatAdministrador.php">Chat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://microservicio-todolist.herokuapp.com/ws/todolist.wsdl">Agenda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat-websocket/clienteAdministrador.php">Chat usuarios anónimos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="contenido">
                <hr>
                <h2>Bienvenido</h2>
                <p>Este sistema está dirigido a toda la comunidad de Facultad de Estadística e Informática, 
                    nuestra intención es ofrecer la posibilidad de realizar de manera breve y sencilla el préstamo de algún equipo 
                    computacional, mediante un sitio web intuitivo, con buen diseño visual y que responda en tiempo y forma a 
                    las peticiones de los diferentes usuarios.
                </p>
                <h3>Descripción del sistema</h3>
                <p>Este sistema fue desarrollado buscando cumplir un objetivo principal, que para nuestro equipo de desarrollo era: 
                    facilitar diversas tareas al personal del Centro de Cómputo de la Facultad de Estadística e Informática, 
                    buscando automatizar y sistematizar la mayor cantidad de tareas para cada uno de los usuarios. 
                    Este sistema fue desarrollado a base de mucho esfuerzo y dedicación. Esperamos y les sea de ayuda, por último, 
                    solo nos queda invitarte a explorar y disfrutar de nuestro sistema web.
                </p>
            </div>

        </div>

        <p>
            <a href="reset-password.php" class="btn btn-warning">¿Olvidaste tu contraseña?</a>
        </p>

    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>