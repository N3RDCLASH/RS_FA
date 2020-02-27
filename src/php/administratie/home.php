<?php
require_once '../../db/conn.php';
require_once '../scripts/session.php';
require '../scripts/checkSession.php';
setcookie('page', '', time() + 3600);
$_COOKIE['page'] = 'home';
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
    <div class="navbar-fixed">

        <nav class="col s8 offset-s4">
            <div class="nav-wrapper teal">
                <a href="#" class="brand-logo center">Dashboard</a>
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
                <li class="teal"><a href="#!" class="">Dashboard</a></li>
                <li><a href="projecten.php">Projecten</a></li>
                <li><a href="deelnemers.php" class="">Deelnemers</a></li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col m5 offset-m5 z-depth-3" id="chart_container">
            <div class="chart-container" style="position: relative; height:50vh; width:40vw">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->
    <script src="../../lib/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../lib/materialize/js/materialize.js"></script>
    <script type="text/javascript" src="../../lib/js/main.js"></script>
    <script src="../../lib/js/node_modules/chart.js/dist/Chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart');
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

        chart.canvas.parentNode.style.height = '128px';
        chart.canvas.parentNode.style.width = '128px';
    </script>
</body>

</html>