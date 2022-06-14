

<?php
    include_once "conexion.php";
    $sentencia = $bd -> query("select * from computadora");
    $solicitud= $sentencia->fetchAll(PDO::FETCH_OBJ);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Anónimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    
    
    
</head>
<body>

    <div class="container" role="main">

        <div class="c1">
        </div>
        
<div class="card-body">
    <div class="row justify-content-left">
        <div class="col-md-7">

            <div class="card" style="width: 85rem;">
            <h1 class="p-6 bg-dark" >LISTA DE EQUIPOS</h1>
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

    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>