<?php

    if(isset($_POST['reset-password-submit'])) {
        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['pwd'];
        $password_repeat = $_POST['pwd-repeat'];

        if(empty($password) || empty($password_repeat)){
            header("Location: ../create-new-password.php?error=emptypasswordfield");
            exit();
        }else if($password !== $password_repeat){
            header("Location: ../create-new-password.php?error=passwordnotsame");
            exit();
        }

        $currDate = date("U");

        require "dbh.inc.php";

        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../create-new-password.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if(!$row = mysqli_fetch_assoc($result)){
                echo "You need to re-submit your reset request";
                exit();
            }else{

                $tokenBin= hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);
                if ($tokenCheck == false){
                    echo "You need to re-submit your reset request";
                    exit();
                }else if($tokenCheck == true) {

                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM users WHERE email=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../create-new-password.php?error=sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo "There was an error";
                            exit();
                        }else{
                            $sql ="UPDATE users SET pwd=? where email=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: ../create-new-password.php?error=sqlerror");
                                exit();
                            }else{
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                
                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    header("Location: ../create-new-password.php?error=sqlerror");
                                    exit();
                                }
                                else{
                                    mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                    mysqli_stmt_execute(($stmt));
                                    header("Location: ../login.php?password-update=success");
                                }
                            }
                        }
                    }
                }
            }
        }
        mysqli_close($conn);
    }
    else{
        header("Location: ../create-new-password.php");
    }