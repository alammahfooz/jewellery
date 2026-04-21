<?php ob_start();
include('layout/header.php');

if (isset($_POST['submit'])) {
    // print_r($_POST);
    // exit;

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
    $ext = array_pop($array);
    if (!empty($ext)) {
        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'png' || $ext == 'gif' || $ext == 'GIF' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'WEBP' || $ext == 'jfif' || $ext == 'JFIF') {
            $thumbName = time() . "_img." . $ext;
            move_uploaded_file($_FILES['blog_image']['tmp_name'], FS_PATH . "upload/blog/" . $thumbName);
        }
        $image = addslashes($thumbName);
    }

    $add_date = time();
    $status = isset($_POST['status']) ? 1 : 0;


    $sql_query = "INSERT INTO `blog` (`category_id`, `blog_title`, `blog_slug`, `blog_auther`, `short_description`, `long_description`, `additional_info`, `sort_order`, `blog_image`, `publish_date`, `status`, `add_date`) VALUES ('{$category_id}', '{$blog_title}', '{$blog_slug}', '{$blog_auther}', '{$short_description}', '{$long_description}', '{$additional_info}', '{$sort_order}','{$image}','{$publish_date}', '{$status}', '{$add_date}')";
    // echo $sql_query;
    // exit;
    mysqli_query($conn, $sql_query);
    header("Location: blog-list.php?msg_id=5");
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
                                <div class="mb-4">
                                    <label for="category" class="form-label"> Blog Category</label>
                                    <select id="category" name="category_id" class="form-select form-control" data-select2-selector="category">
                                        <option value="">Category</option>

                                        <?php
                                        $fetch_dropdown = "SELECT * FROM blog_category WHERE parent_id = 0";
                                        $result_category = mysqli_query($conn, $fetch_dropdown);

                                        while ($categoryData = mysqli_fetch_assoc($result_category)) {
                                        ?>
                                            <option value="<?php echo $categoryData['id']; ?>"><?php echo $categoryData['category_name']; ?></option>

                                        <?php } ?>

                                    </select>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="form-label fs-6 mb-2"> Blog Title</label>

                                        <input type="text" name="blog_title" id="blog_title" value="" class="form-control mb-2" placeholder="Title" required>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="form-label mb-2 fs-6 mb-2">Blog Slug</label>
                                        <input type="text" name="blog_slug" id="blog_slug" value="" class="form-control" placeholder="Slug" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="form-label fs-6 mb-2"> Author Name</label>
                                        <input type="text" name="blog_auther" value="" class="form-control" placeholder="Author Name:" required>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="form-label fs-6 mb-2"> Sort Order</label>
                                        <input type="number" name="sort_order" value="" class="form-control mb-2 fs-6" placeholder="Sort Order" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="" class="form-label fs-6 mb-2">Short Description</label>
                                        <input type="text" name="short_description" value="" class="form-control mb-2" placeholder="Short Description" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="" class="form-label fs-6 mb-2">Long Description</label>
                                        <textarea type="text" name="long_description" id="editor" value="" rows="8" class="form-control mb-2" placeholder="Long Description" required></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <textarea type="text" name="additional_info" id="editor1" name="additional_info" value="" rows="8" class="form-control mb-2" placeholder="blog Additional Information" required></textarea>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="fs-6 mb-2">Upload Image </label>
                                        <input type="file" name="blog_image" value="" class="form-control mb-2" placeholder="Blog Image"></textarea>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="" class="fs-6 mb-2">Publish Date </label>
                                        <input type="date" name="publish_date" value="" class="form-control mb-2" placeholder="MM/DD/YY" required>
                                    </div>
                                </div>

                                <div class="row d-flex my-5 fs-6">
                                    <div class="form-check form-switch form-switch-sm ps-5 ">
                                        <label class="form-check-label fw-500 text-dark c-pointer" for="commentSwitch">Status</label>
                                        <input class="form-check-input c-pointer" type="checkbox" name="status" id="commentSwitch">
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

      <script>
        document.getElementById("blog_title").addEventListener("keyup", function(){
            let value = this.value.toLowerCase();
            value = value.replace(/[^a-z0-9 ]/g, "");
            value = value.replace(/\s+/g , "-");
            document.getElementById("blog_slug").value = value;
        })
      </script>
    <?php include('layout/footer.php'); ?>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

     <script>
        ClassicEditor.create(document.querySelector('#editor1'))
        ClassicEditor.create(document.querySelector('#edito2'))
</script> -->