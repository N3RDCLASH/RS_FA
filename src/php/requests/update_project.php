<?php
session_start();
include '../../db/conn.php';
echo $_POST['opslaan'];

function executeQuery($link, $query)
{
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../" . $_SESSION['role'] . "/view_project.php?id=$id");
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
    $switch = ((!empty($_POST['switch'])) ? mysqli_real_escape_string($link, $_POST["switch"]) : null);
    $role = ((!empty($_GET["rid"])) ? mysqli_real_escape_string($link, $_GET["rid"]) : null);
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
    $query2 =
        "UPDATE `projecten`
            SET
              `status`='$switch'
            WHERE
                project_id = '$id'; 
     ";



    ((isset($role)) ? executeQuery($link, $query2) : executeQuery($link, $query));
} else {
    echo "post var not set";
}
