<?php
  
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtMatricula"]) || empty($_POST["txtCarrera" ]) || empty($_POST["txtEntrada" ]) || empty($_POST["txtSalida" ]) || empty($_POST["txtEquipo" ]) || empty($_POST["txtDescripcion" ]) || empty($_POST["txtInventario" ]) || empty($_POST["txtPrestamo" ]) || empty($_POST["txtMateria" ]) || empty($_POST["txtMaestro" ]) || empty($_POST["txtFecha" ])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    date_default_timezone_set('America/Mexico_City');
    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $nombre = $_POST['txtNombre'];
    $matricula = $_POST['txtMatricula'];
    $carrera = $_POST['txtCarrera'];
    $hora_entrada = date('g:i:s A');
    $hora_salida = $_POST['txtSalida'];
    $nom_equipo = $_POST['txtEquipo'];
    $descripcion = $_POST['txtDescripcion'];
    $num_inventario = $_POST['txtInventario'];
    $objetivo_prestamo = $_POST['txtPrestamo'];
    $materia = $_POST['txtMateria'];
    $maestro = $_POST['txtMaestro'];
    $fecha = date('Y-n-j');
   
    
    $sentencia = $bd->prepare("INSERT INTO solicitud(nombre,matricula,carrera, hora_entrada, hora_salida, nom_equipo, descripcion, num_inventario, objetivo_prestamo, materia, maestro, fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre, $matricula, $carrera, $hora_entrada, $hora_salida, $nom_equipo, $descripcion, $num_inventario,$objetivo_prestamo, $materia, $maestro, $fecha]);

    if ($resultado === TRUE) {
        header('Location: tabla.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
<?php include 'template/header.php' ?>

