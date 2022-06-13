<?php
function conectar(){
    $host="bdt8uktf9a1drawviqet-mysql.services.clever-cloud.com";
    $user="ugn8j3upwqmxvey5";
    $pass="sCwK7JPa5iqH6R0fjQob";

    $bd="bdt8uktf9a1drawviqet";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>