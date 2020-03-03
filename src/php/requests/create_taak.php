<?php
require '../../db/conn.php';

if ($project_id = mysqli_real_escape_string($link, $_GET['id'])) {

    $naam = mysqli_real_escape_string($link, $_POST['taak_naam']);
    $omschrijving = mysqli_real_escape_string($link, $_POST['taak_omschrijving']);
    $type = mysqli_real_escape_string($link, $_POST['type_taak']);
    $verantwoordelijke = [];
    foreach ($_POST['taak_verantwoordelijke'] as $x) {
        $verantwoordelijke[] = mysqli_real_escape_string($link, $x);
    };
    $aantal = isset($_POST['taak_aantal']) ? mysqli_real_escape_string($link, $_POST['taak_aantal']) : null;
    $$prijs = isset($_POST['taak_prijs'])  ? mysqli_real_escape_string($link, $_POST['taak_prijs'])  : null;



    // $query = INSERT INTO `taken`(`project_id`, `taak_type`, `naam`, `omschrijving`, `aantal`, `prijs`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7]);
    // var_dump($_POST);
    $stmt = mysqli_stmt_init($link);

    if ($stmt) {
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'iissii', $id, $type, $naam, $omschrijving, $aantal, $prijs);
        }
    } else {
        mysqli_error($link);
    }
}




// print_r($verantwoordelijke);
