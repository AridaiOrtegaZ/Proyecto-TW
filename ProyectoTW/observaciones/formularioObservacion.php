<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Observaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h4>$usuario</h4></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='../login/logout.php'"> <img src="img/logout.png" height="50px" width="50px"> </button>
            <figcaption>Cerrar Sesión</figcaption>
        </figure>
    </div>

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
                                    <a class="nav-link"  href="../login/welcome2.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../alumno/solicitud/index.php">Registro de solicitud</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../alumno/equipos/equipos.php">Equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="../observaciones/formularioObservacion.php">Observaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat/paginaChatAlumno.php">Chat</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="formulario">
                <hr>
                <form action="db/guardarObservacion.php" method="POST">
                    <h2>Tu opinión es muy importante para nosotros</h2>
                    <h3>Por favor comentanos tus inquietudes</h3>
                    <p><label for="">Comentario</label></p>
                    <p><textarea name="comentario" cols="100" rows="10" required></textarea></p>
                    <p><input type="submit" class="btn btn-primary" value="Enviar Comentario"></p>
                </form>
            </div>

            <?php 
            include("../observaciones/db/conexion.php");

            $sql="SELECT * FROM observacion";
            $query=mysqli_query($conexion,$sql);
            ?>

            <div class="tablaObservaciones">
                <hr>
                <h1>OTROS COMENTARIOS</h1>
                <div class="container mt-5">
            <div class="row">         
                <div class="col-md-8">
                    <table class="table" >
                        <thead class="table-success table-striped" >
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>comentario</th>
                                <th>ip</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <th><?php  echo $row['id']?></th>
                                <th><?php  echo $row['nombre']?></th> 
                                <th><?php  echo $row['comentario']?></th>
                                <th><?php  echo $row['ip']?></th>                                        
                            </tr>
                                <?php 
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>  
            </div>
        </div>
        </div>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>