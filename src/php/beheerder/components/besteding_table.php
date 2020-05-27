<?php
include("../../db/conn.php");
?>

<head>

    <head>
        <script>
            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("besteding_table");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </head>

<body>
    <nav class="dark-1">
        <div class="nav-wrapper">
            <form action="">
                <div class="input-field">
                    <input class="white-text" type="search" id="myInput" onkeyup="myFunction()" placeholder="Zoek naar een deelnemer..">
                    <label class="label-icon" for="myInput"><i class="material-icons">search</i></label>
                    <i class="material-icons ">close</i>
                </div>
            </form>
        </div>
    </nav>
    <table id="projects_table" class="highlight responsive-table white-text z-depth-3 ">

        <thead class="blue-grey darken-3 ">

            <tr>
                <th class='center'>ID</th>
                <th class='center'>KwitantieID</th>
                <th class='center'>Naam</th>
                <th class='center'>Type</th>
                <th class='center'>Aantal</th>
                <th class='center'>Prijs</th>
                <th class='Center'></th>

                </th>

            </tr>
        </thead>

        <?php

        $id = $_GET['id'];
        $query =  mysqli_query(
            $link,

            "SELECT
            bestedingen.besteding_id,
            kwitantie.kwitantie_id,
            bestedingen.naam,
            bestedingen.type,
            bestedingen.aantal,
            bestedingen.prijs
        FROM
            bestedingen,
            kwitantie
        WHERE
            kwitantie.besteding_id = bestedingen.besteding_id AND bestedingen.besteding_id IN(
            SELECT
                besteding_id
            FROM
                bestedingen,
                taken
            WHERE
                bestedingen.taak_id = taken.taak_id AND taken.taak_id =$id)"
        );



        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr data-id=" . $row{
                    'besteding_id'} . ">";
                echo "<td class='center'><b>" . $row{
                    'besteding_id'} . "</b></td>";
                // echo "<td><a href='test.html'>Edit</a></td>";
                echo "<td class='center'><b>" . $row{
                    'kwitantie_id'} . "</b></td>";
                echo "<td class='center'>" . $row{
                    'naam'} . "</td>";
                echo "<td class='center'>" . $row{
                    'type'} . "</td>";
                echo "<td class='center'>" . $row{
                    'aantal'} . "</td>";
                echo "<td class='center'>" . $row{
                    'prijs'} . "</td>";
                echo "<td class='center'><a class='amber waves-effect waves-light btn btn-tiny' onclick='showKwitantie(" . $row['besteding_id'] . ")''><i class='material-icons tiny white-text modal-trigger' href='#modal2'>visibility</i></a></td>";
                echo "</tr>";

                //echo "<td class='center'><a class='amber waves-effect waves-light btn btn-tiny' href='view_project.php?id=" . $row['project_id'] . "'><i class='material-icons'>chevron_right</i></a></td>";
                //echo "</tr>";
            }
        } else {
            echo mysqli_error($link);
        }

        ?>
        <!-- <i class='tiny right material-icons'>arrow_forward</i>-->
    </table>

    <body>