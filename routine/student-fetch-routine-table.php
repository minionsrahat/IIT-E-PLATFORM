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

    if (($_POST['action'] == 'fetch_assigned_slot_for_all')) {
        $output = array('data' => array());
        $sql = "SELECT routine.*,assign_course_routine.course_code as course_code ,batch.batch_name as batch_name,batch.id as batch_id, teacher_info.shortform as shortform,teacher_info.id as teacher_id,courses.course_name as course_name FROM routine,assign_course_routine,batch,teacher_info,courses WHERE routine.slot_id=assign_course_routine.id and assign_course_routine.batch_id=batch.id and teacher_info.id=assign_course_routine.teacher_id and assign_course_routine.course_code=courses.course_code";
        $result = $con->query($sql);
        $x = 1;
        while ($row = mysqli_fetch_array($result)) {
            $output['data'][] = array(
                'index' => $x,
                'val' => $row['id'],
                'row' => $row['row'],
                'subrow' => $row['subrow'],
                'col' => $row['col'],
                'cc' => $row['course_code'],
                'tn' => $row['shortform'],
                'teacher_id' => $row['teacher_id'],
                'status' => $row['status'],
                'course_name' => $row['course_name'],
                'batch_id'=>$row['batch_id'],
                'batch_name' => $row['batch_name']
                //I'm not sure how to include this
            );
            $x++;
        }
        echo json_encode($output);
    } elseif (($_POST['action'] == 'LoadExtraClass')) {
        $output = array('data' => array());
        $sql = "SELECT routine.*,assign_course_routine.course_code as course_code,courses.course_name as course_name, extra_class.id as extra_class_id,teacher_info.shortform as shortform,teacher_info.id as teacher_id, batch.batch_name as batch_name,
        batch.id as batch_id FROM `extra_class` ,courses,assign_course_routine,teacher_info,batch,routine WHERE extra_class.slot_id=assign_course_routine.id AND
                assign_course_routine.course_code=courses.course_code AND assign_course_routine.teacher_id=teacher_info.id and assign_course_routine.batch_id=batch.id and routine.id=extra_class.routine_id";
        $result = $con->query($sql);

        while ($row = mysqli_fetch_array($result)) {

            $div = '<div class="bg-primary text-white my-1"><p class="p-0 m-0">' . $row['course_code'] . ' ' . $row['shortform'] . ' ' . '<i class="fa fa-check-circle text-white" aria-hidden="true"></i></p></div>';
            $x = 1;
            $output['data'][] = array(
                'index' => $x,
                'extra_class_id' => $row['extra_class_id'],
                'row' => $row['row'],
                'subrow' => $row['subrow'],
                'col' => $row['col'],
                'batch_id' => $row['batch_id'],
                'div' => $div
                //I'm not sure how to include this
            );
            $x++;
        }

        echo json_encode($output);
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
function already_exists_in_the_slot($con, $slot_id, $row, $subrow, $col)
{
    $condition = array(
        'slot_id' => $slot_id,
        'row' => $row,
        'col' => $col,
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

