<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style = "color : red;">
    <?php
        require "header.php";
    ?>

    <br><br>
    <h2 style="text-align : center "> Login Here </h2>
    <section style = "background-color : rgb(255, 204, 0); margin : 0 35% 0 35%; padding-top:30px; padding-bottom:30px; border : 2px solid brown;">
        <form action="login.inc.php" method="post" style="text-align : center;">
            Username:<input type="text" name="u_name" placeholder ="Name/Email"><br><br>
            Roll Number:<input type="number" name="roll_no" placeholder ="001910701001"><br><br>
            Password:<input type="password" name="pwdl"><br><br><br>
            <a href="#" style="font-size : small; float : left;">Create new account</a>
            <a href="#" style="font-size : small; float : right;">Forgot Password?</a><br><br>
            <button type="submit" name="login-submit" style ="float : middle; color : white; background-color : rgb(255, 80, 80)"><b>Login</b></button>
        </form>
    </section>
</body>
</html>