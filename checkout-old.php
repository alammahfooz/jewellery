<?php

ob_start();
 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include('admin/include/dbconnect.php');
include('admin/include/configuration.php');
include('layout/header.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $phone = $_POST['phone'];

    $product_ids = $_POST['product_id'];
    $qtys = $_POST['qty'];
    $order_id = $_POST['order_id'];
    $total_price = $_POST['total_price'];
    $date = time();

//    $check = mysqli_query($conn, "SELECT id FROM orders WHERE order_id = '$order_id' LIMIT 1");

// if(mysqli_num_rows($check) > 0){
//     echo "<p class='text-danger'>Order already exists!</p>";
//     exit;
// }

    $customer_order = "INSERT INTO `orders` (email, fname, lname, country, address, city, state, zip_code, phone, date, total_price, order_id) VALUES ('$email', '$fname', '$lname', '$country', '$address', '$city', '$state', '$zip_code', '$phone', '$date', '$total_price', '$order_id')";

    // echo $customer_order;
    // exit;
    mysqli_query($conn, $customer_order);
     $id = mysqli_insert_id($conn);
     $order_id = mysqli_insert_id($conn);

    //  Now insert products
    for ($i = 0; $i < count($product_ids); $i++) {

        $product_ids = $_POST['product_id'];
        $qtys = $_POST['qty'];
        $prices = $_POST['price'];

        for ($i = 0; $i < count($product_ids); $i++) {

            $pid = $product_ids[$i];
            $qty = $qtys[$i];
            $price = $prices[$i];
          
            mysqli_query($conn, "INSERT INTO `order_items` (order_id, product_id, qty, product_price , date)  VALUES ('$id','$pid','$qty','$price', $date)");
        }
    }
    
    header("Location: thank-you.php?msg_id=5");
    
    exit();
}
?>



<div class="rts-navigation-area-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index-2.html">Home</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="#" href="index-2.html">Shop</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="index-2.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-seperator">
    <div class="container">
        <hr class="section-seperator">
    </div>
</div>


<div class="checkout-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pr--40 pr_md--5 pr_sm--5 order-2 order-xl-1 order-lg-2 order-md-2 order-sm-2 mt_md--30 mt_sm--30">
                <div class="coupon-input-area-1 login-form">
                    <div class="coupon-area">
                        <div class="coupon-ask">
                            <span>Returning customers?</span>
                            <button class="coupon-click"> Click here to login</button>
                        </div>
                        <div class="coupon-input-area">
                            <div class="inner">
                                <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>
                                <form action="#">
                                    <input type="email" placeholder="User Name...">
                                    <input type="password" placeholder="Enter password...">

                                    <button type="submit" class="btn-primary rts-btn">Log In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon-input-area-1">
                    <div class="coupon-area">
                        <div class="coupon-ask  cupon-wrapper-1">
                            <button class="coupon-click">Have a coupon? Click here to enter your code</button>
                        </div>
                        <div class="coupon-input-area cupon1">
                            <div class="inner">
                                <p class="mt--0 mb--20"> If you have a coupon code, please apply it below.</p>
                                <div class="form-area">
                                    <input type="text" placeholder="Enter Coupon Code...">
                                    <button type="submit" class="btn-primary rts-btn">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rts-billing-details-area">
                    <h3 class="title">Billing Details</h3>
                    <!-- product_id, order_statu, qty, product_price, order_id  -->
                    <form action="#" method='POST' enctype="multipart/form-data">
                        <div class="single-input">
                            <label for="email">Email Address*</label>
                            <input id="email" name="email" value="" type="text" required>
                        </div>

                        <?php
                        $session_cart = $_SESSION['cart'] ?? [];
                        $subtotal = 0;

                        if (!empty($session_cart)) {
                            foreach ($session_cart as $cart) {

                                $id = $cart['id'];
                                $qty = $cart['qty'];

                                $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE id='$id'"));

                                if ($product) {
                                    $price = $product['product_price'];
                                    $total = $price * $qty;
                                    $subtotal += $total;
                        ?>

                                    <input type="hidden" name="product_id[]" value="<?= $id ?>">
                                    <input type="hidden" name="qty[]" value="<?= $qty ?>">
                                    <input type="hidden" name="price[]" value="<?= $price ?>">

                        <?php
                                }
                            }
                        }
                        ?>

                        <!-- ✅ important hidden fields -->
                        <input type="hidden" name="total_price" value="<?= $subtotal ?>">
                        <input type="hidden" name="order_id" value="<?= uniqid('ORD_') ?>">
                        <input type="hidden" name="order_status" value="Pending">







                        <div class="half-input-wrapper">
                            <div class="single-input">
                                <label for="fname">First Name*</label>
                                <input id="fname" name="fname" value="" type="text" required>
                            </div>
                            <div class="single-input">
                                <label for="lname">Last Name*</label>
                                <input id="lname" name="lname" value="" type="text">
                            </div>
                        </div>

                        <div class="half-input-wrapper">
                            <div class="single-input">
                                <label for="country">Country / Region*</label>
                                <input id="country" name="country" value="" type="text">
                            </div>
                            <div class="single-input">
                                <label for="address">address Address*</label>
                                <input id="address" name="address" value="" type="text" required>
                            </div>
                        </div>
                        <div class="half-input-wrapper">
                            <div class="single-input">
                                <label for="city">Town / City*</label>
                                <input id="city" name="city" value="" type="text">
                            </div>
                            <div class="single-input">
                                <label for="state">State*</label>
                                <input id="state" name="state" value="" type="text">
                            </div>
                        </div>

                        <div class="half-input-wrapper">
                            <div class="single-input">
                                <label for="zip_code">Zip Code*</label>
                                <input id="zip_code" type="text" name="zip_code" value="" required>
                            </div>
                            <div class="single-input">
                                <label for="phone">Phone*</label>
                                <input id="phone" type="text" name="phone" value="">
                            </div>
                        </div>

                        <button class="rts-btn btn-primary" type="submit" name="submit">Place Order</button>

                    </form>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-xl-2 order-lg-1 order-md-1 order-sm-1">
                <h3 class="title-checkout">Your Order</h3>
                <div class="right-card-sidebar-checkout">
                    <div class="top-wrapper">
                        <div class="No">
                            No
                        </div>
                        <div class="product">
                            Products
                        </div>
                        <div class="quantity" style="margin-left: 160px;">
                            Quantity
                        </div>
                        <div class="price">
                            Price
                        </div>
                        <div class="subtotal">
                            Subtotal
                        </div>
                    </div>
                    <?php
                     
                     if(isset($_SESSION['cart'])){
            $session_cart = $_SESSION['cart'];
                    };
                    // $count = count($session_cart);
                    // echo $count;
                    // exit;
                    $i = 1;
                    $subtotal = 0;
                    if (!empty($_SESSION['cart'])) {
                        foreach ($session_cart as $cart) {
                            $id = $cart['id'];
                            $main_product = "SELECT * FROM product WHERE id = '$id'";
                            $product = mysqli_fetch_assoc(mysqli_query($conn, $main_product));
                            $total = $product['product_price'] * $cart['qty'];
                            $subtotal += $total;  ?>

                            <div class="single-shop-list">
                                <div class="left-area">
                                    <a class="count">
                                        <?= str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                    </a>
                                    <a href="#" class="thumbnail">
                                        <img src="upload/<?= $product['product_image']; ?>" alt="">
                                    </a>

                                    <a href="#" class="title">
                                        <?= $product['product_title']; ?>
                                    </a>
                                </div>
                                <span class="price"><?= $cart['qty']; ?></span>
                                <span class="price">$<?= $product['product_price']; ?></span>
                                <span class="price">$<?= $total; ?></span>
                            </div>
                    <?php $i++;
                        }
                    } else echo "<p class='text-center fs-2 p-4 text-danger'>cart is empty</p>" ?>

                    <div class="single-shop-list" style="margin-top: 100px;">
                        <div class="left-area">
                            <span style="font-weight: 600; color: #2C3C28;">Total Price:</span>
                        </div>
                        <span class="price" style="color: #629D23;">$<?= $subtotal ?></span>
                    </div>
                    <div class="cottom-cart-right-area">
                        <ul>
                            <li>
                                <input type="radio" id="f-options" name="selector">
                                <label for="f-options">Direct Bank Transfer</label>

                                <div class="check"></div>
                            </li>
                        </ul>
                        <p class="disc mb--25">
                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                        </p>
                        <ul>
                            <li>
                                <input type="radio" id="f-option" name="selector">
                                <label for="f-option">Check Payments</label>

                                <div class="check"></div>
                            </li>

                            <li>
                                <input type="radio" id="s-option" name="selector">
                                <label for="s-option">Cash On Delivery</label>

                                <div class="check">
                                    <div class="inside"></div>
                                </div>
                            </li>

                            <li>
                                <input type="radio" id="t-option" name="selector">
                                <label for="t-option">Paypal</label>

                                <div class="check">
                                    <div class="inside"></div>
                                </div>
                            </li>
                        </ul>
                        <p class="mb--20">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        <div class="single-category mb--30">
                            <input id="cat14" type="checkbox">
                            <label for="cat14"> I have read and agree terms and conditions *
                            </label>
                        </div>
                        <a href="#" class="rts-btn btn-primary">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include('layout/footer.php'); ?>




<!-- successfully add in wishlist -->
<div class="successfully-addedin-wishlist">
    <div class="d-flex" style="align-items: center; gap: 15px;">
        <i class="fa-regular fa-check"></i>
        <p>Your item has already added in wishlist successfully</p>
    </div>
</div>
<!-- successfully add in wishlist end -->



<!-- Modal -->
<div class="modal modal-compare-area-start fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Products Compare</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="compare-main-wrapper-body">
                    <div class="single-compare-elements name">Preview</div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/01.jpg" alt="grocery">
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/02.jpg" alt="grocery">
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/03.jpg" alt="grocery">
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname spacifiq">
                    <div class="single-compare-elements name">Name</div>
                    <div class="single-compare-elements">
                        <p>J.Crew Mercantile Women's Short</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>Amazon Essentials Women's Tanks</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>Amazon Brand - Daily Ritual Wom</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Price</div>
                    <div class="single-compare-elements price">
                        <p>$25.00</p>
                    </div>
                    <div class="single-compare-elements price">
                        <p>$39.25</p>
                    </div>
                    <div class="single-compare-elements price">
                        <p>$12.00</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Description</div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Rating</div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(25)</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(19)</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(120)</span>
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Weight</div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <p>320 gram</p>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <p>370 gram</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>380 gram</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Stock status</div>
                    <div class="single-compare-elements">
                        <div class="instocks">
                            <span>In Stock</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="outstocks">
                            <span class="out-stock">Out Of Stock</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="instocks">
                            <span>In Stock</span>
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Buy Now</div>
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
                            <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">
                                    Add To Cart
                                </div>
                                <div class="arrow-icon">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </div>
                                <div class="arrow-icon">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
                            <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">
                                    Add To Cart
                                </div>
                                <div class="arrow-icon">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </div>
                                <div class="arrow-icon">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
                            <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">
                                    Add To Cart
                                </div>
                                <div class="arrow-icon">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </div>
                                <div class="arrow-icon">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<div class="search-input-area">
    <div class="container">
        <div class="search-input-inner">
            <div class="input-div">
                <input id="searchInput1" class="search-input" type="text" placeholder="Search by keyword or #">
                <button><i class="far fa-search"></i></button>
            </div>
        </div>
    </div>
    <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>
<div id="anywhere-home" class="anywere"></div>
<!-- progress area start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>
<!-- progress area end -->


<!-- plugins js -->
<script defer src="assets/js/plugins.js"></script>

<!-- custom js -->
<script defer src="assets/js/main.js"></script>
<!-- header style two End -->

</body>


</html>