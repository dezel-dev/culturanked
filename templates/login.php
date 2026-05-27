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
	<h1>Connexion</h1>
<?=$msgHTML?>
 <form role="form" action="controleur.php">
  <div class="form-group">
    <label for="email">Login</label>
    <input type="text" class="form-control" id="email" name="login" value="<?php echo $login;?>" >
  </div>
  <div class="form-group">
    <label for="pwd">Passe</label>
    <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="remember" <?php echo $checked;?> >Se souvenir de moi</label>
  </div>
  <button type="submit" name="action" value="Connexion" class="btn btn-default">Connexion</button>
</form>
</div>



