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
$search_query ="";
if (isset($_POST['submit'])) {
    $search_query=$_POST['search_text'];
    // echo $search_query;
}
?>
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Search Results
                    </h1>
                    <p class="text-white link-nav">As a </a> <span class="lnr lnr-arrow-right">"
                    <?php
                    if(isset($_POST['submit'])){
                        echo $_POST['search_text'];
                    }
                    ?>    
                    "</span></p>
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
              
                <?php
               
                    $sql = "SELECT COUNT(discussion_answers.question_id) as comments,questions.title as title,questions.id as id, questions.date as date,questions.posted_by as posted_by FROM 
                    (SELECT * FROM discussion_questions WHERE MATCH(discussion_questions.title,discussion_questions.description) against('$search_query')) as questions LEFT join discussion_answers on questions.id=discussion_answers.question_id
                                     
                                       GROUP by questions.id  ORDER by questions.date DESC";

                $result = $con->query($sql);
                ?>
                <div class="center-div p-2">
                    <div class="jumbotron">
                        <?php
                        if(mysqli_num_rows($result)>0)
                        {
                        ?>
                        <div class="some-list">
                            <?php
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="single-item">

                                    <div class="single-queston">
                                        <a href="discussion-single-question.php?question_id=<?php echo $value['id'] ?>">
                                            <h4 class=""><?php echo $value['title'] ?></h4>

                                            <div class="posted-by d-flex flex-row">
                                                <span>Posted at: <?php echo $value['date'] ?></span>
                                                <hr width="2" size="50" style="display:inline-block">
                                                <span>Comments(<?php echo $value['comments'] ?>)</span>
                                                <hr width="2" size="500">
                                                <span>Posted by: <?php echo $value['posted_by'] ?></span>
                                            </div>
                                        </a>
                                    </div>

                                    <hr>
                                </div>

                            <?php
                            }

                            ?>
                        </div>

                        <?php
                        }
                        else
                        {
                            ?>
                                <h4>Sorry!!!! No Result Founds</h4>
                            <?php
                        }
                        
                        ?>
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

    <?php include('layout-files/js-links.php') ?>



   

</body>

</html>