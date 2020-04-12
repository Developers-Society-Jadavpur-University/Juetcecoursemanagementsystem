<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <?php  
        require "header.php";
        require "prevent_login.php";
    ?>

    <div class = "container">
        <h3 class="heading">Change password</h3>
        <section class="entry">
            <form action="includes/change-password.inc.php" method="post">
                <input type="password" name="pwd-old" placeholder="Enter previous password..."><br><br>
                <input type="password" name="pwd" placeholder="Enter new password..."><br><br>
                <input type="password" name="pwd-repeat" placeholder="Repeat new password..."><br><br>
                <button class="submit-buttons" type="submit" name="change-password-submit">Reset password</button>
            </form>
        </section>
    </div>
    <div class="container" style="text-align : center ">
        <?php
             
            if(isset($_GET['error'])){
                if($_GET['error'] == 'emptypasswordfield'){
                    echo"<p>Enter all fields</p>";
                }
                else if($_GET['error'] == 'passwordnotsame'){
                    echo"<p>New passwords did not match!</p>";
                }
                else if($_GET['error'] == 'wrongoldpassword'){
                    echo"<p>Existing password is not correct</p>";
                }
            }
        ?>
    </div>
    <?php
        require "nav-bar.php";
        require "footer.php";
    ?>
</body>
</html>