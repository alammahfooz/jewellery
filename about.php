 <?php include('layout/header.php');
 
 ?>
    <!-- rts banner area about -->

    <?php 
    $about_query = "SELECT * FROM page WHERE  status = '1'";
    $result =  mysqli_query($conn, $about_query);
    $data = mysqli_fetch_assoc($result);
    
    ?>
    <div class="about-banner-area-bg rts-section-gap bg_iamge" 
    style="background-image: url('upload/<?php echo $data['banner_image']; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content-about-area">
                        <h1 class="title"><?php echo $data['title']; ?></h1>
                        <p class="disc"><?php echo $data['description']; ?>  </p>
                        <a href="contact.html" class="rts-btn btn-primary"><?= $data['banner_btn']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
        <?= $data['content']; ?>

     
    <div class="section-seperator">
        <div class="container-3">
            <hr class="section-seperator">
        </div>
    </div>
    
 
    <div class="meet-our-expart-team rts-section-gap2">
        <div class="container-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-center-area-main">
                        <h2 class="title">
                            Meet Our Expert Team
                        </h2>
                        <p class="disc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium mollis ex, vel interdum augue faucibus sit amet. Proin tempor purus ac suscipit...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--40">
                                  <?php 
                                     $team_section = "SELECT * FROM team WHERE status = 1 ORDER BY sort_order ASC";
                                     $team_result = mysqli_query($conn , $team_section);
                                     while ($team = mysqli_fetch_assoc($team_result)){
                                     ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <!-- single team area start -->
                    <div class="single-team-style-one">
                        <a href="#" class="thumbnail">
                            <img src="upload/<?= $team['team_image'] ?>"; alt="team_single">
                        </a>
                        <div class="bottom-content-area">
                            <div class="top">
                                <h3 class="title">
                                    <?= $team['title'] ?>
                                </h3>
                                <span class="designation"><?= $team['sub_title'] ?></span>
                            </div>
                            <div class="bottom">
                                <a href="#" class="number">
                                    <i class="fa-solid fa-phone-rotary"></i>
                                    <?= $team['short_description'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- single team area end -->
                </div>
               <?php   }?>
                
            </div>
        </div>
    </div>
    <!-- meet our expart end -->

    <!-- choosing reason service area start -->
    <div class="rts-service-area rts-section-gap2 bg_light-1">
        <div class="container-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-center-area-main">
                        <h2 class="title">
                            Why You Choose Us?
                        </h2>
                        <p class="disc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium mollis ex, vel interdum augue faucibus sit amet. Proin tempor purus ac suscipit...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt--30 g-5">
                 <?php 
                                     $service_section = "SELECT * FROM service WHERE status = 1 ORDER BY sort_order ASC";
                                     $service_result = mysqli_query($conn , $service_section);
                                     while ($service = mysqli_fetch_assoc($service_result)){
                                     ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="single-service-area-style-one">
                        <div class="icon-area">
                            <!-- <span class="bg-text">01</span> -->
                            <img src="upload/<?= $service['service_image'] ?>"  alt="service">
                        </div>
                        <div class="bottom-content">
                            <h3 class="title">
                                <?= $service['title'] ?>
                            </h3>
                            <p class="disc">
                                <?= $service['short_description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
             <?php }?>
            </div>
        </div>
    </div>
    <!-- choosing reason service area end -->


    <!-- rts customers feedbacka area start -->
    <div class="rts-cuystomers-feedback-area rts-section-gap2">
        <div class="container-3">
            <div class="row">
                <div class="col-lgl-12">
                    <div class="title-area-left pl--0">
                        <h2 class="title-left mb--0">
                            Customer Feedbacks
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row mt--50">
                <div class="col-lg-12">
                    <div class="customers-feedback-area-main-wrapper">
                        <!-- rts category area satart -->
                        <div class="rts-caregory-area-one ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="category-area-main-wrapper-one">
                                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                            "spaceBetween":24,
                                            "slidesPerView":2,
                                            "loop": true,
                                            "speed": 1000,
                                            "navigation":{
                                                "nextEl":".swiper-button-nexts",
                                                "prevEl":".swiper-button-prevs"
                                                },
                                            "breakpoints":{
                                            "0":{
                                                "slidesPerView":1,
                                                "spaceBetween": 24},
                                            "320":{
                                                "slidesPerView":1,
                                                "spaceBetween":24},
                                            "480":{
                                                "slidesPerView":1,
                                                "spaceBetween":24},
                                            "640":{
                                                "slidesPerView":1,
                                                "spaceBetween":24},
                                            "840":{
                                                "slidesPerView":1,
                                                "spaceBetween":24},
                                            "1140":{
                                                "slidesPerView":2,
                                                "spaceBetween":24}
                                            }
                                        }'>
                                            <div class="swiper-wrapper">
                                                    <?php 
                                     $testimonial_section = "SELECT * FROM testimonial WHERE status = 1 ORDER BY sort_order ASC";
                                     $testimonial_result = mysqli_query($conn , $testimonial_section);
                                     while ($testimonial = mysqli_fetch_assoc($testimonial_result)){
                                     ?>
                                                <!-- single swiper start -->
                                                <div class="swiper-slide">
                                                    <!-- single customers feedback area start -->
                                                    <div class="single-customers-feedback-area">
                                                        <div class="top-thumbnail-area">
                                                            <div class="left">
                                                                <img src="upload/<?= $testimonial['testimonial_user_image'] ?>" width="80" alt="logo">
                                                                <div class="information">
                                                                    <h4 class="title">
                                                                        <?= $testimonial['title']; ?>
                                                                    </h4>
                                                                    <span> <?= $testimonial['sub_title']; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <img src="upload/<?= $testimonial['testimonial_company_image'] ?>" width="80" alt="logo">
                                                            </div>
                                                        </div>
                                                        <div class="body-content">
                                                            <p class="disc">
                                                                <?= $testimonial['short_description']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- single customers feedback area end -->
                                                </div>
                                                <!-- single swiper start -->
                                                 <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- rts category area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts customers feedbacka area end -->
 
 <?php include('layout/footer.php'); ?>


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


</body>


<!-- Mirrored from html.themewant.com/ekomart/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jan 2026 07:31:13 GMT -->
</html>