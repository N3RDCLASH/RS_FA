<?php
include '../../db/conn.php';

$id  = $_GET['id'];

$query = 'SELECT * FROM deelnemers WHERE deelnemers_id =' . $id;

if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $deelnemers[] = [
            'id' => $row['deelnemers_id'],
            'naam' => $row['deelnemers_naam'],
            'type' => $row['deelnemers_type'],
            'email' => $row['deelnemers_email'],
            'adres' => $row['deelnemers_adres'],
            'telefoon' => $row['deelnemers_telefoonnummer']
        ];
    }
    mysqli_close($link);

    die(json_encode($deelnemers));
}
