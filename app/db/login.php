<?php


           
 function verificar_login($user, $password, &$result) {
    
    
    include 'db_config.php';

    $db = new PDO($dsn,$nombre_usuario,$contraseña);
    

   
    $sql = "SELECT * FROM `guarderia`.`login` WHERE `alias`='$user' AND `password`='$password'";


    $ejecutar_sql= $db->query($sql);
    
    if ($ejecutar_sql->rowCount()>0){
        
        session_start();
        
        $_SESSION['usuario']=$user;
        $result=$user;

        return true;

    } else {   return false;  }

}


function verificar_usuario(){
    
    session_start();
    
    if ($_SESSION[usuario]){
        return true;
    }
}


?>
