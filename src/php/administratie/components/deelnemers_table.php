<?php
include("../../db/conn.php");
?>

<head>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("deelnemers_table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="zoek naar een project..">

    <table id="deelnemers_table" class="highlight white-text responsive-table z-depth-3 ">
        <thead class="blue-grey darken-3 ">
            <tr>
                <th>Naam</th>
                <th>Type deelnemers</th>
                <th>Email adres</th>
                <th>Adres</th>
                <th>Telefoonnummer </th>
                <th>See More</th>


            </tr>
        </thead>

        <?php
        $query =  mysqli_query($link, "SELECT deelnemers_naam,deelnemers_type.type_naam,deelnemers_adres,deelnemers_email,deelnemers_telefoonnummer FROM deelnemers INNER JOIN deelnemers_type ON deelnemers.deelnemers_type = deelnemers_type.type_id ");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
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
                echo "<td><a class='amber waves-effect waves-light btn btn-tiny' href=''>view</a></td>";
                echo "</tr>";
                echo "</tr>";
            }
        };


        ?>
    </table>
</body>