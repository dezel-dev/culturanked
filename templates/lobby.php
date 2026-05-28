<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'classic';
$cat = isset($_GET['cat']) ? $_GET['cat'] : 'play';

include("navbar.php");
?>

<?php 
//Rang du joueur 

//Elo du joueur 

//

switch ($cat) {

    case 'play':
        include('play.php');
        break;

    case 'career':
        include('career.php');
        break;

    case 'ranking':
        include('ranking.php');
        break;

    case 'social':
        include('social.php');
        break;
}


?>