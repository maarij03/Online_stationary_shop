<?php
include 'connection.php';
$id = $_GET['catid'];
$query = "select * from  `category` where cat_id = '$id'";
$c_result = mysqli_query($conn,$query);
$c_row = mysqli_fetch_array($c_result);


if (isset($_POST['sub'])) 
{
    
    $ct_name = $_POST['upcatname'];
    $img_name = $_FILES['upcatimg']['tmp_name'];
    $image = addslashes(file_get_contents($img_name));
    $ct_dsc  = $_POST['upcatdes'];
   


    $query = "UPDATE `category` SET `cat_name`='$ct_name', `cat_img` = '$image' , `cat_des`='$ct_dsc' WHERE `cat_id` = '$id'";
    $result = mysqli_query($conn,$query);

    if ($result) {
        header('location: categories.php');
    }

    }

    include 'header.php';

?>

<div class="container" style="margin-top: 100px;">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="upcatname"  value="<?php echo $c_row['cat_name'];?>">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="upcatimg"  value="<img src="data:image/jpg:base64,<?php echo base64_encode($c_row['cat_img']);?>"
    
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Category Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="upcatdes" value="<?php echo $c_row['cat_des'];?>"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>
</div>