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
                    <p class="text-white link-nav"><a href=""> Returned Books <span class="lnr lnr-arrow-right"></span></a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->
   
    <?php include('layout-files/user-library-topnavbar.php') ?>
    <div class="container-fluid m-3">
        <h2 class="text-center ">
           Returned Books
        </h2>
        <div class="row text-center mt-5">
            <div class="mx-auto table_container">

                <table id='books_issued' class="table table-bordered table-responsive ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Book Name</th>
                            <th>Issued Date</th>
                            <th>Returned Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $columns=array('return_books.*','issued_books.*');
                        $condition=array(
                            'return_books.issue_id'=>'issued_books.issued_id',
                            'issued_books.issued_to'=>$_SESSION['username']
                        );
                        $username=$_SESSION['username'];
                        $sql="select return_books.return_date as rt_return_date,return_books.status as rt_status,issued_books.bk_name,issued_books.issue_date from issued_books,return_books where return_books.issue_id=issued_books.issued_id and issued_books.issued_to='$username'";
                        // $result=PullData($con,'issued_books,return_books',$columns,$condition,'and');
                        $result=$con->query($sql);
                        while ($row = mysqli_fetch_array($result)) {
                            // $current_date = new DateTime($row['issue_date']);
                            // $return_date = new DateTime($row['returns_date']);
                        ?>
                          <tr>
                                <td><?php echo $row['bk_name']; ?></td>
                                <td><?php echo date("Y-m-d", strtotime($row['issue_date'])); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($row['rt_return_date'])); ?></td>
                                <td><?php echo ($row['rt_status']=='Delayed') ? '<span class="badge badge-danger mt-1 p-2">Delayed</span>' : '<span class="badge mt-1 badge-primary p-2">On Time</span>' ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>


    </div>



    <!-- End ccontent Area -->



    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>


    <script>
        // $(document).ready(function() {
        //     // showRecords(10, 1);
        // });
        $(document).ready(function() {
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