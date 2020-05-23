<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
$_COOKIE['page'] = 'Gebruiker Overview';

if (empty($_GET['id'] == true)) {
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

<body class="" data-id="<?php echo $_GET['id'] ?>">
    <?php
    include 'components/navigation.php';
    ?>
    <div id="main">
        <div class="row">
            <div class="col m4 s12 offset-m1 z-depth-3 flip-in-ver-right dark-2" id="deelnemer_informatie" data-id="<?php echo $_GET['id'] ?>">
                <form action="../requests/update_deelnemer.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <h5 class="center white-text">Deelnemer gegevens</h5>
                    <i class="right primary-text material-icons tooltipped" data-position="right" data-tooltip="Edit Deelnemer" id="edit">edit</i>
                    <div class="input-field col m12 s12">
                        <input type="text" id="deelnemers_naam" name="deelnemers_naam" tabindex="1" size="10" placeholder="Naam" required autofocus disabled>
                    </div>

                    <div class="input-field col m12 s12">
                        <select name="deelnemers_type" id="deelnemers_type" class="materialize-select" disabled>
                            <option value="x" disabled selected>Select de type deelnemer</option>
                            <option value="4">Student</option>
                            <option value="5 ">Docent</option>
                            <option value="6">Overige</option>
                        </select>
                    </div>

                    <div class="input-field col m12 s12">
                        <input type="email" id="deelnemers_email" name="deelnemers_email" tabindex="1" size="10" placeholder="email" required disabled>
                        <label for="deelnemers_email">Email</label>
                    </div>


                    <div class="input-field col m12 s12">
                        <input type="text" id="deelnemers_adres" name="deelnemers_adres" tabindex="1" size="10" placeholder="Adres" required disabled>
                        <label for="deelnemers_adres">Adres</label>
                    </div>


                    <div class="input-field col m12 s12">
                        <input type="number" id="deelnemers_telefoonnummer" name="deelnemers_telefoonnummer" tabindex="1" size="10" placeholder="telefoonnummer" required disabled>
                        <label for="deelnemers_telefoonnummer">Telefoon Nr.</label>

                    </div>

                    <button class="green primary btn waves-effect waves-light col m12 s12" id="submit" type="submit" name="opslaan" disabled>Submit
                        <i class="material-icons right">send</i>
                    </button>
            </div>
            <div class="col m6 dark-2 z-depth-3 chart2">
                <div class="chart-container" style="position: relative; height:50vh; width:40vw">
                    <canvas id="Chart2"></canvas>
                </div>
            </div>
            </form>
        </div>
        <script src="../../lib/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
        <script type="text/javascript" src="../../lib/js/administratie/app.js"></script>
        <script type="text/javascript" src="../../lib/js/beheerder/view_deelnemer.js"></script>
        <script src="../../lib/js/node_modules/chart.js/dist/Chart.js"></script>
        <script>
            var ctx = document.getElementById('Chart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

</body>

</html>