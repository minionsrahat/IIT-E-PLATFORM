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
                    <p class="text-white link-nav">Dashboard</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->
    <?php include('layout-files/staff-library-topnavbar.php') ?>

    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="mx-auto">
                    <div class="form-group">
                        <!-- <label for="">Book Category</label> -->
                        <select class="form-control form-control-sm" name="" id="table-filter">
                            <option value="dummy">Select</option>
                            <option value="The Artificial">The Artificial</option>
                            <option value="CSE">The Hidden</option>
                            <option value="SE">The Computer</option>
                        </select>
                    </div>
                </div>
                <table id="books_catalog" class="table table-bordered table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>Catagories</th>
                            <th>Copies</th>
                            <th>Present Copies</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM books_catalog";
                        $result = $con->query($query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row['bk_name']; ?></td>
                                <td><?php echo $row["bk_author_name"] ?></td>
                                <td><?php echo $row["bk_catagory"] ?></td>
                                <td><?php echo  $row["copies"] ?></td>
                                <td><?php echo  $row["p_copies"] ?></td>
                                <td><?php echo ($row['p_copies'] == 0) ? "OFS" : "Available"; ?></td>
                                <td><button type="button" class="btn btn-success" onclick="issue_to('<?php echo $row['bk_id']; ?>')">Issue To</button></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <div id="issuemodal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <!-- <i class="material-icons">&#xE876;</i> -->
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                    </div>
                    <h4 class="modal-title">Issue Book!</h4>
                </div>
                <div class="modal-body">    
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text"
                    class="form-control" name=""required id="issue-username" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">User Type</label>
                  <select class="form-control" name="" id="issue-usertype">
                    <option value='1'>Teacher</option>
                    <option value='3'>Student</option>
                  </select>
                </div>

                </div>
                <div class="modal-footer mx-auto">
                    <!-- <button class="btn btn-success btn-block" data-dismiss="modal">OK</button> -->
                </div>
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
                    <h4 class="modal-title">Issued!</h4>
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
        function issue_to(data) {
            // $('#issuemodal').modal('show');
            var value = data;
            var html = "<p class='lead'>Are you sure You want to issue this book for next <input type='text'id='issue_id' value='15'> Days</p>"
            var footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" onclick="issue_to_request(' + value + ')" >Okay</button>'
            $('#issuemodal').modal('show');
            // $('#issuemodal .modal-body').html(html);
            $('#issuemodal .modal-footer').html(footer);
        }

       function issue_to_request(id){
            var bk_id = id;
            var username=$('#issue-username').val();
            var usertype=$('#issue-usertype').val();
            console.log('username :>> ', username);
            hideModal('issuemodal')
            $.ajax({
                type: "post",
                url: "library/request_data_man.php",
                data: {
                    action: 'issue_to_request',
                    username:username,
                    bk_id:bk_id,
                    usertype:usertype
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
                        $('#mymodal .modal-footer').html('<button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>');
                        // $("#mymodal .icon-box").css("background", "#82ce34");
                        // $("#mymodal .icon-box i").css("color", "#fff");
                        // $("#mymodal .icon-box").css("border", "none");
                    }
                }
            });

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
            });
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