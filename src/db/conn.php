<?php
$host = "remotemysql.com";
$user = "CU2tBzS9Zc";
$pass = "gSbL8MhLvl";
$db = "CU2tBzS9Zc";

try {
    $link = mysqli_connect($host, $user, $pass, $db);
} catch (\Throwable $th) {
    throw $th;
    echo mysqli_error($link);
}
