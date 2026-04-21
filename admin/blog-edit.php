<?php
ob_start();
include('layout/header.php');


$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM blog_category WHERE id='$id'"));


if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    $category_id = addslashes($_POST['category_id']);
    $blog_title = addslashes($_POST['blog_title']);
    $blog_slug = addslashes($_POST['blog_slug']);
    $blog_auther = addslashes($_POST['blog_auther']);
    $short_description = addslashes($_POST['short_description']);
    $long_description = addslashes($_POST['long_description']);
    $additional_info = addslashes($_POST['additional_info']);
    $sort_order = addslashes($_POST['sort_order']);
    $array = explode(".", $_FILES['blog_image']['name']);
    $publish_date = addslashes($_POST['publish_date']);
    $time = time();

    // EDIT PAGE LOGIC
    if (!empty($_FILES['blog_image']['name'])) {

        $array = explode(".", $_FILES['blog_image']['name']);
        $ext = strtolower(array_pop($array));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'jfif'];

        if (in_array($ext, $allowed)) {
            $thumbName = time() . "_img." . $ext;
            move_uploaded_file($_FILES['blog_image']['tmp_name'], FS_PATH . "upload/blog/" . $thumbName);
            $image = addslashes($thumbName);
        }
    } else {
        $image = $_POST['old_image'];
    }


    $add_date = time();
    $status = isset($_POST['status']) ? 1 : 0;


    $update_query = "UPDATE `blog` SET category_id = '$category_id', blog_title ='$blog_title', blog_slug='$blog_slug',
        blog_auther ='$blog_auther', short_description='$short_description', long_description = '$long_description', additional_info='$additional_info', sort_order='$sort_order', blog_image='$image', publish_date='$publish_date', add_date='$add_date' , status = '{$status}',  WHERE id='$id'";
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
                                $fetch_dropdown =  "SELECT * FROM blog_category WHERE parent_id = 0 ";
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
                                        <label for="blog_title" class="form-label fs-6 mb-2">Blog Title</label>

                                        <input type="text" name="blog_title" value="<?php echo $row['blog_title']; ?>" class="form-control mb-2" placeholder="Title" required>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="blog_title" class="form-label mb-2 fs-6 mb-2">Blog Slug</label>
                                        <input type="text" name="blog_slug" value="<?php echo $row['blog_slug']; ?>" class="form-control" placeholder="Slug" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="blog_auther" class="form-label fs-6 mb-2"> Author Name</label>
                                        <input type="text" name="blog_auther" value="<?php echo $row['blog_auther']; ?>" class="form-control" placeholder="Author Name:" required>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="blog_auther" class="form-label fs-6 mb-2"> Sort Order</label>
                                        <input type="number" name="sort_order" value="<?php echo $row['sort_order']; ?>" class="form-control mb-2 fs-6" placeholder="Sort Order" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="short_description" class="form-label fs-6 mb-2">Short Description</label>
                                        <input type="number" name="short_description" value="<?php echo $row['short_description']; ?>" class="form-control mb-2" placeholder="Short Description" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="short_description" class="form-label fs-6 mb-2">Long Description</label>
                                        <textarea type="text" name="long_description" id="editor" value="<?php echo $row['long_description']; ?>" rows="8" class="form-control mb-2" placeholder="Long Description" required></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <textarea type="text" name="additional_info" id="editor1" name="additional_info" value="<?php echo $row['additional_info']; ?>" rows="8" class="form-control mb-2" placeholder="blog Additional Information" required></textarea>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="fs-6 mb-2">Upload Image </label>
                                        <input type="file" name="blog_image" class="form-control mb-2">
                                        <input type="hidden" name="old_image" value="<?= $row['blog_image']; ?>">
                                        <img src="<?php echo HTTP_SERVER . 'upload/blog/' . $row['blog_image']; ?>" width="120">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="fs-6 mb-2">Publish Date </label>
                                        <input type="date" name="publish_date" value="<?php echo $row['publish_date']; ?>" class="form-control mb-2" placeholder="MM/DD/YY" required>
                                    </div>
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