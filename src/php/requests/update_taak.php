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
    $taak_naam = mysqli_real_escape_string($link, $_POST["taak_naam"]);
    $taak_omschrijving = mysqli_real_escape_string($link, $_POST["taak_omschrijving"]);
    $taak_type = mysqli_real_escape_string($link, $_POST["type_taak"]);
    $taak_prijs = mysqli_real_escape_string($link, $_POST["taak_prijs"]);

    $query =
        "UPDATE `taken`
        SET
          `naam` = '$taak_naam',
          `omschrijving` = '$taak_omschrijving',
          `geschatteprijs` = '$taak_prijs',
          `taak_type` = '$taak_type'
        WHERE
            taak_id = '$id'; 
 ";
    executeQuery($link, $query);
} else {
    echo "post var not set";
}
