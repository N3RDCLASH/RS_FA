<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
$_COOKIE['page'] = 'Project Overzicht';

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
    <title>Overzicht Financieel</title>

    <!-- local resources -->
    <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../lib/css/main.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
</head>

<body class="">
    <ul id="dropdown1" class="dropdown-content">
        <li>
            <a href="../scripts/logout.php">Log Out</a>
        </li>
    </ul>
    <?php
    include 'components/navigation.php';
    ?>

    <div id="main">
        <div class="row">

            <!-- Project Informatie Display -->

            <div class="col m5 s10 offset-m1 offset-s1 z-depth-3 flip-in-ver-right dark-2" id="project_informatie" data-id="<?php echo $_GET['id'] ?>">
                <form id="projecten_form" action="../requests/update_project.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <h5 class="center white-text">Project Informatie</h5>

                    <div class="switch">
                        <label>
                            open
                            <input id="switch" type="checkbox" name="switch" disabled>
                            <span class="lever"></span>
                            gesloten
                        </label>
                    </div>

                    <!-- <label>
                        <input type="checkbox" id="switch" name="switch" value="Open" />
                        <span data-on="open" data-of="closed"> </span> 
                    </label> -->



                    <i class="right primary-text material-icons tooltipped" data-position="right" data-tooltip="Edit Project" id="edit">edit</i>

                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input placeholder="naam" id="naam" name="naam" type="text" class="validate" disabled>
                            <label for="naam" class="active">Naam</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <textarea id="omschrijving" name="omschrijving" form="projecten_form" id="textarea1" cols="30" rows="10" class="materialize-textarea" disabled></textarea>
                            <label for="omschrijving" class="active">Omschrijving</label>
                        </div>
                    </div>
                    <div class="input-field col s8 offset-s2">
                        <select id="type" name="type" disabled>
                            <option value="" disabled selected>Kies het type project.</option>
                            <option class="" value="0">Evenement</option>
                            <option class="" value="1">Werkzaamheid</option>
                        </select>
                        <label class="active">Type Project</label>
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
                    <button id="submit" disabled class="btn waves-effect primary waves-light col m8 s10 offset-s1 offset-m2 " type="submit" name="opslaan">Update
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
            <div class="col m4 s10 offset-s1 offset-m1 flip-in-ver-right" id="project_taken">

                <div class="col s12 m12 z-depth-3 dark-2" id="taken">
                    <h5 class="center white-text">Taken</h5>
                    <ul class="collapsible" id='taken_lijst'>
                    </ul>
                </div>

            </div>
        </div>
    </div>

   

    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/financieel/app.js"></script>
    <script type="text/javascript" src="../../lib/js/financieel/view_project.js"></script>
</body>

</html>