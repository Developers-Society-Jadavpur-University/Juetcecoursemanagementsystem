<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>
    <?php require "header.php"?>
    <div class="profile-content">
        <h4>Welcome to Electronics and Telecommunication Department</h4>
    </div> 
    <?php
        if(isset($_SESSION['uid'])){
            require "nav-bar.php";
        }
        require "footer.php";
    ?>
</body>
</html>