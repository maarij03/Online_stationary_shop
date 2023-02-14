<?php

include 'connection.php';

$query = "SELECT * FROM `category` WHERE `category_status`= 'active'";
$result = mysqli_query($conn,$query);
$p_query = "SELECT * FROM `product_details` WHERE `product_status`= 'active'";
$p_result = mysqli_query($conn,$p_query);

?>
<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area">
    
    <!--== Start Footer Main ==-->
    <div class="footer-main">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-sm-12 col-md-3 col-lg-3 mb-6">
                    <div class="widget-item">
                        <div class="widget-about">
                            <a class="widget-logo" href="index.html">
                                <img src="assets/images/logo.png" alt="Logo" width="153" height="30">
                            </a>
                            <p class="desc">Merier Stationery is an online stationery store. It's a great place for
                                planner addict, bullet journal(Bujo) junkies, and stationery lover.</p>
                        </div>
                        <div class="widget-social">
                            <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/" target="_blank" rel="noopener"><i
                                    class="fa fa-linkedin"></i></a>
                            <a href="https://www.twitter.com/" target="_blank" rel="noopener"><i
                                    class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 offset-lg-1 mb-6">
                    <div class="widget-item">
                        <h4 class="widget-title">Ecommerce</h4>
                        <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                            data-bs-target="#widgetTitleId-1">Ecommerce</h4>
                        <div id="widgetTitleId-1" class="collapse widget-collapse-body">
                            <ul class="widget-nav">
                                <li><a href="allproducts.php">Products</a></li>
                                <?php
                                if (isset($_SESSION['username'])) { 
                                    ?>
                                <li><a href="view_cart.php">Your Cart</a></li>
                                <?php }?>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 offset-lg-1 mb-6">
                    <div class="widget-item">
                        <h4 class="widget-title">pages</h4>
                        <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                            data-bs-target="#widgetTitleId-2">Pages</h4>
                        <div id="widgetTitleId-2" class="collapse widget-collapse-body">
                            <ul class="widget-nav">
                            <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                               
                                <li><a href="allproducts.php">Products</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 offset-lg-1 mb-6">
                    <div class="widget-item">
                        <h4 class="widget-title">Products</h4>
                        <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                            data-bs-target="#widgetTitleId-3">Category</h4>
                        <div id="widgetTitleId-3" class="collapse widget-collapse-body">
                            <ul class="widget-nav">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                            
                                ?>
                                <li><a href="shop.php?cid=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Footer Main ==-->

    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
        <div class="container pt-0 pb-0">
            <div class="footer-bottom-content">
                <a href="allproducts.php"><img src="assets/images/blog/payment.jpg" alt="Image-HasTech"></a>
                <p class="copyright">© 2022 Merier. Made with <i class="fa fa-heart"></i> by <a target="_blank"
                        href="https://themeforest.net/user/codecarnival/portfolio">CodeMN.</a></p>
            </div>
        </div>
    </div>
    <!--== End Footer Bottom ==-->
</footer>
<!--== End Footer Area Wrapper ==-->

<!--== Scroll Top Button ==-->
<div class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

<!--== Start Product Quick View Modal ==-->
<aside class="product-cart-view-modal modal fade" id="action-QuickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-quick-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><span>×</span></button>
                    <div class="row row-gutter-0">
                       <?php 
                       while ($p_row = mysqli_fetch_assoc($p_result)) 
                       {
                       
                       ?>
                        <div class="col-lg-6">
                            <div class="single-product-slider">
                                <div class="single-product-thumb">
                                    <div class="swiper single-product-quick-view-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="thumb-item">
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($p_row['product_image']); ?>"  width="85" height="85">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content pt-3">
                                <h3 class="product-details-title"></h3>
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
                                <p class="product-details-desc"><?php echo $p_row['product_description']; ?> .</p>
                                <div class="product-details-color-list">
                                    <h4>Color:</h4>
                                    <div class="color-list-check">
                                        <input class="form-check-input bg-red" type="radio" name="flexRadioColorList"
                                            id="colorLista1">
                                        <label class="form-check-label" for="colorLista1">Red</label>
                                    </div>
                                    <div class="color-list-check">
                                        <input class="form-check-input bg-green" type="radio" name="flexRadioColorList"
                                            id="colorLista2" checked>
                                        <label class="form-check-label" for="colorLista2">Green</label>
                                    </div>
                                    <div class="color-list-check me-0">
                                        <input class="form-check-input bg-blue" type="radio" name="flexRadioColorList"
                                            id="colorLista3">
                                        <label class="form-check-label" for="colorLista3">Blue</label>
                                    </div>
                                </div>
                                <div class="product-details-pro-qty">
                                    <h4>QTY :</h4>
                                    <div class="pro-qty">
                                        <input type="text" title="Quantity" value="01">
                                    </div>
                                </div>
                                <div class="product-details-price"><?php echo $p_row['product_price']; ?> <span class="price-old">$650.00</span>
                                </div>
                                <div class="product-details-action">
                                    <button type="button" class="product-action-btn btncart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">Add to cart</button>
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
                        <!-- here it ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!--== End Product Quick View Modal ==-->

<!--== Start Product Quick Wishlist Modal ==-->
<!-- <aside class="product-action-modal modal fade" id="action-WishlistModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-action-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal-action-messages">
                        <i class="fa fa-check-square-o"></i> Added to wishlist successfully!
                    </div>
                    <div class="modal-action-product">
                        <div class="thumb">
                            <img src="assets/images/shop/modal1.jpg" alt="Organic Food Juice" width="466" height="320">
                        </div>
                        <h4 class="product-name"><a href="single-product.html">CRAS NEQUE METUS</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside> -->
<!--== End Product Quick Wishlist Modal ==-->

<!--== Start Product Quick Add Cart Modal ==-->
<aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form method="POST" id="frm1">
                <div class="modal-body">
                <div class="product-action-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <!-- <div class="modal-action-messages">
                        <i class="fa fa-check-square-o"></i> Added to cart successfully!
                    </div> -->
                    <div class="modal-action-product">
                        <div class="thumb">
                            <img src="assets/images/pics/bg-img.jpg" alt="Organic Food Juice" width="466" height="220">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="p_id" name="p_ids">
                        <label>Enter Quantity</label>
                        <input type="number" class="form-control" id="quan" name="quan"  placeholder="Enter Quantity">
                    </div>
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_save" class="btn btn-primary">Save changes</button>
                </div>
            </form>


            <!-- <div class="modal-body">
                <div class="product-action-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal-action-messages">
                        <i class="fa fa-check-square-o"></i> Added to cart successfully!
                    </div>
                    <div class="modal-action-product">
                        <div class="thumb">
                            <img src="" alt="Organic Food Juice" width="466" height="320">
                        </div>
                       
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</aside>
<!--== End Product Quick Add Cart Modal ==-->

<!--== Start Product Quick Add Cart Modal ==-->
<aside class="product-action-modal modal fade" id="action-CompareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-action-view-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="modal-action-messages">
                        <i class="fa fa-check-square-o"></i> Added to compare successfully!
                    </div>
                    <div class="modal-action-product">
                        <div class="thumb">
                            <img src="" alt="Organic Food Juice" width="466" height="320">
                        </div>
                        <h4 class="product-name"><a href="single-product.html">CRAS NEQUE METUS</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!--== End Product Quick Add Cart Modal ==-->

<!--== Start Sidebar Cart Menu ==-->
<aside class="sidebar-cart-modal offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
    id="offcanvasWithCartSidebar">
    <div class="offcanvas-header">
        <button type="button" class="btn-close cart-close" data-bs-dismiss="offcanvas" aria-label="Close">×</button>
    </div>
    <div class="sidebar-cart-inner offcanvas-body">
        <div class="sidebar-cart-content">
            <div class="sidebar-cart-all">
                <div class="cart-header">
                    <h3>Shopping Cart</h3>
                    <div class="close-style-wrap">
                        <span class="close-style close-style-width-1 cart-close"></span>
                    </div>
                </div>
                <div class="cart-content cart-content-padding">
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="shop-single-product.html"><img src="assets/images/shop/s1.jpg" alt="Image"
                                        width="70" height="67"></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="shop-single-product.html">Strapless Crop Top Gown</a></h4>
                                <span> 1 × <span class="price"> $12.00 </span></span>
                            </div>
                            <div class="cart-delete">
                                <a href="#/"><i class="pe-7s-trash icons"></i></a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="shop-single-product.html"><img src="assets/images/shop/s2.jpg" alt="Image"
                                        width="70" height="67"></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="shop-single-product.html">Short Lilac Ruffled Dress</a></h4>
                                <span> 1 × <span class="price"> $59.90 </span></span>
                            </div>
                            <div class="cart-delete">
                                <a href="#/"><i class="pe-7s-trash icons"></i></a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$71.90</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="cart-btn" href="shop-cart.html">view cart</a>
                        <a class="checkout-btn" href="shop-checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!--== End Sidebar Cart Menu ==-->

<!--== Start Aside Search Menu ==-->
<!-- <aside class="aside-search-box-wrapper offcanvas offcanvas-top" data-bs-scroll="true" tabindex="-1"
    id="AsideOffcanvasSearch">
    <div class="offcanvas-header">
        <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">×</button>
    </div>
    <div class="offcanvas-body">
        <div class="container pt--0 pb--0">
            <div class="search-box-form-wrap">
                <div class="search-note">
                    <p>Start typing and press Enter to search</p>
                </div>
                <form action="#" method="post">
                    <div class="search-form position-relative">
                        <label for="search-input" class="visually-hidden">Search</label>
                        <input id="search-input" type="search" class="form-control" placeholder="Search entire store…">
                        <button class="search-button" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</aside> -->
<!--== End Aside Search Menu ==-->

<!--== Start Side Menu ==-->
<aside class="aside-side-menu-wrapper off-canvas-area offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
    id="offcanvasWithBothOptions">
    <div class="offcanvas-header" data-bs-dismiss="offcanvas">
        <h5>Menu</h5>
        <button type="button" class="btn-close">×</button>
    </div>
    <div class="offcanvas-body">
        <!-- Start Mobile Menu Wrapper -->
        <div class="res-mobile-menu">
            <nav id="offcanvasNav" class="offcanvas-menu">
                <ul>
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="allproducts.php">Shop</a>
                    
                            </li>
                          
                            <li><a href="about.php">About</a>
                               
                            </li>

                    </li>
                   
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu Wrapper -->
    </div>
</aside>
<!--== Start Side Menu ==-->

</div>
<!--== Wrapper End ==-->

<!-- JS Vendor, Plugins & Activation Script Files -->


<!-- Plugins JS -->
<script src="./assets/js/plugins/swiper-bundle.min.js"></script>
<script src="./assets/js/plugins/fancybox.min.js"></script>
<script src="./assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Custom Main JS -->
<!-- <script src="./assets/js/main.js"></script> -->


<script>
        $(document).ready(function(){

        $(document).on('click', '.btncart', function() {
        var id = $(this).val();
        $.ajax({
          url: 'ajaxconfig.php',
          type: 'POST',
          data: {
            cart: 1,
            p_id: id,
          },
          success: function(response) {
            if (response) {

              if (response == "noadd") {
                window.location = "login.php";
              } else {

                swal("Great!", "Product Added in Cart!", "success").then(function(){ 
                location.reload();}
            );
              }

            } else {
              alert("Failed Please Try Again");
            }
          },
          error: function(err) {
            alert("Api Call Failed");
          },
        });
      });

  

    });
    </script>



</body>

</html>