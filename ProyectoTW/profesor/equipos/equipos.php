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
    include_once "conexion.php";
    $sentencia = $bd -> query("select * from computadora");
    $solicitud= $sentencia->fetchAll(PDO::FETCH_OBJ);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Profesor</title>
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
                                    <a class="nav-link" href="../../login/welcome3.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../prestamosEE/prestamos.php?materia=todas">Prestamos por E.E</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Lista de equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="prestamosA.php?dia=todos">Historial de prestamos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat/paginaChat">Chat</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
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
        
<div class="card-body">
    <div class="row justify-content-left">
        <div class="col-md-7">

            <div class="card" style="width: 85rem;">
            <h1 class="p-6 bg-dark" >LISTA DE SOLICITUDES</h1>
                <div class="p-2">
                    <table class="table lign-self-* ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($solicitud as $dato){                                
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->estado; ?></td>
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
        <p>
            <a href="reset-password.php" class="btn btn-warning">¿Olvidaste tu contraseña?</a>
            <a href="logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a>
        </p>

    </div>
</body>
</html>