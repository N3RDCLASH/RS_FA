<?php
include "../../db/conn.php";

$id = $_GET['id'];

$query = "SELECT * FROM projecten where project_id = " . $id;
if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $project = [
            "naam" => $row{
                'naam'},
            "omschrijving" => $row{
                'omschrijving'},
            "type" => $row{
                'type'},
            "datum_start" => $row{
                'datum_start'},
            "datum_eind" => $row{
                'datum_eind'},
            "status" => $row{
                'status'}
        ];
    }
    die(json_encode($project));
}
