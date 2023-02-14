<?php
session_start();
if(isset($_POST['pid']) && isset($_POST['quan']))
{

    $quan = $_POST['quan'];
    $pid = $_POST['pid'];

    if(in_array($pid,$_SESSION['cart']))
    {
        $index = array_search($pid, $_SESSION['cart']);
        $_SESSION['qty'][$index] = $quan;
        echo "Quantity Updated";
        //print_r($_SESSION['qty']);
        // $_SESSION['msg']="Already Added";
        // header('location:shop.php');
    }
    else
    {
        array_push($_SESSION['cart'],$pid);
        array_push($_SESSION['qty'],$quan);
        echo "Product Added";
        //print_r($_SESSION['qty']);
        // $_SESSION['msg']="";
        // header('location:shop.php');
    }
}
if(isset($_POST['pid']) && isset($_POST['get']))
{

    //echo "get";
    $get = $_POST['get'];
    $pid = $_POST['pid'];
    if(in_array($pid,$_SESSION['cart']))
    {
        $index = array_search($pid, $_SESSION['cart']);
        echo $_SESSION['qty'][$index];
        // echo "Quantity Updated";
        // $_SESSION['msg']="Already Added";
        // header('location:shop.php');
    }
    else
    {
        // array_push($_SESSION['cart'],$pid);
        // array_push($_SESSION['qty'],$quan);
        echo '1';
        // $_SESSION['msg']="";
        // header('location:shop.php');
    }
}
?>