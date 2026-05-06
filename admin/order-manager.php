 <?php
    include('layout/header.php');
    date_default_timezone_set('Asia/Kolkata');

 
    // DELETE ITEM
   if (isset($_GET['act']) && $_GET['act'] == 'del') {
    $id = (int)$_GET['id'];
    $del_query = "DELETE FROM `order_items` WHERE order_id=$id ";
        echo "<script>
        window.location.href = 'order-manager.php?done=1';
    </script>";
   
    if(mysqli_query($conn, $del_query)){
        header("Location: order-manager.php?msg=deleted");
        exit();
        };
    }

    // CHANGE STATUS
    if (isset($_GET['act']) && $_GET['act'] == 'cstatus' && isset($_GET['id']) && isset($_GET['status'])) {

        $id = (int)$_GET['id'];
        $status = mysqli_real_escape_string($conn, $_GET['status']);

        $update_order = "UPDATE `order_items`  SET `status` = '$status' WHERE `id` = $id";
        if (mysqli_query($conn, $update_order)) {
            header("Location: order_manager.php");
            exit();
        }
    }

    // FETCH DATA WITH JOIN
    $query = mysqli_query($conn, "SELECT order_items.order_id, orders.fname, orders.lname, orders.total_price, order_items.date, order_items.order_status ,order_items.product_price, order_items.qty, order_items.product_price  FROM order_items JOIN orders ON orders.id = order_items.order_id
");
    $date = time();

    
    ?>

    

 <body>
     <main class="nxl-container ">
         <div class="nxl-content">
             <div class="main-content p-0 m-2">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card stretch stretch-full">
                             <div class="card-body">
                                <?php if(isset($_GET['done'])){ ?>
    <p id="successMsg" class="text-success">Item deleted successfully</p>

    <script>
        setTimeout(function(){
            document.getElementById("successMsg").style.display = "none";
        }, 2000);
    </script>
<?php } ?>
                                 <div class="table-responsive mb-5">
                                     <table class="table table-bordered table-striped">
                                         <thead>
                                             <tr>

                                                 <th>Order ID</th>
                                                 <th>Customer Name</th>
                                                 <th>Order Date</th>
                                                 <th>Order Status</th>
                                                 <th>Price</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                                // $order_id = $_GET['order_id'];
                                                // $sql = "SELECT * FROM `order_items` WHERE id = $order_id;";
                                             
                                                $sql = "SELECT * FROM `order_items`";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                     <tr>
                                                         <td>
                                                             <a href="order_detail.php?id=<?= $row['order_id']; ?>">
                                                                 <?= $row['order_id']; ?>
                                                             </a>
                                                         </td>

                                                         <td> <?php echo $row['fname'] . " " . $row['lname']; ?> </td>
                                                         <td> <?php echo date('d M Y', $row['date']); ?> </td>
                                                         <td> <?php echo $row['order_status']; ?> </td>
                                                         <td> <?php echo $row['total_price']; ?> </td>

                                                    <td>
                                                        <a class="btn btn-danger" 
                                                        onclick="return confirm('Are you sure?')" 
                                                        href="order-manager.php?act=del&id=<?php echo $row['order_id'];?>" 
                                                        style="width: 20px; height: 20px;">
                                                        <i class="fa fa-close"></i>
                                                        </a>
                                                    </td>
                                                     </tr>
                                                 <?php } ?>
                                         </tbody>
                                     </table>

                                 <?php } else {  ?>
                                     <div class="alert alert-danger"><em>No records were found.</em></div>
                                 <?php }

                                                mysqli_close($conn);
                                    ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <?php include('layout/footer.php'); ?>
     </main>