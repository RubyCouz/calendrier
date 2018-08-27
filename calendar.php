<?php
session_start();
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
// reprise de la session démarrée dans index.php et récupération des cookies month et year
if (!empty($_GET['month'])) {
    $month = $_GET['month'];
    setcookie('month', $month, time() + 365 * 24 * 3600, '/', 'partie9', false, false); //écriture cookie pseudo
}
if (!empty($_GET['year'])) {
    $year = $_GET['year'];
    setcookie('year', $year, time() + 365 * 24 * 3600, '/', 'partie9', false, false); //écriture cookie mot de passe
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>Calendrier</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body> 

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12-md12-lg-12">
                    <?php

                    function month() {
                        // conditions pour passer de décembre à janvier et vice-versa
                        if ($_GET['month'] < 1) {
                            $_GET['month'] = 12;
                            $_GET['year'] = $_GET['year'] - 1;
                        }
                        if ($_GET['month'] > 12) {
                            $_GET['month'] = 1;
                            $_GET['year'] = $_GET['year'] + 1;
                        }
                        $months = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
// création d'un tableau pour les jours de la semaine
                        $daysInTable = array(1 => 'Lundi', 2 => 'Mardi', 3 => 'Mercredi', 4 => 'Jeudi', 5 => 'Vendredi', 6 => 'Samedi', 7 => 'Dimanche');
//récupération du nombre de jour dans le mois 'month' de l'année 'year'
//array_search($_GET['month'], $month) => récupère l'index de l'array month = numéro du mois
                        $year = $_GET['year'];
                        $month = $_GET['month'];
                        $dayNumberInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// définition du timestamp du premier jour du mois month de l'année year
                        $firstDayTimestamp = mktime(0, 0, 0, $month, 1, $year);
// définition du nom du jour en numérique
//création d'un tableau contenant les jours du mois month de l'année year
                        $dayWeekName = strftime('%u', $firstDayTimestamp);
                        $day = 1;
                        $multiple = 7;
                        ?>
                        <h1>
                            <?php
                            if (isset($_GET['month']) && isset($_GET['year'])) {

                                echo strftime('%B', $firstDayTimestamp) . ' ' . $year;
                            } else {
                                var_dump($year);
                                var_dump(strftime('%B', $firstDayTimestamp));
                            }
                            ?>
                        </h1>
                    </div>
                </div>
                <form action="calendar.php" method="GET">
                    <div class="row justify-content-around">
                        <div class="col-sm-6-md-6-lg-6">                               
                            <input type="hidden" name="month" value="<?= $_GET['month'] - 1; ?>" />
                            <input type="hidden" name="year" value="<?= $_GET['year']; ?>" />
                            <button type="submit" class="btn btn-dark">
                                <a href ="calendar.php">Précédent</a>
                            </button>
                        </div>
                </form>
                <form action="calendar.php" method="GET">
                    <div class="col-sm-6-md-6-lg-6">
                        <input type="hidden" name="month" value="<?= $_GET['month'] + 1; ?>" />
                        <input type="hidden" name="year" value="<?= $_GET['year']; ?>" />
                        <button type="submit" class="btn btn-dark"><a href ="calendar.php">Suivant</a>
                        </button>                      
                    </div>
                </form>
            </div>
            <table class="monthTable">
                <tr>
                    <?php
                    foreach ($daysInTable as $key => $dayName) { // parcour du tableau pour l'affichage du jour sur le calendrier
                        ?>
                        <td class="table"><?= $dayName ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    for ($caseNumber = 1; $caseNumber <= ($dayNumberInMonth + $dayWeekName - 1); $caseNumber++) {
                        if ($caseNumber < $dayWeekName) { // case grise avant le premier jour du mois
                            ?>
                            <td class='dayOff'></td>
                            <?php
                        } else { //affichage des jours du mois (chiffre)
                            ?>
                            <td class='day'><?= $day++ ?></td> 
                            <?php
                            if ($caseNumber % $multiple == 0) { //retour à la ligne
                                ?>
                            </tr>
                            <tr>
                                <?php
                            }
                            if (($day > $dayNumberInMonth) && ($day <= $caseNumber)) { //case grise apres le dernier jour du mois
                                ?>
                                <td class="dayOff"></td>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </tr>
        </table>
        <?php
        if (isset($_GET['month']) && isset($_GET['year'])) {
            echo month(); // execution de la fonction month si 'month' et 'year sont présent
        }
        ?>
    </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" charset="utf-8"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
