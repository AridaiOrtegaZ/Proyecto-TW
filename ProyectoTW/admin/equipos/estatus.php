<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$estado=$_POST['estado'];
$ip=$_POST['ip'];
$nombre=$_POST['nombre'];

$sql="UPDATE computadora SET  ip='$ip', nombre='$nombre', estado='$estado' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: equipos.php");
    }
?>