<?php 
include('php-database-manipulation-files/db-connection.php');
include('php-database-manipulation-files/php_query_functions.php');


if (isset($_GET['notice_id'])) {
    $id = $_GET['notice_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM notices WHERE notices.id='$id'";
    $result = mysqli_query($con, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'pdf-files/' . $file['notice_pdf'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('pdf-files/' . $file['notice_pdf']));
        readfile('pdf-files/' . $file['notice_pdf']);
  // Now update downloads count
  exit;
  header('location:view-single-notice.php?notice_id='.$id);
}

}
