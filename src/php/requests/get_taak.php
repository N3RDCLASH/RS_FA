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
        //         $taak = [
        //             'el' => '<li>
        //     <div class="collapsible-header"><i class="material-icons">filter_drama</i>' . $row['naam'] . '</div>
        //     <div class="collapsible-body"><span>' . $row['omschrijving'] . '.</span></div>
        // </li>'
        //         ];     


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
            // "status" => $row{
            //     'status'}
        ];
        // print_r($taak);
    }
    die(json_encode($taak));
} else {
    die('geen taak beschikbaaar');
}
