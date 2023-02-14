<?php
include 'connection.php';
$id=$_GET['uid'];
$query = "select * from  `product_details` where product_id = '$id'";
$p_result = mysqli_query($conn,$query);
$p_row = mysqli_fetch_array($p_result);



if (isset($_POST['sub'])) 
{
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

    $query = "UPDATE `product_details` SET `category_id`='$pro_cat' , `br_id`=' $pro_brand'  , `product_name`='$pro_name',`product_image`=' $image ' ,`product_price`='  $pro_price' ,`product_description`=' $pro_des ' ,`product_number`='  $pro_num ' ,`product_code`='  $pro_code ' ,`product_quantity`=' $pro_quan'  WHERE `product_id` = '$id'";
    $result = mysqli_query($conn,$query);
    if ($result) {
     header('location: products.php');
    }else{
        echo "Error: ".mysqli_error($conn);
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
            <input type="text" class="form-control" id="pro_name" name="pro_name" value="<?php echo $p_row['product_name'];?>">
        </div>
        <div class="form-group">
            <label for="pro_code">Product Category</label>
            <select name="pro_category">
            <?php
            $c_query = "select * from `category` where `category_status`='active'";
            $c_result = mysqli_query($conn,$c_query);
                while($c_row = mysqli_fetch_array($c_result))
                {
                    if($c_row['cat_id']==$p_row['category_id'])
                    {
                        ?>
                <option value="<?php echo $c_row['cat_id']; ?>" selected><?php echo $c_row['cat_name']; ?></option>
           
            <?php    
            }else{
                ?>
                <option value="<?php echo $c_row['cat_id']; ?>" ><?php echo $c_row['cat_name']; ?></option>
           
            <?php    
            }
        }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pro_code">Product Brand</label>
            <select name="pro_brand">
            <?php
            $b_result=mysqli_query($conn,"Select * from brands where brand_status='active'");
                while($b_row=mysqli_fetch_array($b_result))
                {
                    if($c_row['brand_id']==$b_row['br_id'])
                    {
                        ?>
                <option value="<?php echo $b_row['brand_id']; ?>" selected><?php echo $b_row['brand_name']; ?></option>
           
            <?php    
            }else{
                ?>
                <option value="<?php echo $b_row['brand_id']; ?>" ><?php echo $b_row['brand_name']; ?></option>
           
            <?php    
            }
        }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pro_img">Product image</label>
            <input type="file" class="form-control" id="pro_img" name="pro_img" value="<?php  echo base64_encode ($p_row['product_image']);?>">
        </div>
        <div class="form-group">
            <label for="pro_price">Product Price</label>
            <input type="number" class="form-control" id="pro_price" name="pro_price" value="<?php echo $p_row['product_price'];?>">
        </div>
        <div class="form-group">
            <label for="pro_desc">Product description</label>
            <textarea class="form-control" id="pro_desc" rows="5" name="pro_des" value="<?php echo $p_row['product_description'];?>"></textarea>
        </div>
        <div class="form-group">
            <label for="pro_num">Product number</label>
            <input type="number" class="form-control" id="pro_num" name="pro_num" value="<?php echo $p_row['product_number'];?>">
        </div>
        <div class="form-group">
            <label for="pro_code">Product code</label>
            <input type="text" class="form-control" id="pro_code" name="pro_code" value="<?php echo $p_row['product_code'];?>">
        </div>
        <div class="form-group">
            <label for="pro_quan">Product Quantity</label>
            <input type="number" class="form-control" id="pro_quan" name="pro_quan" value="<?php echo $p_row['product_quantity'];?>">
        </div>

        <button type="submit" class="btn btn-primary" name="sub">Submit</button>
    </form>
</div>