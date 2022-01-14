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
    student_and_teacher();
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
                    <p class="text-white link-nav"><a href="user_request_books.php"> Books Requests <span class="lnr lnr-arrow-right"></span></a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->

 
    <?php include('layout-files/user-library-topnavbar.php') ?>
    <div class="container-fluid m-3">
        <h2 class="text-center ">
            Book Requests Sent By You
        </h2>
        <div class="row text-center mt-5">
            <div class="mx-auto table_container">

                <table id='books_issued' class="table table-bordered  ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Book Name</th>
                            <th>Request At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $condition = array(
                            'request_by' => $_SESSION['username']
                        );
                        $result = PullData($con, 'book_requests', '*', $condition, '');
                        while ($row = mysqli_fetch_array($result)) {

                            // $return_date = new DateTime($row['returns_date']);
                        ?>


                            <tr>

                                <td><?php echo $row['bk_name']; ?></td>
                                <td><?php echo date("Y-m-d", strtotime($row['date'])); ?></td>
                                <td><button type="button"onclick="cancel_book_request('<?php echo $row['reques_id'] ?>')" class="btn"><span class="badge badge-danger p-2"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancel</span></button></td>

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
        function send_delete_request(data) {
            var rq_id = data;
            hideModal('mymodal')
            $.ajax({
                type: "post",
                url: "library/request_data_man.php",
                data: {
                    id: rq_id,
                    action: 'delete_issue_request'
                },
                dataType: 'json',
                success: function(response) {
                   
                        console.log(response.msg)
                        if (response.error == false) {
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

        function cancel_book_request(data) {

            var value = data;
            var html = "<p class='lead'>Are you sure You want to delete this book request?This process cannot be undone.</p>"
            var footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" onclick="send_delete_request(' + value + ')" >YES</button>'
            showModal('mymodal')
            $('#mymodal .icon-box').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
            $('#mymodal .modal-title').html('Alert!!');
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


        function reload()
        {
            location.reload(true);
        }
        // $(document).ready(function() {
        //     // showRecords(10, 1);
        // });
        $(document).ready(function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            // populate();

            var dataTable = $('#books_issued').DataTable({
                "sPaginationType": "full_numbers",
                responsive: true,
                fixedHeader: true
                // autoFill: true
                // "aaSorting": [
                //     [0, 'asc'],
                //     [1, 'asc']
                // ]
            });

        });
    </script>


</body>

</html>