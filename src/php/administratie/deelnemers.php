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
    <title>Deelnemers</title>

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
    <div class="navbar-fixed">

        <nav class="col s8 offset-s4">
            <div class="nav-wrapper teal">
                <a href="#" class="brand-logo center">Deelnemers</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
            <ul id="slide-out" class="sidenav sidenav-fixed  ">
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
                <li ><a href="#!" class="">Dashboard</a></li>
                <li><a href="overzichten.php">Overzichten</a></li>
                <li class="teal"><a href="deelnemers.php" class="">Deelnemers</a></li>
            </ul>
        </nav>
    </div>
    <div class="row">

        <div class="col m6 offset-m4 z-depth-3" id="deelnemers">
            <form id="" action="createDeelnemer.php" method="POST">
                <h5 class="center">Deelnemer gegevens</h5>
                <div class="input-field col m12">
                    <input type="text" name="deelnemers_naam" tabindex="1" size="10" placeholder="Naam" required autofocus>
                </div>

                <div class="input-field col m12">
                    <label for="deelnemers_type">Type deelnemer</label>
                    <select name="deelnemers_type" id="" class="materialize-select">
                        <option value="4">Student</option>
                        <option value="5 ">Docent</option>
                        <option value="6">Overige</option>
                    </select>
                </div>

                <div class="input-field col m12">
                    <input type="email" name="deelnemers_email" tabindex="1" size="10" placeholder="email" required>
                </div>


                <div class="input-field col m12">
                    <input type="text" name="deelnemers_adres" tabindex="1" size="10" placeholder="Adres" required>
                </div>


                <div class="input-field col m12">
                    <input type="number" name="deelnemers_telefoonnummer" tabindex="1" size="10" placeholder="telefoonnummer" required>
                </div>

                <button class="btn waves-effect waves-light col m12" type="submit" name="opslaan">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../lib/js/main.js"></script>
</body>

</html>