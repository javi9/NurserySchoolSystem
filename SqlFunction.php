<?php




function connectDB($basededatos){
    include 'db_config.php';
   $conexion = mysqli_connect($dsn, $nombre_usuario, $contraseña , $basededatos);
    if($conexion){
       
    }else{
        echo 'Ha sucedido un error inesperado en la conexión de la base de datos';
    }   
    return $conexion;
}

function disconnectDB($conexion){

    $close = mysqli_close($conexion);

    if($close){
       
    }else{
        echo 'Ha sucedido un error inesperado en la desconexión de la base de datos';
    }   

    return $close;
}

function getArraySQL($sql, $basededatos){

    $conexion = connectDB($basededatos);

    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa

    $rawdata = array(); 

    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }

    disconnectDB($conexion); //desconectamos la base de datos

    return $rawdata; //devolvemos el array
}



?>