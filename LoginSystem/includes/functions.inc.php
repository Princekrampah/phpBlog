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

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
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



function authenticated($username, $password, $connection)
{
    $userdata = takenUsername($username, $username, $connection);

    if ($userdata === false) {
        header("location: ../login.php?error=InvalidUsername");
        exit();
    }


    if (password_verify($password, $userdata["password"])) {
        session_start();
        $_SESSION['user_id']  = $userdata['ID'];
        $_SESSION['username'] = $userdata['username'];
        header("location: ../index.php");
        exit();
    } else {
        header("location: ../login.php?error=invalidlogindata");
        exit();
    }
}


function create_new_post($title, $content, $user_id, $connection)
{
    $query = "INSERT INTO Post(title, content, author) VALUES(:title, :content, :user_id)";

    $statement = $connection->prepare($query);
    $statement->bindValue(":title", $title, PDO::PARAM_STR);
    $statement->bindValue(":content", $content, PDO::PARAM_STR);
    $statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);

    $statement->execute();

    header("location: ../index.php?msg=Success");
    exit();
}


function get_all_posts($connection)
{
    $query = "SELECT p.ID, u.username as author, u.email, p.title, p.content, p.date_posted FROM Post as p JOIN User as u ON p.author  = u.ID;";

    $statement = $connection->prepare($query);

    $statement->execute();

    $rows = $statement->fetchall(PDO::FETCH_ASSOC);
    return $rows;
}
