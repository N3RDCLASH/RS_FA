<?php
include("../../db/conn.php");
?>

<head>
    <script>
        function myFunction() {
            const input = document.getElementById("myInput");
            const inputStr = input.value.toUpperCase();
            document.querySelectorAll('#gebruikers_table tr:not(.header)').forEach((tr) => {
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
    <nav id="search" class="dark-1">
        <div class="nav-wrapper">
            <form action="">
                <div class="input-field">
                    <input class="white-text" type="search" id="myInput" onkeyup="myFunction()" placeholder="Zoek naar een gebruiker..">
                    <label class="label-icon" for="myInput"><i class="material-icons">search</i></label>
                    <i class="material-icons ">close</i>
                </div>
            </form>
        </div>
    </nav>
    <table id="gebruikers_table" class="highlight white-text responsive-table z-depth-3 ">
        <thead class="blue-grey darken-3 ">
            <tr>
                <th>ID</th>
                <th>Gebruikernaamm</th>
                <th>Type</th>
                <th>Bekijk meer</th>
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
                echo "<td>" . ucwords($row{
                    'type_name'}) . "</td>";
                echo "<td><a class='amber waves-effect waves-light btn btn-tiny' href='view_gebruiker.php?id=" . $row['user_id'] . "'><i class='material-icons'>chevron_right</i></a></td>";
                echo "</tr>";
                echo "</tr>";
            }
        };


        ?>
    </table>
</body>