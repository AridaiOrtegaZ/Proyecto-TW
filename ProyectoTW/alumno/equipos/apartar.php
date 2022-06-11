<?php

    include("conexion.php");
    $con=conectar();
    $id=$_GET['id'];

    echo $id;
    $sql="UPDATE computadora SET estado='Ocupado' WHERE id=$id";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../solicitud/index.php");
    }
?>