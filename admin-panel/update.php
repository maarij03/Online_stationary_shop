<?php
include 'connection.php';
$id = $_GET['upid'];
$query = "select * from  `brands` where brand_id = '$id'";
$b_result = mysqli_query($conn,$query);
$b_row = mysqli_fetch_array($b_result);
if (isset($_POST['sub'])) 
{
    
    $br_name=$_POST['upbrand'];
    $img_name  = $_FILES['upimg']['tmp_name'];
    $br_image = addslashes(file_get_contents($img_name));
    $imgb_name  = $_FILES['upbimg']['tmp_name'];
    $ubr_image = addslashes(file_get_contents($imgb_name));


    $b_query = "UPDATE `brands` SET `brand_name`='$br_name',`brand_img`='$ubr_image',`brand_logo`='$br_image' WHERE `brand_id` = '$id'";
    $result = mysqli_query($conn,$b_query);

    if ($result) {
        header('location: brand.php');
    }

    }

    include 'header.php';

?>

<div class="container" style="margin-top: 100px;">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="upbrand"  value="<?php echo $b_row['brand_name'];?>">
    
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Brand Image</label>
   <input type="file" class="form-control" id="exampleFormControlTextarea1" name="upbimg" value="<?php  echo base64_encode ($b_row['brand_logo']);?>">
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Brand Logo</label>
   <input type="file" class="form-control" id="exampleFormControlTextarea1" name="upimg" value="<?php  echo base64_encode ($b_row['brand_logo']);?>">
  </div>
 
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>
</div>