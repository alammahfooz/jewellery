<?php
include('layout/header.php');

$category_id = "";
$subcategorys  = "";


// price filter

// if (isset($_GET['min_price']) && $_GET['min_price'] != '') {
//     $min = mysqli_query($conn, $_GET['min_price']);
//     $sql .= " AND price >= $min";
// }

// if (isset($_GET['max_price']) && $_GET['max_price'] != '') { {
//         $max = mysqli_query($conn, $_GET['max_price']);
//         $sql .= "AND price <= $max";
//     }
// }


// FILTER FOR Category product come
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
<div class="rts-navigation-area-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index.php">Home</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="index.php">Shop Grid Sidebar</a>
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

<!-- shop[ grid sidebar wrapper -->
<div class="shop-grid-sidebar-area rts-section-gap">
    <div class="container">
        <div class="row g-0">
            <div class="col-xl-3 col-lg-12 pr--70 pr_lg--10 pr_sm--10 pr_md--5 rts-sticky-column-item">
                <div class="sidebar-filter-main theiaStickySidebar">
                    <div class="single-filter-box">
                        <h5 class="title">Widget Price Filter</h5>
                        <div class="filterbox-body">
                            <form action="" mathod="GET" class="price-input-area">
                                <div class="half-input-wrapper">
                                    <div class="single">
                                        <label for="min_price">Min price</label>
                                         <input id="category_id" type="hidden" name="category_id" value="<?= $_GET['category_id'] ?? ''; ?>" placeholder="$0">
                                        <input id="min_price" type="number" name="min_price" value="<?= $_GET['min_price'] ?? ''; ?>" placeholder="$0">
                                        
                                    </div>
                                    <div class="single">
                                        <label for="max_price">Max price</label>
                                        <input id="max_price" type="number" name="max_price" value="<?= $_GET['max_price'] ?? ''; ?>" placeholder="$500">
                                       
                                   
                                    </div>
                                    </div>
                                    <!-- <input type="range" class="range"> -->

                                <div class="filter-value-min-max mt-5">
                                    <span></span>
                                    <button class="rts-btn btn-primary">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form action="" method="GET">
                        <div class="single-filter-box">
                            <h5 class="title">Product Categories</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    <?php
                                    $selected = '';
                                    if (isset($_GET['category_id'])) {
                                        $selected = $_GET['category_id'];
                                    }
                                    $category_list = "SELECT * FROM category WHERE  parent_id = 0";
                                    $category = mysqli_query($conn, $category_list);
                                    while ($parent = mysqli_fetch_assoc($category)) {
                                    ?>

                                        <div class="single-category">
                                            <input id="category<?= $parent['id'] ?>" name="category_id" value="<?= $parent['id'] ?>" type="radio"
                                                <?php if (isset($_GET['category_id']) && $parent['id'] == $_GET['category_id']) {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="category<?= $parent['id'] ?>">
                                                <?= $parent['category_name'] ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div style="display:flex; justify-content:end;">
                                    <button type="submit" class="rts-btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                    <form action="" method="GET">
                        <div class="single-filter-box">
                            <h5 class="title">Product Sub Category</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    <?php
                                    $selected = '';
                                    if (isset($_GET['subcategory'])) {
                                        $selected  = $_GET['subcategory'];
                                    }
                                    $subcategory_data = "SELECT * FROM category WHERE parent_id != 0";
                                    $result_sub = mysqli_query($conn, $subcategory_data);
                                    while ($subcategory = mysqli_fetch_assoc($result_sub)) {
                                    ?>
                                        <div class="single-category">
                                            <input id="subcategory<?= $subcategory['id'] ?>" name="subcategory" value="<?= $subcategory['id'] ?>" type="radio"
                                                <?php if (isset($_GET['subcategory']) && $subcategory['id'] == $_GET['subcategory']) {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="subcategory<?= $subcategory['id'] ?>"><?= $subcategory['category_name']; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div style="display: flex; justify-content: end;">
                                    <button type="submit" class="rts-btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="single-filter-box">
                        <h5 class="title">Select Brands</h5>
                        <div class="filterbox-body">
                            <div class="category-wrapper">
                                <!-- single category -->
                                <div class="single-category">
                                    <input id="cat13" type="checkbox">
                                    <label for="cat13">Frito Lay
                                    </label>
                                </div>
                                <!-- single category end -->
                                <!-- single category -->
                                <div class="single-category">
                                    <input id="cat14" type="checkbox">
                                    <label for="cat14">Nespresso
                                    </label>
                                </div>
                                <!-- single category end -->
                                <!-- single category -->
                                <div class="single-category">
                                    <input id="cat15" type="checkbox">
                                    <label for="cat15">Oreo
                                    </label>
                                </div>
                                <!-- single category end -->
                                <!-- single category -->
                                <div class="single-category">
                                    <input id="cat16" type="checkbox">
                                    <label for="cat16">Quaker
                                    </label>
                                </div>
                                <!-- single category end -->
                                <!-- single category -->
                                <div class="single-category">
                                    <input id="cat17" type="checkbox">
                                    <label for="cat17">Welch's
                                    </label>
                                </div>
                                <!-- single category end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12">
                <div class="filter-select-area">
                    <div class="top-filter">
                        <span>Showing 1–20 of 57 results</span>
                        <div class="right-end">
                            <span>Sort: Short By Latest</span>
                            <div class="button-tab-area">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link single-button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                <rect x="0.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                <rect x="9.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                                <rect x="9.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3B28" />
                                            </svg>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link single-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3C28" />
                                                <rect x="0.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3C28" />
                                                <rect x="9" y="3" width="7" height="1" fill="#2C3C28" />
                                                <rect x="9" y="12" width="7" height="1" fill="#2C3C28" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="nice-select-area-wrapper-and-button">
                        <div class="nice-select-wrapper-1">
                            <div class="single-select">
                                <select>
                                    <option data-display="All Categories">All Categories</option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled>A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                            <div class="single-select">
                                <select>
                                    <option data-display="All Brands">All Brands</option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled>A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                            <div class="single-select">
                                <select>
                                    <option data-display="All Size">All Size </option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled>A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                            <div class="single-select">
                                <select>
                                    <option data-display="All Weight">All Weight</option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled>A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                        </div>
                        <div class="button-area">
                            <button class="rts-btn">Filter</button>
                            <button class="rts-btn">Reset Filter</button>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="product-area-wrapper-shopgrid-list mt--20 tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row g-4">
                            <?php   
                           
                            if(isset($_GET['min_price']) AND isset($_GET['max_price'])) {
                                 $min_price = $_GET['min_price'];
                                 $max_price = $_GET['max_price'];
                                 $category_id = $_GET['category_id'];
                                 $main_product = "SELECT * FROM  product  WHERE category_id = $category_id AND product_price BETWEEN $min_price AND $max_price";    
                            

                             }else{
                             if (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];

                            }elseif(isset($_GET['subcategory'])){
                                $category_id = $_GET['subcategory'];
                            } 
                            $main_product = "SELECT * FROM  product WHERE category_id = $category_id" ;
                            }
                           

                            
                            

                            $result = mysqli_query($conn, $main_product);
                             while ($product = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="col-lg-20 col-lg-4 col-md-6 col-sm-6 col-12">
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
                                                <img src="upload/<?= $product['product_image']; ?>" alt="grocery">
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

                                            <a href="shop-details.php?id=<?= $product['id']; ?>">
                                                <h4 class="title"><?= $product['product_title']; ?></h4>
                                            </a>
                                            <!-- <span class="availability">500g Pack</span> -->
                                            <div class="price-area">
                                                <span class="current">$<?= $product['product_price']; ?></span>
                                                <!-- <div class="previous">$36.00</div> -->
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="hidden" id="product_id" value="<?= $product['id']; ?>">
                                                    <input type="text" id="qty" name="qty" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                                    </div>
                                                </div>
                                                <a class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text" onclick="add_to_cart(<?= $product['id']; ?>)">
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
                            <?php   } ?>

                        </div>
                    </div>
                    <div class="product-area-wrapper-shopgrid-list with-list mt--20 tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/03.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/04.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Varts Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/05.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/06.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/01.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/03.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/04.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/05.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/06.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shopping-card-one discount-offer">
                                    <a href="shop-details.html" class="thumbnail-preview">
                                        <div class="badge">
                                            <span>25% <br>
                                                Off
                                            </span>
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                        <img src="assets/images/grocery/01.jpg" alt="grocery">
                                    </a>
                                    <div class="body-content">
                                        <div class="title-area-left">
                                            <a href="shop-details.html">
                                                <h4 class="title">Nestle Cerelac Mixed Fruits &amp;
                                                    Wheat with Milk</h4>
                                            </a>
                                            <span class="availability">500g Pack</span>
                                            <div class="price-area">
                                                <span class="current">$36.00</span>
                                                <div class="previous">$36.00</div>
                                            </div>
                                            <div class="cart-counter-action">
                                                <div class="quantity-edit">
                                                    <input type="text" class="input" value="1">
                                                    <div class="button-wrapper-action">
                                                        <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                        <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
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
                                            </div>
                                        </div>
                                        <div class="natural-value">
                                            <h6 class="title">
                                                Nutritional Values
                                            </h6>
                                            <div class="single">
                                                <span>Energy(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Protein(g):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>magnetiam(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Calory(kcal):</span>
                                                <span>211</span>
                                            </div>
                                            <div class="single">
                                                <span>Vitamine(kcal):</span>
                                                <span>211</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
    function add_to_cart(product_id) {
        let qty = document.getElementById('qty').value;
        window.location.href = "cart.php?qty=" + qty + "&id=" + product_id;
    }
</script>