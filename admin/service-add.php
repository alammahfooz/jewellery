<?php 
include('layout/header.php');
 
 

   if (isset($_POST['submit'])) {
        // print_r($_POST);
        // exit;
        $id = $_POST['id'];
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $sub_title = $_POST['sub_title'];
        $short_description = $_POST['short_description'];
        $service_btn = $_POST['service_btn'];
        $content = $_POST['content'];
        $sort_order = $_POST['sort_order'];
        $array = explode(".", $_FILES['service_image']['name']);
        $status = $_POST['status'];
        $time = time();
        $ext = array_pop($array);

        if(!empty($ext)){
            if($ext == 'jpg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'png' || $ext == 'gif' || $ext == 'GIF' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'WEBP' || $ext == 'svg'){
                $thumbName = time() . "_img." . $ext;
                move_uploaded_file($_FILES['service_image']['tmp_name'], FS_PATH. "upload/" . $thumbName);
            }
            $image = addslashes($thumbName);
        }

        $add_date = time();
        $sql_query = "INSERT INTO service (`id`, `title`, `slug`, `sub_title`, `short_description`,`service_btn`, `content`, `sort_order`, `service_image`, `status`, `add_date`) VALUES ('{$id}', '{$title}',  '{$slug}', '{$sub_title}', '{$short_description}', '{$service_btn}', '{$content}', '{$sort_order}',  '{$image}',  '{$status}' , '{$add_date}')";
        // print_r($sql_query);
        // exit;
        mysqli_query($conn, $sql_query);
        header("Location: service-list.php?msg_id=5");  
    }
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
                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="title" id="title" value="" class="form-control mb-2" placeholder="Title" required>
                                     </div>
                                 </div> 
                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="slug" id="slug" value="" class="form-control" placeholder="Slug" required>
                                     </div>
                                 </div>

                                   <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="sub_title" value="" class="form-control" placeholder="Sub Title"  >
                                     </div>
                                    </div>

                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="short_description" value="" class="form-control" placeholder="Short Description"  required>
                                     </div>
                                 </div>


                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="text" name="service_btn" value="" class="form-control" placeholder="Button Url" >
                                     </div>
                                 </div>


                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <textarea type="text" name="content" id="editor" value="" class="form-control mb-2" placeholder="team Content"></textarea>
                                     </div>
                                 </div>


                                 <div class="row">
                                     <div class="col-lg-12 mb-4">
                                         <input type="number" name="sort_order" value="" class="form-control mb-2" placeholder="Sort Order" >
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-12 mb-4 d-flex ">
                                         <label for="" class="fs-6">Upload Service Image</label>
                                         <input type="file" name="service_image" value="" class="form-control mb-2"></textarea>
                                     </div>
                                 </div>

                                 <div class="row my-5 fs-6">
                                     <div class="form-check form-switch ps-5">
                                         <input class="form-check-input" type="checkbox" id="statusSwitch" name="status" value="1">
                                         <label class="form-check-label fw-500 text-dark" for="statusSwitch">Status</label>
                                     </div>
                                 </div>

                                 <div class="d-flex align-items-center gap-2 team-header-right-items-wrapper">
                                     <input type="submit" name="submit" class="btn btn-primary">
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
   </div>
                 </div>
             </div>

 <script>
document.getElementById("title").addEventListener("keyup", function(){
    let value = this.value.toLowerCase();
    value = value.replace(/[^a-z0-9 ]/g, "");
    value = value.replace(/\s+/g, "-");
    document.getElementById("slug").value = value;
});
 
</script>

<?php include('layout/footer.php'); ?>             