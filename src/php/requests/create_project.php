<?php
include "../../db/conn.php";
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
if (isset($_POST['action'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $type = $_POST["type"];
    $begindatum = $_POST["begin_datum"];
    $einddatum =  $_POST["eind_datum"];

    $sql = "INSERT INTO `projecten` (`naam`,`omschrijving`,`type`,`datum_start`,`datum_eind`) VALUES ('$naam','$omschrijving','$type','$begindatum','$einddatum')";

    if (!mysqli_query($link, $sql)) {
        echo mysqli_error($link);
    };
    header("location:../administratie/overzichten.php");
}
