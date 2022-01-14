<?php 
session_start();
include_once('php-database-manipulation-files/db-connection.php');
include_once('php-database-manipulation-files/php_query_functions.php');
function alluser()
{
    if(!isset($_SESSION['login']))
    {
        echo '
        <script>
        location.replace("index.php");
        </script>';
    }
}

function staff()
{
    if(!isset($_SESSION['staff_login']))
    {
        echo '
        <script>
        location.replace("index.php");
        </script>';
    }
}
function student()
{
    if(!isset($_SESSION['student_login']))
    {
        echo '
        <script>
        location.replace("index.php");
        </script>';
    }
}
function teacher()
{
    if(!isset($_SESSION['teacher_login']))
    {
        echo '
        <script>
        location.replace("index.php");
        </script>';
    }
}

function student_and_teacher()
{
    if(!(isset($_SESSION['teacher_login']) || isset($_SESSION['student_login'])))
    {
        echo '
        <script>
        location.replace("index.php");
        </script>';
    }
}
?>