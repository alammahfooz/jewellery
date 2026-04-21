  <?php
    include('layout/header.php');


    $parent_id = '';
    $date = time();
    $id = $_GET['id'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM blog_category WHERE id='$id'"));
    $status = 'status';
    ?>
  <main class="nxl-container">
      <div class="nxl-content">
          <?php
            if (isset($_POST['submit'])) {
                $id = $_GET['id'];

                $category_name = htmlspecialchars($_POST['category_name']);
                $category_slug = htmlspecialchars($_POST['category_slug']);
                $sort_order = htmlspecialchars($_POST['sort_order']);
                $status = htmlspecialchars($_POST['status']);
                $date = time();

                if (!empty($_FILES['category_image']['name'])) {

                    $array = explode(".", $_FILES['category_image']['name']);
                    $ext = strtolower(array_pop($array));
                    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                    if (in_array($ext, $allowed)) {
                        $thumbName = time() . "_img." . $ext;
                        move_uploaded_file($_FILES['category_image']['tmp_name'], FS_PATH . "upload/blog/" . $thumbName);
                        $image = addslashes($thumbName);
                    }
                } else {
                    $image = $_POST['old_image'];
                }


                $update_query =  "UPDATE blog_category SET parent_id='$parent_id', category_name ='$category_name', category_slug='$category_slug', status='$status', category_image='$image', sort_order='$sort_order', date='$date' WHERE id='$id' ";
                mysqli_query($conn, $update_query);
                // header("Location: blog-category-list.php");
            }

            ?>
          <div class="main-content">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="card stretch stretch-full">
                          <form method="post" action="" enctype="multipart/form-data">
                              <div class="card-body">

                                  <?php
                                    $fetch_dropdown = "SELECT * FROM blog_category WHERE parent_id=0";
                                    $result_category = mysqli_query($conn, $fetch_dropdown);
                                    ?>
                                  <div class="mb-4">
                                      <label for="category" class="form-label fs-6">Category</label>
                                      <select id="category" name="category_id" class="form-select form-control">
                                          <option value="">Category</option>
                                          <?php while ($categoryData = mysqli_fetch_assoc($result_category)) { ?>
                                              <option value="<?php echo $categoryData['id']; ?>"
                                                  <?php if ($categoryData['id'] == $row['parent_id']) echo 'selected'; ?>>
                                                  <?php echo $categoryData['category_name']; ?>
                                              </option>
                                          <?php } ?>
                                      </select>
                                  </div>



                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <label class="form-label fs-6">Category Name</label>
                                          <input type="text" name="category_name" id="category_name"
                                              value="<?php echo $row['category_name']; ?>"
                                              class="form-control" required>
                                      </div>

                                      <div class="col-lg-6 mb-4">
                                          <label class="form-label fs-6">Category Slug</label>
                                          <input type="text" name="category_slug" id="category_slug"
                                              value="<?php echo $row['category_slug']; ?>"
                                              class="form-control" required>
                                      </div>
                                  </div>


                                  <div class="row mb-4">
                                      <div class="col-lg-6 mb-4">
                                          <label class="form-label fs-6">Upload Blog Category Image</label>

                                          <input type="file" name="category_image" class="form-control mb-2">

                                          <input type="hidden" name="old_image" value="<?= $row['category_image']; ?>">

                                          <img src="<?php echo HTTP_SERVER . 'upload/blog/' . $row['category_image']; ?>" width="50">
                                      </div>
                                      <div class="col-lg-6 mb-4">
                                      <label class="form-label fs-6">Sort Order</label><br>
                                        <input type="number" name="sort_order" value="<?php echo $row['sort_order']; ?>" class="form-control" placeholder="Sort Order" required>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <div class="form-check form-switch ps-5">
                                              <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                                                  <?php echo (isset($row['status']) && $row['status'] == 1) ? 'checked' : ''; ?>>
                                              <label class="form-check-label fw-500 text-dark" for="status">Status</label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="mt-4">
                                      <input type="submit" name="submit" class="btn btn-primary">
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
          document.getElementById("category_name").addEventListener("keyup", function() {
              let value = this.value.toLowerCase();
              value = value.replace(/[^a-z0-9 ]/g, "");
              value = value.replace(/\s+/g, "-");
              document.getElementById("category_slug").value = value;
          })
      </script>
      <?php include('layout/footer.php'); ?>