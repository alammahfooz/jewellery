<?php
    ob_start();
    include('layout/header.php');
 
    
    if (isset($_POST['submit'])) {
        // print_r($_POST);
        // exit;
        $category_id = addslashes($_POST['category_id']);
        $product_title = addslashes($_POST['product_title']);
        $product_slug = addslashes($_POST['product_slug']);
        $product_sku = addslashes($_POST['product_sku']);
        $product_price = addslashes($_POST['product_price']);
        $product_short_des = addslashes($_POST['product_short_des']);
        $product_details = addslashes($_POST['product_details']);
        $product_short_des = addslashes($_POST['product_short_des']);
        $product_additional_info = addslashes($_POST['product_additional_info']);
        $product_sort_order = addslashes($_POST['product_sort_order']);
        $product_qty = addslashes($_POST['product_qty']);

        $array = explode(".", $_FILES['product_image']['name']);
        $time = time();
        $ext = array_pop($array);
        if(!empty($ext)){
            if($ext == 'jpg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'png' || $ext == 'gif' || $ext == 'GIF' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'WEBP'){
              $thumbName = time() . "_img." . $ext;
              move_uploaded_file($_FILES['product_image']['tmp_name'], FS_PATH. "upload/" . $thumbName);
            }
            $image = addslashes($thumbName);
        }






          $add_date = time();

        $sql_query = "INSERT INTO product (`category_id`, `product_title`, `product_slug`, `product_sku`, `product_price`, `product_short_des`, `product_long_des`, `product_details`, `product_additional_info`, `product_sort_order`, `product_qty`, `product_image`, `add_date`) VALUES ('{$category_id}', '{$product_title}', '{$product_slug}', '{$product_sku}',  '{$product_price}', '{$product_short_des}', '{$product_long_des}', '{$product_details}', '{$product_additional_info}', '{$product_sort_order}', '{$product_qty}', '{$image}', '{$add_date}')";
        // echo $sql_query;
        // exit;
        mysqli_query($conn, $sql_query);
        header("Location: product-list.php?msg_id=5");
    }

    ?>


 <?php


    $msg = "";

    // If upload button is clicked ...

    ?>
<style>
.ck-editor__editable {
    min-height: 200px;
}
</style>



 <main class="nxl-container">
     <div class="nxl-content">

         <div class="main-content mb-5">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="card stretch stretch-full">
                         <form method="post" action="" class="mb-5" enctype="multipart/form-data">
                             <div class="card-body">
                                 <?php
                                    $fetch_dropdown =  "SELECT * FROM category WHERE parent_id =0 ";
                                    $result_category = mysqli_query($conn, $fetch_dropdown);
                                    $categoryArr = array();
                                    ?>
                                 <div class="mb-4">
                                     <label for="category" class="form-label">Category</label>
                                     <select id="category" name="category_id" class="form-select form-control" data-select2-selector="category">
                                         <option value="" class="selected" aria-placeholder="category">Category</option>
                                         <?php

                                            while ($categoryData = mysqli_fetch_assoc($result_category)) {
                                            ?>
                                             <option value="<?php echo $categoryData['id'];   ?>"><?php echo $categoryData['category_name'];   ?></option>

                                         <?php } ?>
                                     </select>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-6 mb-4">
                                         <input type="text" name="product_title" value="" class="form-control mb-2" placeholder="Product Title" required>
                                     </div>
                                     <div class="col-lg-6 mb-4">
                                         <input type="text" name="product_slug" value="" class="form-control" placeholder="Product Slug" required>
                                     </div>
                                 </div>

                                 <div class="row">

                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="product_sku" value="" class="form-control" placeholder="Product SKU" required>
                                     </div>
                                 </div>


                                 <div class="row">
                                     <div class="col-lg-6 mb-4">
                                         <input type="number" name="product_price" value="" class="form-control mb-2" placeholder="Product Price" required>
                                     </div>
                                     <div class="col-lg-6 mb-4">
                                         <input type="text" name="product_qty" value="" class="form-control" placeholder="Product Quantity" required>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="product_short_des" value="" class="form-control mb-2" placeholder="Product Short Description" required></textarea>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="product_long_des" value="" rows="8" class="form-control mb-2" placeholder="Product Long Description" required></textarea>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="product_details" id="editor1" name="product_long_des" value="" rows="8" class="form-control mb-2" placeholder="Product Details" required></textarea>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="product_additional_info" id="editor1" name="product_long_des" value="" rows="8" class="form-control mb-2" placeholder="Product Additional Information" required></textarea>
                                     </div>
                                 </div>
                                 
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="number" name="product_sort_order" value="" class="form-control mb-2" placeholder="Product Sort Order" required>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12 mb-4 d-flex ">
                                         <label for="" class="fs-6"> Upload Product Image </label>
                                         <input type="file" name="product_image" value="" class="form-control mb-2" placeholder="Product Image"></textarea>
                                     </div>
                                 </div>

                                 <div class="row d-flex my-5 fs-6">
                                     <div class="form-check form-switch form-switch-sm ps-5 ">
                                         <label class="form-check-label fw-500 text-dark c-pointer" for="commentSwitch">Status</label>
                                         <input class="form-check-input c-pointer" type="checkbox" id="commentSwitch">
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
         <!-- [ Main Content ] end -->
     </div>
     <?php include('layout/footer.php'); ?>
     <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

     <script>
        ClassicEditor.create(document.querySelector('#editor1'))
        ClassicEditor.create(document.querySelector('#edito2'))
</script> -->
