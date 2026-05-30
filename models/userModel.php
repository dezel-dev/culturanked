<?php

// Les fonctions
function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id FROM users WHERE username='$login' AND password='$passe';";

	return SQLGetChamp($SQL);
}

function registerUser($pseudo,$email,$passe)
{
    // On insert dans users
    $SQL="INSERT INTO users(`username`, `email`, `password`) VALUES ('$pseudo','$email','$passe');";
    $id = SQLInsert($SQL);

    $SQL="INSERT INTO stats(`player_id`) VALUES('$id')";
    SQLInsert($SQL);
    return $id;
}

function ModifierMDP($id,$passe)
{
    $SQL="UPDATE users SET passeword = $passe WHERE id = $id;";
    return SQLUpdate($SQL);
}

function classement()
{
    $SQL="SELECT username, elo, SUM(ranked_wins + ranked_loose) AS total_parties FROM users JOIN stats ON id=player_id GROUP BY id, username, elo ORDER BY elo DESC LIMIT 20;";
    return parcoursRs(SQLSelect($SQL));
}

function rangParElo ($elo_min,$elo_max)
{
    $SQL="SELECT username, elo, SUM(s.ranked_wins + ranked_loose) AS total_parties 
FROM users  JOIN stats  ON id = player_id 
WHERE elo >= $elo_min AND elo <= $elo_max 
GROUP BY id, username, elo 
ORDER BY elo DESC LIMIT 100;";
    return SQLSelect($SQL);

}

function obtenirDemandeAmis ($id_actuel,$statut_attente)
{
    $SQL="SELECT id, username
FROM users
JOIN social ON id = sender_id
WHERE receiver_id = $id_actuel
  AND status = $statut_attente;";
    return SQLSelect($SQL);
}

function winTheme ($id_actuel,$theme_actuel)
{
    $SQL="SELECT theme, COUNT(id) AS nombre_victoires
FROM games
WHERE winner = $id_actuel AND theme = $theme_actuel
GROUP BY theme
ORDER BY nombre_victoires DESC;";
    return SQLSelect($SQL);
}

function questionPartie($id_partie)
{
$SQL="SELECT title, answer
FROM questions
JOIN game_questions ON questions.id = question_id
WHERE game_id = $id_partie
ORDER BY game_questions.order ASC;
";
return SQLSelect($SQL);
}

function isUsernameUnique($username)
{
    $SQL = "SELECT username FROM users WHERE users.username='$username'";
    $res = SQLGetChamp($SQL);

    if ($res == '') {
        // Aucun username qui correspond
        return 1;
    }

    return 0;
}

function getPassword($email)
{
    $SQL = "SELECT password FROM users WHERE users.email='$email'";
    $res = SQLGetChamp($SQL);

    if ($res == '') {
        return 0;
    }

    return $res;
}

function addPlayerToMatchmaking($playerId, $gamemode, $theme) {
    $SQL = "INSERT INTO matchmaking(`player_id`, `gamemode`, `theme`) VALUES('$playerId', '$gamemode', '$theme')";
    return SQLInsert($SQL);
}

function isPlayerInQueue($playerId) {
    $SQL = "SELECT player_id FROM matchmaking WHERE `player_id`='$playerId'";
    $res = SQLGetChamp($SQL);
    if ($res == "") {
        return 0;
    }
    return 1;
}

function removePlayerFromMatchmaking($playerId) {
    $SQL = "DELETE FROM matchmaking WHERE `player_id`='$playerId'";
    return SQLDelete($SQL);
}

function checkActiveMatch($playerId) {
    $SQL = "SELECT game_id FROM game_players 
            JOIN games ON games.id = game_players.game_id 
            WHERE user_id = '$playerId' AND status = 'waiting'";
    return SQLGetChamp($SQL); 
}

function getPlayerElo($playerId) {
    $SQL = "SELECT elo FROM users WHERE `id`='$playerId'";
    return SQLGetChamp($SQL);
}

function findOpponent($playerId, $gamemode, $theme) {
    $elo = getPlayerElo($playerId);
    
    $SQL = "SELECT m.player_id 
            FROM matchmaking m
            JOIN users u ON m.player_id = u.id
            WHERE m.player_id != '$playerId' 
            AND m.gamemode = '$gamemode' 
            AND m.theme = '$theme'
            ORDER BY ABS(u.elo - $elo) ASC
            LIMIT 1";
            
    return SQLGetChamp($SQL);
}

function createMatch($id1, $id2, $gamemode, $theme) {
    if ($theme === 'random') {
        $themesPossibles = ['culture', 'art', 'histoire', 'math'];
        $theme = $themesPossibles[array_rand($themesPossibles)];
    }

    $SQL_game = "INSERT INTO games (`gamemode`, `theme`) VALUES ('$gamemode', '$theme')";
    $game_id = SQLInsert($SQL_game);

    $SQL_p1 = "INSERT INTO game_players (`game_id`, `user_id`) VALUES ('$game_id', '$id1')";
    $SQL_p2 = "INSERT INTO game_players (`game_id`, `user_id`) VALUES ('$game_id', '$id2')";
    SQLInsert($SQL_p1);
    SQLInsert($SQL_p2);

    $SQL_questions = "SELECT id FROM questions WHERE theme = '$theme' ORDER BY RAND() LIMIT 10";
    $questions = parcoursRs(SQLSelect($SQL_questions));

    $ordre = 1;
    foreach ($questions as $q) {
        $question_id = $q['id'];
        $SQL_insert_q = "INSERT INTO game_questions (`game_id`, `question_id`, `order`) 
                         VALUES ('$game_id', '$question_id', '$ordre')";
        SQLInsert($SQL_insert_q);
        $ordre++;
    }

    $SQL_del = "DELETE FROM matchmaking WHERE player_id IN ('$id1', '$id2')";
    SQLDelete($SQL_del);

    return $game_id;
}

function getPlayerMatchmakingInfo($playerId) {
    $SQL = "SELECT gamemode, theme FROM matchmaking WHERE player_id = '$playerId'";
    $res = parcoursRs(SQLSelect($SQL));
    return (count($res) > 0) ? $res[0] : false;
}
?>
