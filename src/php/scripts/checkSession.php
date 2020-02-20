<?php
if (isset($_SESSION['user'])) {
    // echo $_SESSION['user'], $_SESSION['type'];

} else {
    session_destroy();
    echo '2';
    header('location:../login/login.php');
    exit();
}
