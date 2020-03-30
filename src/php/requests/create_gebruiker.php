<?php
include '../../db/conn.php';
echo $_POST['opslaan'];
if (isset($_POST['opslaan'])) {
    $gebruikers_naam = mysqli_real_escape_string($link, $_POST["gebruiker_naam"]);
    $gebruikers_type = mysqli_real_escape_string($link, $_POST["gebruiker_type"]);
    $gebruikers_password1 = mysqli_real_escape_string($link, $_POST["gebruikers_password1"]);
    $gebruikers_password2 = mysqli_real_escape_string($link, $_POST["gebruikers_password2"]);
    if ($gebruikers_password1 == $gebruikers_password2) {
        echo $gebruikers_password1, $gebruikers_password2;
        // die();
        $gebruiker_password = password_hash($gebruikers_password1, PASSWORD_BCRYPT);
        $query = "INSERT INTO `user`(`user_type`, `user_name`, `user_password`) VALUES('$gebruikers_type','$gebruikers_naam','$gebruikers_password')";
        if (mysqli_query($link, $query) === TRUE) {
            mysqli_close($link);
            header("location:../beheerder/gebruikers.php");
        } else {
            die($link->error);
        }
    } else {
        echo "passwords do not match";
    }
}else{
    echo "post var not set";
}
