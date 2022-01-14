<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget search-widget">
            <form class="search-form" action="discussion-search-results.php" method="post">
                <input placeholder="Search Posts" name="search_text" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="category-title">Topic Catgories</h4>
            <ul class="cat-list">
           
                <?php
                $sql = "SELECT COUNT(discussion_questions.cat_id) as questions,discussion_category.cat_name as cat_name, discussion_category.cat_id as cat_id FROM  discussion_category LEFT JOIN discussion_questions  on discussion_questions.cat_id=discussion_category.cat_id GROUP by discussion_category.cat_id  ORDER by questions DESC;";
                $result = $con->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <li>
                        <a href="discussion-question-list.php?cat_id=<?php echo $row['cat_id'] ?>" class="d-flex justify-content-between">
                            <p><?php echo $row['cat_name'] ?></p>
                            <p><?php echo $row['questions'] ?></p>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="popular-title">Popular Questions</h4>
            <div class="popular-post-list">
                <?php
                $sql = "SELECT COUNT(discussion_answers.question_id) as comments,discussion_questions.title as title,discussion_questions.id as id, discussion_questions.date as date FROM discussion_questions LEFT join discussion_answers on discussion_questions.id=discussion_answers.question_id
                GROUP by discussion_questions.id  ORDER by comments DESC LIMIT 7";
                $result = $con->query($sql);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="single-post-list d-flex flex-row align-items-center">
                        <div class="details">
                            <a href="discussion-single-question.php?question_id=<?php echo $row['id'] ?>">
                                <h6><?php echo substr($row['title'],0,30)?></h6>
                            </a>
                            <p><?php echo $row['date'] ?></p>
                        </div>
                    </div>

                <?php
                }

                ?>
            </div>
        </div>
        <div class="single-sidebar-widget ads-widget">
            <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
        </div>
    </div>
</div>