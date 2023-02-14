<?php 

include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }

  else 
  {
    if (isset($_POST['submit'])) 
{
   $cat_name = $_POST['catname'];
   $img_name = $_FILES['catimg']['tmp_name'];
   $image = addslashes(file_get_contents($img_name));
   $cat_des = $_POST['catdes'];
  
   $query = "INSERT INTO `category` ( `cat_name`,`cat_img`, `cat_des`) VALUES ('$cat_name', '$image' ,'$cat_des') ";
   $result = mysqli_query($conn,$query);
   if ($result)
   {
   
  }
   if ($result) {
    header('location: categories.php');
   }

}
  }

include 'header.php';

?>

<div class="container" style="margin-top: 100px;">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control text-white" id="exampleInputEmail1" name="catname" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category Image</label>
    <input type="file" class="form-control text-white" id="exampleInputEmail1" name="catimg" >
    
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Category Description</label>
    <textarea class="form-control text-white" id="exampleFormControlTextarea1" rows="3" name="catdes"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>