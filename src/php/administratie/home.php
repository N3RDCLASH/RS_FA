<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
setcookie('page', '', time() + 3600);
$_COOKIE['page'] = 'Dashboard';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

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
    <div class="row" id="cards-container">
        <div class="col s12 m2 offset-m3">
            <div class="card gradient-deepblue z-depth-3">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card.
                    </p>
                </div>
            </div>
        </div>
        <div class="col s12 m2">
            <div class="card gradient-orange z-depth-3">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card.
                    </p>
                </div>

            </div>
        </div>
        <div class="col s12 m2">
            <div class="card gradient-ohhappiness z-depth-3">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card.
                    </p>
                </div>

            </div>
        </div>
        <div class="col s12 m2">
            <div class="card gradient-ibiza z-depth-3">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col m3 offset-m4 z-depth-3" id="chart_container">
            <div class="chart-container" style="position: relative; height:40vh; width:22vw">
                <canvas id="Chart1"></canvas>
            </div>
        </div>
        <div class="col m3 offset-m1  z-depth-3" id="chart_container">
            <div class="chart-container" style="position: relative; height:40vh; width:22vw">
                <canvas id="Chart2"></canvas>
            </div>
        </div>
    </div>
    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/app.js"></script>
    <script type="text/javascript" src="../../lib/js/home.js"></script>
    <script src="../../lib/js/node_modules/chart.js/dist/Chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", ChartIt)

        async function getData() {
            const xs = []
            const ys = []
            response = await fetch('../requests/stats/get_aantal_type_projecten.php')
            data = await response.json();
            data.forEach(x => {
                xs.push(x.type.replace(/^\w/, c => c.toUpperCase()))
                ys.push(x.aantal)
            })
            return {
                xs,
                ys
            }
        }

        async function ChartIt() {
            let ctx = document.getElementById('Chart1');
            const data = await getData();
            console.log(data.xs)
            const Chart1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.xs,
                    datasets: [{
                        label: '# Projecten per Type',
                        fill: true,
                        data: data.ys,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            let ctx2 = document.getElementById('Chart2');
            const data2 = await getData2();
            console.log(data.xs)
            const Chart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: data2.xs,
                    datasets: [{
                        label: '# Aangemaakte Projecten per Datum',
                        fill: false,
                        data: data2.ys,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: 
                            'rgba(255, 99, 132, 1)',                        
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
        async function getData2() {
            const xs = []
            const ys = []
            response = await fetch('../requests/stats/get_aantal_projecten_per_datum.php')
            data = await response.json();
            data.forEach(x => {
                xs.push(x.datum)
                ys.push(x.aantal)
            })
            return {
                xs,
                ys
            }
        }
    </script>
</body>

</html>