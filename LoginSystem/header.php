<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login and Registration System</title>
</head>

<body>

    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">Logino</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php

                            session_start();

                            if (isset($_SESSION['username'])) {
                                echo  '<a class="nav-link" href="profile.php">Profile Page</a>';
                                echo  '<li class="nav-item"> <a class="nav-link" href="create_post.php">Creat Post Page</a> </li>';
                            } else {
                                echo  '<a class="nav-link" href="signup.php">Sign Up</a>';
                            }

                            ?>
                        </li>
                        <li class="nav-item">
                            <?php

                            if (isset($_SESSION['username'])) {
                                echo  '<a class="nav-link" href="logout.php">Logout</a>';
                            } else {
                                echo  '<a class="nav-link" href="login.php">Login</a>';
                            }

                            ?>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>