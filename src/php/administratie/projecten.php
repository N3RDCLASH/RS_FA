<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/checkSession.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overzicht Administratie</title>

    <!-- local resources -->
    <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../lib/css/main.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
</head>

<body class="-2">
    <ul id="dropdown1" class="dropdown-content">
        <li>
            <a href="../scripts/logout.php">Log Out</a>
        </li>
    </ul>
    <?php
    include 'components/navigation.php';
    ?>

    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
    <div class="row">
        <div class="col m9 offset-m3">
            <div class="nav-wrapper" id="search_bar">
                <form>
                    <div class="input-field">
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </div>
        <div class="col  s12 m9 offset-m3">
            <?php
            include 'components/projecten_table.php';

            ?>
        </div>

        <div class="row">
            <div class="col m4 s12 offset-m3 z-depth-3 flip-in-ver-right" id="project_informatie">
                <h5 class="center">Project Informatie</h5>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <input placeholder="naam" id="naam" name="naam" type="text" class="validate" disabled>
                        <label for="naam" class="active">Naam</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <textarea id="omschrijving" name="omschrijving" id="textarea1" cols="30" rows="10" class="materialize-textarea" disabled></textarea>
                        <label for="omschrijving" class="active">Omschrijving</label>
                    </div>
                </div>
                <div class="input-field col s8 offset-s2">
                    <select id="type" disabled>
                        <option value="" disabled selected>Kies het type project.</option>
                        <option class="" value="0">Evenement</option>
                        <option class="" value="1">Werkzaamheid</option>
                    </select>
                    <label class="active">Project Type</label>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <input id="begin_datum" name="begin_datum" type="text" class="validate  datepicker " disabled>
                        <label for="begin_datum" class="active">Begin Datum</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <input id="eind_datum" name="eind_datum" type="text" class="validate datepicker" disabled>
                        <label for="eind_datum" class="active">Eind Datum</label>
                    </div>
                </div>
            </div>
            <div class="col m4 s12 offset-m7 flip-in-ver-right" id="project_taken">

                <div class="col m12 z-depth-3" id="taken">
                    <h5 class="center">Taken</h5>
                    <ul class="collapsible" id='taken_lijst'>
                    </ul>
                    <i class="material-icons right modal-trigger" id="add_taak" href="#modal1">add</i>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <form action="../requests/create_project.php" method="POST">
            <div id="add_form" class="col m7 s12 offset-m4 white z-depth-3 ">

                <h5 class="center ">Project Informatie</h5>

                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <input placeholder="naam" id="naam" name="naam" type="text" class="validate ">
                        <label for="naam">Naam</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <textarea id="omschrijving" name="omschrijving" id="textarea1" cols="30" rows="10" class="materialize-textarea"></textarea>
                        <label for="omscrijving">Omschrijving</label>
                    </div>
                </div>

                <div class="input-field col s8 offset-s2">
                    <select name="type" id="type_project">
                        <option value="" disabled selected>Kies het type project.</option>
                        <option class="" value="0">Evenement</option>
                        <option class="" value="1">Werkzaamheid</option>
                    </select>
                    <label>Kies Project</label>
                </div>

                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <input name="begin_datum" type="text" class="validate  datepicker ">
                        <label for="begin_datum">Begin Datum</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <input name="eind_datum" type="text" class="validate  datepicker ">
                        <label for="eind_datum"> Eind Datum</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light col m8 s12 offset-m2" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

        </form>
    </div>
    </div>

    <div class="fixed-action-btn">
        <a onclick='showForm()' class="btn-floating btn-large waves-effect waves-light -3"><i class="material-icons">add</i></a>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Taken Registratie</h4>
            <form name="taken_form" id="taken_form">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="taak_naam" name="taak_naam" type="text" class="validate" required>
                        <label for="taak_naam">Naam</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="taak_omschrijving" name="taak_omschrijving" type="text" class="materialize-textarea validate" required></textarea>
                        <label for="taak_omschrijving">Omschrijving</label>
                    </div>
                    <div class="input-field col s12">
                        <select id="type_taak" name="type_taak">
                            <option value="" disabled selected>Type Taak</option>
                            <option class="" value="3">Uitvoering</option>
                            <option class="" value="4">UItgave</option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <div class="chips chips-autocomplete">
                        </div>
                        <label class="active">Verantwoordelijke</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="taak_aantal" name="taak_aantal" type="text" class="materialize-textarea validate"></textarea>
                        <label for="taak_aantal">Aantal</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="taak_prijs" name="taak_prijs" type="text" class="materialize-textarea validate"></textarea>
                        <label for="taak_prijs">Prijs</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <button class="btn waves-effect waves-light col m12" type="submit" id="submit_taak" name="opslaan">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/app.js"></script>
    <script type="text/javascript" src="../../lib/js/projecten.js"></script>

</body>

</html>