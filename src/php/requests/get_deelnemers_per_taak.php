<?php
include "../../db/conn.php";

$id = $_GET['id'];

$query = "SELECT `deelnemers_id` FROM `deelnemers_per_taak` WHERE `taak_id` = " . $id;
$y=[];

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
