<?php
// Inicializar la sesión
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 

require_once "config.php";
 

$username = $password = "";
$username_err = $password_err = $login_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Introduce un nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Introduce una contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }

    //Validar credenciales
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM admin WHERE username = ?";
        $sql2 = "SELECT id, username, password FROM alumno WHERE username = ?";
        $sql3 = "SELECT id, username, password FROM profesor WHERE username = ?";
        $sql4 = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
        
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                        
                            header("location: login/welcome.php");
                        } else{
                        
                            $login_err = "Contraseña o usuario equivocados.";
                        }
                    }
                } else{

                    $login_err = "Contraseña o usuario equivocados.";
                }
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            // Close statement
            $stmt->close();
        }

        if($stmt = $mysqli->prepare($sql2)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: login/welcome2.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Contraseña o usuario equivocados.";
                        
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Contraseña o usuario equivocados.";
                }
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            // Close statement
            $stmt->close();
        }
    

        if($stmt = $mysqli->prepare($sql3)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: login/welcome3.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Contraseña o usuario equivocados.";
                        
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Contraseña o usuario equivocados.";
                }
            } else{
                echo "Oops! Algo salió mal. Intenta de nuevo más tarde.";
            }

            // Close statement
            $stmt->close();
        }

        if($stmt = $mysqli->prepare($sql4)){
            $login_err = "Tu cuenta no ha sido verificada por el administrador.";

            // Close statement
            $stmt->close();
        }
    }
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login/css/login.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
    
</head>
<body>
    <div class="wrapper" id="contenedor">
    <div id="contenedorcentrado">
        <div id="login">
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginform">
            <div class="form-group">
                <label>Nombre de usuario</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </div>
        </form>

        <div id="derecho">
                    <div class="titulo">
                        Iniciar Sesión
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="login/register.php">¿No tienes Cuenta? Registrate</a>
                        <hr>
                        <a href="chat-websocket/clienteAnonimo.php">Chatea con alguno de nuestros administradores.</a>
                        <a href="anonimo/equipos/equipos.php">Visualiza nuestros equipos aquí.</a>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>