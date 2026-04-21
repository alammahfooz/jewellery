<?php
include('layout/header.php');

if (isset($_GET['action']  )) {
    $id = $_GET['id'];
    $del_query = "DELETE FROM category WHERE id=$id ";
    mysqli_query($conn, $del_query);
}
if(isset($_GET['act']) && $_GET['act'] == 'cstatus'){

    $category_id = $_GET['category_id'];
    $status = $_GET['status'];
    $update_query = "UPDATE `category` SET `status` = '{$status}' WHERE `id` = '{$category_id}' ";
    $bool = mysqli_query($conn, $update_query);

    if($bool){
        header("Location: product-category-list.php");
    }
}

$date = time();
$parent_id = $parent_id;

?>
<body>
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full" style="margin-bottom: 1000px;">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Main Categories</th>
                                    <th>Link</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                    $sql = "SELECT * FROM category WHERE parent_id = 0";  
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)){
                                    ?>
                                        <tr> 
                                            <td style="background-color: #98c3e8;"> <?php  echo  $row['id']; ?> </td>
                                            <td style="background-color: #98c3e8;"> <?php echo $row['category_name'] ?> </td>
                                            <td style="background-color: #98c3e8;"> </td>
                                            <td style="background-color: #98c3e8;"> <?php  echo  $row['category_slug'] ?> </td>
                                            <td style="background-color: #98c3e8;"> <?php  echo  date('d M y', $row['date']); ?> </td>
  <td style="background-color: #98c3e8;">
                                               <?php if($row['status'] == 1){ ?>
                                                <a class="btn btn-success" href="product-category-list.php?act=cstatus&status=0&category_id=0&category_id=<?= $row['id']  ?>;" style="width: 20px; height: 20px;"><i  class="fa fa-check"></i></a>
                                               <?php }else{ ?>
                                                <a class="btn btn-danger" href="product-category-list.php?act=cstatus&status=1&category_id=0&category_id=<?= $row['id'] ?>;" style="width: 20px; height: 20px;"><i class="fa fa-close" ></i></a>
                                            <?php } ?>
                                            </td>

                                            <td style="background-color: #98c3e8;">
                                            <a href="product-category-edit.php?id=<?php echo $row['id'] ?> "class="mr-3" title="Update Record" data-toggle="tooltip">  <span class="fa fa-pencil"></span></a> &nbsp; &nbsp;
                                            <a href="product-category-list.php?id=<?php echo $row['id'] ?> &action=del" class="ml-3" title="Delete Record" data-toggle="tooltip">  <span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        <?php
                                            $sql_sub = "SELECT * FROM category where parent_id = '{$row['id']}'";  
                                            $result_sub = mysqli_query($conn, $sql_sub);
                                
                                                while ($subcategoryData = mysqli_fetch_array($result_sub)) {
                                            ?>
                                        <tr> 
                                            <td> <?php  echo  $subcategoryData['id']; ?> </td>
                                            <td> <?php echo $subcategoryData['category_name'] ?> </td>
                                            <td> <?php echo $row['category_name'] ?> </td>
                                            <td> <?php  echo  $subcategoryData['category_slug'] ?> </td>
                                            <td> <?php  echo  date('d M y', $subcategoryData['date']);  ?> </td>

                                            
                                            <td>
                                               <?php if($subcategoryData['status'] == 1){ ?>
                                                <a class="btn btn-success" href="product-category-list.php?act=cstatus&status=0&category_id=0&category_id=<?= $subcategoryData['id']  ?>;" style="width: 20px; height: 20px;"><i  class="fa fa-check"></i></a>
                                               <?php }else{ ?>
                                                <a class="btn btn-danger" href="product-category-list.php?act=cstatus&status=1&category_id=0&category_id=<?= $subcategoryData['id'] ?>;" style="width: 20px; height: 20px;"><i class="fa fa-close" ></i></a>
                                            <?php } ?>
                                            </td>
                                          

                                            <td>
                                            <a href="product-category-edit.php?id=<?php echo $subcategoryData['id'] ?> " class="mr-3" title="Update Record" data-toggle="tooltip">  <span class="fa fa-pencil"></span></a>  &nbsp; &nbsp;
                                            <a href="product-category-list.php?id=<?php echo $subcategoryData['id'] ?> &action=del" class="ml-3" title="Delete Record" data-toggle="tooltip">  <span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>     
                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                    </table>
                                                 
                                           <?php } else {  ?>
                                                <div class="alert alert-danger"><em>No records were found.</em></div>
                                           <?php } 
                                    
                                    mysqli_close($conn);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

             
        <?php include('layout/footer.php'); ?>