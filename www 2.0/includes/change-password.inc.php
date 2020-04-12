<?php

    session_start();

    if(isset($_POST['change-password-submit'])){

        require "dbh.inc.php";

        $passwordOld = $_POST['pwd-old'];
        $password = $_POST['pwd'];
        $password_repeat = $_POST['pwd-repeat'];
        $roll = $_SESSION['roll'];
        
        if(empty($password) || empty($password_repeat) || empty($passwordOld)){
            header("Location: ../change-password.php?error=emptypasswordfield");
            exit();
        }else if($password !== $password_repeat){
            header("Location: ../change-password.php?error=passwordnotsame");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE rno=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "Some unwanted error occured";
                exit(); 
            }else{
                mysqli_stmt_bind_param($stmt,"s", $roll);
                mysqli_stmt_execute($stmt);
                
                $result = mysqli_stmt_get_result($stmt);
                $num = mysqli_num_rows($result);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($passwordOld, $row['pwd']);
                    if($pwdCheck == false){
                        header("Location: ../change-password.php?error=wrongoldpassword");
                        exit();
                    }else if($pwdCheck == true){
    
                        $sql = "UPDATE users SET pwd=? WHERE rno=?;";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "Some unwanted error occured";
                            exit(); 
                        }else{
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt,"ss", $hashedPassword, $roll);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../dashboard.php?passwordchange=success");
                        }
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    }
                }else{
                    echo "Some unwanted error occurred";
                    exit();
                }
            }
        }

    }else{
        header("Location: ../change-password.php");
        exit();
    }