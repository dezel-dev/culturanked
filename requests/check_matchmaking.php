<?php
session_start();
include_once "../libs/maLibUtils.php";
include_once "../libs/maLibSQL.pdo.php";
include_once "../models/userModel.php";

if (!valider("connecte", "SESSION")) {
    echo json_encode(["status" => "error", "message" => "Non connecté"]);
    die();
}

$id = $_SESSION['idUser'];

$active_game_id = checkActiveMatch($id);
if ($active_game_id) {
    $_SESSION['inQueue'] = 0;
    echo json_encode(["status" => "found", "game_id" => $active_game_id]);
    die("");
}

$info = getPlayerMatchmakingInfo($id);
if (!$info) {
    echo json_encode(["status" => "waiting"]);
    die("");
}

$opponent_id = findOpponent($id, $info['gamemode'], $info['theme']);

if ($opponent_id) {
    $new_game_id = createMatch($id, $opponent_id, $info['gamemode'], $info['theme']);
    $_SESSION['inQueue'] = 0;
    
    echo json_encode(["status" => "found", "game_id" => $new_game_id]);
    die("");
} else {
    echo json_encode(["status" => "waiting"]);
    die("");
}
?>