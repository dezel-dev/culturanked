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


<div id="home">

<div id="topbar">
	<h1 class="title">Culturanked</h1>
	<form action="./controllers/userController.php">
		<a href="index.php?view=register" class="button primary">S'inscrire</a>
		<button class="button secondary" name="action" value="gotoConnect">Se connecter</button>
	</form>
</div>

<div id="content">
	<div id="slogan">
		<h1>
			JOUEZ,
			APPRENEZ,
			GAGNEZ
		</h1>
	</div>
	<div id="subtitle">
		<p>
			Culturanked est une plateforme permettant de
			vous confronter aux autres utlisateurs sur les 
			thèmes de l'art, la culture générale et l'histoire. 
		</p>
		<p>
			Jouez et devenez le meilleur !
		</p>
	</div>
	<form action="./controllers/userController.php" method="GET">
		<button class="button primary" name="action" value="gotoLobby">C'EST PARTI !</button>
	</form>
</div>

</div>
