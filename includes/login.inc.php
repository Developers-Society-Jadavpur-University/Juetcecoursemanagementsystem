<?php
    
    if(isset($_POST['login-student-submit'])){

        require "dbh.inc.php";

        $username = $_POST['u_name'];
        $rollno = $_POST['roll_no'];
        $password = $_POST['pwdl'];

        if(empty($username)||empty($rollno)||empty($password)){
            header("Location: ../login.php?error=emptyfields");
            exit();
        }
        else if(!filter_var($username,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z]*$/",$username)){
            header("Location: ../login.php?error=invalidusername");
            exit();
        }
        else{
            $sql = "SELECT * FROM users WHERE uname=? OR email=? AND rno=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../login.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"sss",$username,$username,$rollno);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password,$row['pwd']);
                    if($pwdCheck == false){
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['uid']=$row['uname'];
                        $_SESSION['roll']=$row['rno'];
                        $_SESSION['state']['1']=$row['update_status1'];
                        $_SESSION['state']['2']=$row['update_status2'];
                        $_SESSION['state']['3']=$row['update_status3'];
                        header("Location: ../dashboard.php?login=successful");
                    }
                }
                else{
                    header("Location: ../login.php?error=nouser");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../login.php");
    }