<?php
include("conexion.php");
$con=conectar();


$username=$_POST['username'];
$password=$_POST['password'];


//$sql="INSERT INTO alumno VALUES('$username','$password')";
$sql = "INSERT INTO alumno (username, password) VALUES ('$username', '$password')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: alumno.php");  
}else {
}
?>