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

    $sql="SELECT *  FROM computadora";
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
            <button type="button" onclick="document.location='logout.php'"> <img src="../img/logout.png" height="50px" width="50px"> </button>
            <figcaption>Cerrar Sesión</figcaption>
        </figure>
</div>

    <div class="container" role="main">
        
        <div class="c1">

            <div class="menu">
                <a href="../../login/welcome.php">Acerca de nosotros</a>
                <a href="../../solicitudes/index.php">Registro de solicitud</a>
                <a href="../listaUsuarios/alumno.php">Lista de usuarios</a>
                <a href="../roles/roles.php">Roles</a>
                <a href="../../solicitudes/tabla.php">Bitácora de uso</a>
                <a href="#">Observaciones</a>
                <a href="#">Chat</a>
            </div>

            <div >
                <h1>Registrar nuevo "Equipo de Cómputo"</h1>
                    <form action="insertar.php" method="POST">
                        <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                        <input type="text" class="form-control mb-3" name="ip" placeholder="IP">
                        <div>
                        <select name="estado" id="estado" name="estado" placeholder="estado">
                            <option value="Ocupado">Ocupado</option>
                            <option value="Disponible">Disponible</option>
                        </select>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
            </div>

                    <table class="table" >
                        <thead class="table-success table-striped" >
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>estado</th>
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
                                <th><?php  echo $row['nombre']?></th> 
                                <th><?php  echo $row['estado']?></th> 
                                <th><a href="updateE.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Estatus</a></th>
                                <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                            </tr>
                                <?php 
                                    }
                                ?>
                        </tbody>
                    </table>


        </div>

        <!--<h1 class="my-5">Hola, <b><!?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido al Sitio de Administador.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">¿Olvidaste tu contraseña?</a>
        <a href="logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a>
    </p>-->

    </div>

    
</body>
</html>