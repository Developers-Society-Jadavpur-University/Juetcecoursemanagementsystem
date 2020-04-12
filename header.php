<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <!--link rel="stylesheet" type="text/css" href="media-screens.css"/-->
</head>
<body id="body">
    
    <a href="index.php"><img class="logo" src="image/julogo.png" style="height: 50px; width: 50px;"/></a>
    <h4 class="header" style = "text-align: center;" >
    DEPARTMENT OF ELECTRONICS AND TELECOMMUNICATION ENGINEERING <br>JADAVPUR UNIVERSITY
    </h4>
        <?php
            if(isset($_SESSION['uid']) && isset($_SESSION['roll'])) {

                require "includes/dbh.inc.php";
                $sql = "SELECT * FROM profileimg WHERE user_rno=?;";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Some unwanted error occurred!";
                }else{
                    mysqli_stmt_bind_param($stmt, "i", $_SESSION['roll']);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)){
                        if($row['status_name'] === 0){
                            echo '<a href="profilepic.php"><img src="uploads/profile'.$_SESSION['roll'].'.'.$row['ext'].'?"'.mt_rand().' class="profile"/></a>';
                        }else if($row['status_name'] === 1){
                            echo '<a href="profilepic.php"><img src="uploads/profileimg_default.png" class="profile"/></a>';
                        }
                    }else{
                        echo "Some unwanted error occurred!";
                    }
                }
                echo'<h6 class="user">';
                echo $_SESSION['uid']."<br>";
                echo $_SESSION['roll'];
            }
        ?>
    </h6>
    <nav>
        <span>
            <ul class="header" style=" background-color: yellow;" >
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="archive.php">Archive</a></li>
                <?php
                    if(isset($_SESSION['uid'])){
                        echo'<button class="submit-buttons entry" type="submit" name="logout" style="float : right;">
                            <a class="sub" href = "includes/logout.inc.php"><b>Logout</b></a></button></li>';
                    }
                    else if(!isset($_SESSION['uid'])){
                        echo'<button class="submit-buttons entry" type="submit" name="login" style="float : right;">
                            <a class="sub" href = "login.php" ><b>Login</b></a></button>
                            <button class="submit-buttons entry" type="submit" name="signup"style="float : right;margin-right: 10px">
                            <a class="sub" href = "signup.php"><b>Sign Up</b></a></button>';
                    }
                ?>
            </ul>
        </span>
    </nav>
</body>
</html>