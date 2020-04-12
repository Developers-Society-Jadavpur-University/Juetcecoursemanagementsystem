<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    <img class="home-img" src="image/ju.jpeg">
    <?php
        if(isset($_SESSION['uid'])){
            require "nav-bar.php";
        }
        require "footer.php";
    ?>
</body>
</html>
