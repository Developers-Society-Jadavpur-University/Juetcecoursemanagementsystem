<?php
  
  if(isset($_POST["profile-submit"])){

    require "dbhprofile.inc.php";

    $studentName = $_POST["StudentName"];
    $rollno = $_POST["rln"];
    $dateofbirth = $_POST["dob"];
    $yearjoin = $_POST["Year"];
    $yearstudy = $_POST["year"];
    $stream = $_POST["Stream"];
    $gender = $_POST["gender"];
    $fatherName = $_POST["FatherName"];
    $motherName = $_POST["MotherName"];
    $fatherContact = $_POST["FatherContact"];
    $motherContact = $_POST["MotherContact"];

    if(empty($studentName)||empty($rollno)||empty($dateofbirth)||empty($yearjoin)||empty($yearstudy)||empty($stream)||empty($gender)||empty($fatherName)||empty($motherName)||empty($fatherContact)||empty($motherContact)){
        header("Location : http://localhost/profile_update.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "INSERT INTO profiles VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location : http://localhost/profile_update.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"sisiissssii",$studentName,$rollno,$dateofbirth,$yearjoin,$yearstudy,$stream,$gender,$fatherName,$motherName,$fatherContact,$motherContact);
            mysqli_stmt_execute($stmt);
            header("Location : http://localhost/dashboard.php?submit=successful");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
