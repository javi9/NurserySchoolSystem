

<?php 


error_reporting(E_ALL);
ini_set('display_errors', '1');


include '../db/db_config.php';

$db = new PDO($dsn,$nombre_usuario,$contraseña);


$fecha=$_GET["fechaultimo"];
$fecha=urldecode ($fecha);

$sql="SELECT * FROM `guarderia` . `chat`  WHERE DATE_FORMAT(`fecha`, \"%Y-%m-%d %H:%i:%s\") > '".$fecha."'";


$resulset = $db->query($sql);

//$resulset = mysql_query($sql,$conectar);
 
 

$arr = array();

while($obj = $resulset->fetch(PDO::FETCH_ASSOC)) {


     $arr[] = array('autor' =>  utf8_encode($obj['autor']),
                    'mensaje' => utf8_encode($obj['mensaje']),
                    'fecha'=> ($obj['fecha']),
     				'foto'=>($obj['foto']))	;
}


//var_dump($resulset);
	echo json_encode($arr,JSON_PRETTY_PRINT);

?>
