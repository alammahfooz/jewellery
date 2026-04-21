<?php 
session_start();

$_SESSION['user'] = 'john';
$_SESSION['role'] = 'Admin' ;

 unset($_SESSION['user']);
 
print_r($_SESSION);
echo "role";
?>
<br>

<?php echo "<h1>This is a Test</h1>" ?>