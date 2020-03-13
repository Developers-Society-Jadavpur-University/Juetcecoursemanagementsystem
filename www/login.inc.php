<?php
    
    if(isset($_POST['login-submit'])){

        require "dbh.inc.php";

        $username = $_POST['u_name'];
        $rollno = $_POST['roll_no'];
        $password = $_POST['pwdl'];

        if(empty($username)||empty($rollno)||empty($password)){
            header("Location: http://localhost/login.php?error=emptyfields");
            exit();
        }
        else if(!filter_var($username,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z0-9]*$/",$username)){
            header("Location: http://localhost/login.php?error=invalidusername");
            exit();
        }
        else{
            $sql = "SELECT * FROM users WHERE uname=? OR email=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location : http://localhost/login.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"ss",$username,$username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password,$row['pwd']);
                    if($pwdCheck == false){
                        header("Location : http://localhost/login.php?error=wrongpassword");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['uid']=$row['uname'];
                        $_SESSION['roll']=$row['rno'];
                        header("Location : http://localhost/dashboard.php?login=successful");
                    }
                }
                else{
                    header("Location : http://localhost/login.php?error=nouser");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }