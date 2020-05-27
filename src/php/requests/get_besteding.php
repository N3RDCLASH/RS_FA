<?php
include "../../db/conn.php";

$id = $_GET['id'];
// $besteding[] = [];

$query = "SELECT bestedingen.`besteding_id`, `naam`, `type`, `aantal`, `prijs`, `kwitantie`.`kwitantie_file` FROM `bestedingen`, kwitantie WHERE kwitantie.besteding_id = bestedingen.besteding_id AND bestedingen.besteding_id =" . $id . " LIMIT 1";

if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $besteding[] = [
            // 'besteding_id' => $row['besteding_id'],
            'naam' => $row['naam'],
            'type' => $row['type'],
            'aantal' => $row['aantal'],
            'prijs' => $row['prijs'],
            'kwitantie' => $row['kwitantie_file'],
        ];
    }
    mysqli_close($link);
    die(json_encode($besteding));
} else {
    die(json_encode('geen besteding beschikbaaar'));
}
