 <?php
   ob_start();
    include('layout/header.php');

    if (isset($_POST['submit'])) {
        // print_r($_POST);
        // exit;
        $category = $_POST['category_id'];
        $category_name = htmlspecialchars($_POST['category_name']);
        $category_slug = htmlspecialchars($_POST['category_slug']);

          $array = explode(".", $_FILES['category_image']['name']);
        $time = time();
        $ext = array_pop($array);
        if(!empty($ext)){
            if($ext == 'jpg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'png' || $ext == 'gif' || $ext == 'GIF' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'WEBP'){
                $thumbName = time() . "_img." . $ext;
                move_uploaded_file($_FILES['category_image']['tmp_name'], FS_PATH. "upload/" . $thumbName);
                 
            }
            $image = addslashes($thumbName);
        }



        $date = time();
         $sql_query = "INSERT INTO category (`id`, `parent_id`, `category_name`, `category_slug`, `category_image`, `date`) VALUES ('', '{$category}', '{$category_name}', '{$category_slug}','{$image}', '{$date}')";
          
    
        mysqli_query($conn, $sql_query);
        header("Location: product-category-list.php?msg_id=5");
    }  

    ?>
 <main class="nxl-container">
     <div class="nxl-content">
         <div class="main-content">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="card stretch stretch-full">
                         <form method="post" action="" enctype="multipart/form-data" >
                             <div class="card-body">
                                <?php 
                                  $fetch_dropdown =  "SELECT * FROM category WHERE parent_id=0" ;
                                      $result_category = mysqli_query($conn, $fetch_dropdown);
                                         $categoryArr = array();
                                ?>  
                                 <div class="mb-4">
                                     <label for="category" class="form-label">Category</label>
                                     <select id="category" name="category_id" class="form-select form-control" data-select2-selector="category" >
                                         <option value="" class="selected" aria-placeholder="category">Category</option>
                                         <?php
                                         while($categoryData = mysqli_fetch_assoc($result_category)) {
                                        ?>                
                                             <option value="<?php echo $categoryData['id']; ?>"><?php echo $categoryData['category_name'];?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                              
                                     <div class="row">
                                         <div class="col-lg-6 mb-4">
                                             <input type="text" name="category_name" id="category_name" value="" class="form-control mb-2" placeholder="Category Name" required>
                                         </div>
                                         <div class="col-lg-6 mb-4">
                                             <input type="text" name="category_slug" id="category_slug" value="" class="form-control" placeholder="Category Slug" required>
                                         </div>
                                     </div>

                                     <div class="row">
                                     <div class="col-lg-12 mb-4 d-flex ">
                                         <label for="" class="fs-6"> Upload Category Image </label>
                                         <input type="file" name="category_image" value="" class="form-control mb-2" placeholder="Category Image"></textarea>
                                     </div>
                                     </div>
                                
                                
                                 <div class="row mb-4">
                                         <label class="form-check-label fw-500 text-dark c-pointer" for="commentSwitch">Status</label>
                                         <div class="form-check form-switch form-switch-sm ps-5 ">
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
   
     </div>


     <script>
        document.getElementById("category_name").addEventListener("keyup", function(){
            let value = this.value.toLowerCase();
            value = value.replace(/[^a-z0-9 ]/g, "");
            value = value.replace(/\s+/g , "-");
            document.getElementById("category_slug").value = value;
        })
      </script>
     <?php include('layout/footer.php'); ?>