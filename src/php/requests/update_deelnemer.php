<?php
include '../../db/conn.php';
echo $_POST['opslaan'];

function executeQuery($link, $query)
{
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../beheerder/view_deelnemer.php?id=$id");
    } else {
        die($link->error);
    }
}


if (isset($_POST['opslaan'])) {
    // var_dump($_POST);
    // var_dump($_GET);
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    $deelnemer_naam = mysqli_real_escape_string($link, $_POST["deelnemers_naam"]);
    $deelnemer_type = mysqli_real_escape_string($link, $_POST["deelnemers_type"]);
    $deelnemer_email = mysqli_real_escape_string($link, $_POST["deelnemers_email"]);
    $deelnemer_adres = mysqli_real_escape_string($link, $_POST["deelnemers_adres"]);
    $deelnemer_telefoonnummer = mysqli_real_escape_string($link, $_POST["deelnemers_telefoonnummer"]);

    $query =
        "UPDATE `deelnemers`
        SET
          `deelnemers_naam` = '$deelnemer_naam',
          `deelnemers_email` = '$deelnemer_email',
          `deelnemers_type` = '$deelnemer_type',
          `deelnemers_adres` = '$deelnemer_adres',
          `deelnemers_telefoonnummer` = '$deelnemer_telefoonnummer'
        WHERE
            deelnemers_id = '$id'; 
 ";
    executeQuery($link, $query);
} else {
    echo "post var not set";
}
