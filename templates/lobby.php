<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'classique';
?>

<?php 
//Rang du joueur 

//Elo du joueur 

//


?>

<div class="gamemode">
            <a class="link_mode" href="?view=lobby&mode=classic" class="tab <?php echo ($mode === 'classic') ? 'active' : ''; ?>">Classique</a>
            <a class="link_mode" href="?view=lobby&mode=ranked" class="tab <?php echo ($mode === 'ranked') ? 'active' : ''; ?>">Classée</a>
            
</div>

<?php 

switch($mode) {
    case 'ranked' :
        echo "<div class=\"frame\">
                 <h2>Configuration du salon - Classé</h2>
                 <button class=\"btn-launch\" ;>Trouver un match</button>
                 </div";
    break;
    case 'classic' : 
        echo"<div class=\"frame\">
        <h2>Configuration du salon - Classique</h2>
        <label for=\"theme-select\">Thème :</label>
                        <div class=\"theme-select\">
                            <select id=\"theme-select\">
                                <option value=\"culture\">Culture générale</option>
                                <option value=\"art\">Art</option>
                                <option value=\"histoire\">Histoire</option>
                                <option value=\"math\">Mathématiques</option>
                                <option value=\"aleatoire\">Aléatoire</option>
                            </select>
                        </div>
                        <button class=\"btn-launch\" ;>Trouver un match</button>
                    </div>
        
        
        
        </div>";    
        break;
}
?>