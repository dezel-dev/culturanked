<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}
?>
<div id="home">
    <div id="topbar">
        <h1 class="title">Culturanked</h1>
        
        <div class="topbar-right">
            <?php 
            if (!valider("connecte", "SESSION")) {
                echo "<form action=\"./controllers/userController.php\">";
                echo "<a href=\"index.php?view=register\" class=\"button primary\">S'inscrire</a>";
                echo "<button class=\"button secondary\" name=\"action\" value=\"gotoConnect\">Se connecter</button>";
                echo "</form>";
            }
            else {
                echo "<div class=\"dropdown\">";
                echo "<img class=\"account-btn\" src=\"./ressources/culturanked/account.png\" alt=\"Account\">";
                echo "<div class=\"dropdown-content\">";
                echo "<a href=\"index.php?view=profil\">Voir profil</a>";
                echo "<a href=\"./controllers/userController.php?action=logout\">Déconnexion</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
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