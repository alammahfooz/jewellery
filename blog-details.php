<?php include('layout/header.php') ?>

    <div class="rts-navigation-area-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="index.php">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="index.php">Blog Lists With Sidebar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-seperator">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>


    <!-- blog sidebar area start -->
    <div class="blog-sidebar-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-1 order-md-2 order-sm-2 order-2">
                    <div class="blog-details-area-1">
                        <div class="thumbnail">
                            <img src="assets/images/blog/21.html" alt="">
                        </div>
                        <div class="body-content-blog-details">
                              <?php
                                $id = $_GET['id'];
                                $blog_section = "SELECT * FROM `blog` WHERE  status = '1' AND id = $id";
                                $blog_result = mysqli_query($conn, $blog_section);
                                while ($blog_card = mysqli_fetch_assoc($blog_result)) {
                                ?>
                                  <div class="mb-4">
                                   <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="thumbnail" >
                                    <img src="upload/blog/<?= $blog_card['blog_image'] ?>" alt="blog-area" width="100%" >
                                </a>
                            </div>
                            <div class="top-tag-time">
                                <div class="single">
                                    <i class="fa-solid fa-clock"></i>
                                    <span><?= date('d M Y', ($blog_card['publish_date'])) ?></span>
                                </div>
                                <div class="single">
                                    <i class="fa-solid fa-folder"></i>
                                    <span><?= $blog_card['blog_auther'] ?></span>
                                </div>
                            </div>
                          
                            <div class="mt-5">
                                <?= $blog_card['long_description'] ?> 
                            </div>
                            <div>
                                <?= $blog_card['additional_info'] ?> 
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pl--60 order-lg-2 order-md-1 order-sm-1 order-1 pl_md--10 pl_sm--10 rts-sticky-column-item">
                    <div class="blog-sidebar-single-wized">
                        <form action="#">
                            <input type="text" placeholder="Search Here" required>
                            <button><i class="fa-regular fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                
                 
                    <div class="blog-sidebar-single-wized with-title">
                        <h4 class="title">Latest Post</h4>
                        <div class="latest-post-small-area-wrapper">
                            <!-- single latest post -->
                              <?php
                                $blog_section = "SELECT * FROM blog WHERE status = '1' ";
                                $blog_result = mysqli_query($conn, $blog_section);
                                while ($latest_blog = mysqli_fetch_assoc($blog_result)) {
                                ?>
                            <div class="single-latest-post-area mb-5">
                                    <img src="upload/blog/<?= $latest_blog['blog_image'] ?>" alt="thumbnail" width="100" >
                                <div class="inner-content-area">
                                    <div class="icon-top-area">
                                        <i class="fa-light fa-clock"></i>
                                        <span><?= date('d M Y', ($latest_blog['publish_date'])) ?></span>
                                    </div>
                                    <a href="blog-details.php?id=<?= $latest_blog['id'] ?>">
                                        <h5 class="title-sm-blog">
                                            <?= $latest_blog['blog_title'] ?>
                                        </h5>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                         
                        </div>
                    </div>
                
                    <div class="blog-sidebar-single-wized with-title">
                        <h4 class="title">Instagram Posts</h4>
                        <div class="instagram-post-main-wrapper">
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/04.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/05.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/06.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/07.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/08.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/09.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/10.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                            <!-- single-instagram-post -->
                            <a href="#">
                                <div class="single-instagram-post">
                                    <img src="assets/images/blog/thumb/11.html" alt="post">
                                </div>
                            </a>
                            <!-- single-instagram-post end -->
                        </div>
                    </div>
                    <div class="blog-sidebar-single-wized with-add bg_image">
                        <div class="add-are-content">
                            <span class="pre">Weekend Discount</span>
                            <h5 class="title">
                                Discover Real organic <br>
                                <span>Flavors Vegetable</span>
                            </h5>
                            <a href="#" class="shop-now-goshop-btn">
                                <span class="text">Shop Now</span>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog sidebar area ends -->





    <!-- rts top tranding product area -->
<div class="blog-area-start rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left mb--0">
                        Related Blogs  
                    </h2>
                </div>
            </div>
        </div>
        <style>
           .blog-img img{
                height: 200px;
            }
        </style>
        <div class="row">
            <div class="col-lg-12">
                <div class="cover-card-main-over blog-img">
                    <div class="row g-4">
                         <?php
                                $blog_section = "SELECT * FROM blog WHERE status = '1'";
                                $blog_result = mysqli_query($conn, $blog_section);
                                while ($blog_card = mysqli_fetch_assoc($blog_result)) {
                                ?>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <!-- single blog area start -->
                            <div class="single-blog-area-start">
                                <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="thumbnail" >
                                    <img src="upload/blog/<?= $blog_card['blog_image'] ?>" alt="blog-area" >
                                </a>
                                <div class="blog-body">
                                    <div class="top-area">
                                        <div class="single-meta">
                                            <i class="fa-light fa-clock"></i>
                                            <span><?= date('d M Y', ($blog_card['publish_date'])) ?></span>
                                        </div>
                                        <div class="single-meta">
                                            <i class="fa-regular fa-folder"></i>
                                            <span><?= $blog_card['blog_auther'] ?></span>
                                        </div>
                                    </div>
                                    <a href="blog-details.php?id=<?= $blog_card['id'] ?>">
                                        <h4 class="title"><?= $blog_card['blog_title'] ?> </h4>
                                    </a>
                                    <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="shop-now-goshop-btn">
                                        <span class="text">Read Details</span>
                                        <div class="plus-icon">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                        </div>
                                        <div class="plus-icon">
                                            <i class="fa-sharp fa-regular fa-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- single blog area end -->
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts top tranding product area end -->


 

    <?php include('layout/footer.php') ?>