<?php
session_start();
include 'connection.php';

if (isset($_POST['cart'])) {
    if (isset($_SESSION['userid'])) {
        $pid = $_POST['p_id'];
        $user = $_SESSION['userid'];
        $qty = 1;
        $query = "INSERT INTO `cart`(`pro_id`, `qty`, `user_id`) VALUES ('$pid','$qty','$user')";
        $result = mysqli_query($conn, $query);
        echo $result;
    } else {
        echo "noadd";
    }
}



if (isset($_POST['Order'])) {

    $user=$_SESSION['userid'];
    $address = $_POST['o_add'];
    $total = $_POST['o_total'];
    $date = date("Y-m-d");
    $date2 = date("Y-m-d");    
    $cardno = $_POST['o_card'];
    $cardtype = $_POST['o_type'];
    $status = "On Hold";
    $ocode = 452145;
    
    $query = "INSERT INTO `orders`(`order_code`, `user_id`, `total`, `date_of_order`, `pay_type`, `credit_no`, `user_address`, `date_of_dispatch`, `status`) VALUES ('$ocode','$user','$total','$date','$cardtype', '$cardno','$address','$date2','$status')";
    $result = mysqli_query($conn, $query);

    $o_id = mysqli_insert_id($conn);
    if ($result) {
        $c_query = "SELECT * FROM `cart` WHERE `user_id`='$user'";
        $c_result = mysqli_query($conn, $c_query);
        if (mysqli_num_rows($c_result) > 0) {
            while ($c_row = mysqli_fetch_array($c_result)) {
                $pro_id = $c_row['pro_id'];
                $qty = $c_row['qty'];

                $pquery = "SELECT * FROM `product_details` WHERE `product_id`='$pro_id'";
                $presult = mysqli_query($conn, $pquery);
                $prow = mysqli_fetch_array($presult);

                $pro_name = $prow['product_name'];
                $pro_price = $prow['product_price'];

                $i_query = "INSERT INTO `invoice`(`order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`) VALUES ('$o_id','$pro_id','$pro_name','$pro_price','$qty')";
                $i_result = mysqli_query($conn, $i_query);
            }
            $b_result = "done";

            if ($b_result == "done") {
                $cd_query = "DELETE FROM `cart` WHERE `user_id`='$user'";
                $cd_result = mysqli_query($conn, $cd_query);
            }
        }
    }

    echo $result;
}

?>