<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php 
        require "header.php";
        require "prevent_login.php";

        if(isset($_GET['login'])) {
            if ($_GET['login'] == 'success'){
                echo "<script>window.alert('Login was successful!');</script>";
                echo"<h4> Welcome ".$_SESSION['uid']." to the admin dashboard!</h4>";
                
                
            }
        }
    ?>
    <div class="profile-content">
        <h4>Welcome to Electronics and Telecommunication Department</h4>
    </div> 
    <?php
        require "footer.php";
    ?>
</body>
</html>