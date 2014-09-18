<?php

	require_once "Twig/lib/Twig/Autoloader.php";
	Twig_Autoloader::register();


class guarderia{

 //private $user;

	 public static function run(){

	 	$loader = new Twig_Loader_Filesystem('templates');
		$twig = new Twig_Environment($loader);

		
	 	if (!isset($_GET["mode"])){

			$loader = new Twig_Loader_Filesystem('templates');
			$twig = new Twig_Environment($loader);

			echo $twig->render('index.html');

		}


		else{


			
					if ($_GET["mode"]=="login"){
						
						require_once "./app/db/login.php";
						if (verificar_login($_POST["user"], $_POST["pass"], $result)){ 
							$_GET["mode"]="main";
							echo $twig->render('main_panel.html',array('mode' => "main"));
}


						else {

							

							echo $twig->render('index.html');

						 }



					}   //comprobamos que el usuario es correcto....
    			
        			

					if (($_GET["mode"]=="alumnos") and (!isset($_GET["operacion"]))) {
							require_once "./app/db/dbOperation.php";
						$alumnos=consultarAlumnos();
						echo $twig->render('main_panel.html',array('mode' => "alumnos", "alumnos"=>$alumnos)); 



					}


				 

				 	else if (isset($_GET["operacion"])){
				 		require_once "./app/db/dbOperation.php";

				 		if ($_GET["operacion"]=="almacenaAlumno"){
							almacenaAlumno( $_POST["apellidos"],$_POST["name"], $_POST["edad"], $_POST["genero"], $_POST["hermanos"], null, null, $_POST["comentario"]);
							
							$alumnos=consultarAlumnos();
						     echo $twig->render('main_panel.html',array('mode' => "alumnos", "alumnos"=>$alumnos)); 
						}


						if ($_GET["operacion"]=="almacenaProfesor")
						echo "almacenado profesor"; die;

					}
					

					
					else{
				 	echo $twig->render('main_panel.html',array('mode' => $_GET["mode"]));

				 	} 


				 }
	

		





	






}

};


?>