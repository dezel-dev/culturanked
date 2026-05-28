<?php

include_once("../libs/maLibSQL.pdo.php");

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
    return SQLSelect($SQL);
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
?>
