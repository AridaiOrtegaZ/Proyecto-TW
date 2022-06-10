<?php
include_once "conexion.php";
$dia=$_POST['selCombo'];
Header("Location: prestamosA.php?dia=$dia");
?>