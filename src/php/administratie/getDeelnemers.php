<?php 
$deelnemers_naam=$_POST["deelnemers_naam"];
$deelnemers_type=$_POST["deelnemers_type"];
$deelnemers_email=$_POST["deelnemers_email"];
$deelnemers_adres=$_POST["deelnemers_adres"];
$deelnemers_telefoonnummer=$_POST["deelnemers_telefoonnummer"];

$host = "localhost";
$user = "root";
$pass = "";
$db = "rs_fa";

try {
    $link = mysqli_connect($host, $user, $pass, $db);
} catch (\Throwable $th) {
    throw $th;
    echo mysqli_error($link);
}

$query= "INSERT INTO `deelnemers`(`deelnemers_type`, `deelnemers_naam`, `deelnemers_email`, `deelnemers_adres`, `deelnemers_telefoonnummer`) VALUES('$deelnemers_type','$deelnemers_naam','$deelnemers_email','$deelnemers_adres','$deelnemers_telefoonnummer')";

if ($link->query($query) === TRUE) {
    
   

    
    header("location:deelnemers.php");
} else { die($link->error);
}
