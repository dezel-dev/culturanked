<?php

include_once "maLibUtils.php";	// Car on utilise la fonction valider()

/**
 * Fonction à placer au début de chaque page privée
 * Cette fonction redirige vers la page $urlBad en envoyant un message d'erreur 
	et arrête l'interprétation si l'utilisateur n'est pas connecté
 * Elle ne fait rien si l'utilisateur est connecté, et si $urlGood est faux
 * Elle redirige vers urlGood sinon
 */
function securiser($urlBad,$urlGood=false)
{
	if (! valider("connecte","SESSION")) {
		rediriger($urlBad);
		die("");
	}
	else {
		if ($urlGood)
			rediriger($urlGood);
	}
}

// Renvoie 1 si un mot de passe respecte les conditions
// Renvoie 0 sinon
function validerPassword($password)
{
	$len = strlen($password);
	if ($len < 8) {
		return 0;
	}
	return 1;
}

?>
