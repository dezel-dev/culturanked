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
        <div id="notifications">
			<div class="characters">
				<img src="./ressources/culturanked/valid.png" alt="Valide">
				<p class="valid">Un mail de récupération à été envoyé</p>
			</div>
			<div class="different">
				<img src="./ressources/culturanked/invalid.png" alt="Invalide">
				<p class="invalid">Aucun compte est lié à cette adresse mail</p>
			</div>
		</div>
        <button type="submit" name="action" value="SendEmail" class="button secondary" id="valider">Valider</button>
    </form>
    <div class="link">
        <a href="index.php?view=login">Perdu ? Retour en arrière !</a>
    </div>
</div>