<?php

$conn = mysqli_connect('localhost','root','','project');

if (!$conn) {
    echo 'error =>' . mysqli_connect_error() ;
}
?>