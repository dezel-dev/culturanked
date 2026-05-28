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

    case 'registerUser':
      // On récupère les infos passées en POST
      // On vérifie que tout respecte bien les conditions
      $username = valider("username");
      $email = valider("email");
      $password = valider("password");
      $password_confirm = valider("password_confirm");

      if (!isUsernameUnique($username)) {
        header("Location:../index.php?view=register&msg=Le nom d'utilisateur doit être unique");
        die("");  
      } 

      $len = strlen($username);
      if ($len <= 4 || $len > 20) {
        header("Location:../index.php?view=register&msg=Nom d'utilisateur invalide");
        die(""); 
      }

      if (getPassword($email)) {
        header("Location:../index.php?view=register&msg=Un compte existe déjà avec cette email");
        die(""); 
      }

      if (!validerPassword($password)) {
        header("Location:../index.php?view=register&msg=Mot de passe invalide");
        die(""); 
      }

      if ($password != $password_confirm) {
        header("Location:../index.php?view=register&msg=Les mots de passe sont différents");
        die(""); 
      }

      // Tout respecte bien, on peut enregistrer le user
      registerUser($username, $email, $password);
      header("Location:../index.php?view=login&msg=Le ");
      die(""); 

      break;

      case 'loginUser':
        $username = valider("username");
        $password = valider("password");

        $id = verifUserBdd($username, $password);
        if (!$id) {
          // Aucun compte
          header("Location:../index.php?view=login&msg=Compte introuvable");
          die(""); 
        }
        else {
          // Un compte est associé;
	        $_SESSION["pseudo"] = $username;
	        $_SESSION["idUser"] = $id;
	        $_SESSION["connecte"] = true;
          header("Location:../index.php?view=lobby");
          die(""); 
        }
        break;
    
  }
}

//die("");
// Redirection
$urlBase = dirname($_SERVER["PHP_SELF"]) . "../index.php";
header("Location:" . $urlBase . $qs);

// Vidage de la mémoire tampon
ob_end_flush();
  
?>










