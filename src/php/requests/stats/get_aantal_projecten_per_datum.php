<?php
include '../../../db/conn.php';

$query = "SELECT COUNT(`project_id`),CONVERT(`CreatedOn`,DATE) FROM `projecten` GROUP BY CreatedOn";

$result = [];
$stmt = mysqli_stmt_init($link);

if ($stmt) {
    if (mysqli_stmt_prepare($stmt, $query)) {
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $aantal, $datum);
            while (mysqli_stmt_fetch($stmt)) {
                $result[] = [
                    "aantal" => $aantal,
                    "datum" => $datum
                ];
            }
            mysqli_stmt_close($stmt);
            die(json_encode($result));
        } else {
            mysqli_error($link);
        }
    }
} else {
    mysqli_error($link);
}
