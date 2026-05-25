<?php
    session_start();

	include_once "libs/maLibUtils.php";

	// on récupère le paramètre view éventuel 
	$view = valider("view"); 
	if (!$view) $view = "home"; 

	// En fonction de la vue à afficher, on appelle tel ou tel template
	switch($view)
	{		

		case 'home' : 
			include("templates/home.php");
		break;


		default : // si le template correspondant à l'argument existe, on l'affiche
			if (file_exists("templates/$view.php"))
                include("templates/navbar.php");
				include("templates/$view.php");

	}
	
?>