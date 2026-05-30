<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
  header("Location:../index.php");
  die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Culturanked</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="css/social.css">
  <link rel="stylesheet" type="text/css" href="css/lobby.css">

    <script src="js/register.js"></script>
    <script src="js/script.js"></script>
    <script src="js/play.js"></script>

  <style>

  </style>

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body onload="globalLoad()">

  <!-- Begin page content -->
  <div class="container">