<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";
try {
    $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');

}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



$req = $bdd->prepare('DELETE FROM `utilisateur` WHERE Adresse_email = :mail');
$req->execute(array(
    ':mail' => $_POST['suppr'],

));

header('location: ../Controleur/pageAdministrateur2.php');
