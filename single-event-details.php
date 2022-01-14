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




    <?php include('layout-files/navigation-menu.php')
    ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Event Details
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <?php
    if (isset($_GET['event_id'])) {
        $event_id = $_GET['event_id'];
        $sql = "SELECT event_details.Event_id as event_id,event_details.Event_title as 
    event_title,event_details.Event_details as event_details, event_details.Organizer_name as organiser_name,
    event_type.Type_Image as event_type_pic,event_details.event_front_page as front_page,venue.Venue_name as venue_name,
    event_type.Type_name as event_type,event_details.Start_time as start_time,event_details.End_time as end_time,venue.Venue_location as location, venue.Venue_capacity as venue_capacity
     FROM event_details,event_type,venue WHERE event_details.venue_id=venue.venue_id and event_details.event_type_id=event_type.event_type_id and event_details.Event_id='$event_id'";
        $result = fetch_query_result($con, $sql);
        $row = mysqli_fetch_array($result);
    }

    ?>

    <!-- Start content Area -->
    <section class="event-details-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 event-details-left">
                    <div class="main-img">
                        <img class="img-fluid" src="img/events/
								<?php
                                if ($row['front_page'] == '') {
                                    echo $row['event_type_pic'];
                                } else {
                                    echo $row['front_page'];
                                }
                                ?>" alt="">
                    </div>
                    <div class="details-content">
                        <a href="#">
                            <h4><?php echo $row['event_title'] ?></h4>
                        </a>
                        <p>
                            <?php echo $row['event_details'] ?>
                        </p>

                    </div>
                    <div class="social-nav row no-gutters">
                        <div class="col-lg-6 col-md-6 ">
                            <ul class="focials">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 navs">
                            <?php if (isset($_SESSION['staff_login']) && $_SESSION['staff_login']) {
                            ?>

                                <a href="edit-events.php?event_id=<?php echo $event_id ?>" class="nav-prev"><span class="lnr lnr-arrow-left"></span>Edit Event</a>
                                <a href="delete.php?event_id=<?php echo $event_id ?>"  class="nav-next">Delete Event<span class="lnr lnr-arrow-right"></span></a>
                            <?php


                            } ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 event-details-right">
                    <div class="single-event-details">
                        <h4>Details</h4>
                        <ul class="mt-10">
                            <li class="justify-content-between d-flex">
                                <span>Start Date</span>
                                <span><?php echo $row['start_time'] ?></span>
                            </li>
                            <li class="justify-content-between d-flex">
                                <span>End date</span>
                                <span><?php echo $row['end_time'] ?></span>
                            </li>
                            <li class="justify-content-between d-flex">
                                <span>Ticket Price</span>
                                <span>Free of Cost</span>
                            </li>
                        </ul>
                    </div>
                    <div class="single-event-details">
                        <h4>Venue</h4>
                        <ul class="mt-10">
                            <li class="justify-content-between d-flex">
                                <span>Place</span>
                                <span><?php echo $row['venue_name'] ?></span>
                            </li>
                            <li class="justify-content-between d-flex">
                                <span>Location</span>
                                <span><?php echo $row['location'] ?></span>
                            </li>
                            <li class="justify-content-between d-flex">
                                <span>Capacity</span>
                                <span><?php echo $row['venue_capacity'] ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="single-event-details">
                        <h4>Organiser</h4>
                        <ul class="mt-10">
                            <li class="justify-content-between d-flex">
                                <span><?php echo $row['organiser_name'] ?></span>

                            </li>

                        </ul>
                    </div>
                </div>
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