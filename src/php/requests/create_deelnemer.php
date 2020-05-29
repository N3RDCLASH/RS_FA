<?php
session_start();
include '../../db/conn.php';

if (isset($_POST['opslaan'])) {
    $deelnemers_naam = $_POST["deelnemers_naam"];
    $deelnemers_type = $_POST["deelnemers_type"];
    $deelnemers_email = $_POST["deelnemers_email"];
    $deelnemers_adres = $_POST["deelnemers_adres"];
    $deelnemers_telefoonnummer = $_POST["deelnemers_telefoonnummer"];
    $query = "INSERT INTO `deelnemers`(`deelnemers_type`, `deelnemers_naam`, `deelnemers_email`, `deelnemers_adres`, `deelnemers_telefoonnummer`) VALUES('$deelnemers_type','$deelnemers_naam','$deelnemers_email','$deelnemers_adres','$deelnemers_telefoonnummer')";

    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../" . $_SESSION['role'] . "/deelnemers.php");
    } else {
        die($link->error);
    }
}
