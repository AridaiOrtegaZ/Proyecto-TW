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
    $materia = $_GET['materia'];
    if( $materia == "todas"){
        $sentencia = $bd -> query("select * from solicitud");
        $solicitud= $sentencia->fetchAll(PDO::FETCH_OBJ);
    }else{
        $sentencia = $bd -> query("select * from solicitud where materia = '$materia'");
        $solicitud= $sentencia->fetchAll(PDO::FETCH_OBJ);
    }   
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
                                    <a class="nav-link active" aria-current="page" href="#">Prestamos por E.E</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../equipos/equipos.php">Lista de equipos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="prestamosA.php?dia=todos">Historial de prestamos</a>
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
<FORM METHOD=POST ACTION="buscar.php">
  Buscar: <INPUT TYPE="text" NAME="busqueda">
  <input type="submit" class="btn btn-success" value="Buscar" action="buscar.php" >
</FORM>

        
<div class="card-body">
    <div class="row justify-content-left">
        <div class="col-md-7">


                     <!-- inicio alerta -->

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

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> La solicitud fue actualizada.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> La solicitud se eliminó correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->

            <div class="card" style="width: 85rem;">
            <h1 class="p-6 bg-dark" >LISTA DE SOLICITUDES</h1>
                <div class="p-2">
                    <table class="table lign-self-* ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Matricula</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Hora de entrada</th>
                                <th scope="col">Hora de salida</th>
                                <th scope="col">Nombre del equipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">#Inventario</th>
                                <th scope="col">Objetivo del préstamo</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Maestro</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($solicitud as $dato){                                
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->matricula; ?></td>
                                <td><?php echo $dato->carrera; ?></td>
                                <td><?php echo $dato->hora_entrada; ?></td>
                                <td><?php echo $dato->hora_salida; ?></td>
                                <td><?php echo $dato->nom_equipo; ?></td>
                                <td><?php echo $dato->descripcion; ?></td>
                                <td><?php echo $dato->num_inventario; ?></td>
                                <td><?php echo $dato->objetivo_prestamo; ?></td>
                                <td><?php echo $dato->materia; ?></td>
                                <td><?php echo $dato->maestro; ?></td>
                                <td><?php echo $dato->fecha; ?></td>
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

    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>