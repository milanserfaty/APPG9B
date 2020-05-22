<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";

//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

session_start();


// récupération des infos du gestionnaire connecté

$reqProfil = $bdd->prepare('SELECT * FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire_rechercheUtilisateur.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Recherche des administrateurs</title>
</head>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Lancer un test</a>
        <a href="ajout_resultats_tests.php">Nouveau résultat</a>
        <a href="gestionnaire_rechercheUtilisateur.php">Utilisateurs</a>
        <a href="">Forum</a>
    </div>

    <div id="main">
        <h1> Rechercher un utilisateur</h1>
        <h2> Quel type de recherche voulez-vous effectuer ?</h2>
        <div id="boutons">
            <button class="button_bar"> Effectuer une recherche par mail utilisateur </button>
            <button class="button_critere"> Effectuer une recherche par critères </button>
        </div>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL AUTO-ECOLE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom de l'auto-école : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>Adresse du centre : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>Adresse mail : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>

<div id="recherche">
    <div class="searchbar">
        <h1>Rechercher un utilisateur par mail</h1>
        <form action="../php/gestionnaire_rechercheUtilisateur.php"  method="post">
            <label for="nom">Adresse mail : <input type="search" name="mail_recherche" size="50" required/></label>
            <input type="submit" value="Rechercher" class="fas fa-search">
        </form>
    </div>

    <div id="recherche_criteres">
        <h1>Rechercher un utilisateur par critères</h1>
        <label for="dateNaissance">Date de naissance : </label> <input type="search" name="dateNaissance" id="dateNaissance" />
        <label for="ville">Ville : </label> <input type="search" name="ville" id="ville" />
        <label for="autoEcole">Auto-école : </label> <input type="search" name="autoEcole" id="autoEcole" />
        <label for="scoreTotal">Score Total : </label> <input type="search" name="scoreTotal" id="scoreTotal" />
        <buttton class="button_affiche" type="button"> <i class="fas fa-search"></i></buttton>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script>
    $('.button_bar').click(function(e) {
        e.preventDefault();
        $('.searchbar').toggleClass('active');
    })

    $('.button_critere').click(function(e) {
        e.preventDefault();
        $('#recherche_criteres').toggleClass('active');
    })

    $('.button_affiche').click(function(e) {
        e.preventDefault();
        $('#tableau').toggleClass('active');
    })
</script>

<?php

// affichage du tableau de tous les tests
// récuperation des tests de l'utilisateur connecté dans la bdd
if(isset($_POST['mail_recherche'])) {
    $reqTests = $bdd->prepare('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test`  WHERE `mail_utilisateur`= :mail ORDER BY `Date` DESC ');
    $reqTests->execute(array(
        'mail' => $_POST['mail_recherche']));
}

else if(isset($_POST['nom']) && isset($_POST['prenom'])) {

}
else {
    $reqTests = $bdd->query('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test`  ORDER BY `Date` DESC ');
}
?>

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th>Utilisateur</th>
            <th>Mail Utilisateur</th>
            <th>Auto-école</th>
            <th>Mail de l'auto-école</th>
            <th>Score total</th>
            <th>Date</th>
        </tr>

        <?php

        while($donneesTests = $reqTests ->fetch()) {

            $reqProfil = $bdd->prepare('SELECT  `Nom`, `Prenom` FROM `utilisateur` WHERE `Adresse_email` = :mail');
            $reqProfil->execute(array(
                'mail' => $donneesTests['mail_utilisateur']));

            $donneesProfil = $reqProfil->fetch();

            $reqProfilGestionnaire = $bdd->prepare('SELECT  `Nom_auto_ecole` FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
            $reqProfilGestionnaire->execute(array(
                'mail' => $donneesTests['mail_gestionnaire']));

            $donneesProfilGestionnaire = $reqProfilGestionnaire->fetch();
            ?>
            <tr>
                <td><?php echo $donneesProfil['Nom'],' ', $donneesProfil['Prenom'] ?></td>
                <td><?php echo $donneesTests['mail_utilisateur'] ?></td>
                <td><?php echo $donneesProfilGestionnaire['Nom_auto_ecole'] ?></td>
                <td><?php echo $donneesTests['mail_gestionnaire'] ?></td>
                <td><?php echo $donneesTests['Score_total'] ?></td>
                <td><?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?></td>
            </tr>

        <?php
        $reqProfil->closeCursor();
        $reqProfilGestionnaire->closeCursor();
        }

        $reqTests->closeCursor();
        ?>

    </table>
</div>

</body>

<footer>
    <?php include "footer.php" ?>
</footer>

</html>
