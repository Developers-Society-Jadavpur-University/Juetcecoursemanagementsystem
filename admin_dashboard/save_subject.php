<?php
$sub_code = htmlspecialchars($_REQUEST['sub_code']);
$sub_name = htmlspecialchars($_REQUEST['sub_name']);
$year = htmlspecialchars($_REQUEST['year']);
$sem = htmlspecialchars($_REQUEST['sem']);
$paper_type = htmlspecialchars($_REQUEST['paper_type']);
$sub_type = htmlspecialchars($_REQUEST['sub_type']);
$dept = htmlspecialchars($_REQUEST['dept']);
$faculty = htmlspecialchars($_REQUEST['faculty']);
//Add this dynamically


include '../includes/dbh.inc.php';

$sql = "INSERT INTO subject_info(sub_code,sub_name,year,sem,paper_type,sub_type,dept,faculty,status_sub) values('$sub_code','$sub_name','$year','$sem','$paper_type','$sub_type','$dept','$faculty','1')";
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