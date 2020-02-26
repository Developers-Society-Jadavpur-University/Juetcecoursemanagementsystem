<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <a href="index.php"><img src="image/julogo.png" width = 100px style="display : block; margin-left: auto; margin-right: auto; "/></a>
    <h2 style = "text-align: center; color : red; background-color: rgb(102, 255, 102);" >
        ELECTRONICS AND TELECOMMUNICATION DEPARTMENT<br>JADAVPUR UNIVERSITY
    </h2>
    <nav>
        <span>
            <ul style="list-style-type: none; background-color: yellow;" >
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="activities.php">Activities</a></li>
                <?php
                    if(isset($_SESSION['uid'])){
                        echo'<button type="submit" name="logout" style="float : right;"><a class="sub" href = "logout.inc.php"><b>Logout</b></a></button></li>';
                    }
                    else if(!isset($_SESSION['uid'])){
                        echo'<button type="submit" name="login" style="float : right;"><a class="sub" href = "login.php" ><b>Login</b></a></button>
                        <button type="submit" name="signup"style="float : right;"><a class="sub" href = "signup.php"><b>Sign Up</b></a></button>';
                    }
                ?>
            </ul>
        </span>
    </nav>
</body>
</html>