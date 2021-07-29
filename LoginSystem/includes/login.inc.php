<?php

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    require_once 'functions.inc.php';
    require_once 'dbConnection.inc.php';

    if (empty($username) || empty($password)) {
        header("location: ../login.php?error=invalidInput");
        exit();
    } else {
        authenticated($username, $password, $connection);
        echo "Login IN";
    }
} else {
    header("location: ../login.php?error=Redirected");
    exit();
}
