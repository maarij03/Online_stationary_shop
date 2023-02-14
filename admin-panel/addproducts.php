<?php 
include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }

  else
  {
    if (isset($_POST['sub'])) 
  {
   // $pro_id = $_POST['pro_id']; 
    $pro_cat = $_POST['pro_category']; 
    $pro_brand = $_POST['pro_brand']; 
    $pro_name = $_POST['pro_name']; 
    $img_name  = $_FILES['pro_img']['tmp_name'];
    $image = addslashes(file_get_contents($img_name));
    $pro_price = $_POST['pro_price']; 
    $pro_des = $_POST['pro_des']; 
    $pro_num = $_POST['pro_num']; 
    $pro_code = $_POST['pro_code']; 
    $pro_quan = $_POST['pro_quan']; 

    $query = "INSERT INTO `product_details` (`product_name`, `product_image`, `product_price`, `product_description`, `product_code`, `product_number`, `product_quantity`, `category_id`, `br_id`, `product_status`) VALUES ( '$pro_name','$image','$pro_price','$pro_des','$pro_code','$pro_num','$pro_quan','$pro_cat','$pro_brand','new')";
    $result = mysqli_query($conn,$query);
    if ($result) {
     header('location: products.php');
    }else{
        echo "Error: ".mysqli_error($conn);
    }
  }

  }

include 'header.php';
?>

<div class="container" style="margin-top: 100px;">
    <form method="post" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label for="pro_id">Product Id</label>
            <input type="text" class="form-control" id="pro_id" name="pro_id">
        </div> -->
        <div class="form-group">
            <label for="pro_name">Product Name</label>
            <input type="text" class="form-control" id="pro_name" name="pro_name">
        </div>
        <div class="form-group">
            <label for="pro_code">Product Category</label>
            <select name="pro_category">
            <?php
            $result=mysqli_query($conn,"Select * from category where category_status !='deactive'");
                while($cat_row=mysqli_fetch_array($result))
                {
                    
            ?>
                <option value="<?php echo $cat_row['cat_id'];?>"><?php echo $cat_row['cat_name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pro_code">Product Brand</label>
            <select name="pro_brand">
            <?php
            $result=mysqli_query($conn,"Select * from brands where brand_status='active'");
                while($b_row=mysqli_fetch_array($result))
                {
                    
            ?>
                <option value="<?php echo $b_row['brand_id'];?>"><?php echo $b_row['brand_name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pro_img">Product image</label>
            <input type="file" class="form-control" id="pro_img" name="pro_img">
        </div>
        <div class="form-group">
            <label for="pro_price">Product Price</label>
            <input type="number" class="form-control" id="pro_price" name="pro_price">
        </div>
        <div class="form-group">
            <label for="pro_desc">Product description</label>
            <textarea class="form-control" id="pro_desc" rows="5" name="pro_des"></textarea>
        </div>
        <div class="form-group">
            <label for="pro_num">Product number</label>
            <input type="number" class="form-control" id="pro_num" name="pro_num">
        </div>
        <div class="form-group">
            <label for="pro_code">Product code</label>
            <input type="text" class="form-control" id="pro_code" name="pro_code">
        </div>
        <div class="form-group">
            <label for="pro_quan">Product Quantity</label>
            <input type="number" class="form-control" id="pro_quan" name="pro_quan">
        </div>

        <button type="submit" class="btn btn-primary" name="sub">Submit</button>
    </form>
</div>