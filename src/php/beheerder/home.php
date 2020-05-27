<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/check_session.php';
include('../requests/stats/get_aantal_projecten_per_status.php');
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

<body class="">
    <ul id="dropdown1" class="dropdown-content">
        <li>
            <a href="../scripts/logout.php">Uitloggen</a>
        </li>
    </ul>
    <?php
    include 'components/navigation.php';
    ?>
    <div id="main">
        <div class="row" id="cards-container">
            <div class="col s12 m6 l6 xl3">
                <div class="card gradient-deepblue z-depth-3">
                    <div class="card-content white-text">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">assignment</i>
                                <p>Projecten</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h3 class="mb-0 white-text"> <?php include('../requests/stats/get_aantal_projecten.php'); ?></h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col s6 m6 l6 xl3">
                <div class="card gradient-orange z-depth-3">
                    <div class="card-content white-text">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">assignment</i>
                                <p><?php echo ucfirst($result[1]['status']); ?></p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h3 class="mb-0 white-text"> <?php echo $result[1]['aantal']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 m6 l6 xl3">
                <div class="card gradient-ohhappiness z-depth-3">
                    <div class="card-content white-text">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">assignment</i>
                                <p><?php echo ucfirst($result[0]['status']); ?></p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h3 class="mb-0 white-text"> <?php echo $result[0]['aantal']; ?></h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col s12 m6 l6 xl3">
                <div class="card gradient-ibiza z-depth-3">
                    <div class="card-content white-text">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">person</i>
                                <p>Deelnemers</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h3 class="mb-0 white-text"> <?php include('../requests/stats/get_aantal_deelnemers.php'); ?></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col m7 z-depth-3 chart2 chart2-sm" id="chart_container">
                <div class="chart-container" style="position: relative; height:60vh; width:45vw">
                    <canvas id="Chart2"></canvas>
                </div>
            </div>
            <div class="col m4 z-depth-3 chart1 chart1-sm" id="chart_container">
                <div class="chart-container" style="position: relative; height:60vh; width:23vw">
                    <canvas id="Chart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/js/administratie/app.js"></script>
    <script type="text/javascript" src="../../lib/js/administratie/home.js"></script>
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
        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0.6)");
        gradientFill.addColorStop(1, "rgba(244, 144, 128, 0.6)");


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
                            'rgba(240,23,103, 0.7)',
                            'rgba(69,72,230, 0.7)'

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
                        fill: true,
                        data: data2.ys,
                        backgroundColor: [
                            'rgba(69,72,230, 0.3)'
                        ],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
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