<?php
include 'connection.php';
if(isset($_GET['pid']))
{
    $id = $_GET['pid'];

    $query = "UPDATE `product_details` SET `product_status`='deactive' WHERE `product_id`='$id'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:products.php');
    }else{
        echo "Error" .mysqli_error($conn);
    }
}
if(isset($_GET['bid']))
{
    $id = $_GET['bid'];

    $query = "UPDATE `brands` SET `brand_status`='deactive' WHERE `brand_id`='$id'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:brand.php');
    }else{
        echo "Error".mysqli_error($conn);
    }
}

if(isset($_GET['delcatid']))
{
    $id = $_GET['delcatid'];

    $query = "UPDATE `category` SET `category_status`='deactive' WHERE `cat_id`='$id'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:categories.php');
    }else{
        echo "Error".mysqli_error($conn);
    }
}

?>