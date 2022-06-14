<?php
    include "db/db.php";
?>

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
    <title>Chat Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body onload="ajax()">

<div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h4>$usuario</h4></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='logout.php'"> <img src="img/logout.png" height="50px" width="50px"> </button>
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
                                    <a class="nav-link active" aria-current="page" href="../login/welcome2.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="../alumno/solicitud/index.php">Registro de solicitud</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../alumno/equipos/equipos.php">Equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../observaciones/formularioObservacion.php">Observaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat/paginaChatAlumno.php">Chat</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        </div>

    <div id="contenedor">
        <div id="caja-chat">
            <div id="chat">
            </div>
        </div>
        <form method="POST" action="paginaChatAlumno.php">
            <textarea name="mensaje" placeholder="Ingresa tu mensaje" required></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
            if(isset($_POST['enviar'])){
                $nombre = $_SESSION['username'];
                $mensaje = $_POST['mensaje'];

                $consulta = "INSERT into chat_dudas (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
                $ejecutar = $conexion->query($consulta);
            }
        ?>
    </div>
</body>

<script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }

        req.open('GET', 'chat.php', true);
        req.send();

    }
    
    //esta linea hace que se refresque la página cada segundo
    setInterval(function(){
        ajax();
    },1000);

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>