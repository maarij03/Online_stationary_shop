<?php

include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }
  if (isset($_SESSION['username']))
  {
  $query = "SELECT * FROM `orders` o join `user` u on o.user_id=u.user_id WHERE u.user_id = 15 ";
  }
  $p_query = "SELECT * FROM `product_details` p join category c on p.category_id = c.cat_id join brands b on p.br_id = b.brand_id where (p.product_status='active' || p.product_status='new') ";
        $p_result = mysqli_query($conn ,$p_query);
  include 'header.php';
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
                                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                                </ol>
                                <h2 class="page-header-title">Your products</h2>
                            </div>
                        </div>
                        <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                            <h5 class="showing-pagination-results">Wishlist Page</h5>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Wishlist Area Wrapper ==-->
            <section class="wishlist-page-area section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="wishlist-table-content">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="width-remove">product image</th>
                                                    <th class="width-thumbnail">product name</th>
                                                    <th class="width-name">Product price</th>
                                                    <th class="width-price"> status </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
            while ($p_row = mysqli_fetch_assoc($p_result)) 
            {
            ?>
                                                <tr>
                                                  
                                                    <td class="product-thumbnail">
                                                       <img src="data:image/jpg;base64,<?php echo base64_encode($p_row['product_image']);?>" width="300" height="286" alt="Image-HasTech">
                                                    </td>
                                                    <td class="product-name">
                                                    <h4 class="title"><a href="shop-single-product.php"><?php echo $p_row['product_name'];?></a></h4>
                                                    </td>
                                                    <td class="product-price">  <div class="price">Rs : <?php echo $p_row['product_price'];?></div></td>
                                                    <td class="stock-status">
                                                        <span><i class="fa fa-check"></i> Delivered</span>
                                                    </td>
                                                   
                                                </tr>
                                             <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Wishlist Area Wrapper ==-->

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
