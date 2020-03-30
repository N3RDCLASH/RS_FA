<?php
include "../../db/conn.php";

$id = mysqli_real_escape_string($link, $_GET['id']);

$query = "SELECT * FROM user where user_id = " . $id;
if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $gebruiker = [
            "naam" => $row{
                'user_name'},
            "type" => $row{
                'user_type'}
        ];
    }
    mysqli_close($link);
    die(json_encode($gebruiker));
}
