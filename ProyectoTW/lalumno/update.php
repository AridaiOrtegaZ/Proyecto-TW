<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$username=$_POST['username'];

$sql="UPDATE alumno SET  id='$id',username='$username' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }
?>