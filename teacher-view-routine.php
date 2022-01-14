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
        .borderClass {
            border-color: blue !important;
            border-width: 2px !important;
            border-style: solid !important;

        }

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

       
        #routine td {
            padding: 5px;
            word-wrap: break-word;

        }

        .header {
            padding: 0;
        }
        .hide_block {
            display: none !important;
        }

        .display_block {
            display: block !important;
        }
        .modal-confirm {
            color: #636363;
            width: 400px;
            margin: 30px auto;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
            display: block;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }

        .modal-confirm .modal-body {
            color: #999;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }

        .modal-confirm .modal-footer a {
            color: #999;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }

        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .icon-box {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }

        .modal-confirm .btn-info {
            background: #c1c1c1;
        }

        .modal-confirm .btn-info:hover,
        .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
</head>

<body>




    <?php include('layout-files/navigation-menu.php');
    teacher();
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
                    <p class="text-white link-nav">Manage Routine</p>
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
        <div class="row mt-5">
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
    <div id="mymodal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <!-- <i class="material-icons">&#xE876;</i> -->
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                    </div>
                    <h4 class="modal-title">Request!</h4>
                </div>
                <div class="modal-body">
                    <!-- <p class="text-center">Your booking has been confirmed. Check your email for detials.</p> -->
                </div>
                <div class="modal-footer mx-auto">
                    <!-- <button class="btn btn-success btn-block" data-dismiss="modal">OK</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>

    <script>
        function generate_availability_dropbox_for_teacher() {
            $.ajax({
                type: "post",
                url: "routine/teacher-manage-routine-data-manipulation.php",
                data: {
                    action: 'generate_availability_dropbox_for_teacher'

                },
                dataType: "json",
                success: function(response) {

                    // console.log(response)
                    $.each(response.data, function(index, obj) {
                        var id = obj.row + "" + obj.subrow + "" + obj.col;
                        var selectboxbody = `<div class="form-group mt-2" ><input type="hidden" value='${obj.routine_id}' name="" id='${id}i'>
                                            <select class="form-control" name="" onchange="UpdateAvailabiity('${id}')" id='${id}s'>
                                                <option value='dummy'>Status</option>
                                                <option value='1'>Active</option>
                                                <option value='0'>Postponed</option>
                                              
                                            </select>
                                        </div>`

                        $('#' + id + "divforstatusdropbox").html(selectboxbody)
                    });

                }
            });

        }

        function loadExtraClass() {


            $.ajax({
                type: "post",
                url: "routine/teacher-manage-routine-data-manipulation.php",
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

        function generate_dropbox_for_extraclass() {
            $.ajax({
                type: "post",
                url: "routine/teacher-manage-routine-data-manipulation.php",
                data: {
                    action: 'generate_dropbox_for_extraclass'
                },
                dataType: "json",
                success: function(response) {

                    // console.log(response)
                    $.each(response.data, function(index, obj) {
                        var id = obj.row + "" + obj.subrow + "" + obj.col;
                        console.log('object :>> ', response.dropbox);
                        console.log('object :>> ', id);
                        var selectboxbody = `<div class="form-group mt-2" ><input type="hidden" value='${obj.routine_id}' name="" id='${id}exi'>
                                            <select class="form-control" name="" onchange="AddExtraClass('${id}')" id='${id}exs'>
                                                ${response.dropbox}  
                                            </select>
                                        </div>`

                        $('#' + id + "divforextraslotdropbox").html(selectboxbody)
                    });

                }
            });
        }

        function delete_extra_class(id) {
            var extra_class_id = $('#' + id + "ei").val();
            // console.log(id)
            $.ajax({
                type: "post",
                url: "routine/teacher-manage-routine-data-manipulation.php",
                data: {
                    action: 'delete_extra_class',
                    extra_class_id: extra_class_id
                },
                dataType: "json",
                success: function(response) {

                    if (response.error == false) {
                        location.reload()
                    }
                }
            });


        }

        function AddExtraClass(id) {

            var routine_id = $('#' + id + "exi").val();
            var slot_id = $('#' + id + "exs").val();
            console.log('object :>> ', slot_id);
            if (slot_id != 'dummy') {
                console.log('object :>> ');
                $.ajax({
                    type: "post",
                    url: "routine/teacher-manage-routine-data-manipulation.php",
                    data: {
                        action: 'AddExtraClass',
                        routine_id: routine_id,
                        slot_id: slot_id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.val)
                        if (response.error == true) {
                            var html = "<p class='lead'>" + response.msg + "</p>"
                            $('#mymodal .icon-box').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
                            $('#mymodal .modal-title').html('Alert!!');
                            $('#mymodal .modal-body').html(html);
                            $('#mymodal .modal-footer').html('<button type="button" class="btn btn-primary"onclick="reload()" data-dismiss="modal">Okay</button>');
                            $('#mymodal').modal('show')
                        } else {
                            location.reload();
                        }
                    }
                });
            }

        }



        function UpdateAvailabiity(id) {
            var routine_id = $('#' + id + "i").val();
            var availability = $('#' + id + "s").val();
            console.log(routine_id)
            console.log(availability)
            if (availability != 'dummy') {
                $.ajax({
                    type: "post",
                    url: "routine/teacher-manage-routine-data-manipulation.php",
                    data: {
                        action: 'change-schedule-status',
                        routine_id: routine_id,
                        availability: availability
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log('object :>> ', response);
                        if (response.error == false) {
                            location.reload();
                        }
                    }
                });

            }


        }



        function fetch_assigned_slot_for_all() {
            $.ajax({
                type: "post",
                url: "routine/teacher-manage-routine-data-manipulation.php",
                data: {
                    action: 'fetch_assigned_slot_for_all'
                },
                dataType: "json",
                success: function(response) {

                    // console.log(response)
                    $.each(response.data, function(index, obj) {
                        var id = obj.row + "" + obj.subrow + "" + obj.col;
                        if (obj.status == 1) {
                            if (obj.teacher_id == <?php echo $_SESSION['user_id']  ?>) {
                                $('#' + id + 'parentdiv').addClass('borderClass');
                            }
                            $('#' + id + "divforslot").html('<div class="bg-success  text-white "  aria-expanded="false"  onclick="toggle(' + id + ')"><p class="p-0 m-0">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-check-circle text-white" aria-hidden="true"></i>');



                        } else {
                            $('#' + id + "divforslot").html('<div class="bg-danger  text-white "  aria-expanded="false"  onclick="toggle(' + id + ')"><p class="p-0 m-0">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-times-circle  text-white" aria-hidden="true"></i>');

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
            fetch_assigned_slot_for_all()
            generate_availability_dropbox_for_teacher();
            generate_dropbox_for_extraclass();
            loadExtraClass();
        });
    </script>


</body>

</html>