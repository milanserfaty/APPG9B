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
    session_start();

    $reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reponse->execute(array(
        'mail' => $_SESSION['mailConnecte']));

    $donnees = $reponse->fetch();

?>

<!DOCTYPE html>
<html>
    <head>
          <title>Editer son profil</title>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../Vue/editer_profil.css">
    <head>
    <header>
        <?php include "header.php" ?>
    </header>
    <body>
        <h1>
            Editer son profil
        </h1>
        <div id = content>
            <form action="../Modele/profilEdite.php" method="post">
                <ol>
                    <li>
                        <p>Modifier le nom : <?php echo $donnees['Nom'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="surnameButton" value="<?php echo $donnees['Nom'] ?>">
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>Modifier le prénom : <?php echo $donnees['Prenom'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom" name="nameButton" value="<?php echo $donnees['Prenom'] ?>">
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>Modifier la date de naissance : <?php echo $donnees['Date_de_naissance'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance" name="birthDateButton" value="<?php echo $donnees['Date_de_naissance'] ?>">
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>Modifier le numéro de téléphone : <?php echo $donnees['N°_de_telephone'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone" name="phoneButton" value="<?php echo $donnees['N°_de_telephone'] ?>">
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>Modifier l'adresse : <?php echo $donnees['Adresse'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="addressButton" value="<?php echo $donnees['Adresse'] ?>">
                    </li>
                    <br />
                    <hr />
                    <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Sauvegarder le profil" class="saveButton">
                </ol>
            </form>
            <form action="modifierMotDePasse.php">
                <ol>
                    <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Modifier le mot de passe" class="saveButton">
                </ol>
            </form>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>
