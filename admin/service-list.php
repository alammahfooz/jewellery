<?php
include('layout/header.php');


if (isset($_GET['act']) && $_GET['act'] == 'del') {
    $id = $_GET['id'];
    $del_query = "DELETE FROM `service` WHERE id=$id ";
    mysqli_query($conn, $del_query);
}

if (isset($_GET['act']) && $_GET['act'] == 'cstatus') {

    $service_id = $_GET['service_id'];
    $status = $_GET['status'];
    $update_banner = "UPDATE  `service` SET `status` = '{$status}' WHERE `id` = '{$service_id}' ";

    $bool =  mysqli_query($conn, $update_banner);

    if ($bool) {
        header("Location:service-list.php");
    }
}

$date = 'date';
?>

<body>
    <main class="nxl-container ">
        <div class="nxl-content">
            <div class="main-content p-0 m-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full  ">
                            <div class="card-body  ">
                                <div class="table-responsive mb-5">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>act</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `service`";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                    <tr>
                                                        <td> <?php echo  $row['id']; ?> </td>
                                                        <td> <?php echo $row['title'] ?> </td>
                                                        <td> <?php echo  $row['slug'] ?> </td>
                                                        <td> <?php echo  date('d M y', $row['add_date']);  ?> </td>


                                                        <!--  -->
                                                       <td>

                                                            <?php

                                                            if ($row['status'] == 1) { ?>
                                                                <a class="btn btn-success" href="service-list.php?act=cstatus&status=0&service_id=<?php echo $row['id']; ?>" style="width: 20px; height: 20px;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>

                                                            <?php } else { ?>

                                                                <a class="btn btn-danger" href="service-list.php?act=cstatus&status=1&service_id=<?php echo $row['id']; ?>" style="width: 20px; height: 20px;">

                                                                    <i class="fa fa-close"></i>

                                                                </a>

                                                            <?php } ?>
                                                        </td>
                                                        <!--  -->


                                                      <td>
                                                            <a href="service-edit.php?id=<?php echo $row['id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"> <span class="fa fa-pencil"></span></a> &nbsp; &nbsp; &nbsp;
                                                            <a href="service-list.php?id=<?php echo $row['id'] ?> &act=del" class="ml-3" title="Delete Record" data-toggle="tooltip"> <span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
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
    </main>