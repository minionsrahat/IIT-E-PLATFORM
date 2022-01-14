<?php
session_start();
include_once("../php-database-manipulation-files/db-connection.php");
include_once('../php-database-manipulation-files/php_query_functions.php');

?>
<?php

if (isset($_POST['action'])) {
    $response = array(
        'error' => false,
        'msg' => 'Everythink is ok',
        'text' => '',
        'val' => '0'
    );
 
    if(($_POST['action'] == 'fetch_assigned_slot_for_all'))
    {
       $output = array('data' => array());
       $sql="SELECT routine.*,assign_course_routine.course_code as course_code ,batch.batch_name as batch_name,teacher_info.shortform as shortform,teacher_info.id as teacher_id,courses.course_name as course_name FROM routine,assign_course_routine,batch,teacher_info,courses WHERE routine.slot_id=assign_course_routine.id and assign_course_routine.batch_id=batch.id and teacher_info.id=assign_course_routine.teacher_id and assign_course_routine.course_code=courses.course_code";
       $result= $con->query($sql);
       $x=1;
       while($row=mysqli_fetch_array($result))
       {
        $output['data'][] = array(
            'index'=>$x,
            'val'=>$row['id'],
            'row'=> $row['row'],
            'subrow'=>$row['subrow'],
            'col'=>$row['col'],
            'cc'=>$row['course_code'],
            'tn'=>$row['shortform'],
            'teacher_id'=>$row['teacher_id'],
            'status'=>$row['status'],
            'course_name'=>$row['course_name'],
            'batch_name'=>$row['batch_name']
           //I'm not sure how to include this
        );
        $x++;
       }
       echo json_encode($output);
    }
    elseif(($_POST['action'] == 'generate_availability_dropbox_for_teacher')&& $_SESSION['teacher_login']){
        $teacher_id=$_SESSION['user_id'];
    
        $output = array('data' => array());
           $sql="SELECT routine.* FROM routine , assign_course_routine WHERE routine.slot_id=assign_course_routine.id
           AND assign_course_routine.teacher_id=$teacher_id";
           $result= $con->query($sql);
           $x=1;
           while($row=mysqli_fetch_array($result))
           {
            $output['data'][] = array(
                'index'=>$x,
                'routine_id'=>$row['id'],
                'row'=> $row['row'],
                'subrow'=>$row['subrow'],
                'col'=>$row['col'],
               //I'm not sure how to include this
            );
            $x++;
           }
           echo json_encode($output);
    }
    elseif(($_POST['action'] == 'change-schedule-status')&& $_SESSION['teacher_login']){
        $teacher_id=$_SESSION['user_id'];
        $routine_id=$_POST['routine_id'];
        $availability=$_POST['availability'];
        $sql="UPDATE routine set status='$availability' WHERE  id='$routine_id'";
        $result=$con->query($sql);
        if(!$con->error)
        {
            echo json_encode($response);
        }
        echo $con->error;
    }
    elseif(($_POST['action'] == 'generate_dropbox_for_extraclass')&& $_SESSION['teacher_login']){
        $teacher_id=$_SESSION['user_id'];
        $query = "SELECT assign_course_routine.course_code as course_code ,teacher_info.shortform as shortform, assign_course_routine.id as id ,batch.batch_name
        FROM assign_course_routine,teacher_info,batch WHERE assign_course_routine.teacher_id='$teacher_id' and batch.id=assign_course_routine.batch_id and assign_course_routine.teacher_id=teacher_info.id";
        $result = $con->query($query);
         $dropbox='<option value="dummy">Select</option>';
        while ($row = mysqli_fetch_array($result)) {
            $dropbox.='<option value="'.$row['id'].'">'.$row['course_code'] .' '. $row['shortform'] .' '.substr($row['batch_name'],0,3).'</option>';
        }
           $output = array('data' => array(),'dropbox'=>$dropbox);
           $sql="SELECT * FROM routine WHERE STATUS=0 and routine.id NOT in (SELECT extra_class.routine_id FROM extra_class)";
           $result= $con->query($sql);
           $x=1;
           while($row=mysqli_fetch_array($result))
           {
            $output['data'][] = array(
                'index'=>$x,
                'routine_id'=>$row['id'],
                'row'=> $row['row'],
                'subrow'=>$row['subrow'],
                'col'=>$row['col'],
               //I'm not sure how to include this
            );
            $x++;
           }
           echo json_encode($output);
    }

    elseif(($_POST['action'] == 'AddExtraClass')&& $_SESSION['teacher_login']){
        $slot_id = $_POST['slot_id'];
        $routine_id=$_POST['routine_id'];
        $sql="SELECT * FROM routine WHERE  routine.slot_id=$slot_id and routine.id=$routine_id";
        $result=$con->query($sql);
        if(mysqli_num_rows($result)>0)
        {
            $response['error'] = true;
            $response['msg'] = 'Selected Schedule Already exists in the slot.';

        }
        else
        {
        $columns=array('id', 'routine_id', 'slot_id');
        $values=array(null,$routine_id,$slot_id);
        PushData($con,'extra_class',$columns,$values);
        }
        echo json_encode($response);


    }

    elseif(($_POST['action'] == 'LoadExtraClass')&& $_SESSION['teacher_login']){
        $output = array('data' => array());
        $sql="SELECT routine.*,assign_course_routine.course_code as course_code,courses.course_name as course_name, extra_class.id as extra_class_id,teacher_info.shortform as shortform,teacher_info.id as teacher_id, batch.batch_name as batch_name FROM `extra_class` ,courses,assign_course_routine,teacher_info,batch,routine WHERE extra_class.slot_id=assign_course_routine.id AND
        assign_course_routine.course_code=courses.course_code AND assign_course_routine.teacher_id=teacher_info.id and assign_course_routine.batch_id=batch.id and routine.id=extra_class.routine_id";
        $result=$con->query($sql);

        while($row=mysqli_fetch_array($result)){
            if(isset($_SESSION['user_id']) && $_SESSION['user_id']==$row['teacher_id']){
             $teacher_id=$_SESSION['user_id'];
             $id=$row['row'].''.$row['subrow'].''.$row['col'];
             $div= '<div class="bg-primary text-white my-1"><input type="hidden"id="'.$id.'ei" value="'.$row['extra_class_id'].'"><p class="p-0 m-0">'.$row['course_code'].' '.$row['shortform'].' '.'<i class="fa fa-trash" onclick="delete_extra_class(\''.$id.'\')" aria-hidden="true"></i></p></div>';
            }
            else{
                $div= '<div class="bg-primary text-white my-1"><p class="p-0 m-0">'.$row['course_code'].' '.$row['shortform'].' '.'<i class="fa fa-check-circle text-white" aria-hidden="true"></i></p></div>';

            }
            $x=1;
            $output['data'][] = array(
                'index'=>$x,
                'extra_class_id'=>$row['extra_class_id'],
                'row'=> $row['row'],
                'subrow'=>$row['subrow'],
                'col'=>$row['col'],
                'div'=>$div
               //I'm not sure how to include this
            );
            $x++;
        }

        echo json_encode($output);


    }

    else if (($_POST['action'] == 'delete_extra_class')&& $_SESSION['teacher_login']){
        $id=$_POST['extra_class_id'];
        $condition=array(
            'id'=>$id
        );
        delete_cell($con,'extra_class',$condition,'');
        if($con->error){
            $response['error'] = true;
            $response['msg'] = 'Slot Failed To Delete.';
        }
        echo json_encode($response);
    }
    
   
   
}


function exists_in_one_column($con, $slot_id, $row, $col)
{
    $condition = array(
        'slot_id' => $slot_id,
        'row' => $row,
        'col' => $col
    );
    $rows = num_of_rows($con, 'routine', $condition, 'and');
    if ($rows > 0) {
        return true;
    } else {
        return false;
    }
}
function already_exists_in_the_slot($con, $slot_id, $row, $subrow,$col)
{
    $condition = array(
        'slot_id' => $slot_id,
        'row' => $row,
        'col'=>$col,
        'subrow' => $subrow
    );
    $rows = num_of_rows($con, 'routine', $condition, 'and');
    if ($rows > 0) {
        return true;
    } else {
        return false;
    }
}
function exists_in_one_row_morethan_two($con, $slot_id, $row, $subrow)
{
    $condition = array(
        'slot_id' => $slot_id,
        'row' => $row,
        'subrow' => $subrow
    );
    $rows = num_of_rows($con, 'routine', $condition, 'and');
    if ($rows > 1) {
        return true;
    } else {
        return false;
    }
}
function update_cell_slot_id($con, $row, $subrow, $col, $slot_id)
{
    $columns = array('slot_id');
    $values = array(
        'slot_id' => $slot_id
    );
    $condition = array(
        'col' => $col,
        'row' => $row,
        'subrow' => $subrow
    );
    update_table($con, 'routine', $columns, $values, $condition, 'and');
}







?>

