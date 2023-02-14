<?php
include 'connection.php';
session_start();

if (isset($_POST['cart'])) {
    $cid = $_POST['c_id'];
    $query = "DELETE from `cart` where `cart_id` = '$cid'";
    $result = mysqli_query($conn, $query);
    echo $result;
}

if (isset($_POST['CartUpdate'])) {
    $cid = $_POST['c_id'];
    $qty = $_POST['c_qty'];
    $query = "UPDATE `cart` SET `qty`='$qty' WHERE `cart_id`='$cid'";
    $result = mysqli_query($conn, $query);
    echo $result;
}


if (isset($_POST['ClearCart'])) {
    $user = $_SESSION['userid'];
    $query = "DELETE from cart where `user_id` = '$user'";
    $result = mysqli_query($conn, $query);
    echo $result;
}

?>