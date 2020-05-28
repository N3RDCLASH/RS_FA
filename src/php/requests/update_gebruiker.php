<?php
session_start();
include '../../db/conn.php';
echo $_POST['opslaan'];

function executeQuery($link, $query)
{
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    if (mysqli_query($link, $query) === TRUE) {
        mysqli_close($link);
        header("location:../" . $_SESSION['role'] . "/view_gebruiker.php?id=$id");
    } else {
        die($link->error);
    }
}


if (isset($_POST['opslaan'])) {
    // var_dump($_POST);
    // var_dump($_GET);
    $id = mysqli_real_escape_string($link, $_GET["id"]);
    $gebruikers_naam = mysqli_real_escape_string($link, $_POST["gebruiker_naam"]);
    $gebruikers_type = mysqli_real_escape_string($link, $_POST["gebruiker_type"]);
    if (isset($_POST['change_pass'])) {
        $gebruikers_password1 = mysqli_real_escape_string($link, $_POST["gebruikers_password1"]);
        $gebruikers_password2 = mysqli_real_escape_string($link, $_POST["gebruikers_password2"]);
        if ($gebruikers_password1 == $gebruikers_password2) {
            echo $gebruikers_password1, $gebruikers_password2;
            $gebruikers_password = password_hash($gebruikers_password1, PASSWORD_BCRYPT);
            $query =
                "UPDATE 
            user
         SET
         user_type= '$gebruikers_type',
         user_name='$gebruikers_naam',
         user_password='$gebruikers_password'
         WHERE user_id = $id
         ";

            executeQuery($link, $query);
        } else {
            echo "passwords do not match";
        }
    } else {
        $query =
            "UPDATE 
 user
 SET
 user_type= '$gebruikers_type',
 user_name='$gebruikers_naam'
 WHERE 
    user_id = $id; 
 ";
        executeQuery($link, $query);
    }
} else {
    echo "post var not set";
}
