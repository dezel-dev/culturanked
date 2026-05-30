<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'classic';

?>
<div class="body">
    <div class="gamemode">
        <a class="button third <?php echo ($mode == 'classic') ? 'active' : ''; ?>" href="?view=lobby&cat=<?php echo htmlspecialchars($cat); ?>&mode=classic">Classique</a>
        <a class="button third <?php echo ($mode == 'ranked') ? 'active' : '';?>" href="?view=lobby&cat=<?php echo htmlspecialchars($cat); ?>&mode=ranked">Classée</a>
    </div>

    <?php 
    switch($mode) {
        case 'ranked' :
            ?>
            <div class="frame">
                <div class="content">
                    <h2>Configuration du salon - Classé</h2>
                    <form action="./controllers/userController.php">
                        <?php
                            if (!$_SESSION["inQueue"]) {
                                ?>
                                <button type="submit" name="action" value="launchRanked" class="button primary">Lancer une partie</button>
                                <?php
                            }
                            else {
                                ?>
                                <button type="submit" name="action" value="stopRanked" class="button secondary">Annuler la recherche</button>
                                <?php 
                            }
                        ?>
                    </form>

                    <?php
                    if ($_SESSION["inQueue"]) {
                        echo "<div id=\"time\">Temps dans la file d'attente : 0m 0s</div>";
                    }
                    ?>
                </div>
            </div>
            <?php
        break;
        
        case 'classic' : 
            ?>
            <div class="frame">
                <div class="content">
                    <h2>Configuration du salon - Classique</h2>
                    <form action="./controllers/userController.php">
                        <label for="theme-select">Thème :</label>
                        <div class="theme-select">
                            <select id="theme-select" name="theme">
                                <option value="culture">Culture générale</option>
                                <option value="art">Art</option>
                                <option value="histoire">Histoire</option>
                                <option value="math">Mathématiques</option>
                                <option value="random">Aléatoire</option>
                            </select>
                        </div>
                        <?php
                            if (!$_SESSION["inQueue"]) {
                                ?>
                                <button type="submit" name="action" value="launchClassic" class="button primary">Lancer une partie</button>
                                <?php
                            }
                            else {
                                ?>
                                <button type="submit" name="action" value="stopClassic" class="button secondary">Annuler la recherche</button>
                                <?php 
                            }
                        ?>
                    </form>

                    <?php
                    if ($_SESSION["inQueue"]) {
                        echo "<div id=\"time\">Temps dans la file d'attente : 0m 0s</div>";
                    }
                    ?>
                </div>
            </div>
            <?php
        break;
    }
    ?>
</div>