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
                'omschrijving'}
            // "status" => $row{
            //     'status'}
        ];
        // print_r($taak);
    }
    mysqli_close($link);
    die(json_encode($taak));
} else {
    die(json_encode('geen taak beschikbaaar'));
}

$query = "SELECT `deelnemers_id` FROM `deelnemers_per_taak` WHERE `taak_id` = " . $id;
$y = [];

if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $deelnemer[] = $row['deelnemers_id'];
    }
    foreach ($deelnemer as $x) {
        $query = 'SELECT `deelnemers_naam` FROM `deelnemers` WHERE `deelnemers_id`=' . $x;
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($y, $row['deelnemers_naam']);
            }
        }
    }
    die(json_encode($y));
    mysqli_close($link);
} else {
    die(json_encode("geen deelnemers gevonden"));
}
