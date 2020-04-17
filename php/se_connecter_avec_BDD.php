<?php


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body{
            display: flex;
            justify-content: center;


            height: 100vh;
            background-color:rgb(232,232,232);
        }
        .box1{
            position:fixed;
            top:300px;
            left:300px;
            max-width: 1000px;
            height: 200px;
            line-height: 10px;
            border: 1px solid black;
            text-align: left;
            box-sizing: border-box;
            padding: 10px;
            background-color:rgb(161,215,171);
            box-shadow: 10px 10px 10px gray;
            flex: 0 1 auto;
        }


        .box2{
            position:fixed;
            top:300px;
            right:300px;
            max-width: 1000px;
            height: 200px;
            line-height: 10px;
            border: 1px solid black;
            text-align: left;
            box-sizing: border-box;
            padding: 10px;
            background-color:rgb(79,116,135);
            box-shadow: 10px 10px 10px gray;
            flex: 0 1 auto;
        }
        .input{
            border-color:#FF0000;
            border-style:solid;
        }
    </style>
    <script type="text/javascript" language="javascript" >
        function fun(test){
            var value= document.getElementById(test).value;
            var object= document.getElementById(test);
            if(value==null||value==''){
                object.setAttribute("box2","input");
            }else{
                object.setAttribute("box2","");
            }
    </script>
</head>
<body>

            <div class="box2">
                <form action="se_connecter_avec_BDD.php" method="post">
                    <br>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="email" placeholder="mail">
                    <br>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="mot de passe">
                    <br>
                    <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="S’authentifier">
                    </br>
                </form>
            </div>
        </div>

    <?php
                    // Pour se connecter

    //  Récupération de l'utilisateur et de son pass hashé
    $donneeConnexion = $bdd->prepare('SELECT `Mot_de_passe`,  `Adresse_email` FROM `utilisateur`
 WHERE `Adresse_email` = :mailC');
    $donneeConnexion->execute(array(
        'mailC' => $_POST['mailConnexion']));
    $resultat = $donneeConnexion->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['mdpConnexion'], $resultat['Mot_de_passe']);



    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }





    ?>
</body>
</html>
