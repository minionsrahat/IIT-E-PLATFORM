<?php include('layout-files/import_files.php') ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Education</title>

    <?php
    include('layout-files/css-links.php')
    ?>

</head>

<body>




    <?php include('layout-files/navigation-menu.php') ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Search Notice
                    </h1>
                    <p class="text-white link-nav">Search Notice Results for</a> <span class="lnr lnr-arrow-right">
                            "<?php
                                if (isset($_POST['search_query'])) {
                                    echo $_POST['search_text'];
                                }
                                ?>"


                        </span></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->



    <section class="post-content-area mt-5">
        <div class="container ">
            <div class="row">
                <div class="col-lg-8 posts-list">

                    <?php

                    if (isset($_POST['search_query'])) {
                        $search_text = $_POST['search_text'];
                        $sql = "SELECT notices.*,notice_category.category_name as cat_name  FROM notices,notice_category WHERE MATCH (notices.notice_title,notices.notice_content) against('$search_text') AND notices.notice_category=notice_category.id";
                        $result = $con->query($sql);
                        if (mysqli_num_rows($result) < 1) {
                            // echo "<script>
                            // location.replace('notice-list.php');
                            //          </script>";

                    ?>
                            <div class="single-post row">
                                <div class="col-lg-3  col-md-3 meta-details">

                                </div>
                                <div class="col-lg-9 col-md-9 ">
                                    <a class="posts-title" href="blog-single.html">
                                        <h3>No Result Found</h3>
                                    </a>
                                </div>
                            </div>


                            <?php
                        } else {
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <div class="single-post row">
                                    <div class="col-lg-3  col-md-3 meta-details">
                                        <ul class="tags">
                                            <li><a href="#"><?php echo $row['cat_name']  ?></a></li>

                                        </ul>
                                        <div class="user-details row">
                                            <p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $row['post_by']  ?></a></p>
                                            <p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo $row['post_date']  ?></a></p>
                                            <p class="col-lg-12 col-md-12 col-6 text-center"><a name="" id="" class="btn btn-warning ml-auto" href="download_pdf.php?notice_id=<?php echo $row['id']  ?>" role="button">Download</a></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 ">
                                        <div class="feature-img">
                                            <img class="" style="width:600px; height:340px;" src="img/notices/<?php echo $row['notice_img']  ?>" alt="">
                                        </div>
                                        <a class="posts-title" href="blog-single.html">
                                            <h3><?php echo $row['notice_title']  ?></h3>
                                        </a>
                                        <p class="excert">
                                            <?php echo substr($row['notice_content'], 0, 100) ?>
                                        </p>
                                        <a href="view-single-notice.php?notice_id=<?php echo $row['id']  ?>" class="primary-btn">View More</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    <?php
                    } else {
                        echo "  <script>
                       location.replace('notice-list.php');
                   </script>";
                    }


                    ?>
                    <!-- <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                </div>

                <?php include('layout-files/notice-right-bar.php')  ?>
            </div>
        </div>
    </section>


    <!-- End ccontent Area -->



    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>



</body>

</html>