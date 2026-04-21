
  <?php
  ob_start();
    include('layout/header.php');

    $product_details = 'product_details';
    $product_additional_info = 'product_additional_info';
    $id = $_GET['id'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE id='$id'"));
 

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
 
        $category_id = addslashes($_POST['category_id']);
        $product_title = addslashes($_POST['product_title']);
        $product_slug = addslashes($_POST['product_slug']);
        $product_sku = addslashes($_POST['product_sku']);
        $product_price = addslashes($_POST['product_price']);
        $product_short_des = addslashes($_POST['product_short_des']);
        $product_long_des = addslashes($_POST['product_long_des']);
        $product_additional_info = addslashes($_POST['product_additional_info']);
        $product_sort_order = addslashes($_POST['product_sort_order']);
        $product_qty = addslashes($_POST['product_qty']);

        // EDIT PAGE LOGIC
if (!empty($_FILES['product_image']['name'])) {

    $array = explode(".", $_FILES['product_image']['name']);
    $ext = strtolower(array_pop($array));
    $allowed = ['jpg','jpeg','png','gif','webp','jfif'];

    if (in_array($ext, $allowed)) {
        $thumbName = time() . "_img." . $ext;
        move_uploaded_file(  $_FILES['product_image']['tmp_name'], FS_PATH . "upload/" . $thumbName);
        $image = addslashes($thumbName);  
    }       

} else {
    $image = $_POST['old_image'];  
}


        $add_date = time();
        $status = isset($_POST['status']) ? 1 : 0;
        $featured_product = isset($_POST['featured_product']) ? 1 : 0;
        $discounted_product = isset($_POST['discounted_product']) ? 1 : 0;
        $trending_product = isset($_POST['trending_product']) ? 1 : 0;

        $update_query = "UPDATE product SET category_id = '$category_id', product_title ='$product_title', product_slug='$product_slug',
                product_sku ='$product_sku', product_price='$product_price', product_short_des = '$product_short_des', product_long_des='$product_long_des', product_sort_order='$product_sort_order', product_additional_info='$product_additional_info', product_qty ='$product_qty', product_image='$image',  add_date='$add_date' , status = '{$status}', featured_product = '{$featured_product}', discounted_product = '{$discounted_product}' trending_product = '{$trending_product}' WHERE id='$id'";
                // echo  $update_query;
                // exit;
        mysqli_query($conn, $update_query);
    }
    ?>
    <style>
.ck-editor__editable {
    min-height: 200px;
}
</style>
  <main class="nxl-container">
      <div class="nxl-content">
          <div class="main-content">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="card stretch stretch-full">
                          <form method="post" action="" class="mb-5" enctype="multipart/form-data">
                              <div class="card-body">
                                  <?php
                                    $fetch_dropdown =  "SELECT * FROM category WHERE parent_id = 0 ";
                                    $result_category = mysqli_query($conn, $fetch_dropdown);
                                    $categoryArr = array();
                                    ?>
                                  <div class="mb-4">
                                      <label for="category" class="form-label">Category</label>
                                      <select id="category" name="category_id" class="form-select form-control" data-select2-selector="category">
                                          <option value="" class="selected" aria-placeholder="category">Main Category</option>
                                          <?php

                                            while ($categoryData = mysqli_fetch_assoc($result_category)) {
                                            ?> <option value="<?php echo $categoryData['id']; ?>" <?php if ($categoryData['id'] == $row['category_id']) {                                                                                                                       
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $categoryData['category_name']; ?></option> <?php } ?>
                                      </select>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <input type="text" name="product_title" value="<?php echo $row['product_title']; ?>" class="form-control mb-2" placeholder="Product Title" required>
                                      </div>

                                      <div class="col-lg-6 mb-4">
                                          <input type="text" name="product_slug" value="<?php echo $row['product_slug']; ?>" class="form-control" placeholder="Product Slug" required>
                                      </div>
                                  </div>

                                  <div class="row">

                                      <div class="col-lg-12 mb-4">
                                          <input type="text" name="product_sku" value="<?php  echo $row['product_sku']; ?>" class="form-control" placeholder="Product SKU" required>
                                      </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <input type="number" name="product_price"  value="<?php echo $row['product_price']; ?>" class="form-control mb-2" placeholder="Product Price" required>
                                      </div>
                                      <div class="col-lg-6 mb-4">
                                          <input type="text" name="product_qty" value="<?php echo $row['product_qty']; ?>" class="form-control" placeholder="Product Quantity" required>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="product_short_des" class="form-control mb-2" placeholder="Product Short Description" required><?php echo $row['product_short_des']; ?></textarea>
                                      </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="product_long_des" id="editors" rows="8" class="form-control mb-2" placeholder="Product Long Description"><?php echo $row['product_long_des']; ?></textarea>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="product_details" id="editor" rows="8" class="form-control mb-2" placeholder="Product Details" ><?php echo $row['product_details']; ?></textarea>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="product_additional_info" id="editor1" rows="8" class="form-control mb-2" placeholder="Product Additional Information"><?php echo $row['product_additional_info']; ?></textarea>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <input type="number" name="product_sort_order" value="<?php echo $row['product_sort_order']; ?>" class="form-control mb-2" placeholder="Product Sort Order">
                                      </div>
                                  </div>
                                  
                                   <div class="row">
                                    <label class="fs-6">Upload Product Image</label>

                                    <div class="col-lg-12 mb-4">
                                <input type="file" name="product_image" class="form-control mb-2">

                                <input type="hidden" name="old_image" value="<?= $row['product_image']; ?>">

                                <img src="<?php echo HTTP_SERVER .'upload/'. $row['product_image']; ?>" width="120">
                                      <!--    <label for="" class="fs-6">Upload Product Image </label>
                                          <input type="file" name="product_image" value="<?php // echo $row['product_image']; ?>" class="form-control mb-2" placeholder="Product Image"></textarea>
                                      </div> -->
                                  </div>

                                  <div class="row d-flex my-5 fs-6">
                                     <div class="form-check form-switch ps-5">
                                              <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                                                  <?php echo (isset($row['status']) && $row['status'] == 1) ? 'checked' : ''; ?>>
                                              <label class="form-check-label fw-500 text-dark" for="status">
                                                  Status
                                              </label>
                                          </div>
                                  </div>
                                  
                                  <div class="row d-flex my-5 fs-6">
                                     <div class="form-check form-switch ps-5">
                                              <input class="form-check-input" type="checkbox" id="featured_product" name="featured_product" value="1"
                                                  <?php echo (isset($row['featured_product']) && $row['featured_product'] == 1) ? 'checked' : ''; ?>>
                                              <label class="form-check-label fw-500 text-dark" for="featured_product">
                                                  Featured Product
                                              </label>
                                     </div>
                                  </div>
                                  <div class="row d-flex my-5 fs-6">
                                     <div class="form-check form-switch ps-5">
                                              <input class="form-check-input" type="checkbox" id="discounted_product" name="discounted_product" value="1"
                                                  <?php echo (isset($row['discounted_product']) && $row['discounted_product'] == 1) ? 'checked' : ''; ?>>
                                              <label class="form-check-label fw-500 text-dark" for="discounted_product">
                                                  Discounts Product
                                              </label>
                                     </div>
                                  </div>
                                  <div class="row d-flex my-5 fs-6">
                                     <div class="form-check form-switch ps-5">
                                              <input class="form-check-input" type="checkbox" id="trending_product" name="trending_product" value="1"
                                                  <?php echo (isset($row['trending_product']) && $row['trending_product'] == 1) ? 'checked' : ''; ?>>
                                              <label class="form-check-label fw-500 text-dark" for="trending_product">
                                                  Trending Product
                                              </label>
                                     </div>
                                  </div>

                                  <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                                      <input type="submit" name="submit" class="btn btn-primary ">
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
         
      </div>
      <?php include('layout/footer.php') ?>
</main>
 
     
    