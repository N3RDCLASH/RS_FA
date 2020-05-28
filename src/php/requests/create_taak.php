<?php
require '../../db/conn.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $project_id = mysqli_real_escape_string($link, $_GET['id']);
    $naam = mysqli_real_escape_string($link, $_POST['taak_naam']);
    $omschrijving = mysqli_real_escape_string($link, $_POST['taak_omschrijving']);
    $type = mysqli_real_escape_string($link, $_POST['type_taak']);
    $verantwoordelijke = [];
    foreach ($_POST['taak_verantwoordelijke'] as $x) {
        $verantwoordelijke[] = mysqli_real_escape_string($link, $x);
    };
    $aantal = isset($_POST['taak_aantal']) ? mysqli_real_escape_string($link, $_POST['taak_aantal']) : null;
    $prijs = isset($_POST['taak_prijs'])  ? mysqli_real_escape_string($link, $_POST['taak_prijs'])  : null;



    $query = "INSERT INTO `taken`(`project_id`, `taak_type`, `naam`, `omschrijving`, `aantal`, `geschatteprijs`) 
    VALUES ('$project_id','$type','$naam','$omschrijving','$aantal','$prijs')";
    $query2 = "INSERT INTO `deelnemers_per_taak`(`deelnemers_id`, `taak_id`) VALUES (?,?)";

    // var_dump($_POST);
    $stmt = mysqli_stmt_init($link);
    echo $project_id;
    if ($stmt) {
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'iissii', $project_id, $type, $naam, $omschrijving, $aantal, $prijs);
            if (mysqli_stmt_execute($stmt)) {
                $taak_id = mysqli_stmt_insert_id($stmt);
                echo 'net voor die loop';
                foreach ($verantwoordelijke as $x) {
                    echo $x;
                    if (mysqli_stmt_prepare($stmt, $query2)) {
                        mysqli_stmt_bind_param($stmt, 'ii', $x, $taak_id);
                        if (mysqli_stmt_execute($stmt)) {
                        } else {
                            echo mysqli_error($link);
                        }
                    } else {
                        echo mysqli_error($link);
                    }
                }
                mysqli_stmt_close($stmt);
                die('Taak created succesfully');
            } else {
                echo mysqli_error($link);
            }
        } else {
            echo mysqli_error($link);
        }
    } else {
        echo mysqli_error($link);
    }
}




// print_r($verantwoordelijke);
