<?php
session_start();

if (isset($_SESSION['user'])) {
    switch ($_SESSION['user']) {
        case 0:
            echo "redirect overal_user";
            // header('location:../overal_user/');
            break;
        case 1:
            echo "redirect administratie";
            header('location:../administratie/');
            break;
        case 2:
            echo "redirect financiele administratie 2";
            break;
    }
} else {
    session_destroy();
    header('location:./src/php/login/login.php');
    exit();
}
