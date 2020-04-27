<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";

if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/header.css">
</head>


<body>
<header>
    <p class="cgu_header">
        <a class="linkHeader" href="">Langue : FR  </a>
        - 
        <a class="linkHeader" href="/php/cgu.php">Conditions générales d'utilisations</a>
        -
        <a class="linkHeader" href="/php/mentionslegales.php">Mentions légales</a>
        -
        <a class="linkHeader" href="/php/contact.php">Nous contacter</a>

    </p>

    <div class="deuxieme_partie">
        <div id="logo">
            <a href="/php/pageAccueil.php">
                <img src="/images/Infinite_measures_logo.png"
                     width="150" height="151"
                     alt="logo"/>
            </a>
        </div>
        <div class="title">
            <img src="/images/Infinite_measures.png" alt="logoTexte"/>
        </div>

        <div class="menu">
            <a class="linkmenu" href="/php/faq.php">FAQ</a>
            <?php
            if (isset($_SESSION['mailUtilisateur']))
            { ?>
                <a class="linkmenu" href="../php/deconnexion.php">SE DECONNECTER</a>

                <?php
            } else { ?>
                <a class="linkmenu" href="se_connecter.php">SE CONNECTER</a>

            <?php }
            ?>

        </div>
    </div>
</header>
</body>
</html>
