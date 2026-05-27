<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=reset");
	die("");
}
?>

<div id="login">
    <h1>Nouveau Mot de Passe</h1>
    <form role="form" action="controleur.php">
        <div class="form-group">
            <input type="text" class="form-control" id="NewMdp" name="NewMdp" placeholder="Nouveau mot de passe">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="ConfirmNewMdp" name="ConfirmNewMdp" placeholder="Confirmer nouveau mot de passe">
        </div>
        <p class="mmdp">Il est conseillé d'inventer une phrase unique et mémorable.</p>
        <div>
            <button type="submit" name="action" value="NouveauMdp" class="btn btn-default" id="valider">Valider</button>
        </div>
    </form>

</div>