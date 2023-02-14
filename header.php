<?php
if(session_id()=="")
{
session_start();
}
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart']=array();
    $_SESSION['qty']=array();
    $_SESSION['msg']="";
}

include 'connection.php';
$query = "SELECT * FROM category WHERE `category_status` = 'active'";
$result = mysqli_query($conn,$query);
$b_query = "SELECT * FROM brands WHERE `brand_status` = 'active'";
$b_result = mysqli_query($conn,$b_query);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Merier - Fashion Bootstrap eCommerce Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.png">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/plugins/fancybox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

  

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
 
<!-- Vendors JS -->
<script src="./assets/js/vendor/modernizr-3.11.7.min.js"></script>
<script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="./assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="./assets/js/vendor/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

<!-- Ajax -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.green.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
</head>
<!-- <script>
  $( function() {
    $( "#dialog" ).dialog();
  } );
  </script> -->
<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->
        <header class="header-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="index.html">
                                <img class="logo-main" src="assets/images/logo.png" width="153" height="40" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-navigation">
                            <ul class="main-nav">
                                <li><a href="index.php">Home</a>

                                </li>
                                <li class="has-submenu position-static"><a href="allproducts.php">Shop</a>
                                
                                               
                                </li>
                                
                                <li class="has-submenu"><a href="about.php">About</a>
                                    <ul class="submenu-nav">
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu position-static"><a href="#">Pages</a>
                                    <ul class="submenu-nav-mega">
                                       
                                        <li><a href="" class="mega-title">Categories</a>
                                            <ul>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) 
                                                {
                                                    
                                               
                                                ?>
                                                <li><a href="shop.php?cid=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></a></li>
                                               
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="" class="mega-title">Brands</a>
                                            <ul>
                                                <?php
                                                while ($b_row = mysqli_fetch_assoc($b_result)) 
                                                {
                                                    
                            
                                                ?>
                                                <li><a href="shop.php?bid=<?php echo $b_row['brand_id'];?>"><?php echo $b_row['brand_name'];?></a></li>
                                                <?php
                                                }
                                                ?>
                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li>
                                <?php
                                if (isset($_SESSION['username'])) { ?>

                                    <a href="logout.php">Logout</a>

                                <?php } else { ?>

                                    <a href="login.php">Login/Signup</a>

                                    <?php
                                } ?>
                                
                                
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-action">
                            <form class="header-search-box d-none d-md-block" action="search.php">
                                <input class="form-control" type="text" id="search" placeholder="Search" name="search">
                                <button type="submit" class="btn-src">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form><ul class="main-nav">
                            <?php
                                if (isset($_SESSION['username'])) { ?>
                            <li class="has-submenu position-static"><?php echo $_SESSION['username'] ?></li>
                            <?php
                                } ?>
</ul>

<?php
                                if (isset($_SESSION['userid'])) {
                                  $cartuser = $_SESSION['userid'];
                                  $cartquery = "select * from cart where user_id = '$cartuser'";
                                  $cartresult = mysqli_query($conn, $cartquery);
                                  $cartcount = mysqli_num_rows($cartresult);
                                ?>
                                &nbsp; &nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                                  <a href="view_cart.php" class="header-action-cart"> <?php if (isset($_SESSION['userid'])) { echo $cartcount; } ?>
                                <span class="cart-icon">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 8H12V5H15V3H12V0H10V3H7V5H10V8ZM6 17C5.46957 17 4.96086 17.2107 4.58579 17.5858C4.21071 17.9609 4 18.4696 4 19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21C6.53043 21 7.03914 20.7893 7.41421 20.4142C7.78929 20.0391 8 19.5304 8 19C8 18.4696 7.78929 17.9609 7.41421 17.5858C7.03914 17.2107 6.53043 17 6 17ZM16 17C15.4696 17 14.9609 17.2107 14.5858 17.5858C14.2107 17.9609 14 18.4696 14 19C14 19.5304 14.2107 20.0391 14.5858 20.4142C14.9609 20.7893 15.4696 21 16 21C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19C18 18.4696 17.7893 17.9609 17.4142 17.5858C17.0391 17.2107 16.5304 17 16 17ZM6.17 13.75L6.2 13.63L7.1 12H14.55C15.3 12 15.96 11.59 16.3 10.97L20.16 3.96L18.42 3H18.41L17.31 5L14.55 10H7.53L7.4 9.73L5.16 5L4.21 3L3.27 1H0V3H2L5.6 10.59L4.25 13.04C4.09 13.32 4 13.65 4 14C4 14.5304 4.21071 15.0391 4.58579 15.4142C4.96086 15.7893 5.46957 16 6 16H18V14H6.42C6.29 14 6.17 13.89 6.17 13.75Z" />
                                    </svg>
                                </span>
                            </a>
                                  <?php
                                }
                     
                                
                                 ?>
                                
                                
                                
                        
                          
                            <button class="btn-search-menu d-md-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                                <span class="search-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z" />
                                    </svg>
                                </span>
                            </button>
                            <button class="btn-menu d-lg-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--== End Header Wrapper ==-->