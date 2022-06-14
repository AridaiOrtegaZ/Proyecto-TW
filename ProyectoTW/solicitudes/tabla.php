<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from solicitud");
    $solicitud= $sentencia->fetchAll(PDO::FETCH_OBJ);

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
                            <a class="nav-link" href="../observaciones/listaObservaciones.php">Observaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/equipos/equipos.php">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../chat/paginaChatAdministrador.php">Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://microservicio-todolist.herokuapp.com/ws/todolist.wsdl">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../chat-websocket/clienteAdministrador.php">Chat usuarios anónimos</a>
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
                                <th scope="col" colspan="2">Opciones</th>
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
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
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
