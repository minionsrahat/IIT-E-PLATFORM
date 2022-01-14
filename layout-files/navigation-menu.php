<header id="header" id="home">

  <!-- <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
          <a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+953 012 3654 896</span></a>
          <a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">support@colorlib.com</span></a>
        </div>
      </div>
    </div>
  </div> -->
  <div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
      <div id="logo">
        <!-- <a href="index.php"><img src="img/logo.png" alt="" title="" /></a> -->
        <a href="index.php" style="font-size: 20px;font-weight: 600;color: white;">IIT E-PLATFORM</a>


      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <?php
          if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {
            echo ' <li><a href="staff-view-online-library.php">Online Library</a></li>';
          } elseif(isset($_SESSION['login']) && $_SESSION['login']) {
            echo ' <li><a href="user-view-library.php">Online Library</a></li>';
          }
          ?>
           <?php
          if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {
          ?>
          <li class="menu-has-children"><a href="">Events</a>
            <ul>
              <li><a href="create-events.php">Create Events</a></li>
              <li><a href="event-list.php">View Events</a></li>
              <li><a href="event-calendar.php">Events Calendar</a></li>
            </ul>
          </li>
          <?php
          }
          else{
            ?>
          <li class="menu-has-children"><a href="">Events</a>
            <ul>
              <li><a href="event-list.php">View Events</a></li>
              <li><a href="event-calendar.php">Events Calendar</a></li>
            </ul>
          </li>   
            <?php
          }
          ?>
          <li><a href="gallery.html">Gallery</a></li>

          <?php
          if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {
          ?>
          <li class="menu-has-children"><a href="">Routine</a>
            <ul>
              <li><a href="staff-create-routine.php">Create Routine</a></li>
              <li><a href="student-view-routine.php">View Routine</a></li>
            </ul>
          </li>
          <?php
          }
          elseif(isset($_SESSION['teacher_login']) && $_SESSION['teacher_login']){
            ?>
            <li class="menu-has-children"><a href="">Routine</a>
            <ul>
              <li><a href="teacher-view-routine.php">Manage Routine</a></li>
              <li><a href="student-view-routine.php">View Routine</a></li>
            </ul>
          </li>
          <?php
          }
          elseif(isset($_SESSION['student_login']) && $_SESSION['student_login'])
          {
            ?>
          <li><a href="student-view-routine.php">Routine</a></li>
            <?php
          }
          ?>
          
          <?php
          if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {
          ?>
          <li class="menu-has-children"><a href="">Notices</a>
            <ul>
              <li><a href="create-notice.php">Create Notices</a></li>
              <li><a href="notice-list.php">View Notices</a></li>
            </ul>
          </li>
          <?php
          }
          else{
            ?>
              <li><a href="notice-list.php">Notices</a></li>
            <?php
          }
          ?>
            <?php
          if (isset($_SESSION['login']) && $_SESSION['login']) {
          ?>
          <li class="menu-has-children"><a href="">Forum</a>
            <ul>
              <li><a href="ask-discussion-question.php">Ask a Question</a></li>
              <li><a href="discussion-question-list.php">Browse Questions</a></li>
            </ul>
          </li>
          <?php
          }
          else{
            ?>
              <li><a href="discussion-question-list.php">Forum</a></li>
            <?php
          }
          ?>
          <?php
          if (isset($_SESSION['teacher_login']) && $_SESSION['teacher_login']) {
          ?>
            <li class="menu-has-children"><a href="">Result</a>
              <ul>
                <li><a href="blog-home.html">Blog Home</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
              </ul>
            </li>
          <?php
          }
          ?>
           <?php
          if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {
          ?>
            <li class="menu-has-children"><a href="">Result</a>
              <ul>
                <li><a href="blog-home.html">View Results</a></li>
              </ul>
            </li>
          <?php
          }
          ?>
             <?php
          if (isset($_SESSION['student_login']) && $_SESSION['student_login']) {
          ?>
            <li class="menu-has-children"><a href="">Result</a>
              <ul>
                <li><a href="blog-home.html">View Results</a></li>
              </ul>
            </li>
          <?php
          }
          ?>
          <?php
          if (isset($_SESSION['login']) && $_SESSION['login']) {
          ?>
            <li class="menu-has-children"><a href="">
            <?php
            if(isset($_SESSION['staff_login'])){
              echo 'Staff';
            }
            elseif(isset($_SESSION['teacher_login'])){
              echo 'Teacher';
            }
           else if(isset($_SESSION['student_login'])){
              echo 'Student';
            }
            ?>  
            </a>
              <ul>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="php-database-manipulation-files/logout.php">Logout</a></li>

              </ul>
            </li>

          <?php
          } else {
          ?>
            <li class="menu-has-children"><a href="">Login</a>
              <ul>
                <li><a href="login.php?type=1">As a Teacher</a></li>
                <li><a href="login.php?type=2">As a Staff</a></li>
                <li><a href="login.php?type=3">As a Student</a></li>
              </ul>
            </li>
          <?php
          }
          ?>


          <li><a href="contact-us.php">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </div>
</header><!-- #header -->