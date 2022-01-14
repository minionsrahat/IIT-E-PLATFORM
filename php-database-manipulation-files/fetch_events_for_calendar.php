<?php

include('db-connection.php');
include('php_query_functions.php');
if(isset($_POST['action']))
{
    if($_POST['action']='fetch_event'){
        $result=PullData($con,'event_details','*','','');
        $output = array('data' => array());
        $x = 1;
        while ($row = mysqli_fetch_array($result)) {
            $content=''.substr( $row['Event_details'],0,100);
            $content.='<br><a name="" id="" class="ml-1 btn btn-primary" href="single-event-details.php?event_id='.$row['Event_id'].'" role="button">Details</a>';
            $date = date('F j, Y', strtotime($row['Start_time']));
            $output['data'][] = array(
                'index' => $x,
                'id' => $row['Event_id'],
                'title' => $row['Event_title'],
                'content' =>$content,
                'date' =>  $date
            );
            $x++;
        }
        echo json_encode($output);

    }
}

?>

