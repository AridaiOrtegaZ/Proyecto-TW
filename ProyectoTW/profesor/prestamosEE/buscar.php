<?php
include_once "conexion.php";
$materia=$_POST['busqueda'];
Header("Location: prestamos.php?materia=$materia");
?>
