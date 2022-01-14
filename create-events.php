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
        .event-form label {
            font-size: 15px !important;
            font-weight: 600 !important;
            color: black !important;

        }

        .event-form .notice-category select {
            width: 500px !important;
        }

        .event-form .btn {
            width: 300px !important;
        }
    </style>
</head>

<body>

    <?php
    $error = array(
        'error' => False,
        'msg' => ''
    );
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $event_type = $_POST['event_type'];
        $venue_id = $_POST['venue_id'];
        $guest = $_POST['guest'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $organizer_name = $_POST['organizer_name'];

        $image_file_destination = 'img/events';
        $image_extention = array('jpg', 'jpeg', 'png', 'PNG', 'JPEG', 'JPG');

        if (!empty($_FILES["image"]["name"])) {
            $image_response = upload_file("image", $image_extention, $image_file_destination);
            echo 'inside';
            if (!$image_response['error']) {
                $image_file_name = $image_response['file_name'];
                $columns =
                    array(
                        'Event_id', 'Event_title', 'Event_details', 'event_front_page', 'event_type_id', 'Totall_guest',
                        'Start_time', 'End_time', 'Ticket_price', 'venue_id', 'Organizer_name', 'Status'
                    );

                $values = array(null, $title, $content, $image_file_name, $event_type, $guest, $start_time, $end_time, '0', $venue_id, $organizer_name, 1);
                PushData($con, 'event_details', $columns, $values);
                header('Location:event-list.php');
            } else {
                $error['error'] = true;
            }
        } 
        else {

            $columns =
                array(
                    'Event_id', 'Event_title', 'Event_details', 'event_front_page', 'event_type_id', 'Totall_guest',
                    'Start_time', 'End_time', 'Ticket_price', 'venue_id', 'Organizer_name', 'Status'
                );
            $values = array(null, $title, $content, '', $event_type, $guest, $start_time, $end_time, '0', $venue_id, $organizer_name, '1');
            PushData($con, 'event_details', $columns, $values);
            echo $con->error;
            if($con->error){
                $error['error'] = true;
            }
            else{
                header('Location:event-list.php');
            }
        }
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
                        Create Events
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->

    <div class="container my-5">
        <div class="row my-3">
            <div class="col-md-10 mx-auto">
                <div class="card event-form">
                    <div class="card-body">
                        <h4 class="card-title my-2">**Fill Up All Required Information**</h4>

                        <?php
                        if ($error['error']) {
                        ?>
                            <p class="text-danger"> Failed To Upload Events. Please Carefully Fill Up All Required Fields</p>
                        <?php
                        }
                        ?>
                        <form id='notice-form' action="create-events.php" method="post" enctype='multipart/form-data'>
                            <div class="form-group event-heading">
                                <label for="">Events Title <span class="text-danger">*</span></label>
                                <input type="text" required class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Not more Than 80 words</small>
                            </div>
                            <div class="form-group notice-content">
                                <label for="">Event Description <span class="text-danger">*</span></label>
                                <textarea required class="form-control" name="content" id="" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Event Image File </label>
                                <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-muted">File Should Be In jpg,png or jpeg</small>
                            </div>
                            <div class="form-group event_type">
                                <label for="">Event Type <span class="text-danger">*</span></label>
                                <?php $result = PullData($con, 'event_type', '*', '', ''); ?>
                                <select class="form-control" name="event_type" id="">
                                    <?php while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['event_type_id'] ?>"><?php echo $row['Type_name'] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group event_category">
                                <label for="">Event Venue <span class="text-danger">*</span></label>
                                <?php $result = PullData($con, 'venue', '*', '', ''); ?>
                                <select class="form-control" name="venue_id" id="">
                                    <?php while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['venue_id'] ?>"><?php echo $row['Venue_name'] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Total Approximate Guest <span class="text-danger">*</span></label>
                                <input type="number" class="form-control guest" requried name="guest" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Event Start Time <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control guest" requried name="start_time" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Event End Time <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control guest" requried name="end_time" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group event-heading">
                                <label for="">Event Organize By <span class="text-danger">*</span></label>
                                <input type="text" required class="form-control" name="organizer_name" id="" aria-describedby="helpId" placeholder="">
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