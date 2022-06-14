<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<html>

<head>
	<title>WebSocket</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript">
		var socket;


		function init() {
			// Apuntar a la IP/Puerto configurado en el contructor del WebServerSocket, que es donde está escuchando el socket.
			var host = "ws://localhost:9000";
			try {
				socket = new WebSocket(host);
				log('Bienvenido - status ' + socket.readyState);
				socket.onopen = function (msg) {
					log("En línea - status " + this.readyState);
				};
				socket.onmessage = function (msg) {
					log("Recibido: " + msg.data);
				};
				socket.onclose = function (msg) {
					log("Desconectado - status " + this.readyState);
				};
			}
			catch (ex) {
				log(ex);
			}
			$("msg").focus();
		}

		function send() {
			var txt, msg;
			txt = $("msg");
			msg = txt.value;
			if (!msg) {
				alert("El mensaje no pudo ser enviado");
				return;
			}
			txt.value = "";
			txt.focus();
			try {
				socket.send(msg);
				log('Enviado: ' + msg);
			} catch (ex) {
				log(ex);
			}
		}
		function quit() {
			if (socket != null) {
				log("Adiós!");
				socket.close();
				socket = null;
			}
		}

		function reconnect() {
			quit();
			init();
		}

		// Utilities
		function $(id) { return document.getElementById(id); }
		function log(msg) { $("log").innerHTML += "<br>" + msg; }
		function onkey(event) { if (event.keyCode == 13) { send(); } }
	</script>

</head>

<body onload="init()">

	<div class="usuario">
        <?php
        $usuario = $_SESSION['username'];
        echo "<p><h4>$usuario</h4></p>";
        ?>
        <figure>
            <button type="button" onclick="document.location='../login/logout.php'"> <img src="img/logout.png" height="50px" width="50px"> </button>
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
                                    <a class="nav-link active" aria-current="page" href="../login/welcome.php">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../solicitudes/index.php">Registro de solicitud</a>
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
                                    <a class="nav-link" href="">Chat usuarios anónimos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

        </div>

        <h3>Chat "Usuarios no registrados"</h3>

		<div class="chatWebSocket">
			<div id="log"></div>
				<p><input id="msg" type="textbox" onkeypress="onkey(event)" /></p>
				<button class="btn btn-primary" onclick="send()">Enviar</button>
				<button class="btn btn-light" onclick="reconnect()">Reconectar</button>
			</div>

		</div>
	
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>