<?php
// echo 'test';
// if (isset($_POST['logout'])) {

session_start();
if (session_destroy()) {

    // session_destroy();
    echo 'success';
    header('location:../../../index.php');
}
// echo 'fail';
// }
