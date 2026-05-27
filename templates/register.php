<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}
?> 
<div id="register">
	<h1>S'inscrire</h1>
	<form action="./controllers/userController.php">
		<input class="input" type="text" name="username" placeholder="Nom d'utilisateur">
		<input class="input" type="email" name="email" placeholder="Adresse mail">
		<input class="input" type="password" name="password" placeholder="Mot de passe">
		<input class="input" type="password" name="password_confirm" placeholder="Confirmer le mot de passe">
		
		<div id="notifications">
			<div class="characters">
				<img src="./ressources/culturanked/valid.png" alt="Valide">
				<p class="valid">Minimum 8 caractères</p>
			</div>
			<div class="different">
				<img src="./ressources/culturanked/invalid.png" alt="Invalide">
				<p class="invalid">Les mots de passes sont différents</p>
			</div>
			<div class="advice">
				<img src="./ressources/culturanked/information.png" alt="Info">
				<p>Il est conseillé d'inventer une phrase unique et mémorable</p>
			</div>
		</div>
		
		<button type="submit" class="button secondary" id="valider-connexion">Valider</button>
		
		<div class="link">
		    <a href="index.php?view=login">Déjà un compte ? Connectez-vous !</a>
        </div>
	</form>
</div>