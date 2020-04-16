<?php

$id = intval($_REQUEST['id']);
$course_code = htmlspecialchars($_REQUEST['course_code']);
$course_name = htmlspecialchars($_REQUEST['course_name']);
$department = htmlspecialchars($_REQUEST['department']);
$faculty = htmlspecialchars($_REQUEST['faculty']);
$start_year = htmlspecialchars($_REQUEST['start_year']);
$end_year = htmlspecialchars($_REQUEST['end_year']);

include '../includes/dbh.inc.php';

$sql = "UPDATE batch_info SET course_code='$course_code',course_name='$course_name',department='$department',faculty='$faculty',start_year='$start_year',end_year='$end_year' WHERE course_code='$course_code'";
mysqli_query($conn,$sql);
echo json_encode(array(
	'course_code' => $course_code,
    'course_name' => $course_name,
    'department' => $department,
	'faculty' => $faculty,
    'start_year' => $start_year,
    'end_year'=>$end_year,
	'success'=>true,
));
?>