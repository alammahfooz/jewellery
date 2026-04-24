<?php

ob_start();
include('admin/include/dbconnect.php');
include('admin/include/configuration.php');
include('layout/header.php'); 

// if(isset($_GET['id']) && (isset($_GET['qty']))){
//     $id = $_GET['id'];
//     $qty = $_GET['qty'];

// $_SESSION['cart_qty'] = $_GET['qty'];
// $_SESSION['product_id'] = $id;
// header("Location: cart.php");
// }

// Array
// (
//     [cart] => Array
//         (
//          [0] [['id'] => 3, ['qty'] => 1]
//          [1] [['id'] => 4, ['qty'] => 1]
//          [2] [['id'] => 5, ['qty'] => 1] 
//         )

// )
// session_destroy();



if(isset($_GET['id']) && isset($_GET['qty'])){

    $id = $_GET['id'];
    $qty = $_GET['qty'];

    // cart create karo agar nahi hai
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    $found = false;

    // check karo product already hai ya nahi
    foreach($_SESSION['cart'] as &$item){
        if($item['id'] == $id){
            $item['qty'] += $qty; // qty increase
            $found = true;
            break;
        }
    }

    // agar nahi mila to naya add karo
    if(!$found){
        $_SESSION['cart'][] = [
            'id' => $id,
            'qty' => $qty
        ];
    }

    header("Location: cart.php");
    exit;
}
// echo "<pre>";
// print_r($_SESSION);
// exit;


if(isset($_GET['remove_item'])){
    unset(
        $_SESSION['id'],
        $_SESSION['qty']
    );
    header('Location: cart.php');
}


 ?>
    <div class="rts-navigation-area-breadcrumb bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="index.php">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="index.php">Blog Lists With Sidebar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-seperator bg_light-1">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>

<style>
    .single-cart-area-list.main .quantity-edit input{
    max-width: 30px;
}
</style>

    <!-- rts cart area start -->
    <div class="rts-cart-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-9 col-lg-12 col-md-12 col-12 order-2 order-xl-1 order-lg-2 order-md-2 order-sm-2">
                    <div class="cart-area-main-wrapper">
                        <div class="cart-top-area-note">
                            <p>Add <span>$59.69</span> to cart and get free shipping</p>
                            <div class="bottom-content-deals mt--10">
                                <div class="single-progress-area-incard">
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rts-cart-list-area">
                        <div class="single-cart-area-list head">
                            <div class="product-main">
                                <P>Products</P>
                            </div>
                            <div class="price">
                                <p>Price</p>
                            </div>
                            <div class="quantity">
                                <p>Quantity</p>
                            </div>
                            <div class="subtotal">
                                <p>SubTotal</p>
                            </div>
                        </div>
                        <?php 
                         
                         $session_cart = $_SESSION['cart'];
                       
                        // foreach($session_cart as $cart){
                        //     $id = $cart['id'];
                        //     $main_product = "SELECT * FROM product WHERE id = '$id'";
                        //     $product = mysqli_fetch_assoc(mysqli_query($conn, $main_product));
                        //      $subtotal = $product['product_price'] * $cart['qty'];
                        

                        foreach($session_cart as $cart){
                            $total = 0;
                            $id = $cart['id'];
                            $main_product = "SELECT * FROM product WHERE id = '$id'";
                            $product = mysqli_fetch_assoc(mysqli_query($conn, $main_product));
                            $subtotal = $product['product_price'] * $cart['qty'];
                         ?>
                        <div class="single-cart-area-list main  item-parent">
                            <div class="product-main-cart">
                                <a href="?remove_item=<?php echo $product['id']; ?>" class="close section-activation">
                                    <i class="fa-regular fa-x"></i></a>
                                <div class="thumbnail">
                                    <img src="upload/<?= $product['product_image'] ?>" alt="shop">
                                </div>
                                <div class="information">
                                    <h6 class="title"><?= $product['product_title']; ?></h6>
                                    <span><?= $product['product_sku'] ?></span>
                                </div>
                            </div>
                            <div class="price">
                                <p>$<?= $product['product_price']; ?></p>
                            </div>
                           

                            <div class="quantity">
                                <div class="quantity-edit">
                                    <input type="text" class="input" min="1" name="qty" id="qty_<?= $cart['id'] ?>" value="<?= $cart['qty']; ?>">
                                    <div class="button-wrapper-action">
                                        <button class="button"><i class="fa-regular fa-chevron-down" onclick="sub_to_qty(<?= $cart['id'] ?>)"></i></button>
                                        <button class="button plus">+<i class="fa-regular fa-chevron-up" onclick="add_to_qty(<?= $cart['id'] ?>)"></i></button>                                             
                                    </div>
                                </div>
                            </div>
                            
                            <div class="subtotal">
                                <p>$<?= $subtotal ?></p>
                            </div>
                        </div>
                          <?php } ?>
 <div class="bottom-cupon-code-cart-area">
                            <form action="#">
                                <input type="text" placeholder="Cupon Code">
                                <button class="rts-btn btn-primary">Apply Coupon</button>
                            </form>
                            <a href="?remove_item=<?= $product['id'];  ?>" class="rts-btn btn-primary mr--50">Clear All</a>
                        </div>
                      
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-12 order-1 order-xl-2 order-lg-1 order-md-1 order-sm-1">
                <?php if(!empty($_SESSION)){ ?>  
                <div class="cart-total-area-start-right">
                        <h5 class="title">Cart Totals</h5>
                        <div class="subtotal">
                            <span>Subtotal</span>
                            <h6 class="price">$<?= $subtotal ?></h6>
                        </div>
                        <div class="shipping">
                            <span>Shipping</span>
                            <ul>
                                <li>
                                    <input type="radio" id="f-option" name="selector">
                                    <label for="f-option">Free Shipping</label>

                                    <div class="check"></div>
                                </li>

                                <li>
                                    <input type="radio" id="s-option" name="selector">
                                    <label for="s-option">Flat Rate</label>

                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li>

                                <li>
                                    <input type="radio" id="t-option" name="selector">
                                    <label for="t-option">Local Pickup</label>

                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li>

                                <li>
                                    <p>Shipping options will be updated
                                        during checkout</p>
                                    <p class="bold">Calculate Shipping</p>
                                </li>
                            </ul>
                        </div>
                        <div class="bottom">
                            <div class="wrapper">
                                <span>Subtotal</span>
                                <h6 class="price">$<?= $subtotal ?></h6>
                            </div>
                            <div class="button-area">
                                <a href="checkout.php" class="rts-btn btn-primary">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- rts cart area end -->
 
    <!-- rts footer one area start -->
    <div class="rts-footer-area pt--80 bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-main-content-wrapper pb--70">
                        <!-- single footer area wrapper -->
                        <div class="single-footer-wized">
                            <h3 class="footer-title">About Company</h3>
                            <div class="call-area">
                                <div class="icon">
                                    <i class="fa-solid fa-phone-rotary"></i>
                                </div>
                                <div class="info">
                                    <span>Have Question? Call Us 24/7</span>
                                    <a href="#" class="number">+258 3692 2569</a>
                                </div>
                            </div>
                            <div class="opening-hour">
                                <div class="single">
                                    <p>Monday - Friday: <span>8:00am - 6:00pm</span></p>
                                </div>
                                <div class="single">
                                    <p>Saturday: <span>8:00am - 6:00pm</span></p>
                                </div>
                                <div class="single">
                                    <p>Sunday: <span>Service Close</span></p>
                                </div>
                            </div>
                        </div>
                        <!-- single footer area wrapper -->
                        <!-- single footer area wrapper -->
                        <div class="single-footer-wized">
                            <h3 class="footer-title">Our Stores</h3>
                            <div class="footer-nav">
                                <ul>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- single footer area wrapper -->
                        <!-- single footer area wrapper -->
                        <div class="single-footer-wized">
                            <h3 class="footer-title">Shop Categories</h3>
                            <div class="footer-nav">
                                <ul>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Information</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Nest Stories</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- single footer area wrapper -->
                        <!-- single footer area wrapper -->
                        <div class="single-footer-wized">
                            <h3 class="footer-title">Useful Links</h3>
                            <div class="footer-nav">
                                <ul>
                                    <li><a href="#">Cancellation & Returns</a></li>
                                    <li><a href="#">Report Infringement</a></li>
                                    <li><a href="#">Payments</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- single footer area wrapper -->
                        <!-- single footer area wrapper -->
                        <div class="single-footer-wized">
                            <h3 class="footer-title">Our Newsletter</h3>
                            <p class="disc-news-letter">
                                Subscribe to the mailing list to receive updates one <br> the new arrivals and other discounts
                            </p>
                            <form class="footersubscribe-form" action="#">
                                <input type="email" placeholder="Your email address" required>
                                <button class="rts-btn btn-primary">Subscribe</button>
                            </form>

                            <p class="dsic">
                                I would like to receive news and special offer
                            </p>
                        </div>
                        <!-- single footer area wrapper -->
                    </div>
                    <div class="social-and-payment-area-wrapper">
                        <div class="social-one-wrapper">
                            <span>Follow Us:</span>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="payment-access">
                            <span>Payment Accepts:</span>
                            <img src="assets/images/payment/01.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts footer one area end -->

    <!-- rts copyright-area start -->
    <div class="rts-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-between-1">
                        <p class="disc">
                            Copyright 2024 <a href="#">©Ekomart</a>. All rights reserved.
                        </p>
                        <a href="#" class="playstore-app-area">
                            <span>Download App</span>
                            <img src="assets/images/payment/02.png" alt="">
                            <img src="assets/images/payment/03.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts copyright-area end -->


    <div class="product-details-popup-wrapper">
        <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
            <div class="product-details-popup">
                <button class="product-details-close-btn"><i class="fal fa-times"></i></button>
                <div class="details-product-area">
                    <div class="product-thumb-area">
                        <div class="cursor"></div>
                        <div class="thumb-wrapper one filterd-items figure">
                            <div class="product-thumb zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-details.jpg)"><img src="assets/images/products/product-details.jpg" alt="product-thumb">
                            </div>
                        </div>
                        <div class="thumb-wrapper two filterd-items hide">
                            <div class="product-thumb zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-filt2.jpg)"><img src="assets/images/products/product-filt2.jpg" alt="product-thumb">
                            </div>
                        </div>
                        <div class="thumb-wrapper three filterd-items hide">
                            <div class="product-thumb zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/product-filt3.jpg)"><img src="assets/images/products/product-filt3.jpg" alt="product-thumb">
                            </div>
                        </div>
                        <div class="product-thumb-filter-group">
                            <div class="thumb-filter filter-btn active" data-show=".one"><img src="assets/images/products/product-filt1.jpg" alt="product-thumb-filter"></div>
                            <div class="thumb-filter filter-btn" data-show=".two"><img src="assets/images/products/product-filt2.jpg" alt="product-thumb-filter"></div>
                            <div class="thumb-filter filter-btn" data-show=".three"><img src="assets/images/products/product-filt3.jpg" alt="product-thumb-filter"></div>
                        </div>
                    </div>
                    <div class="contents">
                        <div class="product-status">
                            <span class="product-catagory">Dress</span>
                            <div class="rating-stars-group">
                                <div class="rating-star"><i class="fas fa-star"></i></div>
                                <div class="rating-star"><i class="fas fa-star"></i></div>
                                <div class="rating-star"><i class="fas fa-star-half-alt"></i></div>
                                <span>10 Reviews</span>
                            </div>
                        </div>
                        <h2 class="product-title">Wide Cotton Tunic Dress <span class="stock">In Stock</span></h2>
                        <span class="product-price"><span class="old-price">$9.35</span> $7.25</span>
                        <p>
                            Priyoshop has brought to you the Hijab 3 Pieces Combo Pack PS23. It is a
                            completely modern design and you feel comfortable to put on this hijab.
                            Buy it at the best price.
                        </p>
                        <div class="product-bottom-action">
                            <div class="cart-edit">
                                <div class="quantity-edit action-item">
                                    <button class="button"><i class="fal fa-minus minus"></i></button>
                                    <input type="text" class="input" value="01" />
                                    <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                                </div>
                            </div>
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
                            <a href="javascript:void(0);" class="rts-btn btn-primary ml--20"><i class="fa-light fa-heart"></i></a>
                        </div>
                        <div class="product-uniques">
                            <span class="sku product-unipue"><span>SKU: </span> BO1D0MX8SJ</span>
                            <span class="catagorys product-unipue"><span>Categories: </span> T-Shirts, Tops, Mens</span>
                            <span class="tags product-unipue"><span>Tags: </span> fashion, t-shirts, Men</span>
                        </div>
                        <div class="share-social">
                            <span>Share:</span>
                            <a class="platform" href="http://facebook.com/" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                            <a class="platform" href="http://twitter.com/" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                            <a class="platform" href="http://behance.com/" target="_blank"><i
                                class="fab fa-behance"></i></a>
                            <a class="platform" href="http://youtube.com/" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                            <a class="platform" href="http://linkedin.com/" target="_blank"><i
                                class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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



    <!--================= Preloader Section Start Here =================-->
    <!-- <div id="weiboo-load">
    <div class="preloader-new">
        <svg class="cart_preloader" role="img" aria-label="Shopping cart_preloader line animation"
            viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                    <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                    <circle cx="43" cy="111" r="13" />
                    <circle cx="102" cy="111" r="13" />
                </g>
                <g class="cart__lines" stroke="currentColor">
                    <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                        stroke-dasharray="338 338" stroke-dashoffset="-338" />
                    <g class="cart__wheel1" transform="rotate(-90,43,111)">
                        <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68"
                            stroke-dashoffset="81.68" />
                    </g>
                    <g class="cart__wheel2" transform="rotate(90,102,111)">
                        <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68"
                            stroke-dashoffset="81.68" />
                    </g>
                </g>
            </g>
        </svg>
    </div>
</div> -->
    <!--================= Preloader End Here =================-->





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
 

    <script>
        function add_to_qty(id){
            let inc_qty = 1;
            window.location.href = "cart.php?id="+id+'&qty='+inc_qty;    
        }
          function sub_to_qty(id){
              let  qty = parseInt(document.getElementById('qty_'+id).value);              
              let dec_qty =  - 1;
            
            if(qty > 1) {
            
                window.location.href = "cart.php?id="+id+'&qty='+dec_qty;  
                
            }    
                    
       
           
                            }
    </script>