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

      $posts = array(
        array(
          "title" => "Post One",
          "content" => "Post one content",
          "author" => "John Doe"
        ),

        array(
          "title" => "Post two",
          "content" => "Post two content",
          "author" => "Janet Doe"
        )
      )

      ?>

      <!-- loop for all the posts -->
      <?php foreach ($posts as $post) : ?>

        <div class="card m-4" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title"><?= $post['title'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $post['author'] ?></h6>
            <p class="card-text"><?= $post['content'] ?></p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
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