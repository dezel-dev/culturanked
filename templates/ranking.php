<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}
include_once("./models/userModel.php");
$classement = classement();

?>
<div class="ranking">
    <div class="ranking-header">
        <select class="filter-select">
            <option value="global">Global</option>
        </select>
        <span class="players-count"><?php echo count($classement); ?> joueurs affichés (1/20)</span>
    </div>

    <div class="ranking-list">
        <?php 
        $position = 1; 

        foreach ($classement as $joueur) {
            
            // Gestion des couleurs du podium (Top 3)
            $podiumClass = '';
            if ($position === 1) $podiumClass = 'first';
            elseif ($position === 2) $podiumClass = 'second';
            elseif ($position === 3) $podiumClass = 'third';
            ?>
            
            <div class="ranking-row <?php echo $podiumClass; ?>">
                
                <div class="player-info">
                    <span class="position"><?php echo $position; ?>.</span>
                    <span class="pseudo"><?php echo htmlspecialchars($joueur['username']); ?></span>
                </div>

                <div class="player-rank">
                    <span class="elo"><?php echo $joueur['elo']; ?> Elo</span>
                </div>

                <div class="player-stats">
                    <span class="games"><?php echo $joueur['total_parties']; ?> parties jouées</span>
                </div>

            </div>

            <?php
            $position++; // On passe au joueur suivant
        } 
        ?>
    </div>
</div>



</div>