  <?php
    ob_start();
    include('layout/header.php');
 

    $id = $_GET['id'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM page WHERE id='$id'"));
    //    print_r($row);
    //    exit;

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $banner_btn = $_POST['banner_btn'];
        $content = $_POST['content'];
        $sort_order = $_POST['sort_order'];
        $status = $_POST['status'];

        // EDIT PAGE LOGIC
        if (!empty($_FILES['banner_image']['name'])) {

            $array = explode(".", $_FILES['banner_image']['name']);
            $ext = strtolower(array_pop($array));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (in_array($ext, $allowed)) {
                $thumbName = time() . "_img." . $ext;
                move_uploaded_file($_FILES['banner_image']['tmp_name'], FS_PATH . "upload/" . $thumbName);
                $image = addslashes($thumbName);
            }
        } else {
            $image = $_POST['old_image'];
        }
        $add_date = time();

        $update_query = "UPDATE page SET name = '$name', slug='$slug', title='$title',
                description ='$description', banner_btn = '$banner_btn', content ='$content', sort_order='$sort_order', status='$status', banner_image='$image',
                add_date='$add_date'  WHERE id='$id'";
        mysqli_query($conn, $update_query);
        header("Location: page-list.php?msg_id=5");
    }
    ?>
  <main class="nxl-container">
      <div class="nxl-content">
          <div class="main-content">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="card stretch stretch-full">
                          <form method="post" action="" class="mb-5" enctype="multipart/form-data">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" class="form-control mb-2" placeholder="Name" required>
                                      </div>
                                 
                                      <div class="col-lg-6 mb-4">
                                          <input type="text" name="slug" id="slug" value="<?php echo $row['slug']; ?>" class="form-control" placeholder="Slug" required>
                                      </div>
                                  </div>

                                

                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="title" class="form-control mb-2" placeholder="Title"  ><?php echo $row['title']; ?></textarea>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="description" class="form-control mb-2" placeholder="Short Description" ><?php echo $row['description']; ?></textarea>
                                      </div>
                                  </div>


                                    <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <input type="text" name="banner_btn" value="<?php echo $row['banner_btn']; ?>" class="form-control" placeholder="Banner Button">
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <textarea type="text" name="content"  id="editor" class="form-control mb-2" placeholder="Long Description" required><?php echo $row['content']; ?></textarea>
                                      </div>
                                  </div>


                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <input type="number" name="sort_order" value="<?php echo $row['sort_order']; ?>" class="form-control mb-2" placeholder="Sort Order" required>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <label class="fs-6">Upload Banner Image</label>

                                      <div class="col-lg-12 mb-4">
                                          <input type="file" name="banner_image" class="form-control mb-2">
                                          <input type="hidden" name="old_image" value="<?= $row['banner_image']; ?>"> 
                                          <img src="<?php echo HTTP_SERVER . 'upload/' . $row['banner_image']; ?>" width="180" >
                                      </div>


                                      <div class="row my-5 fs-6">
                                          <div class="form-check form-switch ps-5">
                                              <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                                                  <?php echo (isset($row['status']) && $row['status'] == 1) ? 'checked' : ''; ?>>
                                              <label class="form-check-label fw-500 text-dark" for="status">
                                                  Status
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
          <!-- [ Main Content ] end -->
      </div>

      <script>
        document.getElementById("name").addEventListener("keyup", function(){
            let value = this.value.toLowerCase();
            value = value.replace(/[^a-z0-9 ]/g, "");
            value = value.replace(/\s+/g , "-");
            document.getElementById("slug").value = value;
        })
      </script>


      <?php include('layout/footer.php'); ?>

     