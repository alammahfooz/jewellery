<?php
date_default_timezone_set('Asia/Kolkata');
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ecommerce";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    echo 'error';
    
    die("Database connection failed: " . mysqli_connect_error());
}


// echo " Database connected successfully";
?>
