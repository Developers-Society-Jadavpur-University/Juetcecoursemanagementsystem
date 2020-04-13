<?php

if (isset($_POST['reset-request-submit'])){
    require "dbh.inc.php";
    $userEmail = $_POST['E-mail'];

    if(empty($userEmail)){
        header("Location: ../reset-password.php?error=emptyfield");
        exit();
    }
    else{$result = $conn->query("SELECT * FROM users WHERE email = '$userEmail'");
        if($result->num_rows == 0) {
         // row not found, do stuff...
         header("Location: ../reset-password.php?error=emilnotregistered");
         exit();
    
        } else 
        {
        // do other stuff...
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
    
        $url = "https://localhost/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
    
        $expires = date('U') + 1800;
    
        
    
        
    
        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../reset-password.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$userEmail);
            mysqli_stmt_execute(($stmt));
        }
    
        $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?,?,?,?);";
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../reset-password.php?error=sqlerror");
            exit();
        }
        else{
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ssss",$userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute(($stmt));
        }
    
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
        $to = $userEmail;
    
        $subject = 'Reset your password';
    
        $message = "<p>We received a password reset request. The link to reset your password is given below. 
                    If you did not make this request, you can ignore this mail</p>";
        $message .= "<p>Here is your password reset link: <br>";
        $message .= "<a href ='".$url."'>".$url."</a></p>";
    
        $headers = "From: Jadavpur University <arijitjuite23@gmail.com>\r\n";
        $headers .= "Reply-To: arijitjuite23@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
    
        mail($to, $subject, $message, $headers);
        header("Location: ../reset-password.php?reset=success");
    
        }
        

    }
    
    
    
    
}
else{
    header("Location: ../reset-password.php");
}
?>