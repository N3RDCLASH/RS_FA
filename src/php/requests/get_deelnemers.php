<?php
include '../../db/conn.php';

// $id = $_GET['id'];

$query = 'SELECT * FROM deelnemers';

if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $deelnemers[] = [
            'naam' => $row['deelnemers_naam'],
            'id' => $row['deelnemers_id']
        ];
    }
    mysqli_close($link);

    die(json_encode($deelnemers));
}
