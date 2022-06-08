<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: tabla.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $matricula = $_POST['txtMatricula'];
    $carrera = $_POST['txtCarrera'];
    $hora_entrada = $_POST['txtEntrada'];
    $hora_salida = $_POST['txtSalida'];
    $nom_equipo = $_POST['txtEquipo'];
    $descripcion = $_POST['txtDescripcion'];
    $num_inventario = $_POST['txtInventario'];
    $objetivo_prestamo = $_POST['txtPrestamo'];
    $materia = $_POST['txtMateria'];
    $maestro = $_POST['txtMaestro'];
    $fecha= date('j-n-Y');
 

    $sentencia = $bd->prepare("UPDATE solicitud SET nombre = ?, matricula = ?, carrera = ?, hora_entrada = ?, hora_salida = ?, nom_equipo = ?, descripcion = ?, num_inventario = ?, objetivo_prestamo = ?, materia = ?, maestro = ?, fecha = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $matricula, $carrera, $hora_entrada, $hora_salida, $nom_equipo, $descripcion, $num_inventario, $objetivo_prestamo, $materia, $maestro, $fecha, $codigo]);

    if ($resultado === TRUE) {
        header('Location: tabla.php?mensaje=editado');
    } else {
        header('Location: tabla.php?mensaje=error');
        exit();
    }
    
?>