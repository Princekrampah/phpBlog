<!-- header script -->
<?php
include_once 'header.php';
?>

<?php
// destroy session
if(isset($_SESSION['username'])){
    session_destroy();
    header("location:./logout.php");
    exit();
}
?>

<div class="d-flex justify-content-center">
    <div class="m-4 p-4">
        <a href="./login.php" class="btn btn-primary">Login Again</a>
    </div>
</div>


<!-- footer script -->
<?php
include_once 'footer.php';
?>