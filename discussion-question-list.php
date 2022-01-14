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
        .code-block {
            max-height: 600px !important;

        }

        .code {
            word-wrap: break-word !important;
            white-space: pre-wrap !important;
            max-width: fit-content !important;
            max-height: 550px !important;
        }

        .single-queston {
            padding: 20px;
            /* text-decoration: none; */
        }

        .single-queston a {
            text-decoration: none;
        }

        .posted-by span {
            padding: 10px;
            color: black;

        }

        .topic-btn {
            border-radius: 50px 50px 50px 50px !important;
            background-color: #008080 !important;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <?php
    $cat_id = 0;

    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
    }

    // $result=PullData()
    ?>





    <?php include('layout-files/navigation-menu.php') ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                       Online Discussion Forum
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->



    <!-- End ccontent Area -->
    <section>
        <div class="row mt-4">

            <div class="col-lg-2"></div>
            <div class="col-lg-6 col-md-12  center-col col-12">
                <div class="center-div p-2">
                    <div class="jumbotron p-1 ">
                        <?php
                        if ($cat_id == 0) {
                        ?>
                            <a name="" id="" class="btn btn-primary topic-btn" disabled href="discussion-question-list.php?cat_id=0" role="button">All</a>
                        <?php
                        } else {
                        ?>
                            <a name="" id="" class="btn btn-primary" href="discussion-question-list.php?cat_id=0" role="button">All</a>

                        <?php
                        }
                        ?>

                        <?php
                        $result = PullData($con, 'discussion_category', '*', '', '');

                        ?>
                        <?php
                        foreach ($result as $key => $value) {

                        ?>
                            <?php
                            if ($cat_id == $value['cat_id']) {
                            ?>

                                <a name="" id="" class="btn btn-primary topic-btn m-1" href="discussion-question-list.php?cat_id=<?php echo $value['cat_id']; ?>" role="button"><?php echo $value['cat_name']; ?></a>

                            <?php
                            } else {
                            ?>
                                <a name="" id="" class="btn btn-primary m-1" href="discussion-question-list.php?cat_id=<?php echo $value['cat_id']; ?>" role="button"><?php echo $value['cat_name']; ?></a>


                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                if ($cat_id == 0) {
                    $sql = "SELECT COUNT(discussion_answers.question_id) as comments,discussion_questions.title as title,discussion_questions.id as id, discussion_questions.date as date,discussion_questions.posted_by as posted_by FROM discussion_questions LEFT join discussion_answers on discussion_questions.id=discussion_answers.question_id
                    GROUP by discussion_questions.id  ORDER by discussion_questions.date DESC  ";
                } else {
                    $sql = "SELECT COUNT(discussion_answers.question_id) as comments,discussion_questions.title as title, discussion_questions.id as id, discussion_questions.date as date,discussion_questions.posted_by as posted_by FROM discussion_questions LEFT join discussion_answers on discussion_questions.id=discussion_answers.question_id 
                    WHERE discussion_questions.cat_id='$cat_id' 
                    GROUP by discussion_questions.id   ORDER by discussion_questions.date DESC";
                }

                $result = $con->query($sql);
                ?>
                <div class="center-div p-2">
                    <div class="jumbotron">
                        <div class="some-list">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="single-item">

                                    <div class="single-queston">
                                        <a href="discussion-single-question.php?question_id=<?php echo $value['id'] ?>">
                                            <h4 class=""><?php echo $value['title'] ?></h4>
                                        </a>
                                        <div class="posted-by d-flex flex-row">
                                            <span>Posted at: <?php echo $value['date'] ?></span>
                                            <hr width="2" size="50" style="display:inline-block">
                                            <span>Comments(<?php echo $value['comments'] ?>)</span>
                                            <hr width="2" size="500">

                                            <span>Posted by: <?php echo $value['posted_by'] ?></span>


                                        </div>

                                    </div>

                                    <hr>
                                </div>

                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>

            <?php
            include('layout-files/discussion-question-right-bar.php')
            ?>
        </div>
    </section>



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
    <script src="static-load-more/jquery.simpleLoadMore.min.js"></script>

    <script>
        $(document).ready(function() {

            $('pre.code').highlight();
            $(function() {
                $('#editor').wysiwyg_editor({
                    enableFooter: false
                });
            });
            setTimeout(() => {
                $(".wysiwyg_editor_textarea").attr('name', 'code_snippet');
                $(".wysiwyg_editor_textarea").val('');
            }, 500);

            $('.some-list').simpleLoadMore({
                item: '.single-item',
                count: 5,
                counterInBtn: true,
                btnHTML: '<a name="" id="" class="btn topic-btn text-white load-more__btn"  href="" role="button">View More {showing}/{total} <i class="fas fa-angle-down"></i></a>',
                btnText: 'View More {showing}/{total}',
            });

            // 
        });
    </script>



</body>

</html>