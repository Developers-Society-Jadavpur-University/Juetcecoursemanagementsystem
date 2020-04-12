<?php
    
    require "dbh.inc.php";

    $username = $_POST['user_name'];
    $rollno = $_POST['roll_number'];
    $password = $_POST['pass_word'];
    $login_message = "Successfully logged in !";
    $failed_login_message = "Invalid details, failed to login !";
    $sql_error = "Error occurred, failed to login !";
    $empty_fields = "Empty fields, failed to login !";
    $invalid_password = "Invalid password, failed to login !";

    if(empty($username)||empty($rollno)||empty($password)){
        echo $empty_fields;
        exit();
    }
    else if(!filter_var($username,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z A-Z0-9]*$/",$username)){
        echo $failed_login_message;
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE uname=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo $sql_error;
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$username,$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result) && mysqli_num_rows($result) == 1){
                $pwdCheck = password_verify($password,$row['pwd']);
                if($pwdCheck == false){
                    echo $invalid_password;
                    exit();
                }
                else if($pwdCheck == true){
                    echo $login_message;
                }
            }
            else{
                echo $failed_login_message;
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    