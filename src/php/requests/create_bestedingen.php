
<?php
include "../../db/conn.php";
$id = $_GET["id"];
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
if (isset($_POST['opslaan'])) {
    $naam = $_POST["naam"];
    $type = $_POST["type"];
    $aantal = $_POST["aantal"];
    $prijs = $_POST["prijs"];

    $sql = "INSERT INTO `bestedingen` (`naam`,`type`,`aantal`,`prijs`) VALUES ('$naam','$type','$aantal','$prijs')";

    if (!mysqli_query($link, $sql)) {
        echo mysqli_error($link);
    } else {
        mysqli_close($link);
        header("location:../beheerder/view_taak.php?id=" . $id);
    }
}
?> 
