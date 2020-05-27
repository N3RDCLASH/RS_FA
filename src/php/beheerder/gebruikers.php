<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
$_COOKIE['page'] = 'Gebruikers';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gebruiker</title>

    <!-- local resources -->
    <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../lib/css/main.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
</head>

<body class="">
    <?php
    include 'components/navigation.php';
    ?>
    <div id="main">
        <div class="row">
            <div class="col s12 table_container">
                <?php
                include 'components/gebruikers_table.php';
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col m7 offset-m3 z-depth-3" id="gebruikers">
                <form id="" action="../requests/create_gebruiker.php" class="white-text" method="POST">
                    <h5 class="center">Deelnemer gegevens</h5>
                    <div class="input-field col m12 s12">
                        <input type="text" name="gebruiker_naam" tabindex="1" size="10" placeholder="Naam" required autofocus>
                        <label for="gebruiker_naam">gebruikers naam</label>
                    </div>

                    <div class="input-field col m12 s12">
                        <select name="gebruiker_type" id="gebruiker_type" class="materialize-select">
                            <option value="x" disabled selected>Selecteer de type deelnemer</option>
                            <option value="0">Beheerder</option>
                            <option value="1">Adminstratie medewerker</option>
                            <option value="2">Financiële medewerker</option>
                        </select>
                    </div>

                    <div class="input-field col m12 s12">
                        <input type="password" name="gebruikers_password1" tabindex="1" size="10" placeholder="Vul uw wachtwoord in" required>
                        <label for="gebruiker_password1">Wachtwoord</label>
                    </div>
                    <div class="input-field col m12 s12">
                        <input type="password" name="gebruikers_password2" tabindex="1" size="10" placeholder="Vul uw wachtwoord nogeens in" required>
                        <label for="gebruiker_password2">Wachtwoord</label>
                    </div>



                    <button id="create_gebruikers" class="green lighten-1 btn waves-effect waves-light col m12 s12" type="submit" name="opslaan">Verzenden
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a onclick='showForm()' class=" green lighten-1 btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
        </div>
    </div>

    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../lib/js/administratie/app.js"></script>
    <script type="text/javascript" src="../../lib/js/beheerder/gebruikers.js"></script>
</body>

</html>v