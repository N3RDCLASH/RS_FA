<?php
require_once '../session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- local resources -->
    <link type="text/css" rel="stylesheet" href="../../lib/css/main.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.min.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
</head>

<body>
    <ul id="dropdown1" class="dropdown-content">
        <!-- <li><a href="#!">one</a></li> -->
        <!-- <li><a href="#!">two</a></li> -->
        <!-- <li class="divider"></li> -->
        <li><a href="#!">Log Out</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper teal">

            <a href="#" class="brand-logo">Home</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <!-- <li><a href="collapsible.html">JavaScript</a></li> -->
                <li>
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>

            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col s8 offset-s2">
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Omschrijving</th>
                        <th>Type</th>
                        <th>Start Datum</th>
                        <th>Eind Datum</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                    </tr>
                    <tr>
                        <td>Alan</td>
                        <td>Jellybean</td>
                        <td>$3.76</td>
                        <td>Jellybean</td>
                        <td>$3.76</td>
                    </tr>
                    <tr>
                        <td>Jonathan</td>
                        <td>Lollipop</td>
                        <td>$7.00</td>
                        <td>Lollipop</td>
                        <td>$7.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
    </div>
    <form>
        <div id="modal1" class="modal col s6 offset-s3 modal">
            <!-- <div class="modal-content"> -->
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="naam" id="naam" name="naam" type="text" class="validate white-text">
                    <label for="naam">Naam</label>
                </div>
                <div class="input-field col s12">
                    <input id="begin_datum" name="begin_datum" type="text" class="validate white-text datepicker ">
                    <label for="begin_datum">Begin Datum</label>
                </div>
                <div class="input-field col s12">
                    <input id="eind_datum" name="eind_datum" type="text" class="validate white-text datepicker ">
                    <label for="eind_datum"> Eind Datum</label>
                </div>
            </div>
            <!-- </div> -->
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
    </form>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/main.js"></script>
</body>

</html>