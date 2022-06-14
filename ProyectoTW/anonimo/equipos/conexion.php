<?php 
	$contrasena = "sCwK7JPa5iqH6R0fjQob";
	$usuario = "ugn8j3upwqmxvey5";
	$nombre_bd = "bdt8uktf9a1drawviqet";

	try {
		$bd = new PDO (
			'mysql:host=bdt8uktf9a1drawviqet-mysql.services.clever-cloud.com;
			dbname='.$nombre_bd,
			$usuario,
			$contrasena,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
	} catch (Exception $e) {
		echo "Problema con la conexion: ".$e->getMessage();
	}
?>