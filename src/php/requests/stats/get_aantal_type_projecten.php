<?php
include '../../../db/conn.php';
$query =
    "SELECT COUNT(projecten.project_id),project_type.type_name 
FROM projecten 
INNER JOIN `project_type`
ON projecten.type = project_type.type_id 
GROUP BY `projecten`.`type` ";
$result = [];
$stmt = mysqli_stmt_init($link);

if ($stmt) {
    if (mysqli_stmt_prepare($stmt, $query)) {
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $aantal, $type);
            while (mysqli_stmt_fetch($stmt)) {
                $result[] = [
                    "aantal" => $aantal,
                    "type" => $type
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
