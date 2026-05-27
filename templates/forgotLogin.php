<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=home");
	die("");
}

?>

<div id="login">
    <h1>Mot de passe oublié</h1>
    <p class="mmdp">Un lien permettant de modifier votre mot de passe sera envovyé sur le mail lié à votre compte</p> 
    <form role="form" action="controleur.php">
    <div class="form-group"> 
        <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail">
    </div>
    <button type="submit" name="action" value="SendEmail" class="btn btn-default" id="valider">Valider</button>
    <?php ?>
    </form>
    <div class="link">
    <a href="index.php?view=home">Perdu ? Retour au menu principal !</a>
    </div>
</div>