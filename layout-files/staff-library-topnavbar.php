<div class="container-fluid my-3">
        <div class="row">

            <div class="col-md-3 p-3">
                <a href="staff-view-books-catalog.php">
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


            <!-- <div class="col-md-3 p-3">
                <a href="categories.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Catagories</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title">6</h1>
                                    <p class="card-text">Total Catagories</p>
                                </div>
                                <div class="col-5 text-center my-auto">
                                    <i class="fa fa-folder-open-o fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            <span>View All</span><i class="ml-3 fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>    -->
          <div class="col-md-3 p-3">
                <a href="staff-issued-books.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Issued Books</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title">
                                        <?php
                                    $condition=array(
                                        'status'=>0
                                    );
                                    echo num_of_rows($con,'issued_books',$condition,'') ?>
                                    
                                </h1>
                                    <p class="card-text">Total Issued Books</p>
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
                <a href="staff-view-book-returned-history.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Returned Books</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title"><?php echo num_of_rows($con,'return_books','','') ?></h1>
                                    <p class="card-text">Total Returned Books</p>
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
                <a href="staff-view-book-request.php">
                    <div class="card">
                        <div class="card-header">
                            <h3>Book Requests</h3>
                        </div>
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-7">
                                    <h1 class="card-title"><?php echo num_of_rows($con,'book_requests','','') ?></h1>
                                    <p class="card-text">Total Books Request</p>
                                </div>
                                <div class="col-5 text-center my-auto">
                                    <i class="fa fa-4x fa-book" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-muted">

                            <span>View All</span> <a href="view_request.php"><i class="ml-3 fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    </a>
                </div>
           
        </div>
    </div>