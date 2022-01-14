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
                        Online Library
                    </h1>
                    <p class="text-white link-nav"><a href="staff-issued-books.php"> Issued Books <span class="lnr lnr-arrow-right"></span></a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->
 <?php include('layout-files/staff-library-topnavbar.php') ?>


    <div class="container-fluid m-3">
        <h2 class="text-center ">
            Issued Books
        </h2>
        <div class="row text-center mt-5">
            <div class="mx-auto table_container">

                <table id='books_issued' class="table table-bordered  table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Book Name</th>
                            <th>Issued To</th>
                            <th>User Type</th>
                            <th>Issued Date</th>
                            <th>Returned Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $condition = array(
                            'status' => '0'
                        );
                        $result = PullData($con, 'issued_books', '*', $condition, "");
                        while ($row = mysqli_fetch_array($result)) {
                            $current_date = new DateTime($row['issue_date']);
                            // $return_date = new DateTime($row['returns_date']);
                        ?>
                            <tr>

                                <td><?php echo $row['bk_name']; ?></td>
                                <td><?php echo $row["issued_to"] ?></td>
                                <td><?php echo ($row["u_type"] == 1) ? 'Teacher' : 'Student' ?></td>
                                <td><?php echo date("Y-m-d", strtotime($row['issue_date'])); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($row['return_date'])); ?></td>
                                <td><?php echo (strtotime(date('Y-m-d')) > strtotime($row['return_date'])) ? '<span class="badge badge-danger mt-1 p-2">Delayed</span>' : '<span class="badge mt-1 badge-success p-2">Issued</span>' ?></td>
                                <td>
                                    <button type="button" class="btn" onclick="return_book('<?php echo $row['issued_id']; ?>','<?php echo $row['issued_to'] ?>')"><span class="badge badge-primary p-2"><i class="fa fa-retweet mr-1" aria-hidden="true"></i>Return</span></button>
                                    <button type="button" class="btn" onclick="reissue_book('<?php echo $row['issued_id']; ?>','<?php echo $row['issued_to'] ?>')"><span class=" ml-1 badge badge-primary p-2"><i class="fa fa-retweet mr-1" aria-hidden="true"></i>Reissue</span></button>
                                </td>

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




    <!-- End ccontent Area -->



    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>

    <script>
        function send_return_book_request(data) {
            var issue_id = data;
            hideModal('mymodal')
            $.ajax({
                type: "post",
                url: "library/request_data_man.php",
                data: {
                    id: issue_id,
                    action: 'return_book_request'
                },
                dataType: 'json',
                success: function(response) {

                    console.log(response.msg)
                    if (response.error == false) {
                        console.log(response)
                        showModal('mymodal')
                        $('#mymodal .icon-box').html('<i class="fa fa-check" aria-hidden="true"></i>');
                        $('#mymodal .modal-title').html('Success');
                        $('#mymodal .modal-body').html(response.msg);
                        $('#mymodal .modal-footer').html('<button type="button" class="btn btn-primary"onclick="reload()" data-dismiss="modal">Okay</button>');
                        // $("#mymodal .icon-box").css("background", "#82ce34");
                        // $("#mymodal .icon-box i").css("color", "#fff");
                        // $("#mymodal .icon-box").css("border", "none");
                    }
                }
            });
        }
        function send_reissue_book_request(data) {
            var issue_id = data;
            hideModal('mymodal')
            $.ajax({
                type: "post",
                url: "library/request_data_man.php",
                data: {
                    id: issue_id,
                    action: 'reissue_book_request'
                },
                dataType: 'json',
                success: function(response) {

                    console.log(response.msg)
                    if (response.error == false) {
                        console.log(response)
                        showModal('mymodal')
                        $('#mymodal .icon-box').html('<i class="fa fa-check" aria-hidden="true"></i>');
                        $('#mymodal .modal-title').html('Success');
                        $('#mymodal .modal-body').html(response.msg);
                        $('#mymodal .modal-footer').html('<button type="button" class="btn btn-primary"onclick="reload()" data-dismiss="modal">Okay</button>');
                        // $("#mymodal .icon-box").css("background", "#82ce34");
                        // $("#mymodal .icon-box i").css("color", "#fff");
                        // $("#mymodal .icon-box").css("border", "none");
                    }
                }
            });
        }

        function reissue_book(data, name) {

            var value = data;
            var html = "<p class='lead'>You are extending the returning date of this for another 15 days to " + name + " </p>"
            var footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" onclick="send_reissue_book_request(' + value + ')" >YES</button>'
            showModal('mymodal')
            $('#mymodal .icon-box').html('<i class="fa fa-retweet mr-1" aria-hidden="true"></i>');
            $('#mymodal .modal-title').html('Return');
            $('#mymodal .modal-body').html(html);
            $('#mymodal .modal-footer').html(footer);

        }

        function return_book(data, name) {

            var value = data;
            var html = "<p class='lead'>Be sure You are collecting Hard Copy of this Book " + name + " </p>"
            var footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" onclick="send_return_book_request(' + value + ')" >YES</button>'
            showModal('mymodal')
            $('#mymodal .icon-box').html('<i class="fa fa-retweet mr-1" aria-hidden="true"></i>');
            $('#mymodal .modal-title').html('Return');
            $('#mymodal .modal-body').html(html);
            $('#mymodal .modal-footer').html(footer);

        }
        var hideInProgress = false;
        var showModalId = '';

        function showModal(elementId) {
            if (hideInProgress) {
                showModalId = elementId;
            } else {
                $("#" + elementId).modal("show");
            }
        };

        function hideModal(elementId) {
            hideInProgress = true;
            $("#" + elementId).on('hidden.bs.modal', hideCompleted);
            $("#" + elementId).modal("hide");

            function hideCompleted() {
                hideInProgress = false;
                if (showModalId) {
                    showModal(showModalId);
                }
                showModalId = '';
                $("#" + elementId).off('hidden.bs.modal');
            }
        };


        function reload() {
            location.reload(true);
        }
        $(document).ready(function() {
            // populate();

            var dataTable = $('#books_issued').DataTable({
                "sPaginationType": "full_numbers",
                responsive: true,
                fixedHeader: true
            });

        });
    </script>

</body>

</html>