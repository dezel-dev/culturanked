<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=home");
	die("");
}

?>

<div id="forgotLogin">
    <h1>Mot de passe oublié</h1>
    <p>Un lien permettant de modifier votre mot de passe sera envovyé sur le mail lié à votre compte</p> 
    <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail">
    <button type="submit" name="action" value="Connexion" class="btn btn-default" id="valider">Valider</button>
    <?php ?>
</div>