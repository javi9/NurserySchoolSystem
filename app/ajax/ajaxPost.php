

<?php 

	error_reporting(E_ALL);
	ini_set('display_errors', '1');


	include './app/db/db_config.php';

	$conectar = mysql_connect($dsn,$nombre_usuario,$contraseña);
	mysql_select_db('chat', $conectar);

	$sql = "INSERT INTO `guarderia`.`chat`  VALUES (NULL, 'root' , '". $_POST['message']. "', CURRENT_TIMESTAMP, 'cara1_50.jpg')";   //meter el autor, desde $_SESION
	$resulset = mysql_query($sql,$conectar);
	 
 ?>
