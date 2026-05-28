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
    case 'gotoLobby' :
      if (!valider("connecte","SESSION")) {
        header("Location:../index.php?view=lobby");
        die("");
       }
       else { 
        header("Location:../index.php?view=login");
        die("");
       }
    break;    

    case 'gotoConnect' :
       if (!valider("connecte","SESSION")) {
        header("Location:../index.php?view=login");
        die("");
       }
       else { 
        header("Location:../index.php?view=home");
        die("");
       }
    break;    
    
  }
}

//die("");
// Redirection
$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
header("Location:" . $urlBase . $qs);

// Vidage de la mémoire tampon
ob_end_flush();
  
?>










