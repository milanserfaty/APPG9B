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
    $forum = $bdd->prepare('SELECT * FROM forum WHERE `Theme` = 0');
    $forum->execute(array(
        ':Theme' => 0));
?>
<!DOCTYPE html>
<html>
    <header>
        <?php include "header1.php" ?>
    </header>
    <head>
        <title>Forum</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <body>
        <h1>
            论坛
        </h1>
        <div id="content">
            <div id="titleTop">
                <?php
                     if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur" || $_SESSION['profilConnecte'] == "utilisateur"))
                { ?>
                <form action="creerPostGeneral1.php" method="post">
                    <p>常规讨论<button type="submit" name="saveButton">发布一条消息</button></p>
                </form>
                <?php
                }
                else{
                ?>
                    <p>常规讨论</p>
                <?php
                    }
                ?>
            </div>
            <div id="contentGeneral">
                <ol>
                    <?php
                        while ($forumDonnees = $forum -> fetch())
                    {
                    ?>
                    <li>
                        <p><a href="post.php?id=<?php echo $forumDonnees['N°_Question'] ?>"><?php echo $forumDonnees['Titre'];?></a> par <?php echo $forumDonnees['Nom_Utilisateur'] ?> le <?php echo $forumDonnees['Date'] ?></p>
                        <form action="postSupprime1.php?id=<?php echo $forumDonnees['N°_Question'] ?>" method="post">
                            <br />
                            <?php
                                if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
                            { ?>
                            <button type="submit" name="deleteButton">删除</button>
                            <?php
                                }
                            ?>
                        </form>
                    </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>