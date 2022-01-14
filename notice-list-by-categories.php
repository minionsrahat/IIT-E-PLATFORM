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
    <?php
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
       

        $sql = "SELECT notices.*,notice_category.category_name as cat_name FROM notices,notice_category
                       WHERE notices.notice_category=notice_category.id and notice_category.id='$cat_id'";
        $result = $con->query($sql);
        if (mysqli_num_rows($result) < 1) {
            echo "  <script>
                            location.replace('notice-list.php');
                        </script>";
        }
    } else {
        echo "  <script>
                       location.replace('notice-list.php');
                   </script>";
    }
    ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Notice
                    </h1>
                    <?php 
                     $conditon=array(
                        'id'=>$cat_id
                    );
                    $category_name=PullData($con,'notice_category','category_name',$conditon,'');
                    $category_name=mysqli_fetch_array($category_name);
                    ?>
                    <p class="text-white link-nav">Notices <span class="lnr lnr-arrow-right"> <?php echo $category_name['category_name'] ?></span></p>
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
                    ?>


                    <nav class="blog-pagination justify-content-center d-flex">
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
                    </nav>
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