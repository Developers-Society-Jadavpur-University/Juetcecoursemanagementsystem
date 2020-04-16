<?php

$id = intval($_REQUEST['id']);

include '../includes/dbh.inc.php';

$sql = "DELETE FROM student_userdata WHERE roll_no='$id'";
mysqli_query($conn,$sql);
echo json_encode(array('success'=>true));
?>