<?php

$naam =$_POST["naam"];
$omschrijving =$_POST["omschrijving"];
$type=$_POST=["type"];
$begindatum= $_POST["begin_datum"];
$einddatum= $_POST["eind_datum"];

if(isset($_POST['done']))
{
    $sql = "INSERT INTO `projecten` (`naam`,`omschrijving`,`type`,`datum_start`,`datum_eind`) VALUES ('$naam','$omschrijving','$type','$begindatum','$einddatum')";

    if (!mysqli_query($link,$sql)){
        echo mysqli_error($link);
    };
}
?>