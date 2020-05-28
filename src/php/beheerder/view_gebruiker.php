<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
$_COOKIE['page'] = 'Gebruiker Overzicht';

if (empty($_GET['id']) == true) {
    header('location:gebruikers.php');
} else {
    if (is_numeric($_GET['id']) == false) {
        header('location:gebruikers.php?');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gebruiker Informatie</title>

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
            <div class="col m4 s12 offset-m1 z-depth-3 flip-in-ver-right dark-2" id="gebruiker_informatie" data-id="<?php echo $_GET['id'] ?>">
                <form action="../requests/update_gebruiker.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <h5 class="center white-text">Gebruiker</h5>
                    <i class="right primary-text material-icons tooltipped" data-position="right" data-tooltip="Edit Gebruiker" id="edit">edit</i>

                    <div class="row">
                        <div class="input-field col m12 s12 ">
                            <input placeholder="naam" id="naam" name="gebruiker_naam" type="text" class="validate" disabled>
                            <label for="naam" class="active">Naam</label>
                        </div>
                    </div>
                    <!-- <div class="row">
                    <div class="input-field col s8 ">
                        <textarea id="omschrijving" name="omschrijving" id="textarea1" cols="30" rows="10" class="materialize-textarea" disabled></textarea>
                        <label for="omschrijving" class="active">Omschrijving</label>
                    </div>
                </div> -->
                    <div class="input-field col m12 s12 white-text">
                        <select id="type" name="gebruiker_type" class="white-text" disabled>
                            <option value="" disabled selected>Selecteer het type gebruiker.</option>
                            <option class="" value="0">Beheerder</option>
                            <option class="" value="1">Administratie medewerker</option>
                            <option class="" value="2">Financiële medewerker</option>
                        </select>
                        <label class="active">Project Type</label>
                    </div>

                    <label>
                        <input type="checkbox" id="change_pass" name="change_pass" disabled>
                        <span>Verander wachtwoord</span>
                    </label>
                    <div class="input-field col m12 s12" id="gebruikers_password1_container">
                        <input type="password" id="password1" name="gebruikers_password1" tabindex="1" size="10" placeholder="Vul uw wachtwoord" disabled required>
                        <label for="gebruiker_password1">Vul uw wachtwoord</label>
                    </div>
                    <div class="input-field col m12 s12" id="gebruikers_password_container">
                        <input type="password" id="password2" name="gebruikers_password2" tabindex="1" size="10" placeholder="Vul uw wachtwoord nogeens in" disabled required>
                        <label for="gebruiker_password2">
                            <Wachtwoord/label> </div> <button id="submit" disabled class="btn waves-effect primary waves-light col m8 s10 offset-s1 offset-m2 " type="submit" name="opslaan">Updaten
                                <i class="material-icons right">send</i>
                                </button>
                    </div>
                </form>
            </div>
            <script src="../../lib/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
            <script type="text/javascript" src="../../lib/js/beheerder/app.js"></script>
            <script type="text/javascript" src="../../lib/js/beheerder/view_gebruiker.js"></script>

</body>

</html>