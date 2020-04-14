<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php

        if(isset($_GET['login-type'])){
            $login = isset($_GET['login-type']);
            $loginType = $_GET['login-type'];
        }else{
            $login = false;
            $loginType = "";
        }        
    ?>
</head>
<body>
    <?php
        require "header.php";
        require "prevent_logout.php";
    ?>

    <br><br>
    <div class="container">
        <?php
            if(isset($_GET['password-update'])){
                if($_GET['password-update'] == 'success'){
                    echo "<p>Password updated successfully!</p>";
                }
            }
            
            if(isset($_GET['error'])){
                if($_GET['error'] == 'emptyfields'){
                    echo "<p>No field can remain empty!</p>";
                }
                else if($_GET['error'] == 'invalidusername'){
                    echo "<p>Invalid Username!</p>";
                }
                else if($_GET['error'] == 'sqlerror'){
                    echo "<p>Some unknown error occurred!</p>";
                }
                else if($_GET['error'] == 'wrongpassword'){
                    echo "<p>Entered password is wrong!</p>";
                }
                else if($_GET['error'] == 'nouser'){
                    echo "<p>User does not exist!</p>";
                }
            } 
        ?>
        <h3 class="heading"> Login Here </h3>
        <section class="entry" id="student">
            <form action="includes/login.inc.php" method="post" class="left">
                Username<br><input type="text" name="u_name" placeholder ="Full name / Email"><br><br>
                Roll Number (12 digit)<br><input type="number" name="roll_no" placeholder ="0020107010XX"><br><br>
                Password<br><input type="password" name="pwdl"><br><br><br>
                <a class="left" href="signup.php">Create new account</a>&emsp;
                <a class="right" href="reset-password.php">Forgot Password?</a><br><br>
                <button class="submit-buttons" type="submit" name="login-student-submit"><b>Login</b></button>
            </form>
        </section>

        <section class="entry" id="staff">
            <form action="includes/login.inc.php" method="post" class="left">
                Username<br><input type="text" name="uname" placeholder ="Name/Email"><br><br>
                Role<br><select name="role">
                            <option value="admin">ADMIN</option>
                            <option value="faculty">FACULTY</option>
                        </select><br><br>
                Password<br><input type="password" name="pwd"><br><br><br>
                <a class="right" href="reset-password.php">Forgot Password?</a>
                <button class="submit-buttons" type="submit" name="login-staff-submit"><b>Login</b></button>
            </form>
        </section>
        <script>
            var student = document.getElementById("student");
            var staff = document.getElementById("staff");
            var login = <?=json_encode($login)?>;
            
            if(login == true){
                var loginType = <?=json_encode($loginType)?>;
                if (loginType == 'student'){
                    student.style.display = "inline-block";
                    staff.style.display = "none";
                }else if (loginType == 'staff'){
                    staff.style.display = "inline-block";
                    student.style.display = "none";
                }
            }else{
                student.style.display = "inline-block";
                staff.style.display = "none";
            }
        </script>
    </div>
    <?php require "footer.php"; ?>
</body>
</html>
