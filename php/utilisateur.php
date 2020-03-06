<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href = "/css/utilisateur.css" />
    <title>Utilisateur</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700">


</head>

<body>
<div id="content">

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL UTILISATEUR</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom Prénom</p>
                <p>Age</p>
                <p>Date de naissance</p>
                <p>Adresse</p>
                <p>Score moyen</p>
                <p>Nombre de tests effectués</p>
            </div>
            <img class="profil-photo" src="/images/PHOTOPROFIL.png" title="Photo de profil"></img>
        </div>

    </div>

</div>
<div class="container">

    <div class="calendar">

        <header>

            <h2>September</h2>

            <a class="btn-prev fontawesome-angle-left" href="#"></a>
            <a class="btn-next fontawesome-angle-right" href="#"></a>

        </header>

        <table>

            <thead>

            <tr>

                <td>Mo</td>
                <td>Tu</td>
                <td>We</td>
                <td>Th</td>
                <td>Fr</td>
                <td>Sa</td>
                <td>Su</td>

            </tr>

            </thead>

            <tbody>

            <tr>
                <td class="prev-month">26</td>
                <td class="prev-month">27</td>
                <td class="prev-month">28</td>
                <td class="prev-month">29</td>
                <td class="prev-month">30</td>
                <td class="prev-month">31</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
            </tr>
            <tr>
                <td>9</td>
                <td class="event">10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
            </tr>
            <tr>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td class="event">21</td>
                <td>22</td>
            </tr>

            <tr>
                <td class="current-day event">23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
                <td>29</td>
            </tr>
            <tr>
                <td>30</td>
                <td class="next-month">1</td>
                <td class="next-month">2</td>
                <td class="next-month">3</td>
                <td class="next-month">4</td>
                <td class="next-month">5</td>
                <td class="next-month">6</td>
            </tr>

            </tbody>

        </table>

    </div> <!-- end calendar -->

</div> <!-- end container -->
</body>
</html>
