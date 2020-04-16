<?php

$id = $_POST["id"];


include '../includes/dbh.inc.php';

$sql = "UPDATE batch_info SET status_course ='0' WHERE course_code='$id'";
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