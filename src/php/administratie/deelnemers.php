<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/checkSession.php';
$_COOKIE['page'] = 'Deelnemers';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deelnemers</title>

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
    <div class="row">
        <div class="col m9 offset-m3">
            <?php
            include 'components/deelnemers_table.php';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col m7 offset-m4 z-depth-3" id="deelnemers">
            <form id="" action="../requests/create_deelnemer.php" method="POST">
                <h5 class="center">Deelnemer gegevens</h5>
                <div class="input-field col m12">
                    <input type="text" name="deelnemers_naam" tabindex="1" size="10" placeholder="Naam" required autofocus>
                </div>

                <div class="input-field col m12">
                    <select name="deelnemers_type" id="" class="materialize-select">
                        <option value="" disabled selected>Select de type deelnemer</option>
                        <option value="4">Student</option>
                        <option value="5 ">Docent</option>
                        <option value="6">Overige</option>
                    </select>
                </div>

                <div class="input-field col m12">
                    <input type="email" name="deelnemers_email" tabindex="1" size="10" placeholder="email" required>
                    <label for="deelnemers_email">Email</label>
                </div>


                <div class="input-field col m12">
                    <input type="text" name="deelnemers_adres" tabindex="1" size="10" placeholder="Adres" required>
                    <label for="deelnemers_adres">Adres</label>
                </div>


                <div class="input-field col m12">
                    <input type="number" name="deelnemers_telefoonnummer" tabindex="1" size="10" placeholder="telefoonnummer" required>
                    <label for="deelnemers_telefoonnummer">Telefoon Nr.</label>

                </div>

                <button class="btn waves-effect waves-light col m12" type="submit" name="opslaan">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a onclick='showForm()' class="btn-floating btn-large waves-effect waves-light "><i class="material-icons">add</i></a>
    </div>

    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/app.js"></script>
    <script type="text/javascript" src="../../lib/js/deelnemers.js"></script>
</body>

</html>