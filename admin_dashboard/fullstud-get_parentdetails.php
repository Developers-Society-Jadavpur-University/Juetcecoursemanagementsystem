<?php
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();
	// Add this dynamically .
	session_start();
	$roll_no_student = $_SESSION['roll_no'];
	//$course_code = 'BETC1923';

	include '../includes/dbh.inc.php';
	
	$rs = mysqli_query($conn,"SELECT COUNT(*) FROM parentDetails");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	//$rs = mysqli_query($conn,"SELECT roll_no,Full_name,phoneno,email FROM student_userdata WHERE roll_no='$roll_no' LIMIT $offset,$rows");
	$rs = mysqli_query($conn,"SELECT * FROM parentDetails WHERE rno='$roll_no_student' LIMIT $offset,$rows");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

    echo json_encode($result);
    
?>