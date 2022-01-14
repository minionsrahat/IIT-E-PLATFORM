<?php
include('layout-files/import_files.php');

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $conditon=array('Event_id'=>  $event_id);
    delete_cell($con,'event_details',$conditon,'');
    header('Location:event-list.php');
}
if (isset($_GET['notice_id'])) {
    $notice_id = $_GET['notice_id'];
    $conditon=array('id'=> $notice_id);
    delete_cell($con,'notices',$conditon,'');
    header('Location:notice-list.php');
    
}
?>