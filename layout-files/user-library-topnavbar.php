<div class="container-fluid my-3">
        <div class="row">

        <div class="col-md-3 p-3">
                <a href="user-view-library.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Books</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-6">
                                    <h1 class="card-title"><?php echo num_of_rows($con,'books_catalog','','') ?></h1>
                                    <p class="card-text">Total Books</p>
                                </div>
                                <div class="col-6 text-center my-auto">
                                    <i class="fa fa-5x fa-book" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            <span>View All</span><i class="ml-3 fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 p-3">
                <a href="user_issued_books.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Issued Books</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title"> <?php
                                    $condition=array(
                                        'issued_to'=>$_SESSION['username'],
                                        'status'=>0
                                    );
                                    echo num_of_rows($con,'issued_books',$condition,'and') ?></h1>
                                    <p class="card-text">Total Issued Books By You</p>
                                </div>
                                <div class="col-5 text-center my-auto">
                                    <i class="fa fa-4x fa-book" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            <span>View All</span><i class="ml-3 fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="user_returned_books.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Returned Books</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title"><?php
                                    $username=$_SESSION['username'];
                                    $sql="SELECT * FROM return_books,issued_books WHERE issued_books.issued_id=return_books.issue_id and issued_books.issued_to='$username'";
                                    $result=$con->query($sql);
                                    echo mysqli_num_rows($result);
                                    ?></h1>
                                    <p class="card-text">Total Returned Books By You</p>
                                </div>
                                <div class="col-5 text-center my-auto">
                                    <i class="fa fa-4x fa-book" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            <span>View All</span><i class="ml-3 fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 p-3">
                <a href="user_request_books.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>My Requests</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title"> <?php
                                    $condition=array(
                                        'request_by'=>$_SESSION['username']
                                    );
                                    echo num_of_rows($con,'book_requests',$condition,'') ?></h1>
                                    <p class="card-text">Total Requests Sent By You</p>
                                </div>
                                <div class="col-5 text-center my-auto">
                                    <i class="fa fa-4x fa-book" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            <span>View All</span><i class="ml-3 fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>