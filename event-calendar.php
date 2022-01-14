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
    <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.css" />
    <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.midnight-blue.css" />

</head>

<body>




    <?php include('layout-files/navigation-menu.php') ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Events Calendar
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->

    <div class="container my-5">
        <div id="calendar"></div>
    </div>


    <!-- End ccontent Area -->

    <?php
    $result = PullData($con, 'event_details', '*', '', '');
    $output = array('data' => array());
    $x = 1;
    $calendar = '';
    while ($row = mysqli_fetch_array($result)) {
        $content = '' . substr($row['Event_details'], 0, 30);
        //   $content.='<a name="" id="" class="btn btn-primary" href="single-event-details.php?event_id='.$row['Event_id'].'" role="button">Details</a>';
        $date = date('F j, Y', strtotime($row['Start_time']));
        $calendar .= '
      $("#calendar").evoCalendar("addCalendarEvent", {
        id: "' . $row['Event_id'] . '",
        name: "' . $row['Event_title'] . '",
        description:"' . $content . '",
        date:"'.$date.'",
        type: "event",
        color: "#63d867",
    });
      ';
    }

    ?>

    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>




    <script src="evo-calendar/js/evo-calendar.js"></script>

    <script>
        event_response = '';

        function loadevents() {
            $.ajax({
                type: "post",
                url: "php-database-manipulation-files/fetch_events_for_calendar.php",
                data: {
                    action: 'fetch_event'
                },
                dataType: "json",
                success: function(response) {
               
                    $.each(response.data, function(index, obj) {
                        $('#calendar').evoCalendar('addCalendarEvent', {
                            id:''+ obj.id,
                            name:''+ obj.title,
                            description:''+obj.content,
                            date: obj.date,
                            type: 'event',
                            color: '#63d867',

                        });
                    });
                }
            });

        }

        function details(id) {
            console.log((id))
            $('#' + id).collapse('toggle')
        }
        $(document).ready(function() {

            console.log('object :>> ', new Date());

            $('#calendar').evoCalendar({
                settingName: 20
            })
           
            loadevents();

        })
    </script>





</body>

</html>