<?php
include "../../db/conn.php";

$id = $_GET['id'];
// $taak[] = [];

$query = "SELECT * FROM taken where project_id =" . $id;
if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $taak[] = [
            'taak_id' => $row['taak_id'],
            'project_id' => $row['project_id'],
            "naam" => $row{
                'naam'},
            "omschrijving" => $row{
                'omschrijving'},
            "type" => $row{
                'taak_type'},
            "aantal" => $row{
                'aantal'},
            "prijs" => $row{
                'prijs'},
        ];
    }
    mysqli_close($link);
    die(json_encode($taak));
} else {
    die('geen taak beschikbaaar');
}
