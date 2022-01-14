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
        .topic-btn {
            border-radius: 50px 50px 50px 50px !important;
            background-color: #008080 !important;
            color: white;
            text-decoration: none;
        }
        .post-btn {
            background-color: #008080 !important;
            color: white;
        }
    </style>

</head>

<body>

    <?php
    if (isset($_GET['question_id'])) {
        $question_id = $_GET['question_id'];
        $sql = "SELECT discussion_questions.id as id,discussion_questions.title as title, discussion_questions.description 
   as description,discussion_questions.code_snippet as code_snippet,discussion_questions.date as date, discussion_questions.posted_by as posted_by
   FROM discussion_questions WHERE discussion_questions.id='$question_id'";
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result);
    } else {
        echo '<script> location.replace("index.php"); </script>';
    }
    if (isset($_POST['submit'])) {
        $code_snippet = htmlentities($_POST['code_snippet'], ENT_QUOTES, $encoding = 'UTF-8');
        $username= $_SESSION['username'];
        $sql = "INSERT INTO `discussion_answers`(`id`, `question_id`, `answer`, `answer_by`, `date`) VALUES (null,'$question_id','$code_snippet','$username', CURRENT_TIMESTAMP())";
        $result = $con->prepare($sql);
        $result->execute();
        echo $con->error;
        // echo $code_snippet;
    }
    ?>





    <?php include('layout-files/navigation-menu.php') ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Discussion Forum
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
                        <h2 class=""><?php echo $row['title'] ?></h2>
                        <p class=""><?php echo $row['description'] ?></p>
                        <hr class="my-2">
                        <div class="posted-by d-flex flex-row">
                            <span>Posted at: <?php echo $row['date'] ?></span>
                            <hr width="2" size="50" style="display:inline-block">
                            <span></span>
                            <hr width="2" size="500">
                            <span>Posted by:  <?php echo $row['posted_by'] ?></span>
                        </div>
                        <hr class="my-2">
                        <p>More info</p>
                       
                        <div class="code-block">
                            <?php $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", ($row['code_snippet'])) ?>
                            <pre class="code" data-language="js">
                       <?php echo $string;
                        ?>
                       </pre>

                        </div>
                    </div>

                </div>
                <div class="center-div my-3 p-2">
                    <h4>Comments (
                        <?php
                        $conditon = array(
                            'question_id' => $question_id
                        );
                        if (num_of_rows($con, 'discussion_answers', $conditon, '') > 0) {
                            echo num_of_rows($con, 'discussion_answers', $conditon, '');
                        } else {
                            echo "No Comments";
                        }

                        ?>

                        )</h4>
                    <div class="some-list">

                        <?php
                        $sql = "SELECT discussion_answers.answer as answer,discussion_answers.answer_by as answer_by, discussion_answers.date as date FROM discussion_answers WHERE question_id='$question_id'";
                        $result = $con->query($sql);
                        ?>
                        <?php
                        foreach ($result as $key => $value) {
                            $date = strtotime($value['date']);
                            $date = date('m/d/y', $date);
                        ?>
                            <div class='single-item'>
                                <div class="jumbotron">
                                    <div style="white-space:nowrap;">
                                        <pre>
                                            <code>
                                            <p class=""><?php
                                                        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", ($value['answer']));
                                                        echo ($string) ?></p>
                                            </code>
                                        </pre>
                                    </div>


                                    <hr class="my-2">
                                    <div class=" d-flex flex-row">
                                        <span class="">Ansered at: <?php echo $date ?></span>
                                        <hr width="2" size="50" style="display:inline-block">
                                        <span>Answered by:  <?php echo $value['answer_by'] ?> </a></span>
                                    </div>


                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>


                </div>

                <div class="center-div my-1 p-1">
                    <form action="discussion-single-question.php?question_id=<?php echo  $question_id ?>" method="post">
                        <div class="jumbotron">
                            <?php
                            if (isset($_SESSION['login'])) {
                            ?>

                                <div class="shadow">
                                    <div id="editor"></div>
                                    <button type="submit" name="submit" class=" post-btn btn my-3 text-white ml-2">Post Your Answer</button>
                                </div>
                            <?php
                            } else {
                                echo ' <h4 class="mb-3">You have to login to post your comment</h4>';
                            }
                            ?>
                        </div>
                    </form>
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
    <script src="static-load-more/jquery.simpleLoadMore.min.js"></script>
   

    <script>
        $(document).ready(function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
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