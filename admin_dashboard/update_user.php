<?php

$id = intval($_REQUEST['id']);
$roll_no = htmlspecialchars($_REQUEST['roll_no']);
$Full_name = htmlspecialchars($_REQUEST['Full_name']);
$phoneno = htmlspecialchars($_REQUEST['phoneno']);
$email = htmlspecialchars($_REQUEST['email']);

include '../includes/dbh.inc.php';

$sql = "UPDATE student_userdata SET roll_no='$roll_no',Full_name='$Full_name',phoneno='$phoneno',email='$email' WHERE roll_no='$roll_no'";
mysqli_query($conn,$sql);
echo json_encode(array(
	'id' => $id,
    'roll_no' => $roll_no,
    'Full_name' => $Full_name,
	'phoneno' => $phoneno,
	'email' => $email,
	'success'=>true,
));
?>