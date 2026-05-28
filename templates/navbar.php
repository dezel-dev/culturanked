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

$cat = isset($_GET['cat']) ? $_GET['cat'] : 'play';
?>

<div id="navbar">
	<div id="topbar">
        <h1 class="title">Culturanked</h1>
		<div class="link-navbar">
            <a href="index.php?view=lobby&cat=play" class="<?php echo ($cat == 'play') ? 'select' : ''; ?>">Jouer</a> 
            <a href="index.php?view=lobby&cat=career" class="<?php echo ($cat == 'career') ? 'select' : ''; ?>">Carrière</a> 
            <a href="index.php?view=lobby&cat=ranking" class="<?php echo ($cat == 'ranking') ? 'select' : ''; ?>">Classement</a> 
            <a href="index.php?view=lobby&cat=social" class="<?php echo ($cat == 'social') ? 'select' : ''; ?>">Social</a>
        </div>
        
        <div id="btnprofil" class="dropdown">
            <img class="account-btn" src="./ressources/culturanked/account.png" alt="Account">
            <div class="dropdown-content">
                <a href="index.php?view=profil">Voir profil</a>
                <a href="./controllers/userController.php?action=logout">Déconnexion</a>
            </div>
        </div>
    </div>
</div>