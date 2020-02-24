<?php
include("../../db/conn.php");
?>

<table id="deelnemers_table" class="highlight responsive-table z-depth-3 ">
    <thead class="blue-grey darken-3 white-text">
        <tr>
            <th>Naam</th>
            <th>Type deelnemers</th>
            <th>Email adres</th>
            <th>Adres</th>
            <th>Telefoonnummer </th>


        </tr>
    </thead>

    <?php
    $query =  mysqli_query($link, "SELECT * FROM deelnemers");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $row{
                'deelnemers_naam'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_type'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_email'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_adres'} . "</td>";
            echo "<td>" . $row{
                'deelnemers_telefoonnummer'} . "</td>";

            echo "</tr>";
        }
    };


    ?>
</table>