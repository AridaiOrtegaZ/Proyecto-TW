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

    <div class="container" role="main">

        <div class="c1">
            
        </div>

        <h3>Chatea con alguno de nuestros administradores</h3>

		<div class="chatWebSocket">
			<div id="log"></div>
				<p><input id="msg" type="textbox" onkeypress="onkey(event)" /></p>
				<button class="btn btn-primary" onclick="send()">Enviar</button>
				<button class="btn btn-light" onclick="reconnect()">Reconectar</button>
			</div>

		</div>
	
</body>

</html>