<!-- header script -->
<?php
include_once 'header.php';
?>


<div class="container-fluid">
  <div class="row d-flex justify-content-center mt-4">
    <div class="col-md-3"></div>
    <div class="col-md-6">


      <div style="color: #444;">
        <h1>Home Page</h1>
      </div>

      <?php
      // test array

      // $posts = array(
      //   array(
      //     "title" => "Post One",
      //     "content" => "Post one content",
      //     "author" => "John Doe"
      //   ),

      //   array(
      //     "title" => "Post two",
      //     "content" => "Post two content",
      //     "author" => "Janet Doe"
      //   )
      // )

      require_once "./includes/dbConnection.inc.php";
      require_once "./includes/functions.inc.php";

      $posts = get_all_posts($connection);

      ?>

      <!-- loop for all the posts -->
      <?php foreach ($posts as $post) : ?>

        <div class="card m-4" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title"><?= $post['title'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $post['author'] ?></h6>
            <p class="card-text"><?= $post['content'] ?></p>
            <?php
            if ($post['author'] === $_SESSION['username']) {
              echo '<a href="#" class="btn btn-danger btn-sm m-2">Delete</a>';
              echo '<a href="#" class="btn btn-primary btn-sm m-2">Update</a>';
            }
            ?>
          </div>
        </div>
      <?php endforeach; ?>

    </div>




    <div class="col-md-3"></div>
  </div>

</div>




<!-- footer script -->
<?php
include_once 'footer.php';
?>