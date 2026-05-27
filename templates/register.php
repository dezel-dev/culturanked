<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=home");
	die("");
}

?> 


<div id="register">
	<h1>S'inscrire</h1>
	<form action="./controllers/userController.php">
		<input type="text" placeholder="Nom d'utilisateur"/> <br>
		<input type="text" placeholder="Adresse mail"/> <br>
		<input type="password" placeholder="Mot de passe"/> <br>
		<input type="password" placeholder="Confirmer le mot de passe"/> <br>
		<div id="notifications">
			<div class="characters">
				<img src="./ressources/culturanked/valid.png" alt="">
				<p>8 caractères minimum</p>
			</div>
		</div>
	</form>
</div>
