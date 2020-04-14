<?php

  session_start();
  require "dbh.inc.php";
  $rollOld = $_SESSION['roll'];
  $stuname_db = $_SESSION['uid'];
  $stuemail_db = $_SESSION['email_stu'];
  $update_status1 = $update_status2 = $update_status3 = 1;

  if(isset($_POST['personal-submit'])){
    //$studentName = $_POST["StudentName"];
    //$rollno = $_POST["rln"];
    $studentName = $_SESSION['uid'];
    $rollno = $_SESSION['roll'];
    $dateofbirth = $_POST["dob"];
    $bloodgrp = $_POST["bloodgrp"];
    $yearjoin = $_POST["Year"];
    $yearstudy = $_POST["year"];
    $stream = $_POST["Stream"];
    $gender = $_POST["gender"];
    $category = $_POST["cat"];
    $wbjeeMaths = $_POST["marks1"];
    $wbjeePhyChem = $_POST["marks2"];
    $stuEmail = $_POST["Email"];
    $stuContact = $_POST["stuContact"];

    if ($_SESSION['state']['1'] == 0){
      $sql = "INSERT INTO personalDetails(uname,rno,dob,bloodGrp,yJoin,yStudy,Stream,Gender,Category,wbjeeMaths,wbjeePhyChem,stuEmail,stuContact) VALUES('$stuname_db','$rollOld','$dateofbirth','$bloodgrp','$yearjoin','$yearstudy','$stream','$gender','$category','$wbjeeMaths','$wbjeePhyChem','$stuemail_db','$stuContact')";
    }else{
      $sql = "UPDATE personalDetails SET uname='$stuname_db',rno='$rollOld',dob='$dateofbirth',bloodGrp='$bloodgrp',
      yJoin='$yearjoin',yStudy='$yearstudy',Stream='$stream',Gender='$gender',Category='$category',wbjeeMaths='$wbjeeMaths',wbjeePhyChem='$wbjeePhyChem',stuEmail='$stuemail_db',stuContact='$stuContact' WHERE rno=$rollOld";
    }
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Some unwanted error occurred! ";
        exit(); 
    }
    else{
      mysqli_stmt_bind_param($stmt,"ssssissssddss",$stuname_db,$rollOld,$dateofbirth,$bloodgrp,$yearjoin,$yearstudy,$stream,$gender,
      $category,$wbjeeMaths,$wbjeePhyChem,$stuemail_db,$stuContact);
      mysqli_stmt_execute($stmt);

      $sql = "UPDATE users SET update_status1='$update_status1' WHERE rno='$rollOld'";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Some unwanted error occurred! ";
        exit();
      }else{
        mysqli_stmt_bind_param($stmt,"ssi",$studentName,$rollOld,$update_status1);
        mysqli_stmt_execute($stmt);
        $_SESSION['state']['1'] = $update_status1;
        $_SESSION['uid'] = $stuname_db;
        $_SESSION['roll'] = $rollOld;
      }

      $sql = "UPDATE profileimg SET user_rno=? WHERE user_rno=$rollOld;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Some unwanted error occurred! ";
        exit();
      }else{
        mysqli_stmt_bind_param($stmt,"s",$rollOld);
        mysqli_stmt_execute($stmt);
      }

      header("Location: ../parent_details.php?formfill=success");
      exit();
    }
  }

  if(isset($_POST['parent-submit'])){
    
    $fatherName = $_POST["FatherName"];
    $motherName = $_POST["MotherName"];
    $fatherContact = $_POST["FatherContact"];
    $motherContact = $_POST["MotherContact"];
    $fatherEmail = $_POST["fEmail"];
    $motherEmail = $_POST["mEmail"];
    $fatherBloodGrp = $_POST["fBloodGrp"];
    $motherBloodGrp = $_POST["mBloodGrp"];
    $fatherOcc = $_POST["fOcc"];
    $motherOcc = $_POST["mOcc"];
    $F_or_M_offAdd = $_POST["offAddress"];
    $F_or_M_offTel = $_POST["offTel"];

    if ($_SESSION['state']['2'] == 0){
      $sql = "INSERT INTO parentDetails VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    }else{
      $sql = "UPDATE parentDetails SET uname=?,rno=?,fName=?,mName=?,fContact=?,mContact=?,
      fEmail=?,mEmail=?,fBloodGrp=?,mBloodGrp=?,fOccu=?,mOccu=?,parentOfficeAdd=?,parentOfficeTel=? WHERE rno=$rollOld";
    }
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Some unwanted error occurred! ";
        exit(); 
    }
    else{
      mysqli_stmt_bind_param($stmt,"ssssssssssssss",$_SESSION['uid'],$_SESSION['roll'],$fatherName,$motherName,$fatherContact,
      $motherContact,$fatherEmail,$motherEmail,$fatherBloodGrp,$motherBloodGrp,$fatherOcc,$motherOcc,$F_or_M_offAdd,$F_or_M_offTel);
      mysqli_stmt_execute($stmt);

     if($_SESSION['state']['2'] == 0){
        $sql = "UPDATE users SET update_status2=? WHERE rno=$rollOld;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "Some unwanted error occurred! ";
          exit();
        }else{
          mysqli_stmt_bind_param($stmt,"i",$update_status2);
          mysqli_stmt_execute($stmt);
          $_SESSION['state']['2'] = $update_status2;
        }
     }
     header("Location: ../address_details.php?formfill=success");
     exit();

    }
  }
  
  
  if(isset($_POST["address-submit"])){
    $permanentAdd = $_POST['pAdd1']." ".$_POST['pAdd2']." ".$_POST['pAdd3'];
    $correspondenceAdd = $_POST['cAdd1']." ".$_POST['cAdd2']." ".$_POST['cAdd3'];

    if($_SESSION['state']['3'] == 0){
      $sql = "INSERT INTO addressDetails VALUES(?,?,?,?)";
    }else{
      $sql = "UPDATE addressDetails SET uname=?,rno=?,permanentAdd=?,correspondenceAdd=? WHERE rno=$rollOld ";
    }
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Some unwanted error occurred! ";
        exit(); 
    }
    else{
      mysqli_stmt_bind_param($stmt,"ssss",$_SESSION['uid'],$_SESSION['roll'],$permanentAdd,$correspondenceAdd);
      mysqli_stmt_execute($stmt);

      if($_SESSION['state']['3'] == 0){
        $sql = "UPDATE users SET update_status3=? WHERE rno=$rollOld;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "Some unwanted error occurred! ";
          exit();
        }else{
          mysqli_stmt_bind_param($stmt,"i",$update_status3);
          mysqli_stmt_execute($stmt);
          $_SESSION['state']['3'] = $update_status3;
        }

      }
      header("Location: ../dashboard.php?formfill=success&profile-update=success");
    }
  }



