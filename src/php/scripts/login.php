<?php
require_once '../../db/conn.php';

if (isset($_POST['action'])) {
    $username = mysqli_real_escape_string($link, $_POST['user_name']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $query = 'SELECT `user_type`,`user_name`,`user_password` FROM `user` WHERE `user_name` = ? LIMIT 1';

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
            // echo $type;
            // echo $type, $name, $_password;
            if (password_verify($password, $_password)) {
                if ($type != null) {
                    session_start();
                    $_SESSION['user'] = $username;
                    $_SESSION['type'] = $type;
                    if ($_SESSION['user'] != null) {
                        echo 'welcome' . $_SESSION['user'];
                    }
                    if (isset($_POST['check'])) {
                        setcookie('username', $username, time() + 3600);
                    }
                    switch ($type) {
                        case 0:
                            echo "redirect overal_user";
                            break;
                        case 1:
                            echo "redirect administratie";
                            header('location:../administratie/');
                            break;
                        case 2:
                            echo "redirect financiele administratie 2";
                            break;
                    }
                }
            } else {
                echo 'passwords do not match!';
                // header('location:../../index.php');
            }
        } else {
            echo 'user does not exist!';
        }
    };
}
//TODO:implement error array to display to user;
//TODO:implement sessions & cookies 
