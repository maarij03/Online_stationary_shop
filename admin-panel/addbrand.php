<?php 
include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }

if (isset($_POST['submit'])) 
{
   $brand_name = $_POST['brandname'];
   $img_name  = $_FILES['img']['tmp_name'];
   $image = addslashes(file_get_contents($img_name));

   $query = "INSERT INTO `brands` ( `brand_name`, `brand_logo`) VALUES ('$brand_name', '$image')";
   $result = mysqli_query($conn,$query);

   if ($result) {
    echo "<script>alert ('inserted');</script>";
    header('location:brand.php');
   }
}
include 'header.php';

?>

<div class="container" style="margin-top: 100px;">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brandname" >
  </div>
  <div class="form-group">
            <label for="pro_code">Product Category</label>
            <select name="pro_category">
            <?php
            $result=mysqli_query($conn,"Select * from category where category_status ='active'");
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
  <label for="exampleFormControlTextarea1">Brand Logo</label>
   <input type="file" class="form-control" id="exampleFormControlTextarea1" name="img">
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>