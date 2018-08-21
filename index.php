<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>TP calendrier</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choix de la date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- fenetre modal demandant le mois et l'année -->
                    <div class="modal-body">
                        <div class="form-group">
                            <form class="form" action="calendar.php" method="POST">
                                <label>Mois</label>
                                <select class="form-control" name="month"> <!-- definition de la variable $mo,th pour l'affichage du mois dans la liste déroulante -->
                                    <?php
                                    $month = array(1 =>'Janvier', 2 =>'Février', 3 =>'Mars', 4 =>'Avril', 5 => 'Mai', 6 => 'Juin', 7 =>'Juillet', 8 =>'Août', 9 =>'Septembre', 10 =>'Octobre', 11 =>'Novembre', 12 =>'Décembre');
                                    foreach ($month as $index => $monthName) {
                                        ?>
                                    <option value="<?= $monthName ?>"><?= $monthName ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <label>Année</label> <!-- définition de la variable $year pour afficher l'année dans la liste déroulante -->
                                <select class="form-control" name="year">
                                    <?php
                                    for ($year = 1970; $year <= 2030; $year++) { //utilisation de l'annéee 1970 comme point de départ car point de départ timestamp
                                        ?>
                                        <option value="<?= $year ?>"><?= $year ?></option>
                                        <?php
                                    }
                                    ?>
                                        
                                </select>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" charset="utf-8"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" charset="utf-8"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
