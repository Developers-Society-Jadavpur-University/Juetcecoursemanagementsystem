<?php
    if(isset($_POST["signup-submit"])){

        require "dbh.inc.php";

        $name = $_POST["uname"];
        $rollnumber = $_POST["rollno"];
        $email = $_POST["e-mail"];
        $password = $_POST["pwd"];
        $repassword = $_POST["rpwd"];

        if(empty($name)||empty($rollnumber)||empty($email)||empty($password)||empty($repassword)){
            header("Location: http://localhost/signup.php?error=emptyfields&uname=".$name."&rollno=".$rollnumber."&e-mail=".$email);
            exit();
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z0-9]*$/",$name)){
            header("Location: http://localhost/signup.php?error=invalidname_and_email&rollno=".$rollnumber);
            exit();
        }
        else if(!preg_match("/^[a-z A-Z0-9]*$/",$name)){
            header("Location: http://localhost/signup.php?error=invalidname&rollno=".$rollnumber."&e-mail=".$email);
            exit();
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: http://localhost/signup.php?error=invalidemail&uname=".$name."&rollno=".$rollnumber);
            exit();
        }
        else if($password != $repassword){
            header("Location: http://localhost/signup.php?error=passwordcheck&uname=".$name."&rollno=".$rollnumber."&e-mail=".$email);
            exit();
        }
        else{
            $sql = "INSERT INTO users(uname,rno,email,pwd) VALUES(?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: http://localhost/signup.php?error=sqlerror");
                exit(); 
            }
            else{
                $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"siss",$name,$rollnumber,$email,$hashedPwd);
                mysqli_stmt_execute($stmt);
                session_start();
                $_SESSION['uid']=$name;
                $_SESSION['roll']=$rollnumber;
                header("Location: http://localhost/dashboard.php?signup=successful");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }