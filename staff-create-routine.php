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
        }

        /* And this to your table's `td` elements. */
        #routine td {
            padding: 5px;
            /* margin: 0; */
        }

        .hide_block {
            display: none !important;
        }

        .display_block {
            display: block !important;
        }

        .form-control {
            width: 180px !important;
            margin: auto;
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
    staff();
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
                    <p class="text-white link-nav">Create Routine <a href="student-view-routine.php"><span class="lnr lnr-arrow-right"> View Routine</span></a> </p>
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
  
    <div class="mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
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
                                        <td id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'c'; ?>>
                                            <div id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'divforslot'; ?>>
                                            </div>
                                            <div class="p-0" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'divforextraslot'; ?>>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" value='0' name="" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'hiddeninput'; ?>>
                                                <select class="form-control" name="" onchange="AddSlot('<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j; ?>')" id=<?php echo ceil(($i + 1) / 3) . '' . ($r) . '' . $j . 'selectbox'; ?>>
                                                    <option></option>
                                                    <option></option>
                                                    <option></option>
                                                </select>
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
        function populate_dropbox() {
            $.ajax({
                type: "post",
                url: "routine/Admin-Create-Routine-Data-Manipulation.php",
                data: {
                    action: 'generate_dropbox'

                },
                success: function(response) {
                    for (let i = 1; i <= 5; i++) {
                        for (let j = 1; j <= 3; j++) {
                            for (let k = 2; k <= 7; k++) {
                                var str = i + "" + j + "" + k;
                                $("#" + str + "selectbox").html(response);
                            }
                        }
                    }
                }
            });
        }

        function delete_cell(id) {
            val = $('#' + id + "hiddeninput").val();
            console.log(id)
            $.ajax({
                type: "post",
                url: "routine/Admin-Create-Routine-Data-Manipulation.php",
                data: {
                    action: 'delete_slot',
                    id: val
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response)

                    $('#' + id + "hiddeninput").val('0');
                    $('#' + id + 'divforslot').html('');
                }
            });
        }

        function AddSlot(id) {
            slot_id = $('#' + id + "selectbox").val();
            val = $('#' + id + "hiddeninput").val();
            // console.log(val)
            if (slot_id != 'dummy') {
                $.ajax({
                    type: "post",
                    url: "routine/Admin-Create-Routine-Data-Manipulation.php",
                    data: {
                        action: 'add-new-slot',
                        value: id,
                        slot_id: slot_id,
                        val: val
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.val)
                        if (response.error == false) {
                            $('#' + id + "hiddeninput").val(response.val);
                            $('#' + id + 'divforslot').html('<div class="bg-primary  text-white"><p>' + response.text + ' <i class="fa fa-trash" onclick="delete_cell(' + id + ')" aria-hidden="true"></i></p></div>');
                        } else {
                            var html = "<p class='lead'>" + response.msg + "</p>"
                            $('#mymodal .icon-box').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
                            $('#mymodal .modal-title').html('Alert!!');
                            $('#mymodal .modal-body').html(html);
                            $('#mymodal .modal-footer').html('<button type="button" class="btn btn-primary"onclick="reload()" data-dismiss="modal">Okay</button>');
                            $('#mymodal').modal('show')
                        }
                    }
                });
            }
        }

        function loadExtraClass() {


            $.ajax({
                type: "post",
                url: "routine/Admin-Create-Routine-Data-Manipulation.php",
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


        function fetch_assigned_slot() {
            $.ajax({
                type: "post",
                url: "routine/Admin-Create-Routine-Data-Manipulation.php",
                data: {
                    action: 'fetch_assigned_slot'

                },
                dataType: "json",
                success: function(response) {

                    console.log(response)
                    $.each(response.data, function(index, obj) {
                        var id = obj.row + "" + obj.subrow + "" + obj.col;
                        $('#' + id + "hiddeninput").val(obj.val);
                        if (obj.status == 1) {
                            $('#' + id + "divforslot").html('<div class="bg-primary text-white"><p class="">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-trash" onclick="delete_cell(' + id + ')" aria-hidden="true"></i></p></div>');
                        } else {
                            $('#' + id + "divforslot").html('<div class="bg-danger text-white"><p class="">' + obj.cc + ' ' + obj.tn + ' <i class="fa fa-trash" onclick="delete_cell(' + id + ')" aria-hidden="true"></i></p></div>');

                        }
                    });

                }
            });
        }

        $(document).ready(function() {
            populate_dropbox();
            fetch_assigned_slot();
            loadExtraClass();
            // $('#123d').html('<div class="bg-primary  text-white"><p>CSE1103 IAE <i class="fa fa-trash" onclick="delete_cell('+id+')" aria-hidden="true"></i></p></div>');

        });
    </script>


</body>

</html>