<?php
include('admin/include/dbconnect.php');
include('admin/include/configuration.php');
include('layout/header.php');
?>


    <div class="rts-navigation-area-breadcrumb bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="index.php">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="#" href="index.php">Beverage</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="index.php">2L Mum Water</a>
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

    <?php 
    $id = $_GET['id'];
    $main_product = "SELECT * FROM product WHERE status = '1' AND id = $id";
    $result = mysqli_query($conn, $main_product);
    while($product = mysqli_fetch_assoc($result)){

    ?>
    <div class="rts-chop-details-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="shopdetails-style-1-wrapper">
                <div class="row g-5">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="product-details-popup-wrapper in-shopdetails">
                            <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
                                <div class="product-details-popup">
                                    <div class="details-product-area">
                                        <div class="product-thumb-area">
                                            <div class="cursor"></div>
                                            <div class="thumb-wrapper one filterd-items figure">
                                                <div class="product-thumb zoom" onmousemove="zoom(event)" style="background-image: url('upload/<?= $product['product_image']; ?>')"><img src="upload/<?= $product['product_image']; ?>" alt="product-thumb">
                                                </div>
                                            </div>
                                           
                                            <div class="product-thumb-filter-group">
                                                <div class="thumb-filter filter-btn active" data-show=".one"><img src="upload/<?= $product['product_image']; ?>" alt="product-thumb-filter"></div>
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
                                            <h2 class="product-title"><?= $product['product_title'] ?></h2>
                                            <p class="mt--20 mb--20">
                                                <?= $product['product_long_des']; ?>
                                            </p>
                                            <span class="product-price mb--15 d-block" style="color: #DC2626; font-weight: 600;"> $<?= $product['product_price'] ?>
                                            <!-- <span class="old-price ml--15">$69.35</span> -->
                                        </span>
                                        <input type="hidden" id="product_id" value="<?= $product['id']; ?>">
                                            <div class="product-bottom-action">
                                            <div class="cart-edits">
                                                    <div class="quantity-edit action-item">
                                                        <button class="button"><i class="fal fa-minus minus"></i></button>
                                                        <input type="text" id="qty" name="qty" class="input" value="1" />
                                                        <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                                                    </div>
                                            </div>
                                                <a   class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text" onclick="add_to_cart()">
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
                                                <span class="sku product-unipue mb--10"><span style="font-weight: 400; margin-right: 10px;">SKU: </span> <?= $product['product_sku'] ?></span>
                                                <span class="catagorys product-unipue mb--10"><span style="font-weight: 400; margin-right: 10px;">Categories: </span> T-Shirts, Tops, Mens</span>
                                                <span class="tags product-unipue mb--10"><span style="font-weight: 400; margin-right: 10px;">Tags: </span> fashion, t-shirts, Men</span>
                                                <span class="tags product-unipue mb--10"><span style="font-weight: 400; margin-right: 10px;">LIFE:: </span> 6 Months</span>
                                                <span class="tags product-unipue mb--10"><span style="font-weight: 400; margin-right: 10px;">Type: </span> original</span>
                                                <span class="tags product-unipue mb--10"><span style="font-weight: 400; margin-right: 10px;">Category: </span> Beverages, Dairy & Bakery</span>
                                            </div>
                                            <div class="share-option-shop-details">
                                                <div class="single-share-option">
                                                    <div class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </div>
                                                    <span>Add To Wishlist</span>
                                                </div>
                                                <div class="single-share-option">
                                                    <div class="icon">
                                                        <i class="fa-solid fa-share"></i>
                                                    </div>
                                                    <span>Share On social</span>
                                                </div>
                                                <div class="single-share-option">
                                                    <div class="icon">
                                                        <i class="fa-light fa-code-compare"></i>
                                                    </div>
                                                    <span>Compare</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-discription-tab-shop mt--50">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Product Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Additional Information</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tabt" data-bs-toggle="tab" data-bs-target="#profile-tab-panes" type="button" role="tab" aria-controls="profile-tab-panes" aria-selected="false">Customer Reviews (01)</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade   show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        <p class="disc">
                                            Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.
                                        </p>
                                        <div class="details-row-2">
                                            <!-- <div class="left-area">
                                                <img src="assets/images/shop/06.html" alt="shop">
                                            </div> -->
                                            <?= $product['product_details']; ?>  
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        <p class="disc">
                                            Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.                 
                                        </p>
                                        <div class="table-responsive table-shop-details-pd">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Kitchen Fade Defy</th>
                                                        <th>5KG</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>PRAN Full Cream Milk Powder</td>
                                                        <td>3KG</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Net weight</td>
                                                        <td>8KG</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brand</td>
                                                        <td>Reactheme</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Item code</td>
                                                        <td>4000000005</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product type</td>
                                                        <td>Powder milk</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="cansellation mt--20">
                                            <span> Return/cancellation:</span> No change will be applicable which are already delivered to customer. If product quality or quantity problem found then customer can return/cancel their order on delivery time with presence of delivery person.
                                        </p>
                                        <p class="note">
                                            <span>Note:</span> Product delivery duration may vary due to product availability in stock.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-panes" role="tabpanel" aria-labelledby="profile-tabt" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        <div class="product-details-review-product-style">
                                            <div class="average-stars-area-left">
                                                <div class="top-stars-wrapper">
                                                    <h4 class="review">
                                                        5.0
                                                    </h4>
                                                    <div class="rating-disc">
                                                        <span>Average Rating</span>
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <span>(1 Reviews & 0 Ratings)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="average-stars-area">
                                                    <h4 class="average">66.7%</h4>
                                                    <span>Recommended
                                                        (2 of 3)</span>
                                                </div>
                                                <div class="review-charts-details">
                                                    <div class="single-review">
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="single-progress-area-incard">
                                                            <div class="progress">
                                                                <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <span class="pac">100%</span>
                                                    </div>
                                                    <div class="single-review">
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                        </div>
                                                        <div class="single-progress-area-incard">
                                                            <div class="progress">
                                                                <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <span class="pac">80%</span>
                                                    </div>
                                                    <div class="single-review">
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                        </div>
                                                        <div class="single-progress-area-incard">
                                                            <div class="progress">
                                                                <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <span class="pac">60%</span>
                                                    </div>
                                                    <div class="single-review">
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                        </div>
                                                        <div class="single-progress-area-incard">
                                                            <div class="progress">
                                                                <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <span class="pac">40%</span>
                                                    </div>
                                                    <div class="single-review">
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                        </div>
                                                        <div class="single-progress-area-incard">
                                                            <div class="progress">
                                                                <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <span class="pac">30%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit-review-area">
                                                <form action="#" class="submit-review-area">
                                                    <h5 class="title">Submit Your Review</h5>
                                                    <div class="your-rating">
                                                        <span>Your Rating Of This Product :</span>
                                                        <div class="stars">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="half-input-wrapper">
                                                        <div class="half-input">
                                                            <input type="text" placeholder="Your Name*">
                                                        </div>
                                                        <div class="half-input">
                                                            <input type="text" placeholder="Your Email *">
                                                        </div>
                                                    </div>
                                                    <textarea name="#" id="#" placeholder="Write Your Review" required></textarea>
                                                    <button class="rts-btn btn-primary">SUBMIT REVIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 offset-xl-1  rts-sticky-column-item">
                        <div class="theiaStickySidebar">
                            <div class="shop-sight-sticky-sidevbar  mb--20">
                                <h6 class="title">Available offers</h6>
                                <div class="single-offer-area">
                                    <div class="icon">
                                        <img src="assets/images/shop/01.html" alt="icon">
                                    </div>
                                    <div class="details">
                                        <p>Get %5 instant discount for the 1st Flipkart Order using Ekomart UPI T&C</p>
                                    </div>
                                </div>
                                <div class="single-offer-area">
                                    <div class="icon">
                                        <img src="assets/images/shop/02.html" alt="icon">
                                    </div>
                                    <div class="details">
                                        <p>Flat $250 off on Citi-branded Credit Card EMI Transactions on orders of $30 and above T&C</p>
                                    </div>
                                </div>
                                <div class="single-offer-area">
                                    <div class="icon">
                                        <img src="assets/images/shop/03.html" alt="icon">
                                    </div>
                                    <div class="details">
                                        <p>Free Worldwide Shipping on all
                                            orders over $100</p>
                                    </div>
                                </div>
                            </div>
                            <div class="our-payment-method">
                                <h5 class="title">Guaranteed Safe Checkout</h5>
                                <img src="assets/images/shop/03-2.html" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php   } ?>


    

    <!-- rts grocery feature area start -->
    <div class="rts-grocery-feature-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Related Product
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
                            "380":{
                                "slidesPerView":1,
                                "spaceBetween":12},
                            "480":{
                                "slidesPerView":2,
                                "spaceBetween":12},
                            "640":{
                                "slidesPerView":2,
                                "spaceBetween":16},
                            "840":{
                                "slidesPerView":4,
                                "spaceBetween":16},
                            "1540":{
                                "slidesPerView":6,
                                "spaceBetween":16}
                            }
                        }'>
                            <div class="swiper-wrapper">
                                <!-- single swiper start -->
                                 

                                <?php 
                                 $id = $_GET['id'];
                                $related_product = "SELECT * FROM  `product` WHERE status = '1' AND featured_product = '1'";
                                $result = mysqli_query($conn , $related_product);
                                while($product = mysqli_fetch_assoc($result)){
?>
                               
                                <div class="swiper-slide">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="shop-details.php?id=<?= $product['id']; ?>" class="thumbnail-preview">
                                                <div class="badge">
                                                    <span>25% <br> 
                                                        Off
                                                    </span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </div>
                                                <img src="upload/<?= $product['product_image'] ?>" alt="grocery">
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
                                            <div class="time-tag">
                                                <i class="fa-light fa-clock"></i>
                                                9 MINS
                                            </div>
                                            <a href="#">
                                                <h4 class="title"><?= $product['product_title'] ?> </h4>
                                            </a>  
                                            <span class="availability"><?= $product['product_sku'] ?></span>
                                            <div class="price-area">
                                                <span class="current"><?= $product['product_price'] ?></span>
                                                <!-- <div class="previous">$36.00</div> -->
                                            </div>
                                            <input type="hidden" id="product_id" value="<?= $product['id']; ?>" >
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" name="qty" id="qty" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                                    </div>
                                                </div>

                                                <a   class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text"  onclick="add_to_cart()">
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

                                <?php  }?>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts grocery feature area end -->

 

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
function add_to_cart(){
  let qty = document.getElementById('qty').value;
  let product_id = document.getElementById('product_id').value;
  window.location.href = "cart.php?qty=" + qty + "&id=" + product_id;
}
</script>