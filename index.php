<?php
session_start();

if (isset($_SESSION['user'])) {
    header('location:src/php/administratie/home.php');
    exit();
    // echo 'already logged in';
    // echo $_SESSION['user'], $_SESSION['type'];

} else {
    session_destroy();
    header('location:./src/php/login/login.php');
    exit();
}
