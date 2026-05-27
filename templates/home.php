<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
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
            <h1>JOUEZ, <br>APPRENEZ, <br>GAGNEZ</h1>
        </div>
        <div id="subtitle">
            <p>Culturanked est une plateforme permettant de vous confronter aux autres utilisateurs sur les thèmes de l'art, la culture générale et l'histoire.</p>
            <p>Jouez et devenez le meilleur !</p>
        </div>
        <form action="./controllers/userController.php" method="GET">
            <button class="button primary" name="action" value="gotoLobby">C'EST PARTI !</button>
        </form>
    </div>
</div>