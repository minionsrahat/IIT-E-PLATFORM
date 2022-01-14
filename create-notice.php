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
    <style>
        .notice-form label {
            font-size: 15px !important;
            font-weight: 600 !important;
            color: black !important;

        }

        .notice-form .notice-category select {
            width: 500px !important;
        }

        .notice-form .btn {
            width: 300px !important;
        }
    </style>
</head>

<body>

<?php
    $error= array(
        'error' => False,
        'msg' => ''
    );
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $notice_category = $_POST['notice-category'];
       
        $pdf_file_destination = 'pdf-files';
        
        $image_file_destination = 'img/notices';

        // get the file extension
        $pdf_extension =array('pdf');
        $image_extention=array('jpg','jpeg','png','PNG','JPEG','JPG');
        
        $image_response=upload_file("image",$image_extention,$image_file_destination);
        $pdf_response=upload_file("pdf",$pdf_extension,$pdf_file_destination);
        if(!$image_response['error'] && !$pdf_response['error'])
        {
            $image_file_name=$image_response['file_name'];
            $pdf_file_name=$pdf_response['file_name'];
            $username=$_SESSION['username'];
            $columns=array('id', 'notice_title', 'notice_content', 'notice_pdf', 'notice_img', 'notice_category', 'post_date', 'post_by');
            $values=array(null,$title,$content,$pdf_file_name,$image_file_name,$notice_category,''.date('Y-m-d H:i:s'),$username);
            PushData($con,'notices',$columns,$values);
            echo $con->error;
        }
        else{
          $error['error']=true;
        }


        // echo $fname;
        // echo $lname;
        // echo $password;
        // echo $gender;
        // echo $address;
        // echo $email;
        // echo $phonenum;
        // echo $date;

    }

    ?>


    <?php include('layout-files/navigation-menu.php');
    staff();
    ?>





    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Create Routine
                    </h1>
                    <p class="text-white link-nav">As a </a> <span class="lnr lnr-arrow-right"></span></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->

    <div class="container my-5">
        <div class="row my-3">
            <div class="col-md-10 mx-auto">
                <div class="card notice-form">
                    <div class="card-body">
                        <h4 class="card-title my-2">**Fill Up All Required Information**</h4>

                    <?php
                    if($error['error'])
                    {
                        ?>
                        <p class="text-danger"> Failed To Upload Notice. Please Carefully Fill Up All Required Fields</p>
                        <?php
                    }
                    ?>
                        <form id='notice-form' action="create-notice.php" method="post"  enctype='multipart/form-data'>
                            <div class="form-group notice-heading">
                                <label for="">Notice Heading <span class="text-danger">*</span></label>
                                <input type="text" required class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Not more Than 80 words</small>
                            </div>
                            <div class="form-group notice-content">
                                <label for="">Notice Content <span class="text-danger">*</span></label>
                                <textarea required class="form-control" name="content" id="" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Notice Image File <span class="text-danger">*</span></label>
                                <input type="file" required class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-muted">File Should Be In jpg,png or jpeg</small>
                            </div>
                            <div class="form-group">
                                <label for="">Notice Pdf File</label>
                                <input type="file" required class="form-control-file" name="pdf" id="" placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-muted">File Should Be In pdf Format</small>
                            </div>
                            <div class="form-group notice-category">
                                <label for="">Category <span class="text-danger">*</span></label>
                                <?php $result = PullData($con, 'notice_category', '*', '', ''); ?>
                                <select class="form-control" name="notice-category" id="">
                                    <?php while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="text-center my-2">
                                <button type="submit" name='submit' class="btn btn-outline-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <!-- End ccontent Area -->



    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>

    <!-- <script>
        $(document).ready(function() {
                    $("#notice-form").validate({
                            rules: {
                                title: {
                                    required: true,
                                    minlength: 10
                                },
                                content: {
                                    required: true,
                                    minlength: 50
                                },
                            },
                            messages: {
                                title: {
                                    minlength: "Title should be at least 20 characters"
                                },
                                content: {
                                    minlength: "Notice Content should be at least 50 characters"
                                },
                            }
                            });
                    });
    </script> -->

</body>

</html>