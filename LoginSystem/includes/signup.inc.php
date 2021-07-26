<?php

// the submit part is due to the submit button name
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    require_once "dbConnection.inc.php";
    require_once "functions.inc.php";

    if (emptyFields($username, $email, $password, $confirm_password)) {
        header("location: ../index.php?error=emptyFields");
        exit();
    // } else if (invalidUsername($username)) {
    //     header("location: ../index.php?error=InvalidUsername");
    //     exit();
    } else if (invalidEmail($email)) {
        header("location: ../index.php?error=invalidEmail");
        exit();
    } else if (invalidPassword($password)) {
        header("location: ../index.php?error=invalidPassword");
        exit();
    } else if (passwordUnmatch($password, $confirm_password)) {
        header("location: ../index.php?error=UnmatchedPassword");
        exit();
    } else if (takenUsername($username, $email, $connection)) {
        header("location: ../index.php?error=TakenUsernameOrEmail");
        exit();
    }

    createNewUser($username, $password, $email, $connection);
} else {
    header("location: ../index.php");
    exit();
    // exit will stop the script from running
}
