<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    

</head>
<body>
    <?php 
        require "header.php";
        
        require "prevent_login.php";
        require "prevent_protocols/prevent_staff.php";
        require "cms-nav_stu.php";
        
        if(isset($_GET['login'])) {
            if ($_GET['login'] == 'successful'){
                echo "<script>window.alert('Login was successful!');</script>";
                echo "<h4> Welcome ".$_SESSION['uid']." to the dashboard!</h4>";
                $url = "../personal_details.php";
                echo "<a href='".$url."'>Update Details</a>";
            }
        }
        if(isset($_GET['signup'])) {
            if ($_GET['signup'] == 'successful'){
                echo "<script>window.alert('Signup was successful!');</script>";
                echo "<h4> Welcome ".$_SESSION['uid']." to the dashboard!</h4>";
                $url = "../personal_details.php";
                echo"<a href='".$url."'>Update Details</a>";
            }
        }
        if(isset($_GET['passwordchange'])){
            if($_GET['passwordchange'] == 'success'){
                echo"<h4>Password changed successfully!</h4>";
            }
        }
        if(isset($_GET['pictureupdate'])){
            if($_GET['pictureupdate'] == 'success'){
                echo"<h4>Profile picture uploaded successfully!</h4>";
            }
        } 
        
        //require "nav-bar.php"; 
        require "stu-notice_table.php";
        require "footer.php"; 
    ?> 

</body>
</html>