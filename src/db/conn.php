<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "rs_test";

try {
    $link = mysqli_connect($host, $user, $pass, $db);
} catch (\Throwable $th) {
    throw $th;
    echo mysqli_error($link);
}
