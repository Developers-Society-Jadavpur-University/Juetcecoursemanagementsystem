<?php
session_start();


// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
//include('../config_phpfiles/config.php');


$db = mysqli_connect('localhost', 'ayan', 'AYAN@445bi', 'coursemanagementsystem');


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $mobileno = mysqli_real_escape_string($db, $_POST['mobno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($mobileno)) { array_push($errors, "Mobileno is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirmpassword) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM studusers_logindata WHERE mobile_no='$mobileno' OR email_id ='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['mobile_no'] === $mobileno) {
      array_push($errors, "Username already exists");
    }

    if ($user['email_id'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_input = md5($password);//encrypt the password before saving in the database
    $session_rollno = $_SESSION["rollno"];
    $session_fullname = $_SESSION["fullname"];  
      $query = "INSERT INTO studusers_logindata (Roll_no,Full_name, mobile_no, email_id,Password_login) 
            VALUES('$session_rollno','$session_fullname','$mobileno', '$email', '$password_input')";
      $query_1 = "INSERT INTO user_roles (UID_user,ROLE_user, FULL_NAME_user) 
      VALUES('$session_rollno','STUDENT','$session_fullname')";
      $query_2 = "UPDATE student_userdata SET reg_status='Y' WHERE roll_no=$session_rollno";      
      
    mysqli_query($db, $query);
    mysqli_query($db, $query_1);
    mysqli_query($db, $query_2);
    
    
    $_SESSION['username'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../dashboard_student.php');
  }
}
