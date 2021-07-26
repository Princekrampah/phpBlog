<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <title>User input</title>
</head>

<body>
  <div class="container">
    <div class="col">
      <div class="row d-flex justify-content-center mt-4">
        <fieldset class="col-md-6">
          <form class="form" action="userRegistration.php" method="POST">
            <label for="username_id" class="form-label">Username</label>
            <input class="form-control mb-3" type="text" placeholder="Username" id="username_id" aria-label="default input example" name="username" />

            <label for="password_id" class="form-label">Paasword</label>
            <input class="form-control mb-3" type="password" placeholder="Password" id="password_id" aria-label="default input example" name="password" />

            <label for="email_id" class="form-label">Email</label>
            <input class="form-control mb-3" type="email" placeholder="Email" id="email_id" aria-label="default input example" name="email" />

            <input type="submit" class="btn btn-outline-info" />
          </form>
        </fieldset>
      </div>

      <div class="row d-flex justify-content-center mt-4">
        <?php

        // get connection
        require __DIR__ . "/db_connection.php";
        

        try {
          // userinputs
          $user_email = $_POST["email"];
          $username = $_POST['username'];
          $password = $_POST["password"];



          $query = "INSERT INTO User(username, email, password)
                                  VALUES" . "(:username, :email, :password)";


          $statement = $connection->prepare($query);
          

          // hash user password
          $hash = password_hash($password, PASSWORD_BCRYPT);

          $statement->bindValue(":username", $username, PDO::PARAM_STR);
          $statement->bindValue(":email", $user_email, PDO::PARAM_STR);
          $statement->bindValue(":password", $hash, PDO::PARAM_STR);
          $statement->execute();

        } catch (Exception $ex) {
          $error = $ex;
          echo $error;
          return false;
        }
        
        ?>


      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>