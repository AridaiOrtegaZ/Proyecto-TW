<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
    <title>Bienvenido Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h4>$usuario</h4></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='logout.php'"> <img src="../img/logout.png" height="50px" width="50px"> </button>
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
                                    <a class="nav-link" href="../../login/welcome2.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="../solicitud/index.php">Registro de solicitud</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Observaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat/paginaChat.php">Chat</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <table class="table" >
                        <thead class="table-success table-striped" >
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>estado</th>
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
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">   
                                <th><a href="apartar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Apartar</a></th> 
                            </tr>
                                <?php 
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
            

            <!--div class="contenido">
                <hr>
                <h1>Bienvenido</h1>
                <p>El Centro de Cómputo de la Facultad de Estadística e Informática es una
                    unidad, la cual ofrece a la comunidad de la Universidad Veracruzana
                    la posibilidad de utilizar y pedir prestado el equipo computacional cuando sea requerido.
                </p>
                <p>Este sistema fue elaborado con el objetivo de facilitar diversas tareas al personal del Centro de Cómputo de la Facultad
                    de Estadística e Informática, buscando automatizar y sistematizar algunas tareas, como lo son en este caso
                    el registro de solicitudes de prétamos del equipo de cómputo.
                </p>
            </div-->

        </div>
    </div>

    <!--h1 class="my-5">Hi, <b><!?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido al Sitio de Alumno.</h1-->
   
</body>

</html>