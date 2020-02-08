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
    <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
</head>

<body class="blue-grey darken-2">
    <ul id="dropdown1" class="dropdown-content">
        <!-- <li><a href="#!">one</a></li> -->
        <!-- <li><a href="#!">two</a></li> -->
        <!-- <li class="divider"></li> -->
        <li><a href="#!">Log Out</a></li>
    </ul>
    <nav class="col s8 offset-s4">
        <div class="nav-wrapper teal">

            <a href="#" class="brand-logo">Home</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <!-- <li><a href="collapsible.html">JavaScript</a></li> -->
                <li>
                    <form>
                        <div class="input-field">
                            <input id="search" class="white-text" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>

            </ul>
        </div>
    </nav>
    <ul id="slide-out" class="sidenav sidenav-fixed blue-grey darken-4 white-text">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="../../lib/images/office.jpg">
                </div>
                <a href="#user"><img class="circle" src="../../lib/images/yuna.jpg"></a>
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="#!" class="white-text">First Sidebar Link</a></li>
        <li><a href="#!" class="white-text">Second Sidebar Link</a></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="row ">
        <div class="col s9 offset-s3">
            <table class="highlight responsive-table z-depth-4 white-text">
                <thead class="blue-grey darken-4">
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
        <a class="btn-floating btn-large waves-effect waves-light blue-grey darken-4 modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
    </div>
    <form>
        <div id="modal1" class="modal col s6 offset-s3 modal">
            <!-- <div class="modal-content"> -->
            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <input placeholder="naam" id="naam" name="naam" type="text" class="validate white-text">
                    <label for="naam">Naam</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <input id="begin_datum" name="begin_datum" type="text" class="validate white-text datepicker ">
                    <label for="begin_datum">Begin Datum</label>
                </div>
                <div class="input-field col s10 offset-s1">
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