<?php
session_start();
ob_start();
include('admin/include/dbconnect.php');

// session_destroy();
// if (isset($_GET['id']) && (isset($_GET['qty']))) {
//     $id = $_GET['id'];
//     $qty = $_GET['qty'];

//     $_SESSION['cart_qty'] = $_GET['qty'];
//     $_SESSION['product_id'] = $id;
//     header("location: cart.php");
// }

// if (isset($_GET['remove_item'])) {
//     unset(
//         $_SESSION['product_id'],
//         $_SESSION['cart_qty']
//     );
//     header('Location: cart.php');
// }
if (isset($_GET['id']) && isset($_GET['qty'])) {
    $id = $_GET['id'];
    $qty = $_GET['qty'];

    // cart create karo agar nahi hai
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;

    // check karo product already hai ya nahi
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $item['qty'] += $qty; // qty increase
            $found = true;
            break;
        }
    }

    // agar nahi mila to naya add karo
    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $id,
            'qty' => $qty
        ];    
        }

    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ekomart Jewellery Store: A sleek, responsive, and user-friendly HTML template designed for online grocery stores.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Grocery, Store, stores">
    <title>Ekomart Jewellery Store</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
     
    <link rel="stylesheet preload" href="assets/css/plugins.css" as="style">
    <link rel="stylesheet preload" href="assets/css/style.css" as="style">

  <style>
    .qty_width{
        width: 100px;
        margin-right: 20px;
    }
  </style>
</head>

<body class="shop-main-h">
 
    <div class="rts-header-one-area-one">
 
        <div class="search-header-area-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper">
                            <a href="index.php" class="logo-area">
                                <img src="assets/images/logo/slazzer-preview-0xsyv.png" width="130px" alt="logo-main" class="logo">
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <img class="parent" src="assets/images/icons/bar-1.svg" alt="icons">
                                    <span>Categories</span>
                                    <ul class="category-sub-menu" id="category-active-four">
                                        
                                        <?php
                                        $fetch_parent = "SELECT * FROM category WHERE parent_id = 0" ;
                                        $result_parent = mysqli_query($conn, $fetch_parent);
                                        while ($parent  = mysqli_fetch_assoc($result_parent)) {
                                        ?>
                                            <li>
                                                <a href="#" class="menu-item">
                                                    <span onclick="window.location.href='shop-grid-sidebar.php?category_id=<?= $parent['id'] ?>'"><?= $parent['category_name'] ?></span>
                                                    <i class="fa-regular fa-plus"></i>
                                                </a>
                                                <ul class="submenu mm-collapse">
                                                    <?php
                                                    $fetch_sub = "SELECT * FROM category WHERE parent_id = '{$parent['id']}'";
                                                    $result_sub = mysqli_query($conn, $fetch_sub);
                                                    while ($subcategory = mysqli_fetch_assoc($result_sub)) {
                                                    ?>
                                                        <li><a class="mobile-menu-link" href="shop-grid-sidebar.php?subcategory=<?= $subcategory['id'] ?>"><?= $subcategory['category_name']; ?></a></li>

                                                    <?php   } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <form action="#" class="search-header">
                                    <input type="text" placeholder="Search for products, categories or brands" required>
                                    <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                        <div class="btn-text">
                                            Search
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </div>
                                    </a>
                                </form>
                            </div>
                            <div class="actions-area">
                                <div class="search-btn" id="searchs">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                    </svg>
                                </div>
                                <div class="menu-btn" id="menu-btn">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect width="20" height="2" fill="#1F1F25"></rect>
                                    </svg>
                                </div>
                            </div>
                            <div class="accont-wishlist-cart-area-header">
                                <a href="account.html" class="btn-border-only account">
                                    <i class="fa-light fa-user"></i>
                                    <span>Account</span>
                                </a>
                                <a href="wishlist.html" class="btn-border-only wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                    <span class="text">Wishlist</span>
                                    <span class="number">1</span>
                                </a>
                               
                                <div class="btn-border-only cart category-hover-header">
                                    <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                    <span class="text">My Cart</span>
                                    <span class="number">1</span>
                                    <div class="category-sub-menu card-number-show">
                                        <h5 class="shopping-cart-number">Shopping Cart (01)</h5>
                                        
                                          <?php 
                                            if(isset($_SESSION['cart'])){
                                                 $session_cart = $_SESSION['cart'];
                                            }
                                           if (!empty($_SESSION['cart'])) {

                                            $i = 1;
                                            $subtotal = 0;
                                            foreach ($session_cart as $cart) {
                                                $id = $cart['id'];
                                                $main_product = "SELECT * FROM product WHERE id = '$id'";
                                                $product = mysqli_fetch_assoc(mysqli_query($conn, $main_product));
                                                $total = $product['product_price'] * $cart['qty'];
                                                $subtotal += $total;
                                        ?>
                                        
                                        <div class="cart-item-1 border-top">
                                            <div class="img-name">
                                                <div class="thumbanil">
                                                    <img src="upload/<?= $product['product_image']; ?>" alt="">
                                                </div>
                                                <div class="details">
                                                    <a href="cart.php?id=<?= $product['id'] ?>">
                                                        <h5 class="title"><?= $product['product_title'] ?></h5>
                                                    </a>
                                                    <div class="number">
                                                        <?= $cart['qty']; ?> <i class="fa-regular fa-x"></i>
                                                        <span>$<?= $product['product_price'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                          <a href="?remove_item=<?=  $product['id'] ?>">
                                              <div class="close-c1">
                                                <i class="fa-regular fa-x"></i>
                                            </div>
                                          </a>
                                        </div>
                                       
                                        <div class="sub-total-cart-balance">
                                            <div class="bottom-content-deals mt--10">
                                                <div class="top">
                                                    <span>Sub Total:</span>
                                                    <span class="number-c">$<?= $subtotal ?></span>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <p>Spend More <span>$125.00</span> to reach <span>Free Shipping</span></p>
                                            </div>
                                            <div class="button-wrapper d-flex align-items-center justify-content-between">
                                                <a href="cart.php" class="rts-btn btn-primary ">View Cart</a>
                                                <a href="checkout.php" class="rts-btn btn-primary border-only">CheckOut</a>
                                            </div>
                                        </div>
                                         <?php }
                                        } else echo "<p class='text-center fs-2 p-4 text-danger'>cart is empty</p>" ?>
                                    </div>
                                    <a href="cart.php" class="over_link"></a>
                                </div>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rts-header-nav-area-one header--sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nav-and-btn-wrapper">
                            <div class="nav-area">
                                <nav>
                                    <ul class="parent-nav">
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="http://localhost/jewellery/">Home</a>
                                        </li>
                                        <li class="parent"><a href="about.php">About</a></li>
                                        <li class="parent"><a href="#">Information</a></li>
                                        <li class="parent"><a href="#">Careers</a></li>
                                        <li class="parent"><a href="faq.php">FAQ</a></li>
                                        
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="blog.php">Blog</a>
                                        </li>
                                        <li class="parent"><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- button-area -->
                            <div class="right-btn-area">
                                <a href="javascrip:void(0)" class="btn-narrow" onclick="scrollToTrending()">Trending Products</a>
                                <button class="rts-btn btn-primary">
                                    Get 30% Discount Now
                                    <span>Sale</span>
                                </button>
                            </div>
                            <!-- button-area end -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper after-md-device-header">
                            <a href="index.php" class="logo-area">
                                <img src="assets/images/logo/slazzer-preview-0xsyv.png" alt="logo-main" class="logo">
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <img class="parent" src="assets/images/icons/bar-1.svg" alt="icons">
                                    <span>Categories</span>
                                    <ul class="category-sub-menu">
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/01.svg" alt="icons">
                                                <span>Breakfast & Dairy</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/02.svg" alt="icons">
                                                <span>Meats & Seafood</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/03.svg" alt="icons">
                                                <span>Breads & Bakery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/04.svg" alt="icons">
                                                <span>Chips & Snacks</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/05.svg" alt="icons">
                                                <span>Medical Healthcare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/06.svg" alt="icons">
                                                <span>Breads & Bakery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/07.svg" alt="icons">
                                                <span>Biscuits & Snacks</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/08.svg" alt="icons">
                                                <span>Frozen Foods</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/09.svg" alt="icons">
                                                <span>Grocery & Staples</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/10.svg" alt="icons">
                                                <span>Other Items</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#" class="search-header">
                                    <input type="text" placeholder="Search for products, categories or brands" required>
                                    <button class="rts-btn btn-primary radious-sm with-icon">
                                        <span class="btn-text">
                                            Search
                                        </span>
                                        <span class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </span>
                                        <span class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div class="main-wrapper-action-2 d-flex">
                                <div class="accont-wishlist-cart-area-header">
                                    <a href="account.html" class="btn-border-only account">
                                        <i class="fa-light fa-user"></i>
                                        Account
                                    </a>
                                    <a href="wishlist.html" class="btn-border-only wishlist">
                                        <i class="fa-regular fa-heart"></i>
                                        Wishlist
                                    </a>
                                    <div class="btn-border-only cart category-hover-header">
                                        <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                        <span class="text">My Cart</span>
                                        <div class="category-sub-menu card-number-show">
                                            <h5 class="shopping-cart-number">Shopping Cart (03)</h5>
                                            <div class="cart-item-1 border-top">
                                                <div class="img-name">
                                                    <div class="thumbanil">
                                                        <img src="assets/images/shop/cart-1.png" alt="">
                                                    </div>
                                                    <div class="details">
                                                        <a href="shop-details.html">
                                                            <h5 class="title">Foster Farms Breast Nuggets Shaped Chicken</h5>
                                                        </a>
                                                        <div class="number">
                                                            1 <i class="fa-regular fa-x"></i>
                                                            <span>$36.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close-c1">
                                                    <i class="fa-regular fa-x"></i>
                                                </div>
                                            </div>
                                            <div class="cart-item-1">
                                                <div class="img-name">
                                                    <div class="thumbanil">
                                                        <img src="assets/images/shop/05.png" alt="">
                                                    </div>
                                                    <div class="details">
                                                        <a href="shop-details.html">
                                                            <h5 class="title">Foster Farms Breast Nuggets Shaped Chicken</h5>
                                                        </a>
                                                        <div class="number">
                                                            1 <i class="fa-regular fa-x"></i>
                                                            <span>$36.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close-c1">
                                                    <i class="fa-regular fa-x"></i>
                                                </div>
                                            </div>
                                            <div class="cart-item-1">
                                                <div class="img-name">
                                                    <div class="thumbanil">
                                                        <img src="assets/images/shop/04.png" alt="">
                                                    </div>
                                                    <div class="details">
                                                        <a href="shop-details.html">
                                                            <h5 class="title">Foster Farms Breast Nuggets Shaped Chicken</h5>
                                                        </a>
                                                        <div class="number">
                                                            1 <i class="fa-regular fa-x"></i>
                                                            <span>$36.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close-c1">
                                                    <i class="fa-regular fa-x"></i>
                                                </div>
                                            </div>
                                            <div class="sub-total-cart-balance">
                                                <div class="bottom-content-deals mt--10">
                                                    <div class="top">
                                                        <span>Sub Total:</span>
                                                        <span class="number-c">$108.00</span>
                                                    </div>
                                                    <div class="single-progress-area-incard">
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <p>Spend More <span>$125.00</span> to reach <span>Free Shipping</span></p>
                                                </div>
                                                <div class="button-wrapper d-flex align-items-center justify-content-between">
                                                    <a href="cart.php" class="rts-btn btn-primary ">View Cart</a>
                                                    <a href="checkout.html" class="rts-btn btn-primary border-only">CheckOut</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="cart.php" class="over_link"></a>
                                    </div>
                                </div>
                                <div class="actions-area">
                                    <div class="search-btn" id="search">

                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                        </svg>

                                    </div>
                                    <div class="menu-btn">

                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect width="20" height="2" fill="#1F1F25"></rect>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts header area end -->

    <!-- rts header area start -->
    <!-- header style two -->
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>


        <form action="#" class="search-input-area-menu mt--30">
            <input type="text" placeholder="Search..." required>
            <button><i class="fa-light fa-magnifying-glass"></i></button>
        </form>

        <div class="mobile-menu-nav-area tab-nav-btn mt--20">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Menu</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Category</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <!-- mobile menu area start -->
                    <div class="mobile-menu-main">
                        <nav class="nav-main mainmenu-nav mt--30">
                            <ul class="mainmenu metismenu" id="mobile-menu-active">
                                <li class="has-droupdown">
                                    <a href="#" class="main">Home</a>
                                    <ul class="submenu mm-collapse">
                                        <li><a class="mobile-menu-link" href="index.php">Home One</a></li>
                                        <li><a class="mobile-menu-link" href="index-two.html">Home Two</a></li>
                                        <li><a class="mobile-menu-link" href="index-three.html">Home Three</a></li>
                                        <li><a class="mobile-menu-link" href="index-four.html">Home Four</a></li>
                                        <li><a class="mobile-menu-link" href="index-five.html"> Home Five</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.php" class="main">About</a>
                                </li>
                                <li class="has-droupdown">
                                    <a href="#" class="main">Pages</a>
                                    <ul class="submenu mm-collapse">
                                        <li><a class="mobile-menu-link" href="about.php">About</a></li>
                                        <li><a class="mobile-menu-link" href="faq.html">Faq's</a></li>
                                        <li><a class="mobile-menu-link" href="invoice.html">Invoice</a></li>
                                        <li><a class="mobile-menu-link" href="contact.html">Contact</a></li>
                                        <li><a class="mobile-menu-link" href="register.html">Register</a></li>
                                        <li><a class="mobile-menu-link" href="login.html">Login</a></li>
                                        <li><a class="mobile-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a class="mobile-menu-link" href="cookies-policy.html">Cookies Policy</a></li>
                                        <li><a class="mobile-menu-link" href="terms-condition.html">Terms Condition</a></li>
                                        <li><a class="mobile-menu-link" href="404.html">Error Page</a></li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a href="#" class="main">Shop</a>
                                    <ul class="submenu mm-collapse">
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Shop Layout</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="shop-grid-sidebar.html"></a>Shop Grid Sidebar</li>
                                                <li><a href="shop-list-sidebar.html"></a>Shop List Sidebar</li>
                                                <li><a href="shop-grid-top-filter.html"></a>Shop Grid Top Filter</li>
                                                <li><a href="shop-list-top-filter.html"></a>Shop List Top Filter</li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Shop Details</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="shop-details.html"></a>Shop Details</li>
                                                <li><a href="shop-details-2.html"></a>Shop Details 2</li>
                                                <li><a href="shop-grid-top-filter.html"></a>Shop Grid Top Filter</li>
                                                <li><a href="shop-list-top-filter.html"></a>Shop List Top Filter</li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Product Feature</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="shop-details-variable.html"></a>Shop Details Variable</li>
                                                <li><a href="shop-details-affiliats.html"></a>Shop Details Affiliats</li>
                                                <li><a href="shop-details-group.html"></a>Shop Details Group</li>
                                                <li><a href="shop-compare.html"></a>Shop Compare</li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Shop Others</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="cart.php"></a>Cart</li>
                                                <li><a href="checkout.html"></a>Checkout</li>
                                                <li><a href="trackorder.html"></a>Trackorder</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a href="#" class="main">Blog</a>
                                    <ul class="submenu mm-collapse">
                                        <li><a class="mobile-menu-link" href="blog.html">Blog</a></li>
                                        <li><a class="mobile-menu-link" href="blog-list-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a class="mobile-menu-link" href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html" class="main">Contact Us</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <!-- mobile menu area end -->
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="category-btn category-hover-header menu-category">
                        <ul class="category-sub-menu" id="category-active-menu">
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/01.svg" alt="icons">
                                    <span>Breakfast &amp; Dairy</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/02.svg" alt="icons">
                                    <span>Meats &amp; Seafood</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/03.svg" alt="icons">
                                    <span>Breads &amp; Bakery</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/04.svg" alt="icons">
                                    <span>Chips &amp; Snacks</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/05.svg" alt="icons">
                                    <span>Medical Healthcare</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/06.svg" alt="icons">
                                    <span>Breads &amp; Bakery</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/07.svg" alt="icons">
                                    <span>Biscuits &amp; Snacks</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/08.svg" alt="icons">
                                    <span>Frozen Foods</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/09.svg" alt="icons">
                                    <span>Grocery &amp; Staples</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/10.svg" alt="icons">
                                    <span>Other Items</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- button area wrapper start -->
        <div class="button-area-main-wrapper-menuy-sidebar mt--50">
            <div class="contact-area">
                <div class="phone">
                    <i class="fa-light fa-headset"></i>
                    <a href="#">02345697871</a>
                </div>
                <div class="phone">
                    <i class="fa-light fa-envelope"></i>
                    <a href="#">02345697871</a>
                </div>
            </div>
            <div class="buton-area-bottom">
                <a href="login.html" class="rts-btn btn-primary">Sign In</a>
                <a href="register.html" class="rts-btn btn-primary">Sign Up</a>
            </div>
        </div>
        <!-- button area wrapper end -->

    </div>
 

    <!-- <a href="javascript:void(0)" onclick="scrollToTrending()">Trending Products</a> -->

<script>

function scrollToTrending(){
    document.getElementById("trending_product").scrollIntoView({
        behavior: "smooth"
    });
}
</script>