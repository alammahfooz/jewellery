<?php
session_start();  
session_destroy();
 
include('layout/header.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="text-center text-success" style="margin: 100px;">
    <h1 style="color: #aa6c39; margin-top: 200px;">Thank You Your Order  Placed  <br>Successfully</h1>
    

</div>
</body>
</html>

<?php include('layout/footer.php'); ?>