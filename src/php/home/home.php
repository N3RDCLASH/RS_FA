<?php
require_once '../session.php';
require '../checkSession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

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
        <!-- <li><a href="#!">one</a></li> -->
        <!-- <li><a href="#!">two</a></li> -->
        <!-- <li class="divider"></li> -->
        <li>
            <a href="../logout.php">Log Out</a>
        </li>
    </ul>
    <div class="navbar-fixed">

        <nav class="col s8 offset-s4">
            <div class="nav-wrapper teal">

                <a href="#" class="brand-logo center">Dashboard</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <!-- <li><a href="collapsible.html">JavaScript</a></li> -->
                    <li>
                        <form>
                            <div class="input-field">
                                <input id="search" class="" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>

                </ul>
            </div>
        </nav>
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
        <li><a href="#!" class="">First Sidebar Link</a></li>
        <li><a href="#!" class="">Second Sidebar Link</a></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="row ">
        <div class="col  s12 m9 offset-m3">
            <table id="projects_table" class="highlight responsive-table z-depth-3 ">
                <thead class="-3">
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
                        <td>Test</td>
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
    <div class="row">
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
                <select id="type">
                    <option value="" disabled selected>Kies het type project.</option>
                    <option class="" value="1">Option 1</option>
                    <option class="" value="2">Option 2</option>
                    <option class="" value="3">Option 3</option>
                </select>
                <label>Materialize Select</label>
            </div>
            <div class="row">
                <div class="input-field col s8 offset-s2">
                    <input id="begin_datum" name="begin_datum" type="text" class="validate  datepicker ">
                    <label for="begin_datum">Begin Datum</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 offset-s2">
                    <input id="eind_datum" name="eind_datum" type="text" class="validate  datepicker ">
                    <label for="eind_datum"> Eind Datum</label>
                </div>
            </div>
            <h5 class="center ">Deelnemers</h5>
            <div class="row">
                <div class="col s8 offset-s2">
                    <div class="chips chips-autocomplete" name="contacts">
                        <i class="material-icons prefix">account_circle</i>
                    </div>
                </div>
            </div>
            <h5 class="center ">Bestedingen</h5>
            <div class="col s10 offset-s1">
                <ul class="collection">
                    <li class="collection-item">
                        <div>Test<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                    </li>
                    <li class="collection-item">
                        <div>Test<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                    </li>
                    <li class="collection-item">
                        <div>Test<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                    </li>
                    <li class="collection-item">
                        <div>Test<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                    </li>
                </ul>
                <div id="besteding_add">
                    <a class="btn-floating btn-small waves-effect waves-light teal"><i class="material-icons">add</i></a>
                </div>
            </div>

            <!-- <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div> -->
            </form>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a onclick='showForm()' class="btn-floating btn-large waves-effect waves-light -3"><i class="material-icons">add</i></a>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../lib/js/main.js"></script>

</body>

</html>
<!-- 
                    //TODO:Implement Project Navigation
                    //TODO:ImplemenT form Submission
             -->