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
// echo "<pre>";
// print_r($_SESSION);
// exit;


// if(isset($_GET['remove_item'])){
//     unset(
//         $_SESSION['id'],
//         $_SESSION['qty']
//     );
//     header('Location: cart.php');
// }



if (isset($_GET['remove_item'])) {
    $remove_id = $_GET['remove_item'];
    
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
        }
    }

    //  CLEAR ALL ITEMS
    if (isset($_GET['clear_cart'])) {

        unset($_SESSION['cart']);    
        $_SESSION['cart'] = [];      

        header("Location: cart.php");
        exit();
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']); 
    header("Location: cart.php"); 
    exit();
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
    .single-cart-area-list.main .quantity-edit input {
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
                        <div class="">
                            <P>No</P>
                        </div>
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
                        <div class=" ">
                            <p>Remove</p>
                        </div>
                    </div>
                    <?php

                   if(isset($_SESSION['cart'])){
                        $session_cart = $_SESSION['cart'];
                    };

                    // foreach($session_cart as $cart){
                    //     $id = $cart['id'];
                    //     $main_product = "SELECT * FROM product WHERE id = '$id'";
                    //     $product = mysqli_fetch_assoc(mysqli_query($conn, $main_product));
                    //      $subtotal = $product['product_price'] * $cart['qty'];
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


                            <div class="single-cart-area-list main  item-parent">
                                <div class="product-main-cart">


                                    <div class="price">
                                        <p><?= str_pad($i, STR_PAD_LEFT) ?></p>
                                    </div>
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
                                    <p>$<?= $total ?></p>
                                </div>
                                <a href="?remove_item=<?php echo $product['id']; ?>" class="close section-activation text-danger">
                                    <i class="fa-solid fa-trash"></i></a>
                            </div>
                    <?php $i++;
                        }
                    } else echo "<p class='text-center fs-2 p-4 text-danger'>cart is empty</p>" ?>
                    <div class="bottom-cupon-code-cart-area">
                        <form action="#">
                            <input type="text" placeholder="Cupon Code">
                            <button class="rts-btn btn-primary">Apply Coupon</button>
                        </form>
                        <a href="?clear_cart=1" class="rts-btn btn-danger mr--50"
                            onclick="return confirm('Are You sure You want to clear cart?')">Clear All</a>

                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-12 order-1 order-xl-2 order-lg-1 order-md-1 order-sm-1">
                <?php
                // print_r($_SESSION);
                if (isset($_SESSION['cart'])) { ?>

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

<?php include('layout/footer.php'); ?>



<script>
    function add_to_qty(id) {
        let inc_qty = 1;
        window.location.href = "cart.php?id=" + id + '&qty=' + inc_qty;
    }

    function sub_to_qty(id) {
        let qty = parseInt(document.getElementById('qty_' + id).value);
        let dec_qty = -1;

        if (qty > 1) {

            window.location.href = "cart.php?id=" + id + '&qty=' + dec_qty;

        }



    }
</script>