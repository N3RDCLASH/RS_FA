
<?php
include "../../db/conn.php";
$id = $_GET["id"];
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
if (isset($_POST['save'])) 
{
    $taken_id = mysqli_real_escape_string($link, $_GET['id']);
    $naam = $_POST["besteding_naam"];
    $type = $_POST["besteding_type"];
    $aantal=$_POST["besteding_aantal"];
    $prijs=$_POST["besteding_prijs"];

    $sql = "INSERT INTO `bestedingen` (`taak_id`,`naam`,`type`,`aantal`,`prijs`) VALUES ('$taken_id','$naam','$type','$aantal','$prijs')";

    $stmt = mysqli_stmt_init($link);
    echo $taken_id;
    
    if (!mysqli_query($link, $sql)) {
        echo mysqli_error($link);
    } else {
        mysqli_close($link);
        header("location:../beheerder/view_taak.php?id=" . $id);
    }
}
?> 
