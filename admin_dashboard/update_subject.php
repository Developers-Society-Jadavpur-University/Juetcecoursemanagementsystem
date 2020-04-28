<?php

$id = intval($_REQUEST['id']);
$sub_code = htmlspecialchars($_REQUEST['sub_code']);
$sub_name = htmlspecialchars($_REQUEST['sub_name']);
$year = htmlspecialchars($_REQUEST['year']);
$sem = htmlspecialchars($_REQUEST['sem']);
$paper_type = htmlspecialchars($_REQUEST['paper_type']);
$sub_type = htmlspecialchars($_REQUEST['sub_type']);
$dept = htmlspecialchars($_REQUEST['dept']);
$faculty = htmlspecialchars($_REQUEST['faculty']);
include '../includes/dbh.inc.php';

$sql = "UPDATE subject_info SET sub_code='$sub_code',sub_name='$sub_name',year='$year',sem='$sem',paper_type='$paper_type',sub_type='$sub_type',dept='$dept',faculty='$faculty',status_sub='1' WHERE sub_code='$sub_code'";
mysqli_query($conn,$sql);
echo json_encode(array(
    'id' => $id,
    'sub_code' => $sub_code,
    'sub_name' => $sub_name,
    'year' => $year,
    'sem' => $sem,
    'paper_type' => $paper_type,
    'sub_type'=>$sub_type,
    'dept'=>$dept,
    'faculty'=>$faculty,
	'success'=>true,
));
?>