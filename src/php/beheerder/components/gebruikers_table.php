<?php
include("../../db/conn.php");
?>

<table id="gebruikers_table" class="highlight white-text responsive-table z-depth-3 ">
    <thead class="blue-grey darken-3 ">
        <tr>
            <th>ID</th>
            <th>Gebruikernaamm</th>
            <th>Type Gebruikers</th>
            <th>See More</th>


        </tr>
    </thead>

    <?php
    $query =  mysqli_query($link, "SELECT user_id,user_name,user_type.type_name FROM user INNER JOIN user_type ON user.user_type = user_type.type_id ");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $row{
                'user_id'} . "</td>";
            echo "<td>" . $row{
                'user_name'} . "</td>";
            echo "<td>" . $row{
                'type_name'} . "</td>";
            echo "<td><a class='amber waves-effect waves-light btn btn-tiny' href=''>view</a></td>";
            echo "</tr>";
            echo "</tr>";
        }
    };


    ?>
</table>