<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body style="color : red;">
    <?php
        require "header.php";
    ?>
    <br>
    <h2 style="text-align : center "> Sign Up </h2>

    <div style ="background-color : rgb(255, 204, 0);margin : 0 35% 0 35%; padding:30px 0 30px 30px; border : 2px solid brown;">
        <form action="signup.inc.php" method="post">
            Name:<input type = "text" name = "uname"><br><br>
            Roll Number:<input type = "number" name = "rollno" placeholder ="001910701001"><br><br>
            E-mail:<input type = "email" name = "e-mail"><br><br>
            Enter Password:<input type = "password" name = "pwd"><br><br>
            Re-Enter Password:<input type = "password" name = "rpwd"><br><br>
            <button type = "submit" name="signup-submit" style ="float : middle ;color : white; background-color:rgb(255, 80, 80);"><b>Sign Up</b></button>
        </form>
    </div>
</body>
</html>