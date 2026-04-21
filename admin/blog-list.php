 <?php
    include('layout/header.php');

    // DELETE
    if (isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $del_query = "DELETE FROM `blog` WHERE id=$id";
        mysqli_query($conn, $del_query);
        header("Location: blog-list.php");
        exit();
    }

    // STATUS UPDATE
    if (isset($_GET['act']) && $_GET['act'] == 'cstatus' && isset($_GET['id']) && isset($_GET['status'])) {

        $id = intval($_GET['id']);
        $status = intval($_GET['status']);

        $update_query = "UPDATE `blog` SET `status` = '$status' WHERE `id` = '$id'";
        $bool = mysqli_query($conn, $update_query);

        if ($bool) {
            header("Location: blog-list.php");
            exit();
        }
    }
    ?>

 <body>
     <main class="nxl-container">
         <div class="nxl-content">
             <div class="main-content p-0">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card stretch stretch-full">
                             <div class="card-body">

                                 <div class="table-responsive mb-5">
                                     <table class="table table-bordered table-striped">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Title</th>
                                                 <th>Slug</th>
                                                 <th>Author</th>
                                                 <th>Publish Date</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>

                                         <tbody>
                                             <?php
                                                $sql = "SELECT * FROM `blog`";
                                                $result = mysqli_query($conn, $sql);

                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                     <tr>
                                                         <td><?php echo $row['id']; ?></td>
                                                         <td><?php echo $row['blog_title']; ?></td>
                                                         <td><?php echo $row['blog_slug']; ?></td>
                                                         <td><?php echo $row['blog_auther']; ?></td>
                                                         <td><?php echo $row['publish_date']; ?></td>

                                                         <td>
                                                             <?php if ($row['status'] == 1) { ?>
                                                                 <a class="btn btn-success"
                                                                     href="blog-list.php?act=cstatus&status=0&id=<?php echo $row['id']; ?>">
                                                                     <i class="fa fa-check"></i>
                                                                 </a>
                                                             <?php } else { ?>
                                                                 <a class="btn btn-danger"
                                                                     href="blog-list.php?act=cstatus&status=1&id=<?php echo $row['id']; ?>">
                                                                     <i class="fa fa-close"></i>
                                                                 </a>
                                                             <?php } ?>
                                                         </td>

                                                         <td>
                                                             <a href="blog-edit.php?id=<?php echo $row['id']; ?>">
                                                                 <span class="fa fa-pencil"></span>
                                                             </a>

                                                             &nbsp;&nbsp;

                                                             <a href="blog-list.php?id=<?php echo $row['id']; ?>&action=del"
                                                                 onclick="return confirm('Are you sure you want to delete?');">
                                                                 <span class="fa fa-trash"></span>
                                                             </a>
                                                         </td>
                                                     </tr>
                                                 <?php
                                                    }
                                                } else {
                                                    ?>
                                                 <tr>
                                                     <td colspan="7">
                                                         <div class="alert alert-danger text-center">
                                                             <em>No records were found.</em>
                                                         </div>
                                                     </td>
                                                 </tr>
                                             <?php
                                                }
                                                mysqli_close($conn);
                                                ?>
                                         </tbody>
                                     </table>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <?php include('layout/footer.php'); ?>