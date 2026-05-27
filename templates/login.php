<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=login");
	die("");
}

if ($msg = valider("msg")) {
	$msgHTML = '<p class="alert-msg">' . stripslashes($msg) . "</p>"; 
} else {
    $msgHTML = ""; 
}

$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
$checked = valider("remember", "COOKIE") ? "checked" : ""; 
?>
<div id="login">
	<h1>Se connecter</h1>
	<?=$msgHTML?>
    <form action="./controllers/userController.php">
        <input type="text" class="input" id="email" name="login" value="<?php echo $login;?>" placeholder="Nom d'utilisateur">
        <input type="password" class="input" id="pwd" name="passe" value="<?php echo $passe;?>" placeholder="Mot de passe">
        
        <div class="checkbox">
            <label><input type="checkbox" name="remember" id="check" <?php echo $checked;?> > Se souvenir de moi</label>
        </div>
        
        <button type="submit" name="action" value="Connexion" class="button secondary" id="valider">Valider</button>
    </form>
    
    <div class="link">
        <a href="index.php?view=forgotLogin">Mot de passe oublié ?</a> <br>
        <a href="index.php?view=register">Pas de compte ? Inscrivez-vous !</a>
    </div>
</div>