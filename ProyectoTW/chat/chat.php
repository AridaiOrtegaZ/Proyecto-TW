<?php

    include "db/db.php";

    $consulta = "SELECT * FROM chat_dudas ORDER BY id";
    $ejecutar = $conexion->query($consulta);
    while ($fila = $ejecutar->fetch_array()) :
?>

<div id="datos-chat">
    <span style="color: #ffffff;"> <?php echo $fila['nombre']; ?>: </span>
    <span style="color: #000000"> <?php echo $fila['mensaje']; ?> </span>
    <span style="float: right;"> <?php echo formatearFecha($fila['fecha']); ?> </span>
</div>

<?php endwhile; 
?>