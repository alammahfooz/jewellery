 <?php
    ob_start();
    include('layout/header.php');
 
    

    if (isset($_POST['submit'])) {
        // print_r($_POST);
        // exit;
        $id = $_POST['id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $banner_btn = $_POST['banner_btn'];
        $content = $_POST['content'];
        $sort_order = $_POST['sort_order'];
        $array = explode(".", $_FILES['banner_image']['name']);
        $status = $_POST['status'];
        $time = time();
        $ext = array_pop($array);

        if(!empty($ext)){
            if($ext == 'jpg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'png' || $ext == 'gif' || $ext == 'GIF' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'WEBP'){
                $thumbName = time() . "_img." . $ext;
                move_uploaded_file($_FILES['banner_image']['tmp_name'], FS_PATH. "upload/" . $thumbName);
            }
            $image = addslashes($thumbName);
        }

        $add_date = time();

        $sql_query = "INSERT INTO page (`id`, `name`, `slug`, `title`, `content`,  `description`, `banner_btn`, `banner_image`, `sort_order`, `status`, `add_date`) VALUES ('{$id}', '{$name}',  '{$slug}', '{$title}', '{$content}', '{$description}', '{$banner_btn}', '{$image}', '{$sort_order}',  '{$status}' , '{$add_date}')";
       
        mysqli_query($conn, $sql_query);
        header("Location: page-list.php?msg_id=5");  
    }

    ?>


 <?php


    $msg = "";

    // If upload button is clicked ...

    ?>



 <main class="nxl-container">
     <div class="nxl-content">
         <div class="main-content mb-5">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="card stretch stretch-full">
                         <form method="post" action="" class="mb-5" enctype="multipart/form-data">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-lg-6 mb-4">
                                         <input type="text" name="name" id="name" value="" class="form-control mb-2" placeholder="Name" required>                 
                                     </div>
                                      
                                     <div class="col-lg-6 mb-4">
                                         <input type="text" name="slug" id="slug" value="" class="form-control" placeholder=" Slug" required>                                         
                                     </div>
                                </div>

                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="title" value="" class="form-control mb-2" placeholder="Title" ></textarea>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="description" value="" class="form-control mb-2" placeholder="Short Description"></textarea>
                                     </div>
                                 </div>

                                   <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="banner_btn" value="" class="form-control" placeholder="Banner Button">                                         
                                     </div>
                                     </div>
                           
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="content" id="editor" value="" class="form-control mb-2 border-2" placeholder="Long Description" required></textarea>
                                     </div>
                                 </div>

                                
                  
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="number" name="sort_order" value="" class="form-control mb-2" placeholder="Sort Order" required>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12 mb-4 d-flex">
                                         <label for="" class="fs-6">Upload Banner Image</label>
                                         <input type="file" name="banner_image" value="" class="form-control mb-2" placeholder="Banner Image"></textarea>
                                     </div>
                                 </div>

                                <div class="row my-5 fs-6">
                                 <div class="form-check form-switch ps-5">
                                    <input class="form-check-input" type="checkbox" id="statusSwitch" name="status" value="1">
                                    <label class="form-check-label fw-500 text-dark" for="statusSwitch">Status</label>
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
            value = value.replace(/\s+/g, "-");
            document.getElementById("slug").value = value;
        })
    

     </script>
     <?php include('layout/footer.php'); ?>
    