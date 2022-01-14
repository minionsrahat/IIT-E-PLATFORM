<?php
session_start();
include_once("../php-database-manipulation-files/db-connection.php");
include_once('../php-database-manipulation-files/php_query_functions.php');

?>
<?php

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'get_edit_data') {
        $json = array();
        $condition = array(
            'bk_id' => $_POST['id']
        );
        $result = PullData($con, 'books_catalog', '*', $condition, '');
        //   $result=get_table_data_with_condition('books_catalog','bk_id',$_POST['id'],$con);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $json[] = array(
                'bk_id' => $row['bk_id'],
                'bk_name' => $row['bk_name'],
                'bk_cat' => $row['bk_catagory'],
                'author_name' => $row['bk_author_name'],
                'copies' => $row['copies']
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    } else if ($_POST['action'] == 'edit_data') {
        $id = $_POST['id'];
        $bk_name = $_POST['bk_name'];
        $author_name = $_POST['author_name'];
        $cat = $_POST['cat'];
        $copies = $_POST['copies'];
        $query = "UPDATE books_catalog SET bk_id='$id', bk_name='$bk_name', bk_catagory='$cat', bk_author_name='$author_name',copies='$copies' WHERE bk_id='$id'";
        $result = $con->query($query);
        echo $con->error;
    } else if ($_POST['action'] == 'delete_table_data') {
        $condition = array(
            $_POST['col_id'] => $_POST['id']
        );
        echo var_dump($condition);
        delete_cell($con, $_POST['table'], $condition, '');
        echo $con->error;
    }
}
