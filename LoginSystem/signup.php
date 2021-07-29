<!-- header script -->
<?php
include_once 'header.php';
?>

<!-- main content -->
<main class="container">
  <div class="row d-flex justify-content-center mt-4">
    <fieldset class="col-md-6">
      <!-- change the action part -->
      <form class="form" action="includes/signup.inc.php" method="POST">
        <label for="username_id" class="form-label">Username</label>
        <input class="form-control mb-3" type="text" placeholder="Username" id="username_id" aria-label="default input example" name="username" />

        <label for="email_id" class="form-label">Email</label>
        <input class="form-control mb-3" type="email" placeholder="Email" id="email_id" aria-label="default input example" name="email" />

        <label for="password_id" class="form-label">Password</label>
        <input class="form-control mb-3" type="password" placeholder="Password" id="password_id" aria-label="default input example" name="password" />

        <label for="password_repeat" class="form-label">Comfirm Pasword</label>
        <input class="form-control mb-3" type="password" placeholder="Password" id="password_repeat" aria-label="default input example" name="confirm_password" />


        <button type="submit" name="submit" class="btn btn-outline-info">Sign Up</button>
      </form>
    </fieldset>
  </div>
</main>

<!-- footer script -->
<?php
include_once 'footer.php';
?>
</body>

</html>