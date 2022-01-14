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
                    <p class="text-white link-nav"><a href="staff-view-book-returned-history.php"> Returned Books History <span class="lnr lnr-arrow-right"></span></a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->
    <?php include('layout-files/staff-library-topnavbar.php') ?>

    <div class="container">
        <div class="row mt-4">
            <div class="col-10 mx-auto">
                <h2 class="text-center ">
                    Returned Books
                </h2>
                <div class="row text-center mt-5">
                    <div class="mx-auto">

                        <table class="table table-bordered  table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Book Name</th>
                                    <th>Issued To</th>
                                    <th>User Type</th>
                                    <th>Issued Date</th>
                                    <th>Returned At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                             
                                // $result = PullData($con, 'issued_books,return_books', $colums, $condition, '');
                                $result=get_join_table_data($con,'issued_books','return_books','issued_id','issue_id');
                                // echo $result;
                                // $con->error;
                                while ($row = mysqli_fetch_array($result)) {
                               
                                    // $return_date = new DateTime($row['returns_date']);
                                ?>
                                    <tr>
                                        <td><?php echo $row['bk_name']  ?></td>
                                        <td><?php echo $row['issued_to']  ?></td>
                                        <td><?php echo ($row["u_type"] ==1) ? 'Teacher' : 'Student' ?></td>
                                        <td><?php echo $row['issue_date']  ?></td>
                                        <td><?php echo $row['return_date']  ?></td>
                                        <td><?php echo ($row['status']=='Delayed') ? '<span class="badge badge-danger mt-1 p-2">Delayed</span>' : '<span class="badge mt-1 badge-primary p-2">On Time</span>' ?></td>


                                    </tr>
                                <?php
                                }

                                ?>

                            </tbody>
                        </table>

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

    <script>
     $(document).ready(function() {
            // populate();

            var dataTable = $('.table').DataTable({
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