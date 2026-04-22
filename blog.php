 <?php include('layout/header.php') ?>

    <div class="rts-navigation-area-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="index.php">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="index.php">Blog List</a>
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

      <style>
           .blog-img img{
                height: 200px;
            }
        </style>


    <div class="rts-blog-area rts-section-gap bg_white bg_gradient-tranding-items ">
        <div class="container">
            <div class="row g-5 ">
                                <?php
                                $blog_section = "SELECT * FROM blog WHERE status = '1'";
                                $blog_result = mysqli_query($conn, $blog_section);
                                while ($blog_card = mysqli_fetch_assoc($blog_result)) {
                                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 ">
                    <!-- single blog area start -->
                    <div class="single-blog-style-card-border blog-img">
                        <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="thumbnail">
                            <img src="upload/blog/<?= $blog_card['blog_image'] ?>" alt="blog-area">
                        </a>
                        <div class="inner-content-body">
                            <div class="tag-area">
                                <div class="single">
                                    <i class="fa-light fa-clock"></i>
                                    <span><?= date('d M Y', ($blog_card['publish_date'])) ?></span>
                                </div>
                                <div class="single">
                                    <i class="fa-light fa-folder"></i>
                                    <span><?= $blog_card['blog_auther'] ?></span>
                                </div>
                            </div>
                            <a class="title-main" href="blog-details.php?id=<?= $blog_card['id'] ?>">
                                <h3 class="title"><?= $blog_card['blog_title'] ?></h3>
                            </a>
                            <div class="button-area">
                                <a href="blog-details.php?id=<?= $blog_card['id'] ?>" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Read Details
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-solid fa-circle-plus"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-solid fa-circle-plus"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- single blog area end -->
                </div>

                <?php } ?>
               
            </div>
            <div class="row mt--50">
                <div class="col-lg-12">
                    <div class="pagination-area-main-wrappper">
                        <ul>
                            <li> <button class="active">01</button> </li>
                            <li> <button>02</button> </li>
                            <li> <button>03</button> </li>
                            <li> <button>04</button> </li>
                            <li> <button><i class="fa-regular fa-chevrons-right"></i></button> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php include('layout/footer.php') ?>