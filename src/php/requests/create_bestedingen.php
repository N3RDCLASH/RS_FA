
<?php
include "../../db/conn.php";
$id = $_GET["id"];
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
// if (isset($_POST['save'])) {
$taken_id = mysqli_real_escape_string($link, $_GET['id']);
$naam = $_POST["besteding_naam"];
$type = $_POST["besteding_type"];
$aantal = $_POST["besteding_aantal"];
$prijs = $_POST["besteding_prijs"];
$kwitantie_link = $_POST["kwitantie_link"];

$sql = "INSERT INTO `bestedingen` (`taak_id`,`naam`,`type`,`aantal`,`prijs`) VALUES ('$taken_id','$naam','$type','$aantal','$prijs')";
$stmt = mysqli_stmt_init($link);
echo $taken_id;

if (!mysqli_query($link, $sql)) {
    echo mysqli_error($link);
} else {
    $besteding_id = mysqli_insert_id($link);
    $sql2 = "INSERT INTO `kwitantie`(`besteding_id`, `kwitantie_titel`,`kwitantie_prijs`, `kwitantie_file`) VALUES ('$besteding_id','$naam','$prijs','$kwitantie_link')";
    if (mysqli_query($link, $sql2)) {
        mysqli_close($link);
        header("location:../beheerder/view_taak.php?id=" . $id);
    } else {
        echo mysqli_error($link);
    }
}
// }
?> 
