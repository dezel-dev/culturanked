<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}

if ($msg = valider("msg")) {
	$msgHTML = '<p class="alert-msg">' . stripslashes($msg) . "</p>"; 
} else {
    $msgHTML = ""; 
}

?> 
<div id="register">
	<h1>S'inscrire</h1>
	<?=$msgHTML?>
	<form action="./controllers/userController.php" method="POST">
		<input id="register_usernameInput" class="input" type="text" name="username" placeholder="Nom d'utilisateur">
		<input id="register_emailInput" class="input" type="email" name="email" placeholder="Adresse mail">
		<input id="register_passwordInput" class="input" type="password" name="password" placeholder="Mot de passe" onblur="verifPassword()">
		<input id="register_confirmPasswordInput" class="input" type="password" name="password_confirm" placeholder="Confirmer le mot de passe" onblur="verifPassword()">
		
		<div id="notifications">
			<div id="characters">
				<img src="./ressources/culturanked/invalid.png" alt="Invalid">
				<p class="invalid">Minimum 8 caractères</p>
			</div>
			<div id="different">
				<img src="./ressources/culturanked/invalid.png" alt="Invalide">
				<p class="invalid">Les mots de passes sont différents</p>
			</div>
			<div id="advice" style="display: flex;">
				<img src="./ressources/culturanked/information.png" alt="Info">
				<p>Il est conseillé d'inventer une phrase unique et mémorable</p>
			</div>
		</div>
		
		<button type="submit" class="button secondary" name="action" id="valider-inscription" value="registerUser" disabled="disabled">Valider</button>
		
		<div class="link">
		    <a href="index.php?view=login">Déjà un compte ? Connectez-vous !</a>
        </div>
	</form>
</div>