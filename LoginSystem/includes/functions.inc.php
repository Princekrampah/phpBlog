<?php

function emptyFields($username, $email, $password, $confirm_password)
{
    if (empty($username) ||  empty($email) || empty($password) || empty($confirm_password)) {
        return true;
    } else {
        return false;
    }
}

function invalidUsername($username)
{
    if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
        return true;
    } else {
        return false;
    }
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function invalidPassword($password)
{
    if (!strlen($password) >= 8) {
        return true;
    } else {
        return false;
    }
}

function passwordUnmatch($password, $confirm_password)
{
    if ($password !== $confirm_password) {
        return true;
    } else {
        return false;
    }
}

function takenUsername($username, $email, $connection)
{
    $query = "SELECT * FROM User WHERE username = :username OR email = :email;";

    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->bindValue(":email", $email, PDO::PARAM_STR);
    $statement->execute();

    if ($row = $statement->fetch()) {
        return $row;
    }

    return false;
}


function createNewUser($username, $password, $email, $connection)
{
    $query = "INSERT INTO User(username, email, password) VALUES(:username, :email, :password);";

    $statement = $connection->prepare($query);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->bindValue(":email", $email, PDO::PARAM_STR);
    $statement->bindValue(":password", $hashed_password, PDO::PARAM_STR);
    $statement->execute();

    header("location: ../login.php");
    exit();
}
