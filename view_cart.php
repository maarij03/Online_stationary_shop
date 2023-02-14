<?php
session_start();
include 'header.php';
include 'connection.php';
// $total=0;
// $p_query = "select * from product where p_id in (".implode(',',$_SESSION['cart']).")";
// $p_result = mysqli_query($conn,$p_query);
// $_SESSION['total']=$total;
?>
 
 <main class="main-content">

<!--== Start Page Header Area Wrapper ==-->
<section class="page-header-area" data-bg-color="#F1FAEE">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="page-header-content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                    <h2 class="page-header-title">Your Cart</h2>
                </div>
            </div>
            <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                <h5 class="showing-pagination-results">Cart Page</h5>
            </div>
        </div>
    </div>
</section>
<!--== End Page Header Area Wrapper ==-->

<!--== Start Cart Area Wrapper ==-->
<section class="cart-page-area section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table-wrap">
                    <div class="cart-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="width-thumbnail"></th>
                                    <th class="width-name">Product</th>
                                    <th class="width-price"> Price</th>
                                    <th class="width-quantity">Quantity</th>
                                    <th class="width-subtotal">Subtotal</th>
                                    <th class="width-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if (isset($_SESSION['userid'])) {
                                      $allcartuser = $_SESSION['userid'];
                                    
                                      $allcartquery = "select * from `cart` join `product_details` p on cart.pro_id=p.product_id where cart.user_id = '$allcartuser' ";
                                    
                                      $allcartresult = mysqli_query($conn, $allcartquery);
                                      $carttotal3 = 0;
                                      while ($allcartrow = mysqli_fetch_array($allcartresult)) {
                                        
                                ?>
                                <tr>
                                <td style="display: none;"><?php echo $allcartrow['cart_id']; ?></td>
                                    <td class="product-thumbnail">
                                        <a><img class="w-100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($allcartrow['product_image']); ?>" alt="Image" width="85" height="85"></a>
                                    </td>
                                    <td class="product-name">
                                        <h5><a href="#"><?php echo $allcartrow['product_name']; ?></a></h5>
                                    </td>
                                    <td class="product-price"><span class="amount"><?php echo $allcartrow['product_price']; ?></span></td>
                                    <td class="cart-quality">
                                        <div class="product-details-quality">
                                            <div class="pro-qty">
                                            <input type="hidden" name="<?php $allcartrow['qty']; ?>" value="<?php echo $allcartrow['qty']; ?>">
                                                <input type="number" title="Quantity" class="qty" name="qty<?php echo $allcartrow['qty']; ?>" value="<?php echo $allcartrow['qty']; ?>" min="1" max="1000000"/>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-total"><span><?php echo $allcartrow['product_price'] * $allcartrow['qty']; ?></span></td>
                                    <td class="product-remove"><button style="border: none" class="delete" value="<?php echo $allcartrow['cart_id']; ?>"><i class="fa fa-trash-o"></i></button></td>
                                </tr>

                                <?php
                                    $carttotal3 += $allcartrow['qty'] * $allcartrow['product_price'];
                                        }

                                    }else{ ?>
                                   
                                   <tr style="text-align: center">
                                   <td colspan=7>
                                   
                                   <div class="cart-shiping-btn continure-btn">
                                    <a class="btn btn-link" href="login.php" style="text-decoration: none"><i class="fa fa-angle-left"></i> Login Required</a>
                                    </div>
                                   </td>
                                   </tr>

                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-btn continure-btn">
                        <a class="btn btn-link" href="allproducts.php"><i class="fa fa-angle-left"></i> Back To Shop</a>
                    </div>

                    <div class="cart-shiping-btn update-btn">
                        <button class="btnclearcart btn btn-link" style="text-decoration: none" name="clear_cart" value="Clear Cart"><i class="fa fa-repeat"></i>Clear All Cart</button>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <div class="cart-calculate-discount-wrap mb-40">
                    <h4>Calculate shipping </h4>
                    
                    <div class="calculate-discount-content">
                    <form>
                        <div class="input-style">
                        <input type="text" placeholder="pakistan" id="country" readonly>
                        </div>
                        <div class="input-style">
                            <input type="text" placeholder="State / Country" id="state" required>
                        </div>
                        <div class="input-style">
                            <input type="text" placeholder="Town / City" id="city" required>
                        </div>
                        <div class="input-style mb-6">
                            <input type="text" placeholder="Postcode / ZIP" id="postal" required>
                        </div>
                        </form>
                    </div>
                   
                </div>
            </div>
            <!-- <div class="col-md-6 col-lg-4">
                <div class="cart-calculate-discount-wrap mb-40 mt-10 mt-md-0">
                    <h4>Coupon Discount </h4>
                    <div class="calculate-discount-content">
                        <p>Enter your coupon code if you have one.</p>
                        <div class="input-style mb-6">
                            <input type="text" placeholder="Coupon code">
                        </div>
                        <div class="calculate-discount-btn">
                            <a class="btn btn-link" href="#/">Apply Coupon</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 col-lg-4">
                <div class="grand-total-wrap mt-10 mt-lg-0">
                    <div class="grand-total-content">
                        
                        <div class="grand-shipping">
                            <span>Payment Type</span>
                           
                            <ul>
                                <li><input type="radio" name="payment" value="cod" checked="checked" required><label>Cash On Delivery</label></li>
                                <div id="cashondelivery" style="display: none ;">
                                <input type="hidden" id="cashond" value="Cash On Delivery" name="cashond">
</div>
                                <li><input type="radio" name="payment" value="paypal" checked="checked" required><label>PayPal</label></li>

                                <div id="paypal" style="display: none ;">
                                <br/>
                                <div class="input-style">
                                    <input type="text" id="paypalno" placeholder="****-****-****-****" name="paypalno" required/>
                                </div>                                                   
                                </div>

                                <li><input type="radio" name="payment" value="credit" checked="checked" required><label>Credit Card / debit card</label></li>
                                
                                <div id="creditcard" style="display: none ;">
                                <br/>
                                <div class="input-style">
                                    <input type="text" id="creditcardno" placeholder="****-****-****-****" name="creditcardno" required>
                                </div>                                                   
                                </div>
                            </ul>
                            
                        </div>
                        
                        <!-- <div class="shipping-country">
                            <p>Shipping to Pakistan</p>
                        </div> -->
                        <div class="grand-total">
                            <span id="carttotal3"><?php echo $carttotal3 ?></span>
                            <h4>Total <span><?php echo $carttotal3 ?></span></h4>
                        </div>
                    </div>
                    <div class="grand-total-btn">
                        <button class="btn btn-link" id="btnplaceorder" style="text-decoration:none;">Proceed to checkout</button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Cart Area Wrapper ==-->

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
<script>
        $(document).ready(function(){

        $(document).on('click', '.delete', function() {
            var id = $(this).val();
            $.ajax({
            url: 'ajaxdel.php',
            type: 'POST',
            data: {
                cart: 1,
                c_id: id,
            },
            success: function(response) {
                if (response) {

                if (response == "noadd") {
                    window.location = "login.php";
                } else {

                    swal("Great!", "Product has been removed from the cart", "success").then(function(){ 
                    location.reload();
                    }
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


      $(document).on('change', '.qty', function() {
      var row = $(this).closest('tr').find('td');
      var qty = $(this).val();
      
      var c_id = row['0'].innerText;
      $.ajax({
        url: 'ajaxdel.php',
        type: 'POST',
        data: {
            CartUpdate: 1,
          c_qty: qty,
          c_id: c_id,
        },
        success: function(response) {
          if (response) {
            location.reload();
          } else {
            alert("Failed");
          }
        },
        error: function(err) {
          alert("Api Call Failed");
        },
      });

    });


    $(document).on('click', '.btnclearcart', function() {
     
     $.ajax({
       url: 'ajaxdel.php',
       type: 'POST',
       data: {
        ClearCart: 1,
       },
       success: function(response) {
         if (response) {
           location.reload();
         } else {
           alert("Failed");
         }
       },
       error: function(err) {
         alert("Api Call Failed");
       },
     });
   });


   $('input:radio[name="payment"]').change(function() {
        if ($(this).val() == 'credit') {
          $('#creditcard').show();
        } else {
          $('#creditcard').hide();
        }
        if ($(this).val() == 'cod') {
            $('#cashondelivery').show();
            
        } else {
            $('#cashondelivery').hide();
        }
        if ($(this).val() == 'paypal') {
          $('#paypal').show();
        } else {
          $('#paypal').hide();
        }
      });


      $('#btnplaceorder').click(function() {
                
                var total = $('#carttotal3').html();
                var type = $("input[name='payment']:checked").val();
        
                var card = "";
                var cardtype = "";
                    if (type == "credit") {
                        card = $('#creditcardno').val();
                        cardtype = "Credit Card";
                    }
                    if (type == "cod") {
                        card = $('#cashond').val();
                        cardtype = "Cash On Delivery";
                    }
                    if (type == "paypal") {
                        card = $('#paypalno').val();
                        cardtype = "PayPal";
                    }
        
                var address1 = $('#country').val();
                var address2 = $('#state').val();
                var address3 = $('#city').val();
                var address4 = $('#postal').val();

                var compaddress = address1 + address1 + address3 + address4;
                
                $.ajax({
                    url: 'ajaxconfig.php',
                    type: 'POST',
                    data: {
                        Order: 1,
                        o_add: compaddress,
                        o_total: total,
                        o_card: card,
                        o_type: cardtype,
                    },
                    success: function(response) {
                        if (response) {
                            // alert(response);
                            window.location.replace("thanks.php");
                            // alert("Order Successfully");
                        } else {
                            alert("Failed");
                        }
                    },
                    error: function(err) {
                        alert("Api Call Failed");
                    },
        
                });
        
            });




    });
    </script>


</main>
    <?php
include 'footer.php';

?>