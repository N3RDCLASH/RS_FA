<?php
// require '../../../db/conn.php';

$query = 'SELECT status, COUNT(project_id) FROM projecten GROUP BY status';

$stmt = mysqli_stmt_init($link);
$result= [];
if ($stmt) {
    if (mysqli_stmt_prepare($stmt, $query)) {

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $status, $aantal);
            while (mysqli_stmt_fetch($stmt)) {
                $result[] = [
                    "status" => $status,
                    "aantal" => $aantal
                ];
            }
            return $result;
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
} else {
    mysqli_error($link);
}
