<?php

require_once "./dbConnection.inc.php";
require_once "./functions.inc.php";

// start session
session_start();

if (isset($_POST['submit'])) {

    if (isset($_SESSION['username'])) {
        $title = $_POST['post_title'];
        $content = $_POST['post_content'];

        if (empty($title) || empty($content)) {
            header("location: ../create_post.php?error=InvalidFields");
            exit();
        } else {
            // create session
            session_start();
            // get user id from the session
            $user_id = $_SESSION['user_id'];
            echo $user_id;
            // create the post
            create_new_post($title, $content, $user_id, $connection);
        }
    } else {
        header("location: ../create_post.php?error=NotAuthenticated");
        exit();
    }
} else {
    header("location: ../create_post.php?error=InvalidRequest");
    exit();
}
