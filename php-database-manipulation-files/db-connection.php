<?php
$username="root";
$password="";
$con=mysqli_connect('localhost',$username,$password,'spl2_iit');
if(!$con)
{
    echo" Connection failed";
}

function get_total_row_counts($table_name,$con)
{
    $query="select * from $table_name";
    $result=$con->query($query);
    $rows=mysqli_num_rows($result);
    return $rows;

}
function getdata($table_name,$con)
{
    $query="select * from $table_name";
    $result=$con->query($query);
    return $result;
}
function get_data_by_id($table_name,$colum,$id,$con)
{
    $query="select * from $table_name where $colum=$id";
    $result=$con->query($query);
    return $result;
}

function delete_data_by_id($table_name,$colum,$id,$con)
{
    $query="DELETE from $table_name where $colum=$id";
    $result=$con->query($query);
    return $result;
}





function fetch_query_result($con,$sql)
{
    $result=$con->query($sql);
    if(!$con->error){
        return $result;
    }
    else{
        return $con->error;
    }
   
}














?>
