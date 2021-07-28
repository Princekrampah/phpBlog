<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'functions.inc.php';
    require_once 'dbConnection.inc.php';

    if (empty($username) || empty($password)) {
        header("location: ../login?error=invalidInput");
        exit();
    } else {
        authenticated($username, $password, $connection);
    }
} else {
    header("location: ../login.php?error=Redirected");
    exit();
}
