<?php include('layout/header.php');

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');

    $id = $_GET['id'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `service` WHERE id='$id'"));

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $sub_title = $_POST['sub_title'];
        $short_description = $_POST['short_description'];
        $service_btn = $_POST['service_btn'];
        $content = $_POST['content'];
        $sort_order = $_POST['sort_order'];
        $status = $_POST['status'];

     

        // EDIT PAGE LOGIC
        if (!empty($_FILES['service_image']['name'])) {

            $array = explode(".", $_FILES['service_image']['name']);
            $ext = strtolower(array_pop($array));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp' , 'svg'];

            if (in_array($ext, $allowed)) {
                $thumbName = time() . "_img." . $ext;
                move_uploaded_file($_FILES['service_image']['tmp_name'], FS_PATH . "upload/" . $thumbName);
                $image = addslashes($thumbName);
            }
        } else {
            $image = $_POST['old_image'];
        }
        $add_date = time();

        $update_query = "UPDATE `service` SET  title='$title', slug='$slug', sub_title='$sub_title', short_description ='$short_description', service_btn = '$service_btn', content ='$content', sort_order='$sort_order', status='$status', service_image='$image', add_date='$add_date' WHERE id='$id'";
     $bool = mysqli_query($conn, $update_query);
        // header("Location: service-list.php?msg_id=5");
        if($bool){
            header("Location: service-list.php?msg_id=5");

        }
    }?>

<main class="nxl-container">
    <div class="nxl-content">
        <div class="main-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card stretch stretch-full">
                        <form method="post" action="" class="mb-5" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <input type="text" name="title"
                                            value="<?php echo $row['title']; ?>"
                                            class="form-control"
                                            placeholder="Title" required>
                                    </div>  

                                    <div class="col-lg-12 mb-4">
                                        <input type="text" name="slug"
                                            value="<?php echo $row['slug']; ?>"
                                            class="form-control"
                                            placeholder="Slug" required>
                                    </div>

                                     <div class="col-lg-12 mb-4">
                                        <input type="text" name="sub_title"
                                            value="<?php echo $row['sub_title']; ?>"
                                            class="form-control"
                                            placeholder="Sub Title"  >
                                    </div>
                                     <div class="col-lg-12 mb-4">
                                        <input type="text" name="short_description"
                                            value="<?php echo $row['short_description']; ?>"
                                            class="form-control"
                                            placeholder="Short Description" required>
                                    </div>

                                    <div class="col-lg-12 mb-4">
                                        <input type="text" name="service_btn"
                                            value="<?php echo $row['service_btn']; ?>"
                                            class="form-control"
                                            placeholder="Button Url">
                                    </div>

                                    <div class="col-lg-12 mb-4">
                                        <textarea name="content"
                                            class="form-control"
                                            id="editor"
                                            required><?php echo $row['content']; ?></textarea>
                                    </div>

                                     <div class="col-lg-12 mb-4">
                                        <input type="number" name="sort_order"
                                            value="<?php echo $row['sort_order']; ?>"
                                            class="form-control"
                                            placeholder="Sort Order" required>
                                    </div>  


                                   
                                    <div class="col-lg-12 mb-4">
                                        <label class="fs-6">Upload Service Image</label>
                                        <div class="d-flex align-items-center gap-3">
                                            <input type="file" name="service_image" class="form-control">
                                            <input type="hidden" name="old_image"
                                                value="<?= $row['service_image']; ?>">
                                            <img src="<?php echo HTTP_SERVER . 'upload/' . $row['service_image']; ?>" width="120">
                                        </div>
                                    </div>  

                                    <div class="col-lg-12 mb-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="status" name="status" value="1"
                                             
                                                <?php echo (isset($row['status']) && $row['status'] == 1) ? 'checked' : ''; ?>>
                                            <label class="form-check-label fw-500 text-dark" for="status">
                                                Status
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>

                                </div> <!-- row -->

                            </div> <!-- card-body -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
 

<?php include('layout/footer.php'); ?>

</main>