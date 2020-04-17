<?php
$roll_no = htmlspecialchars($_REQUEST['roll_no']);
$Full_name = htmlspecialchars($_REQUEST['Full_name']);
$phoneno = htmlspecialchars($_REQUEST['phoneno']);
$email = htmlspecialchars($_REQUEST['email']);
//Add this dynamically
$course_code= $_SESSION['course_code'];

include '../includes/dbh.inc.php';

    $sql = "SELECT * FROM batch_info WHERE course_code='$course_code'";
	$result= mysqli_query($conn,$sql);
	while($row = $result->fetch_assoc())
	{
		$course_name = $row["course_name"];
		$department = $row["department"];
		$faculty = $row["faculty"];
	}
	
	if($phoneno!=null && $email!=null)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
	
			$sql = "INSERT INTO student_userdata (roll_no,Full_name,phoneno,email,Course_code,reg_status,course_name,department,faculty) values('$roll_no','$Full_name','$phoneno','$email','$course_code','N','$course_name','$department','$faculty')";
			mysqli_query($conn,$sql);
			echo json_encode(array(
				
				'id' => $roll_no,
				'roll_no' => $roll_no,
				'Full_name' => $Full_name,
				'phoneno' => $phoneno,
				'email' => $email,
				'Course_code'=>$course_code,
				'success'=>true,
			));
	
	
	
	




		}
	


	
	}
	elseif($phoneno!=null)
	{
		$sql = "INSERT INTO student_userdata (roll_no,Full_name,phoneno,Course_code,reg_status,course_name,department,faculty) values('$roll_no','$Full_name','$phoneno','$course_code','N','$course_name','$department','$faculty')";
		mysqli_query($conn,$sql);
		echo json_encode(array(
			
			'id' => $roll_no,
			'roll_no' => $roll_no,
			'Full_name' => $Full_name,
			'phoneno' => $phoneno,
			'email' => $email,
			'Course_code'=>$course_code,
			'success'=>true,
		));


	}
	elseif($email!=null)
	{
		$sql = "INSERT INTO student_userdata (roll_no,Full_name,email,Course_code,reg_status,course_name,department,faculty) values('$roll_no','$Full_name','$email','$course_code','N','$course_name','$department','$faculty')";
		mysqli_query($conn,$sql);
		echo json_encode(array(
			
			'id' => $roll_no,
			'roll_no' => $roll_no,
			'Full_name' => $Full_name,
			'phoneno' => $phoneno,
			'email' => $email,
			'Course_code'=>$course_code,
			'success'=>true,
		));




	}
    else {

		$sql = "INSERT INTO student_userdata (roll_no,Full_name,Course_code,reg_status,course_name,department,faculty) values('$roll_no','$Full_name','$course_code','N','$course_name','$department','$faculty')";
		mysqli_query($conn,$sql);
		echo json_encode(array(
			
			'id' => $roll_no,
			'roll_no' => $roll_no,
			'Full_name' => $Full_name,
			
			'Course_code'=>$course_code,
			'success'=>true,
		));

		
	}



?>