<?php
// Redirection vers la page d'accueil
header("Location: pageAccueil.php");

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
