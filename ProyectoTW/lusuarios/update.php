<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$table=$_POST['rol'];


//$sql="INSERT INTO $table VALUES('$username','$password')";
$sql="INSERT INTO $table (username, password) VALUES ('$username','$password')";
$sql2="DELETE FROM users WHERE id='$id'";
$query=mysqli_query($con,$sql);
$query=mysqli_query($con,$sql2);
//$query2=mysqli_query($con,$sql2);
    if($query){
        Header("Location: usuarios.php");
    }
?>