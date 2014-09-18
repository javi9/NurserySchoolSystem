<?php


function almacenaAlumno($apellidos, $nombre, $edad, $sx, $nH, $dniPadre, $grupoId, $com){

	include 'db_config.php';
    $db = new PDO($dsn,$nombre_usuario,$contraseña);
  	$sql=  "INSERT INTO `guarderia`.`alumnos_pertenece_tutela` (`apellidos`, `nombre`, `edad`, `sexo`, `numeroHermanos`, `dniPadre`, `grupoId`, `comentario`) VALUES ('$apellidos', '$nombre', '$edad', '$sx', '$nH', '$dniPadre', '$grupoId', '$com')";
	$ejecutar_sql= $db->query($sql);
}



function consultarAlumnos(){

	include 'db_config.php';
    $db = new PDO($dsn,$nombre_usuario,$contraseña);
	$sql="SELECT * FROM `alumnos_pertenece_tutela` WHERE 1";


	$alumnos=array();
	foreach($db->query($sql) as $row) {
		$alumno=array("nombre"=> $row['nombre'], "apellidos"=>$row['apellidos'], "edad"=>$row['edad'], "sexo"=>$row['sexo'], "nH"=>$row['numeroHermanos'], "dniPadre"=>$row['dniPadre'], "grupoId"=>$row['grupoId'], "comentario"=>$row['comentario']);
		$alumnos[]=$alumno;

   }


  return $alumnos;
}


?>