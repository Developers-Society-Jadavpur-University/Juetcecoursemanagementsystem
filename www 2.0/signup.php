<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <?php
        require "header.php";
        require "prevent_logout.php";
    ?>
    <br>

    <div class="container">
            <?php

                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfields'){
                        echo "<p>No field can remain empty!</p>";
                    }
                    else if($_GET['error'] == 'invalidname_and_email'){
                        echo "<p>Invalid Name and E-mail Id!</p>";
                    }
                    else if($_GET['error'] == 'invalidname'){
                        echo "<p>Invalid Name!</p>";
                    }
                    else if($_GET['error'] == 'invalidemail'){
                        echo "<p>Invalid E-mail Id!</p>";
                    }
                    else if($_GET['error'] == 'sqlerror'){
                        echo "<p>Some unknown error occurred!</p>";
                    }
                    else if($_GET['error'] == 'passwordcheck'){
                        echo "<p>Ensure that the entered passwords are same!</p>";
                    }
                }
            ?>
        <h3 class="heading"> Sign Up </h3>
        <section class="entry"> 
            <form action="includes/signup.inc.php" method="post" class="left">
                Name:<br><input type = "text" name = "uname"><br><br>
                Roll Number:<br><input type = "number" name = "rollno" placeholder ="001910701001"><br><br>
                E-mail:<br><input type = "email" name = "e-mail" ><br><br>
                Enter Password:<br><input type = "password" name = "pwd"><br><br>
                Re-Enter Password:<br><input type = "password" name = "rpwd"><br><br>
                <button class="submit-buttons" type = "submit" name="signup-submit"">
                <b>Sign Up</b></button>&emsp;
                <a href="login.php" class="right">Already have an account?</a>
            </form>
        </section>
    </div>
    <?php
        require "footer.php";
    ?>
</body>
</html>