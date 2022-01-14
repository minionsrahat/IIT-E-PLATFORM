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
    if (isset($_GET['notice_id'])) {
        $notice_id = $_GET['notice_id'];
        $sql = "SELECT notices.*,notice_category.category_name as cat_name FROM notices,notice_category
        WHERE notices.notice_category=notice_category.id and notices.id='$notice_id'";
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result);
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
                    <p class="text-white link-nav">Notice<a href="notice-list.php"><span class="lnr lnr-arrow-right"> Notice List</span></a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->


    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="img/notices/<?php echo $row['notice_img'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3 meta-details">
                            <ul class="tags">
                                <li><a href="#"><?php echo $row['cat_name']  ?></a></li><br>
                            </ul>
                            <div class="user-details row">
                                <p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $row['post_by']  ?></a></p>
                                <p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo $row['post_date']  ?></a></p>
                                <p class="col-lg-12 col-md-12 col-6 text-center"><a name="" id="" class="btn btn-warning ml-auto" href="download_pdf.php?notice_id=<?php echo $notice_id ?>" role="button">Download</a></p>
                                <?php if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {

                                ?>
                                    <p class="col-lg-12 col-md-12 col-6 text-center"><a name="" id="" class="btn btn-primary ml-auto" href="edit-notice.php?notice_id=<?php echo $notice_id ?>" role="button">Edit</a></p>
                                    <p class="col-lg-12 col-md-12 col-6 text-center"><a name="" id="" class="btn btn-danger ml-auto" href="delete.php?notice_id=<?php echo $notice_id ?>" role="button">Delete</a></p>
                                <?php
                                } ?>

                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="mt-20 mb-20"><?php echo $row['notice_title'] ?></h3>
                            <p class="excert">
                                <?php echo $row['notice_content'] ?>
                            </p>
                   
                        </div>
                    </div>
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