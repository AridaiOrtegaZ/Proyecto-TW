<?php
session_start();
require 'conexion.php';

//$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];

/*function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
      return $_SERVER['HTTP_CLIENT_IP'];
          
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
      
    return $_SERVER['REMOTE_ADDR'];
  }

 $ip = getenv('REMOTE_ADDR'); */

 function get_client_ip() {
   $ipaddress = '';
   if (getenv('HTTP_CLIENT_IP'))
       $ipaddress = getenv('HTTP_CLIENT_IP');
 
   else if(getenv('HTTP_X_FORWARDED_FOR'))
       $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
 
   else if(getenv('HTTP_X_FORWARDED'))
       $ipaddress = getenv('HTTP_X_FORWARDED');
 
   else if(getenv('HTTP_FORWARDED_FOR'))
       $ipaddress = getenv('HTTP_FORWARDED_FOR');
 
   else if(getenv('HTTP_FORWARDED'))
      $ipaddress = getenv('HTTP_FORWARDED');
 
   else if(getenv('REMOTE_ADDR'))
       $ipaddress = getenv('REMOTE_ADDR');
   else
       $ipaddress = 'UNKNOWN';
   if (strpos($ipaddress, ",") !== false) :
     $ipaddress = strtok($ipaddress, ",");
   endif;
   return $ipaddress;
 }
 
 function get_public_ip(){
   $externalContent = file_get_contents('http://checkip.dyndns.com/');
   preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
   $externalIp = $m[1];
   return $externalIp;
 }
 
 $theIP = get_client_ip();
 $theExternalIP = get_public_ip();

$nombre = $_SESSION['username'];
$ip =  $_SERVER["REMOTE_ADDR"];

$insertar = "INSERT INTO observacion VALUES(0, '$nombre', '$comentario', '$theExternalIP')";

$query = mysqli_query($conexion, $insertar);

if($query){
    echo "<script> alert('El comentario se envió correctamente')
    location.href = '../formularioObservacion.php'
    </script>";
}else{
    echo "<script> alert('Error el comentario no fue enviado')
    location.href = '../formularioObservacion.php'
    </script>";
}


?>