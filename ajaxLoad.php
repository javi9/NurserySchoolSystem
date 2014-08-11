

<?php 


//error_reporting(E_ALL);
//ini_set('display_errors', '1');


include 'db_config.php';
$conectar = mysql_connect($dsn,$nombre_usuario,$contraseña);
mysql_select_db('chat',$conectar);

$fecha=$_GET["fechaultimo"];
$fecha=urldecode ($fecha);

$sql="SELECT * FROM `guarderia` . `chat`  WHERE DATE_FORMAT(`fecha`, \"%Y-%m-%d %H:%i:%s\") > '".$fecha."'";

$resulset = mysql_query($sql,$conectar);
 
$arr = array();
while ($obj = mysql_fetch_object($resulset)) {

     $arr[] = array('autor' =>  utf8_encode($obj->autor),
                    'mensaje' => utf8_encode($obj->mensaje),
                    'fecha'=> ($obj->fecha),
     				'foto'=>($obj->foto))	;
}

echo json_encode($arr,JSON_PRETTY_PRINT);

?>