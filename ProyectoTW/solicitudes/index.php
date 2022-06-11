<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from solicitud");
    $solicitud= $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<body>  

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
                            <a class="nav-link" href="../observaciones/listaObservaciones.php">Observaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/equipos/equipos.php">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../chat/paginaChatAdministrador.php">Chat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
</div>

    <div class="card-body">
    <div class="row justify-content-left">
        <div class="col-md-7">
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Completa todos lo campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se registró la solicitud.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>     

                <div class="login2"class="container mt-2 ml-2" >
                    <h1 class="p-2 bg-dark" >REGISTRO DE SOLICITUD</h1>
                    <form class="p-8" method="POST" action="registrar.php">
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
                            
                            <input type="text" class="form-control" name="txtNombre" autofocus required><br>
                            <input type="text" class="form-control" name="txtMatricula" autofocus required><br>
                            <input type="text" class="form-control" name="txtCarrera" autofocus required><br>
                            <input type="text" class="form-control" name="txtEntrada" value="<?php date_default_timezone_set('America/Mexico_City'); echo 
                             date('g:i:s A') ?>" readonly><br><br>
                            <input type="text" class="form-control" name="txtSalida" placeholder="16:30:00 " autofocus required><br>
                            <input type="text" class="form-control" name="txtEquipo" autofocus required><br><br>
                            <input type="text"  class="form-control" name="txtDescripcion" autofocus required><br>
                            <input type="text" class="form-control" name="txtInventario" autofocus required><br><br>
                            <input type="text" class="form-control" name="txtPrestamo" autofocus required><br>
                            <input type="text" class="form-control" name="txtMateria" autofocus required><br>
                            <input type="text" class="form-control" name="txtMaestro" autofocus required><br><br>
                            <input type="text" class="form-control" name="txtFecha" value="<?php echo date('Y-n-j'); ?>" readonly>
                        </div>

                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-success" value="Registrar" action="tabla.php" >

                    </div>      
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>






