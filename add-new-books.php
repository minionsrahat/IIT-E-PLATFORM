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


<?php 
if(isset($_POST['submit'])){
    $bk_name=$_POST['bk_name'];
    $author_name=$_POST['author_name'];
    $cat_name=$_POST['cat_name'];
    $copies=$_POST['copies'];
    $columns=array('bk_id', 'isbn_number', 'bk_name', 'bk_catagory', 'bk_author_name', 'copies', 'p_copies');
    $values=array(null,'',$bk_name,$cat_name,$author_name,$copies,$copies);
    PushData($con,'books_catalog',$columns,$values);
    if(!$con->error){
        header('Location:staff-view-books-catalog.php');
    }
     
    // echo $author_name;
}

?>



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
                        Add New Book
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start content Area -->
    <div class="container-fluid m-3">
        <h3 class="text-center">
            Add New Books Information
        </h3>
        <hr>
        <div class="row mt-5">
            <div class="col-8 mx-auto shadow p-4">
                <form action="add-new-books.php" method="post">
                    <div class="form-group">
                        <label for="">Book Name <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="bk_name" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Author Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="author_name" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Catagories</label>
                        <?php
                        $result = PullData($con, 'catagories', '*', '', '');
                        ?>
                        <select class="form-control" name="cat_name" id="">

                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name'] ?></option>
                            <?php
                            }
                            ?>


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No. of Copies<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" required name="copies" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="text-center">
                    <button type="submit"name="submit" class="btn btn-success">Submit</button>
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





</body>

</html>