<?php
session_start();
include_once("../php-database-manipulation-files/db-connection.php");
include_once('../php-database-manipulation-files/php_query_functions.php');
?>

<?php
function get_total_records($connect, $table_name)
{
    $query = "SELECT * FROM $table_name";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'get_table_data') {
        $query = "
        SELECT * FROM books_catalog ";
        if (isset($_POST["search"]["value"])) {
            $query .= 'WHERE bk_name LIKE "%' . $_POST["search"]["value"] . '%" 
            OR bk_catagory LIKE "%' . $_POST["search"]["value"] . '%" 
            OR bk_author_name LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
        if (isset($_POST["order"])) {
            $query .= ' ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $query .= ' ORDER BY bk_id DESC ';
        }
        if ($_POST["length"] != -1) {
            $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach ($result as $row) {
            $sub_array = array();
            $sub_array[] = $row['bk_name'];
            $sub_array[] = $row["bk_author_name"];
            $sub_array[] = $row["bk_catagory"];
            $sub_array[] = $row["copies"];
            $sub_array[] = $row["p_copies"];
            $sub_array[] = ($row['p_copies'] == 0) ? "OFS" : "Available";
            $sub_array[] = '<button type="button" class="btn text-primary ml-2" onclick="edit_func(' . $row["bk_id"] . ')" id="' . $row["bk_id"] . '"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn text-danger" onclick="delete_func(' . $row["bk_id"] . ')"  id="' . $row["bk_id"] . '" ><i class="fa fa-trash" aria-hidden="true"></i>
         </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_records($connect, 'books_catalog'),
            "data"    => $data
        );
        echo json_encode($output);
    }
    if ($_POST['action'] == 'get_table_data_user') {
        $query = "
        SELECT * FROM books_catalog ";
        if (isset($_POST["search"]["value"])) {
            $query .= 'WHERE bk_name LIKE "%' . $_POST["search"]["value"] . '%" 
            OR bk_catagory LIKE "%' . $_POST["search"]["value"] . '%" 
            OR bk_author_name LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
        if (isset($_POST["order"])) {
            $query .= ' ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $query .= ' ORDER BY bk_id DESC ';
        }
        if ($_POST["length"] != -1) {
            $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach ($result as $row) {
            $sub_array = array();
            $sub_array[] = $row['bk_name'];
            $sub_array[] = $row["bk_author_name"];
            
            $sub_array[] = $row["bk_catagory"];
            $sub_array[] = $row["copies"];
            $sub_array[] = $row["p_copies"];
            $sub_array[] = ($row['p_copies'] == 0) ? "OFS" : "Available";
            $sub_array[] = '<button type="button" class="btn text-primary" onclick="issue_book(' . $row["bk_id"] . ')" id="' . $row["bk_id"] . '"><i class="fa fa-book mr-2" aria-hidden="true"></i>Issue Book</button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_records($connect, 'books_catalog'),
            "data"    => $data
        );
        echo json_encode($output);
    }

    if ($_POST['action'] == 'get_request_data') {

        $query = "SELECT * FROM `requests`";
        $result = $con->query($query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['user_type'] == 1) {
                    $user_type = '<span class="text-primary">Student</span>';
                }
                if ($row['user_type'] == 2) {
                    $user_type = '<span class="text-success">Teacher</span>';
                }
                if ($row['user_type'] == 3) {
                    $user_type = '<span class="text-warning">Staff</span>';
                }

?>
                <tr>

                    <td><?php echo $row['bk_name']; ?></td>
                    <td><?php echo $row['request_by']; ?></td>
                    <td><?php echo  date("Y.m.d", strtotime($row['date'])); ?></td>
                    <td><?php echo $user_type ?></td>
                    <td><button class=" btn btn-success mr-2" onclick="issue(<?php echo $row['reques_id'] ?>)">Issue</button><button class=" btn btn-danger" onclick="cancel(<?php echo $row['reques_id'] ?>)">Cancel</button></td>
                </tr>





            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4" class="text-center"> There is No request</td>
            </tr>
        <?php

        }
    }
    if ($_POST['action'] == 'get_issued_books_data') {
        if (!(isset($_POST['pageNumber']))) {
            $pageNumber = 1;
        } else {
            $pageNumber = $_POST['pageNumber'];
        }
        $perPageCount = 10;

        $sql = "SELECT * FROM `issued_books`  WHERE 1";

        if ($result = mysqli_query($con, $sql)) {
            $rowCount = mysqli_num_rows($result);
            mysqli_free_result($result);
        }

        $pagesCount = ceil($rowCount / $perPageCount);

        $lowerLimit = ($pageNumber - 1) * $perPageCount;

        $sqlQuery = " SELECT * FROM `issued_books` WHERE 1 limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
        $results = mysqli_query($con, $sqlQuery);

        ?>

        <table class="table table-hover table-bordered table-responsive">

            <thead class="thead-inverse">
                <tr>
                    <th>Book Name</th>
                    <th>Issued To</th>
                    <th>Issued Date</th>
                    <th>Return Date</th>
                    <th>User Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $data) { 
                    
                    $status=($data['status'] == 'Issued' ? '<span class="bg-success p-2 text-white">Issued</span>' :( $data['status'] == 'Delayed'? ' <span class="bg-danger text-white p-2">Delayed</span>' :' <span class="bg-primary text-white p-2">On Time</span>'));
                    ?>
                    <tr>
                        <td>
                            <?php echo $data['bk_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['issued_to'] ?>
                        </td>
                        <td>
                            <?php echo $data['issue_date'] ?>
                        </td>
                        <td>
                            <?php echo $data['return_date'] ?>
                        </td>
                        <td>
                            <?php echo $data['u_type'] ?>
                        </td>
                        <td>
                            <?php echo $status?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>

       
        <div style="height: 30px;"></div>
        <table width="50%" align="center">
            <tr>

                <td valign="top" align="left"></td>


                <td valign="top" align="center">
                    <?php
                    for ($i = 1; $i <= $pagesCount; $i++) {
                        if ($i == $pageNumber) {
                    ?> <a href="javascript:void(0);" class="current">
                                <?php echo $i ?>
                            </a> <?php
                                } else {
                                    ?> <a href="javascript:void(0);" class="pages" onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');">
                                <?php echo $i ?>
                            </a> <?php
                                } // endIf
                            } // endFor

                                    ?>
                </td>
                <td align="right" valign="top">Page <?php echo $pageNumber; ?>
                    of <?php echo $pagesCount; ?>
                </td>
            </tr>
        </table>

    <?php
    }


    ?>

<?php
}
?>