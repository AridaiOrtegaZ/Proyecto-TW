<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM alumno";
    $query=mysqli_query($con,$sql);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

<div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h3>$usuario</h3></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='login/logout.php'"> <img src="../img/logout.png" height="50px" width="50px"> </button>
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
                                    <a class="nav-link" href="../../login/welcome.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../solicitudes/index.php">Registro de solicitud</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="../listaUsuarios/alumno.php">Lista de usuarios</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="../roles/roles.php">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../solicitudes/tabla.php">Bitácora de uso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../observaciones/listaObservaciones.php">Observaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../equipos/equipos.php">Equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../chat/paginaChatAdministrador.php">Chat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://microservicio-todolist.herokuapp.com/ws/todolist.wsdl">Agenda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../chat-websocket/htdocs/sala_chat/clienteAdministrador.php">Chat usuarios anónimos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="contenido">
                <hr>
                <h1>LISTA DE USUARIOS</h1>
                <div class="container mt-5">
            <div class="row">         
                <div class="col-md-8">
                    <table class="table" >
                        <thead class="table-success table-striped" >
                            <tr>
                                <th>id</th>
                                <th>username</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <th><?php  echo $row['id']?></th>
                                <th><?php  echo $row['username']?></th> 
                                <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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