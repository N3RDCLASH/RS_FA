<?php
include("../../db/conn.php");
?>

<table id="deelnemers_table" class="highlight white-text responsive-table z-depth-3 ">
    <thead class="blue-grey darken-3 ">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Type</th>
            <th>Email</th>
            <th>Adres</th>
            <th>Telefoonnummer </th>
            <th>See More</th>


        </tr>
    </thead>

    <?php
    $query =  mysqli_query($link, "SELECT deelnemers_id,deelnemers_naam,deelnemers_type.type_naam,deelnemers_adres,deelnemers_email,deelnemers_telefoonnummer FROM deelnemers INNER JOIN deelnemers_type ON deelnemers.deelnemers_type = deelnemers_type.type_id ");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $row{
                'deelnemers_id'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_naam'} . "</td>";
            echo "<td>" . $row{
                'type_naam'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_email'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_adres'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_telefoonnummer'} . "</td>";
            echo "<td><a class='amber waves-effect waves-light btn btn-tiny' href=''><i class='material-icons'>chevron_right</i></a></td>";
            echo "</tr>";
            echo "</tr>";
        }
    };


    ?>
</table>