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
        require "prevent_protocols/prevent_students.php";
        require "prevent_protocols/prevent_faculty.php";
        require "admin_dashboard/cms-nav_admin.php";
        

        if(isset($_GET['login']))
        {
            if ($_GET['login'] =='success'){
                
                echo "<script>window.alert('Login was successful!');</script>";
                echo "<h4> Welcome ".$_SESSION['uid']." to the admin dashboard!</h4>";
                
            }
        }
        
    
    ?>
        <div class="profile-content">
        <h4>Welcome to Electronics and Telecommunication Engineering Department Course Management System </h4>
        </div>
    
    
    <?php
        require "footer.php";
    ?>
</body>
</html>