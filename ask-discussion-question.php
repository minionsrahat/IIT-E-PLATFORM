<?php include('layout-files/import_files.php') 
?>
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
    include('layout-files/css-links.php');
   
    ?>
    <style>
        .category .form-control {

            width: 400px !important;
        }

        .title p {
            font-size: 16px;
        }

        .description p {
            font-size: 16px;
        }

        .code-snippet p {
            font-size: 16px;
        }

        .post-btn {
            background-color: #008080 !important;
            color: white;
        }
    </style>
</head>

<body>


    <?php
    if (isset($_POST['submit'])) {

        $title = CONVERT_TEXT_htmlentities_ENT_QUOTES($_POST['title'], $con);
        $des = CONVERT_TEXT_htmlentities_ENT_QUOTES($_POST['description'], $con);
        $code_snippet = htmlentities($_POST['code_snippet'], ENT_QUOTES, $encoding = 'UTF-8');
    ?>

    <?php
        $user_name = $_SESSION['username'];
        $catid = $_POST['category'];
        $sql = "INSERT INTO `discussion_questions`(`id`, `cat_id`, `title`, `description`, `code_snippet`, `posted_by`,`date`) VALUES(null,'$catid','$title','$des','$code_snippet','$user_name', CURRENT_TIMESTAMP())";
        $result = $con->prepare($sql);
        $result->execute();
        $id = $con->insert_id;
        // echo $id;
        if (!$con->error) {
            header("location:discussion-single-question.php?question_id=" . $id);
        }
    }


    ?>



    <?php include('layout-files/navigation-menu.php') ;
     alluser();
    ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Ask A Question
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->


    <section>
        <div class="row mt-4">
            <div class="col-lg-2"></div>
            <div class="col-lg-6 col-md-12  center-col col-12">
                <div class="center-div p-2">

                    <div class="jumbotron">
                        <form action="ask-discussion-question.php" method="post">
                            <div class="form-group category">
                                <h4 for="">Category</h4>

                                <?php
                                $result = PullData($con, 'discussion_category', '*', '', '');

                                ?>

                                <select class="form-control " name="category" id="">
                                    <?php
                                    foreach ($result as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value['cat_id'];  ?>"><?php echo $value['cat_name'];  ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group title">
                                <h4 for="">Title</h4>
                                <p class="">Be specific and imagine you’re asking a question to another person</p>
                                <input type="text" class="form-control" name="title" required id="" aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="form-group description">
                                <h4 for="">Body</h4>
                                <p class="">
                                    Include all the information someone would need to answer your question</p>
                                <textarea class="form-control" name="description" required id="" rows="3"></textarea>
                            </div>
                            <hr class="my-2">
                            <div class="code-snippet">
                                <h4 for="">Code Snippet</h4>
                                <p class="">
                                    Include necessary code snippet</p>
                                <div id="editor"></div>
                            </div>
                            <button type="submit" name="submit" class=" post-btn btn my-3 ml-2">Post Your Question</button>
                        </form>

                    </div>

                </div>
            </div>

            <?php
            include('layout-files/discussion-question-right-bar.php')
            ?>
        </div>
    </section>


    <!-- End ccontent Area -->



    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.tabs.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
    <script src='//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


    <script src="code-editor/editor.js"></script>
    <script src="code-editor/lang/en_EN.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.5/ace.js"></script>
    <script src="code-editor/icons/font-awesome-4.js"></script>
    <script src="code-editor/icons/font-awesome-5.js"></script>
    <script src="highlighter/jquery.highlight.js"></script>




    <script>
        $(document).ready(function() {

            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $('pre .code').highlight();

            $(function() {
                $('#editor').wysiwyg_editor({
                    enableFooter: false
                });
            });
            setTimeout(() => {
                $(".wysiwyg_editor_textarea").attr('name', 'code_snippet');
                $(".wysiwyg_editor_textarea").val('');
            }, 500);



            // 
        });
    </script>

</body>

</html>