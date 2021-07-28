<!-- header script -->
<?php
include_once 'header.php';
?>

<!-- main content -->
<main class="container">
    <div class="row d-flex justify-content-center mt-4">
        <fieldset class="col-md-6">
            <!-- change the action part -->
            <form class="form" action="includes/login.inc.php" method="POST">
                <label for="username_id" class="form-label">Username</label>
                <input class="form-control mb-3" type="text" placeholder="Username" id="username_id" aria-label="default input example" name="username" />

                <label for="password_id" class="form-label">Paasword</label>
                <input class="form-control mb-3" type="password" placeholder="Password" id="password_id" aria-label="default input example" name="password" />

                <button type="submit" class="btn btn-outline-info">Login</button>
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