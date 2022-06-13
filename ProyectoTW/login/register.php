<?php
require_once "config.php";
 
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

                header("location: login.php");
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
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        <style>
            body{ font: 14px sans-serif; }
            .wrapper{ width: 360px; padding: 20px; }
        </style>
    </head>
<body>
    <div class="wrapper" id="contenedor">
    <div id="contenedorcentrado">
    <div id="login">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginform">
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
            </div>
            </div>
        </form>
        <div id="derecho">
            <div class="titulo">
                Regístrate
            </div>
                <hr>
                    <div class="pie-form">
                        <a href="login.php">¿Ya tienes cuenta? Inicia Sesión</a>
                <hr>
        </div>
    </div> 
    </div>  
    </div>    
</body>
</html>