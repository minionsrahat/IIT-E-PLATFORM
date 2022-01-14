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
        #routine {
            border-collapse: collapse;
            /* table-layout: fixed;  */
        }

        table td {
            padding: 5px;
            table-layout: fixed;
            max-width: 100px;
            min-width: 100px;
            overflow: hidden;
            word-wrap: break-word;
        }

        /* And this to your table's `td` elements. */
        #routine td {
            padding: 5px;
            word-wrap: break-word;

        }

        .header {
            padding: 0;
        }

        .purple {
            background: #ab3fdd;
        }

        .wine {
            background: #FA1C9B;
        }
    </style>
</head>
<body>
    <?php include('layout-files/navigation-menu.php'); 
    alluser();
    ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Routine
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->

    <?php
    $day = ['SUN', 'MON', 'TUE', 'WED', 'THU'];
    $room = ['Lab 1', 'Lab 2', 'Room 301'];
    ?>


    <!-- End ccontent Area -->

    <div class=" mt-5 container">
        
        <div class="row my-5">
            <div class="col-md-8 mx-auto d-flex flex-row ">
                <div class="bg-success p-1  text-center text-white">1st Batch</div>
                <div class=" purple p-1 text-center text-white ml-2">2nd Batch</div>
                <div class=" wine p-1 text-center text-white ml-2">3rd Batch</div>
                <div class=" bg-primary p-1 text-center text-white ml-2 ">Extra Class</div>
                <div class=" bg-danger p-1 text-center text-white ml-2">Postponed</div>
            </div>
        </div>
        <div class="row mt-5"style="overflow-x: auto;">
            <table class="table table-bordered text-center" id="routine">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Room</th>
                        <th>9am</th>
                        <th>10am</th>
                        <th>11am</th>
                        <th>12pm</th>
                        <th>1pm</th>
                        <th>2pm</th>
                        <th>3pm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $d = 0;
                    $r = 0;
                    $flag = True;
                    for ($i = 0; $i < 15; $i++) {
                    ?>
                        <tr>
                            <?php echo (($i % 3) == 0) ? '<td scope="row" rowspan="3" style="vertical-align:middle;">' . $day[$d++] . '</td>' : ''; ?>
                            <?php
                            for ($j = 1; $j <= 7; $j++) {
                                if ($j == 6 && $flag) {

                                    echo '<td rowspan="15" style="vertical-align:middle;">Break</td>';
                                    $flag = false;
                                }
                                if ($j == 1) {
                                    if ($r == 3) {
                                        $r = 0;
                                    }
                                    echo '<td><span>' . $room[$r++] . '</span></td>';
                                } else {
                            ?>
                                    <td class="" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'c'; ?>>
                                        <div class=" " id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'parentdiv'; ?>>
                                            <div class="p-0" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'divforslot'; ?>>
                                            </div>
                                            <div class="p-0" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'divforextraslot'; ?>>
                                            </div>
                                            <div class="collapse header" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'collaspeddiv'; ?>>
                                                <div class="card card-body">
                                                    <p>Information Secutiry 2nd Batch</p>
                                                </div>
                                            </div>
                                            <div id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'divforstatusdropbox'; ?>>

                                            </div>
                                            <div id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'divforextraslotdropbox'; ?>>

                                            </div>

                                        </div>
                                    </td>

                            <?php

                                }
                            }

                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>

    <script>
        function loadExtraClass() {


            $.ajax({
                type: "post",
                url: "routine/student-fetch-routine-table.php",
                data: {
                    action: 'LoadExtraClass'

                },
                dataType: "json",
                success: function(response) {

                    // console.log(response)
                    $.each(response.data, function(index, obj) {
                        var id = obj.row + "" + obj.subrow + "" + obj.col;
                        $('#' + id + "divforextraslot").html(obj.div);
                    });

                }
            });


        }

        function fetch_assigned_slot_for_all() {
            $.ajax({
                type: "post",
                url: "routine/student-fetch-routine-table.php",
                data: {
                    action: 'fetch_assigned_slot_for_all'
                },
                dataType: "json",
                success: function(response) {

                    // console.log(response)
                    $.each(response.data, function(index, obj) {
                        var id = obj.row + "" + obj.subrow + "" + obj.col;
                        if (obj.status == 0) {

                            $('#' + id + "divforslot").html('<div class="bg-danger  text-white "  aria-expanded="false"  onclick="toggle(' + id + ')"><p class="p-0 m-0">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-times-circle text-white" aria-hidden="true"></i>');

                        } else if(obj.batch_id==1){
                            $('#' + id + "divforslot").html('<div class="bg-success  text-white "  aria-expanded="false"  onclick="toggle(' + id + ')"><p class="p-0 m-0">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-check-circle text-white" aria-hidden="true"></i>');

                        }
                        else if(obj.batch_id==2){
                            $('#' + id + "divforslot").html('<div class="purple text-white "  aria-expanded="false"  onclick="toggle(' + id + ')"><p class="p-0 m-0">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-check-circle text-white" aria-hidden="true"></i>');

                        }
                        else if(obj.batch_id==3){
                            $('#' + id + "divforslot").html('<div class="wine text-white "  aria-expanded="false"  onclick="toggle(' + id + ')"><p class="p-0 m-0">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-check-circle text-white" aria-hidden="true"></i>');

                        }
                        var cardbody = ' <div class="card card-body"><p>' + obj.course_name + ' ' + obj.batch_name + '</p></div>'
                        $('#' + id + "collaspeddiv").html(cardbody)
                    });

                }
            });

        }


        function toggle(elementId) {
            elementId = elementId + "collaspeddiv";
            var ele = document.getElementById(elementId);
            $(ele).collapse('toggle');
        }
        $(document).ready(function() {
            fetch_assigned_slot_for_all();
            loadExtraClass();
        });
    </script>


</body>

</html>