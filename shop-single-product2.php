<?php
include 'connection.php';
include 'header.php';
if(isset($_GET['prid']))
{
    $prid=$_GET['prid'];
    $p_query = "SELECT * FROM `product_details` p join category c on p.category_id = c.cat_id join brands b on p.br_id = b.brand_id where (p.product_status='active' || p.product_status='new') && p.product_id='$prid'";
}else{
    $p_query = "SELECT * FROM `product_details` p join category c on p.category_id = c.cat_id join brands b on p.br_id = b.brand_id where p.product_status='active'";
}

$p_result = mysqli_query($conn ,$p_query);

if (isset($_POST['sub'])) 
{
    $feedback = $_POST['feedback'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "INSERT INTO `review` ( `person_name`, `feedback`, `person_email`,`new_riviews`) VALUES ( '$name', '$feedback', '$email','new')";
    $result = mysqli_query($conn,$query);
   if ($result) {
    echo "<script>swal('Thanks For reviewing!');</script>";
   }
}

?>
<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area" data-bg-color="#F1FAEE">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="page-header-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                        </ol>
                        <h2 class="page-header-title">Best deal with best product.</h2>
                    </div>
                </div>
                <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                    <h5 class="showing-pagination-results">Product Detail</h5>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Details Area Wrapper ==-->
    <section class="product-detail-area section-space">
        <div class="container">
            <div class="row product-details">
                <?php 
            while ($p_row = mysqli_fetch_assoc($p_result)) 
            {
                
           
            ?>
                <div class="col-lg-7">
                    <div class="product-details-thumb me-lg-6">
                        <div class="swiper single-product-thumb-slider">

                            <!-- swiper pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper single-product-nav-slider">
                            <div class="swiper-wrapper">
                                <div class="nav-item swiper-slide">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($p_row['product_image']);?>"
                                        style="height: 350px !important; width: 350px !important; " alt="Image-HasTech">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-details-content">
                        <h3 class="product-details-title"><?php echo $p_row['product_name'];?></h3>
                        <div class="product-details-review">
                            <div class="product-review-icon">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <button type="button" class="product-review-show">156 reviews</button>
                        </div>
                        <p class="product-details-desc"><?php echo $p_row['product_description'];?></p>

                        <div class="product-details-pro-qty">
                            <h4>QTY :</h4>
                            <div class="pro-qty">
                                <input type="number" title="Quantity" value="1" min="1" max="100">
                            </div>
                        </div>
                        <div class="product-details-price">Rs <?php echo $p_row['product_price'];?> </div>
                        <div class="product-details-action">
                            <button class="product-action-btn btncart" value="<?php echo $p_row['product_id'];?>">Add to
                                cart</button>
                            <button type="button" class="product-action-wishlist" data-bs-toggle="modal"
                                data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
            <div class="row">
                <div class="col-lg-7">
                <div class="nav product-details-nav me-lg-6" id="product-details-nav-tab" role="tablist">
                        
                        <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                            type="button" role="tab" aria-controls="review" aria-selected="true">Review</button>
                    </div>
                    <?php 
                            $u_query = "SELECT * FROM `review` where `new_riviews` = 'new' order by person_id desc LIMIT 3 ";
                            $u_result = mysqli_query($conn,$u_query);
                            while ($u_row = mysqli_fetch_assoc($u_result)) 
                            {
                                
                        
                            ?>
                    
                    <div class="tab-content me-lg-6" id="product-details-nav-tabContent">
                      

                        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item">
                                <div class="product-review-top">
                                  
                                    <div class="product-review-content">
                                        <h4 class="product-reviewer-name"><?php echo $u_row['person_name'];?></h4>
                                        <h5 class="product-reviewer-designation"><?php echo $u_row['review_time'];?></h5>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc"><?php echo $u_row['feedback'];?>
                                </p>
                               
                            </div>
                            <!--== End Reviews Content Item ==-->


                          
                        </div>
                    </div>
                    <?php
            }
            ?>
                </div>
                <div class="col-lg-5">
                    <div class="product-reviews-form-wrap">
                        <h4 class="product-form-title">Leave a reply</h4>
                        <div class="product-reviews-form">
                            <form method="post">

                                <div class="form-input-item">
                                    <textarea class="form-control" placeholder="Enter you feedback"
                                        name="feedback" required></textarea>
                                </div>
                                <div class="form-input-item">
                                    <input class="form-control" type="text" placeholder="Full Name" name="name" required>
                                </div>
                                <div class="form-input-item">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email" required>
                                </div>

                                <div class="form-input-item mb-0">
                                    <button type="submit" class="btn" name="sub">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Details Area Wrapper ==-->

    <!--== Start Related Product Area Wrapper ==-->

    <!--== End Related Product Area Wrapper ==-->

    <!--== Start News Letter Area Wrapper ==-->
    <section class="news-letter-area section-bottom-space">
        <div class="container">
            <div class="newsletter-content-wrap" style="background:url('assets/images/blog/newsletter.jpg')">
                <div class="newsletter-content">
                    <h2 class="title">Connect with us | merier</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="newsletter-form">
                        <form>
                            <input type="email" class="form-control" placeholder="Email address">
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