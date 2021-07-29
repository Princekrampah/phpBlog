<!-- header script -->
<?php
include_once 'header.php';
?>

<?php
// start session
session_start();
?>

<div class="d-flex justify-content-center">
    <div class="card m-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo '<p class="text-muted" style="display:inline;">Username: </p>'.ucwords($_SESSION['username'])  ?>
            </h5>
        </div>
    </div>
</div>




<!-- footer script -->
<?php
include_once 'footer.php';
?>