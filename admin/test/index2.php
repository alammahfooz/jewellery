<?php
 session_start();

$_SESSION['name'] = 'ABC'  ;
$_SESSION['email'] = 'email@gmail.com' ;
 


session_destroy($_SESSION['name']);
 
 
print_r($_SESSION);
?>