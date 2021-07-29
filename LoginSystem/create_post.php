<!-- header script -->
<?php
include_once 'header.php';
?>


<!-- main content -->
<main class="container">
    <div class="row d-flex justify-content-center mt-4">
        <fieldset class="col-md-6">

            <div style="color: #444;">
                <h1>Create Post</h1>
            </div>

            <!-- change the action part -->
            <form class="form" action="includes/create_post.inc.php" method="POST">
                <label for="post_title" class="form-label">Post Title</label>
                <input class="form-control mb-3" type="text" placeholder="Post Title" id="post_title" aria-label="default input example" name="post_title" />

                <label for="post_content" class="form-label">Post Content</label>
                <textarea style="min-height:140px;" class="form-control mb-3" type="email" placeholder="Email" id="post_content" aria-label="default input example" name="post_content"> </textarea>

                <button type="submit" name="submit" class="btn btn-outline-info">Sign Up</button>
            </form>
        </fieldset>
    </div>
</main>


<!-- footer script -->
<?php
include_once 'footer.php';
?>