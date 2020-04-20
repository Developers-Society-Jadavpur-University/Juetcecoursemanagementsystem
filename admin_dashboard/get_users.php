<?php
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();
	// Add this dynamically .
	session_start();
	$course_code = $_SESSION['course_code'];
	//$course_code = 'BETC1923';

	include '../includes/dbh.inc.php';
	
	$rs = mysqli_query($conn,"SELECT COUNT(*) FROM student_userdata");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysqli_query($conn,"SELECT * FROM student_userdata WHERE Course_code='$course_code' LIMIT $offset,$rows");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

    echo json_encode($result);
    
    ?>