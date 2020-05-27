<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
$_COOKIE['page'] = 'Taak Overview';

if (empty($_GET['id']) == true) {
    header('location:projecten.php');
} else {
    if (is_numeric($_GET['id']) == false) {
        header('location:projecten.php?');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overzicht Beheerder</title>

    <!-- local resources -->
    <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../lib/css/main.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
</head>

<body class="" data-id="<?php echo $_GET['id'] ?>"">
    <ul id=" dropdown1" class="dropdown-content">
    <li>
        <a href="../scripts/logout.php">Log Out</a>
    </li>
    </ul>
    <?php
    include 'components/navigation.php';
    ?>
    <!-- taken -->
    <div id="main">
        <div class="row">
            <div class="col m5 offset-m1 s12 dark-2 z-depth-3 flip-in-ver-right">
                <h5 class=" white-text center">Taak Informatie</h5>
                <i class="right primary-text material-icons tooltipped" data-position="right" data-tooltip="Edit Deelnemer" id="edit">edit</i>
                <form action="../requests/update_taak.php?id=<?php echo $_GET['id'] ?>" method="post" name="taken_form" id="taken_form">
                    <div class="row">
                        <div class="input-field col s10 offset-s1">
                            <input id="taak_naam" name="taak_naam" type="text" class="validate" required disabled>
                            <label class="white-text active" for="taak_naam">Naam</label>
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <textarea id="taak_omschrijving" name="taak_omschrijving" type="text" class="materialize-textarea validate" disabled required></textarea>
                            <label class="white-text active" for="taak_omschrijving">Omschrijving</label>
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <select id="type_taak" name="type_taak" disabled>
                                <option value="" disabled selected>Selecteer Type Taak</option>
                                <option class="" value="3">Dienst</option>
                                <option class="" value="4">Materiaal</option>
                            </select>
                        </div>
                        <!-- <div class="input-field col s10 offset-s1">
                            <textarea id="taak_aantal" name="taak_aantal" type="text" class="materialize-textarea validate" disabled></textarea>
                            <label class="white-text active" for="taak_aantal">Aantal</label>
                        </div> -->
                        <div class="input-field col s10 offset-s1">
                            <textarea id="taak_prijs" name="taak_prijs" type="text" class="materialize-textarea validate" disabled></textarea>
                            <label class="white-text active" for="taak_prijs">Geschatte prijs</label>
                        </div>
                    </div>

                    <div class="modal-footer dark-2">
                        <div class="row">
                            <button class="btn waves-effect waves-light col s10 offset-s1 primary" type="submit" id="submit_taak" value='test' name="opslaan" enabled>Verzenden
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                </form>


            </div>

        </div>

        <!-- deelnemers -->
        <div class="col m4 offset-m1 s12 dark-2 z-depth-3 flip-in-ver-right">
            <h5 class=" white-text center">Deelnemers</h5>
            <ul id="deelnemers_collection" class="collection with-header white-text">
                <li class="collection-header dark-2">
                    <h6>Verantwoordelijken</h6>
                </li>

            </ul>
        </div>
    </div>

    <!-- besteding -->
    <div class="row">
        <div class="col s12 table_container">
            <?php
            include 'components/besteding_table.php';
            include 'components/besteding_modal.php';
            ?>

        </div>
    </div>

    <div class="fixed-action-btn">
        <a class=" green lighten-1 btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
    </div>


    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/beheerder/app.js"></script>
    <script type="text/javascript" src="../../lib/js/beheerder/view_taak.js"></script>
</body>

</html>