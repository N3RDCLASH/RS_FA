<?php
$host = "remotemysql.com";
$user = "Bq9P4zfMp9";
$pass = "rBdbks98ib";
$db = "Bq9P4zfMp9";

try {
    $link = mysqli_connect($host, $user, $pass, $db);
} catch (\Throwable $th) {
    throw $th;
    echo mysqli_error($link);
}
?>