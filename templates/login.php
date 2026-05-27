<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

// si un message est présent, on l'affiche 
// GET:msg 

if ($msg = valider("msg")) 
	$msgHTML = '<h3 style="color:red;">' . stripslashes($msg) . "</h3>"; 
else $msgHTML = ""; 

//Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

?>

<div id="login">
	<h1>Se Connecter</h1>
<?=$msgHTML?>
 <form role="form" action="controleur.php">
  <div class="form-group">
    <input type="text" class="form-control" id="email" name="login" value="<?php echo $login;?>" placeholder="Nom d'utilisateur">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>" placeholder="Mot de passe">
  </div>
  <div class="link">
    <a href="index.php?view=forgotLogin">Mot de passe oublié ?</a>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="remember" id="check" <?php echo $checked;?> >Se souvenir de moi</label>
  </div>
  <button type="submit" name="action" value="Connexion" class="btn btn-default" id="valider">Valider</button>
</form>
    <div class="link">
    <a href="index.php?view=register">Pas de compte ? Inscrivez-vous !</a>
    </div>
</div>





