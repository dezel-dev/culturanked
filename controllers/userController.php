<?php
session_start();

include_once "../libs/maLibUtils.php";
include_once "../libs/maLibSQL.pdo.php";
include_once "../libs/maLibSecurisation.php"; 
include_once "../models/userModel.php"; 

$qs = "";

if ($action = valider("action"))
{
  ob_start ();
  echo "Action = '$action' <br />";

  // Un paramètre action a été soumis, on fait le boulot...
  switch($action)
  {
    case 'Lobby' :
      // On redirigera vers la page index automatiquement
    break;    

    case 'gotoConnect' :
        // On regarde si l'utilisateur est déjà connecté => vers lobby.php
        // Sinon vers login.php
    break;    
    
  }
}

die("");
// Redirection
$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
header("Location:" . $urlBase . $qs);

// Vidage de la mémoire tampon
ob_end_flush();
  
?>










