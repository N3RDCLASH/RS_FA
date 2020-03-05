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
    <script type="text/javascript" src="../../lib/js/app.js"></script>
    <script type="text/javascript" src="../../lib/js/home.js"></script>
    <script src="../../lib/js/node_modules/chart.js/dist/Chart.js"></script>
    <script>
        const EventTargetPrototype = document.__proto__.__proto__.__proto__.__proto__;
        const origAddEventListener = EventTargetPrototype.addEventListener;
        EventTargetPrototype.addEventListener = function addEventListenerWrapper(type, listener) {
            if (typeof listener !== 'function') throw new Error('bad listener for ' + type);
            return origAddEventListener.apply(this, arguments);
        };

        document.addEventListener('DOMContentLoaded', ChartIt)

        function getData() {
            let xs = []
            let ys = []
            fetch('../requests/stats/get_aantal_type_projecten.php')
                .then(body => {
                    return body.json()
                })
                .then(body => body.forEach(x => {
                    xs.push(x.type)
                    ys.push(x.aantal)
                }))
                .catch(error => {
                    console.log(error)
                })
            return {
                xs,
                ys
            }
        }

        // document.addEventListener("DOMContentLoaded", )

        async function ChartIt() {
            const data = await getData();
            var ctx = document.getElementById('myChart');
            console.log(data)
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Evenementen", "Werkzaamheden"],
                    datasets: [{
                        label: '# projecten per type',
                        // fill: false,
                        data: data.ys,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            //     'rgba(255, 206, 86, 1)',
                            //     'rgba(75, 192, 192, 1)',
                            //     'rgba(153, 102, 255, 1)',
                            //     'rgba(255, 159, 64, 1)'
                        ],
                        // borderWidth: 1
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
            // chart.update()
            chart.canvas.parentNode.style.height = '128px';
            chart.canvas.parentNode.style.width = '128px';
        }
    </script>
</body>

</html>