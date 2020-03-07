<?php
include("../../db/conn.php");
?>
<table id="projects_table" class="highlight responsive-table white-text z-depth-3 ">
    <thead class="blue-grey darken-3 ">
        <tr>
            <th>Naam project</th>
            <th>Project omschrijving</th>
            <th>Soort project</th>
            <th>Start Datum </th>
            <th>Eind Datum</th>
            <th>Status project</th>


        </tr>
    </thead>

    <?php

    $query =  mysqli_query($link, "SELECT `project_id`,`naam`,`omschrijving`,`type`,`datum_start`,`datum_eind`,`status`,project_type.type_name FROM `projecten` INNER JOIN project_type ON projecten.type = project_type.type_id");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr data-id=" . $row{
                'project_id'}. ">";
            // echo "<td><a href='test.html'>Edit</a></td>";
            echo "<td>" . $row{
                'naam'} . "</td>";
            echo "<td>" . $row{
                'omschrijving'} . "</td>";
            echo "<td>" . $row{
                'type_name'} . "</td>";
            echo "<td>" . $row{
                'datum_start'} . "</td>";
            echo "<td>" . $row{
                'datum_eind'} . "</td>";
            if ($row{
                'status'} == 'open') {
                echo "<td class='center'><i class='tiny red-text material-icons'>check_circle</i> " . $row{
                    'status'} . "</td>";
                echo "</tr>";
            } else {
                echo "<td class='center'><i class='tiny green-text material-icons'>check_circle</i> " . $row{
                    'status'} . "</td>";
                echo "</tr>";
            }
        }
    };

    ?>
</table>