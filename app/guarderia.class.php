<?php

	require_once "Twig/lib/Twig/Autoloader.php";
	Twig_Autoloader::register();


class guarderia{

 //private $user;

	 public static function run(){

		
	 	if (!isset($_GET["mode"])){

			$loader = new Twig_Loader_Filesystem('templates');
			$twig = new Twig_Environment($loader);

			echo $twig->render('index.html');

		}


		else{


			
					if ($_GET["mode"]=="login"){echo "login";die;}   //comprobamos que el usuario es correcto....
    			
        			$loader = new Twig_Loader_Filesystem('templates');
					$twig = new Twig_Environment($loader);
					echo $twig->render('main_panel.html',array('mode' => $_GET["mode"]));
	

	}

}

};


?>