<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

session_start();



// Insertion du rdv dans la bdd pour l'utilisateur connecté
$reqRdv = $bdd->prepare('UPDATE `utilisateur` SET `date_rdv`=:date_rdv, `lieu_rdv`=:lieu_rdv
WHERE `Adresse_email` = :adresse_email');
$reqRdv->execute(array(
    'date_rdv' => $_POST['date_rdv'],
    'lieu_rdv' => $_POST['lieu_rdv'],
    'adresse_email' => $_SESSION['mailConnecte'],
));

header('location: utilisateur_rdv1.php');


