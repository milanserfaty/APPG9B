<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
/*
echo __DIR__."<br>";
echo __FILE__."<br>";
echo $_SERVER['SCRIPT_FILENAME']."<br>";
echo $_SERVER['SCRIPT_NAME']."<br>";
echo $dir2.DIRECTORY_SEPARATOR."<br>";
echo getcwd()."<br>";
*/


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

session_start();


// récupération des infos de l'admin connecté

$reqProfil = $bdd->prepare('SELECT * FROM `administrateur` WHERE `mail_administrateur` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PageAdministrateur</title>
    <link rel="stylesheet" href='../Vue/pageAdministrateur.css'>
    <?php include 'header.php'?>
</head>

<body>

<div id="conteneur1">

    <div id="menu">
        <a>Menu</a>
        <a href="pageAdministrateur.php">Gérer les utilisateurs</a>
        <a href="">Gérer les capteurs</a>
        <a href="gererFAQ.php">Gérer la FAQ</a>
        <a href="forumAdministrateur.php">Gérer le forum</a>
    </div>

    <div id="main">

    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL ADMINISTRATEUR</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Admin n° <?php echo $donneesProfil['ID_Administrateur'] ?></p>
                <p>Mail :  <?php echo $donneesProfil['mail_administrateur'] ?></p>
            </div>
            <img class="profil-photo" src="../images/logo_admin.png" width="150" height="180" title="profil_admin"/>
        </div>
    </div>
</div>


<div class='tableaux'>
    <div id='tableau_utilisateurs'>
        <h3>Listes des utilisateurs :</h3>

        <?php
        // recupère tous les utilisateurs de la BDD

        $reqUtilisateurs = $bdd->query('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur`');

        ?>
        <table>
            <caption> </caption>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Email</th>
            </tr>

            <form action="admin_editer_profil_utilisateur.php" method="post">

                <?php
                while($donneesUtilisateurs = $reqUtilisateurs ->fetch()) {
                    ?>
                    <tr>

                        <td><?php echo $donneesUtilisateurs['IDUtilisateur'] ?></td>
                        <td><?php echo $donneesUtilisateurs['Nom'] ?></td>
                        <td><?php echo $donneesUtilisateurs['Prenom'] ?></td>
                        <td><?php echo $donneesUtilisateurs['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")'] ?></td>
                        <td><?php echo $donneesUtilisateurs['N°_de_telephone'] ?></td>
                        <td><?php echo $donneesUtilisateurs['Adresse'] ?></td>
                        <td><?php echo $donneesUtilisateurs['Adresse_email'] ?></td>
                        <td><input type="radio" name="edit" value="<?php echo $donneesUtilisateurs['Adresse_email'] ?>"/></td>
                    </tr>
                    <?php
                }
                ?>
        </table>
        <div class="editer">
            <input type="submit" value="Editer l'utilisateur sélectionné">
        </div>
        </form>
    </div>
</div>


<footer>
    <?php include "footer.php";?>
</footer>

</body>
</html>