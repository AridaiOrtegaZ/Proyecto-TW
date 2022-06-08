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
                <a href="../../login/welcome.php">Acerca de nosotros</a>
                <a href="../../solicitudes/index.php">Registro de solicitud</a>
                <a href="#">Lista de usuarios</a>
                <a href="../roles/roles.php">Roles</a>
                <a href="../../solicitudes/tabla.php">Bitácora de uso</a>
                <a href="#">Observaciones</a>
                <a href="../equipos/equipos.php">Equipos</a>
                <a href="#">Chat</a>
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

        <!--<h1 class="my-5">Hola, <b><!?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido al Sitio de Administador.</h1>-->
    <!-- <p>
        <a href="reset-password.php" class="btn btn-warning">¿Olvidaste tu contraseña?</a>
        <a href="../login/logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a>
    </p>-->

    </div>

    
</body>
</html>