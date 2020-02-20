<?php
require_once '../../db/conn.php';
require_once '../session.php';
require '../checkSession.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overzicht Fin afdeling</title>

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
            <a href="../logout.php">Log Out</a>
        </li>
    </ul>
    <div class="navbar-fixed">

        <nav class="col s8 offset-s4">
            <div class="nav-wrapper teal">
                <a href="#" class="brand-logo center">Overzicht</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
            <ul id="slide-out" class="sidenav sidenav-fixed -4 ">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="../../lib/images/office.jpg">
                        </div>
                        <a href="#user"><img class="white-text circle" src="../../lib/images/yuna.jpg"></a>
                        <a href="#name"><span class="white-text name">John Doe</span></a>
                        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>
                </li>
                <li><a href="#!" class="">Dashboard</a></li>
                <li class="teal"><a href="#!">Overzichten</a></li>
                <li><a href="#!" class="">Rapporten</a></li>
            </ul>
        </nav>
    </div>

    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
    <div class="row">
        <div class="col m9 offset-m3">
            <form id="search_bar" action="search.php" method="GET">
                <div class="input-field">
                    <input id="search" class="" type="search" required placeholder="      naam van het project of deelnemer" size="30">
                    <!-- <input id=searchb type="submit" value="Search"> -->
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
        <div class="col  s12 m9 offset-m3">
            <table id="projects_table" class="highlight responsive-table z-depth-3 ">
                <thead class="-3">
                    <tr>
                        <th>Naam project</th>
                        <th>Project omschrijving</th>
                        <th>Soort project</th>
                        <th>Start Datum </th>
                        <th>Eind Datum</th>
                        <th>Status project</th>


                    </tr>
                </thead>

                <?php

                $query =  mysqli_query($link, "SELECT * FROM projecten");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr data-id=" . $row{
                            'project_id'} . ">";
                        //  echo "<td>"<a href="test.html">Edit</a>"</td>"
                        echo "<td>" . $row{
                            'naam'} . "</td>";
                        echo "<td>" . $row{
                            'omschrijving'} . "</td>";
                        echo "<td>" . $row{
                            'type'} . "</td>";
                        echo "<td>" . $row{
                            'datum_start'} . "</td>";
                        echo "<td>" . $row{
                            'datum_eind'} . "</td>";
                        echo "<td>" . $row{
                            'status'} . "</td>";


                        echo "</tr>";
                    }
                };

                ?>
            </table>
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
                        <option class="" value="1">Option 1</option>
                        <option class="" value="2">Option 2</option>
                        <option class="" value="3">Option 3</option>
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
            <div class="col m4 s12 offset-m7 z-depth-3 flip-in-ver-right" id="project_taken">
                <h5 class="center">Taken</h5>
                <ul class="collapsible" id='taken_lijst'>
                </ul>
                <i class="material-icons right modal-trigger" id="add_taak" href="#modal1">add</i>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <form action="createProject.php" method="POST">
            <div id="add_form" class="col m9 s12 offset-m3 white z-depth-3 ">

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
                    <select name="type" id="type">
                        <option value="" disabled selected>Kies het type project.</option>
                        <option class="" value="1">Option 1</option>
                        <option class="" value="2">Option 2</option>
                        <option class="" value="3">Option 3</option>
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
            <h4>Modal Header</h4>
            <form action="">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="taak_naam" type="text" class="validate">
                        <label for="taak_naam">Naam</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="taak_omschrijving" type="text" class="materialize-textarea validate"></textarea>
                        <label for="taak_omschrijving">Omschrijving</label>
                    </div>
                    <div class="input-field col s12">
                        <select id="type">
                            <option value="" disabled selected>Kies de verantwoordeljke.</option>
                            <option class="" value="1">Verantwoordelijke</option>
                            <!-- <option class="" value="2">Option 2</option>
                        <option class="" value="3">Option 3</option> -->
                        </select>
                    </div>
                    <label class="active">Verantwoordelijke</label>
                    <div class="input-field col s12">
                        <textarea id="taak_aantal" type="text" class="materialize-textarea validate"></textarea>
                        <label for="taak_aantal">Aantal</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="taak_prijs" type="text" class="materialize-textarea validate"></textarea>
                        <label for="taak_prijs">Prijs</label>
                    </div>

                </div>
            </form>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../lib/js/main.js"></script>

</body>

</html>