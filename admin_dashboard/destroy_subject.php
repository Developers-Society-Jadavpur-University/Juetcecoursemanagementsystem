<?php

$id = $_POST["id"];


include '../includes/dbh.inc.php';

$sql = "UPDATE subject_info SET status_sub ='0' WHERE sub_code='$id'";
mysqli_query($conn,$sql);
echo json_encode(array(
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