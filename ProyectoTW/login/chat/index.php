<?php
    include "db/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT CON PHP, MYSQL Y AJAX</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body onload="ajax()">
    <div id="contenedor">
        <div id="caja-chat">
            <div id="chat">
            </div>
        </div>
        <form method="POST" action="index.php">
            <input type="text" name="nombre" placeholder="Ingresa tu nombre">
            <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $mensaje = $_POST['mensaje'];

                $consulta = "INSERT into chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
                $ejecutar = $conexion->query($consulta);

                if($ejecutar == true) {
                    echo "<embed loop='false' src='notificacionChat/beep.mp3' hidden='true' autoplay='true'>";
                }
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

</html>