<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'classique';

include("navbar.php");
?>

<?php 
//Rang du joueur 

//Elo du joueur 

//


?>
<div class="body">
<div class="gamemode">
            <a class="button third" href="?view=lobby&mode=classic">Classique</a>
            <a class="button third" href="?view=lobby&mode=ranked" >Classée</a>
            
</div>

<?php 

switch($mode) {
    case 'ranked' :
        echo "<div class=\"frame\">
                <div class=\"content\">
                 <h2>Configuration du salon - Classé</h2>
                 <button type=\"submit\" value=\"launchRanked\" class=\"button primary\">Lancer un partie</button>
                </div>
                 </div>";
                
    break;
    case 'classic' : 
        echo"<div class=\"frame\">
        <div class=\"content\">
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
                        <button type=\"submit\" value=\"launchClassic\" class=\"button primary\">Lancer un partie</button>
                        </div>
                    </div>
        
        
        
        </div>";    
        break;

        default : 
        echo"<div class=\"frame\">
        <div class=\"content\">
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
                        <button type=\"submit\" value=\"launchClassic\" class=\"button primary\">Lancer un partie</button>
                        </div>
                    </div>
        
        
        
        </div>"; 
}
?>
</div>