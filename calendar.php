<?php
$month = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');

$daysInTable = array(1 => 'Lundi', 2 => 'Mardi', 3 => 'Mercredi', 4 => 'Jeudi', 5 => 'Vendredi', 6 => 'Samedi', 7 => 'Dimanche'); // création d'un tableau pour les jours de la semaine

$dayNumberInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($_POST['month'], $month), $_POST['year']); //récupération du nombre de jour dans le mois 'month' de l'année 'year'
//array_search($_POST['month'], $month) => récupère l'index de l'array month = numéro du mois

$firstDayTimestamp = mktime(0, 0, 0, array_search($_POST['month'], $month), 1, $_POST['year']); // définition du timestamp du premier jour du mois month de l'année year

$dayWeekName = strftime('%u', $firstDayTimestamp); // définition du nom du jour en numérique

//création d'un tableau contenant les jours du mois month de l'année year
$day = 1;
$multiple = 7;
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
        <h1>
            <?php
            if (isset($_POST['month']) && isset($_POST['year'])) {

                echo $_POST['month'] . ' ' . $_POST['year'];
            } else {
                var_dump($_POST['year']);
                var_dump($_POST['month']);
            }
            ?>
        </h1>
    <center>
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
                    if ($dayWeekName > $caseNumber) {
                        ?>
                        <td class='dayOff'></td>
                        <?php
                    } else {
                        ?>
                        <td class='day'><?= $day++ ?></td>
                        <?php
                        if ($caseNumber % $multiple == 0) {
                            ?>
                        </tr>
                        <tr>
                            <?php
                        }
                    }
                    if ($day > $dayNumberInMonth) {
                        ?>
                        <td class="dayOff"></td>
                        <?php
                    }
                }
                ?>
            </tr>
        </table>
    </center>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" charset="utf-8"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
