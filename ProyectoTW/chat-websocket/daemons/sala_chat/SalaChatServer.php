#!/usr/bin/env php
<?php
//Ejecutar desde la línea de comandos de PHP. 
//"C:\xampp\php\php.exe" -q C:\xampp\htdocs\TecnologiasWeb\proyectotw\chat\daemons\SalaChatServer.php
//en php.ini debe estar descomentada la línea «extension=php_sockets.dll
require_once('websockets.php');

class SalaChatServer extends WebSocketServer {  
  protected function process ($user, $message) {
    echo 'user sent: '.$message.PHP_EOL;
    foreach ($this->users as $currentUser) {
      if($currentUser !== $user)
        $this->send($currentUser,$message);
    }   
  }
  
  protected function connected ($user) {
    echo 'Usuario conectado'.PHP_EOL;
  }
  
  protected function closed ($user) {
    echo 'Usuario desconectado'.PHP_EOL;
  }
}

$chatServer = new SalaChatServer("localhost","9000");

try {
  $chatServer->run();
}
catch (Exception $e) {
  $chatServer->stdout($e->getMessage());
}