<?php
include('layout/header.php');

if (isset($_GET['action']  )) {
    $id = $_GET['id'];
    $del_query = "DELETE FROM product WHERE id=$id ";
    mysqli_query($conn, $del_query);
}

if(isset($_GET['act']) && $_GET['act'] == 'cstatus'){
   
    $product_id = $_GET['product_id'];    
    $status = $_GET['status']; 
    $update_product = "UPDATE  `product` SET `status` = '{$status}' WHERE `id` = '{$product_id}' " ;
   
    $bool =  mysqli_query($conn, $update_product);

    if($bool){
        header("Location:product-list.php");
    }
}

$date = 'date';
$parent_id = $parent_id;
?>
<body>
    <main class="nxl-container">
        <div class="nxl-content ">
            <div class="main-content p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full  ">
                          <div class="card-body">
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {

                    $fetch_dropdown = "SELECT * FROM category WHERE id = '{$row['category_id']}'";
                    $cat_query = mysqli_query($conn, $fetch_dropdown);
                    $result_category = $cat_query ? mysqli_fetch_assoc($cat_query) : null;
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_title']; ?></td>
                    <td><?php echo $row['product_slug']; ?></td>
                    <td><?php echo $result_category['category_name'] ?? ''; ?></td>
                    <td><?php echo $row['product_sku']; ?></td>
                    <td><?php echo $row['product_qty']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><?php echo date('d M y', $row['add_date']); ?></td>

                    <td>
                        <?php if ($row['status'] == 1) { ?>
                            <a class="btn btn-success" href="product-list.php?act=cstatus&status=0&product_id=<?php echo $row['id']; ?>" style="width:20px;height:20px;">
                                <i class="fa fa-check"></i>
                            </a>
                        <?php } else { ?>
                            <a class="btn btn-danger" href="product-list.php?act=cstatus&status=1&product_id=<?php echo $row['id']; ?>" style="width:20px;height:20px;">
                                <i class="fa fa-close"></i>
                            </a>
                        <?php } ?>
                    </td>

                    <td>
                        <a href="product-edit.php?id=<?php echo $row['id']; ?>" class="mr-3">
                            <span class="fa fa-pencil"></span>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="product-list.php?id=<?php echo $row['id']; ?>&action=del" class="ml-3">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php
                }
            } else {
            ?>
                <div class="alert alert-danger"><em>No records were found.</em></div>
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