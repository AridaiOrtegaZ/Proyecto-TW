<?php
include("conexion.php");
require_once "config.php";

$con=conectar();
$sql="SELECT * FROM users";
$query=mysqli_query($con,$sql);

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Introduce tu nombre de usuario.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "El nombre de usuario solo puede contener letras y números.";
    } else{
        $sql = "SELECT id FROM admin WHERE username = ?";
        $sql2 = "SELECT id FROM profesor WHERE username = ?";
        $sql3 = "SELECT id FROM alumno WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);

            $param_username = trim($_POST["username"]);
  
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "El nombre de usario ya existe.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            $stmt->close();
        }
        if($stmt = $mysqli->prepare($sql2)){
            $stmt->bind_param("s", $param_username);

            $param_username = trim($_POST["username"]);
  
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "El nombre de usario ya existe.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            $stmt->close();
        }
        if($stmt = $mysqli->prepare($sql3)){
            $stmt->bind_param("s", $param_username);

            $param_username = trim($_POST["username"]);
  
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "El nombre de usario ya existe.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            $stmt->close();
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Introduce tu contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña debe tener al menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las contraseña no coinciden.";
        }
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        if($stmt = $mysqli->prepare($sql)){
        
            $stmt->bind_param("ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            

            if($stmt->execute()){

                header("location: usuarios.php");
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            $stmt->close();
        }
    }

    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ASIGNAR ROL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">         
                <div class="col-md-3">
                    <h1>Crear nueva cuenta</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Repite tu contraseña</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <table class="table" >
                        <thead class="table-success table-striped" >
                            <tr>
                                <th>id</th>
                                <th>username</th>
                                <th>password</th>
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
                                <th><?php  echo $row['password']?></th> 
                                <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Asignar</a></th>
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
    </body>
</html>