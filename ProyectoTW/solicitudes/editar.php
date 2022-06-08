<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: tabla.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from solicitud where codigo = ?;");
    $sentencia->execute([$codigo]);
    $solicitud = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container" role="main">

<div class="c1">
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../login/welcome.php">Acerca de Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../solicitudes/index.php">Registro de solicitud</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/listaUsuarios/alumno.php">Lista de usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/roles/roles.php">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../solicitudes/tabla.php">Bitácora de uso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Observaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/equipos/equipos.php">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../chat/paginaChat">Chat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
</div>

<div class="card-body">
    <div class="login2"class="container mt-2 ml-2" >
            <h1 class="p-2 bg-dark" >EDITAR SOLICITUD</h1>
                <form class="p-8" method="POST" action="editarProceso.php">
                    <div class="form-group row">
                        <div class="col-sm-5">
                        <br>
                            <label class="form-label">Nombre: </label><br><br><br>
                            <label class="form-label">Matricula: </label><br><br><br>
                            <label class="form-label">Carrera: </label><br><br><br>
                            <label class="form-label">Hora de entrada: </label><br><br><br>
                            <label class="form-label">Hora de salida: </label><br><br><br>
                            <label class="form-label">Nombre del Equipo: </label><br><br><br>
                            <label class="form-label">Descripción: </label><br><br><br>
                            <label class="form-label">Número de inventario: </label><br><br><br>
                            <label class="form-label">Objetivo del préstamo: </label><br><br><br>
                            <label class="form-label">Materia: </label><br><br><br>
                            <label class="form-label">Maestro: </label><br><br><br>
                            <label class="form-label">Fecha: </label><br><br><br>
                        </div>

                        <div class="col-sm-6" >
                        <br>
                            <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $solicitud->nombre; ?>"><br>
                            <input type="text" class="form-control" name="txtMatricula" autofocus required 
                        value="<?php echo $solicitud->matricula; ?>"><br>
                            <input type="text" class="form-control" name="txtCarrera" autofocus required
                        value="<?php echo $solicitud->carrera; ?>"><br>
                            <input class="form-control" name="txtEntrada" autofocus required 
                        value="<?php echo $solicitud->hora_entrada; ?>" readonly><br><br>
                            <input class="form-control" name="txtSalida"  autofocus required
                        value="<?php echo $solicitud->hora_salida; ?>"><br>
                            <input type="text" class="form-control" name="txtEquipo" required 
                        value="<?php echo $solicitud->nom_equipo; ?>"><br><br>
                            <input type="text"  class="form-control" name="txtDescripcion" required
                        value="<?php echo $solicitud->descripcion; ?>"><br>
                            <input type="text" class="form-control" name="txtInventario" required
                        value="<?php echo $solicitud->num_inventario; ?>"><br><br>
                            <input type="text" class="form-control" name="txtPrestamo" required
                        value="<?php echo $solicitud->objetivo_prestamo; ?>"><br>
                            <input type="text" class="form-control" name="txtMateria" required
                        value="<?php echo $solicitud->materia; ?>"><br>
                            <input type="text" class="form-control" name="txtMaestro" required
                        value="<?php echo $solicitud->maestro; ?>"><br><br>
                            <input type="date" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $solicitud->fecha;?>" readonly>
                        </div>

                        <input type="hidden" name="codigo" value="<?php echo $solicitud->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>                             
                </form>
    </div>
</div>
