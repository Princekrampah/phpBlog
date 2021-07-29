<?php

// the submit part is due to the submit button name
if (isset($_POST['submit'])) {
    $username         = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email            = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password         = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);

    require_once "dbConnection.inc.php";
    require_once "functions.inc.php";

    if (emptyFields($username, $email, $password, $confirm_password)) {
        header("location: ../signup.php?error=emptyFields");
        exit();
    }
    // else if (invalidUsername($username)) {
    //     header("location: ../signup.php?error=InvalidUsername");
    //     exit();
    // } 
    else if (invalidEmail($email)) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    } else if (invalidPassword($password)) {
        header("location: ../signup.php?error=invalidPassword");
        exit();
    } else if (passwordUnmatch($password, $confirm_password)) {
        header("location: ../signup.php?error=UnmatchedPassword");
        exit();
    } else if (takenUsername($username, $email, $connection)) {
        header("location: ../signup.php?error=TakenUsernameOrEmail");
        exit();
    }

    createNewUser($username, $password, $email, $connection);
} else {
    header("location: ../signup.php");
    exit();
    // exit will stop the script from running
}
