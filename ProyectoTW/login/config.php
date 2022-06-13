<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'bdt8uktf9a1drawviqet-mysql.services.clever-cloud.com');
define('DB_USERNAME', 'ugn8j3upwqmxvey5');
define('DB_PASSWORD', 'sCwK7JPa5iqH6R0fjQob');
define('DB_NAME', 'bdt8uktf9a1drawviqet');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>