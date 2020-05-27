<?php
include '../../db/conn.php';
echo $_POST['save'];

function executeQuery($link, $query)
{
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../beheerder/kwitantie_modal.php?id=$id");
    } else {
        die($link->error);
    }
}


if (isset($_POST['opslaan'])) {
    // var_dump($_POST);
    // var_dump($_GET);
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    $naam = mysqli_real_escape_string($link, $_POST["kwitantie_naam"]);
    $kwitantie_type = mysqli_real_escape_string($link, $_POST["kwitantie_type"]);
    $kwitantie_aantal = mysqli_real_escape_string($link, $_POST["kwitantie_aantal"]);
    $kwitantie_prijs = mysqli_real_escape_string($link, $_POST["kwitantie_prijs"]);

    $query =
        "UPDATE `bestedingen`
        SET
          `naam` = '$naam',
          `type` = '$kwitantie_type',
          `aantal` = '$kwitantie_aantal',
          `prijs` = '$kwitantie_prijs',
          
        WHERE
            besteding_id = '$id'; 
 ";
    executeQuery($link, $query);
} else {
    echo "post var not set";
}
