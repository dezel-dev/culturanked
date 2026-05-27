<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}
?>
<div id="login">
    <h1>Mot de passe oublié</h1>
    <p class="mmdp">Un lien permettant de modifier votre mot de passe sera envoyé sur le mail lié à votre compte.</p> 
    <form action="./controllers/userController.php">
        <input type="text" class="input" id="email" name="email" placeholder="Adresse mail">
        <button type="submit" name="action" value="SendEmail" class="button secondary" id="valider">Valider</button>
    </form>
    <div class="link">
        <a href="index.php?view=login">Perdu ? Retour en arrière !</a>
    </div>
</div>