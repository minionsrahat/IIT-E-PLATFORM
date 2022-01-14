<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget search-widget">
            <form class="search-form" action="search-notice-results.php" method="post">
                <input placeholder="Search Posts" name="search_text" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                <button type="submit" name="search_query"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="category-title">Notice Catgories</h4>
            <ul class="cat-list">
           
                <?php
                $sql = "SELECT notice_category.category_name as cat_name,notice_category.id as cat_id, count(notices.id) as total_notice FROM  notice_category left JOIN  notices on notice_category.id=notices.notice_category GROUP by notice_category.category_name ORDER by count(notices.id) DESC";
                $result = $con->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <li>
                        <a href="notice-list-by-categories.php?cat_id=<?php echo $row['cat_id'] ?>" class="d-flex justify-content-between">
                            <p><?php echo $row['cat_name'] ?></p>
                            <p><?php echo $row['total_notice'] ?></p>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="popular-title">Popular Notices</h4>
            <div class="popular-post-list">
                <?php
                $sql = "SELECT * FROM notices ORDER by notices.post_date DESC";
                $result = $con->query($sql);

                while ($row = mysqli_fetch_array($result)) {
                ?>

                    <div class="single-post-list d-flex flex-row align-items-center">
                        <div class="thumb">
                            <img class="" style="width: 100px; height: 80px;" src="img/notices/<?php echo $row['notice_img'] ?>" alt="">
                        </div>
                        <div class="details">
                            <a href="view-single-notice.php?notice_id=<?php echo $row['id'] ?>">
                                <h6><?php echo substr($row['notice_title'],0,20)?></h6>
                            </a>
                            <p><?php echo $row['post_date'] ?></p>
                        </div>
                    </div>

                <?php
                }

                ?>

                <div class="single-post-list d-flex flex-row align-items-center">
                    <div class="thumb">
                        <img class="img-fluid" src="img/blog/pp2.jpg" alt="">
                    </div>
                    <div class="details">
                        <a href="blog-single.html">
                            <h6>The Amazing Hubble</h6>
                        </a>
                        <p>02 Hours ago</p>
                    </div>
                </div>
                <div class="single-post-list d-flex flex-row align-items-center">
                    <div class="thumb">
                        <img class="img-fluid" src="img/blog/pp3.jpg" alt="">
                    </div>
                    <div class="details">
                        <a href="blog-single.html">
                            <h6>Astronomy Or Astrology</h6>
                        </a>
                        <p>02 Hours ago</p>
                    </div>
                </div>
                <div class="single-post-list d-flex flex-row align-items-center">
                    <div class="thumb">
                        <img class="img-fluid" src="img/blog/pp4.jpg" alt="">
                    </div>
                    <div class="details">
                        <a href="blog-single.html">
                            <h6>Asteroids telescope</h6>
                        </a>
                        <p>02 Hours ago</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-sidebar-widget ads-widget">
            <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
        </div>
    </div>
</div>