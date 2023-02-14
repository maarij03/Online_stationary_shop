<?php
$query = "SELECT * FROM category WHERE (`category_status` = 'active' || `category_status` = 'new' )";
$result = mysqli_query($conn,$query);

?>

    <div class="container" style="margin-top:120px;">
    <div class="section-title text-center">
    <h2 class="title mt-5">Categories</h2>
</div>
        <div class="owl-carousel owl-theme">
        <?php
    while ($ci_row = mysqli_fetch_assoc($result)) 
    {
        
    
    ?>
            <div class="item mt-5">
                <a href="shop.php?cid2=<?php echo $ci_row['cat_id'];?>"><img src="data:image/jpg;base64,<?php echo base64_encode($ci_row['cat_img']);?>"></a>
            </div>
           
            <?php
    }
    ?>

        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                items: 6,
                loop: true,
                margin: 30,
                nav: true,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })
    </script>
