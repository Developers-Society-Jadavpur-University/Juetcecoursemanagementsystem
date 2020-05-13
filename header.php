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
    
    <a href="../index.php"><img class="logo" src="../image/julogo.png" style="height: 50px; width: 50px;"/></a>
    <h4 class="header" style = "text-align: center;" >
    DEPARTMENT OF ELECTRONICS AND TELECOMMUNICATION ENGINEERING <br>JADAVPUR UNIVERSITY
    </h4>
        <?php

            require "includes/dbh.inc.php";
            // $sql = "SELECT date_time_expiry FROM stu_notice;";
            // $result = mysqli_query($conn,$sql);
            // $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE stu_notice SET notice_status='archived' WHERE date_time_expiry<=NOW()";
            mysqli_query($conn, $sql);

            if(isset($_SESSION['uid']) && isset($_SESSION['roll'])) {

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
    <nav style="padding: 0px">
        <span>
            <ul class="header" style=" background-color: yellow;" >
                <li><a href="../index.php">Home</a></li>
                <!--<li><a href="about.php">About</a></li>-->
                <li><a href="archive.php">Archive</a></li>
                <li><a href="../webmail/index.php">Webmail</a></li>
                <?php
                    if(isset($_SESSION['uid'])){
                        echo'<button class="submit-buttons entry" type="submit" name="logout" style="float : right; margin-right: 15px;">
                            <a class="sub" href = "includes/logout.inc.php"><b>Logout</b></a></button>';
                    }
                    else if(!isset($_SESSION['uid'])){
                        echo'<button class="submit-buttons entry login" id="login" type="submit" name="login" style="float : right;">
                            <a class="sub" href = "#" ><b>Login</b></a></button>
                            <button class="submit-buttons entry" type="submit" name="signup"style="float : right;margin-right: 10px">
                            <a class="sub" href = "signup.php"><b>Sign Up</b></a></button>';
                    }
                ?>
            </ul>
        </span>
    </nav>
    <div class="login-type" id="login-type-div">
        <ul class="login-type" id="login-type-ul"> 
            <li><br><a href="../login.php?login-type=student">STUDENT</a></li><br><br>
            <li><a href="../login.php?login-type=staff">STAFF</a></li><br>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        var button = document.getElementById("login");
        var div = document.getElementById("login-type-div");
        var ul = document.getElementById("login-type-ul");
        if (button !== null){
            button.addEventListener("click", function(){ div.style.display = "initial"; });
            button.addEventListener("click", function(){ div.style.display = "none"; });
        }
        div.addEventListener("click", function(){ div.style.display = "initial"; });
        div.addEventListener("click", function(){ div.style.display = "none"; });
        if (button !== null){
            button.addEventListener("click", displayLoginType);
        }
        function displayLoginType(){
            if (div.style.display == "none"){
                div.style.display = "initial";
            }else if(div.style.display == "initial"){
                div.style.display = "none";
            }

        }
        $(document).mouseup(function(e){
        var container = $("#login-type-div");

        // If the target of the click isn't the container
        if(!container.is(e.target) && container.has(e.target).length === 0){
          container.hide();
        }
       });
       
        


    </script>
</body>
</html>