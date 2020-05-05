<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
    $forum = $bdd->query('SELECT * FROM forum');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/forum.css">
    </head>
    <body>
        <h1>
            Forum
        </h1>
        <div id="content">
            <div id="titleTop">
                <p>Officiel</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        Annonces importantes
                    </li>
                    <li>
                        Règles du forum
                    </li>
                </ol>
            </div>
            <div id="titleMiddle">
                <p>Discussion générale</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        <a href="forumGeneral.php">Général</a>
                    </li>
                    <li>
                        Poser une question
                    </li>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
