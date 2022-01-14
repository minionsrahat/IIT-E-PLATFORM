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
                    <p class="text-white link-nav">Dashboard</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->
    <?php include('layout-files/user-library-topnavbar.php') ?>

    <div class="container my-3">
        <h2 class="text-center ">
            Books Catalog
        </h2>
        <div class="row text-center mt-2">
            <div class=" col-md-12 mx-auto">
                <div class="mt-3">
                    <div class="form-group">
                        <label class="text-center" for="">Book Category</label>
                        <select class="form-control form-control-sm" name="" id="table-filter">
                            <option value="dummy">Select</option>
                            <?php
                            $result = PullData($con, 'catagories', '*', "", "");
                            echo $con->error;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <table id="books_catalog" class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>Catagory</th>
                            <th>Copies</th>
                            <th>Present Copies</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $query = "SELECT * FROM books_catalog";
                        $result = PullData($con, 'books_catalog', '*', '', '');
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row['bk_name']; ?></td>
                                <td><?php echo $row["bk_author_name"] ?></td>
                                <td><?php echo $row["bk_catagory"] ?></td>
                                <td><?php echo  $row["copies"] ?></td>
                                <td><?php echo  $row["p_copies"] ?></td>
                                <td><?php echo ($row['p_copies'] == 0) ? "OFS" : "Available"; ?></td>
                                <td style='white-space: nowrap'><button type="button" <?php echo ($row['p_copies'] == 0) ? "disabled" : ""; ?> onclick="issue_book('<?php echo $row['bk_id'] ?>')" class="btn"><span class="badge p-2 badge-success"><i class="fa fa-book mr-1" aria-hidden="true"></i>Issue</span></button></td>

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
        function send_issue_request(data) {
            var bk_id = data;
            hideModal('mymodal')
            $.ajax({
                type: "post",
                url: "library/request_data_man.php",
                data: {
                    bk_id: bk_id,
                    action: 'send_issue_request'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.error == true) {
                        console.log(response.msg)
                        showModal('mymodal')
                        $('#mymodal .icon-box').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
                        $('#mymodal .modal-title').html('Alert!!');
                        $('#mymodal .modal-body').html(response.msg);
                        $('#mymodal .modal-footer').html('<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>');

                    } else {
                        showModal('mymodal')
                        $('#mymodal .icon-box').html('<i class="fa fa-check" aria-hidden="true"></i>');
                        $('#mymodal .modal-title').html('Success');
                        $('#mymodal .modal-body').html(response.msg);
                        $('#mymodal .modal-footer').html('<button type="button" class="btn btn-primary"onclick=" reload()" data-dismiss="modal">Okay</button>');
                    
                    }
                }
            });
        }
        function reload()
        {
            location.reload(true);
        }

        function issue_book(data) {
            var value = data;
            var html = "<p class='lead'>Are you sure You want to send issue request for this book?</p>"
            var footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary" onclick="send_issue_request(' + value + ')" >YES</button>'
            showModal('mymodal')
            $('#mymodal .icon-box').html('<i class="fa fa-plus-circle" aria-hidden="true"></i>');
            $('#mymodal .modal-title').html('Request');
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




        $(document).ready(function() {
            /* Build the DataTable with third column using our custom sort functions */
            var dataTable = $('#books_catalog').DataTable({
                "sPaginationType": "full_numbers",
                responsive: true,
                fixedHeader: true
                // autoFill: true
                // "aaSorting": [
                //     [0, 'asc'],
                //     [1, 'asc']
                // ]
            });
            // var dt=$('#books_catalog').DataTable({
            //     dom: 'lrtip'
            //     // autoFill: true
            //     // "aaSorting": [
            //     //     [0, 'asc'],
            //     //     [1, 'asc']
            //     // ]
            // });
            $('#table-filter').on('change', function() {
                // dataTable.column(0).search(value, true, false).draw();
                if (this.value === 'dummy') {
                    $('#books_catalog').dataTable().fnFilter('');
                } else {
                    $('#books_catalog').dataTable().fnFilter(this.value);
                }

                // dt.search(this.value).draw();   
            });
        });
    </script>



</body>

</html>