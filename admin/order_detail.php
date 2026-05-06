<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include('layout/header.php');

$id = (int)$_GET['id'];

$order_query = mysqli_query($conn, "SELECT * FROM orders WHERE id = $id");

if (!$order_query) {
    die(mysqli_error($conn));
}

$orders = mysqli_fetch_assoc($order_query);

$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($order_id <= 0) {
    die("Invalid Order ID");
}
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$items_query = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = $id");
// $items_query = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = $order_id");

// echo $order_id;
// exit;

if (!$items_query) {
    die(mysqli_error($conn));
}


$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$order = mysqli_fetch_assoc($items_query);
?>


<?php //echo  $orders;
//exit;
?>


<main class="nxl-container">
    <div class="nxl-content">
        <div class="main-content mb-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card stretch stretch-full p-4">
                        <div id="content" class="white">


                            <div class="bloc">


                                <div class="">
                                    <div class="input">
                                        <label class="d-flex">
                                            <div class="name-text"> Order ID# &nbsp;:&nbsp;</div>
                                            <div class="main-text"><span><?= $order['order_id']; ?></span></div>
                                        </label>
                                    </div>
                                </div>

                                <div class="sub-title my-4 fs-4 bg-secondary text-light p-1">Customer Information </div>
                                <div class="content">
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Customer Name &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= $orders['fname'] . ' ' . $orders['lname']; ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Address &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= $orders['address'] ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">City &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= $orders['city'] ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Zip Code &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= $orders['zip_code'] ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Email &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= $orders['email'] ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Customer Phone &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= $orders['phone'] ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Order Date &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?= date('d M Y', $orders['date']); ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Order Status &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?php echo $order['order_status']; ?></span></div>
                                        </label>
                                    </div>
                                    <div class="input">
                                        <label class="d-flex fs-6 my-2">
                                            <div class="name-text col-md-3">Total Price &nbsp;:&nbsp;</div>
                                            <div class="main-text col-md-3"><span><?php echo $orders['total_price'] ?></span></div>
                                        </label>
                                    </div>



                                    <div class="sub-title my-4 fs-4 bg-secondary text-light p-1 ">Order Product(s) Information </div>
                                    <div class="content mb-5">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="padding-top: 10px;">
                                            <thead>
                                                <tr class="pb-3">
                                                    <th class="pb-3">Product ID</th>
                                                    <th class="pb-3">Quantity</th>
                                                    <th class="pb-3">Price/Unit</th>
                                                    <th class="pb-3">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                $subtotal = 0;
                                                $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                                                $items_query = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = $id");

                                                while ($row = mysqli_fetch_assoc($items_query)) {
                                                    $total = $row['qty'] * $row['product_price'];
                                                    $subtotal += $total;
                                                ?>
                                                    <tr>
                                                        <td><?= $row['product_id']; ?></td>
                                                        <td><?= $row['qty']; ?></td>
                                                        <td>₹<?= $row['product_price']; ?></td>
                                                        <td>₹<?= $total; ?></td>
                                                    </tr>
                                                <?php } ?>

                                                <tr>
                                                    <td colspan="3" style="text-align:right; font-weight:bold;">Sub Total: &nbsp; &nbsp;</td>
                                                    <td><strong>₹<?= $subtotal; ?></strong></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3" style="text-align:right; font-weight:bold; color:red;">Grand Total: &nbsp; &nbsp;</td>
                                                    <td style="color:red;"><strong>₹<?= $subtotal; ?></strong></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </main> -->

            <?php include('layout/footer.php'); ?>