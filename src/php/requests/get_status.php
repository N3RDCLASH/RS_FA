<?php
include "../../db/conn.php";

$id = $_GET['id'];

$query = "SELECT status FROM projecten where project_id = " . $id;
if (!$result = mysqli_query($link, $query)) {
    echo mysqli_error($link);
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        die(json_encode(["status" => $row{
            "status"}]));
    }
}
