<?php include('layout/header.php');

$category_id = "";
$subcategorys  = "";

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    $main_product = "SELECT * FROM product WHERE category_id = $category_id";
} else {
    $main_product = "SELECT * FROM product WHERE category_id = $category_id";
}

if (isset($_POST['subcategory'])) {
    $subcategorys = $_POST['subcategorys'];
    $main_product = "SELECT * FROM product WHERE category_id = $subcategorys";
} else {
    $main_product = "SELECT * FROM product WHERE category_id = $subcategorys";
}
?>

<div class="background-light-gray-color rts-section-gap bg_light-1 pt_sm--20">
    <!-- rts banner area start -->
    <div class="rts-banner-area-one mb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">
                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                "spaceBetween":1,
                                "slidesPerView":1,
                                "loop": true,
                                "speed": 2000,
                                "autoplay":{
                                    "delay":"4000"
                                },
                                "navigation":{
                                    "nextEl":".swiper-button-next",
                                    "prevEl":".swiper-button-prev"
                                },
                                "breakpoints":{
                                "0":{
                                    "slidesPerView":1,
                                    "spaceBetween": 0},
                                "320":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "480":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "640":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "840":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "1140":{
                                    "slidesPerView":1,
                                    "spaceBetween":0}
                                }
                            }'>
                            <div class="swiper-wrapper">
                                <!-- single swiper start -->
                                <?php
                                $home_banner = "SELECT * FROM home_banner WHERE status = 1 ORDER BY sort_order ASC";
                                $banner_result = mysqli_query($conn, $home_banner);
                                while ($banner = mysqli_fetch_assoc($banner_result)) {
                                ?>
                                    <div class="swiper-slide">
                                        <div style="background-image: url('upload/<?= $banner['banner_image']; ?>')" ; class="banner-bg-image bg_image ptb--120 ptb_md--80 ptb_sm--60">
                                            <div class="banner-one-inner-content">
                                                k <h1 class="title">
                                                    <?= $banner['banner_sub_title']; ?>
                                                </h1>
                                                <a href="shop-grid-sidebar.html" class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text">
                                                        <?= $banner['banner_btn']; ?>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-arrow-right"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-light fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>

                            </div>

                            <button class="swiper-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                            <button class="swiper-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts banner area end -->
    <!-- rts category area satart -->
    <div class="rts-caregory-area-one ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">
                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                "spaceBetween":12,
                                "slidesPerView":10,
                                "loop": true,
                                "speed": 1000,
                                "breakpoints":{
                                "0":{
                                    "slidesPerView":2,
                                    "spaceBetween": 12},
                                "320":{
                                    "slidesPerView":2,
                                    "spaceBetween":12},
                                "480":{
                                    "slidesPerView":3,
                                    "spaceBetween":12},
                                "640":{
                                    "slidesPerView":4,
                                    "spaceBetween":12},
                                "840":{
                                    "slidesPerView":4,
                                    "spaceBetween":12},
                                "1140":{
                                    "slidesPerView":10,
                                    "spaceBetween":12}
                                }
                            }'>
                            <?php $category_name = ''; ?>
                            <div class="swiper-wrapper">
                                <?php
                                $category_product = "SELECT * FROM category WHERE parent_id = 0";
                                $result = mysqli_query($conn, $category_product);
                                while ($best_seller = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="swiper-slide">
                                        <a href="shop-grid-sidebar.php?category_id=<?php echo $best_seller['id'] ?>" class="single-category-one">
                                            <img src="upload/<?= $best_seller['category_image']; ?>">
                                            <p class='text-dark'><?= $best_seller['category_name']; ?></p>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts category area end -->
</div>




<!-- rts grocery feature area start -->

<div class="rts-grocery-feature-area rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left">
                        Featured Grocery
                    </h2>
                    <div class="next-prev-swiper-wrapper">
                        <div class="swiper-button-prev"><i class="fa-regular fa-chevron-left"></i></div>
                        <div class="swiper-button-next"><i class="fa-regular fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-area-main-wrapper-one">
                    <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                            "spaceBetween":16,
                            "slidesPerView":6,
                            "loop": true,
                            "speed": 700,
                            "navigation":{
                                "nextEl":".swiper-button-next",
                                "prevEl":".swiper-button-prev"
                              },
                            "breakpoints":{
                            "0":{
                                "slidesPerView":1,
                                "spaceBetween": 12},
                            "320":{
                                "slidesPerView":1,
                                "spaceBetween":12},
                            "480":{
                                "slidesPerView":2,
                                "spaceBetween":12},
                            "640":{
                                "slidesPerView":2,
                                "spaceBetween":16},
                            "840":{
                                "slidesPerView":3,
                                "spaceBetween":16},
                            "1140":{
                                "slidesPerView":5,
                                "spaceBetween":16},
                            "1540":{
                                "slidesPerView":5,
                                "spaceBetween":16},
                            "1840":{
                                "slidesPerView":6,
                                "spaceBetween":16}
                            }
                        }'>
                        <div class="swiper-wrapper">
                            <?php
                                $featured_product_section = "SELECT * FROM product WHERE  status = '1' AND featured_product = '1'";
                                $featured_result = mysqli_query($conn, $featured_product_section);
                                while ($featured_product = mysqli_fetch_assoc($featured_result)) {
                                ?>
                            <div class="swiper-slide">
                                <div class="single-shopping-card-one">
                                    <!-- iamge and sction area start -->
                                    <div class="image-and-action-area-wrapper">
                                        <a href="shop-details.php?id=<?php echo $featured_product['id'] ?>" class="thumbnail-preview">
                                            <div class="badge">
                                                <span>25% <br>
                                                    Off
                                                </span>
                                                <i class="fa-solid fa-bookmark"></i>
                                            </div>
                                            <img src="upload/<?= $featured_product['product_image'] ?>" alt="grocery">
                                        </a>
                                        <div class="action-share-option">
                                            <div class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                <i class="fa-light fa-heart"></i>
                                            </div>
                                            <div class="single-action openuptip" data-flow="up" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa-solid fa-arrows-retweet"></i>
                                            </div>
                                            <div class="single-action openuptip cta-quickview product-details-popup-btn" data-flow="up" title="Quick View">
                                                <i class="fa-regular fa-eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- iamge and sction area start -->

                                    <div class="body-content">

                                        <a href="shop-details.html">
                                            <h4 class="title"><?= $featured_product['product_title'] ?></h4>
                                        </a>
                                        <span class="availability"><?= $featured_product['product_sku'] ?></span>
                                        <div class="price-area">
                                            <span class="current">$<?= $featured_product['product_price'] ?></span>
                                            <div class="previous"><?//= $featured_product['product_price'] ?></div>
                                        </div>
                                        <div class="cart-counter-action">
                                            <div class="quantity-edit">
                                                <input type="hidden" id="product_id" value="<?=  $featured_product['id']; ?>">
                                                <input type="text" id="qty" name="qty" class="input" value="1">
                                                <div class="button-wrapper-action">
                                                    <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                    <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                                </div>
                                            </div> 
                                            <a  class="rts-btn btn-primary radious-sm with-icon">
                                                <div class="btn-text" onclick="add_to_cart(<?= $featured_product['id'] ?>)">
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
                            <?php }?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts grocery feature area end -->

<!-- rts grocery feature area start -->
<div class="rts-grocery-feature-area rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left">
                        Products With Discounts
                    </h2>
                    <div class="countdown">
                        <div class="countDown">10/05/2025 10:20:00</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-with-discount">
                    <div class="row g-5">
                        <div class="col-xl-12 col-lg-12">
                            <div class="row">
                                  <?php
                                $discounted_product_section = "SELECT * FROM product WHERE  status = '1' AND discounted_product = '1'";
                                $discounted_result = mysqli_query($conn, $discounted_product_section);
                                while ($discounted_product = mysqli_fetch_assoc($discounted_result)) {
                                ?>
                                <div class="col-lg-4 mb-4">
                                    <div class="single-shopping-card-one discount-offer">
                                        <a href="shop-details.php?id=<?php echo $discounted_product['id'] ?>" class="thumbnail-preview">
                                            <!-- <div class="badge">
                                                <span>25% <br>
                                                    Off
                                                </span>
                                                <i class="fa-solid fa-bookmark"></i>
                                            </div> -->
                                            <img src="upload/<?= $discounted_product['product_image'] ?>" alt="grocery">
                                        </a>
                                        <div class="body-content">

                                            <a href="shop-details.php?id=<?php echo $discounted_product['id'] ?>">
                                                <h4 class="title"><?= $discounted_product['product_title'] ?> </h4>
                                            </a>
                                            <span class="availability"><?= $discounted_product['product_sku'] ?></span>
                                            <div class="price-area">
                                                <span class="current">$<?= $discounted_product['product_price'] ?></span>
                                                <div class="previous"><? //= $discounted_product['product_image'] ?></div>
                                            </div> 
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" name="qty" id="qty" value="1">
                                                    <input type="hidden" id="product_id" value="<?= $discounted_product['id'] ?>">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                                    </div>
                                                </div>
                                                <a class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text" onclick="add_to_cart(<?= $discounted_product['id'] ?>)">
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
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts grocery feature area end -->


<!-- rts top tranding product area -->
<div class="top-tranding-product rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left mb--10">
                        Top Trending Products
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cover-card-main-over">
                    <div class="row g-4">
                          <?php
                                $trending_product_section = "SELECT * FROM product WHERE  status = '1' AND trending_product = '1'";
                                $trending_result = mysqli_query($conn, $trending_product_section);
                                while ($trending_product = mysqli_fetch_assoc($trending_result)) {
                                ?>
                        <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                            <div class="single-shopping-card-one tranding-product">
                                <a href="shop-details.php?id=<?= $trending_product['id'] ?>" class="thumbnail-preview">
                                    <!-- <div class="badge">
                                        <span>25% <br>
                                            Off
                                        </span>
                                        <i class="fa-solid fa-bookmark"></i>
                                    </div> -->   
                                    <img src="upload/<?=  $trending_product['product_image'] ?>" alt="grocery">
                                </a>
                                <div class="body-content">
                                    <a href="shop-details.php?id=<?= $trending_product['id'] ?>">
                                        <h4 class="title"><?=  $trending_product['product_title'] ?></h4>
                                    </a>
                                    <span class="availability"><?=  $trending_product['product_sku'] ?></span>
                                    <div class="price-area">
                                        <span class="current">$<?=  $trending_product['product_price'] ?></span>
                                        <!-- <div class="previous">$36.00</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts top tranding product area end -->

<!-- rts top tranding product area -->
<div class="blog-area-start rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left mb--0">
                        Latest Blog Post Insights 
                    </h2>
                </div>
            </div>
        </div>
        <style>
           .blog-img img{
                height: 200px;
            }
        </style>
        <div class="row">
            <div class="col-lg-12">
                <div class="cover-card-main-over blog-img">
                    <div class="row g-4">
                         <?php
                                $blog_section = "SELECT * FROM blog WHERE status = '1'";
                                $blog_result = mysqli_query($conn, $blog_section);
                                while ($blog_card = mysqli_fetch_assoc($blog_result)) {
                                ?>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <!-- single blog area start -->
                            <div class="single-blog-area-start">
                                <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="thumbnail" >
                                    <img src="upload/blog/<?= $blog_card['blog_image'] ?>" alt="blog-area" >
                                </a>
                                <div class="blog-body">
                                    <div class="top-area">
                                        <div class="single-meta">
                                            <i class="fa-light fa-clock"></i>
                                            <span><?= date('d M Y', ($blog_card['publish_date'])) ?></span>
                                        </div>
                                        <div class="single-meta">
                                            <i class="fa-regular fa-folder"></i>
                                            <span><?= $blog_card['blog_auther'] ?></span>
                                        </div>
                                    </div>
                                    <a href="blog-details.php?id=<?= $blog_card['id'] ?>">
                                        <h4 class="title"><?= $blog_card['blog_title'] ?> </h4>
                                    </a>
                                    <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="shop-now-goshop-btn">
                                        <span class="text">Read Details</span>
                                        <div class="plus-icon">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                        </div>
                                        <div class="plus-icon">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- single blog area end -->
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts top tranding product area end -->


<?php include('layout/footer.php'); ?>



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
    function add_to_cart(product_id){
    let qty = document.getElementById('qty').value;
    window.location.href = "cart.php?qty=" + qty + "&id=" + product_id;
    }
    
</script>

</body>

</html>