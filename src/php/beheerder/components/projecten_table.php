<?php
include("../../db/conn.php");
?>
<table id="projects_table" class="highlight responsive-table white-text z-depth-3 ">
    <thead class="blue-grey darken-3 ">
        <tr>
            <th class='center'>ID</th>
            <th class='center'>Naam</th>
            <th class='center'>Omschrijving</th>
            <th class='center'>Type</th>
            <th class='center'>Start Datum </th>
            <th class='center'>Eind Datum</th>
            <th class='center'>Status </th>
            <th class='center'>See More</th>


        </tr>
    </thead>

    <?php

    $query =  mysqli_query($link, "SELECT `project_id`,`naam`,`omschrijving`,`type`,`datum_start`,`datum_eind`,`status`,project_type.type_name FROM `projecten` INNER JOIN project_type ON projecten.type = project_type.type_id");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr data-id=" . $row{
                'project_id'} . ">";
            echo "<td class='center'><b>" . $row{
                'project_id'} . "</b></td>";
            // echo "<td><a href='test.html'>Edit</a></td>";
            echo "<td class='center'>" . $row{
                'naam'} . "</td>";
            echo "<td class='center'>" . $row{
                'omschrijving'} . "</td>";
            echo "<td class='center'>" . $row{
                'type_name'} . "</td>";
            echo "<td class='center'>" . $row{
                'datum_start'} . "</td>";
            echo "<td class='center'>" . $row{
                'datum_eind'} . "</td>";
            if ($row{
                'status'} == 'open') {
                echo "<td class='center'><i class='tiny center red-text material-icons'>check_circle</i></td>";
                // echo "</tr>";
            } else {
                echo "<td class='center'><i class='tiny center green-text material-icons'>check_circle</i></td>";
            }
            echo "<td class='center'><a class='amber waves-effect waves-light btn btn-tiny' href='view_project.php?id=" . $row['project_id'] . "'><i class='material-icons'>chevron_right</i></a></td>";
            echo "</tr>";
        }
    };

    ?>
    <!-- <i class='tiny right material-icons'>arrow_forward</i>-->
</table>