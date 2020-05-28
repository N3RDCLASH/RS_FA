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
    <nav id="search" class="dark-1">
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

    <table id="deelnemers_table" class="highlight white-text responsive-table z-depth-3 ">
        <thead class="blue-grey darken-3 ">
            <tr>
                <th class='center'>ID</th>
                <th class='center'> Naam</th>
                <th class='center'>Type</th>
                <th class='center'>Email</th>
                <th class='center'>Adres</th>
                <th class='center'>Telefoonnummer </th>
                <th class='center'>Bekijk meer</th>


            </tr>
        </thead>

        <?php
        $query =  mysqli_query($link, "SELECT deelnemers_id,deelnemers_naam,deelnemers_type.type_naam,deelnemers_adres,deelnemers_email,deelnemers_telefoonnummer FROM deelnemers INNER JOIN deelnemers_type ON deelnemers.deelnemers_type = deelnemers_type.type_id ");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td class='center'>" . $row{
                    'deelnemers_id'} . "</td>";
                echo "<td class='center'>" . $row{
                    'deelnemers_naam'} . "</td>";
                echo "<td class='center'>" . $row{
                    'type_naam'} . "</td>";
                echo "<td class='center'>" . $row{
                    'deelnemers_email'} . "</td>";
                echo "<td class='center'>" . $row{
                    'deelnemers_adres'} . "</td>";
                echo "<td class='center'>" . $row{
                    'deelnemers_telefoonnummer'} . "</td>";
                echo "<td class='center'><a class='amber waves-effect waves-light btn btn-tiny' href='view_deelnemer.php?id=" . $row['deelnemers_id'] . "'><i class='material-icons'>chevron_right</i></a></td>";
                echo "</tr>";
                echo "</tr>";
            }
        };


        ?>
    </table>
</body>