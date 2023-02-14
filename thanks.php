
<?php
include 'connection.php';
include 'header.php';

?>
<div class="container" style="margin-top:100px;">
<div class="jumbotron">
  <h2 class="display-4">Hello, <?php echo $_SESSION['username'] ?>!</h2>
  <p class="lead">Thanks for ordering .</p>
  <hr class="my-4">
  <p>Your Order will be soon reached to you.</p>
  <p class="lead">
  <a class="btn btn-link" href="allproducts.php"><i class="fa fa-angle-left"></i> Back To Shop</a>
  </p>
</div>
</div>
<?php
    include 'footer.php';
?>
