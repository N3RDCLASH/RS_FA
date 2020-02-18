<?php

$query = 'SELECT * FROM `projecten` ';

$stmt = mysqli_stmt_init($link);

if (!mysqli_stmt_prepare($stmt, $query)) {
    echo mysqli_stmt_error($stmt);
} else {
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $type, $name, $_password);
    if (mysqli_stmt_fetch($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
}
