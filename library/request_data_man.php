<?php
session_start();
include_once("../php-database-manipulation-files/db-connection.php");
include_once('../php-database-manipulation-files/php_query_functions.php');
?>
<?php
if (isset($_POST['action'])) {
    $response = array(
        'error' => false,
        'msg' => 'Everything A-OK',
    );
    if ($_POST['action'] == 'approve_issue_request') {
        $time = 15;
        $date = strtotime(date('Y-m-d'));
        $return_date = date('Y-m-d', strtotime('+' . $time . ' days', $date));
        $req_id = $_POST['id'];
        $condition = array(
            'reques_id' => $req_id
        );
        $result = PullData($con, 'book_requests', "*", '$condition', '');
        $row = mysqli_fetch_array($result);
        $bk_name = $row['bk_name'];
        $bk_id = $row['bk_id'];
        $issued_to = $row['request_by'];
        $issue_date = date('Y-m-d');
        $user_type = '' . $row['user_type'];
        $columns = array(
            'issued_id', 'bk_id', 'bk_name', 'issued_to', 'issue_date', 'return_date', 'u_type', 'status'
        );
        $values = array(NULL, $bk_id, $bk_name, $issued_to, $issue_date, $return_date, $user_type, '0');
        // $query2="INSERT INTO `issued_books`(`issued_id`, `bk_id`, `bk_name`, `issued_to`, `issue_date`, `return_date`, `u_type`, `status`) VALUES (NULL,'$bk_id','$bk_name','$issued_to','$issue_date','$return_date','$user_type','Issued')";
        // $result2=$con->query($query2);
        PushData($con, 'issued_books', $columns, $values);
        delete_cell($con, 'book_requests', $condition, '');
        $query = "UPDATE books_catalog SET p_copies = p_copies - 1 WHERE bk_id ='$bk_id'";
        $con->query($query);
        $con->error;
        $response['msg'] = "You Successfully Approve this Request";
        echo json_encode($response);
        // echo $con->error;
        // echo date('Y-m-d');
    } 
    elseif($_POST['action']=='issue_to_request'){
        $bk_id=$_POST['bk_id'];
        $username=$_POST['username'];
        $user_type=$_POST['usertype'];
        $condition = array(
            'bk_id' => $bk_id
        );
        $result = PullData($con, 'books_catalog', "bk_name", $condition, '');
        $row = mysqli_fetch_array($result);
        $bk_name = $row['bk_name'];
        $time = 15;
        $date = strtotime(date('Y-m-d'));
        $return_date = date('Y-m-d', strtotime('+' . $time . ' days', $date));
        $issue_date = date('Y-m-d');
        $columns = array(
            'issued_id', 'bk_id', 'bk_name', 'issued_to', 'issue_date', 'return_date', 'u_type', 'status'
        );
        $values = array(NULL, $bk_id, $bk_name, $username, $issue_date, $return_date, $user_type, '0');
        // $query2="INSERT INTO `issued_books`(`issued_id`, `bk_id`, `bk_name`, `issued_to`, `issue_date`, `return_date`, `u_type`, `status`) VALUES (NULL,'$bk_id','$bk_name','$issued_to','$issue_date','$return_date','$user_type','Issued')";
        // $result2=$con->query($query2);
        PushData($con, 'issued_books', $columns, $values);

        $response['msg'] ="Success Fully Issued This Book To ".$username;
        echo json_encode($response);
    }
    
    
    else if ($_POST['action'] == 'return_book_request') {
        $condition = array(
            'issued_id' => $_POST['id']
        );
        $issue_id = $_POST['id'];
        $returned_date = (date('Y-m-d'));
        $result = PullData($con, 'issued_books', '*', $condition, '');
        $row = mysqli_fetch_array($result);
        $bk_id = $row['bk_id'];
        $columns = array(
            'return_id', 'issue_id', 'return_date', 'status'
        );
        $status = ((strtotime(date('Y-m-d'))) < strtotime($row['return_date'])) ? 'On Time' : 'Delayed';
        $values = array(
            Null, $issue_id, $returned_date, $status
        );
        PushData($con, 'return_books', $columns, $values);
        //  delete_cell($con,'issued_books',$condition,'');
        $columns = array('status');
        $values = array(
            'status' => '1'
        );
        update_table($con, 'issued_books', $columns, $values, $condition, '');
        $query = "UPDATE books_catalog  SET p_copies = p_copies + 1 WHERE bk_id ='$bk_id'";
        $con->query($query);
        echo $con->error;
        $response['msg'] = "You Successfully Recive the Hard Copy Of this Book";
        echo json_encode($response);
    } else if ($_POST['action'] == 'send_issue_request') {
        // $date=date('Y-m-d'); 
        $bk_id = $_POST['bk_id'];
        if(isset($_SESSION['teacher_login']) && $_SESSION['teacher_login']){
            $user_type=1;
           
        }
        elseif(isset($_SESSION['student_login']) && $_SESSION['student_login']){
            $user_type=3;
        }
        $user_name = $_SESSION['username'];
        $condition1 = array(
            'bk_id' => $bk_id,
            'request_by' => $user_name 
        );
        $condition2 = array(
            'bk_id' => $bk_id,
            'issued_to' => $user_name,
            'status' => '0'
        );
        $n_rows_request = num_of_rows($con, 'book_requests', $condition1, 'and');
        $n_rows_issued = num_of_rows($con, 'issued_books', $condition2, 'and');
        // $query="SELECT * FROM `requests` where bk_id=$bk_id and request_by='$user'";
        // $get_issue_result=$con->query($query);
        // $n_rows=mysqli_num_rows($get_issue_result);
        // echo  $n_rows;
        if ($n_rows_request > 0) {
            $response['error'] = True;
            $response['msg'] = 'You Already Send Request For this Book';
        } else if ($n_rows_issued > 0) {
            $response['error'] = True;
            $response['msg'] = 'Sorry!!! You Already Issued this Book.You have to return the present copy of this books to get new one.';
        } else {
            $getbookdata = "SELECT * FROM `books_catalog` where bk_id='$bk_id'";
            $getbookresult = $con->query($getbookdata);
            $row = mysqli_fetch_array($getbookresult);
            $bk_name = $row['bk_name'];
            $columns = array('reques_id', 'bk_id', 'bk_name', 'request_by', 'user_type', 'date');
            $values = array(
                NULL,$bk_id,$bk_name,$user_name,$user_type,(date('Y-m-d'))
            );
            // $sendrequest = "INSERT INTO `requests`(`reques_id`, `bk_id`, `bk_name`, `request_by`, `user_type`, `date`) VALUES (NULL,'$bk_id','$bk_name','$user',2,current_timestamp())";
            // $r = $con->query($sendrequest);
            PushData($con,'book_requests',$columns,$values);
            echo $con->error;
            if (!$con->error) {
                $response['msg'] = 'You Successfully Send Issue Request for this Book';
            }
        }
        echo json_encode($response);
    } else if ($_POST['action'] == 'delete_issue_request') {
        $condition = array(
            'reques_id' => $_POST['id']
        );
        delete_cell($con, 'book_requests', $condition, '');
        echo $con->error;
        if ($con->error) {
            $response['error'] = true;
            $response['msg'] = 'Database Connection Error';
        } else {
            $response['msg'] = 'You Request is deleted';
        }
        echo json_encode($response);
    }
    else if ($_POST['action'] == 'reissue_book_request') {
        $condition = array(
            'issued_id' => $_POST['id']
        );
        $issue_id = $_POST['id'];
        $result = PullData($con, 'issued_books', 'return_date', $condition, '');
        $row = mysqli_fetch_array($result);
        $return_date =strtotime($row['return_date']);
        $new_return_date = date('Y-m-d', strtotime('+15 days', $return_date));
        $sql="UPDATE `issued_books` SET return_date='$new_return_date' WHERE issued_id='$issue_id'";
        $result=$con->query($sql);
        echo $con->error;
        if ($con->error) {
            $response['error'] = true;
            $response['msg'] = 'Database Connection Error';
        } else {
            $response['msg'] = 'Reissue Successfully Done';
        }
        echo json_encode($response);
    }
}

?>