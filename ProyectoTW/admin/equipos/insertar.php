<?php
include("conexion.php");
$con=conectar();

$nombre=$_POST['nombre'];
$ip=$_POST['ip'];
$estado=$_POST['estado'];


$sql="INSERT INTO computadora VALUES('','$ip','$nombre','$estado')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: equipos.php");
}else {
}
?>