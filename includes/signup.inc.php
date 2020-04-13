<?php
    if(isset($_POST["signup-submit"])){

        session_start();

        require "dbh.inc.php";

        $rollnumber = $_SESSION["show_rollno"];    
        $name = $_SESSION["Full_name"];
        $email = $_POST["e-mail"];
        $password = $_POST["pwd"];
        $repassword = $_POST["rpwd"];
        $update_status1 = $update_status2 = $update_status3 = 0;

        if(empty($email)||empty($password)||empty($repassword)){
            header("Location: ../signup.php?error=emptyfields&e-mail=".$email);
            exit();
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z]*$/",$name)){
            header("Location: ../signup.php?error=invalidname_and_email");
            exit();
        }
        /*else if(!preg_match("/^[a-z A-Z]*$/",$name)){
            header("Location: ../signup.php?error=invalidname&e-mail=".$email);
            exit();
        }*/
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidemail");
            exit();
        }
        else if($password !== $repassword){
            header("Location: ../signup.php?error=passwordcheck&e-mail=".$email);
            exit();
        }
        else{
            
            $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (uname,rno,email,pwd,update_status1,update_status2,update_status3) VALUES(?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../signup.php?error=sqlerror");
                exit(); 
            }
            else{
                $sql = "UPDATE student_userdata SET reg_status ='Y' WHERE roll_no='$rollnumber'";
                $stmt = mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                   header("Location: ../signup.php?error=sqlerror");
                   exit(); 
                }

            else{
                $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"ssssiii",$name,$rollnumber,$email,$hashedPwd,$update_status1,$update_status2,$update_status3);
                mysqli_stmt_execute($stmt);
                session_start();
                $_SESSION['uid']=$name;
                $_SESSION['roll']=$rollnumber;
                $_SESSION['state']['1']=$update_status1;
                $_SESSION['state']['2']=$update_status2;
                $_SESSION['state']['3']=$update_status3;

                $sql = "INSERT INTO profileimg(user_rno, status_name, ext) VALUES(?, ?, ?); ";
                $status = 1;
                $type = 'none';
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo "Some unwanted error occurred!";
                    exit(); 
                }else{
                    mysqli_stmt_bind_param($stmt,"sis",$rollnumber, $status, $type);
                    mysqli_stmt_execute($stmt);
                }
                header("Location: ../dashboard.php?signup=successful");

            }
                
                
                
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
    else{
        header("Location: ../signup.php");
    }