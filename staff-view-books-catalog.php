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
                    <p class="text-white link-nav"><a href="staff-view-books-catalog.php"> Book Catalog <span class="lnr lnr-arrow-right"></span></a></p>
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
                <h3 class="text-center mb-5">Book Catalog</h3>
                 <div class="text-center">

                 <a name="" id="" class="btn btn-primary" href="add-new-books.php" role="button">Add New Books</a>
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
                        $result = PullData($con,'books_catalog', '*','','');
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['bk_name']; ?></td>
                                <td><?php echo $row["bk_author_name"] ?></td>
                                <td><?php echo $row["bk_catagory"] ?></td>
                                <td><?php echo  $row["copies"] ?></td>
                                <td><?php echo  $row["p_copies"] ?></td>
                                <td><?php echo ($row['p_copies'] == 0) ? "OFS" : "Available"; ?></td>
                                <td style='white-space: nowrap'><button type="button" onclick="edit('<?php echo $row['bk_id'] ?>')" class="btn text-primary ml-2"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn text-danger" onclick="delete_data('<?php echo $row['bk_id'] ?>')"><i class="fa fa-trash" aria-hidden="true"></i></td>
                                <!-- <td><a href="javascript:edit('<?php echo $row['bk_id'] ?>');" class="badge badge-primary p-2" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="javascript:delete('<?php echo $row['bk_id'] ?>');" class="badge badge-danger p-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Confirmation modal -->
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header mx-auto">
                    <div class="icon-box -success">
                        <i class="i-success material-icons ">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title text-center">Are you sure?</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                </div>
                <div class="modal-body">
                    <!-- <h1>Are you sure?</h1> -->
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>



    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <h4 class="modal-title">Awesome!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Book Details</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <form id="edit_form" action="" method="post">
                        <input type="hidden" value="" id='id' name="id">
                        <div class="form-group">
                            <label for="">Book Title</label>
                            <input type="text" class="form-control" name="bk_name" id="bk_name" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Author Name</label>
                            <input type="text" class="form-control" name="author_name" id="author_name" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Catagory</label>
                            <select class="form-control" name="cat" id="cat">
                                <?php
                                $result = PullData($con,'catagories','*','','' );
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Total Copies</label>
                            <input type="number" class="form-control" name="copies" id="copies" aria-describedby="helpId" placeholder="">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End ccontent Area -->



    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>
    <script>
        function edit(data) {
            id = data;
            $.ajax({
                type: "post",
                url: "library/get_table_data.php",
                data: {
                    id: id,
                    action: 'get_edit_data'
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response[0].bk_name);
                    $('#id').val(response[0].bk_id);
                    $('#bk_name').val(response[0].bk_name);
                    $('#author_name').val(response[0].author_name);
                    $('#copies').val(response[0].copies);

                    $('#cat option').filter(function() {
                        return ($(this).text() == response[0].bk_cat); //To select catagory
                    }).prop('selected', true);


                }
            });
            $('#edit_modal').modal('show');
            // console.log(data)
        }
        // function ajax_request_form_submit(id,action){

        // }

        function delete_data(data) {
            id = data;
            $('#myModal').modal('show')
            $(".modal-confirm .icon-box").css("background", "#82ce34");
            $(".modal-confirm .icon-box i").css("color", "#fff");
            $(".modal-confirm .icon-box").css("border", "none");
            $(".modal-confirm .icon-box").css("box-shadow", "0px 2px 2px rgba(0, 0, 0, 0.1)");

            $.ajax({
                type: "post",
                url: "library/get_table_data.php",
                data: {
                    id: id,
                    col_id: 'bk_id',
                    action: 'delete_table_data',
                    table: 'books_catalog'
                },
                // dataType: 'json',
                success: function(response) {
                    console.log(response)
                    alert('Delete_successfully');
                    location.reload(true);


                }
            });
            
        }
        $('#edit_form').on('submit', function(e) {

            e.preventDefault();
            var data = $('form').serializeArray();
            data.push({
                name: 'action',
                value: 'edit_data'
            });
            console.log(data)
            $.ajax({
                type: 'post',
                url: 'library/get_table_data.php',
                data: data,
                success: function(response) {
                    // console.log(response)
                    alert('Edit Successfull');
                    location.reload(true);

                }
            });

        });

        $('#insert_form').on('submit', function(e) {

            e.preventDefault();
            var data = $('form').serializeArray();
            data.push({
                name: 'action',
                value: 'insert_data'
            });
            console.log(data)
            $.ajax({
                type: 'post',
                url: 'library/get_table_data.php',
                data: data,
                success: function(response) {
                    // console.log(response)
                    // alert('Edit Successfull');
                    // location.reload(true);

                }
            });

        });




        $(document).ready(function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            /* Build the DataTable with third column using our custom sort functions */
            var dataTable = $('#books_catalog').DataTable({
                "sPaginationType": "full_numbers",
                responsive: true,
                fixedHeader: true
            });
            $('#table-filter').on('change', function() {
                $('#books_catalog').dataTable().fnFilter(this.value);
            });
        });
    </script>


</body>

</html>