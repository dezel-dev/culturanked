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
            <input type="text" class="input" id="NewMdp" name="NewMdp" placeholder="Nouveau mot de passe">
        </div>
        <div class="form-group">
            <input type="text" class="input" id="ConfirmNewMdp" name="ConfirmNewMdp" placeholder="Confirmer nouveau mot de passe">
        </div>
        <div id="notifications">
			<div class="different">
				<img src="./ressources/culturanked/invalid.png" alt="Invalide">
				<p class="invalid">Les mots de passes sont différents</p>
			</div>
			<div class="advice">
				<img src="./ressources/culturanked/information.png" alt="Info">
				<p>Il est conseillé d'inventer une phrase unique et mémorable</p>
			</div>
		</div>
        <div>
            <button type="submit" name="action" value="NouveauMdp" class="button secondary" id="valider">Valider</button>
        </div>
    </form>

</div>