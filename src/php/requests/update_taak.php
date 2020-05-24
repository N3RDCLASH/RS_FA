<?php
include '../../db/conn.php';
echo $_POST['opslaan'];

function executeQuery($link, $query)
{
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../beheerder/view_taak.php?id=$id");
    } else {
        die($link->error);
    }
}


if (isset($_POST['opslaan'])) {
    // var_dump($_POST);
    // var_dump($_GET);
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    $taak_naam = mysqli_real_escape_string($link, $_POST["deelnemers_naam"]);
    $taak_type = mysqli_real_escape_string($link, $_POST["deelnemers_type"]);
    $taak_email = mysqli_real_escape_string($link, $_POST["deelnemers_email"]);
    $taak_adres = mysqli_real_escape_string($link, $_POST["deelnemers_adres"]);
    $taak_telefoonnummer = mysqli_real_escape_string($link, $_POST["deelnemers_telefoonnummer"]);

    $query =
        "UPDATE `deelnemers`
        SET
          `deelnemers_naam` = '$taak_naam',
          `deelnemers_email` = '$taak_email',
          `deelnemers_type` = '$taak_type',
          `deelnemers_adres` = '$taak_adres',
          `deelnemers_telefoonnummer` = '$taak_telefoonnummer'
        WHERE
            deelnemers_id = '$id'; 
 ";
    executeQuery($link, $query);
} else {
    echo "post var not set";
}
