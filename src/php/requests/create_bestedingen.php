
<?php
include "../../db/conn.php";
$id = $_GET["id"];
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
if (isset($_POST['save'])) {
    $naam = $_POST["besteding_naam"];
    $type = $_POST["besteding_type"];
    $aantal=$_POST["besteding_aantal"];
    $prijs=$_POST["besteding_prijs"];

    $sql = "INSERT INTO `bestedingen` (`naam`,`type`,`aantal`,`prijs`) VALUES ('$naam','$type','$aantal','$prijs')";

    if (!mysqli_query($link, $sql)) {
        echo mysqli_error($link);
    };
    mysqli_close($link);
    header("location:../beheerder/view_taak.php");

    
}
?> 