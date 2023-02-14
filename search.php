<?php
include 'header.php';
include 'connection.php';
$sql = $_GET['search'];
$query = "SELECT * FROM `product_details` WHERE MATCH (product_name) against ('$sql') ";
$result = mysqli_query($conn,$query);
$search_result = mysqli_num_rows($result);

?>


<main class="main-content">

<!-- search results start here -->
    
<div class="jumbotron jumbotron-fluid mt-5">
 


   <!--== Start Product Area Wrapper ==-->
   <div class="container">
            <div class="row mb-n6 product-items-two">
   <?php
   
   if ($search_result  >  0 ) 
   {
    
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $p_name = $row['product_name'];
    
    
    ?>
    
    <div class="col-sm-6 col-lg-4 col-xl-3 mb-6" style="min-height:450px;">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                        <a class="product-thumb" href="shop-single-product.php">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($row['product_image']);?>" width="300" height="286" alt="Image-HasTech">
                        </a>
                        <span class="badges">New</span>
                        <div class="product-action">
                        <button class="product-action-btn btncart" value="<?php echo $row['product_id'];?>">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <h4 class="title"><a href="shop-single-product.php"><?php echo $p_name;?></a></h4>
                            <div class="price">Rs : <?php echo $row['product_price'];?></div>
                            <button type="button" class="info-btn-wishlist" data-bs-toggle="modal"
                                data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart-o"></i>
                            </button>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
   
 <?php
   }}
   else { ?>
    <h3 class="display-4" style="min-height:400px;">No Results Found For <em> <?php echo $_GET['search'];?> <em></h3>
  <?php
  
   }
   ?>
  
   
 
   </div>
</div>
   <!--== End Product Area Wrapper ==-->

    <!--== Start News Letter Area Wrapper ==-->
    <section class="news-letter-area section-bottom-space">
        <div class="container">
            <div class="newsletter-content-wrap" style="background:url('assets/images/blog/newsletter.jpg')">
                <div class="newsletter-content">
                    <h2 class="title">Connect with us | merier</h2>
                    <p>Get the latest digital printable planner of the month and the best deals delivered to your inbox!

</p>
                    <div class="newsletter-form">
                        <form>
                            <input type="email" class="form-control" placeholder="Email address" required>
                            <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End News Letter Area Wrapper ==-->

</main>


<?php
include 'footer.php';
?>