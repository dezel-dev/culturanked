<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
	header("Location:../index.php?view=home");
	die("");
}
?>

