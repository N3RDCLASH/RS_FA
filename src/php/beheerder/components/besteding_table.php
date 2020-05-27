<?php
include("../../db/conn.php");
?>

<head>
    <script>
        function myFunction() {
            const input = document.getElementById("myInput");
            const inputStr = input.value.toUpperCase();
            document.querySelectorAll('#projects_table tr:not(.header)').forEach((tr) => {
                const anyMatch = [...tr.children]
                    .some(td => td.textContent.toUpperCase().includes(inputStr));
                if (anyMatch) {
                    tr.style.removeProperty('display');
                } else {
                    tr.style.display = 'none';
                }
            });
        }
    </script>
</head>

<body>

    <table id="projects_table" class="highlight responsive-table white-text z-depth-3 ">
        <thead class="blue-grey darken-3 ">
            <tr>
                <th class='center'>ID</th>
                <th class='center'>Naam</th>
                <th class='center'>Type</th>
                <th class='center'>Aantal</th>
                <th class='center'>Prijs</th>
                <th class='Center'></th>

                </th>

            </tr>
        </thead>

        <?php


        $query =  mysqli_query($link, "SELECT `besteding_id`,`naam`,`type`,`aantal`,`prijs` FROM `bestedingen` WHERE taak_id =" . $_GET['id']);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr data-id=" . $row{
                    'besteding_id'} . ">";
                echo "<td class='center'><b>" . $row{
                    'besteding_id'} . "</b></td>";
                // echo "<td><a href='test.html'>Edit</a></td>";
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
        };

        ?>
        <!-- <i class='tiny right material-icons'>arrow_forward</i>-->
    </table>

    <body>