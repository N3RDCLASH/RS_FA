<?php
include '../../db/conn.php';
echo $_POST['opslaan'];

function executeQuery($link, $query)
{
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../beheerder/view_project.php?id=$id");
    } else {
        die($link->error);
    }
}


if (isset($_POST['opslaan'])) {
    // var_dump($_POST);
    // var_dump($_GET);
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    $project_naam = mysqli_real_escape_string($link, $_POST["naam"]);
    $project_type = mysqli_real_escape_string($link, $_POST["type"]);
    $project_omschrijving = mysqli_real_escape_string($link, $_POST["omschrijving"]);
    $project_begin_datum = mysqli_real_escape_string($link, $_POST["begin_datum"]);
    $project_eind_datum = mysqli_real_escape_string($link, $_POST["eind_datum"]);
    $switch = mysqli_real_escape_string($link, $_POST["switch"]);
    ((isset($switch)) ? $switch = "closed" : $switch = "open");
    $query =
        "UPDATE `projecten`
        SET
          `project_id` = '$id',
          `naam` = '$project_naam',
          `omschrijving` = '$project_omschrijving',
          `type` = '$project_type',
          `datum_start` = '$project_begin_datum',
          `datum_eind` = '$project_eind_datum',
          `status`='$switch'
        WHERE
            project_id = '$id'; 
 ";
    executeQuery($link, $query);
} else {
    echo "post var not set";
}

// $sql="INSERT INTO `projecten` (`status`) VALUES ('$switch')";
